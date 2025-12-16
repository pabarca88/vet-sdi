@extends('template.laboratorio.laboratorio_asistente.template')

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
                                <h5 class="m-b-10 font-weight-bold">Carga de examentes</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Carga de examentes</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->

            <!--Tabla Carga de examentes-->
            <div class="row m-b-30">
                <div class="col-md-12">
                    <div class="card h-100 pb-0">
                        <div class="card-header text-center bg-c-info">
                            <div class="row">
                                <div class="col-sm-4 d-inline text-left">
                                    <h5 class="text-white my-2" style="font-size: 1.1rem;">Carga Examenes</h5>
                                    <input type="hidden" name="lista_id_lugares" id="lista_id_lugares" value="{{ $array_lugares }}">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pb-0 pt-4">
                            <div class="row pb-5">
                                <div class="col-md-3">
                                    <label class="floating-label-activo-sm">RUT Paciente</label>
                                    <input type="text" class="form-control form-control-sm" name="buscar_rut" id="buscar_rut" oninput="formatoRut(this)">
                                </div>
                                <div class="col-md-3">
                                    <label class="floating-label-activo-sm">Nombre Paciente</label>
                                    <input type="text" class="form-control form-control-sm" name="buscar_nombre" id="buscar_nombre">
                                </div>
                                <div class="col-md-3">
                                    <label class="floating-label-activo-sm">Apellido Paciente</label>
                                    <input type="text" class="form-control form-control-sm" name="buscar_apellido" id="buscar_apellido">
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-success btn-sm has-ripple" onclick="buscar_pacientes();"> Buscar</button>
                                </div>
                            </div>
                            <div class="dt-responsive table-responsive align-middle pb-0">
                                <table id="table_examenes_transcritos" class="table table-striped table-bordered nowrap table-sm" style="height: 100px">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-left">Fecha Atención</th>
                                            <th class="text-center align-left">Paciente</th>
                                            <th class="text-center align-left">Examen</th>
                                            <th class="text-center align-middle">Accion</th>
                                        </tr>
                                    </thead>
                                   <tbody>
                                        @if (isset($horas_medicas))
                                            @foreach ($horas_medicas as $ex_t)
                                                <tr>
                                                    <td class="text-center align-left">
                                                        {{ date('d-m-Y', strtotime($ex_t->fecha_realizacion_consulta)) }}
                                                    </td>
                                                    <td class="text-center align-left">
                                                        {{ $ex_t->paciente->nombres.' '.$ex_t->paciente->apellido_uno }}<br/>
                                                        {{ $ex_t->paciente->rut }}
                                                    </td>
                                                    <td class="text-center align-left bg-estado-light-amarillo">
                                                        {{ $ex_t->procedimientocentro->nombre }}
                                                    </td>
                                                    <td class="text-center align-left bg-estado-light-amarillo">
                                                        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="cargar archivo" onclick="abrir_subir_archivo('{{ $ex_t->id }}', '{{ $ex_t->fichaotrosprofesionales->id }}', '{{ $ex_t->fichaotrosprofesionales->id_paciente }}','{{ $ex_t->paciente->nombres.' '.$ex_t->paciente->apellido_uno }}', '{{ $ex_t->paciente->rut }}', '{{ $ex_t->fichaotrosprofesionales->id_profesional }}', '{{ $ex_t->procedimientocentro->nombre }}');"><i class="feather icon-upload"></i> CARGAR ARCHIVO</button>
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
        </div>
    </div>
    <!--Cierre: Container Completo-->

    <div class="modal fade" id="m_subir_examen" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="m_subir_examen" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white mt-1">Transcribir Examen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrar_m_subir_examen();"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="m_subir_examen_id_hora" id="m_subir_examen_id_hora" value="">
                    <input type="hidden" name="m_subir_examen_id_ficha_otros_profesionales" id="m_subir_examen_id_ficha_otros_profesionales" value="">
                    <input type="hidden" name="m_subir_examen_id_paciente" id="m_subir_examen_id_paciente" value="">
                    <input type="hidden" name="m_subir_examen_id_profesional" id="m_subir_examen_id_profesional" value="">

                    <div id="m_subir_examen_contenido">
                        <div class="row ml-0 mr-0">
                            <div class="col-md-12">Nombre: <span id="m_subir_examen_paciente_nombre"></span></div>
                            <div class="col-md-12">RUT: <span id="m_subir_examen_paciente_rut"></span></div>
                            <div class="col-md-12">Examen: <span id="m_subir_examen_procedimiento"></span></div>
                        </div>
                        <div class="row ml-0 mr-0">
                            <input type="hidden" name="input_lista_archivo" id="input_lista_archivo" value="">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <!-- [ Main Content ] start -->
                                <div class="dropzone" id="mis-archivos" action="{{ route('profesional.archivo.carga') }}">
                                </div>
                                <!-- [ file-upload ] end -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger align-middle" onclick="cerrar_m_subir_examen()"; data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-success align-middle" onclick="registrar_subir_examen()"; data-dismiss="modal">Guardar - Confirmar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script>
        function abrir_subir_archivo(id_hora, id_ficha_otros_profesionales, id_paciente, paciente_nombre, paciente_rut, id_profesional, procedimiento)
        {
            $('#m_subir_examen_id_hora').val('');
            $('#m_subir_examen_id_ficha_otros_profesionales').val('');
            $('#m_subir_examen_id_paciente').val('');
            $('#m_subir_examen_id_profesional').val('');

            $('#m_subir_examen_paciente_nombre').html('');
            $('#m_subir_examen_paciente_rut').html('');
            $('#m_subir_examen_procedimiento').html('');

            myDropzone_Archivo.removeAllFiles()
            // myDropzone_Archivo.destroy();
            // myDropzone_Archivo.init();


            $('#m_subir_examen_id_hora').val(id_hora);
            $('#m_subir_examen_id_ficha_otros_profesionales').val(id_ficha_otros_profesionales);
            $('#m_subir_examen_id_paciente').val(id_paciente);
            $('#m_subir_examen_id_profesional').val(id_profesional);

            $('#m_subir_examen_paciente_nombre').html(paciente_nombre);
            $('#m_subir_examen_paciente_rut').html(paciente_rut);
            $('#m_subir_examen_procedimiento').html(procedimiento);

            $('#m_subir_examen').modal('show');
        }

        function registrar_subir_examen()
        {
            var _token = $('#_token').val();
            var id_hora = $('#m_subir_examen_id_hora').val();
            var id_ficha_otros_profesionales = $('#m_subir_examen_id_ficha_otros_profesionales').val();
            var id_paciente = $('#m_subir_examen_id_paciente').val();
            var id_profesional = $('#m_subir_examen_id_profesional').val();
            var lista_archivos = $('#input_lista_archivo').val();

            url = "{{ route('laboratorio.subir.examen') }}";
            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token:_token,
                    id_hora:id_hora,
                    id_ficha_otros_profesionales:id_ficha_otros_profesionales,
                    id_paciente:id_paciente,
                    id_profesional:id_profesional,
                    lista_archivos:lista_archivos,
                },
            })
            .done(function(data)
            {
                // console.log('-----------------------');
                // console.log(data);
                // console.log('-----------------------');
                if(data.estado == 1)
                {
                    $('#m_subir_examen').modal('hide');

                    $('#m_subir_examen_id_hora').val('');
                    $('#m_subir_examen_id_ficha_otros_profesionales').val('');
                    $('#m_subir_examen_id_paciente').val('');
                    $('#m_subir_examen_id_profesional').val('');

                    $('#m_subir_examen_paciente_nombre').html('');
                    $('#m_subir_examen_paciente_rut').html('');
                    $('#m_subir_examen_procedimiento').html('');

                    myDropzone_Archivo.destroy();
                    myDropzone_Archivo.init();

                    var rut = $('#buscar_rut').val();
                    var nombre = $('#buscar_nombre').val();
                    var apellido = $('#buscar_apellido').val();
                    cargar_tabla_examen(rut, nombre, apellido)

                    swal({
                        title: "Carga Archivo.",
                        text:"Carga Exitosa",
                        icon: "success",
                    });
                }
                else
                {
                    var mensaje = '';
                    if(data.error)
                    {
                        $.each(data.error, function (indexInArray, valueOfElement)
                        {
                            mensaje += valueOfElement+'\n';
                        });
                    }
                    else
                    {
                        mensaje += 'Intente nuevamente.';
                    }

                    swal({
                        title: "Carga Archivo.",
                        text: mensaje,
                        icon: "error",
                    });
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        function cargar_tabla_examen(rut, nombre, apellido)
        {
            $('#table_examenes_transcritos tbody').html('');
            var lista_array = $('#lista_id_lugares').val();

            url = "{{ route('laboratorio.cargar.tabla.resultados') }}";
            $.ajax({

                url: url,
                type: "GET",
                data: {
                    lista_array:lista_array,
                    rut:rut,
                    nombre:nombre,
                    apellido:apellido,
                },
            })
            .done(function(data)
            {
                console.log('-----------------------');
                console.log(data);
                console.log('-----------------------');
                if(data.estado == 1)
                {
                    $('#table_examenes_transcritos tbody').html('');
                    $.each(data.registros, function (index, value)
                    {
                        var html = '';
                        html += '<tr>';
                        html += '    <td class="text-center align-left">';
                        html +=         value.fecha_realizacion_consulta;
                        html += '    </td>';
                        html += '    <td class="text-center align-left">';
                        html +=         value.paciente.nombres+' '+value.paciente.apellido_uno+'<br/>';
                        html +=         value.paciente.rut;
                        html += '    </td>';
                        html += '    <td class="text-center align-left bg-estado-light-amarillo">';
                        html +=         value.procedimiento_centro.nombre;
                        html += '    </td>';
                        html += '    <td class="text-center align-left bg-estado-light-amarillo">';
                        html += '        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="cargar archivo" onclick="abrir_subir_archivo(\''+value.id+'\', \''+value.ficha_otros_profesionales.id+'\', \''+value.ficha_otros_profesionales.id_paciente+'\',\''+value.paciente.nombres+' '+value.paciente.apellido_uno+'\', \''+value.paciente.rut+'\', \''+value.ficha_otros_profesionales.id_profesional+'\', \''+value.procedimiento_centro.nombre+'\');"><i class="feather icon-upload"></i> CARGAR ARCHIVO</button>';
                        html += '    </td>';
                        html += '</tr>';
                        $('#table_examenes_transcritos tbody').append(html);
                    });

                }
                else
                {
                    var mensaje = '';
                    if(data.error)
                    {
                        $.each(data.error, function (indexInArray, valueOfElement)
                        {
                            mensaje += valueOfElement+'\n';
                        });
                    }
                    else
                    {
                        mensaje += 'Intente nuevamente.';
                    }

                    swal({
                        title: "Carga tabla.",
                        text: mensaje,
                        icon: "error",
                    });
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        function cerrar_m_subir_examen()
        {
            $('#m_subir_examen').modal('hide');
        }

        /************** ARCHIVO **************/
        var myDropzone_Archivo ;
        Dropzone.options.misArchivos = {
            init:function()
            {
                myDropzone_Archivo = this;
            },
            url: "{{ route('profesional.archivo.carga') }}",
            method: 'post',
            createImageThumbnails: true,
            addRemoveLinks: true,
            headers:{
                'X-CSRF-TOKEN' : CSRF_TOKEN,
            },

            acceptedFiles: "application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*",
            maxFilesize: 4,
            maxFiles: 4,
            /** El texto utilizado antes de que se eliminen los archivos. */
            dictDefaultMessage: "Arrastre Archivo al recuadro para subirlo.",

            /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
            dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

            /**
             * El texto que se agregará antes del formulario alternativo.
             * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
             * ser ignorado.
             */
            dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

            /**
             * Si el tamaño del archivo es demasiado grande.
             * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
             */
            dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

            /** Si el archivo no coincide con el tipo de archivo. */
            dictInvalidFileType: "No puedes subir archivos de este tipo.",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
            dictCancelUpload: "Cancelar carga",

            /** El texto que se muestra si una carga se canceló manualmente */
            dictUploadCanceled: "Subida cancelada.",

            /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
            dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
            dictRemoveFile: "Eliminar archivo",

            /**
             * Se muestra si `maxFiles` es st y se excede.
             */
            dictMaxFilesExceeded: "No puede cargar más archivos.",

            // accept(file, done) {
            //     console.log('-------------accept-----------------------');
            //     cargar_lista_archivo();
            //     return done();
            // },
            success: function(file, response){
                // console.log('-------------success-----------------------');
                cargar_lista_archivo(myDropzone_Archivo,'');

                if (file.previewElement) {
                    return file.previewElement.classList.add("dz-success");
                }
            },
            error(file, message) {
                // console.log('-------------error-----------------------');
                if (file.previewElement) {
                    file.previewElement.classList.add("dz-error");
                    if (typeof message !== "string" && message.error)
                    {
                        message = message.error;
                    }
                    else
                    {
                        message = message.message;
                    }
                    for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                        node.textContent = message;
                    }
                }
            },
            removedfile(file) {
                // console.log('-------------removedfile-----------------------');
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                cargar_lista_archivo(myDropzone_Archivo,'');
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                cargar_lista_archivo(myDropzone_Archivo,'');
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        };

        var lista_archivo = {};
        function cargar_lista_archivo(obj_dropzone, alias_archivo)
        {
            // console.log('--------------cargar_lista_archivo----------------------');
            lista_archivo = [];
            $('#input_lista_archivo').val('');
            let temp  = obj_dropzone.getAcceptedFiles();
            $.each(temp, function( index, value )
            {
                if(value.status == "success")
                {
                    if(value.xhr !== undefined)
                    {
                        var archivo_temp = JSON.parse(value.xhr.response);
                        lista_archivo[index] = [
                            url = archivo_temp.archivo.url,
                            nombre_original = archivo_temp.archivo.original_file_name,
                            nombre_archivo = archivo_temp.archivo.nombre_archivo,
                            file_extension = archivo_temp.archivo.file_extension,
                        ];
                        $('#input_lista_archivo').val('');
                        $('#input_lista_archivo').val(JSON.stringify(lista_archivo));
                    }
                }
            });
        }
        /************** ARCHIVO **************/


        function buscar_pacientes()
        {
            var rut = $('#buscar_rut').val();
            var nombre = $('#buscar_nombre').val();
            var apellido = $('#buscar_apellido').val();

            cargar_tabla_examen(rut, nombre, apellido);
        }
    </script>
@endsection
