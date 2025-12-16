@extends('template.asistente_on.template')
@section('content')
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Buscar Pacientes</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ ROUTE('asistentecm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ ROUTE('asistentecm.buscar_paciente') }}">Buscar Pacientes</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
             <!--Buscador de pacientes-->
                <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <div class="row">
                                <div class="col-md-12 align-botton">
                                    <h4 class="text-white f-20 d-inline ml-4 mt-3">Buscar Pacientes</h4>
                                    <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#agregar_paciente_asistente">
                                        <i class="feather icon-plus"></i> Registrar Paciente
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-12">
                                    <table id="tabla_pacientes_asistente" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Paciente</th>
                                            <th class="text-center align-middle">Nacimiento</th>
                                            <th class="text-center align-middle">Contacto</th>
                                            <th class="text-center align-middle">Convenio</th>
                                            <th class="text-center align-middle">Tipo de usuario</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($asistente->Paciente_normal() as $pa )
                                            <tr>
                                                <td class="text-center align-middle">
                                                    {{ $pa->nombre }}
                                                    {{ $pa->apellido_uno }}
                                                    {{ $pa->apellido_dos }}
                                                    <br>
                                                    {{ $pa->rut }}
                                                </td>
                                                <td class="text-center align-middle">
                                                    {{ \Carbon\Carbon::parse($pa->fecha_nac)->format('d-m-Y') }}
                                                </td>
                                                <td class="text-center align-middle">
                                                    {{ $pa->Direccion()->first()->direccion }}
                                                    #{{ $pa->Direccion()->first()->numero_dir }},
                                                    {{ $pa->Direccion()->first()->Ciudad()->first()->nombre }}
                                                    <br>
                                                    {{ $pa->email }}
                                                    <br>
                                                    {{ $pa->telefono_uno }}
                                                    </td>
                                                <td class="text-center align-middle">
                                                {{ $pa->Prevision()->first()->nombre }}
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="badge badge-primary">
                                                        @if (isset($pa->Premium()->first()->id))
                                                            Premiun
                                                        @else
                                                            Basico
                                                        @endif
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!--Cierre: Container Completo-->

    <!-- Modal registrar paciente-->
    <div id="agregar_paciente_asistente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="agregar_paciente_asistente" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                   <h5 class="modal-title text-white text-center">Registrar Paciente</h5>
                   <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form id="recetas_profesional">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <h6 class="text-c-blue ml-2 mb-3">Ingrese los datos del paciente</h6>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Rut</label>
                                    <input type="person" class="form-control" name="rut_paciente" id="rut_paciente">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Nombres</label>
                                    <input type="text" class="form-control" name="nombres_paciente" id="nombres_paciente">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Apellidos</label>
                                    <input type="text" class="form-control" name="apellidos_paciente" id="apellidos_paciente">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo">Fecha de nacimiento</label>
                                    <input type="date" class="form-control" name="nacimiento_paciente" id="nacimiento_paciente">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Convenio</label>
                                    <select id="convenio" name="convenio" class="form-control">
                                        <option>Selecione una opción</option>
                                        <option>Particular</option>
                                        <option>Fonasa</option>
                                        <option>Banmédica</option>
                                        <option>Colmena</option>
                                        <option>Cruz Blanca</option>
                                        <option>Nueva Masvida</option>
                                        <option>Consalud</option>
                                        <option>Cruz del Norte</option>
                                        <option>Vida Tres</option>
                                        <option>Isalud</option>
                                        <option value="control sin costo">Control sin costo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Dirección</label>
                                    <input type="address" class="form-control" name="direccion_paciente" id="direccion_paciente">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Comuna</label>
                                    <select id="comuna_paciente" name="comuna_paciente" class="form-control">
                                        <option>Seleccione una opción</option>
                                        <optgroup label="Valparaíso">
                                            <option>Viña del Mar</option>
                                            <option>La Calera</option>
                                            <option>Valparaíso</option>
                                        </optgroup> 
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Correo Electrónico</label>
                                    <input type="email" class="form-control" name="email_paciente" id="email_paciente">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Teléfono</label>
                                    <input type="tel" class="form-control" name="telefono_paciente" id="telefono_paciente">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                     <div class="switch switch-success d-inline m-r-10">
                                        <input type="checkbox" id="registro_alternativo_paciente" checked="">
                                        <label for="registro_alternativo_paciente" class="cr"></label>
                                    </div>
                                    <label>Notificar registro por correo electrónico</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                   <button type="submit" class="btn btn-info">Guardar Registro</button>
                </div>
            </div>
       </div>
    </div>
@endsection