<div id="anestesia_local_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="anestesia_local_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="modal_info1"> Antecedentes con anestésicos locales</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#anestesia_local_modal').modal('hide');"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row pt-2 mb-3">
                    <div class="col-md-12">
                        <h6 id="ant_1" class="text-primary" style="cursor: pointer;" onclick="mostrar_formulario_anestesia('formulario_antecedente_anestesia')">Añadir antecedente <i class="fas fa-plus-circle text-primary"></i></h6>
                    </div>
                </div>
                <div class="row py-2" id="formulario_antecedente_anestesia" style="display:none;">
                    <div class="col-md-12">
                        {{-- <form id="form_antecedente_anestesia" method="POST" action="{{ route('dental.registrar_antecedente_anestesia_ficha_dental') }}"> --}}

                            {{-- @csrf --}}
                            {{--  <input type="hidden" name="ficha_id_antecedente_anestesia_atencion_dental" id="ficha_id_antecedente_anestesia_atencion_dental">

                                {{--  value=" @if ($ficha != null) {{ $ficha->id }} @endif">  --}}
                            {{--  <input type="hidden" name="paciente_antecedente_anestesia_atencion_dental" id="paciente_antecedente_anestesia_atencion_dental" value="{{ $paciente->id }}">  --}}

                            <div class="form-row">
                                <div class="form-group fill col-sm-12">
                                    <script>
                                        var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                                        var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                                        var f = new Date();

                                        document.write(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                                    </script>
                                </div>
                                <div class="form-group fill col-sm-3">
                                    <label class="floating-label-activo-sm">Rut del responsable</label>
                                    <input type="text" class="form-control form-control-sm" name="rut_anestesia_ficha_atencion" id="rut_anestesia_ficha_atencion" value="{{ $profesional->rut }}">
                                </div>
                                <div class="form-group fill col-sm-3">
                                    <label class="floating-label-activo-sm">Procedimiento</label>
                                    <input type="text" class="form-control form-control-sm" name="procedimiento_anestesia_ficha_atencion" id="procedimiento_anestesia_ficha_atencion" value="">
                                </div>
                                <div class="form-group fill col-sm-3">
                                    <label class="floating-label-activo-sm">Incidente</label>
                                    <input type="text" class="form-control form-control-sm" name="incidente_anestesia_ficha_atencion" id="incidente_anestesia_ficha_atencion" value="">
                                </div>
                                <div class="form-group fill col-sm-3">
                                    <label class="floating-label-activo-sm">Fecha</label>
                                    <input type="date" class="form-control form-control-sm" name="fecha_anestesia_ficha_atencion" id="fecha_anestesia_ficha_atencion" value="{{ date('Y-m-d') }}">
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group fill col-sm-4">
                                    <button type="button" class="btn btn-success btn-sm btn-block" onclick="registrar_antecedente_anestesia();">Añadir</button>
                                </div>
                            </div>
                        {{-- </form> --}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="table_anestecia_antecedentes_modal"
                                class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Fecha</th>
                                        <th class="text-center align-middle">Procedimiento</th>
                                        <th class="text-center align-middle">Incidente</th>
                                        <th class="text-center align-middle">Rut responsable</th>
                                        <th class="text-center align-middle">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if (isset($antecedentes))

                                        @foreach ($antecedentes as $anes_pac)
                                            @if ($anes_pac->id_tipo_antecedente == 1 && $anes_pac->estado == 1)
                                                <tr>
                                                    <td class="text-center align-middle">
                                                        {{ $anes_pac->antecedente_data->fecha }}
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        {{ $anes_pac->antecedente_data->procedimiento }}
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        {{ $anes_pac->comentario }}
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        {{ $anes_pac->antecedente_data->rut_responsable }}
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button type="button" class="btn btn-outline-warning btn-sm" onclick="editar_antecedente({{ $anes_pac->id }})"><i class="fas fa-edit"></i></button>
                                                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_antecedente({{ $anes_pac->id }})"><i class="fas fa-trash"></i></button>
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
                        <button type="button" class="btn btn-danger btn-sm" onclick="$('#anestesia_local_modal').modal('hide');" >Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function anestesia_local_dental() {
        $('#anestesia_local_modal').modal('show');
    }

    function mostrar_formulario_anestesia()
    {
        if ($('#formulario_antecedente_anestesia').css('display') === "none")
        {
            $('#formulario_antecedente_anestesia').css('display', "block");
        }
        else
        {
            $('#formulario_antecedente_anestesia').css('display', "none");
        }
    }

    function registrar_antecedente_anestesia()
    {
        var data = {};
        var url = '{{ url("/api/antecedente/registrar") }}';

        /* CAMPOS */
        // data.nombre = $('#nombre').val();
        data.procedimiento = $('#procedimiento_anestesia_ficha_atencion').val();
        data.comentario = $('#incidente_anestesia_ficha_atencion').val();
        data.fecha = $('#fecha_anestesia_ficha_atencion').val();

        data.id_paciente = $('#id_paciente_fc').val();
        data.id_tipo_antecedente = 1;
        data.id_users = '{{ Auth::user()->id }}';
        data.rut_responsable = $('#rut_anestesia_ficha_atencion').val();
        data.profesion = '{{ $profesional_especialidad }}';
        data.profesional = '{{ $profesional->id }}';
        data.estado = 1;
        // data.token_ = CSRF_TOKEN;

        var tipo_antecedente = data.id_tipo_antecedente;

        jQuery.ajax({

            url: url,
            type: "POST",
            data: data
        })
        .done(function(data) {
            console.log(data);
            if(data.estado==1)
            {
                cargarRegistrosAntecedentes_d(tipo_antecedente, 'table_anestecia_antecedentes_modal');
                swal({
                    title: 'Antecedente Anestecia',
                    text: 'Registro Ingresado',
                    icon: 'success',
                });
            }
            else
            {
                swal({
                    title: 'Antecedente Anestecia',
                    text: 'Campo Obligatorio: '+JSON.stringify(data.error),
                    icon: 'danger',
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function cargarRegistrosAntecedentes_d(tipo, div)
    {
        console.log(tipo);
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
                console.log(resp);
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
                                <td class="text-center align-middle">${e.antecedente_data.comentario}</td>
                                <td class="text-center align-middle">${e.antecedente_data.rut_responsable}</td>
                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-outline-warning btn-sm" onclick="editar_antecedente(${e.id})"><i class="fas fa-edit"></i></button>
                                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_antecedente(${e.id})"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        `;

                    });
                    $('#'+div+' tbody').html(html_);

                    $('#tbody_anestesia').empty();
                    $('#tbody_anestesia').append(`
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
                    $('#tbody_anestesia').append(html__);
                }
            },
            error: (resp)=>{
                console.warn(resp);
            }
        });
    }

    function eliminar_antecedente(id){
        swal({
            title: "¿Esta seguro que desea ELIMINAR el antecedente?",
            text: "Favor confirme o cancele la solicitud",
            icon: "warning",
            buttons: ["Cancelar", "Solicitar"],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                eliminar_antecedente_confirmar(id);
            }
        });
    }

    function eliminar_antecedente_confirmar(id){
        var data = {};
        var url = '{{ url("/api/antecedente/eliminar") }}';

        /* CAMPOS */
        // data.nombre = $('#nombre').val();
        data.id_antecedente = id;
        data.id_tipo_antecedente = 1;
        data.id_paciente = $('#id_paciente_fc').val();
        tipo_antecedente = 1;

        jQuery.ajax({

            url: url,
            type: "POST",
            data: data
        })
        .done(function(data) {
            console.log(data);
            if(data.estado==1)
            {
                cargarRegistrosAntecedentes_d(tipo_antecedente, 'table_anestecia_antecedentes_modal');
                swal({
                    title: 'Antecedente Anestecia',
                    text: 'Registro eliminado',
                    icon: 'success',
                });
            }
            else
            {
                swal({
                    title: 'Antecedente Anestecia',
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
