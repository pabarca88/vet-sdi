{{--
    AL REALIZAR EL INCLUDE SE DEBE COLOCAR EL TIPO DE FICHA DE ATENCION
    1 FICHA ATENCION
    2 FICHA OTROS PROFESIONALES
    3 FICHA GINECOOBSTETRA
    EJEMPLO:
    <!--Formulario / Menor de edad-->
    @php
        $tipo_ficha = 1;
    @endphp
    @include('general.secciones_ficha.seccion_menor',['tipo_ficha' => X])
    <!--Cierre: Formulario / Menor de edad-->
--}}
{{--  SECCION MENOR DE EDAD INICIO  --}}
@if (\Carbon\Carbon::parse($paciente->fecha_nac)->age < 18)
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header" id="menor_edad">
                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#menor_edad_c" aria-expanded="false" aria-controls="menor_edad_c">
                    Info. Acompañante del menor de edad
                </button>
            </div>
            @if (isset($tipo_ficha))
                <input type="hidden" name="secccion_menor_edad_tipo_fc" id="secccion_menor_edad_tipo_fc" value="{{ $tipo_ficha }}">
            @else
                <input type="hidden" name="secccion_menor_edad_tipo_fc" id="secccion_menor_edad_tipo_fc" value="1">
            @endif
            <div id="menor_edad_c" class="collapse show" aria-labelledby="menor_edad" data-parent="#menor_edad">
                <div class="card-body-aten shadow-none">
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <div class="alert alert-success" role="alert">
                                <div class="row">
                                    @if ($responsables)
                                        <div class="col-md-6">
                                            <span style="font-weight: bold;">Representante:<br/></span>
                                            @foreach ($responsables as $respons)
                                                {!! $respons->nombres.' '.$respons->apellido_uno.' '.$respons->rut.'<br/>'  !!}
                                            @endforeach
                                        </div>
                                    @endif

                                    @if ($acompanantes)
                                        <div class="col-md-6">
                                            <span style="font-weight: bold;">Acompañantes Registrados:<br/></span>
                                            @foreach ($acompanantes as $acomp)
                                                {!! $acomp->nombres.' '.$acomp->apellido_uno.' '.$acomp->rut.'<br/>'  !!}
                                            @endforeach
                                        </div>
                                    @endif

                                    <div class="col-md-6" id="otros_acompanantes" name="otros_acompanantes" style="display: none;">
                                        <span style="font-weight: bold;">Otros Acompañantes:<br/></span>

                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <button type="button" class="btn btn-success btn-sm" onclick="otro_acompanante();">Otro</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<div id="modal_registrar_otro_acompanante" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_registrar_otro_acompanante" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info pt-3 pb-2">
                <h5 class="modal-title text-white text-center">Registrar otro acompañante</h5>
                <button id="btn_cerrar_otro_acompanante_x" type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Nombres</label>
                            <input type="text" class="form-control form-control-sm" name="otro_acompanante_nombre" id="otro_acompanante_nombre">
                        </div>
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Apellido Paterno</label>
                            <input type="text" class="form-control form-control-sm" name="otro_acompanante_apellido_uno" id="otro_acompanante_apellido_uno">
                        </div>
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Apellido Materno</label>
                            <input type="text" class="form-control form-control-sm" name="otro_acompanante_apellido_dos" id="otro_acompanante_apellido_dos">
                        </div>
                        <div class="form-group">
                            <label class="floating-label-activo-sm">RUT</label>
                            <input type="text" class="form-control form-control-sm" name="otro_acompanante_rut" id="otro_acompanante_rut">
                        </div>
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Teléfono</label>
                            <input type="text" class="form-control form-control-sm" name="otro_acompanante_telefono" id="otro_acompanante_telefono">
                        </div>
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Correo Electrónico</label>
                            <input type="text" class="form-control form-control-sm" name="otro_acompanante_email" id="otro_acompanante_email">
                        </div>
                        <div class="form-group">
                            <label class="floating-label-activo-sm"><span style="color: red;">*</span>Relación</label>
                            <select class="form-control form-control-sm" name="otro_acompanante_relacion" id="otro_acompanante_relacion">
                                <option value="">Seleccione</option>
                                <option value="Hijo(a)" selected>Hijo(a)</option>
                                <option value="Sobrino(a)">Sobrino(a)</option>
                                <option value="Nieto(a)">Nieto(a)</option>
                                <option value="Hermano(a)">Hermano(a)</option>
                                <option value="Primo(a)">Primo(a)</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="btn_guardar_otro_acompanante" type="button" class="btn btn-sm btn-success-light" onclick="registrar_otro_acompananate();">Guardar</button>
                <button id="btn_cerrar_otro_acompanante" type="button" class="btn btn-sm btn-danger-light" data-dismiss="modal" aria-label="Close">Cerrar</button>
            </div>

        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
    });

    function otro_acompanante()
    {
        $('#otro_acompanante_nombre').val('');
        $('#otro_acompanante_apellido_uno').val('');
        $('#otro_acompanante_apellido_dos').val('');
        $('#otro_acompanante_rut').val('');
        $('#otro_acompanante_telefono').val('');
        $('#otro_acompanante_email').val('');
        $('#otro_acompanante_relacion').val('');
        $('#modal_registrar_otro_acompanante').modal('show');
    }

    function registrar_otro_acompananate()
    {
        /** id ficha de atencion */
        var id_ficha_atencion = $('#id_fc').val();
        var id_ficha_otros_prof = $('#id_fc').val();
        var id_ficha_gineco_obstetrica = $('#id_fc').val();
        switch (parseInt($('#secccion_menor_edad_tipo_fc').val())) {
            case 1:
                id_ficha_atencion = $('#id_fc').val();
                id_ficha_otros_prof = 0;
                id_ficha_gineco_obstetrica = 0;
                break;
            case 2:
                id_ficha_atencion = 0;
                id_ficha_otros_prof = $('#id_fc').val();
                id_ficha_gineco_obstetrica = 0;
                break;
            case 3:
                id_ficha_atencion = 0;
                id_ficha_otros_prof = 0;
                id_ficha_gineco_obstetrica = $('#id_fc').val();
                break;
            default:
                break;
        };

        var id_paciente = $('#id_paciente_fc').val();
        var id_profesional = $('#id_profesional_fc').val();
        var nombre = $('#otro_acompanante_nombre').val();
        var apellido_uno = $('#otro_acompanante_apellido_uno').val();
        var apellido_dos = $('#otro_acompanante_apellido_dos').val();
        var rut = $('#otro_acompanante_rut').val();
        var telefono = $('#otro_acompanante_telefono').val();
        var email = $('#otro_acompanante_email').val();
        var relacion = $('#otro_acompanante_relacion').val();
        var _token = CSRF_TOKEN;
        var mensaje = '';
        var valido = 1;

        if(nombre == '')
        {
            mensaje += 'Ingrese el Nombre del acompañante\n';
            valido = 0;
        }
        if(apellido_uno == '')
        {
            mensaje += 'Ingrese el Apellido Paterno del acompañante\n';
            valido = 0;
        }
        if(apellido_dos == '')
        {
            mensaje += 'Ingrese el Apellido Materno del acompañante\n';
            valido = 0;
        }
        if(rut == '')
        {
            mensaje += 'Ingrese el RUT del acompañante\n';
            valido = 0;
        }
        if(telefono == '' && email == '')
        {
            mensaje += 'Ingrese el Teléfono o Correo Electronico del acompañante\n';
            valido = 0;
        }
        if(relacion == '')
        {
            mensaje += 'Seleccione la Relación del acompañante\n';
            valido = 0;
        }

        if(valido == 1)
        {
            let url = "{{ route('otro.acompanante.registrar') }}";
            $.ajax({
                url: url,
                type: "post",
                data: {
                    _token: _token,
                    id_paciente: id_paciente,
                    id_profesional: id_profesional,
                    id_ficha_atencion: id_ficha_atencion,
                    id_ficha_otros_prof: id_ficha_otros_prof,
                    id_ficha_gineco_obstetrica: id_ficha_gineco_obstetrica,
                    nombre: nombre,
                    apellido_uno: apellido_uno,
                    apellido_dos: apellido_dos,
                    rut: rut,
                    telefono: telefono,
                    relacion: relacion,
                },
            })
            .done(function(data) {
                if (data != null)
                {
                    if(data.estado == 1)
                    {
                        swal({
                            title: "Registro Otro Acompañanta",
                            text: "Registro Exitoso",
                            icon: "success",
                        });


                        var html = '';
                        html += '<span style="font-weight: bold;">Otros Acompañantes:<br/></span>';
                        html += nombre+' '+apellido_uno+' '+rut+'';
                        $('#otros_acompanantes').html(html);
                        $('#otros_acompanantes').show();

                        $('#modal_registrar_otro_acompanante').modal('hide');
                    }
                    else
                    {
                        swal({
                            title: "Registro Otro Acompañanta",
                            text: data.msj,
                            icon: "error",
                        })
                    }
                }
                else
                {
                    swal({
                        title: "Registro Otro Acompañanta",
                        text: data.msj,
                        icon: "error",
                    });
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }
        else
        {
            swal({
                title: "Registro Otro Acompañanta",
                text: mensaje,
                icon: "error",
            });
        }
    }
</script>
{{--  SECCION MENOR DE EDAD INICIO  --}}
