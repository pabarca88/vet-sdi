@extends('template.adm_cm.template')
@section('content')
<!--****Container Completo****-->
<style>
    .select2-container--open{
        z-index: 9999999 !important;
    }
</style>
<!--Container Completo-->
<div class="pcoded-main-container">
    <div class="pcoded-content m-top">
        <div class="page-header">
            <div class="page-block">
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <div class="page-header-title">
                        </div>
                        <ul class="breadcrumb mb-4">
                            @if($profesional->id_tipo_institucion == 3)
                                <li class="breadcrumb-item"><a href="{{ route('laboratorio.adm_general.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('laboratorio.configuracion') }}" data-toggle="tooltip" data-placement="top" title="Volver al panel de configuración">Panel de Configuración</a></li>
                            @else
                                <li class="breadcrumb-item"><a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('profesional.configuracion') }}" data-toggle="tooltip" data-placement="top" title="Volver al panel de configuración">Panel de Configuración</a></li>
                            @endif


                            <li class="breadcrumb-item">
                                <a href="#">Convenios</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <div class="row bg-gris">
            <div class="col-sm-12">
                <div class="card mt-n4">
                    <div class="card-header bg-info">
                        <h6 class="text-white font-weight-bolder f-18 d-inline">Mis Convenios</h6>
                        <button class="btn btn-light btn-sm d-inline float-md-right" data-toggle="modal" data-target="#nuevoConvenioInstitucion"><i class="fa fa-plus" aria-hidden="true"></i> Registrar nuevo convenio</button>
                    </div>
                    <div class="card-body" id="card_body_convenios_profesional">
                        <table id="tabla_convenios_profesional" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-wrap text-center align-middle">Convenio</th>
                                    <th class="align-middle">Rut</th>
                                    <th class="align-middle">Tipo</th>
                                    <th class="align-middle">Fecha Inicial</th>
                                    <th class="align-middle">Fecha Final</th>
                                    <th class="align-middle">Descuento</th>
                                    <th class="align-middle">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($convenios_empresas))
                                @foreach($convenios_empresas as $convenio)
                                    <tr>
                                        <td class="align-middle">{{ $convenio->nombre_convenio }}</td>
                                        <td class="align-middle">{{ $convenio->rut_empresa }}</td>
                                        <td class="align-middle">

                                        </td>
                                        <td class="align-middle">{{ $convenio->fecha_inicio }}</td>
                                        <td class="align-middle">{{ $convenio->fecha_termino }}</td>

                                        <td class="align-middle">{{ $convenio->porcentaje }}%</td>
                                        <td class="align-middle">
                                            <button class="btn btn-warning btn-icon" onclick="dame_convenio({{ $convenio->id }})" data-toggle="modal" data-target="#editarConvenioInstitucion"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm has-ripple" onclick="eliminar_tipo_convenio({{ $convenio->id }})"><i class="fas fa-trash"></i> </button>
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- DATOS DE VITAL IMPORTANCIA -->
<input type="hidden" name="id_convenio_profesional" id="id_convenio_profesional" value="">
@endsection

