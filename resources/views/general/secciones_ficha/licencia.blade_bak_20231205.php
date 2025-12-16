<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-1 shadow-none">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            </div>
        </div>
        <div class="row mx-1 mt-2">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-0 pt-3 d-inline float-left">
                        <h6 class="f-20 text-c-blue float-left mb-3">Licencia médica</h6>
                        {{-- mensaje --}}
                        <div class="alert-atencion alert alert-warning-b alert-dismissible fade show" role="alert"  id="mensaje_licencia"></div>
					
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

                        <!--SWITCH TIPO ENFERMEDAD-->
                        <div class="form-row mb-3">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="enf_com_1" checked="checked">
                                    <label class="custom-control-label" for="enf_com_1">Enfermedad común o maternal</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="lab_1">
                                    <label class="custom-control-label" for="lab_1">Laboral</label>
                                </div>
                            </div>
                        </div>

                        <!--INFO. DEL TRABAJADOR-->
                        <div class="form-row">
                            <div class="col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a" id="info-trabajador">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#info-trabajador-c" aria-expanded="false" aria-controls="info-trabajador-c">
                                            Información del trabajador
                                        </button>
                                    </div>
                                    <div id="info-trabajador-c" class="collapse show" aria-labelledby="info-trabajador" data-parent="#info-trabajador">
                                        <div class="card-body-aten-a shadow-none">
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label-activo-sm">Previsión</label>
                                                    <input type="text" class="form-control form-control-sm" name="prevision_lic" id="prevision_lic" value="{{ $paciente->prevision->nombre }}">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label-activo-sm">Rut</label>
                                                    <input type="text" class="form-control form-control-sm" name="rut_paciente_lic" id="rut_paciente_lic" value="{{ $paciente->rut }}">

                                                </div>
                                                <div class="form-group col-md-3">
                                                    @if (request('token') && request('compin') == 1)
                                                        <button type="button" class="btn btn-sm btn-success-light btn-block">Autorizado</button>
                                                    @else
                                                        <button type="button" class="btn btn-sm btn-primary-light btn-block" onclick="l_autoriz_compin()";>Solicitar autorización</button>
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <button type="button" class="btn btn-sm btn-info-light btn-block" onclick="l_info_empl()";>Verificar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if (request('token') && request('compin') == 1)

                            <!--EMPLEADOR-->
                            <div class="form-row">
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="empleador">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#empleador-c" aria-expanded="false" aria-controls="empleador-c">
                                                Empleador
                                            </button>
                                        </div>
                                        <div id="empleador-c" class="collapse show" aria-labelledby="empleador" data-parent="#empleador">
                                            <div class="card-body-aten-a shadow-none">
                                                <div class="form-row">
                                                    <input type="hidden" name="id_empleador" id="id_empleador" value="123">
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label-activo-sm">Nombre</label>
                                                        <input type="text" name="empleador_nombre" id="empleador_nombre" class="form-control form-control-sm" value="EMPRESA DEMO" readonly/>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label-activo-sm">RUT</label>
                                                        <input type="text" name="empleador_rut" id="empleador_rut" class="form-control form-control-sm" value="76.156.456.5" readonly/>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label-activo-sm">Direccion</label>
                                                        <input type="text" name="empleador_direccion" id="empleador_direccion" class="form-control form-control-sm" value="Calle DEMO #123, Viña" readonly/>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label-activo-sm">Email</label>
                                                        <input type="text" name="empleador_email" id="empleador_email" class="form-control form-control-sm" value="contacto@empresa_demo.cl" readonly/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--REPOSO-->
                            <div class="form-row">
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="reposo">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#reposo-c" aria-expanded="false" aria-controls="reposo-c">
                                                Reposo
                                            </button>
                                        </div>
                                        <div id="reposo-c" class="collapse show" aria-labelledby="reposo" data-parent="#reposo">
                                            <div class="card-body-aten-a shadow-none">
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Desde</label>
                                                        <input type="date" name="fecha" id="fecha" class="form-control form-control-sm" onchange="sumaFecha($('#num_dias_reposo').val(),$('#fecha').val());"/>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">N° días</label>
                                                        <input type="text" name="num_dias_reposo" id="num_dias_reposo" class="form-control form-control-sm" onchange="sumaFecha($('#num_dias_reposo').val(),$('#fecha').val());"/>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Hasta</label>
                                                        <input type="text" name="hasta" id="hasta" class="form-control form-control-sm" value="" readonly/>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Tipo de reposo</label>
                                                            <select name='l_tipo_reposo'  id='l_tipo_reposo' class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('l_tipo_reposo','div_tipo_reposo','ot_tipo_reposo',4);">
                                                                <option selected  value="1">Total</option>
                                                                <option value="2">Mañanas</option>
                                                                <option value="3">Tarde</option>
                                                                <option value="4">Otro tipo</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id='div_tipo_reposo' style="display:none;">
                                                            <label class="floating-label-activo-sm">Otro Tipo <i> Anote Tipo</i></label>
                                                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ot_tipo_reposo" id="ot_tipo_reposo"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Lugar de reposo</label>
                                                            <select name='l_lugar_reposo'  id='l_lugar_reposo' class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('l_lugar_reposo','div_lugar_reposo','ot_lugar_reposo',3);">
                                                                <option selected  value="1">Su Casa</option>
                                                                <option value="2">Hospitalizado</option>
                                                                <option value="3">Otro Lugar</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id='div_lugar_reposo' style="display:none;">
                                                            <label class="floating-label-activo-sm">Otro Lugar <i> Anote lugar</i></label>
                                                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ot_lugar_reposo" id="ot_lugar_reposo"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--INFORMACION LICENCIA-->
                            <div class="form-row">
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="menor-edad">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#menor-edad-c" aria-expanded="false" aria-controls="menor-edad-c">
                                                Información de licencia
                                            </button>
                                        </div>
                                        <div id="menor-edad-c" class="collapse show" aria-labelledby="menor-edad" data-parent="#menor-edad">
                                            <div class="card-body-aten-a shadow-none">
                                                <form>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="floating-label-activo-sm"> Tipo de licencia</label>
                                                            <select class="form-control d-inline form-control-sm" name="tipo_licencia" id="tipo_licencia">
                                                                <option>Seleccione una opción</option>
                                                                <option selected value= "1"> Tipo 1: enfermedad o accidente común.</option>
                                                                <option value= "2">Tipo 2: medicina preventiva.</option>
                                                                <option value= "3">Tipo 3: pre y postnatal.</option>
                                                                <option value= "4">Tipo 4: enfermedad grave del niño menor del año</option>
                                                                <option value= "5">Tipo 5: Patología del Embarazo</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="info_licencia_1" checked="checked">
                                                                <label class="custom-control-label" for="info_licencia_1">Recuperabilidad laboral</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="info_licencia_2">
                                                                <label class="custom-control-label" for="info_licencia_2">Inicio trámite de invalidez</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--DIAGNÓSTICO-->
                            <div class="form-row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="diagnostico_lic">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagnostico-_lic-c" aria-expanded="false" aria-controls="diagnostico-_lic-c">
                                                Diagnóstico
                                            </button>
                                        </div>
                                        <div id="diagnostico-_lic-c" class="collapse show" aria-labelledby="diagnostico_lic" data-parent="#diagnostico_lic">
                                            <div class="card-body-aten-a shadow-none">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        @if (isset($fichaAtencion) &&
                                                        $fichaAtencion->hipotesis_diagnostico != null)
                                                        <label class="floating-label-activo-sm">Hipótesis
                                                            Diagnóstica</label>
                                                        <input type="text" class="form-control form-control-sm"  data-input_igual="hip-diag_spec,descripcion_hipotesis" name="lic_descripcion_hipotesis" id="lic_descripcion_hipotesis" value="{{ $fichaAtencion->hipotesis_diagnostico }}" onchange="cargarIgual('lic_descripcion_hipotesis')">
                                                        @else
                                                        <label class="floating-label-activo-sm">Hipótesis
                                                            Diagnóstica</label>
                                                        <input type="text" class="form-control form-control-sm" data-input_igual="hip-diag_spec,descripcion_hipotesis"  name="lic_descripcion_hipotesis" id="lic_descripcion_hipotesis" value="{!! old('descripcion_hipotesis') !!}" onchange="cargarIgual('lic_descripcion_hipotesis')">
                                                        @endif
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        @if (isset($fichaAtencion) && $fichaAtencion->diagnostico_ce10
                                                        != null)
                                                        <label class="floating-label-activo-sm">Diagnóstico CIE-10</label>
                                                        <input type="text" class="form-control form-control-sm" data-input_igual="descripcion_cie,descripcion_cie_esp,eno_diagnostico_cie" name="lic_descripcion_cie" id="lic_descripcion_cie" value="{{ $fichaAtencion->diagnostico_ce10 }}" onchange="cargarIgual('lic_descripcion_cie')">
                                                        <input type="hidden" class="form-control form-control-sm" data-input_igual="id_descripcion_cie,id_descripcion_cie_esp,eno_id_diagnostico_cie" name="id_lic_descripcion_cie" id="id_lic_descripcion_cie" value="{{ $fichaAtencion->diagnostico_ce10 }}" onchange="cargarIgual('id_lic_descripcion_cie')">
                                                        @else
                                                        <label class="floating-label-activo-sm">Diagnóstico CIE-10</label>
                                                        <input type="text" class="form-control form-control-sm" data-input_igual="descripcion_cie,descripcion_cie_esp,eno_diagnostico_cie" name="lic_descripcion_cie" id="lic_descripcion_cie" value="{!! old('lic_descripcion_cie') !!}" onchange="cargarIgual('lic_descripcion_cie')">
                                                        <input type="hidden" class="form-control form-control-sm" data-input_igual="id_descripcion_cie,id_descripcion_cie_esp,eno_id_diagnostico_cie" name="id_lic_descripcion_cie" id="id_lic_descripcion_cie" value="{!! old('id_lic_descripcion_cie') !!}" onchange="cargarIgual('id_lic_descripcion_cie')">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--OTROS ANTECEDENTES-->
                            <div class="form-row">
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="ot-ant-lic">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#ot-ant-lic-c" aria-expanded="false" aria-controls="ot-ant-lic-c">
                                                Otros antecedentes
                                            </button>
                                        </div>
                                        <div id="ot-ant-lic-c" class="collapse show" aria-labelledby="ot-ant-lic" data-parent="#ot-ant-lic">
                                            <div class="card-body-aten-a shadow-none">
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <label class="floating-label">Descripción</label>
                                                        <textarea class="form-control form-control-sm"rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="otros_ant_desc" id="otros_ant_desc"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--EXAMENES DE APOYO-->
                            <div class="form-row">
                                <div class="col-sm-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="exam-apoyo">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#exam-apoyo-c" aria-expanded="false" aria-controls="exam-apoyo-c">
                                                Exámenes de apoyo
                                            </button>
                                        </div>
                                        <div id="exam-apoyo-c" class="collapse show" aria-labelledby="exam-apoyo" data-parent="#exam-apoyo">
                                            <div class="card-body-aten-a shadow-none">
                                                <input type="hidden" name="input_lista_archivo_lic" id="input_lista_archivo_lic" value="">
                                                <!-- [ Main Content ] start -->
                                                <div class="dropzone" id="mis-archivos-licencia" action="{{ route('profesional.imagen.carga') }}">
                                                </div>
                                                <!-- [ file-upload ] end -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--BOTONES ACCION-->
                            <div class="row pb-3">
                                {{-- <div class="col-md-3 text-center mb-3">
                                    <button type="button" class="btn btn-sm btn-info-light-c btn-block" onclick="l_autoriz_app()";><i class="feather icon-loader"></i> Solicitar autorización</button><!--profesional y paciente-->
                                    @include('general.secciones_ficha.modal.m_esperando_app')
                                </div> --}}
                                <div class="col-md-3 text-center mb-3">
                                    <button type="button" class="btn btn-sm btn-primary-light-c btn-block"><i class="feather icon-file-text"></i> Ver PDF</button>
                                </div>
                                <div class="col-md-3 text-center mb-3">
                                    <button type="button" class="btn btn-sm btn-primary-light-c btn-block" onclick="registrar_licencia();"><i class="feather icon-mail"></i> Enviar</button>
                                </div>
                                <div class="col-md-3 text-center mb-3">
                                    <button type="button" class="btn btn-sm btn-primary-light-c btn-block"><i class="feather icon-printer"></i> Imprimir</button>
                                </div>
                            </div>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('general.secciones_ficha.modal.m_autor_compin')
