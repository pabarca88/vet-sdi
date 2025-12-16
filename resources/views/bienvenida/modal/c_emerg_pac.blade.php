<div id="c_emerg_pac" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="c_emerg_pac" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
		<div class="modal-content" >
			<div class="modal-header">
				<h5 class="modal-title text-c-blue mt-1">Contacto de emergencia</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrar_agregar_contacto_emergencia();"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
                <form>
                    @csrf
                    <input type="hidden" name="id_paciente" id="id_paciente" value="{{ $paciente->id }}">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <h6 class="text-c-blue ml-1 mb-3">Ingrese los datos de su contacto de emergencia</h6>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label class="floating-label-activo">Rut</label>
                                <input type="text" class="form-control" name="rut_nuevo_contacto" id="rut_nuevo_contacto">
                                <span id="mensaje_asistente"></span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <button class="btn btn-info" onclick="buscar_contacto()" type="button" id="">Buscar</button>
                        </div>
                    </div>
                    <div class="row" id="form_contacto_nuevo" name="form_contacto_nuevo" style="display: none">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label-activo">Nombres</label>
                                <input type="text" class="form-control" name="nombres_contacto_emergencia" id="nombres_contacto_emergencia">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label-activo">Primer Apellido</label>
                                <input type="text" class="form-control" name="apellido_uno_contacto_emergencia" id="apellido_uno_contacto_emergencia">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label-activo">Segundo Apellido</label>
                                <input type="text" class="form-control" name="apellido_dos_contacto_emergencia" id="apellido_dos_contacto_emergencia">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label-activo">Fecha Nacimiento</label>
                                <input type="date" class="form-control" name="fecha_nac_contacto_emergencia" id="fecha_nac_contacto_emergencia">
                            </div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <div class="form-group">
                                <label class="floating-label-activo">Direcci&oacute;n</label>
                                <input type="address" class="form-control" name="direccion_contacto_emergencia" id="direccion_contacto_emergencia">
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <div class="form-group">
                                <label class="floating-label-activo">N&uacute;mero</label>
                                <input type="address" class="form-control" name="numero_dir_contacto_emergencia" id="numero_dir_contacto_emergencia">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label-activo">Regi&oacute;n</label>
                                <select id="region_agregar" onchange="buscar_ciudades();" name="region_agregar" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    @if (isset($regiones))
                                        @foreach ($regiones as $reg)
                                            <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label-activo">Comuna</label>
                                <select id="ciudad_agregar" name="ciudad_agregar" class="form-control" required>
                                    <option value="0">Seleccione</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label-activo">Correo Electrónico</label>
                                <input type="email" class="form-control" name="email_contacto_emergencia" id="email_contacto_emergencia">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label-activo">Teléfono</label>
                                <input type="tel" class="form-control" name="telefono_contacto_emergencia" id="telefono_contacto_emergencia">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label-activo">Parentezco</label>
                                <select id="parentezco_contacto_emergencia" name="parentezco_contacto_emergencia" class="form-control">
                                    <option value="0">Seleccione una opción</option>
                                    <option value="Pareja">Pareja</option>
                                    <option value="Padre">Padre</option>
                                    <option value="Madre">Madre</option>
                                    <option value="Hermano/a">Hermano/a</option>
                                    <option value="Abuelo/a">Abuelo/a</option>
                                    <option value="Tío/a">Tío/a</option>
                                    <option value="Primo/a">Primo/a</option>
                                    <option value="Amigo/a">Amigo/a</option>
                                    <option value="Otro">Otro</option> el parentezco-->
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label-activo">Prioridad</label>
                                <select id="prioridad_contacto_emergencia" name="prioridad_contacto_emergencia" class="form-control">
                                    <option>Seleccione una opción</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="cerrar_agregar_contacto_emergencia();" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" onclick="registrar_contacto_emergencia();" class="btn btn-info">Guardar Contacto</button>
                    </div>
                </form>
            </div>
		</div>
	</div>
</div>

