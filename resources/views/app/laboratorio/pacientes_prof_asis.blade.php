@extends('template.laboratorio.laboratorio_profesional.template')

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
                                     <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Buscar Pacientes Institucion</a>
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
                                    {{--
                                    <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#agregar_paciente_asistente">
                                        <i class="feather icon-plus"></i> Registrar Paciente
                                    </button>
                                    --}}
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $lugares_atencion }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3 col-md-3">
                                    {{--  <input class="form-control form-control-sm" type="text" name="busqueda_rut" id="busqueda_rut" placeholder="RUT" value="" oninput="formatoRut(this)">  --}}
                                    <input class="form-control form-control-sm" type="text" name="busqueda_rut" id="busqueda_rut" placeholder="RUT" value="">
                                </div>
                                <div class="col-sm-3 col-md-3">
                                    <input class="form-control form-control-sm" type="text" name="busqueda_nombre" id="busqueda_nombre" placeholder="Nombre" value="">
                                </div>
                                <div class="col-sm-3 col-md-3">
                                    <input class="form-control form-control-sm" type="text" name="busqueda_apellido" id="busqueda_apellido" placeholder="Apellido" value="">
                                </div>
                                <div class="col-sm-3 col-md-3">
                                    <button type="button" class="btn btn-info btn-sm has-ripple" onclick="buscar_paciente();">Buscar Paciente</button>
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
                                        {{--  @foreach ($asistente->Paciente_normal() as $pa )
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
                                        @endforeach  --}}
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
@endsection

@section('page-script')
    <script>
        $(document).ready(function()
        {
            {{-- ****** VALIDACIONDEFORMULARIOS ****** --}}
            {{--  VALIDACION RUT BUSQUEDA --}}
            $("#busqueda_rut").rut({
                formatOn: 'keyup',
                minimumLength: 2,
                validateOn: 'change',
                useThousandsSeparator : false
            });
            {{--  $('#busqueda_rut').validate({
                rules: {
                    rut_paciente_reserva: {
                        required: true,
                        minlength: 9
                    },
                },
                messages: {
                    rut_paciente_reserva: {
                        required: "Debe Ingresar Rut",
                        minlength: "Por favor ingrese un Rut valido 1111111-1"
                    },
                },
            });  --}}

        });

        function buscar_paciente()
        {
            $('#tabla_pacientes_asistente tbody').html('');
            var rut = $('#busqueda_rut').val();
            var nombre = $('#busqueda_nombre').val();
            var apellido = $('#busqueda_apellido').val();
            if(rut == '' && nombre == '' && apellido == ''){
                swal({
                    title: "Busqueda de Paciente.",
                    text:"Debe Ingresar al menos un datos de busqueda.",
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
                $('#busqueda_rut').focus();
                return false;
            }

            let url = "{{ route('laboratorio.buscar_paciente_rut') }}";
            let id_lugar_atencion = $('#id_lugar_atencion').val();

            $.ajax({

                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    id_lugar_atencion: id_lugar_atencion,
                    rut: rut,
                    nombre: nombre,
                    apellido: apellido,
                },
            })
            .done(function(data) {
                console.log(data);
                if (data.estado == 1)
                {
                    $.each(data.registros, function(key, value){
                        var html = '';
                        html += '<tr>';
                        html += '    <td class="text-center align-middle">';
                        html += '        '+value.nombres+'';
                        html += '        '+value.apellido_uno+'';
                        html += '        '+value.apellido_dos+'';
                        html += '        <br>';
                        html += '        '+value.rut+'';
                        html += '    </td>';
                        html += '    <td class="text-center align-middle">';
                        html += '        '+value.fecha_nac+'';
                        html += '    </td>';
                        html += '    <td class="text-center align-middle">';
                        html += '        '+value.direccion.direccion+'';
                        html += '        #'+value.direccion.numero_dir+',';
                        html += '        '+value.direccion.ciudad.nombre+'';
                        html += '        <br>';
                        html += '        '+value.email+'';
                        html += '        <br>';
                        html += '        '+value.telefono_uno+'';
                        html += '        </td>';
                        html += '    <td class="text-center align-middle">';
                        html += '        '+value.prevision.nombre+'';
                        html += '    </td>';
                        html += '    <td class="align-middle text-center">';
                        html += '        <span class="badge badge-primary">';
                        if(value.premiun == 1)
                            html += '                Premiun';
                        else
                            html += '                Basico';
                        html += '        </span>';
                        html += '    </td>';
                        html += '</tr>';
                        $('#tabla_pacientes_asistente tbody').append(html);
                    });


                }
                else
                {
                    $('#tabla_pacientes_asistente tbody').html('<tr><td colspan="5">Paciente no encotnrado</td></tr>');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                {{--  console.log(jqXHR, ajaxOptions, thrownError)  --}}
            });

        }
    </script>
@endsection