@section('js-profesionales')
<script>
    $(document).ready(function() {
        $('#productos_convenio_').select2();
        $('#productos_convenio_edicion').select2();
        $('#tipo_convenio').select2();
    });

    function guardar_nuevo_convenio_profesional(){
        var convenios = '';
        for (let i = 1; i < 13; i++) {
            if ($('#convenio_' + i).prop('checked')) {
                convenios = convenios + $('#text_convenio_' + i).text() + ',';
            }
        }
        var observaciones_nuevo_convenio = $('#observaciones_nuevo_convenio_prevision').val();
        var productos_convenio = $('#productos_convenio_').val();

        var valido = 1;
        var mensaje = '';

        if(convenios == ''){
            valido = 0;
            mensaje += '<li>Seleccione al menos un convenio</li>';
        }
        if(observaciones_nuevo_convenio == ''){
            valido = 0;
            mensaje += '<li>Ingrese observaciones</li>';
        }

        if(valido == 0){
            swal({
                title: 'Error',
                content: {
                    element: 'div',
                    attributes: {
                        innerHTML: mensaje
                    }
                },
                icon: 'error'
            });
            return false;
        }
        let conveniosSeleccionados = [];

        $('.custom-control-input:checked').each(function () {
            const id = $(this).attr('id').split('_')[1]; // Extrae el ID numérico
            const selectValue = $('#valor_convenio_' + id + ' select').val();
            const inputValue = $('#valor_convenio_' + id + ' input[type="number"]').val();

            conveniosSeleccionados.push({
                convenio: $('#text_convenio_' + id).text().replace(/\s+/g, ' ').trim(), // Elimina saltos de línea y espacios extra
                opcion: selectValue,
                condicion: inputValue
            });
        });

        let data = {
                observaciones_nuevo_convenio: observaciones_nuevo_convenio,
                convenios: convenios,
                conveniosSeleccionados: conveniosSeleccionados,
                _token: "{{ csrf_token() }}"
            }

           console.log(data);

        $.ajax({
            url: "{{ ROUTE('profesional.convenio_nuevo') }}",
            type: 'POST',
            data: data,
            success: function(response){
                console.log(response);
                if(response.estado == 1){
                    swal({
                        title: 'Convenio registrado',
                        text: response.mensaje,
                        icon: 'success'
                    });
                    $('#nuevoConvenioInstitucion').modal('hide');
                    let convenios = response.convenios_empresas;
                    console.log(convenios);
                    $('#tabla_convenios_profesional').DataTable().destroy();
                    $('#tabla_convenios_profesional tbody').empty();
                    convenios.forEach(convenio => {
                        let fila = '<tr>';
                        fila += '<td class="align-middle text-center">' + convenio.nombre_convenio + '</td>';
                        fila += '<td class="align-middle text-center">' + convenio.rut_empresa + '</td>';
                        fila += '<td class="align-middle text-center">' + convenio.tipo_convenio + '</td>';
                        fila += '<td class="align-middle text-center">' + convenio.fecha_inicio + '</td>';
                        fila += '<td class="align-middle text-center">' + convenio.fecha_termino + '</td>';
                        fila += '<td class="align-middle text-center">' + convenio.porcentaje + '</td>';
                        fila += '<td class="align-middle text-center">';
                        fila += '<button class="btn btn-warning btn-sm has-ripple" onclick="dame_convenio(' + convenio.id + ')" data-toggle="modal" data-target="#editarConvenioInstitucion"><i class="fa fa-edit" aria-hidden="true"></i></button>';
                        fila += '<button type="button" class="btn btn-danger btn-sm has-ripple" onclick="eliminar_convenio(' + convenio.id + ')"><i class="fas fa-trash"></i> </button>';
                        fila += '</td>';
                        fila += '</tr>';
                        $('#tabla_convenios_profesional tbody').append(fila);
                    });
                    $('#tabla_convenios_profesional').DataTable({
                        "language": {
                            "url": "{{ asset('js/Spanish.json') }}"
                        }
                    });
                }else{
                    swal({
                        title: 'Error',
                        text: response.mensaje,
                        icon: 'error'
                    });
                }
            }
        });
    }

    function limpiar_formulario(){
        $('#nombre_convenio').val('');
        $('#tipo_convenio').val(0);
        $('#porcentaje_dcto').val('');
        $('#tipo_convenio_institucion').val(0);
        $('#fecha_inicial_pago_convenio').val('');
        $('#fecha_final_pago_convenio').val('');
        $('#rut_representante_convenio').val('');
        $('#nombre_representante_convenio').val('');
        $('#telefono_representante_convenio').val('');
        $('#email_representante_convenio').val('');
        $('#direccion_representante_convenio').val('');
        $('#observaciones_nuevo_convenio').val('');
        $('#productos_convenio_').val(null).trigger('change');
    }

    function formatoRut(rut)
    {
        var valor = rut.value.replace('.','');
        valor = valor.replace(/\-/g,'');

        cuerpo = valor.slice(0,-1);
        dv = valor.slice(-1).toUpperCase();
        rut.value = cuerpo + '-'+ dv

        if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}

        suma = 0;
        multiplo = 2;

        for(i=1;i<=cuerpo.length;i++)
        {
            index = multiplo * valor.charAt(cuerpo.length - i);
            suma = suma + index;
            if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
        }

        dvEsperado = 11 - (suma % 11);
        dv = (dv == 'K')?10:dv;
        dv = (dv == 0)?11:dv;

        if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }

        rut.setCustomValidity('');
    }

    function eliminar_convenio(id){
        swal({
            title: 'Eliminar convenio',
            text: '¿Está seguro de eliminar este convenio?',
            icon: 'warning',
            buttons: true,
            dangerMode: true
        }).then((willDelete) => {
            if(willDelete){
                confirmar_eliminar_convenio(id);
            }
        })
    }

    function confirmar_eliminar_convenio(id){
        $.ajax({
            url: "{{ ROUTE('adm_cm.eliminar_convenio') }}",
            type: 'POST',
            data: {
                id: id,
                _token: "{{ csrf_token() }}"
            },
            success: function(response){
                console.log(response);
                if(response.estado == 1){
                    swal({
                        title: 'Convenio eliminado',
                        text: response.msj,
                        icon: 'success'
                    });
                    $('#card_body_convenios_profesional').empty();
                    $('#card_body_convenios_profesional').html(response.v);
                }else{
                    alert('Error al eliminar convenio');
                }
            }
        });
    }

    function dame_convenio(id){
        $.ajax({
            url: "{{ ROUTE('adm_cm.dame_convenio') }}",
            type: 'POST',
            data: {
                id: id,
                _token: "{{ csrf_token() }}"
            },
            success: function(response){
                $('#id_convenio_profesional').val(id);
                console.log(response);
                if(response.estado == 1){
                    $('#nombre_convenio_prevision_editar').val(response.convenio.nombre_convenio_institucion);
                    $('#tipo_convenio_edicion').val(response.convenio.id_tipo_convenio);
                    $('#porcentaje_dcto_edicion').val(response.convenio.porcentaje_convenio_institucion);
                    $('#tipo_convenio_institucion_edicion').val(response.convenio.id_tipo_convenio_institucion);
                    $('#fecha_inicial_pago_convenio_edicion').val(response.convenio.fecha_inicio_convenio_institucion);
                    $('#fecha_final_pago_convenio_edicion').val(response.convenio.fecha_fin_convenio_institucion);
                    $('#productos_convenio_edicion').val(response.convenio.productos).trigger('change');
                    $('#rut_representante_convenio_edicion').val(response.convenio.rut_representante_convenio_institucion);
                    $('#nombre_representante_convenio_edicion').val(response.convenio.nombre_representante_convenio_institucion);
                    $('#telefono_representante_convenio_edicion').val(response.convenio.telefono_representante_convenio_institucion);
                    $('#email_representante_convenio_edicion').val(response.convenio.email_representante_convenio_institucion);
                    $('#direccion_representante_convenio_edicion').val(response.convenio.direccion_representante_convenio_institucion);
                    $('#observaciones_edicion_convenio').val(response.convenio.observaciones_convenio_institucion);
                }else{
                    alert('Error al cargar convenio');
                }
            }
        });
    }
    /** buscar ciudad */
    function buscar_ciudad(id_ciudad=0) {
        let region = $('#region_empresa').val();
        let url = "{{ route('adm_cm.buscar_ciudad_region') }}";
        $.ajax({

            url: url,
            type: "get",
            data: {
                //_token: _token,
                region: region,
            },
        })
        .done(function(data) {
            if (data != null) {
                data = JSON.parse(data);

                let ciudades = $('#ciudad_empresa');

                ciudades.find('option').remove();
                ciudades.append('<option value="0">seleccione</option>');
                $(data).each(function(i, v) { // indice, valor
                    ciudades.append('<option value="' + v.id + '">' + v.nombre +
                        '</option>');
                })

                if(id_ciudad != 0)
                    ciudades.val(id_ciudad);

            } else {

                swal({
                    title: "Error",
                    text: "Error al cargar las ciudades",
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                })
                // alert('No se pudo Cargar las ciudades');
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });


    }

    function guardar_nuevo_convenio_profesional_empresa(){
        let id_empresa = $('#id_empresa').val();
        let nombre_convenio = $('#nombre_convenio').val();
        let tipo_convenio = $('#tipo_convenio').val();
        let porcentaje_dcto = $('#porcentaje_dcto').val();
        let tipo_convenio_institucion = $('#tipo_convenio_institucion').val();
        let fecha_inicial_pago_convenio = $('#fecha_inicial_pago_convenio').val();
        let fecha_final_pago_convenio = $('#fecha_final_pago_convenio').val();
        let convenio_indenifido = $('#convenio_infinito').is(':checked');
        let observaciones = $('#observaciones_nuevo_convenio').val();

        let valido = 1;
        let mensaje = '';

        if(nombre_convenio == ''){
            valido = 0;
            mensaje += '<li>Ingrese nombre de convenio</li>';
        }
        if(tipo_convenio == 0){
            valido = 0;
            mensaje += '<li>Seleccione tipo de convenio</li>';
        }
        if(porcentaje_dcto == ''){
            valido = 0;
            mensaje += '<li>Ingrese porcentaje de descuento</li>';
        }
        if(tipo_convenio_institucion == 0){
            valido = 0;
            mensaje += '<li>Seleccione tipo de convenio institución</li>';
        }
        if(fecha_inicial_pago_convenio == ''){
            valido = 0;
            mensaje += '<li>Seleccione fecha de pago</li>';
        }
        if(fecha_final_pago_convenio == ''){
            //valido = 0;
            mensaje += '<li>Seleccione fecha de finalización de pago</li>';
        }
        if(observaciones == ''){
            valido = 0;
            mensaje += '<li>Ingrese observaciones</li>';
        }

        if(valido == 0){
            swal({
                title: 'Error',
                content: {
                    element: 'div',
                    attributes: {
                        innerHTML: mensaje
                    }
                },
                icon: 'error'
            });
            return false;
        }

        let url = "{{ route('profesional.guardar_convenio_empresa') }}";
        let data = {
            id_empresa: id_empresa,
            nombre_convenio: nombre_convenio,
            tipo_convenio: tipo_convenio,
            porcentaje_dcto: porcentaje_dcto,
            tipo_convenio_institucion: tipo_convenio_institucion,
            fecha_inicial_pago_convenio: fecha_inicial_pago_convenio,
            fecha_final_pago_convenio: fecha_final_pago_convenio,
            convenio_indenifido: convenio_indenifido,
            observaciones: observaciones,
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            _token: "{{ csrf_token() }}"
        };

        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function(response){
                console.log(response);
                if(response.estado == 1){
                    swal({
                        title: 'Convenio registrado',
                        text: response.msj,
                        icon: 'success'
                    });
                    $('#nuevoConvenioInstitucion').modal('hide');
                    let convenios = response.convenios;
                    console.log(convenios);
                    $('#tabla_convenios_profesional').DataTable().destroy();
                    $('#tabla_convenios_profesional tbody').empty();
                    convenios.forEach(convenio => {
                        let fila = '<tr>';
                        fila += '<td class="align-middle text-center">' + convenio.nombre_convenio + '</td>';
                        fila += '<td class="align-middle text-center">' + convenio.rut_empresa + '</td>';
                        fila += '<td class="align-middle text-center">' + convenio.tipo_convenio + '</td>';
                        fila += '<td class="align-middle text-center">' + convenio.fecha_inicio + '</td>';
                        fila += '<td class="align-middle text-center">' + convenio.fecha_termino + '</td>';
                        fila += '<td class="align-middle text-center">' + convenio.porcentaje + '</td>';
                        fila += '<td class="align-middle text-center">';
                        fila += '<button class="btn btn-warning btn-sm has-ripple" onclick="dame_convenio(' + convenio.id + ')" data-toggle="modal" data-target="#editarConvenioInstitucion"><i class="fa fa-edit" aria-hidden="true"></i></button>';
                        fila += '<button type="button" class="btn btn-danger btn-sm has-ripple" onclick="eliminar_convenio(' + convenio.id + ')"><i class="fas fa-trash"></i> </button>';
                        fila += '</td>';
                        fila += '</tr>';
                        $('#tabla_convenios_profesional tbody').append(fila);
                    });
                    $('#tabla_convenios_profesional').DataTable({
                        "language": {
                            "url": "{{ asset('js/Spanish.json') }}"
                        }
                    });
                    limpiar_formulario();
                }else{
                    swal({
                        title: 'Error',
                        text: response.msj,
                        icon: 'error'
                    });
                }
            }
        });

    }
</script>
@endsection

@section('modales')
    @include('app.adm_cm.modal_adm.convenio_usuario')
    @include('app.adm_cm.modal_adm.convenio_profesional_nuevo')
    @include('app.adm_cm.modal_adm.convenio_editar')
@endsection