<script type="text/javascript">
    function sos() {
        $('#c_emerg_pac').modal('show');
    }

    $(document).ready(function () {

        /* formatear rut */
        $("#rut_nuevo_contacto").rut({
            formatOn: 'keyup',
            minimumLength: 2,
            validateOn: 'change',
            useThousandsSeparator : false
        });

    });

    function buscar_contacto() {


        $('#nombres_contacto_emergencia').val();
        $('#apellido_uno_contacto_emergencia').val();
        $('#apellido_dos_contacto_emergencia').val();
        $('#email_contacto_emergencia').val();
        $('#telefono_contacto_emergencia').val();
        $('#direccion_contacto_emergencia').val();
        $('#numero_dir_contacto_emergencia').val();
        $('#fecha_nac_contacto_emergencia').val();

        let rut_contacto = $('#rut_nuevo_contacto').val();
        let id_paciente_contacto = $('#id_paciente').val();
        let url = "{{ route('contacto_emergencia.buscar_contacto') }}"

        $.ajax({

                url: url,
                type: "post",
                data: {
                    _token: CSRF_TOKEN,
                    rut_contacto: rut_contacto,
                    id_paciente_contacto: id_paciente_contacto,
                },
            })
            .done(function(data) {

                if (data == 'identicos') {
                    swal({
                        title: "No puede ser registrado el rut del paciente como contacto",
                        icon: "error",
                        buttons: "Aceptar",
                        dangerMode: true,
                    });

                    $('#rut_nuevo_contacto').val('');
                    $('#nombres_contacto_emergencia').val('');
                    $('#apellido_uno_contacto_emergencia').val('');
                    $('#apellido_dos_contacto_emergencia').val('');
                    $('#fecha_nac_contacto_emergencia').val('');
                    $('#direccion_contacto_emergencia').val('');
                    $('#ciudad_agregar').val('');
                    $('#region_agregar').val('');
                    $('#email_contacto_emergencia').val('');
                    $('#telefono_contacto_emergencia').val('');
                    $('#parentezco_contacto_emergencia').val('0');
                    $('#prioridad_contacto_emergencia').val('');
                }

                if (data !== 'vacio') {

                    if (data == 'existe') {

                        swal({
                            title: "Ya Existe el contacto emergencia en su lista",
                            icon: "error",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                        // alert('Contacto Emergencia ya esta agregado a su lista');
                        $('#rut_nuevo_contacto').val('');

                    } else {

                        data = JSON.parse(data);

                        for (let i = 0; i < data.region.length; i++) {

                            if (data.region[i].id == data.ciudad.id_region) {

                                $('#region_agregar').val(data.region[i].id);
                                buscar_ciudades();

                            }
                        }
                        // alert(data.ciudad.id);
                        // console.log(data.ciudad.id);
                        $('#ciudad_agregar').val(data.ciudad.id);
                        //console.log(data)
                        /* alert('Asistente encontrado en el sistema, valide datos para registrar');
                         $('#id_asistente_registrado').val(data.id);
                         $('#buscar_datos_asistente').hide();

                         $('#inputs_nuevo_asistente').show();*/
                        $('#form_contacto_nuevo').show();
                        $('#nombres_contacto_emergencia').val(data.nombres);
                        $('#apellido_uno_contacto_emergencia').val(data.apellido_uno);
                        $('#apellido_dos_contacto_emergencia').val(data.apellido_dos);
                        $('#email_contacto_emergencia').val(data.email);
                        $('#telefono_contacto_emergencia').val(data.telefono_uno);
                        $('#direccion_contacto_emergencia').val(data.direccion);
                        $('#numero_dir_contacto_emergencia').val(data.numero_dir);
                        $('#fecha_nac_contacto_emergencia').val(data.fecha_nac);
                        let ciudad = data.ciudad.id;
                        // console.log(ciudad + ' entro a ciudad');

                        // $('#ciudad_agregar option[value="' + ciudad + '"]"').attr("selected", true);

                        // console.log(data.ciudad.id);
                    }

                } else {


                    swal({
                        title: "Rut no encontrado en el sistema, complete registro",
                        icon: "warning",
                        buttons: "Aceptar",
                        //SuccessMode: true,
                    })

                    // alert('Rut no encontrado en el sistema, complete registro');
                    $('#form_contacto_nuevo').show();

                }


            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });



    }

    function cerrar_agregar_contacto_emergencia() {
        $('#agregar_contacto_emergencia').modal('hide');
        $('#form_contacto_nuevo').hide();
        $("#rut_nuevo_contacto").val('');
    }

    function buscar_ciudades() {

        let region = $('#region_agregar').val();
        let url = "{{ route('home.buscar_ciudad_region') }}";
        $.ajax({

                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    region: region,
                },
            })
            .done(function(data) {
                if (data != null) {
                    data = JSON.parse(data);

                    let ciudades = $('#ciudad_agregar');

                    ciudades.find('option').remove();
                    ciudades.append('<option value="">Seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        ciudades.append('<option value="' + v.id + '">' + v.nombre +
                            '</option>');
                    })

                } else {

                    swal({
                        title: "Error",
                        text: "Error al cargar las ciudades",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })

                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

    };

    function registrar_contacto_emergencia() {

        let id_paciente = $('#id_paciente').val();
        let url = "{{ route('contacto_emergencia.registrar_contacto_emergencia') }}";

        let rut = $('#rut_nuevo_contacto').val();
        let nombres = $('#nombres_contacto_emergencia').val();
        let apellido_uno = $('#apellido_uno_contacto_emergencia').val();
        let apellido_dos = $('#apellido_dos_contacto_emergencia').val();
        let fecha = $('#fecha_nac_contacto_emergencia').val();
        let direccion = $('#direccion_contacto_emergencia').val();
        let id_ciudad = $('#ciudad_agregar').val();
        let email = $('#email_contacto_emergencia').val();
        let telefono = $('#telefono_contacto_emergencia').val();
        let parentezco = $('#parentezco_contacto_emergencia').val();
        let prioridad = $('#prioridad_contacto_emergencia').val();

        // let direccion = $('#direccion_contacto_emergencia').val();
        let numero_dir = $('#numero_dir_contacto_emergencia').val();
        //let ciudad_agregar = $('#ciudad_agregar').val();


        $.ajax({
            url: url,
            type: "post",
            data: {
                _token: CSRF_TOKEN,
                id_paciente: id_paciente,
                rut: rut,
                nombres: nombres,
                apellido_uno: apellido_uno,
                apellido_dos: apellido_dos,
                fecha: fecha,
                direccion: direccion,
                numero_dir: numero_dir,
                id_ciudad: id_ciudad,
                email: email,
                telefono: telefono,
                parentezco: parentezco,
                prioridad: prioridad

            },
        })
        .done(function(data) {



            if (data != null) {
                data = JSON.parse(data);
                // console.log(data);

                $('#agregar_contacto_emergencia').modal('hide');

                swal({
                    title: "Se Registro Contacto de emergencia de forma correcta",
                    icon: "success",
                })

                liberar_bienvenida();

                setTimeout(function() {
                    // location.reload();
                    location.href = '{{ route('home.ingreso') }}';
                }, 3000);
                // $('#mensaje_ditar_perfil').text(
                //     'Se Registro Contacto de emergencia de forma correcta');


            } else {
                swal({
                    title: "No se pudo registrar al contacto de emergencia",
                    icon: "error",
                    buttons: "Aceptar",
                    dangerMode: true,
                });

            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    };


</script>
