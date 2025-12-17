<!-- Button trigger modal -->

<!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal_agregar_dep_buscar">

  Launch

</button> -->

@php
    $especiesMascotas = $especiesMascotas ?? collect();
    $tamanosMascotas = $tamanosMascotas ?? collect();
@endphp
@php
    if ($especiesMascotas instanceof \Illuminate\Support\Collection) {
        $especiesMascotas = $especiesMascotas;
    } else {
        $especiesMascotas = collect($especiesMascotas);
    }
    if ($tamanosMascotas instanceof \Illuminate\Support\Collection) {
        $tamanosMascotas = $tamanosMascotas;
    } else {
        $tamanosMascotas = collect($tamanosMascotas);
    }
    if ($especiesMascotas->isEmpty()) {
        $especiesMascotas = collect([
            (object)['id' => 1, 'nombre' => 'Canina', 'slug' => 'canina', 'requiere_detalle' => false],
            (object)['id' => 2, 'nombre' => 'Felina', 'slug' => 'felina', 'requiere_detalle' => false],
            (object)['id' => 3, 'nombre' => 'Pez', 'slug' => 'pez', 'requiere_detalle' => false],
            (object)['id' => 4, 'nombre' => 'Aves', 'slug' => 'aves', 'requiere_detalle' => false],
            (object)['id' => 5, 'nombre' => 'Reptiles', 'slug' => 'reptiles', 'requiere_detalle' => false],
            (object)['id' => 6, 'nombre' => 'Roedores', 'slug' => 'roedores', 'requiere_detalle' => false],
            (object)['id' => 7, 'nombre' => 'Hurones', 'slug' => 'hurones', 'requiere_detalle' => false],
            (object)['id' => 8, 'nombre' => 'Otros', 'slug' => 'otros', 'requiere_detalle' => true],
        ]);
    }

    if ($tamanosMascotas->isEmpty()) {
        $tamanosMascotas = collect([
            (object)['id' => 1, 'nombre' => 'Pequeña', 'slug' => 'pequena'],
            (object)['id' => 2, 'nombre' => 'Mediana', 'slug' => 'mediana'],
            (object)['id' => 3, 'nombre' => 'Grande', 'slug' => 'grande'],
        ]);
    }
@endphp



<!-- Modal busqueda por rut -->

<div class="modal fade" id="modal_agregar_dep_buscar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <div class="modal-body">

                <div class="row">

                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">

                        <h6 class="modal-title text-c-blue mt-1 mb-b" id="modal_indicar_examen">Ingrese Rut de dependiente</h6>

                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

                        <input type="text" class="form-control form-control-sm" name="modal_agregar_dep_input_rut" id="modal_agregar_dep_input_rut" value="">

                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center mt-2">

                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" aria-label="Close"><i class="feather icon-x"></i> Cancelar</button>

                        <button type="button" class="btn btn-info btn-sm" onclick="buscar_rut_dep();"><i class="feather icon-search"></i> Buscar</button>

                    </div>



                </div>

            </div>

            <!--<div class="modal-footer">

                <button type="button" class="btn btn-primary" onclick="buscar_rut_dep();">Buscar</button>

            </div>-->

        </div>

    </div>

</div>



<!-- Modal agregar paciente existente -->

