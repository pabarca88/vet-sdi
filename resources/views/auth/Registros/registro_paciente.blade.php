<!DOCTYPE html>
<html lang="es">

<head>
	@include('auth/include/head')

	<link rel="stylesheet" href="{{ asset('css/form-registro.css') }}">
	<link rel="stylesheet" href="{{ asset('css/formulario_sm.css') }}">
</head>

<body>
    <style type="text/css">
        .auth-wrapper {
            background-size: cover;
            background-image: url("{{ asset('images/background_1.jpg') }}");
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .es-invalido {
            border-color: #ff5252;
            padding-right: calc(1.5em + 1.25rem);
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.3125rem) center;
            background-size: calc(0.75em + 0.625rem) calc(0.75em + 0.625rem);
        }

        .error {
            color: red;
        }
    </style>

    <!--Formulario-->
    <div class="auth-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 col-md-6 mx-auto py-2">
					<div class="card">
						<div class="card-top pt-2">
							<h5>Registro de paciente</h5>
							<p class="p-18">Complete los datos para finalizar el registro</p>
						</div>
						<div class="card-body">

		                        <div class="progress" id="js-progress">
		                            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
		                                <span class="progress-val">40%</span>
		                            </div>
		                        </div>
		                        <ul class="nav nav-tab">
		                        	<li class="active">
		                                <a href="#tab1" data-toggle="tab">1</a>
		                            </li>
		                            <li>
		                                <a href="#tab2" data-toggle="tab">2</a>
		                            </li>
		                            <li>
		                                <a href="#tab3" data-toggle="tab">3</a>
		                            </li>
		                        </ul>
		                        <div class="tab-content">
		                        	<!--INFORMACIÓN PERSONAL-->
                                    <div class="tab-pane active" id="tab1">
                                        <form class="wizard-container" id="js-wizard-form">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 text-center mb-3">
                                                    <h5>Información personal</h5>
                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <span class="alert alert-success" id="texto_verificacion" style="display: none"></span>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Rut</label>
                                                    <input type="text" class="form-control form-control-sm" name="rut" id="rut" >{{-- onblur="verificador_rut();" onkeyup="formatoRut(this)" --}}
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Nombre</label>
                                                    <input type="text" class="form-control form-control-sm" name="nombre" id="nombre">

                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Primer apellido</label>
                                                    <input type="text" class="form-control form-control-sm" name="primer_apellido" id="primer_apellido">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Segundo apellido</label>
                                                    <input type="text" class="form-control form-control-sm" name="segundo_apellido" id="segundo_apellido">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-4">
                                                    <label class="floating-label-activo-sm">Nacimiento</label>
                                                    <input type="date" class="form-control form-control-sm" name="fecha_nacimiento" id="fecha_nacimiento">
                                                </div>

                                                <div class="form-group col-sm-12 col-md-4">
                                                    <label class="floating-label-activo-sm">Sexo</label>
                                                    <select class="form-control form-control-sm" id="sexo" name="sexo">
                                                        <option selected value="0">Seleccione</option>
                                                        <option value="M">Hombre</option>
                                                        <option value="F">Mujer</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-4">
                                                    <label class="floating-label-activo-sm">Previsión</label>
                                                    <select class="form-control form-control-sm" id="prevision" name="prevision">
                                                        <option selected value="0">Seleccione</option>
                                                        @if (isset($prevision))
                                                            @foreach ($prevision as $prev)
                                                                <option value="{{ $prev->id }}">{{ $prev->nombre }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="btn-next-con">
                                                        <div class="btn-next" id="boton_siguiente">Siguiente</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <!--RESIDENCIA Y CONTACTO-->
                                    <div class="tab-pane" id="tab2">
                                        <form class="wizard-container" id="js-wizard-form2">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 text-center mb-3">
                                                    <h5>Residencia y contacto</h5>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-8">
                                                    <label class="floating-label-activo-sm">Dirección</label>
                                                    <input type="text" class="form-control form-control-sm" name="direccion" id="direccion">
                                                    <i class="zmdi zmdi-card input-icon"></i>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-4">
                                                    <label class="floating-label-activo-sm">Nº</label>
                                                    <input type="number" class="form-control form-control-sm" name="numero" id="numero">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Región</label>
                                                    <select class="form-control form-control-sm" id="region" name="region" onchange="buscar_ciudad();">
                                                        <option selected value="0" selected>Seleccione</option>
                                                        @if (isset($region))
                                                            @foreach ($region as $reg)
                                                                <option value="{{ $reg->id }}">{{ $reg->nombre }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Comuna</label>
                                                    <select class="form-control form-control-sm" id="ciudad" name="ciudad">
                                                        <option selected value="0">Seleccione</option>
                                                        <option>-</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Celular</label>
                                                    <input type="tel" class="form-control form-control-sm" name="celular" id="celular" placeholder="+569">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Teléfono</label>
                                                    <input type="tel" class="form-control form-control-sm" name="telefono" id="telefono">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="btn-next-con">
                                                        <a class="btn-back" href="#">Atrás</a>
                                                        <a class="btn-next" href="#">Siguiente</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

									<!--ACTIVAR CUENTA-->
									<div class="tab-pane" id="tab3">
										<div class="row">
											<div class="col-sm-12 col-md-12 text-center mb-3 pt-3 mb-3">
												<form class="text-center">
													<i class="feather icon-mail display-4 text-info"></i>
													<h5 class="mt-3">Activar cuenta</h5>
													<p>Hemos enviado un mensaje de activación al email <b id="email_envio">demo@gmail.com</b>
													</p>
												</form>
											</div>
										</div>
										{{-- <div class="form-row">
											<div class="col-md-12">
									            <div class="btn-next-con">
									            	<a class="btn-back" href="#">Atrás</a>
									            </div>
									        </div>
										</div> --}}
									</div>
		                        </div>

                        </div>
                	</div>
				</div>
			</div>
		</div>
	</div>
    <!--Cierre de Formulario-->

    @include('auth/include/nocomplatible')

    <!--Footer-->
    {{-- <footer>
        <div class="container-fluid bg-c-blue" style="position:absolute;">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-3 text-white text-center">
                    <img class="wid-145 py-5" src="{{ asset('images/logo.png') }}">
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3 text-center">
                    <img class="wid-145 py-5" src="{{ asset('images/logo_pais.png') }}">
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3 text-white pt-5">
                    <ul>
                        <h6 class="text-white">MESA DE AYUDA </h6>
                        <li>
                            <p class="text-white" style="line-height: 33%;">contacto@medichile.cl</p>
                        </li>
                        <li>
                            <p class="text-white" style="line-height: 33%;">812821899 </p>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-6 col-xs-6 col-md-3 text-white pt-4">
                    <ul style="line-height: 33%;">
                        <h6 class="text-white">SITIOS DE INTERÉS </h6>
                        <li>
                            <a class="text-white" href="https://www.cronicos.cl/">
                                <p>Portales De Crónicos</p>
                            </a>
                        </li>
                        <li>
                            <a class="text-white" href="https://www.fichamedicaunica.cl/">
                                <p>Ficha Médica Única</p>
                            </a>
                        </li>
                        <li>
                            <a class="text-white" href="https://www.farmacronicos.cl/">
                                <p>Farmacrónicos</p>
                            </a>
                        </li>
                        <li>
                            <a class="text-white" href="https://www.recetaonline.cl/site/home/inicio.aspx">
                                <p>Receta Online</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 bg-light text-center text-c-blue">
                    <p style="margin-bottom: 6px; margin-top: 6px; font-size: 12px;">Copyright © 2021 SALUD DIGITAL
                        INTEGRADA EN CHILE SOMOS <b>MEDICHILE</b></p>
                </div>
            </div>
        </div>
    </footer> --}}
    <!--Cierre de Footer-->
    <script src="{{ asset('js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/ripple.js') }}"></script>
    <script src="{{ asset('js/pcoded.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('js/rut.js') }}"></script>
    <script src="{{ asset('js/plugins/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/jquery-validation/jquery.validate.js') }}"></script>
    <script src="{{ asset('js/plugins/sweetalert.min.js') }}"></script>

    <script src="{{ asset('js/login/registro.js') }}"></script>

    <script>
        function buscar_ciudad()
        {

            let region = $('#region').val();
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
                        console.log(data);
                        let ciudades = $('#ciudad');

                        ciudades.find('option').remove();
                        ciudades.append('<option value=""></option>');
                        $(data).each(function(i, v) { // indice, valor
                            ciudades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                        })

                    } else {
                        // alert('No se pudo Cargar las ciudades');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        }

        function registrar_datos()
        {
            var rut = $('#rut').val();
            var nombre = $('#nombre').val();
            var primer_apellido = $('#primer_apellido').val();
            var segundo_apellido = $('#segundo_apellido').val();
            var fecha_nacimiento = $('#fecha_nacimiento').val();
            var sexo = $('#sexo').val();
            var prevision = $('#prevision').val();
            var direccion = $('#direccion').val();
            var numero = $('#numero').val();
            var region = $('#region').val();
            var ciudad = $('#ciudad').val();
            var nombre_ciudad = $('#ciudad option:selected').text();
            var celular = $('#celular').val();
            var telefono = $('#telefono').val();
            let url = "{{ route('home.registro_paciente') }}";

            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        // _token: _token,
                        rut_verificacion: rut,
                        nombre_registro: nombre,
                        primer_apellido_registro: primer_apellido,
                        segundo_apellido_registro: segundo_apellido,
                        fecha_nacimiento_registro:fecha_nacimiento,
                        sexo_registro: sexo,
                        prevision_registro: prevision,
                        telefono_registro: celular,
                        telefono_dos_registro: telefono,
                        direccion: direccion,
                        numero_dir: numero,
                        id_ciudad: ciudad,
                    },
                })
                .done(function(data) {
                    if (data != null) {
                        // data = JSON.parse(data);
                        console.log(data);
                        if(data.estado == 1)
                        {
                            $('#email_envio').html(data.email);
                            setTimeout(function() {
                                location.reload()
                            }, 4000);
                            return true;
                        }
                        else
                        {
                            swal({
                                title: "Registro de Paciente.",
                                text:"Problemas al realizar el registro.",
                                icon: "warning",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            });
                            return false
                        }
                    } else {
                        return false
                        // alert('No se pudo Cargar las ciudades');
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                    return false
                });
        }


        $(document).ready(function() {

            /** formulario pestaña 1 */
            var $validacion = $("#js-wizard-form").validate({
                rules: {
                    rut: {
                        required: true,
                        rut:true
                    },
                    nombre: {
                        required: true,
                        minlength: 2
                    },
                    primer_apellido: {
                        required: true,
                        minlength: 3
                    },
                    segundo_apellido: {
                        required: true,
                        minlength: 3
                    },
                    fecha_nacimiento: {
                        required: true
                    },
                    sexo: {
                        required: true,
                        sex:true

                    },
                    prevision: {
                        required: true,
                        prevision:true
                    }
                },
                messages: {
                    rut: {
                        required: "Ingrese su rut",
                        rut:'Revise que esté bien escrito'
                        // remote: "El rut es inválido"
                    },
                    nombre: {
                        required: "Ingrese su nombre",
                        minlength: "Debe poseer por lo menos 4 caracteres"
                    },
                    primer_apellido: {
                        required: "Ingrese su primer apellido",
                        minlength: "Debe poseer por lo menos 3 caracteres"
                    },
                    segundo_apellido: {
                        required: "Ingrese su segundo apellido",
                        minlength: "Debe poseer por lo menos 3 caracteres"
                    },
                    fecha_nacimiento: {
                        required: "Ingrese su fecha de nacimiento",
                    },
                    sexo: {
                        required: "Seleccione su sexo",
                        sex: 'Seleccione su sexo'
                    },
                    prevision: {
                        required: "Ingrese su Prevision",
                    }
                },
                highlight: function(element) {
                    var $el = $(element);
                    var $parent = $el.parents(".form-group");

                    $el.addClass("es-invalido");

                    // Select2 and Tagsinput
                    if ($el.hasClass("select2-hidden-accessible") || $el.attr("data-role") === "tagsinput") {
                        $el.parent().addClass("es-invalido");
                    }
                },
                unhighlight: function(element) {
                    $(element).parents(".form-group").find(".es-invalido").removeClass("es-invalido");
                },
                submitHandler: function(form) {
                        //
                }
            });

            /** llamdo de metodo para validacion de rut */
            jQuery.validator.addMethod("rut", function(value, element) {
                    return this.optional(element) || $.validateRut(value);
            }, "Revise el RUT");

            jQuery.validator.addMethod("sex", function(value, element) {
                if(value == 0)
                    return false;
                else
                     return true;
            }, "Seleccione su Sexo");

            jQuery.validator.addMethod("prevision", function(value, element) {
                if(value == 0)
                    return false;
                else
                     return true;
            }, "Seleccione su prevision");

            /* formatear rut */
            $("#rut").rut({
                formatOn: 'keyup',
                minimumLength: 2,
                validateOn: 'change',
                useThousandsSeparator : false
            });
            /** fin formulario pestaña 1 */

            /** formulario pestaña 2 */
            var $validacion2 = $("#js-wizard-form2").validate({
                rules: {
                    direccion: {
                        required: true,
                        minlength:6
                    },
                    numero: {
                        required: false,
                        minlength: 1
                    },
                    region: {
                        required: true,
                        region: true

                    },
                    ciudad: {
                        required: true,
                        comuna: true

                    },
                    celular: {
                        required: true,
                        celular: true,
                        minlength:12,
                        maxlength:12
                    },
                    telefono: {
                        required: false,
                        // telefono: true,
                        minlength:12,
                        maxlength:12
                    }
                },
                messages: {
                    direccion: {
                        required: "Ingrese su dirección",
                        minlength: "Debe poseer por lo menos 6 caracteres"
                    },
                    numero: {
                        required: "Ingrese su nombre",
                        minlength: "Debe poseer por lo menos 2 caracteres"
                    },
                    region: {
                        required: "Seleccione su region",
                    },
                    ciudad: {
                        required: "Seleccione su comuna",
                    },
                    celular: {
                        required: "Ingrese su celular",
                        minlength: "Debe ingresar 12 caracteres, Ejemplo: +56912341234"
                    },
                    telefono: {
                        required: "Ingrese su telefono",
                        minlength: "Debe ingresar 12 caracteres, Ejemplo: +56212341234"
                    }
                },
                highlight: function(element) {
                    var $el = $(element);
                    var $parent = $el.parents(".form-group");

                    $el.addClass("es-invalido");

                    // Select2 and Tagsinput
                    if ($el.hasClass("select2-hidden-accessible") || $el.attr("data-role") === "tagsinput") {
                        $el.parent().addClass("es-invalido");
                    }
                },
                unhighlight: function(element) {
                    $(element).parents(".form-group").find(".es-invalido").removeClass("es-invalido");
                },
                submitHandler: function(form) {
                    //
                }
            });


            $.validator.addMethod( "celular",function(value, element, pattern) {
                    var re = new RegExp(/^\x2b56[6-9][0-9]{8}$/i);//+56612341234
                    return re.test(value);
                },"Numero no valido. Ejemplo: +56912341234"
            );
            // $.validator.addMethod( "telefono",function(value, element, pattern) {
            //         var re = new RegExp(/^\x2b56[2-99][0-9]{8}$/i);//+565112341234
            //         return re.test(value);
            //     },"Numero no valido. Ejemplo: +56212341234"
            // );
            $.validator.addMethod( "region",function(value, element, pattern) {
                    if(value == 0)
                    return false;
                else
                     return true;
                },"Debe seleccionar region"
            );
            $.validator.addMethod( "comuna",function(value, element, pattern) {
                    if(value == 0)
                    return false;
                else
                     return true;
                },"Debe seleccionar comuna"
            );
            /** fin formulario pestaña 2 */


            $(".card-body").bootstrapWizard({
                'tabClass' : 'nav-tab',
                'nextSelector': '.btn-next',
                'previousSelector' : '.btn-back',
                'lastSelector': '.btn-last',
                'onNext': function(tab, navigation, index) {

                    if(index == 1)
                    {
                        /** validacion de fromulario 1 */
                        var $valid = $('#js-wizard-form').valid();;
                        if(!$valid) {
                            $validacion.focusInvalid();
                            return false;
                        }
                    }
                    else if(index == 2)
                    {
                        /** validacion de fromulario 2 */
                        var $valid = $('#js-wizard-form2').valid();
                        if(!$valid) {
                            $validacion2.focusInvalid();
                            return false;
                        }
                        if(registrar_datos() == false)
                        {
                            console.log('error en registro');
                            return false;
                        }

                    }
                    var progressBar = $('#js-progress').find('.progress-bar');
                    var progressVal = $('#js-progress').find('.progress-val');
                    var current = index + 1;
                    if (current > 1) {
                        var val = parseInt(progressBar.text());
                        val += 30;
                        progressBar.css('width', val+ '%');
                        progressVal.text(val+'%');
                    }
                },
                'onPrevious' : function(tab, navigation, index) {
                    var progressBar = $('#js-progress').find('.progress-bar');
                    var progressVal = $('#js-progress').find('.progress-val');
                    var current = index - 1;
                    if (current !== 1) {
                        var val = parseInt(progressBar.text());
                        val -= 30;
                        progressBar.css('width', val+ '%');
                        progressVal.text(val+'%');
                    }

                }

            });

            $("#id_comuna").select2();


            /* pareche botones */
            $(".button-previous").hide();
            $(".button-end").hide();

            $(".button-previous").click(function() {
                $(".button-next").show();
                $(".button-previous").hide();
                $(".button-end").hide();
            });

            /* enviar */
            // $(".button-end").click(function() {
            //     console.log("clickeado");
            //     $("#completar_registro").submit();
            // });

            $(".toggle-password").click(function() {
                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });

        });


    </script>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
