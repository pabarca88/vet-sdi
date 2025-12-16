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

                                <h5 class="m-b-10 font-weight-bold">Escritorio paciente</h5>

                            </div>

                            <ul class="breadcrumb">

                                <li class="breadcrumb-item">

                                    <a href="{{ ROUTE('paciente.home') }}">Mi escritorio 233</a>

                                </li>

                            </ul>

                        </div>

                    </div>

                </div>

            </div>

            <!--Cierre: Header-->



            <!-- TABLA DE DEPENDIENTES-->

            <div class="row m-b-30">

                <div class="col-md-12">

                    <div class="card h-100 pb-0">

                        <div class="card-header text-center bg-c-info">

                            <h5 class="text-white d-inline text-center" style="font-size: 1.2rem;">Mis Dependientesx</h5>

                        </div>

                        <div class="card-body pt-4 pb-0">



                            <div class="row m-b-30">

                                <div class="col-md-12">

                                    <button type="button" class="btn btn-success" id="btn-agregar-dep" name="btn-agregar-dep">Agregar</button>

                                    <input type="hidden" name="dependencia" id="dependencia" value="{{ $dependencia }}">

                                    <input type="hidden" name="tipo_dependencias" id="tipo_dependencias" value="{{ $tipo_dependencias }}">

                                </div>

                            </div>

                            <div class="row m-b-30">

                                <div class="col-md-12">

                                    <div class="row" id="card-lista-dependientes">

                                        @if ($registros)

                                            @if ($registros->count() >0 )

                                                @foreach ($registros as $registro)

                                                    <div class="card col-md-3">

                                                        @if ($dependencia == 1)

                                                            <a href="{{ ROUTE('paciente.home',['id_dependiente_activo'=>$registro->paciente->id]    ) }}">

                                                        @else

                                                            <a href="{{ ROUTE('paciente.home') }}">

                                                        @endif

                                                            <div class="card-body text-center" style="cursor:pointer">

                                                                @if($registro->paciente->sexo == 'M')

                                                                    <img class="wid-60 text-center mt-1" src="{{ asset('images/iconos/paciente-m.svg') }}">

                                                                @else

                                                                    <img class="wid-60 text-center mt-1" src="{{ asset('images/iconos/paciente-f.svg') }}">

                                                                @endif

                                                                <h5 class="mt-2">{{ $registro->paciente->nombres.' '.$registro->paciente->apellido_uno. ' '.$registro->paciente->apellido_dos }}</h5>

                                                                {{-- <h6 class="mt-2">Relación: {{ $registro->relacion }}</h6> --}}

                                                                {{-- <h6 class="mt-2">Tipo Dependencia: {{ $registro->Tipodependencia->nombre }}</h6> --}}

                                                            </div>

                                                        </a>

                                                    </div>

                                                @endforeach

                                            @else

                                                <h4 class="">Sin Dependientes Registrados</h4>

                                            @endif



                                        @endif



                                    </div>

                                </div>

                            </div>



                        </div>

                    </div>

                </div>

            </div>

            <!-- CIERRE TABLA DE DEPENDIENTES-->

        </div>

    </div>



    @include('app.paciente.modales.dependientes.agregar')



@endsection



