
@extends('template.laboratorio.laboratorio_profesional.template')
@section('content')
<!--****Container Completo****-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Inventario</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('laboratorio.area_comercial') }}">Administración</a></li>
                            <li class="breadcrumb-item"><a href="#">Inventario</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Cierre: Header-->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-pills bg-white" id="finanzas" role="tablist">
                        <li class="nav-item active">
                            <a class="btn btn-outline-info btn-sm mr-1 my-1 has-ripple" id="rendimiento_ingresos-tab" data-toggle="tab" href="#rendimiento_ingresos" role="tab" aria-controls="rendimiento_ingresos" aria-selected="false">Rendimientos e Ingresos<span></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-info btn-sm mr-1 my-1 has-ripple" id="salidas_gastos-tab" data-toggle="tab" href="#salidas_gastos" role="tab" aria-controls="salidas_gastos" aria-selected="false">Salidas y Gastos<span class="ripple ripple-animate" ></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-info btn-sm mr-1 my-1 has-ripple" id="comparativo-tab" data-toggle="tab" href="#comparativo" role="tab" aria-controls="comparativo" aria-selected="false">Comparativo (Ingresos vs Gastos)<span class="ripple ripple-animate" ></span></a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="finanzasContent">
                    <div class="tab-pane fade show active" id="rendimiento_ingresos" role="tabpanel" aria-labelledby="rendimiento_ingresos-tab">
                        @include('app.laboratorio.adm_general.inventario.estadisticas_finanzas.rendimiento_ingresos')
                    </div>
                    <div class="tab-pane fade" id="salidas_gastos" role="tabpanel" aria-labelledby="salidas_gastos-tab">
                        @include('app.laboratorio.adm_general.inventario.estadisticas_finanzas.salidas_gastos')
                    </div>
                    <div class="tab-pane fade" id="comparativo" role="tabpanel" aria-labelledby="comparativo-tab">
                        @include('app.laboratorio.adm_general.inventario.estadisticas_finanzas.comparativo')
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-script')
<script>
    // Función general para capturar los datos del formulario de filtros
    function getFiltrosEstadisticas() {
        return {
            fecha_inicio: document.getElementById('fecha_inicio').value,
            fecha_final: document.getElementById('fecha_final').value,
            institucion: document.getElementById('institucion').value,
            profesional: document.getElementById('profesional').value
        };
    }

    // Función general para capturar los datos del formulario de filtros de gastos
    function getFiltrosGastos() {
        return {
            fecha_inicio: document.getElementById('fecha_inicio_gastos').value,
            fecha_final: document.getElementById('fecha_final_gastos').value,
            institucion: document.getElementById('institucion_gastos').value
        };
    }

    function getFiltrosComparativo() {
        return {
            fecha_inicio: document.getElementById('fecha_inicio_comparativo').value,
            fecha_final: document.getElementById('fecha_final_comparativo').value,
            institucion: document.getElementById('institucion_comparativo').value
        };
    }

    // Validar que al menos una fecha esté ingresada
    function validarFechas() {
        const filtros = getFiltrosEstadisticas();
        if (!filtros.fecha_inicio && !filtros.fecha_final) {
            swal({
                title: "Error",
                text: "Debe ingresar al menos la fecha de inicio o la fecha final.",
                icon: "error",
                button: "Aceptar",
            });
            return false;
        }
        return true;
    }

    // Validar que al menos una fecha esté ingresada para gastos
    function validarFechasGastos() {
        const filtros = getFiltrosGastos();
        if (!filtros.fecha_inicio && !filtros.fecha_final) {
            swal({
                title: "Error",
                text: "Debe ingresar al menos la fecha de inicio o la fecha final.",
                icon: "error",
                button: "Aceptar",
            });
            return false;
        }
        return true;
    }

    // Validar que al menos una fecha esté ingresada para comparativo
    function validarFechasComparativo() {
        const filtros = getFiltrosComparativo();
        if (!filtros.fecha_inicio && !filtros.fecha_final) {
            swal({
                title: "Error",
                text: "Debe ingresar al menos la fecha de inicio o la fecha final.",
                icon: "error",
                button: "Aceptar",
            });
            return false;
        }
        return true;
    }

    function validarProfesional() {
        const profesional = document.getElementById('profesional').value;
        if (!profesional) {
            swal({
                title: "Error",
                text: "Debe seleccionar un profesional para esta estadística.",
                icon: "error",
                button: "Aceptar",
            });
            return false;
        }
        return true;
    }

    function cargarGastos() {
        if (!validarFechasGastos()) return;
        const filtros = getFiltrosGastos();
        console.log('Gastos:', filtros);
        $.ajax({
            url: '{{ route("laboratorio.estadisticas.buscar") }}',
            type: 'GET',
            data: {
                fecha_inicio: filtros.fecha_inicio,
                fecha_fin: filtros.fecha_final,
                id_institucion: filtros.institucion,
                tipo_estadistica: 'gastos'
            },
            success: function(response) {
                console.log(response);
                // Aquí puedes renderizar los resultados
                $('#grafico_salidas_gastos').html(response || '<div class="alert alert-info">No hay resultados para el rango seleccionado.</div>');
            },
            error: function(error) {
                console.log(error);
                $('#grafico_salidas_gastos').html('<div class="alert alert-danger">Error al buscar estadísticas.</div>');
            }
        });
    }

    function cargarComparativo(){
        if (!validarFechasComparativo()) return;
        const filtros = getFiltrosComparativo();
        console.log('Comparativo:', filtros);
        $.ajax({
            url: '{{ route("laboratorio.estadisticas.buscar") }}',
            type: 'GET',
            data: {
                fecha_inicio: filtros.fecha_inicio,
                fecha_fin: filtros.fecha_final,
                id_institucion: filtros.institucion,
                tipo_estadistica: 'comparativo'
            },
            success: function(response) {
                console.log(response);
                // Aquí puedes renderizar los resultados
                $('#grafico_comparativo_ingresos_gastos').html(response || '<div class="alert alert-info">No hay resultados para el rango seleccionado.</div>');
            },
            error: function(error) {
                console.log(error);
                $('#grafico_comparativo_ingresos_gastos').html('<div class="alert alert-danger">Error al buscar estadísticas.</div>');
            }
        });
    }
    

    // Funciones para cada tab (pill)
    function cargarTotales() {
        if (!validarFechas()) return;
        const filtros = getFiltrosEstadisticas();
        // Aquí puedes hacer una petición AJAX o manipular el DOM según los filtros
        console.log('Totales:', filtros);
    }

    function cargarAgenda() {
        if (!validarFechas()) return;
        const filtros = getFiltrosEstadisticas();
        console.log('Agenda:', filtros);
        $.ajax({
            url: '{{ route("laboratorio.estadisticas.buscar") }}',
            type: 'GET',
            data: {
                fecha_inicio: filtros.fecha_inicio,
                fecha_fin: filtros.fecha_final,
                id_institucion: filtros.institucion,
                id_sucursal: filtros.profesional,
                id_profesional: filtros.profesional,
                tipo_estadistica: 'agenda'
            },
            success: function(response) {
                console.log(response);
                // Aquí puedes renderizar los resultados
                $('#grafico_agenda').html(response || '<div class="alert alert-info">No hay resultados para el rango seleccionado.</div>');
            },
            error: function(error) {
                console.log(error);
                $('#grafico_agenda').html('<div class="alert alert-danger">Error al buscar estadísticas.</div>');
            }
        });
    }

    function cargarVentas() {
        if (!validarFechas()) return;
        const filtros = getFiltrosEstadisticas();
        console.log('Ventas:', filtros);

        // Petición AJAX (ajusta la ruta según tu backend)
        $.ajax({
            url: '{{ route("laboratorio.estadisticas.buscar") }}',
            type: 'GET',
            data: {
                fecha_inicio: filtros.fecha_inicio,
                fecha_fin: filtros.fecha_final,
                id_institucion: filtros.institucion,
                id_profesional : filtros.profesional,
                id_sucursal: filtros.profesional,
                tipo_estadistica: 'ventas'
            },
            success: function(response) {
                console.log(response);
                // Aquí puedes renderizar los resultados
                $('#grafico_ventas').html(response || '<div class="alert alert-info">No hay resultados para el rango seleccionado.</div>');
            },
            error: function(error) {
                console.log(error);
                $('#grafico_ventas').html('<div class="alert alert-danger">Error al buscar estadísticas.</div>');
            }
        });
    }

    function cargarProfesional() {
        if (!validarFechas()) return;
        // if (!validarProfesional()) return;
        const filtros = getFiltrosEstadisticas();
        console.log('Profesional:', filtros);
        // Petición AJAX (ajusta la ruta según tu backend)
        $.ajax({
            url: '{{ route("laboratorio.estadisticas.buscar") }}',
            type: 'GET',
            data: {
                fecha_inicio: filtros.fecha_inicio,
                fecha_fin: filtros.fecha_final,
                id_institucion: filtros.institucion,
                id_sucursal: filtros.profesional,
                id_profesional: filtros.profesional,
                tipo_estadistica: 'profesional'
            },
            success: function(response) {
                console.log(response);
                // Aquí puedes renderizar los resultados
                $('#grafico_profesional').html(response || '<div class="alert alert-info">No hay resultados para el rango seleccionado.</div>');
            },
            error: function(error) {
                console.log(error);
                $('#grafico_profesional').html('<div class="alert alert-danger">Error al buscar estadísticas.</div>');
            }
        });
    }

    function cargarTratamientos() {
        if (!validarFechas()) return;
        const filtros = getFiltrosEstadisticas();
        console.log('Tratamientos:', filtros);
        // Petición AJAX (ajusta la ruta según tu backend)
        $.ajax({
            url: '{{ route("laboratorio.estadisticas.buscar") }}',
            type: 'GET',
            data: {
                fecha_inicio: filtros.fecha_inicio,
                fecha_fin: filtros.fecha_final,
                id_institucion: filtros.institucion,
                id_sucursal: filtros.profesional,
                id_profesional: filtros.profesional,
                tipo_estadistica: 'tratamientos'
            },
            success: function(response) {
                console.log(response);
                // Aquí puedes renderizar los resultados
                $('#grafico_tratamientos').html(response || '<div class="alert alert-info">No hay resultados para el rango seleccionado.</div>');
            },
            error: function(error) {
                console.log(error);
                $('#grafico_tratamientos').html('<div class="alert alert-danger">Error al buscar estadísticas.</div>');
            }
        });
    }

    function cargarProductos() {
        if (!validarFechas()) return;
        const filtros = getFiltrosEstadisticas();
        console.log('Productos:', filtros);
        // Petición AJAX (ajusta la ruta según tu backend)
        $.ajax({
            url: '{{ route("laboratorio.estadisticas.buscar") }}',
            type: 'GET',
            data: {
                fecha_inicio: filtros.fecha_inicio,
                fecha_fin: filtros.fecha_final,
                id_institucion: filtros.institucion,
                id_sucursal: filtros.sucursal,
                id_profesional: filtros.profesional,
                tipo_estadistica: 'productos'
            },
            success: function(response) {
                console.log(response);
                // Aquí puedes renderizar los resultados
                $('#grafico_productos').html(response || '<div class="alert alert-info">No hay resultados para el rango seleccionado.</div>');
            },
            error: function(error) {
                console.log(error);
                $('#grafico_productos').html('<div class="alert alert-danger">Error al buscar estadísticas.</div>');
            }
        });
    }

    function cargarComision() {
        if (!validarFechas()) return;
        if (!validarProfesional()) return;
        const filtros = getFiltrosEstadisticas();
        console.log('Comisión:', filtros);
        $.ajax({
            url: '{{ route("laboratorio.estadisticas.buscar") }}',
            type: 'GET',
            data: {
                fecha_inicio: filtros.fecha_inicio,
                fecha_fin: filtros.fecha_final,
                id_institucion: filtros.institucion,
                id_sucursal: filtros.sucursal,
                id_profesional: filtros.profesional,
                tipo_estadistica: 'comisiones'
            },
            success: function(response) {
                console.log(response);
                // Aquí puedes renderizar los resultados
                $('#grafico_comision').html(response || '<div class="alert alert-info">No hay resultados para el rango seleccionado.</div>');
            },
            error: function(error) {
                console.log(error);
                $('#grafico_comision').html('<div class="alert alert-danger">Error al buscar estadísticas.</div>');
            }
        });
    }
    function cargarComisiones() {
        if (!validarFechas()) return;
        const filtros = getFiltrosEstadisticas();
        console.log('Comisiones:', filtros);
    }

    function cargarComisionAtencion() {
        if (!validarFechas()) return;
        const filtros = getFiltrosEstadisticas();
        console.log('Comisión por atención:', filtros);
    }

    function cargarConsolidado() {
        if (!validarFechas()) return;
        const filtros = getFiltrosEstadisticas();
        console.log('Consolidado:', filtros);
    }

    function cargarBoletas() {
        if (!validarFechas()) return;
        const filtros = getFiltrosEstadisticas();
        console.log('Boletas:', filtros);
    }

    function cargarBonos() {
        if (!validarFechas()) return;
        const filtros = getFiltrosEstadisticas();
        console.log('Bonos:', filtros);
        $.ajax({
            url: '{{ route("laboratorio.estadisticas.buscar") }}',
            type: 'GET',
            data: {
                fecha_inicio: filtros.fecha_inicio,
                fecha_fin: filtros.fecha_final,
                id_institucion: filtros.institucion,
                id_sucursal: filtros.sucursal,
                id_profesional: filtros.profesional,
                tipo_estadistica: 'bonos'
            },
            success: function(response) {
                console.log(response);
                // Aquí puedes renderizar los resultados
                $('#grafico_bonos').html(response || '<div class="alert alert-info">No hay resultados para el rango seleccionado.</div>');
            },
            error: function(error) {
                console.log(error);
                $('#grafico_bonos').html('<div class="alert alert-danger">Error al buscar estadísticas.</div>');
            }
        });
    }

    function cargarRetiros() {
        if (!validarFechas()) return;
        const filtros = getFiltrosEstadisticas();
        console.log('Retiros:', filtros);
    }

    function cargarExcedentes() {
        if (!validarFechas()) return;
        const filtros = getFiltrosEstadisticas();
        console.log('Venta de excedentes:', filtros);
    }

    function cargarPacientes() {
        if (!validarFechas()) return;
        const filtros = getFiltrosEstadisticas();
        console.log('Pacientes:', filtros);
        $.ajax({
            url: '{{ route("laboratorio.estadisticas.buscar") }}',
            type: 'GET',
            data: {
                fecha_inicio: filtros.fecha_inicio,
                fecha_fin: filtros.fecha_final,
                id_institucion: filtros.institucion,
                id_sucursal: filtros.sucursal,
                id_profesional: filtros.profesional,
                tipo_estadistica: 'pacientes'
            },
            success: function(response) {
                console.log(response);
                // Aquí puedes renderizar los resultados
                $('#grafico_pacientes').html(response || '<div class="alert alert-info">No hay resultados para el rango seleccionado.</div>');
            },
            error: function(error) {
                console.log(error);
                $('#grafico_pacientes').html('<div class="alert alert-danger">Error al buscar estadísticas.</div>');
            }
        });
    }   

        // Asignar eventos al cambiar de tab
        document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('pills-totales-tab').addEventListener('click', cargarTotales);
        document.getElementById('pills-agenda-tab').addEventListener('click', cargarAgenda);
        document.getElementById('pills-ventas-tab').addEventListener('click', cargarVentas);
        document.getElementById('pills-profesional-tab').addEventListener('click', cargarProfesional);
        document.getElementById('pills-tratamientos-tab').addEventListener('click', cargarTratamientos);
        document.getElementById('pills-productos-tab').addEventListener('click', cargarProductos);
        document.getElementById('pills-comision-tab').addEventListener('click', cargarComision);
        document.getElementById('pills-comisiones-tab').addEventListener('click', cargarComisiones);
        document.getElementById('pills-comisionatencion-tab').addEventListener('click', cargarComisionAtencion);
        document.getElementById('pills-consolidado-tab').addEventListener('click', cargarConsolidado);
        document.getElementById('pills-boletas-tab').addEventListener('click', cargarBoletas);
        document.getElementById('pills-bonos-tab').addEventListener('click', cargarBonos);
        document.getElementById('pills-retiros-tab').addEventListener('click', cargarRetiros);
        // document.getElementById('pills-excedentes-tab').addEventListener('click', cargarExcedentes);
        document.getElementById('pills-pacientes-tab').addEventListener('click', cargarPacientes);

        // Cargar la pestaña activa al cargar la página
        const activeTab = document.querySelector('.nav-link.active');
        if (activeTab) {
            activeTab.click();
        }
    });
</script>
@endsection
