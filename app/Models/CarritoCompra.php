<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarritoCompra extends Model
{
    use SoftDeletes;

    protected $table = 'carrito_compras';

    protected $fillable = [
        'id_usuario',
        'id_profesional',
        'id_paciente',
        'id_ficha',
        'id_producto',
        'codigo_producto',
        'nombre_producto',
        'marca_producto',
        'tipo_producto',
        'cantidad',
        'precio_unitario',
        'descuento',
        'subtotal',
        'stock_disponible',
        'observaciones',
        'image_path',
        'estado',
        'session_id',
        'id_lugar_atencion',
        'id_bodega',
        'expira_en',
    ];

    protected $casts = [
        'cantidad' => 'integer',
        'precio_unitario' => 'decimal:2',
        'descuento' => 'decimal:2',
        'subtotal' => 'decimal:2',
        'stock_disponible' => 'integer',
        'expira_en' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    protected $attributes = [
        'cantidad' => 1,
        'descuento' => 0,
        'estado' => 'activo',
    ];

    // Relaciones
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function profesional()
    {
        return $this->belongsTo(Profesional::class, 'id_profesional');
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    public function fichaOtrosProfesionales()
    {
        return $this->belongsTo(FichaOtrosProfesionales::class, 'id_ficha');
    }

    public function lugarAtencion()
    {
        return $this->belongsTo(LugarAtencion::class, 'id_lugar_atencion');
    }

    public function bodega()
    {
        return $this->belongsTo(Bodega::class, 'id_bodega');
    }

    // Scopes
    public function scopeActivos($query)
    {
        return $query->where('estado', 'activo');
    }

    public function scopePorUsuario($query, $id_usuario)
    {
        return $query->where('id_usuario', $id_usuario);
    }

    public function scopePorSesion($query, $session_id)
    {
        return $query->where('session_id', $session_id);
    }

    public function scopePorPaciente($query, $id_paciente)
    {
        return $query->where('id_paciente', $id_paciente);
    }

    public function scopeNoExpirados($query)
    {
        return $query->where(function($q) {
            $q->whereNull('expira_en')
              ->orWhere('expira_en', '>', now());
        });
    }

    // Métodos auxiliares

    /**
     * Calcular el subtotal basado en cantidad, precio y descuento
     */
    public function calcularSubtotal()
    {
        $subtotal = ($this->precio_unitario * $this->cantidad) - $this->descuento;
        $this->subtotal = max(0, $subtotal); // No permitir negativos
        return $this->subtotal;
    }

    /**
     * Actualizar cantidad y recalcular subtotal
     */
    public function actualizarCantidad($cantidad)
    {
        $this->cantidad = max(1, $cantidad); // Mínimo 1
        $this->calcularSubtotal();
        $this->save();
    }

    /**
     * Aplicar descuento y recalcular subtotal
     */
    public function aplicarDescuento($descuento)
    {
        $this->descuento = max(0, $descuento); // No permitir negativos
        $this->calcularSubtotal();
        $this->save();
    }

    /**
     * Verificar si hay stock disponible
     */
    public function tieneStockDisponible()
    {
        if ($this->producto) {
            return $this->producto->stock_actual >= $this->cantidad;
        }
        return $this->stock_disponible >= $this->cantidad;
    }

    /**
     * Marcar como procesado
     */
    public function marcarProcesado()
    {
        $this->estado = 'procesado';
        $this->save();
    }

    /**
     * Marcar como cancelado
     */
    public function marcarCancelado()
    {
        $this->estado = 'cancelado';
        $this->save();
    }

    /**
     * Verificar si el carrito ha expirado
     */
    public function haExpirado()
    {
        if (!$this->expira_en) {
            return false;
        }
        return now()->greaterThan($this->expira_en);
    }

    /**
     * Obtener total del carrito para un usuario o sesión
     */
    public static function obtenerTotal($id_usuario = null, $session_id = null)
    {
        $query = static::activos()->noExpirados();

        if ($id_usuario) {
            $query->porUsuario($id_usuario);
        } elseif ($session_id) {
            $query->porSesion($session_id);
        }

        return $query->sum('subtotal');
    }

    /**
     * Obtener cantidad de items en el carrito
     */
    public static function contarItems($id_usuario = null, $session_id = null)
    {
        $query = static::activos()->noExpirados();

        if ($id_usuario) {
            $query->porUsuario($id_usuario);
        } elseif ($session_id) {
            $query->porSesion($session_id);
        }

        return $query->sum('cantidad');
    }

    /**
     * Limpiar carrito expirado
     */
    public static function limpiarExpirados()
    {
        return static::where('estado', 'activo')
                     ->whereNotNull('expira_en')
                     ->where('expira_en', '<', now())
                     ->update(['estado' => 'expirado']);
    }

    /**
     * Vaciar carrito de un usuario o sesión
     */
    public static function vaciarCarrito($id_usuario = null, $session_id = null)
    {
        $query = static::activos();

        if ($id_usuario) {
            $query->porUsuario($id_usuario);
        } elseif ($session_id) {
            $query->porSesion($session_id);
        }

        return $query->delete(); // Soft delete
    }
}
