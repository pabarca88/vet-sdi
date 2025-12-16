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
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="font-weight-bolder">Mis Convenios</h5>
                        </div>
                        <ul class="breadcrumb mb-4">
                            <li class="breadcrumb-item">
                                <a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                    <i class="feather icon-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Convenios</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h5 class="text-white font-weight-bolder">Convenios</h5>
                    <button class="btn btn-info btn-sm mx-2 has-ripple float-right" data-toggle="modal" data-target="#nuevoConvenioInstitucion"><i class="fa fa-plus" aria-hidden="true"></i>Registrar nuevo convenio</button>
                </div>
                <div class="card-body" id="card_body_convenios_institucion">
                    <table id="tabla_convenios_institucion" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-wrap text-center align-middle">Convenio</th>
                                <th class="text-center align-middle">Tipo</th>
                                <th class="text-center align-middle">Fecha Inicial</th>
                                <th class="text-center align-middle">Fecha Final</th>
                                <th class="text-center align-middle">Productos</th>
                                <th class="text-center align-middle">Descuento</th>
                                <th class="text-center align-middle">Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($convenios_institucion as $convenio)
                                <tr>
                                    <td class="align-middle text-center">{{ $convenio->nombre_convenio_institucion }}</td>
                                    <td class="align-middle text-center">{{ $convenio->tipo_convenio }}</td>
                                    <td class="align-middle text-center">{{ $convenio->fecha_inicio_convenio_institucion }}</td>
                                    <td class="align-middle text-center">{{ $convenio->fecha_fin_convenio_institucion }}</td>
                                    <td class="align-middle text-center">
                                        @foreach($convenio->tipos_productos as $pc)
                                            <span>{{ $pc }}</span><br>
                                        @endforeach
                                    </td>
                                    <td class="align-middle text-center">{{ $convenio->porcentaje_convenio_institucion }}%</td>
                                    <td class="align-middle text-center">
                                        <button class="btn btn-warning btn-sm has-ripple" onclick="dame_convenio({{ $convenio->id }})" data-toggle="modal" data-target="#editarConvenioInstitucion"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm has-ripple" onclick="eliminar_convenio({{ $convenio->id }})"><i class="fas fa-trash"></i> </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

    </div>
</div>
<!-- DATOS DE VITAL IMPORTANCIA -->
<input type="hidden" name="id_convenio_institucion" id="id_convenio_institucion" value="">
@endsection

@section('js-profesionales')
<script>
    $(document).ready(function() {
        $('#productos_convenio_').select2();
        $('#productos_convenio_edicion').select2();
    });

    function guardar_nuevo_convenio_institucion(){
        var nombre_convenio = $('#nombre_convenio').val();
        var tipo_convenio = $('#tipo_convenio').val();
        var porcentaje_dcto = $('#porcentaje_dcto').val();
        var tipo_convenio_institucion = $('#tipo_convenio_institucion').val();
        var fecha_inicial_pago_convenio = $('#fecha_inicial_pago_convenio').val();
        var fecha_final_pago_convenio = $('#fecha_final_pago_convenio').val();
        var rut_representante_convenio = $('#rut_representante_convenio').val();
        var nombre_representante_convenio = $('#nombre_representante_convenio').val();
        var fecha_pago_convenio = $('#fecha_pago_convenio').val();
        var telefono_representante_convenio = $('#telefono_representante_convenio').val();
        var email_representante_convenio = $('#email_representante_convenio').val();
        var direccion_representante_convenio = $('#direccion_representante_convenio').val();
        var observaciones_nuevo_convenio = $('#observaciones_nuevo_convenio').val();
        var productos_convenio = $('#productos_convenio_').val();

        var valido = 1;
        var mensaje = '';

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
            valido = 0;
            mensaje += '<li>Seleccione fecha de finalización de pago</li>';
        }
        if(rut_representante_convenio == ''){
            valido = 0;
            mensaje += '<li>Ingrese rut representante</li>';
        }
        if(nombre_representante_convenio == ''){
            valido = 0;
            mensaje += '<li>Ingrese nombre representante</li>';
        }
        if(telefono_representante_convenio == ''){
            valido = 0;
            mensaje += '<li>Ingrese telefono representante</li>';
        }
        if(email_representante_convenio == ''){
            valido = 0;
            mensaje += '<li>Ingrese email representante</li>';
        }
        if(direccion_representante_convenio == ''){
            valido = 0;
            mensaje += '<li>Ingrese direccion representante</li>';
        }
        if(observaciones_nuevo_convenio == ''){
            valido = 0;
            mensaje += '<li>Ingrese observaciones</li>';
        }
        if(productos_convenio == null){
            valido = 0;
            mensaje += '<li>Seleccione productos a convenir</li>';
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

        $.ajax({
            url: "{{ ROUTE('adm_cm.convenio_nuevo') }}",
            type: 'POST',
            data: {
                nombre_convenio: nombre_convenio,
                tipo_convenio: tipo_convenio,
                porcentaje_dcto: porcentaje_dcto,
                tipo_convenio_institucion: tipo_convenio_institucion,
                fecha_inicial_pago_convenio: fecha_inicial_pago_convenio,
                fecha_final_pago_convenio: fecha_final_pago_convenio,
                rut_representante_convenio: rut_representante_convenio,
                nombre_representante_convenio: nombre_representante_convenio,
                telefono_representante_convenio: telefono_representante_convenio,
                email_representante_convenio: email_representante_convenio,
                direccion_representante_convenio: direccion_representante_convenio,
                observaciones_nuevo_convenio: observaciones_nuevo_convenio,
                productos_convenio: productos_convenio,
                _token: "{{ csrf_token() }}"
            },
            success: function(response){
                console.log(response);
                if(response.estado == 1){
                    swal({
                        title: 'Convenio registrado',
                        text: response.msj,
                        icon: 'success'
                    });
                    $('#nuevoConvenioInstitucion').modal('hide');
                    $('#card_body_convenios_institucion').empty();
                    $('#card_body_convenios_institucion').html(response.v);
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
                    $('#card_body_convenios_institucion').empty();
                    $('#card_body_convenios_institucion').html(response.v);
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
                $('#id_convenio_institucion').val(id);
                console.log(response);
                if(response.estado == 1){
                    $('#nombre_convenio_edicion').val(response.convenio.nombre_convenio_institucion);
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
</script>
@endsection

@section('modales')
    @include('app.adm_cm.modal_adm.convenio_usuario')
    @include('app.adm_cm.modal_adm.convenio_nuevo')
    @include('app.adm_cm.modal_adm.convenio_editar')
@endsection
