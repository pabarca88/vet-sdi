@extends('template.paciente.template')

@section('content')

    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Mis exámenes</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.receta') }}" data-toggle="tooltip" data-placement="top" title="Volver a inicio de receta online">Receta Online</a></li>
                                <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.receta.examen') }}">Mis exámenes</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="text-c-blue f-20 d-inline">Mis exámenes</h4>
                                    <button type="button" class="btn btn-info btn-sm float-right d-inline" onclick="subir_ex_pcte();"><i class="feather icon-plus"></i> Subir examen</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div style="overflow-x:auto;">
                                <table id="examenes-pcte" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Nº de Orden</th>
                                            <th>Profesional</th>
                                            <th>Tipo de Examen</th>
                                            <th>Nombre del examen</th>
                                            <th>Comentarios</th>
                                            <th>Estado</th>
                                            <th>Examen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($examenes_especialidad_realizados)
                                            @foreach ($examenes_especialidad_realizados as $exam)
                                                @if ($exam->HoraMedica->id_estado == 6)
                                                    <tr>
                                                        <td data-sort=" {{ date('Y-m-d', strtotime($exam->HoraMedica->fecha_realizacion_consulta)) }}">{{ date('d-m-Y',strtotime($exam->HoraMedica->fecha_realizacion_consulta)) }}</td>
                                                        <td class="text-wrap">{{ $exam->id }}</td>
                                                        <td class="text-wrap">{{ $exam->profesional->nombre.' '.$exam->profesional->apellido_uno.' '.$exam->profesional->apellido_dos }}</td>
                                                        <td class="text-wrap">{{ $exam->nombre }}</td>
                                                        <td class="text-wrap">
                                                            @if ($exam->SubTipoEspecialidad)
                                                                {{ $exam->SubTipoEspecialidad->nombre }}
                                                            @else
                                                                -
                                                            @endif
                                                        </td class="text-wrap">
                                                        <td class="text-wrap">-</td>
                                                        <td class="text-wrap">
                                                            @if ($exam->revisado == 1)
                                                                Revisado
                                                            @else
                                                                No revisado
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-success-light-c btn-xxs" onclick="verExamenEspecialidad('{{ $exam->id }}',1);"><i class="feather icon-file-plus"></i> Ver examen</button>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endif

                                        {{-- RESULTADODE DE EXAMENES LABORATORIO --}}
                                        @if ($resultado_examen)
                                            @foreach ( $resultado_examen as $result_ex)
                                                <tr>
                                                    <td>{{ date('d-m-Y',strtotime($result_ex->fecha_registro)) }}</td>
                                                    <td>{{ $result_ex->id }}</td>
                                                    <td>
                                                        @if (!empty($result_ex->profesional_nombre))
                                                            LABORATORIO
                                                        @else
                                                            {{ $result_ex->profesional_nombre }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($result_ex->obj_tipo_examen)
                                                            @if (!empty($result_ex->obj_tipo_examen->nombre_examen))
                                                                {{ $result_ex->obj_tipo_examen->nombre_examen }}

                                                            @else
                                                                {{ $result_ex->nombre_examen }}
                                                            @endif
                                                        @else
                                                            {{ $result_ex->nombre_examen }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (!empty($result_ex->nombre_examen))
                                                            {{ $result_ex->nombre_examen }}
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                    <td>{{ $result_ex->observacion }}</td>
                                                    <td>
                                                        @if ($result_ex->revisado == 1)
                                                            Revisado
                                                        @else
                                                            No revisado
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($result_ex->ResultadoExamenArchivo->count()>0)
                                                            <button type="button" class="btn btn-success-light-c btn-xxs" id="btn_verResultadoExamen_{{ $result_ex->id }}" onclick="verResultadoExamen('{{ $result_ex->id }}',1);"><i class="feather icon-file-plus"></i> Ver examen</button>
                                                        @else
                                                            <button type="button" disabled="disabled" class="btn btn-success-light-c btn-xxs" id="btn_verResultadoExamen_{{ $result_ex->id }}"><i class="feather icon-file-plus"></i> Ver examen</button>
                                                        @endif
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

    <!--Modal-->
    <div id="ex-pcte" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="#" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Subir exámenes</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <label class="floating-label-activo-sm">Fecha</label>
                                <input type="date" class="form-control form-control-sm" name="examen_fecha" id="examen_fecha">
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <label class="floating-label-activo-sm">Nº Órden</label>
                                <input type="text" class="form-control form-control-sm" name="examen_numero_orden" id="examen_numero_orden">
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <label class="floating-label-activo-sm">Rut Profesional</label>
                                <input type="text" class="form-control form-control-sm" name="examen_rut" id="examen_rut" onchange="buscar_nombre_profesional('examen_rut', 'examen_nombre_profesional');" onkeyup="buscar_nombre_profesional('examen_rut', 'examen_nombre_profesional')">
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <label class="floating-label-activo-sm">Nombre Profesional</label>
                                <input type="text" class="form-control form-control-sm" name="examen_nombre_profesional" id="examen_nombre_profesional">
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <label class="floating-label-activo-sm">Tipo de examen</label>
                                <select class="form-control form-control-sm" name="examen_tipo_examen" id="examen_tipo_examen">
                                    @if ($tipo_examen)
                                        @foreach ($tipo_examen as $te)
                                            <option value="{{ $te->id }}">{{ $te->nombre }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <label class="floating-label-activo-sm">Nombre del examen</label>
                                <input type="text" class="form-control form-control-sm" name="examen_nombre_examen" id="examen_nombre_examen">
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <label class="floating-label-activo-sm">Comentarios</label>
                                <textarea class="form-control form-control-sm" name="examen_comentario" id="examen_comentario"></textarea>
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <label class="floating-label-activo-sm">Adjuntar examen</label>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <div class=" text-justify pt-3 pb-1" role="alert">
                                            <input type="hidden" name="input_lista_archivo" id="input_lista_archivo" value="">
                                            <!-- [ Main Content ] start -->
                                            <div class="dropzone" id="mis-archivos-examen" action="{{ route('paciente.archivo.carga') }}"></div>
                                            <!-- [ file-upload ] end -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
                    <button type="button" class="btn btn-info" onclick="registrarExamen();"><i class="feather icon-upload"></i> Subir exámen</button>
                    </div>
                </div>
        </div>
    </div>

@endsection

@section('page-script')
    <script type="text/javascript">
    /**TABLA**/
       $(document).ready(function() {
       $('#examenes-pcte').DataTable({
          responsive: true,
      });
    });

        $(document).ready(function () {

        });


        // MANEJO DE ARCHIVOS
        var lista_archivo = {};
        function cargar_lista_archivo(obj_dropzone, alias_examen) {
            lista_archivo[alias_examen] = [];
            let temp = obj_dropzone.getAcceptedFiles();
            $.each(temp, function(index, value) {
                if (value.status == "success") {
                    if (value.xhr !== undefined) {
                        var archivo_temp = JSON.parse(value.xhr.response);
                        lista_archivo[alias_examen][index] = [
                            url = archivo_temp.archivo.url,
                            nombre_origian = archivo_temp.archivo.original_file_name,
                            nombre_archivo = archivo_temp.archivo.nombre_archivo,
                            file_extension = archivo_temp.archivo.file_extension,
                        ];
                        $('#input_lista_archivo').val('');
                        $('#input_lista_archivo').val(JSON.stringify(lista_archivo));
                    }
                }
            });
        }
        // CERRAR MANEJO DE ARCHIVOS


        function subir_ex_pcte()
        {
            limpiar_formulario_examen();
            $('#ex-pcte').modal('show');
        }

        {{-- ABRIR ARCHIVOS --}}
        function verExamenEspecialidad(id_examen, cambio_estado)
        {
            if(id_examen != '')
            {
                var data ='id_examen_especialidad='+id_examen+'';
                Fancybox.show(
                    [{
                        src: '{{ route("pdf.examen_especialidad") }}?'+data,
                        type: "iframe",
                        preload: false,
                    }]
                );
            }
            else
            {
                swal({
                    title: "Ver Examen Especialidad",
                    text:"No Se encuentra examen",
                    icon: "error"
                });
            }
        }

        function verResultadoExamen(id_examen, cambio_estado)
        {
            if(id_examen != '')
            {
                let url = "{{ route('resultado.examen.lab.archivo.ver') }}";
                var archivos = [];
                $.ajax({

                    url: url,
                    type: "GET",
                    data: {
                        id : id_examen
                    },
                })
                .done(function(data) {

                    console.log(data);
                    if (data.estado == 1)
                    {
                        $.each(data.registros, function (key, value)
                        {
                            var temp_type = 'image';
                            console.log(value.url.indexOf('.pdf'));
                            if(value.url.indexOf('.pdf') != -1)
                            {
                                temp_type = 'iframe';
                            }
                            else
                            {
                                temp_type = 'image';
                            }
                            archivos.push({
                                src: value.url,
                                type: temp_type,
                                preload: false,
                            });
                        });

                        if(archivos.length > 0)
                            Fancybox.show(archivos);
                    }
                    else
                    {
                        console.log('examen no revisado');
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
            }
            else
            {
                swal({
                    title: "Ver resultado de examen laboratorio",
                    text:"No se encuentra resultado de examen laboratorio",
                    icon: "error"
                });
            }
        }

        function registrarExamen()
        {
            var fecha = $('#examen_fecha').val();
            var numero_orden = $('#examen_numero_orden').val();
            var rut = $('#examen_rut').val();
            var nombre_profesional = $('#examen_nombre_profesional').val();
            var nombre_examen = $('#examen_nombre_examen').val();
            var tipo_examen = $('#examen_tipo_examen').val();
            var comentario = $('#examen_comentario').val();
            var list_archivos = $('#input_lista_archivo').val();

            let url = "{{ route('paciente.examen.registro') }}";
            $.ajax({

                url: url,
                type: "post",
                data: {
                    _token: CSRF_TOKEN,
                    fecha_registro: fecha,
                    id_tipo_examen: tipo_examen,
                    nombre_examen: nombre_examen,
                    comentario: comentario,
                    list_archivos: list_archivos,
                    profesional_rut: rut,
                    profesional_nombre: nombre_profesional,
                },
            })
            .done(function(data) {
                if (data.estado == 1)
                {
                    swal({
                        title: "Registro de examen",
                        text: "Carga exitosa.\nSe actualizará la página en segundos.",
                        icon: "success"
                    });

                    limpiar_formulario_examen();

                    setTimeout(function() {
                        location.reload()
                    }, 5000);
                }
                else
                {
                    swal({
                        title: "Registro de examen",
                        text: "Error al cargar las ciudades",
                        icon: "error"
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        function buscar_nombre_profesional(input_rut, input_nombre)
        {
            rut = $('#'+input_rut).val();

            if(rut.length>5)
            {
                url = "{{ route('paciente.buscar.prof.rut') }}";
                $.ajax({
                    url: url,
                    type: "GET",
                    data: {
                        rut : rut,
                    },
                })
                .done(function(data)
                {
                    if(data.estado == 1)
                    {
                        // if(data.profesional.length>0)
                        {
                            var nombre = 'Dr. '+data.profesional.apellido_uno;
                            $('#'+input_nombre).val(nombre);
                        }
                        // else
                        // {
                        //     $('#'+input_nombre).val('');
                        // }
                    }
                    else
                    {
                        $('#'+input_nombre).val('');
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
            }
            else if(rut.length==0)
            {
                $('#'+input_nombre).val('');
            }
        }

        function limpiar_formulario_examen()
        {
            $('#examen_fecha').val('');
            $('#examen_numero_orden').val('');
            $('#examen_rut').val('');
            $('#examen_nombre_profesional').val('');
            $('#examen_tipo_examen').val(1);
            $('#examen_comentario').val('');
            $('#input_lista_archivo').val('');
            myDropzone_ex.removeAllFiles(true);
        }

        /************** EXAMEN **************/
        Dropzone.options.misArchivosExamen = {
                init:function()
                {
                    myDropzone_ex = this;
                },
                url: "{{ route('paciente.archivo.carga') }}",
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

                success: function(file, response){
                    // console.log('-------------success-----------------------');
                    cargar_lista_archivo(myDropzone_ex,'ex');

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
                    cargar_lista_archivo(myDropzone_ex,'ex');
                    if (file.previewElement != null && file.previewElement.parentNode != null) {
                        file.previewElement.parentNode.removeChild(file.previewElement);
                    }
                    return this._updateMaxFilesReachedClass();
                },
                canceled: function canceled(file) {
                    cargar_lista_archivo(myDropzone_ex,'ex');
                    return this.emit("error", file, this.options.dictUploadCanceled);
                },
            };
            /************** EXAMEN **************/




    </script>
@endsection
