<!-- BASE -->
@extends('layouts.base_sin_estilos')

<!-- STYLES -->
@section('page-styles')
<style>
    body{
        font-size:12px;
    }
    .color-azul{
        color: #4680ff;
    }
    .color-azul:hover{
        color: #4680ff;
    }

    table{
        width: 100%;
    }

    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}

th, td {
  border-color: #333333;
}

</style>    
@endsection

<!-- SCRIPT -->
@section('page-script')
    <!-- Tablas ficha médica única-->
    <script src="{{ asset('/js/ficha_medica/main.js') }}"></script>
    
@endsection

<!-- CONTENT -->
@section('content')
    @php
    $paciente = (object) $cuerpo['paciente'];
    $contacto_emergencia = (object) $cuerpo['contacto_emergencia'];
    $grupo_sanguineo = (object) $cuerpo['grupo_sanguineo'];
    $antecedentes_paciente = (object) $cuerpo['antecedentes_paciente'];
    $antecedentes = (object) $cuerpo['antecedentes'];
    $direccion = (object) $cuerpo['direccion'];
    @endphp
    <div class="container">
        <!-- MENU -->
        <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
            <h3>FICHA MÉDICA ÚNICA</h3>
            <hr>
        </nav>
    </div>

  
    <!-- ANTECEDENTES BASICOS -->
    <div class="container">            
        <div class="row">
            <div class="col-sm-12">
                <div class="card">                   
                    <div class="card-body">                                             
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-md-12"><h4>Información del Paciente</h4></div>
                                </div>   
                                <div class="form-group fill">
                                    <label for="inputEmail4">Nombre: <span id="nombre">{{$paciente->nombres}}</span></label>                                                                        
                                </div>
                                <div class="form-group fill">
                                    <label for="inputEmail4">Apellidos: <span id="apellido">{{$paciente->apellido_uno}} {{$paciente->apellido_dos}}</span></label>                                                                        
                                </div>
                                <div class="form-group fill">
                                    <label for="inputEmail4">Rut: <span id="rut">{{$paciente->rut}}</span></label>                                                                        
                                </div>
                                <div class="form-group fill">
                                    <label for="inputEmail4">Fecha nacimiento: <span id="edad">{{$paciente->fecha_nac}}</span></label>                                                                        
                                </div>
                                <div class="form-group fill">
                                    <label for="inputEmail4">Edad: <span id="edad">{{$paciente->edad}}</span></label>                                                                                                        </div>
                                <div class="form-group fill">
                                    <label for="inputEmail4">Teléfono: <span id="telefono">{{$paciente->telefono_uno}} / {{$paciente->telefono_dos}}</span></label>                                                                        
                                </div>
                                <div class="form-group fill">
                                    <label for="inputEmail4">Dirección: <span id="direccion">{{$direccion->direccion}} / Nº: {{$direccion->numero}}</span></label>                                                                        
                                </div>
                                <div class="form-group fill">
                                    <label for="inputEmail4">Comuna/Región: <span id="comuna">{{$direccion->ciudad}}/{{$direccion->region}}</span></label>                                                                        
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-md-12"><h4>Contacto de Emergencia</h4></div>
                                </div>   
                                <div class="form-group fill">
                                    <label for="inputEmail4">Nombre: <span id="nombre_contacto">{{$contacto_emergencia->nombre}}</span></label>                                                                        
                                </div>
                                <div class="form-group fill">
                                    <label for="inputEmail4">Apellidos: <span id="apellido_contacto">{{$contacto_emergencia->apellido_uno}} {{$contacto_emergencia->apellido_dos}}</span></label>                                                                        
                                </div>
                                <div class="form-group fill">
                                    <label for="inputEmail4">Rut: <span id="rut_contacto">{{$contacto_emergencia->rut}}</span></label>                                                                        
                                </div>
                                <div class="form-group fill">
                                    <label for="inputEmail4">Edad: <span id="edad_contacto">{{$contacto_emergencia->edad}}</span></label>                                                                        
                                </div>
                                <div class="form-group fill">
                                    <label for="inputEmail4">Teléfono: <span id="telefono_contacto">{{$contacto_emergencia->telefono}}</span></label>                                                                        
                                </div>
                                <div class="form-group fill">
                                    <label for="inputEmail4">Parentezco: <span id="direccion_contacto">{{$contacto_emergencia->parentezco}}</span></label>                                                                        
                                </div>
                                
                            </div>                           
                        </div>                        
                    </div>
                </div>    
            </div>
        </div>                              
    </div>


    <!-- RESUMEN -->
    <div class="container">            
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>RESUMEN</h5>
                    </div>
                    <div class="card-body">  
                        <table>
                            <tr>
                                <th>Grupo Sanguíneo</th>
                                <th>Medicamentos de Uso Crónico</th>
                                <th>¿Acepta Transfusiones?</th>
                                <th>Últimas Cirugías</th>
                                <th>Enfermedades Crónicas</th>
                                <th>Alergias</th>
                            </tr>    
                            <tr>
                                <th>{{$grupo_sanguineo->nombre_gs}}</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>   
                        </table>                                                   
                    </div>
                </div>    
            </div>
        </div>                              
    </div>

    <!-- TRANSFUCIONES -->
    <div class="container">            
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>TRANSFUSIONES Y DONACIÓN DE ÓRGANOS</h5>
                    </div>
                    <div class="card-body">        
                        <table>
                            <tr>
                                <th>Donante Total</th>
                                <th>Donante Parcial</th>
                                <th>Organos a Donar</th>
                                <th>Donar Sangre</th>
                                <th>Realiza Transfusiones</th>
                                <th>Impedimento Donar</th>
                            </tr>    
                            <tr>
                                <th></th>
                                <th>{{$antecedentes_paciente->dona_organos_parcial}}</th>
                                <th>{{$antecedentes_paciente->dona_organos}}</th>
                                <th>{{$antecedentes_paciente->dona_sangre}}</th>
                                <th>{{$antecedentes_paciente->transfusion}}</th>
                                <th>{{$antecedentes_paciente->impedimento_donar}}</th>
                            </tr>   
                        </table>                                                                    
                    </div>
                </div>    
            </div>
        </div>                              
    </div>
    
    <div class="container">            
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>ANESTESIAS PACIENTE</h5>
                    </div>
                    <div class="card-body">                                             
                        <div class="row">
                            <div class="col-sm-12">
                                <table border="1" style="witdh:100%;" class="table table-bordered">
                                    <tr>
                                        <th>ID</th>
                                        <th>Procedimiento</th>
                                        <th>Detalle</th>
                                        <th>Rut responsable</th>
                                        <th>Profesional</th>
                                        <th>Fecha</th>
                                    </tr>
                                    @php
                                    $cont=0;
                                    @endphp                               
                                    @foreach ($antecedentes as $data)      
                                        @if($data->id_tipo_antecedente==1)      
                                        @php
                                        $cont++;
                                        @endphp                              
                                        <tr>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->antecedente_data->procedimiento }}</td>
                                        <td>{{ $data->antecedente_data->detalle }}</td>
                                        <td>{{ $data->antecedente_data->rut_responsable }}</td>
                                        <td>{{ $data->users->name }}</td>
                                        <td>{{ $data->create_at}}
                                        </tr>    
                                        @endif
                                        @if($cont==0)
                                        <tr>
                                            <td colspan="6" style="text-align: center; vertical-align: middle;"><b>Sin Registros</b></td>
                                        </tr> 
                                        @endif
                                    @endforeach
                                    
                                </table>
                            </div>        
                        </div>                        
                    </div>
                </div>    
            </div>
        </div>                              
    </div>
    <div class="container">            
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>ANTECEDENTES CIRUGIAS</h5>
                    </div>
                    <div class="card-body">                                             
                        <div class="row">
                            <div class="col-sm-12">
                            <table border="1" class="table table-bordered">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Fecha Cirugía</th>
                                        <th>Comentario</th>                                        
                                        <th>Fecha</th>
                                    </tr>
                                    @php
                                    $cont=0;
                                    @endphp                                 
                                    @foreach ($antecedentes as $data)                                        
                                        @if($data->id_tipo_antecedente==2)  
                                        @php
                                        $cont++;
                                        @endphp
                                        <tr>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->antecedente_data->nombre }}</td>
                                        <td>{{ $data->antecedente_data->fecha }}</td>
                                        <td>{{ $data->antecedente_data->comentario }}</td>
                                        <td>{{ $data->create_at}}
                                        </tr>    
                                        @endif
                                        @if($cont==0)
                                        <tr>
                                            <td colspan="5" style="text-align: center; vertical-align: middle;"><b>Sin Registros</b></td>
                                        </tr> 
                                        @endif
                                    @endforeach
                                    
                                </table>
                            </div>        
                        </div>                        
                    </div>
                </div>    
            </div>
        </div>                              
    </div>
    <div class="container">            
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>ANTECEDENTES FRACTURAS PACIENTES</h5>
                    </div>
                    <div class="card-body">                                             
                        <div class="row">
                            <div class="col-sm-12">
                            <table border="1" class="table table-bordered">
                                    <tr>
                                        <th>ID</th>
                                        <th>Procedimiento</th>
                                        <th>Detalle</th>
                                        <th>Rut responsable</th>
                                        <th>Profesional</th>
                                        <th>Fecha</th>
                                    </tr>
                                    @php
                                    $cont=0;
                                    @endphp                                
                                    @foreach ($antecedentes as $data)         
                                        @if($data->id_tipo_antecedente==3)       
                                        @php
                                        $cont++;
                                        @endphp                          
                                        <tr>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->antecedente_data->procedimiento }}</td>
                                        <td>{{ $data->antecedente_data->detalle }}</td>
                                        <td>{{ $data->antecedente_data->rut_responsable }}</td>
                                        <td>{{ $data->users->name }}</td>
                                        <td>{{ $data->create_at}}
                                        </tr>    
                                        @endif
                                        @if($cont==0)
                                        <tr>
                                            <td colspan="6" style="text-align: center; vertical-align: middle;"><b>Sin Registros</b></td>
                                        </tr> 
                                        @endif
                                    @endforeach
                                    
                                </table>
                            </div>        
                        </div>                        
                    </div>
                </div>    
            </div>
        </div>                              
    </div>
    <div class="container">            
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>ANTECEDENTES HEMORRAGIAS PACIENTE</h5>
                    </div>
                    <div class="card-body">                                             
                        <div class="row">
                            <div class="col-sm-12">
                            <table border="1" class="table table-bordered">
                                    <tr>
                                        <th>ID</th>
                                        <th>Procedimiento</th>
                                        <th>Detalle</th>
                                        <th>Rut responsable</th>
                                        <th>Profesional</th>
                                        <th>Fecha</th>
                                    </tr>
                                    @php
                                    $cont=0;
                                    @endphp                                  
                                    @foreach ($antecedentes as $data)           
                                        @if($data->id_tipo_antecedente==4)        
                                        @php
                                        $cont++;
                                        @endphp                       
                                        <tr>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->antecedente_data->procedimiento }}</td>
                                        <td>{{ $data->antecedente_data->detalle }}</td>
                                        <td>{{ $data->antecedente_data->rut_responsable }}</td>
                                        <td>{{ $data->users->name }}</td>
                                        <td>{{ $data->create_at}}
                                        </tr>    
                                        @endif
                                        @if($cont==0)
                                        <tr>
                                            <td colspan="6" style="text-align: center; vertical-align: middle;"><b>Sin Registros</b></td>
                                        </tr> 
                                        @endif
                                    @endforeach
                                    
                                </table>
                            </div>        
                        </div>                        
                    </div>
                </div>    
            </div>
        </div>                              
    </div>

    <div class="container">            
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>ANTECEDENTE ALERGIAS</h5>
                    </div>
                    <div class="card-body">                                             
                        <div class="row">
                            <div class="col-sm-12">
                            <table border="1" class="table table-bordered">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre Alergia</th> 
                                        <th>Comentario</th>                                        
                                        <th>Fecha</th>
                                    </tr>
                                    @php
                                    $cont=0;
                                    @endphp                                  
                                    @foreach ($antecedentes as $data)     
                                        @if($data->id_tipo_antecedente==5)            
                                        @php
                                        $cont++;
                                        @endphp                       
                                        <tr>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->antecedente_data->nombre }}</td>  
                                        <td>{{ $data->antecedente_data->comentario }}</td>                                       
                                        <td>{{ $data->create_at}}
                                        </tr>    
                                        @endif
                                        @if($cont==0)
                                        <tr>
                                            <td colspan="4" style="text-align: center; vertical-align: middle;"><b>Sin Registros</b></td>
                                        </tr> 
                                        @endif
                                    @endforeach
                                    
                                </table>
                            </div>        
                        </div>                        
                    </div>
                </div>    
            </div>
        </div>                              
    </div>

    <div class="container">            
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>ANTECEDENTE ENFERMEDADES CRONICAS</h5>
                    </div>
                    <div class="card-body">                                             
                        <div class="row">
                            <div class="col-sm-12">
                            <table border="1" class="table table-bordered">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre Patología Cronica</th>                                        
                                        <th>Fecha</th>
                                    </tr>
                                    @php
                                    $cont=0;
                                    @endphp                                    
                                    @foreach ($antecedentes as $data)     
                                        @if($data->id_tipo_antecedente==6)   
                                        @php
                                        $cont++;
                                        @endphp                                
                                        <tr>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->antecedente_data->nombre_enfermedad_cronica }}</td>                                        
                                        <td>{{ $data->create_at}}
                                        </tr>    
                                        @endif
                                        @if($cont==0)
                                        <tr>
                                            <td colspan="3" style="text-align: center; vertical-align: middle;"><b>Sin Registros</b></td>
                                        </tr> 
                                        @endif
                                    @endforeach
                                    
                                </table>
                            </div>        
                        </div>                        
                    </div>
                </div>    
            </div>
        </div>                              
    </div>

    <div class="container">            
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>ANTECEDENTE ENFERMEDADES CRONICAS</h5>
                    </div>
                    <div class="card-body">                                             
                        <div class="row">
                            <div class="col-sm-12">
                            <table border="1" class="table table-bordered">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre Medicamento Cronico</th>                                        
                                        <th>Dosis</th>                                        
                                        <th>Fecha</th>
                                    </tr>
                                    @php
                                    $cont=0;
                                    @endphp
                                    @foreach ($antecedentes as $data)     
                                        @if($data->id_tipo_antecedente==7) 
                                        @php
                                        $cont++;
                                        @endphp
                                        <tr>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->antecedente_data->nombre_medicamento_cronico }}</td>  
                                            <td>{{ $data->antecedente_data->dosis }}</td>                                       
                                        </tr>  
                                        @endif
                                        @if($cont==0)
                                        <tr>
                                        <td colspan="4" style="text-align: center; vertical-align: middle;"><b>Sin Registros</b></td>
                                        </tr> 
                                        @endif
                                    @endforeach
                                    
                                </table>
                            </div>        
                        </div>                        
                    </div>
                </div>    
            </div>
        </div>                              
    </div>

@endsection