<div class="modal fade" id="modal_agregar_dep_existente" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">

        <div class="modal-content">

            <div class="modal-header bg-info">

                <h5 class="modal-title text-white mt-1" id="modal_indicar_examen">Agregar Dependiente</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>

            <div class="modal-body">



                <input type="hidden" name="id_paciente_dependiente" id="id_paciente_dependiente">



                <div class="row">

                    <div class="col-md-6">

                        <label class="label text-bolt">Nombre123233232:</label><label name="label_agregar_nombre_paciente" id="label_agregar_nombre_paciente"></label>

                    </div>

                    <div class="col-md-6">

                        <label class="label text-bolt">Apellido:</label><label name="label_agregar_apellido_paciente" id="label_agregar_apellido_paciente"></label>

                    </div>

                    <div class="col-md-6">

                        <label class="label text-bolt">Rut:</label><label name="label_agregar_rut_paciente" id="label_agregar_rut_paciente"></label>

                    </div>

                </div>

                <hr>

                <div class="row">

                    <div class="col-sm-12">

                        <div class="form-group">

                            <label class="floating-label-activo-sm"><span style="color: red;">*</span>Relación</label>

                            <select class="form-control form-control-sm" name="agregar_relacion" id="agregar_relacion" onchange="cargar_tipo_dependencia('agregar_relacion','agregar_tipo_dependencia');">

                                <option value="">Seleccione</option>

                            </select>

                        </div>

                    </div>

                    <div class="col-sm-12">

                        <div class="form-group">

                            <label class="floating-label-activo-sm"><span style="color: red;">*</span>Tipo Dependencia</label>

                            <select class="form-control form-control-sm" name="agregar_tipo_dependencia" id="agregar_tipo_dependencia" onchange="evaluar_tipodependencia('agregar_tipo_dependencia', 'agregar_fechas', '2,4');">

                                <option value="">Seleccione</option>

                            </select>

                        </div>

                    </div>

                    <div class="agregar_fechas" name="agregar_fechas" id="agregar_fechas" style="display: none;">

                        <div class="col-sm-12">

                            <div class="form-group">

                                <label for="agregar_fecha_inicio"><span style="color: red;">*</span>Fecha Inicio</label>

                                <input type="date" name="agregar_fecha_inicio" id="agregar_fecha_inicio" value="{{ date('Y-m-d') }}">

                            </div>

                        </div>

                        <div class="col-sm-12">

                            <div class="form-group">

                                <label for="agregar_fecha_termino"><span style="color: red;">*</span>Fecha Termino</label>

                                <input type="date" name="agregar_fecha_termino" id="agregar_fecha_termino" value="">

                            </div>

                        </div>

                    </div>



                    <div class="col-sm-12">

                        <div class="form-group">

                            <label class="floating-label-activo-sm">Comentario</label>

                            <textarea class="form-control form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="agregar_comentario" id="agregar_comentario"></textarea>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12"><span style="color: red;">*</span>Campos requeridos</div>

                </div>

            </div>

            <div class="modal-footer">



                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                <button type="button" class="btn btn-primary" onclick="registrar_dep_existente();">Registrar</button>

            </div>

        </div>

    </div>

</div>



<!-- Modal agregar paciente nuevo -->

