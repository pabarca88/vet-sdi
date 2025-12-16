@extends('template.laboratorio.laboratorio_asistente_subir_ex.template')
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
                                <h5 class="m-b-10 font-weight-bold">Cargar resultados de exámenes</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="escritorio_asistente_laboratorio.php" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="resultados_asistente_laboratorio.php">Cargar resultados de exámenes</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-info pb-1 pt-2">
                            <h5 class="text-white">Buscador de paciente para subir examenes</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <!--Info Registro-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Rut</label>
                                        <input type="text" class="form-control form-control-sm form-control-sm-activo" name="rut" id="rut">
                                        <input type="hidden" name="id_paciente" id="id_paciente" value="">
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Nombre</label>
                                        <input type="text" class="form-control form-control-sm form-control-sm-activo" name="nombre" id="nombre">
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Primer Apellido</label>
                                        <input type="text" class="form-control form-control-sm form-control-sm-activo" name="apellido_paterno" id="apellido_paterno">
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Segundo Apellido</label>
                                        <input type="text" class="form-control form-control-sm form-control-sm-activo" name="apellido_materno" id="apellido_materno">
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Correo electronico</label>
                                        <input type="text" class="form-control form-control-sm form-control-sm-activo" name="email" id="email">
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Tipo de examen</label>
                                        <select class="form-control form-control-sm form-control-sm-activo" name="tipo_examen" id="tipo_examen">
                                            <option value="">Seleccione</option>{{--
                                            @if ($tipo_examen)
                                                @foreach ($tipo_examen as $tipo)
                                                    <option value="{{ $tipo->id }}">{{ $tipo->nombre_examen }}</option>
                                                @endforeach
                                            @endif--}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label class="floating-label">Observación</label>
                                        <textarea type="text" class="form-control form-control-sm form-control-sm-activo" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="observacion" id="observacion"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                    <input type="hidden" name="input_lista_examen" id="input_lista_examen" value="">
                                    <div class="dropzone" id="mis-examenes" name="mis-examenes" action="{{ route('examen.imagen.carga') }}"></div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-info-light-c" onclick="guardar_resultado();">Enviar exámenes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-light pb-1 pt-2">
                            <h5 class="text-primary">Carga Examen</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-">
                                    <input type="hidden" name="input_lista_examen" id="input_lista_examen" value="">
         
                                    <div class="dropzone" id="mis-examenes" name="mis-examenes" action="{{ route('examen.imagen.carga') }}"></div>
        
                                </div>
                            </div>

                        </div>
                    </div>
                </div>-->
            </div>
            <div class="row">
                <!--Resultados (esta card se carga con la búsqueda)-->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-info pb-1 pt-2">
                            <h5 class="text-white">Exámenes enviados</h5>
                        </div>
                        <div class="card-body">
                            <table id="resultados_examenes" class="display table table-striped  dt-responsive nowrap table-xs align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nº solicitud</th>
                                        <th>Fecha</th>
                                        <th>Paciente</th>
                                        <th>Contacto</th>
                                        <th>Tipo Examen</th>
                                        <th>OBS.</th>
                                        {{-- <th>Resultados</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    {{--  --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-script')
    <script>
        $(document).ready(function () {
            /* formatear rut */
            $("#rut").rut({
                formatOn: 'keyup',
                minimumLength: 2,
                validateOn: 'change',
                useThousandsSeparator : false
            });
            /** fin formulario pestaña 1 */

            $('#rut').keyup(function(){
                console.log($('#rut').val());
                if($('#rut').val().length > 7)
                {
                    buscar_paciente()
                }
            });
        });

        /** MANEJO DE EXAMEN */
        var myDropzoneExamen;
        Dropzone.options.misExamenes = {
            init:function()
            {
                myDropzoneExamen = this;
            },
            url: "{{ route('examen.imagen.carga') }}",
            method: 'post',
            createImageThumbnails: true,
            addRemoveLinks: true,
            headers:{
                'X-CSRF-TOKEN' : CSRF_TOKEN,
                // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
            },

            acceptedFiles: "application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*",
            maxFilesize: 4,
            maxFiles: 6,
            /** El texto utilizado antes de que se eliminen los archivos. */
            dictDefaultMessage: "Arrastre el Archivo o Imagen del resultado de examen para subirlo.",

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
            //     cargar_lista_examen();
            //     return done();
            // },
            success: function(file, response){
                // console.log('-------------success-----------------------');
                cargar_lista_examen();

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
                cargar_lista_examen();
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                cargar_lista_examen();
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        };

        var lista_examenes = [];
        function cargar_lista_examen()
        {
            // console.log('--------------cargar_lista_examen----------------------');
            lista_examenes = [];
            let temp  = myDropzoneExamen.getAcceptedFiles();
            $.each(temp, function( index, value )
            {
                if(value.status == "success")
                {
                    if(value.xhr !== undefined)
                    {
                        var examen_temp = JSON.parse(value.xhr.response);

                        console.log(examen_temp);

                        lista_examenes[index] = [
                            url=examen_temp.examen.url,
                            nombre_original= examen_temp.examen.original_file_name,
                            nombre_examen = examen_temp.examen.nombre_archivo,
                            file_extension = examen_temp.examen.file_extension,
                        ];
                        $('#input_lista_examen').val('');
                        $('#input_lista_examen').val(JSON.stringify(lista_examenes));
                    }
                }
            });


        }
        /** CIERRE MANEJO DE IMAGENES */

        function buscar_paciente()
        {
            let rut = $('#rut').val();
            let url = "{{ route('lab.exa.asistente.buscar_paciente_rut') }}";

            $.ajax({

                url: url,
                type: "get",
                data: {
                    rut: rut
                },
            })
            .done(function(data) {
                console.log(data);
                if (data.estado == 1)
                {
                    $('#id_paciente').val(data.registro.id);
                    $('#nombre').attr('disabled',true);
                    $('#nombre').val(data.registro.nombres);
                    $('#apellido_paterno').attr('disabled',true);
                    $('#apellido_paterno').val(data.registro.apellido_uno);
                    $('#apellido_materno').attr('disabled',true);
                    $('#apellido_materno').val(data.registro.apellido_dos);
                    $('#email').attr('disabled',true);
                    $('#email').val(data.registro.email);

                    ver_resultados_rut('resultados_examenes');
                }
                else
                {
                    $('#id_paciente').val('');
                    $('#nombre').attr('disabled',false);
                    $('#nombre').val('');
                    $('#apellido_paterno').attr('disabled',false);
                    $('#apellido_paterno').val('');
                    $('#apellido_materno').attr('disabled',false);
                    $('#apellido_materno').val('');
                    $('#email').attr('disabled',false);
                    $('#email').val('');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                {{--  console.log(jqXHR, ajaxOptions, thrownError)  --}}
            });
        }

        function guardar_resultado()
        {
            let id_paciente = $('#id_paciente').val();
            let rut = $('#rut').val();
            let nombre = $('#nombre').val();
            let apellido_paterno = $('#apellido_paterno').val();
            let apellido_materno = $('#apellido_materno').val();
            let email = $('#email').val();
            let tipo_examen = $('#tipo_examen').val();
            let observacion = $('#observacion').val();
            let lista_examen = $('#input_lista_examen').val();
            let url = "{{ route('lab.exa.asistente.registrar_resultados_examenes_laboratorio') }}";

            var valido = 1;
            var mensaje = '';
            if(rut == '')
            {
                mensaje += 'Campo RUT requerido\n';
                valido =  0;
            }
            if(nombre == '')
            {
                mensaje += 'Campo Nombre requerido\n';
                valido =  0;
            }
            if(apellido_paterno == '')
            {
                mensaje += 'Campo Apellido Paterno requerido\n';
                valido =  0;
            }
            if(apellido_materno == '')
            {
                mensaje += 'Campo Apellido Materno requerido\n';
                valido =  0;
            }
            if(email == '')
            {
                mensaje += 'Campo Email requerido\n';
                valido =  0;
            }
            if(tipo_examen == '')
            {
                mensaje += 'Campo Tipo Examen requerido\n';
                valido =  0;
            }
            if(lista_examen == '')
            {
                mensaje += 'Carga de Archivo requerido\n';
                valido =  0;
            }

            if(valido == 1)
            {
                $.ajax({
                    url: url,
                    type: "GET",
                    data: {
                        id_paciente : id_paciente,
                        rut : rut,
                        nombre : nombre,
                        apellido_paterno : apellido_paterno,
                        apellido_materno : apellido_materno,
                        email : email,
                        tipo_examen : tipo_examen,
                        observacion : observacion,
                        lista_examen : lista_examen,
                    },
                })
                .done(function(resp) {
                    console.log(resp);
                    if (resp.estado == 1)
                    {
                        swal({
                            title: "Registro de Resultado de Examen",
                            text: 'Registro Exitoso',
                            icon: "success",
                        });

                        $('#rut').val('');
                        $('#id_paciente').val('');
                        $('#nombre').attr('disabled',false);
                        $('#nombre').val('');
                        $('#apellido_paterno').attr('disabled',false);
                        $('#apellido_paterno').val('');
                        $('#apellido_materno').attr('disabled',false);
                        $('#apellido_materno').val('');
                        $('#email').attr('disabled',false);
                        $('#email').val('');
                        $('#observacion').val('');
                        $('#tipo_examen').val('');
                        myDropzoneExamen.removeAllFiles();
                        $('#input_lista_examen').val('');
                    }
                    else
                    {
                        swal({
                            title: "Registro de Resultado de Examen",
                            text: 'Falla en el registro\nIntente de nuevo',
                            icon: "error",
                        });
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    {{--  console.log(jqXHR, ajaxOptions, thrownError)  --}}
                });
            }
            else
            {
                swal({
					title: "Registro de Resultado de Examen",
					text:mensaje,
					icon: "error",
				});
            }
        }

        function ver_resultados_rut(tabla)
        {
            console.log('*****ver_resultados_rut******');
            console.log(tabla);

            $('#'+tabla+' tbody').html('');

            let rut = $('#rut').val();
            let url = '{{ route("lab.exa.asistente.ver_resultados_examenes_rut_laboratorio") }}';
            var valido = 1;
            var mensaje = '';

            if(rut == '')
            {
                mensaje += 'Campo RUT requerido\n';
                valido =  0;
            }

            if(valido == 1)
            {
                $.ajax({
                    url: url,
                    type: "GET",
                    data: {
                        rut : rut,
                        rango_dias : '',
                    },
                })
                .done(function(resp) {
                    console.log(resp);
                    if (resp.estado == 1)
                    {
                        $.each(resp.registros, function (key, value)
                        {
                            console.log(value);
                            var html = '';
                            html += '<tr>';
                            html += '    <td>'+value.id+'</td>';
                            html += '    <td>'+value.fecha_registro+'</td>';
                            html += '    <td>';
                            html += '        <span>'+value.nombre+' '+value.apellido_paterno+' '+value.apellido_materno+'</span><br>';
                            html += '        <span>'+value.rut+'</span>';
                            html += '    </td>';
                            html += '    <td>';
                            html += '        <span>'+value.email+'</span>';
                            html += '    </td>';
                            html += '    <td>';
                            html += '        <span>'+value.tipo_examen.nombre_examen+'</span>';
                            html += '    </td>';
                            // html += '    <td>';
                            // html += '        <button class="btn btn-info btn-sm"><i class="feather icon-file"></i> Ver</button>';
                            // html += '        <button class="btn btn-success btn-sm"><i class="feather icon-mail"></i> Enviar a paciente</button>';
                            // html += '    </td>';
                            html += '</tr>';
                            $('#'+tabla+' tbody').append(html);
                        });
                    }
                    else
                    {
                        var html = '';
                        html += '<tr>';
                        html += '    <td rowspan="5">'+value.id+'</td>';
                        html += '</tr>';
                        $('#'+tabla+' tbody').html(html);
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    {{--  console.log(jqXHR, ajaxOptions, thrownError)  --}}
                });
            }
            else
            {
                console.log(mensaje);
                // swal({
					// title: "Registro de Resultado de Examen",
					// text:mensaje,
					// icon: "error",
				// });
            }
        }
    </script>
@endsection