@section('page-script')

    <script>

        $(document).ready(function () {

            $('#btn-agregar-dep').click(function (e) {

                e.preventDefault();

                limpiarFormularioMascota();

                $('#modal_agregar_dep_nuevo').modal('show');

            });



            $("#modal_agregar_dep_input_rut").rut({

                formatOn: 'keyup',

                minimumLength: 2,

                validateOn: 'change',

                useThousandsSeparator : false

            });



            toggleChipInput();
            cargarDependientes();

        });

        function limpiarFormularioMascota()
        {
            $('#modal_agregar_dep_nuevo_tiene_chip').val('0');
            toggleChipInput();
            $('#modal_agregar_dep_nuevo_rut').val('');
            $('#modal_agregar_dep_nuevo_nombres_paciente').val('');
            $('#espec_masc').val('0');
            $('#div_espec_masc').hide();
            $('#obs_espec_masc').val('');
            $('#modal_agregar_dep_nuevo_tamano').val('');
            $('#modal_agregar_dep_nuevo_fecha_nac').val('');
            $('#modal_agregar_dep_nuevo_sexo').val('0');
            $('#imagenes_ven_pre').val('');
            $('#imagenes_ven_post').val('');
            $('#input_lista_ven_imagenes').val('');
            $('#obs_fotos_ven').val('');
            $('#btn_registrar').show();
        }

        function toggleChipInput()
        {
            var tiene_chip = $('#modal_agregar_dep_nuevo_tiene_chip').val();
            var mostrar = (tiene_chip === '1');

            $('#contenedor_numero_chip').toggle(mostrar);
            $('#modal_agregar_dep_nuevo_rut').prop('required', mostrar);
            if(mostrar)
            {
                $('#requerido_modal_agregar_dep_nuevo_rut').show();
            }
            else
            {
                $('#requerido_modal_agregar_dep_nuevo_rut').hide();
                $('#modal_agregar_dep_nuevo_rut').val('');
            }
        }



        function buscar_rut_dep()

        {

            let rut = $('#modal_agregar_dep_input_rut').val();

            if(rut != '')

            {

                let url = "{{ route('paciente.buscar_rut_paciente') }}";

                $.ajax({



                    url: url,

                    type: "get",

                    data: {

                        rut: rut,

                    },

                })

                .done(function(data) {





                    if (data !== 'null') {



                        data = JSON.parse(data);

                        if(data.tipo_paciente == 'SI')

                        {

                            $('#id_paciente_dependiente').val('');

                            $('#label_agregar_nombre_paciente').html('');

                            $('#label_agregar_apellido_paciente').html('');

                            $('#label_agregar_rut_paciente').html('');



                            console.log('rut encontrado');

                            $('#modal_agregar_dep_buscar').modal('hide');



                            cargar_select_relacion('agregar_relacion','agregar_tipo_dependencia');



                            $('#modal_agregar_dep_existente').modal('show');



                            $('#id_paciente_dependiente').val(data.id);

                            $('#label_agregar_nombre_paciente').html(data.nombres);

                            $('#label_agregar_apellido_paciente').html(data.apellido_uno + ' ' + data.apellido_dos);

                            $('#label_agregar_rut_paciente').html(data.rut);



                        }

                        else

                        {

                            $('#modal_agregar_dep_nuevo_nombres_paciente').val('');

                            $('#modal_agregar_dep_nuevo_apellido_uno').val('');

                            $('#modal_agregar_dep_nuevo_apellido_dos').val('');

                            $('#modal_agregar_dep_nuevo_fecha_nac').val('');

                            $('#modal_agregar_dep_nuevo_sexo').val('');

                            $('#modal_agregar_dep_nuevo_convenio').val('');

                            $('#modal_agregar_dep_nuevo_direccion').val('');

                            $('#modal_agregar_dep_nuevo_numero_dir').val('');

                            $('#modal_agregar_dep_nuevo_region').val('');

                            $('#modal_agregar_dep_nuevo_ciudad').val('');

                            $('#modal_agregar_dep_nuevo_correo').val('');

                            $('#modal_agregar_dep_nuevo_telefono_uno').val('');

                            $('#modal_agregar_dep_nuevo_relacion').val('');

                            $('#modal_agregar_dep_nuevo_tipo_dependencia').val('');

                            $('#modal_agregar_dep_nuevo_fecha_inicio').val('');

                            $('#modal_agregar_dep_nuevo_fecha_termino').val('');

                            $('#modal_agregar_dep_nuevo_comentario').val('');



                            console.log('rut no encontrado');

                            $('#modal_agregar_dep_buscar').modal('hide');



                            cargar_select_relacion('modal_agregar_dep_nuevo_relacion','modal_agregar_dep_nuevo_tipo_dependencia');



                            $('#modal_agregar_dep_nuevo').modal('show');

                            $('#modal_agregar_dep_nuevo_rut').val(rut);

                        }



                    } else {

                        console.log('sin respuesta de consulta');

                    }



                })

                .fail(function(jqXHR, ajaxOptions, thrownError) {

                    console.log(jqXHR, ajaxOptions, thrownError)

                });

            }

            else

            {

                swal({

                    title: "Busqueda de Paciente por RUT",

                    text:"Debe ingresar un RUT para la busqueda.",

                    icon: "error",

                    // buttons: "Aceptar",

                    //SuccessMode: true,

                });

            }

        };



        function cargar_select_relacion(select, select_tipo_dependencia)

        {

            /* menor edad 1, mayor edad 2,3 */

            var dependencia = $('#dependencia').val();



            if(dependencia == '1')

            {

                var html = '';

                html += '<option data-tipo="1" value="Hijo(a)" selected>Hijo(a)</option>';

                html += '<option data-tipo="1" value="Sobrino(a)">Sobrino(a)</option>';

                html += '<option data-tipo="1" value="Nieto(a)">Nieto(a)</option>';

                html += '<option data-tipo="2" value="Esposo(a)" >Esposo(a)</option>';

                html += '<option data-tipo="2" value="Padre - Madre">Padre - Madre</option>';

                html += '<option data-tipo="1,2" value="Hermano(a)">Hermano(a)</option>';

                html += '<option data-tipo="1,2" value="Primo(a)">Primo(a)</option>';

                $('#'+select).html(html);

            }

            else

            {

                var html = '';

                html += '<option data_tipo="2" value="Esposo(a)" selected>Esposo(a)</option>';

                html += '<option data_tipo="2" value="Padre - Madre">Padre - Madre</option>';

                html += '<option data_tipo="1,2" value="Hermano(a)">Hermano(a)</option>';

                html += '<option data_tipo="1,2" value="Primo(a)">Primo(a)</option>';

                $('#'+select).html(html);

            }

            cargar_tipo_dependencia(select, select_tipo_dependencia);

        }



        function cargar_tipo_dependencia(select_relacion, select)

        {

            // var tipo_dependencias = $('#tipo_dependencias').val();

            var tipo = $('#'+select_relacion+' option:selected').data('tipo')

            let url = "{{ route('tipo_dependencia.lista') }}";



            $.ajax({



                    url: url,

                    type: "GET",

                    data: {

                        tipo: tipo,

                        id: '1,2',

                    },

                })

                .done(function(data) {

                    var html = '';

                    if(data.estado  == 1)

                    {

                        $.each(data.registros, function (indexInArray, valueOfElement) {

                            var selected = '';

                            if(indexInArray == 0)

                                selected = 'selected';

                            else

                                selected = '';

                            html += '<option value="'+valueOfElement.id+'" '+selected+'>'+valueOfElement.nombre+'</option>';

                        });

                    }

                    else

                    {

                        html = '<option value="">Seleccione</option>';

                    }

                    $('#'+select).html(html);

                })

                .fail(function(jqXHR, ajaxOptions, thrownError) {

                    console.log(jqXHR, ajaxOptions, thrownError)

                });

        }



        function evaluar_tipodependencia(select, div, option)

        {

            var valor = $('#'+select).val();



            if(valor == 0)

            {

                $('#'+div).hide();

                $('#agregar_fecha_inicio').val('');

                $('#agregar_fecha_termino').val('');

            }

            else

            {

                if(valor == option)

                {

                    $('#'+div).show();

                    $('#agregar_fecha_inicio').val('{{ date("Y-m-d")}}');

                    $('#agregar_fecha_termino').val('');

                }

                else

                {

                    $('#'+div).hide();

                    $('#agregar_fecha_inicio').val('');

                    $('#agregar_fecha_termino').val('');

                }

            }

        }



        function registrar_dep_existente()

        {



            var id_paciente_dependiente = $('#id_paciente_dependiente').val();

            var relacion = $('#agregar_relacion').val();

            var tipo_dependencia = $('#agregar_tipo_dependencia').val();

            var comentario = $('#agregar_comentario').val();

            var fecha_inicio = $('#agregar_fecha_inicio').val();

            var fecha_termino = $('#agregar_fecha_termino').val();



            let url = "{{ route('paciente.dependientes.registro') }}";

            var datos = {};



            datos._token = CSRF_TOKEN;

            datos.id_paciente = id_paciente_dependiente;

            datos.relacion = relacion;

            datos.tipo_dependencia = tipo_dependencia;

            if(tipo_dependencia == 3)

            {

                datos.fecha_inicio = fecha_inicio;

                datos.fecha_termino = fecha_termino;

            }

            datos.comentario = comentario;

            datos.otro = '';



            $.ajax({



                url: url,

                type: "POST",

                data: datos,

            })

            .done(function(data) {

                if (data.estado == 1)

                {

                    $('#modal_agregar_dep_existente').modal('hide');



                    swal({

                        title: "Registro de Dependiente.",

                        text:"Exito",

                        icon: "success",

                        // buttons: "Aceptar",

                        //SuccessMode: true,

                    });

                }

                else

                {

                    swal({

                        title: "Registro de Dependiente.",

                        text:"Problemas al realizar el registro.\n"+data.msj,

                        icon: "error",

                        // buttons: "Aceptar",

                        //SuccessMode: true,

                    });

                }

                cargarDependientes();



            })

            .fail(function(jqXHR, ajaxOptions, thrownError) {

                console.log(jqXHR, ajaxOptions, thrownError)

            });



        }



        function buscar_ciudad(select_region, select_ciudad, id_ciudad=0) {



            let region = $('#'+select_region).val();

            let url = "{{ route('home.buscar_ciudad_region') }}";

            $.ajax({

                url: url,

                type: "get",

                data: {

                    region: region,

                },

            })

            .done(function(data) {

                if (data != null) {

                    data = JSON.parse(data);



                    let ciudades = $('#'+select_ciudad);



                    ciudades.find('option').remove();

                    ciudades.append('<option value="0">seleccione</option>');

                    $(data).each(function(i, v) { // indice, valor

                        ciudades.append('<option value="' + v.id + '">' + v.nombre + '</option>');

                    })



                    if(id_ciudad != 0)

                        ciudades.val(id_ciudad);



                } else {



                    swal({

                        title: "Error",

                        text: "Error al cargar las ciudades",

                        icon: "error",

                        buttons: "Aceptar",

                        DangerMode: true,

                    })

                    // alert('No se pudo Cargar las ciudades');

                }



            })

            .fail(function(jqXHR, ajaxOptions, thrownError) {

                console.log(jqXHR, ajaxOptions, thrownError)

            });

        };



        /** calculo de edad */

        var edad_actual = 0;

        function calcularEdad(input_fecha)

        {

            fecha = $('#'+input_fecha).val();

            var hoy = new Date();

            var cumpleanos = new Date(fecha);

            var edad = hoy.getFullYear() - cumpleanos.getFullYear();

            var m = hoy.getMonth() - cumpleanos.getMonth();



            if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate()))

            {

                edad--;

            }

            // $('#age').val(edad);

            edad_actual = edad;

            return edad_actual;

        }



        function validar_requeridos(input_fecha)

        {
            $('#btn_registrar').show();

            if(calcularEdad(input_fecha)<18)

            {

                $('#requerido_modal_agregar_dep_nuevo_correo').hide();

                $('#requerido_modal_agregar_dep_nuevo_telefono_uno').hide();

            }

            else

            {

                $('#requerido_modal_agregar_dep_nuevo_correo').show();

                $('#requerido_modal_agregar_dep_nuevo_telefono_uno').show();

            }

            $('#btn_registrar').show();
        }



        function registrar_dep_nuevo()

        {

            var tiene_chip = $('#modal_agregar_dep_nuevo_tiene_chip').val();
            var chip = $('#modal_agregar_dep_nuevo_rut').val();

            var nombre = $('#modal_agregar_dep_nuevo_nombres_paciente').val();

            var especie = $('#espec_masc').val();

            var otra_especie = $('#obs_espec_masc').val();

            var tamano = $('#modal_agregar_dep_nuevo_tamano').val();

            var fecha_nac = $('#modal_agregar_dep_nuevo_fecha_nac').val();

            var sexo = $('#modal_agregar_dep_nuevo_sexo').val();

            var foto_perfil = $('#imagenes_ven_pre').val();

            var galeria = $('#input_lista_ven_imagenes').val();

            var observaciones = $('#obs_fotos_ven').val();



            var valido = 1;

            var mensaje = '';



            if(nombre == '')

            {

                valido = 0;

                mensaje += 'Nombre Mascota: requerido\n';

            }



            if(especie == '' || especie == '0')

            {

                valido = 0;

                mensaje += 'Especie: requerido\n';

            }



            if(especie == '8' && otra_especie == '')

            {

                valido = 0;

                mensaje += 'Debe detallar la especie.\n';

            }

            if(tamano == '')

            {

                valido = 0;

                mensaje += 'Tipo de mascota: requerido\n';

            }



            if(fecha_nac == '')

            {

                valido = 0;

                mensaje += 'Fecha Nacimiento: requerido\n';

            }



            if(sexo == '' || sexo == '0')

            {

                valido = 0;

                mensaje += 'Sexo: requerido\n';

            }



            if(tiene_chip === '1' && chip == '')

            {

                valido = 0;

                mensaje += 'Número de chip: requerido\n';

            }



            if(valido == 1)

            {

                let url = "{{ route('paciente.mascotas.store') }}";

                var datos = {};



                datos._token = CSRF_TOKEN;

                datos.tiene_chip = tiene_chip;

                datos.chip = (tiene_chip === '1') ? chip : '';

                datos.nombre = nombre;

                datos.especie = especie;

                datos.otra_especie = otra_especie;

                datos.tamano = tamano;

                datos.fecha_nacimiento = fecha_nac;

                datos.sexo = sexo;

                datos.foto_perfil = foto_perfil;

                datos.galeria = galeria;

                datos.observaciones_fotos = observaciones;





                $.ajax({



                    url: url,

                    type: "POST",

                    data: datos,

                })

                .done(function(data) {



                    if (data.estado == 1)

                    {

                        $('#modal_agregar_dep_nuevo').modal('hide');



                        swal({

                            title: "Registro de Mascota.",

                            text:"Exito",

                            icon: "success",

                        });

                        cargarDependientes();

                    }

                    else

                    {

                        var texto_error = data.msj;

                        if(data.error)

                        {

                            texto_error += '\n'+JSON.stringify(data.error);

                        }

                        swal({

                            title: "Registro de Mascota.",

                            text:"Problemas al realizar el registro.\n"+texto_error,

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

                    title: "Registro de Mascota. Campos Requeridos",

                    text: mensaje,

                    icon: "error",

                });

            }



        }




        function cargarDependientes()
        {
            let url  = '{{ route("paciente.mascotas.lista") }}';
            var datos = {};

            $.ajax({
                url: url,
                type: "get",
                data: datos,
            })
            .done(function(data) {
                $('#card-lista-dependientes').html('');
                var html = '';
                if (data.estado == 1)
                {
                    var  img_m = '{{ asset('images/iconos/paciente-m.svg') }}';
                    var  img_f = '{{ asset('images/iconos/paciente-f.svg') }}';
                    var  especies = {1:'Canina',2:'Felina',3:'Pez',4:'Aves',5:'Reptiles',6:'Roedores',7:'Hurones',8:'Otros'};

                    if(data.registros != '')
                    {
                        $.each(data.registros, function (key, value) {
                            var img = '';

                            if(value.foto_perfil)
                            {
                                if(value.foto_perfil.startsWith('/'))
                                    img = value.foto_perfil;
                                else
                                    img = '/storage/imagenes/temp/'+value.foto_perfil;
                            }
                            else if(value.galeria && value.galeria.ven_pre && value.galeria.ven_pre.length>0 && value.galeria.ven_pre[0][0])
                            {
                                img = value.galeria.ven_pre[0][0];
                            }
                            else if(value.sexo == 'M')
                                img = img_m;
                            else
                                img = img_f;

                            var especie_label = especies[value.especie] ? especies[value.especie] : '';
                            if(value.especie == 8 && value.otra_especie)
                            {
                                especie_label += ' ('+value.otra_especie+')';
                            }

                            html += '<div class="col">';
                            html += '    <div class="card">';
                            html += '        <div class="card-body text-center" style="cursor:pointer">';
                            html += '            <img class="wid-60 text-center mt-1 rounded-circle" src="'+img+'">';
                            html += '            <h5 class="mt-2 mb-0">'+value.nombre+'</h5>';
                            html += '            <p class="mb-0">'+especie_label+'</p>';
                            html += '        </div>';
                            html += '    </div>';
                            html += '</div>';
                        });
                    }
                }
                else
                {
                    html = '<h4 class="">Sin Mascotas Registradas</h4>';
                }

                if(html === '')
                {
                    html = '<h4 class="">Sin Mascotas Registradas</h4>';
                }

                $('#card-lista-dependientes').html(html);

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

    </script>

@endsection
