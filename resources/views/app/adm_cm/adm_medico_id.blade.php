@extends('template.adm_cm.template')
@section('content')
<!--****Container Completo****-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Administración Médica del {{ $institucion->nombre }}</h5>
                        </div>
                        <ul class="breadcrumb">
                            {{-- <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li> --}}
                            <li class="breadcrumb-item"><a href="{{ ROUTE('profesional.home')  }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i> Volver a mi escritorio profesional</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="card subir">
                        <a href="{{ ROUTE('adm_cm.profesionales_id',['id' => $institucion->id]) }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-70 text-center" src="{{ asset('images/iconos/laboratorio_1.svg') }}">
                                <h5 class="mt-2">Mis profesionales</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card subir">
                        <a href="{{ ROUTE('adm_cm.examenes') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-70 text-center" src="{{ asset('images/iconos/examen.svg') }}">
                                <h5 class="mt-2">Decretos ministeriales recibidos</h5>
                            </div>
                        </a>
                    </div>
                </div>
               <div class="col-md-6">
                    <div class="card subir">
                         <a href="{{ ROUTE('profesional.historial_mensajes') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-70 text-center" src="{{ asset('images/iconos/examen.svg') }}">
                                <h5 class="mt-2">Historial enviados</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card subir">
                         <a href="{{ ROUTE('profesional.historial_mensajes') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-70 text-center" src="{{ asset('images/iconos/examen.svg') }}">
                                <h5 class="mt-2">Reclamos, sugerencias y felicitaciones</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if(isset($instituciones))
<!-- MODAL SELECCIONAR INSTITUCION -->
<div class="modal fade" id="modalSeleccionarInstitucion" tabindex="-1" aria-labelledby="modalSeleccionarInstitucionLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSeleccionarInstitucionLabel">Seleccionar institución</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="institucion">Institución</label>
                    <select class="form-control" id="institucion">
                        <option value="0">Seleccione una institución</option>

                        @foreach ($instituciones as $institucion)
                            <option value="{{ $institucion->id }}">{{ $institucion->nombre }}</option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="seleccionar_institucion()">Seleccionar</button>
            </div>
        </div>
    </div>
</div>
@endif
<!--****Cierre Container Completo****-->
@endsection

@section('page-script')
<script>
    window.onload= function(){
        console.log('hola');
        // mostrar modal
        $('#modalSeleccionarInstitucion').modal('show');
    }

    function seleccionar_institucion(){
        var institucion = $('#institucion').val();
        if(institucion == '' || institucion == null || institucion == 0){
            return swal({
                title: "¡Advertencia!",
                text: "Debe seleccionar una institución",
                icon: "warning",
                button: "Aceptar",
            });
        }
        window.location.href = "{{ url('Administrador/Adm_medico/') }}/" + institucion;
    }
</script>
@endsection
