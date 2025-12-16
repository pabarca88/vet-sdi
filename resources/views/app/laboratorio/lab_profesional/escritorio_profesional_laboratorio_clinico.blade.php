@extends('template.laboratorio.laboratorio_profesional.template')

@section('page-script')
    <script>
        function seleccionar_lugar_atencion() {

            //let email = $('#email_paciente_agregar').val();
            let url = "{{ route('profesional.lugares_atencion_profesional_agenda') }}";

            $.ajax({
                url: url,
                type: "get",
                data: {}
            })
            .done(function(data) {

                if (data == 'fail') {
                    console.log('fail');
                    swal("Advertencia",
                        "Bienvenido!!\n Debe ingresar en la pestaña Panel de Configuración, Mis Lugares de Atención y registrar por lo menos un lugar de atención.",
                        "warning");
                    //  alert('No tiene lugares de atención asignados, favor registrar uno');
                } else {

                    let lugares_atencion = $('#lugares_atencion');

                    data = JSON.parse(data);
                    console.log(data);
                    lugares_atencion.find('option').remove();
                    lugares_atencion.append('<option value="0">Seleccione</option>');
                    let contador = 0;
                    console.log(data.length);
                    for (let i = 0; i < data.length; i++)
                    {
                        if (data[i].pivot.estado == '1')
                        {
                            lugares_atencion.append('<option value="' + data[i].id + '">' + data[i].nombre + '</option>');
                            contador++;
                        }
                    }

                    if (contador == 0) {
                        swal("Oops", "No tiene lugares de atención asignados, favor registrar uno", "error")
                        //  alert('No tiene lugares de atención asignados, favor registrar uno');
                    }
                    else
                    {
                        if(contador == 1)
                        {
                            lugares_atencion.val(data[0].id);
                            window.location.href = "{{ route('laboratorio.agenda_laboratorio') }}?lugares_atencion="+data[0].id;
                        }
                        else
                        {
                            $('#modal_seleccionar_lugar_atencion').modal('show');
                            validar_seleccionar_lugar_atencion();
                        }
                    }
                }
                // $(data).each(function(i, v) { // indice, valor

                //     lugares_atencion.append('<option value="' + v.id + '">' + v.nombre +
                //         '</option>');
                // })

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        function validar_seleccionar_lugar_atencion() {
            var valor = $('#lugares_atencion').val();
            if (valor == "" || valor == 0)
                $('#btn_modal_seleccionar_lugar_atencion_ir').attr('disabled', true);
            else
                $('#btn_modal_seleccionar_lugar_atencion_ir').attr('disabled', false);
        }
    </script>
@endsection

@section('content')
    <!--Container Completo-->
    <div class="pcoded-main-container">
    <div class="pcoded-content">
        <!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12 mt-3">
                    <div class="page-header-title">
                        <h5 class="m-b-10 font-weight-bold">Escritorio del Laboratorio.</h5>
                    </div>
                        <!--<ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="escritorio_profesional_laboratorio.php">Mi Escritorio</a>
                            </li>
                        </ul>-->
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card bg-info mb-3">
                    <div class="card-body pt-2 pb-1">
                        <h5 class="text-white f-20">
                            Mi Escritorio
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card-deck">
                    <div class="card subir">
                        <div class="card-body text-center px-2" onclick="seleccionar_lugar_atencion();"
                            style="cursor:pointer">
                            <img class="wid-40 text-center" src="{{ asset('images/iconos/agenda.svg') }}">
                            <h6 class="mt-1">Mi <br>agenda</h6>
                        </div>
                    </div>
                    <div class="card subir">
                        <a href="{{ route('laboratorio.pacientes.profesional.asistente') }}">
                            <div class="card-body text-center px-2" style="cursor:pointer">
                                <img class="wid-40 text-center" src="{{ asset('images/iconos/pacientes.svg') }}">
                                <h6 class="mt-1">Mis <br>pacientes</h6>
                            </div>
                        </a>
                    </div>
                    <div class="card subir">
                        <a href="{{ route('profesional.configuracion') }}">
                            <div class="card-body text-center px-2" style="cursor:pointer">
                                <img class="wid-40 text-center"
                                    src="{{ asset('images/iconos/panel_configuracion.svg') }}">
                                <h6 class="mt-1"> Panel de <br>configuración</h6>
                            </div>
                        </a>
                    </div>
                    {{--  <div class="card subir">
                        <a href="{{ route('profesional.index_receta_online') }}">
                            <div class="card-body text-center px-2" style="cursor:pointer">
                                <img class="wid-40 text-center" src="{{ asset('images/iconos/receta_online.svg') }}">
                                <h6 class="mt-1">Receta <br>Online</h6>
                            </div>
                        </a>
                    </div>  --}}
                    <div class="card subir">
                        {{-- <a href="{{ route('profesional.index_transcripcion_examen') }}"> --}}

                        {{-- buscar resultados de pacientes --}}
                        {{-- <a href="{{ route('laboratorio.lab_asistente.resultados_examenes_laboratorio') }}"> --}}
                        <a href="{{ route('laboratorio.cargar.resultados') }}">
                            <div class="card-body text-center px-2" style="cursor:pointer">
                                <img class="wid-40 text-center" src="{{ asset('images/iconos/examenes-ro.svg') }}">
                                <h6 class="mt-1 f-13">Subir <br>exámenes</h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card bg-info mb-3">
                    <div class="card-body pt-2 pb-1">
                        <h5 class="text-white f-20">
                            Módulos Laboratorio
                        </h5>
                    </div>
                </div>
            </div>
        </div>


         <div class="row">
             <div class="col-sm-12 col-md-6 col-lg-6 col-xl-8">
                <div class="row">
                 <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card mb-3 subir">
                        <a href="{{ ROUTE('laboratorio.pacientes.profesional.asistente') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos/pacientes-lab.png') }}">
                                <h6 class="mt-1">Pacientes del Lab.</h6>
                            </div>
                        </a>
                    </div>
                </div>
                 @if ($profesional->id_especialidad == 11 && $profesional->id_tipo_especialidad == 59)
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="card mb-3 subir">
                            <a href="#">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-60 text-center" src="{{ asset('images/iconos/audifono-discapacidad.png') }}">
                                    <h6 class="mt-1">Equipo de rx</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="card mb-3 subir">
                            <a href="#">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-60 text-center" src="{{ asset('images/iconos/audifono-discapacidad.png') }}">
                                    <h6 class="mt-1">Placa Rx</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                 @else
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="card mb-3 subir">
                            <a href="{{ ROUTE('laboratorio.profesional.audifono.venta') }}">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-60 text-center" src="{{ asset('images/iconos/audifono-discapacidad.png') }}">
                                    <h6 class="mt-1">Venta audífonos y repuestos</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                     <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card mb-3 subir">
                        <a href="{{ ROUTE('laboratorio.profesional.audifono.control') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos/paciente-audifono.png') }}">
                                {{-- <h6 class="mt-1">Mis usuarios de audífonos </h6> --}}
                                <h6 class="mt-1">Control audífonos</h6>
                            </div>
                        </a>
                    </div>
                </div>
                 @endif

            </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card mb-3" style="max-width: 100%;">
                            <img class="card-img-top" src="{{ asset('images/iconos/inscripciones_2.png') }}">
                            <div class="card-body p-0">
                                <a href="http://cronicos.cl/registro.php" target="_blank" class="btn" type="button">
                                    <h5 style="font-size: 1.1rem;" class="text-left pt-2 text-c-blue">Inscripción en CRÓNICOS</h5>
                                    <h6 class="text-justify">Inscriba a sus Pacientes en www.cronicos.cl  y obtenga importantes novedades en el manejo de su patología y en el uso de sus medicamentos.</h6>

                                </a>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>

       <!-- <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                <div class="card subir">
                    <a href="{{ ROUTE('laboratorio.lab_profesional.pacientes_laboratorio') }}">
                        <div class="card-body text-center" style="cursor:pointer">
                            <img class="wid-60 text-center" src="{{ asset('images/iconos/pacientes-lab.png') }}">
                            <h6 class="mt-1">Pacientes del Lab.</h6>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                <div class="card subir">
                    <a href="{{ ROUTE('laboratorio.lab_profesional.procesos_laboratorio') }}">
                        <div class="card-body text-center" style="cursor:pointer">
                            <img class="wid-60 text-center" src="{{ asset('images/iconos/audifono-discapacidad.png') }}">
                            <h6 class="mt-1">Venta Audífonos y repuestos</h6>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                <div class="card subir">
                    <a href="{{ ROUTE('laboratorio.lab_profesional.recepcion_muestras') }}">
                        <div class="card-body text-center" style="cursor:pointer">
                            <img class="wid-60 text-center" src="{{ asset('images/iconos/paciente-audifono.png') }}">
                            <h6 class="mt-1">Mis usuarios de audífonos </h6>
                        </div>
                    </a>
                </div>
            </div>

             <!--<div class="col-md-9">
                <div class="card mb-3" style="max-width: 100%;">
                  <div class="row no-gutters">
                    <div class="col-md-4">
                         <img class="img-fluid card-img-top" src="{{ asset('images/iconos/inscripciones_1.svg') }}">
                    </div>
                    <div class="col-md-8">
                      <a href="http://cronicos.cl/registro.php" target="_blank" class="btn" type="button">
                            <div class="card-body-a">
                                <h5 style="font-size: 1.2rem;" class="text-left pt-2">Inscripción en CRÓNICOS</h5>
                                <p class="text-justify">Inscriba a sus Pacientes en crónicos.cl  Obtendrá Importantes Novedades en el Manejo de su Patología y en el uso de sus Medicamentos</p>
                            </div>
                        </a>
                    </div>
                  </div>
                </div>
            </div>
        </div>-->
        <!--<div class="col-md-3 mb-3">
            <div class="card subir text-center h-100">
                <img class="img-fluid card-img-top" src="{{ asset('images/iconos/inscripciones_1.svg') }}"
                    alt="Farmacrónicos">
                 <a href="http://cronicos.cl/registro.php" target="_blank" class="btn  btn-arrastre" type="button">
                    <div class="card-body">
                        <h5 style="font-size: 1.2rem;" class="card-title pt-2">Inscripción en Farmacrónicos</h5>
                        <p class="card-text">Inscriba a sus Pacientes en crónicos.cl <br> Obtendrá Importantes Novedades en el Manejo de su Patología<br> y en el uso de sus Medicamentos</p>
                    </div>
                </a>
            </div>
        </div>




            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-3 col-xxl-3">
                <div class="card subir">
                    <a href="{{ ROUTE('laboratorio.lab_profesional.recepcion_muestras') }}">
                        <div class="card-body text-center" style="cursor:pointer">
							<img class="wid-60 text-center" src="{{ asset('images/iconos/venta-online.png') }}">
                            <h6 class="mt-1">Ventas online</h6>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-9 col-xxl-9">
                <div class="card mb-3" style="max-width: 100%;">
                  <div class="row no-gutters">
                    <div class="col-sm-12 col-md-6 col-lg-8 col-xl-8 col-xxl-2">
                         <img class="img-fluid" src="{{ asset('images/iconos/inscripciones_2.png') }}">
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-10">
                      <a href="http://cronicos.cl/registro.php" target="_blank" class="btn" type="button">
                            <div class="card-body-a">
                                <h5 style="font-size: 1.2rem;" class="text-left pt-2 text-c-blue">Inscripción en CRÓNICOS</h5>
                                <h6 class="text-justify">Inscriba a sus Pacientes en www.cronicos.cl  y obtenga importantes novedades en el manejo de su patología y en el uso de sus medicamentos</h6>
                            </div>
                        </a>
                    </div>
                  </div>
                </div>
            </div>
        </div>-->
			{{--  <div class="col-md-6">
                <div class="card subir">
                    <a href="{{ ROUTE('laboratorio.lab_profesional.recepcion_muestras') }}">
                        <div class="card-body text-center" style="cursor:pointer">
							<img class="wid-60 text-center" src="{{ asset('images/iconos/derivar.svg') }}">
                            <h6 class="mt-2">Derivación de exámenes</h6>
                        </div>
                    </a>
                </div>
            </div>  --}}
            {{--  <div class="col-md-6">
                <div class="card subir">
                    <a href="{{ ROUTE('laboratorio.lab_profesional.inventario_laboratorio') }}">
                        <div class="card-body text-center" style="cursor:pointer">
							<img class="wid-60 text-center" src="{{ asset('images/iconos/inventario.svg') }}">
                            <h5 class="mt-2">Inventario</h5>
                        </div>
                    </a>
                </div>
            </div>  --}}
            {{--  <div class="col-md-6">
                <div class="card subir">
                    <a href="{{ ROUTE('laboratorio.lab_profesional.proveedores_laboratorio') }}">
                        <div class="card-body text-center" style="cursor:pointer">
							<img class="wid-60 text-center" src="{{ asset('images/iconos/proveedores.svg') }}">
                            <h5 class="mt-2">Proveedores</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card subir">
                    <a href="{{ ROUTE('laboratorio.lab_profesional.gastos_laboratorio') }}">
                        <div class="card-body text-center" style="cursor:pointer">
							<img class="wid-60 text-center" src="{{ asset('images/iconos/gastos.svg') }}">
                            <h5 class="mt-2">Gastos</h5>
                        </div>
                    </a>
                </div>
            </div>  --}}
        </div>

    </div>
</div>
    <!--Cierre: Container Completo-->
@endsection