@include('general.secciones_ficha.modal.m_info_empleadores')

@section('js-lic')
<script>

    $(document).ready(function ()
    {

        $('#enf_com_1').change(function (e)
        {
            e.preventDefault();
            if($(this).is(':checked'))
            {
                // console.log('activo enf_com_1');
                $('#lab_1').prop('checked', false);
            }
            else
            {
                $('#lab_1').prop('checked', true);
                $('#enf_com_1').prop('checked', false);
            }
        });

        $('#lab_1').change(function (e)
        {
            e.preventDefault();
            if($(this).is(':checked'))
            {
                // console.log('activo lab_1');
                $('#enf_com_1').prop('checked', false);
            }
            else
            {
                $('#enf_com_1').prop('checked', true);
                $('#lab_1').prop('checked', false);
            }
        });

        $('#info_licencia_1').change(function (e)
        {
            e.preventDefault();
            if($(this).is(':checked'))
            {
                // console.log('activo info_licencia_1');
                $('#info_licencia_2').prop('checked', false);
            }
            else
            {
                $('#info_licencia_1').prop('checked', false);
                $('#info_licencia_2').prop('checked', true);
            }
        });

        $('#info_licencia_2').change(function (e)
        {
            e.preventDefault();
            if($(this).is(':checked'))
            {
                // console.log('activo info_licencia_2');
                $('#info_licencia_1').prop('checked', false);
            }
            else
            {
                $('#info_licencia_1').prop('checked', true);
                $('#info_licencia_2').prop('checked', false);
            }
        });

    });

    function l_info_empl() {
        $('#m_lic_empleador').modal('show');
    }

    function l_autoriz_compin() {
        $('#m_lic_autor_compin').modal('show');
    }

    function l_autoriz_app() {
        $('#m_lic_autor_app').modal('show');
    }

    function sumaFecha(dias,fecha_eng )
    {
        dias = parseInt(dias);
        if(dias>0&&fecha_eng!='')
        {
            var result = new Date(fecha_eng);
            result.setDate(result.getDate() + (dias+1));
            var anno=result.getFullYear();
            var mes= result.getMonth()+1;
            var dia= result.getDate();
            mes = (mes < 10) ? ("0" + mes) : mes;
            dia = (dia < 10) ? ("0" + dia) : dia;
            $('#hasta').val(dia+'-'+mes+'-'+anno);
            //$('#hasta').val(anno+'-'+mes+'-'+dia);
        }
    }

    function cargar_licencias()
    {
        /** CARGAR ULTIMA LICNCIA */
        $('#mensaje_licencia').html('La ultima licencia del paciente es del 2023-07-01 al 2023-07-09 <br><span><strong>Días totales este año 25 días</strong></span> ');
        $('#mensaje_licencia').show();
        setTimeout(function(){
            $('#mensaje_licencia').hide();
        }, 9000);
    }

    /** MANEJO DE ARCHIVOS */
    //mis-archivos-licencia
    var myDropzone_lic ;
    Dropzone.options.misArchivosLicencia = {
        init:function()
        {
            myDropzone_lic = this;
        },
        url: "{{ route('profesional.archivo.carga') }}",
        method: 'post',
        createImageThumbnails: true,
        addRemoveLinks: true,
        headers:{
            'X-CSRF-TOKEN' : CSRF_TOKEN,
        },

        acceptedFiles: "application/pdf",
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
        //     cargar_lista_archivo_lic();
        //     return done();
        // },
        success: function(file, response){
            // console.log('-------------success-----------------------');
            cargar_lista_archivo_lic(myDropzone_lic,'lic');

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
            cargar_lista_archivo_lic(myDropzone_lic,'lic');
            if (file.previewElement != null && file.previewElement.parentNode != null) {
                file.previewElement.parentNode.removeChild(file.previewElement);
            }
            return this._updateMaxFilesReachedClass();
        },
        canceled: function canceled(file) {
            cargar_lista_archivo_lic(myDropzone_lic,'lic');
            return this.emit("error", file, this.options.dictUploadCanceled);
        },
    };

    var lista_archivo_lic = {};
    function cargar_lista_archivo_lic(obj_dropzone, alias_archivo)
    {
        // console.log('--------------cargar_lista_archivo_lic----------------------');
        lista_archivo_lic = [];
        let temp  = obj_dropzone.getAcceptedFiles();
        $.each(temp, function( index, value )
        {
            if(value.status == "success")
            {
                if(value.xhr !== undefined)
                {
                    var archivo_temp = JSON.parse(value.xhr.response);
                    lista_archivo_lic[index] = [
                        url = archivo_temp.archivo.url,
                        nombre_original = archivo_temp.archivo.original_file_name,
                        nombre_archivo = archivo_temp.archivo.nombre_archivo,
                        file_extension = archivo_temp.archivo.file_extension,
                    ];
                    $('#input_lista_archivo_lic').val('');
                    $('#input_lista_archivo_lic').val(JSON.stringify(lista_archivo_lic));
                }
            }
        });
    }
    /** FIN MANEJO DE ARCHIVOS */

    function registrar_licencia()
    {
        var id_hora_medica = $('#hora_medica').val();
        var id_ficha_atencion = $('#id_fc').val();
        var id_paciente = $('#id_paciente_fc').val();
        var id_profesional = $('#id_profesional_fc').val();
        var id_lugar_atencion = $('#id_lugar_atencion').val();
        var enfermedad_comun = $('#enf_com_1').prop('checked');
        var laboral = $('#lab_1').prop('checked');
        var paciente_prevision = $('#prevision_paciente_fc').val();
        var paciente_prevision_text = $('#prevision_lic').val();
        var rut_paciente = $('#rut_paciente_lic').val();
        var empleador_id = $('#id_empleador').val();
        var empleador_nombre = $('#empleador_nombre').val();
        var empleador_rut = $('#empleador_rut').val();
        var empleador_direccion = $('#empleador_direccion').val();
        var empleador_email = $('#empleador_email').val();
        var num_dias_reposo = $('#num_dias_reposo').val();
        var fecha_inicio = $('#fecha').val();
        var fecha_termino = $('#hasta').val();
        var tipo_reposo = $('#l_tipo_reposo').val();
        var lugar_reposo = $('#l_lugar_reposo').val();
        var tipo_licencia = $('#tipo_licencia').val();
        var info_licencia_1 = $('#info_licencia_1').prop('checked');
        var info_licencia_2 = $('#info_licencia_2').prop('checked');
        var descripcion_hipotesis = $('#lic_descripcion_hipotesis').val();
        var descripcion_cie = $('#lic_descripcion_cie').val();
        var id_descripcion_cie = $('#id_lic_descripcion_cie').val();
        var otros_ant_desc = $('#otros_ant_desc').val();
        var input_lista_archivo_lic = $('#input_lista_archivo_lic').val();

        let url = "{{ route('crear.licencia') }}";

        var _token = CSRF_TOKEN;

        $.ajax({

            url: url,
            type: "POST",
            data: {
                _token: _token,
                id_hora_medica : id_hora_medica,
                id_ficha_atencion : id_ficha_atencion,
                id_paciente : id_paciente,
                id_profesional : id_profesional,
                id_lugar_atencion : id_lugar_atencion,
                enfermedad_comun : (enfermedad_comun)?'1':'0',
                laboral : (laboral)?'1':'0',
                paciente_prevision : paciente_prevision,
                paciente_prevision_text : paciente_prevision_text,
                rut_paciente : rut_paciente,
                empleador_id : empleador_id,
                empleador_nombre : empleador_nombre,
                empleador_rut : empleador_rut,
                empleador_direccion : empleador_direccion,
                empleador_email : empleador_email,
                num_dias_reposo : num_dias_reposo,
                fecha_inicio : fecha_inicio,
                fecha_termino : fecha_termino,
                tipo_reposo : tipo_reposo,
                lugar_reposo : lugar_reposo,
                tipo_licencia : tipo_licencia,
                info_licencia_1 : (info_licencia_1)?'1':'0',
                info_licencia_2 : (info_licencia_2)?'1':'0',
                descripcion_hipotesis : descripcion_hipotesis,
                descripcion_cie : descripcion_cie,
                id_descripcion_cie : id_descripcion_cie,
                otros_ant_desc : otros_ant_desc,
                input_lista_archivo_lic : input_lista_archivo_lic,
            },
        })
        .done(function(resp)
        {
            if (resp !== 'null')
            {
                if(resp.estado == 1)
                {
                    /** cargar registro de licencia */
                    //


                    swal({
                        title: "Registro de Licencia",
                        text:"Registro exitoso",
                        icon: "success",
                    });
                }
                else
                {
                    var mensaje = '';
                    if(resp.error)
                    {
                        $.each(resp.error, function (indexInArray, valueOfElement)
                        {
                            mensaje += indexInArray+': '+valueOfElement+'\n';
                        });
                    }
                    else
                    {
                        mensaje += 'Intente nuevamente.';
                    }

                    swal({
                        title: "Registro de Licencia",
                        text: mensaje,
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }
            }
            else
            {
                swal({
					title: "Registro de Licencia",
					text:"Problema en el registro.",
					icon: "error",
				});
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }
</script>
@endsection
