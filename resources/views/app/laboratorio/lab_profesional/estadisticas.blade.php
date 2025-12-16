@extends('template.laboratorio.laboratorio_profesional.template')
@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                            </div>
                            <ul class="breadcrumb mb-2">
                                @if(isset($profesional) && !isset($institucion))
                                <li class="breadcrumb-item">
                                    <a href="{{ route('laboratorio.lab_profesional.escritorio_profesional_laboratorio') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a>
                                </li>
                                @elseif(isset($institucion) && !isset($profesional) && $institucion->id_tipo_institucion == 3)
                                <li class="breadcrumb-item">
                                    <a href="{{ route('laboratorio.adm_general.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a>
                                </li>
                                @elseif(isset($profesional) && isset($institucion))
                                <li class="breadcrumb-item">
                                    <a href="{{ route('laboratorio.adm_general.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a>
                                </li>
                                @endif
                                <li class="breadcrumb-item"><a href="#">Estadísticas</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
             <div class="card">
                <div class="card-header">
                    Estadísticas de uso del sistema
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs-secciones mb-2" id="estadisticas-aud" role="tablist">
                        <li class="nav-item-secciones">
                            <a class="nav-secciones active text-uppercase" id="estadisticas-lab-tab" data-toggle="tab" href="#estadisticas-lab" role="tab" aria-controls="estadisticas-lab" aria-selected="true">Estadísticas Laboratorio</a>
                        </li>
                        <li class="nav-item-secciones">
                            <a class="nav-secciones text-uppercase" id="reportes-estadisticas-lab-tab" data-toggle="tab" href="#reportes-estadisticas-lab" role="tab" aria-controls="reportes-estadisticas-lab" aria-selected="false">Reportes Estadísticas Laboratorio</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="estadisticas-aud-content">
                         <div class="tab-pane fade show active" id="estadisticas-lab" role="tabpanel" aria-labelledby="estadisticas-lab-tab">
                            <form id="form-filtro-estadisticas" class="mb-4">
                                <div class="form-row align-items-end">
                                    <div class="col-md-3">
                                        <label for="fecha_inicio">Fecha inicio</label>
                                        <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="fecha_fin">Fecha fin</label>
                                        <input type="date" class="form-control" id="fecha_fin" name="fecha_fin">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="sucursales">Sucursales</label>
                                        <select class="form-control" id="sucursales" name="sucursales">
                                            <option value="">Todas</option>
                                            @if(isset($sucursales))
                                            @foreach($sucursales as $sucursal)
                                                <option value="{{ $sucursal->id }}">{{ $sucursal->nombre }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            <i class="feather icon-search"></i> Buscar
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div id="resultados-estadisticas">
                                <!-- Aquí se mostrarán los resultados -->
                            </div>
                            <button type="button" class="btn btn-secondary" id="btn-exportar">
                                <i class="feather icon-download"></i> Generar Reporte PDF
                            </button>
                        </div>
                        <div class="tab-pane fade" id="reportes-estadisticas-lab" role="tabpanel" aria-labelledby="reportes-estadisticas-lab-tab">
                            <div class="alert alert-info">
                                En esta sección podrás generar reportes en PDF de las estadísticas del laboratorio.
                            </div>
                        </div>
                    </div>


                </div>
             </div>
    </div>
</div>
<input type="hidden" name="id_institucion" id="id_institucion" value="{{ $institucion ? $institucion->id : '' }}">
@endsection
@section('page-script')
<script>
$(document).ready(function() {
    $('#form-filtro-estadisticas').on('submit', function(e) {
        e.preventDefault();
        let fecha_inicio = $('#fecha_inicio').val();
        let fecha_fin = $('#fecha_fin').val();
        let id_institucion = $('#id_institucion').val();
        let id_sucursal = $('#sucursales').val();

        // Validación básica
        if (!fecha_inicio || !fecha_fin) {
            swal({
                icon: 'warning',
                title: 'Faltan fechas',
                text: 'Debes seleccionar ambas fechas para filtrar.'
            });
            return;
        }

        // Mostrar loading
        $('#resultados-estadisticas').html('<div class="text-center py-4"><span class="spinner-border"></span> Buscando...</div>');

        // Petición AJAX (ajusta la ruta según tu backend)
        $.ajax({
            url: '{{ route("laboratorio.estadisticas.buscar") }}',
            type: 'GET',
            data: {
                fecha_inicio: fecha_inicio,
                fecha_fin: fecha_fin,
                id_institucion: id_institucion,
                id_sucursal: id_sucursal
            },
            success: function(response) {
                console.log(response);
                // Aquí puedes renderizar los resultados
                $('#resultados-estadisticas').html(response || '<div class="alert alert-info">No hay resultados para el rango seleccionado.</div>');
            },
            error: function(error) {
                console.log(error);
                $('#resultados-estadisticas').html('<div class="alert alert-danger">Error al buscar estadísticas.</div>');
            }
        });
    });
});
</script>
@endsection