<div class="modal fade" id="modal_agregar_dep_nuevo" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">

    <div class="modal-content">

        <div class="modal-header bg-info">

            <h5 class="modal-title text-white mt-1" id="modal_indicar_examen">Agregar Mascota no registrada</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        </div>

        <div class="modal-body">



            <div class="form-row">
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label class="floating-label-activo-sm"><span class="requerido" style="color: red;" id="requerido_modal_agregar_dep_nuevo_tiene_chip">*</span>¿Tiene chip?</label>
                        <select class="form-control form-control-sm" name="modal_agregar_dep_nuevo_tiene_chip" id="modal_agregar_dep_nuevo_tiene_chip" onchange="toggleChipInput();">
                            <option value="0">No</option>
                            <option value="1">Sí</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6" id="contenedor_numero_chip" style="display:none;">
                    <div class="form-group">
                        <label class="floating-label-activo-sm"><span class="requerido" style="color: red; display:none;" id="requerido_modal_agregar_dep_nuevo_rut">*</span>Ingrese N°</label>
                        <input type="text" class="form-control form-control-sm" name="modal_agregar_dep_nuevo_rut" id="modal_agregar_dep_nuevo_rut">
                    </div>
                </div>
            </div>

            <div class="form-row">

                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">

                    <div class="form-group">
                        <label class="floating-label-activo-sm"><span class="requerido" style="color: red;" id="requerido_modal_agregar_dep_nuevo_nombres_paciente">*</span>Nombre Mascota</label>
                        <input type="text" required class="form-control form-control-sm" name="modal_agregar_dep_nuevo_nombres_paciente" id="modal_agregar_dep_nuevo_nombres_paciente">
                    </div>

                </div>

                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    <div class="form-group">
                        <label class="floating-label-activo-sm" for="espec_masc">Especie</label>
                        <select name="espec_masc" id="espec_masc" class="form-control form-control-sm" onchange="handleEspecieChange();">
                            <option value="0">Seleccione</option>
                            @foreach(($especiesMascotas ?? []) as $especie)
                                <option value="{{ $especie->id }}">{{ $especie->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" id="div_espec_masc" style="display:none;">
                        <label class="floating-label-activo-sm" for="obs_espec_masc">Otra especie <i>(Anote)</i></label>
                        <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_espec_masc" id="obs_espec_masc"></textarea>
                    </div>
                </div>    

                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    <div class="form-group">
                        <label class="floating-label-activo-sm"><span class="requerido" style="color: red;" id="requerido_modal_agregar_dep_nuevo_tamano">*</span>Tipo de mascota (tamaño)</label>
                        <select class="form-control form-control-sm" name="modal_agregar_dep_nuevo_tamano" id="modal_agregar_dep_nuevo_tamano">
                            <option value="">Seleccione</option>
                            @foreach(($tamanosMascotas ?? []) as $tamano)
                                <option value="{{ $tamano->id }}">{{ $tamano->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    <div class="form-group">
                        <label class="floating-label-activo-sm"><span class="requerido" style="color: red;" id="requerido_modal_agregar_dep_nuevo_esterilizado">*</span>¿Esterilizado?</label>
                        <select class="form-control form-control-sm" name="modal_agregar_dep_nuevo_esterilizado" id="modal_agregar_dep_nuevo_esterilizado" onchange="toggleEsterilizacion();">
                            <option value="">Seleccione</option>
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6" id="contenedor_fecha_esterilizacion" style="display:none;">
                    <div class="form-group">
                        <label class="floating-label-activo-sm" for="modal_agregar_dep_nuevo_fecha_esterilizacion"><span class="requerido" style="color: red; display:none;" id="requerido_modal_agregar_dep_nuevo_fecha_esterilizacion">*</span>Fecha de esterilización</label>
                        <input type="date" class="form-control form-control-sm" name="modal_agregar_dep_nuevo_fecha_esterilizacion" id="modal_agregar_dep_nuevo_fecha_esterilizacion" max="{{ date('Y-m-d') }}">
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="floating-label-activo-sm" for="modal_agregar_dep_nuevo_enfermedad_cronica">Enfermedad crónica o frecuente</label>
                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="modal_agregar_dep_nuevo_enfermedad_cronica" id="modal_agregar_dep_nuevo_enfermedad_cronica"></textarea>
                    </div>
                </div>


                <div class="col-sm-6 col-md-6">

                    <div class="form-group">

                        <label class="floating-label-activo-sm"><span class="requerido" style="color: red;" id="requerido_modal_agregar_dep_nuevo_fecha_nac">*</span>F. Nacimiento</label>

                        <input type="date" class="form-control form-control-sm" name="modal_agregar_dep_nuevo_fecha_nac" id="modal_agregar_dep_nuevo_fecha_nac" max="{{ date('Y-m-d') }}" onchange="validar_requeridos('modal_agregar_dep_nuevo_fecha_nac');">

                    </div>

                </div>

                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="floating-label-activo-sm"><span class="requerido" style="color: red;" id="requerido_sm">*</span>Sexo</label>
                        <select id="modal_agregar_dep_nuevo_sexo" name="modal_agregar_dep_nuevo_sexo" class="form-control form-control-sm">
                            <option value="0">Selecione una opci&oacute;n</option>
                            <option value="F">Macho</option>
                            <option value="M">Hembra</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <h6 class="t-aten">Fotos</h6>
                                <input type="hidden" name="input_lista_ven_imagenes" id="input_lista_ven_imagenes" value="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2">
                                <p class="f-12 mb-0 font-weight-bold text-center">Cargar foto del perfil</p>
                                <input type="hidden" name="imagenes_ven_pre" id="imagenes_ven_pre" value="">
                                <div class="dropzone" id="mi-imagen-ven-pre" action="{{ route('profesional.imagen.carga') }}"></div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2">
                                <p class="f-12 mb-0 font-weight-bold text-center">Otras fotos</p>
                                <input type="hidden" name="imagenes_ven_post" id="imagenes_ven_post" value="">
                                <div class="dropzone" id="mi-imagen-ven-post" action="{{ route('profesional.imagen.carga') }}"></div>
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">
                                <label class="floating-label-activo-sm" for="obs_fotos_ven">Comentarios de marcas o distintivos especiales</label>
                                <textarea class="form-control caja-texto form-control-sm" onfocus="this.rows=3" onblur="this.rows=2;" data-titulo="Comentarios Fotos" data-seccion="Venereas" data-tipo="venereas" name="obs_fotos_ven" id="obs_fotos_ven"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                                  
                          

                {{--  <div class="col-sm-12 col-md-12">

                    <div class="form-group">

                        <label class="floating-label-activo-sm"><span class="requerido" style="color: red;" id="requerido_sm">*</span>Previsi&oacute;n</label>

                        <select id="modal_agregar_dep_nuevo_convenio" name="modal_agregar_dep_nuevo_convenio" class="form-control form-control-sm">

                            <option value="0">Selecione una opci&oacute;n</option>

                            @if (isset($prevision))

                                @foreach ($prevision as $p)

                                    <option value="{{ $p->id }}">{{ $p->nombre }}</option>

                                @endforeach

                            @endif

                        </select>

                    </div>

                </div>

                <div class="col-sm-8 col-md-8">

                    <div class="form-group">

                        <label class="floating-label-activo-sm"><span class="requerido" style="color: red;" id="requerido_modal_agregar_dep_nuevo_direccion">*</span>Direcci&oacute;n</label>

                        <input type="address" class="form-control form-control-sm" name="modal_agregar_dep_nuevo_direccion" id="modal_agregar_dep_nuevo_direccion">

                    </div>

                </div>



                <div class="col-sm-4 col-md-4">

                    <div class="form-group">

                        <label class="floating-label-activo-sm">Nº</label>

                        <input type="address" class="form-control form-control-sm" name="modal_agregar_dep_nuevo_numero_dir" id="modal_agregar_dep_nuevo_numero_dir">

                    </div>

                </div>



                <div class="col-sm-6 col-md-6">

                    <div class="form-group">

                        <label class="floating-label-activo-sm"><span class="requerido" style="color: red;" id="requerido_sm">*</span>Región</label>

                        <select onchange="buscar_ciudad('modal_agregar_dep_nuevo_region', 'modal_agregar_dep_nuevo_ciudad',$('#modal_agregar_dep_nuevo_region').val());" name="modal_agregar_dep_nuevo_region" id="modal_agregar_dep_nuevo_region"  class="form-control form-control-sm" required>

                            <option value="0">Seleccione</option>

                            @if (isset($region))

                                @foreach ($region as $reg)

                                    <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>

                                @endforeach

                            @endif

                        </select>

                    </div>

                </div>



                <div class="col-sm-6 col-md-6">

                    <div class="form-group">

                        <label class="floating-label-activo-sm"><span class="requerido" style="color: red;" id="requerido_sm">*</span>Ciudad</label>

                        <select id="modal_agregar_dep_nuevo_ciudad" name="modal_agregar_dep_nuevo_ciudad" class="form-control form-control-sm" required>

                            <option value="1">Seleccione</option>

                        </select>

                    </div>

                </div>

                <div class="col-sm-6 col-md-6">

                    <div class="form-group">

                        <label class="floating-label-activo-sm"><span class="requerido" style="color: red;" id="requerido_modal_agregar_dep_nuevo_correo">*</span>Correo Electr&oacute;nico</label>

                        <input type="text" class="form-control form-control-sm" name="modal_agregar_dep_nuevo_correo" id="modal_agregar_dep_nuevo_correo">

                        <span id="mensaje_email_reserva" style="display:none"></span>

                    </div>

                </div>

                <div class="col-sm-6 col-md-6">

                    <div class="form-group">

                        <label class="floating-label-activo-sm"><span class="requerido" style="color: red;" id="requerido_modal_agregar_dep_nuevo_telefono_uno">*</span>Tel&eacute;fono</label>

                        <input type="tel" class="form-control form-control-sm" name="modal_agregar_dep_nuevo_telefono_uno" id="modal_agregar_dep_nuevo_telefono_uno">

                    </div>

                </div>

            </div>



            <hr>

            <div id="mensaje_edad" style="display: none" class="alert alert-danger" ></div>

            <div class="row" id="div_relaciones">

                <div class="col-sm-12">

                    <div class="form-group">

                        <label class="floating-label-activo-sm"><span class="requerido" style="color: red;" id="requerido_modal_agregar_dep_nuevo_tipo_dependencia">*</span>Relación</label>

                        <select class="form-control form-control-sm" name="modal_agregar_dep_nuevo_relacion" id="modal_agregar_dep_nuevo_relacion" onchange="cargar_tipo_dependencia('modal_agregar_dep_nuevo_relacion','modal_agregar_dep_nuevo_tipo_dependencia');">

                            <option value="">Seleccione</option>

                        </select>

                    </div>

                </div>

                <div class="col-sm-12">

                    <div class="form-group">

                        <label class="floating-label-activo-sm"><span class="requerido" style="color: red;" id="requerido_3">*</span>Tipo de dependencia</label>

                        <select class="form-control form-control-sm" name="modal_agregar_dep_nuevo_tipo_dependencia" id="modal_agregar_dep_nuevo_tipo_dependencia" onchange="evaluar_tipodependencia('modal_agregar_dep_nuevo_tipo_dependencia', 'modal_agregar_dep_nuevo_fechas', '2,4');">

                            <option value="">Seleccione</option>

                        </select>

                    </div>

                </div>

                <div class="col-sm-12 modal_agregar_dep_nuevo_fechas" name="modal_agregar_dep_nuevo_fechas" id="modal_agregar_dep_nuevo_fechas" style="display: none;">

                    <div class="row">

                        <div class="col-sm-6">

                            <div class="form-group">

                                <label for="modal_agregar_dep_nuevo_fecha_inicio"><span class="requerido" style="color: red;" id="requerido_4">*</span>Fecha Inicio</label>

                                <input class="form-control form-control-sm" type="date" name="modal_agregar_dep_nuevo_fecha_inicio" id="modal_agregar_dep_nuevo_fecha_inicio" value="{{ date('Y-m-d') }}">

                            </div>

                        </div>

                        <div class="col-sm-6">

                            <div class="form-group">

                                <label for="modal_agregar_dep_nuevo_fecha_termino"><span class="requerido" style="color: red;" id="requerido_5">*</span>Fecha Termino</label>

                                <input class="form-control form-control-sm" type="date" name="modal_agregar_dep_nuevo_fecha_termino" id="modal_agregar_dep_nuevo_fecha_termino" value="">

                            </div>

                        </div>

                    </div>

                </div>



                <div class="col-sm-12">

                    <div class="form-group">

                        <label class="floating-label-activo-sm">Comentario</label>

                        <textarea class="form-control form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="modal_agregar_dep_nuevo_comentario" id="modal_agregar_dep_nuevo_comentario"></textarea>

                    </div>

                </div>

            </div>  --}}



            <!--<div class="row">

                <div class="col-md-12"><span style="color: red;" >*</span>Campos requeridos</div>

            </div>-->



        </div>



        <div class="modal-footer">

            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cerrar</button>

            <button type="button" class="btn btn-info btn-sm" id="btn_registrar" onclick="registrar_dep_nuevo();"><i class="feather icon-check"></i> Registrar</button>

        </div>



    </div>

  </div>

</div>

<script>
       function cargarIgual(input)
    {

        let actual = $('#'+input);
        let equivalentes = $('#'+input).attr('data-input_igual').split(',');
        $.each(equivalentes, function( index, value ) {
            var equivalente = $('#'+value);
            equivalente.val(actual.val());
        });

    }
    function evaluar_para_carga_detalle(select, div, input, valor)
    {
        var valor_select = $('#'+select+'').val();
        if(valor_select == valor) $('#'+div+'').show();
        else {
            $('#'+div+'').hide();
            $('#'+input+'').val('');
        }
    }
</script>
@section('script-veneria')
<script>
  
  // IMPORTANTE: desactiva auto-discover
  Dropzone.autoDiscover = false;

  // Lista (la mantengo igual)
  var lista_ven_imagenes = {};

  function cargar_lista_ven_imagenes(obj_dropzone, alias_examen) {
    lista_ven_imagenes[alias_examen] = [];

    let temp = obj_dropzone.getAcceptedFiles();
    $.each(temp, function(index, value) {
      if (value.status === "success" && value.xhr) {
        var img_temp = JSON.parse(value.xhr.response);

        lista_ven_imagenes[alias_examen][index] = [
          url = img_temp.img.url,
          nombre_origian = img_temp.img.original_file_name,
          nombre_img = img_temp.img.nombre_img,
          file_extension = img_temp.img.file_extension,
        ];

        $('#input_lista_ven_imagenes').val(JSON.stringify(lista_ven_imagenes));
      }
    });
  }

  // Destruye cualquier instancia previa (auto o vieja)
  function destroyDZ(selector) {
    var el = document.querySelector(selector);
    if (el && el.dropzone) {
      el.dropzone.destroy();
    }
  }

  // Instancias globales
  var myDropzone_ven_pre = null;
  var myDropzone_ven_post = null;

  function initVenDropzones() {
    // Si no están en el DOM, no hagas nada
    if (!document.querySelector("#mi-imagen-ven-pre")) return;
    if (!document.querySelector("#mi-imagen-ven-post")) return;

    destroyDZ("#mi-imagen-ven-pre");
    destroyDZ("#mi-imagen-ven-post");

    myDropzone_ven_pre = new Dropzone("#mi-imagen-ven-pre", {
      url: "{{ route('profesional.imagen.carga') }}",
      method: "post",
      headers: { "X-CSRF-TOKEN": CSRF_TOKEN },

      // ✅ Para descartar falsos “tipo inválido”
      acceptedFiles: "image/jpeg,image/png,image/jpg,.jpeg,.jpg,.png,image/*",
      maxFilesize: 6, // MB
      maxFiles: 12,
      addRemoveLinks: true,
      createImageThumbnails: true,
      paramName: "file", // default, pero lo dejamos explícito

      dictInvalidFileType: "No puedes subir archivos de este tipo.",
      dictFileTooBig: "El archivo es demasiado grande. Max 6 MiB.",

      success: function(file, response) {
        $('#imagenes_ven_pre').val(response.img.url ?? response.img.nombre_img);
        cargar_lista_ven_imagenes(myDropzone_ven_pre, "ven_pre");
      },

      error: function(file, message, xhr) {
        console.log("VEN_PRE ERROR:", message);
        if (xhr && xhr.responseText) console.log("VEN_PRE SERVER:", xhr.responseText);
      },

      removedfile: function(file) {
        $('#imagenes_ven_pre').val('');
        cargar_lista_ven_imagenes(myDropzone_ven_pre, "ven_pre");
        if (file.previewElement) file.previewElement.remove();
      }
    });

    myDropzone_ven_post = new Dropzone("#mi-imagen-ven-post", {
      url: "{{ route('profesional.imagen.carga') }}",
      method: "post",
      headers: { "X-CSRF-TOKEN": CSRF_TOKEN },

      acceptedFiles: "image/jpeg,image/png,image/jpg,.jpeg,.jpg,.png,image/*",
      maxFilesize: 6,
      maxFiles: 12,
      addRemoveLinks: true,
      createImageThumbnails: true,
      paramName: "file",

      dictInvalidFileType: "No puedes subir archivos de este tipo.",
      dictFileTooBig: "El archivo es demasiado grande. Max 6 MiB.",

      success: function(file, response) {
        $('#imagenes_ven_post').val(response.img.nombre_img);
        cargar_lista_ven_imagenes(myDropzone_ven_post, "ven_post");
      },

      error: function(file, message, xhr) {
        console.log("VEN_POST ERROR:", message);
        if (xhr && xhr.responseText) console.log("VEN_POST SERVER:", xhr.responseText);
      },

      removedfile: function(file) {
        $('#imagenes_ven_post').val('');
        cargar_lista_ven_imagenes(myDropzone_ven_post, "ven_post");
        if (file.previewElement) file.previewElement.remove();
      }
    });
  }

  // ✅ Inicializa cuando el modal se ABRE (bootstrap)
  $(document).on("shown.bs.modal", "#modal_agregar_dep_nuevo", function() {
    initVenDropzones();
  });

  // (opcional) por si la vista se carga ya con el modal abierto
  $(document).ready(function() {
    initVenDropzones();
  });
</script>
@endsection
