<div id="hemorragias_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="hemorragias_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="modal_info1"> Antecedentes hemorragicos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#hemorragias_modal').modal('hide');"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row pt-2 mb-3">
                    <div class="col-md-12">
                        <h6 id="ant_2" onclick="mostrar_formulario_hemorragia('formulario_hemorragia_modal');" class="text-primary" style="cursor: pointer;">Añadir nuevo antecedente <i class="fas fa-plus-circle text-primary"></i></h6>
                    </div>
                </div>
                <div class="row py-2" id="formulario_hemorragia_modal" style="display:none;">
                    <div class="col-md-12">

                        {{-- <input type="hidden" name="ficha_id_antecedente_hemorragia_atencion_dental" id="ficha_id_antecedente_hemorragia_atencion_dental"> --}}
                            {{--  value=" @if ($ficha != null) {{ $ficha->id }} @endif">  --}}
                        {{-- <input type="hidden" name="paciente_antecedente_hemorragia_atencion_dental" id="paciente_antecedente_hemorragia_atencion_dental" value="{{ $paciente->id }}"> --}}

                        <div class="form-row">
                            <div class="form-group fill col-sm-12">
                                <script>
                                    var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
                                        "Octubre", "Noviembre", "Diciembre");
                                    var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                                    var f = new Date();

                                    document.write(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                                </script>
                            </div>
                            <div class="form-group fill col-sm-3">
                                <label class="floating-label-activo-sm">Fecha Procedimiento</label>
                                <input type="date" class="form-control form-control-sm" name="fecha_hemorragia_ficha_atencion" id="fecha_hemorragia_ficha_atencion" value="{{ date('Y-m-d') }}">
                            </div>
                            <div class="form-group fill col-sm-3">
                                <label class="floating-label">Procedimiento</label>
                                <input type="text" class="form-control form-control-sm" name="procedimiento_hemorragia_ficha_atencion" id="procedimiento_hemorragia_ficha_atencion">
                            </div>
                            <div class="form-group fill col-sm-3">
                                <label class="floating-label">Rut del responsable</label>
                                <input type="text" class="form-control form-control-sm" name="rut_hemorragia_ficha_atencion" id="rut_hemorragia_ficha_atencion" onkeyup="buscar_nombre_profesional('rut_hemorragia_ficha_atencion', 'profesional_hemorragia_ficha_atencion');" onchange="buscar_nombre_profesional('rut_hemorragia_ficha_atencion', 'profesional_hemorragia_ficha_atencion');" value="{{ $profesional->rut }}">
                            </div>
                            <div class="form-group fill col-sm-3">
                                <label class="floating-label">Profesional responsable</label>
                                <input type="text" class="form-control form-control-sm" name="profesional_hemorragia_ficha_atencion" id="profesional_hemorragia_ficha_atencion" value="Dr. {{ $profesional->apellido_uno }}">
                            </div>
                            <div class="form-group fill col-sm-12">
                                <label class="floating-label">Tratamientos o complicaciones</label>
                                <input type="text" class="form-control form-control-sm" name="comentario_hemorragia_ficha_atencion" id="comentario_hemorragia_ficha_atencion">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group fill col-sm-4">
                                <button type="button" class="btn btn-success btn-sm btn-block" onclick="registrar_antecedente_hemorragia();">Añadir</button>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="table_antecedente_hemorragias_modal" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Fecha</th>
                                        <th class="text-center align-middle">Procedimiento</th>
                                        <th class="text-center align-middle">Rut responsable</th>
                                        <th class="text-center align-middle">Tratamientos o complicaciones</th>
                                        <th class="text-center align-middle">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($antecedentes))
                                        @foreach ($antecedentes as $hem_pac)
                                            @if ($hem_pac->id_tipo_antecedente == 4 && $hem_pac->estado == 1)
                                                <tr>
                                                    <td class="text-center align-middle">{{ $hem_pac->antecedente_data->fecha }}</td>
                                                    <td class="text-center align-middle">{{ $hem_pac->antecedente_data->procedimiento }}</td>
                                                    <td class="text-center align-middle">{{ $hem_pac->antecedente_data->profesional }}<br/>{{ $hem_pac->antecedente_data->rut_responsable }}</td>
                                                    <td class="text-center align-middle">{{ $hem_pac->comentario }}</td>
                                                    <td class="text-center align-middle">
                                                        <button type="button" class="btn btn-outline-warning btn-sm"><i class="fas fa-edit"></i></button>
                                                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_antecedente_hemorragia({{ $hem_pac->id }})"><i class="fas fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-danger btn-sm" onclick="$('#hemorragias_modal').modal('hide');" >Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function hemorragia_dental() {
        $('#hemorragias_modal').modal('show');
    }

    function mostrar_formulario_hemorragia()
    {
        if ($('#formulario_hemorragia_modal').css('display') === "none")
        {
            $('#formulario_hemorragia_modal').css('display', "block");
        }
        else
        {
            $('#formulario_hemorragia_modal').css('display', "none");
        }
    }

    function registrar_antecedente_hemorragia()
    {
        var tipo = 4;
        var data = {};
        var url = '{{ url("/api/antecedente/registrar") }}';

        /* CAMPOS */
        data.procedimiento = $('#procedimiento_hemorragia_ficha_atencion').val();
        data.comentario = $('#comentario_hemorragia_ficha_atencion').val();
        data.fecha = $('#fecha_hemorragia_ficha_atencion').val();
        data.nombre = $('#procedimiento_hemorragia_ficha_atencion').val();

        data.id_paciente = $('#id_paciente_fc').val();
        data.id_tipo_antecedente = 4;
        data.id_users = '{{ Auth::user()->id }}';
        data.rut_responsable = $('#rut_hemorragia_ficha_atencion').val();
        data.profesion = '{{ $profesional_especialidad }}';
        data.profesional = $('#profesional_hemorragia_ficha_atencion').val();
        data.estado = 1;
        // data.token_ = CSRF_TOKEN;

        // console.log(data);

        jQuery.ajax({

            url: url,
            type: "POST",
            data: data
        })
        .done(function(data) {
            if(data.estado==1)
            {
                cargarRegistrosHemorragia(parseInt(tipo), 'table_antecedente_hemorragias_modal');
                swal({
                    title: 'Antecedente Hemorragias',
                    text: 'Registro Ingresado',
                    icon: 'success',
                });
            }
            else
            {
                swal({
                    title: 'Antecedente Hemorragias',
                    text: 'Campo Obligatorio: '+JSON.stringify(data.error),
                    icon: 'danger',
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function cargarRegistrosHemorragia(tipo, div)
    {
        var data = {};
        var url = "{{ url('/api/antecedente/ver_registros') }}";

        data.id_tipo_antecedente = tipo;
        data.id_paciente = $('#id_paciente_fc').val();
        data.estado = 1;

        $('#'+div+' tbody').html('');

        $.ajax({
            url: url,
            type: "GET",
            data: data,
            success: (resp)=>{
                if(resp.estado==1)
                {
                    var html_ = '';
                    var html__ = '';
                    var permiso_ = '';
                    var id_users = parseInt('{{ Auth::user()->id }}');

                    resp.registros.forEach(e => {

                        // permiso_ = '';
                        // if(e.id_users == id_users)
                        // permiso_ = `
                        //     <buttom class="btn btn-icon btn-info feather icon-edit-2" onclick="verModalAgregar('show',${tipo},${e.id})"></buttom>
                        //     <buttom class="btn btn-icon btn-danger feather icon-x-square" onclick="verModalDesactivar('show',${tipo},${e.id})"></buttom>
                        // `;

                        html_ +=`
                            <tr>
                                <td class="text-center align-middle">${e.antecedente_data.fecha_regitro}</td>
                                <td class="text-center align-middle">${e.antecedente_data.procedimiento}</td>
                                <td class="text-center align-middle">${e.antecedente_data.profesional}<br/>${e.antecedente_data.rut_responsable}</td>
                                <td class="text-center align-middle">${e.antecedente_data.comentario}</td>
                                <td class="text-center align-middle">
                                    <button class="btn btn-outline-warning btn-sm" type="button"><i class="fas fa-edit"></i> </button>
                                    <button class="btn btn-outline-danger btn-sm" type="button" onclick="eliminar_antecedente_hemorragia(${e.id})"><i class="fas fa-trash"></i> </button>
                                </td>
                            </tr>
                        `;

                    });
                    $('#'+div+' tbody').html(html_);

                    $('#tbody_hemorragias').empty();
                    $('#tbody_hemorragias').append(`
                    <tr class="table-primary">
                        <td colspan="4" class="text-center"><strong>Antecedentes de Anestesia</strong></td>
                    </tr>
                    `);
                    resp.registros.forEach(e => {

                        // permiso_ = '';
                        // if(e.id_users == id_users)
                        // permiso_ = `
                        //     <buttom class="btn btn-icon btn-info feather icon-edit-2" onclick="verModalAgregar('show',${tipo},${e.id})"></buttom>
                        //     <buttom class="btn btn-icon btn-danger feather icon-x-square" onclick="verModalDesactivar('show',${tipo},${e.id})"></buttom>
                        // `;

                        html__ +=`
                            <tr>
                                <td class="text-center align-middle">${e.antecedente_data.fecha_regitro}</td>
                                <td class="text-center align-middle">${e.antecedente_data.procedimiento}</td>
                                <td class="text-center align-middle">${e.antecedente_data.profesional} <br> ${e.antecedente_data.rut_responsable}</td>
                                <td class="text-center align-middle">${e.antecedente_data.comentario}</td>


                            </tr>
                        `;

                    });
                    $('#tbody_hemorragias').append(html__);
                }
            },
            error: (resp)=>{
                console.warn(resp);
            }
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

    function eliminar_antecedente_hemorragia(id){
        swal({
            title: "¿Esta seguro que desea ELIMINAR el antecedente de hemorragia?",
            text: "Favor confirme o cancele la solicitud",
            icon: "warning",
            buttons: ["Cancelar", "Solicitar"],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                eliminar_antecedente_hemorragia_confirmar(id);
            }
        });
    }

    function eliminar_antecedente_hemorragia_confirmar(id){
        var data = {};
        var url = '{{ url("/api/antecedente/eliminar") }}';

        /* CAMPOS */
        // data.nombre = $('#nombre').val();
        data.id_antecedente = id;
        data.id_tipo_antecedente = 4;
        data.id_paciente = $('#id_paciente_fc').val();
        tipo_antecedente = 1;
        var tipo= 4;

        jQuery.ajax({

            url: url,
            type: "POST",
            data: data
        })
        .done(function(data) {
            console.log(data);
            if(data.estado==1)
            {
                cargarRegistrosHemorragia(tipo, 'table_antecedente_hemorragias_modal');
                swal({
                    title: 'Antecedente Hemorragia',
                    text: 'Registro eliminado',
                    icon: 'success',
                });
            }
            else
            {
                swal({
                    title: 'Antecedente Hemorragia',
                    text: 'Campo Obligatorio: '+JSON.stringify(data.error),
                    icon: 'danger',
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }
</script>
