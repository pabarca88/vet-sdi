<?php

namespace App\Support;

use App\Models\AdminInstServ;
use App\Models\AdminLugarAtencion;
use App\Models\ContratoDependiente;
use App\Models\Instituciones;
use App\Models\LugarAtencion;
use App\Models\Profesional;
use App\Models\ProfesionalesLugaresAtencion;
use App\Models\Sucursal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class UserCenterContext
{
    public static function forAdmin(User $user, Request $request): array
    {
        $contexts = collect();
        $adminProfile = AdminInstServ::where('id_admin', $user->id)->first();

        $ownerInstitutions = Instituciones::where('id_usuario', $user->id)->get();
        foreach ($ownerInstitutions as $institution) {
            $contexts = $contexts->merge(self::buildInstitutionContexts($institution, 'Administrador General'));
        }

        if ($adminProfile) {
            $managedInstitutions = Instituciones::where('id_responsable', $adminProfile->id)->get();
            foreach ($managedInstitutions as $institution) {
                $contexts = $contexts->merge(self::buildInstitutionContexts($institution, 'Administrador General'));
            }

            $branchAssignments = AdminLugarAtencion::where('id_admin', $adminProfile->id)->get();
            foreach ($branchAssignments as $assignment) {
                $branchContext = self::buildBranchContext((int) $assignment->id_institucion, (int) $assignment->id_lugar_atencion, 'Administrador de Sucursal');
                if ($branchContext) {
                    $contexts->push($branchContext);
                }
            }

            $contracts = ContratoDependiente::where('id_empleado', $adminProfile->id)
                ->where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                ->whereIn('estado', [2, 3])
                ->get();

            foreach ($contracts as $contract) {
                if (!empty($contract->id_lugar_atencion)) {
                    $branchContext = self::buildBranchContext((int) $contract->id_institucion, (int) $contract->id_lugar_atencion, 'Administrador de Sucursal');
                    if ($branchContext) {
                        $contexts->push($branchContext);
                    }
                } elseif (!empty($contract->id_institucion)) {
                    $institution = Instituciones::find($contract->id_institucion);
                    if ($institution) {
                        $contexts = $contexts->merge(self::buildInstitutionContexts($institution, 'Administrador General'));
                    }
                }
            }
        }

        return self::finalizeContexts($contexts, $request, 'admin_center_context');
    }

    public static function forProfessional(User $user, Request $request): array
    {
        $contexts = collect();
        $professional = Profesional::where('id_usuario', $user->id)->first();

        if ($professional) {
            $placeIds = ProfesionalesLugaresAtencion::where('id_profesional', $professional->id)
                ->where('estado', 1)
                ->pluck('id_lugar_atencion')
                ->unique()
                ->values();

            foreach ($placeIds as $placeId) {
                $institutionId = LugarAtencionInstitucionResolver::resolve((int) $placeId);
                $branchContext = self::buildBranchContext($institutionId, (int) $placeId, 'Profesional');
                if ($branchContext) {
                    $contexts->push($branchContext);
                }
            }
        }

        return self::finalizeContexts($contexts, $request, 'professional_center_context');
    }

    protected static function buildInstitutionContexts(Instituciones $institution, string $roleLabel): Collection
    {
        $contexts = collect();
        $placeIds = collect([(int) $institution->id_lugar_atencion])
            ->merge(
                Sucursal::where('id_institucion', $institution->id)
                    ->pluck('id_lugar_atencion')
                    ->map(fn ($id) => (int) $id)
            )
            ->filter()
            ->unique()
            ->values();

        $contexts->push([
            'key' => 'institution:' . $institution->id,
            'label' => $institution->nombre . ' | Todas las sucursales',
            'role_label' => $roleLabel,
            'scope_type' => 'institution',
            'id_institucion' => (int) $institution->id,
            'id_lugar_atencion' => null,
            'scope_lugar_ids' => $placeIds->all(),
        ]);

        foreach ($placeIds as $placeId) {
            $branchContext = self::buildBranchContext((int) $institution->id, (int) $placeId, $roleLabel);
            if ($branchContext) {
                $contexts->push($branchContext);
            }
        }

        return $contexts;
    }

    protected static function buildBranchContext(?int $institutionId, int $placeId, string $roleLabel): ?array
    {
        $place = LugarAtencion::find($placeId);
        if (!$place) {
            return null;
        }

        $institution = $institutionId ? Instituciones::find($institutionId) : null;

        return [
            'key' => 'branch:' . $placeId,
            'label' => ($institution ? $institution->nombre . ' | ' : '') . $place->nombre,
            'role_label' => $roleLabel,
            'scope_type' => 'branch',
            'id_institucion' => $institution ? (int) $institution->id : null,
            'id_lugar_atencion' => $placeId,
            'scope_lugar_ids' => [$placeId],
        ];
    }

    protected static function finalizeContexts(Collection $contexts, Request $request, string $sessionKey): array
    {
        $contexts = $contexts
            ->filter(fn ($context) => !empty($context['key']))
            ->unique('key')
            ->values();

        $requestedKey = $request->query('contexto');
        if (!empty($requestedKey) && $contexts->contains(fn ($ctx) => $ctx['key'] === $requestedKey)) {
            $request->session()->put($sessionKey, $requestedKey);
        }

        $activeKey = $request->session()->get($sessionKey);
        $active = $contexts->first(fn ($ctx) => $ctx['key'] === $activeKey);

        if (!$active) {
            $active = $contexts->first();
            if ($active) {
                $request->session()->put($sessionKey, $active['key']);
            }
        }

        return [
            'contexts' => $contexts,
            'active' => $active,
        ];
    }
}
