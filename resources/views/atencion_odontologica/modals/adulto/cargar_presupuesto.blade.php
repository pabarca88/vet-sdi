<div id="modal_presupuesto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_presupuesto" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_presupuesto"><strong>PRESUPUESTO Nº:</strong>0000000    <strong>FECHA:</strong>02/05/2021</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success pb-0" role="alert"><!--de acuerdo a las piezas y tratamientos dentales cargadas en el presupuesto-->
                                <ul>
                                    <li>
                                        <strong>Pieza o sector:</strong><span id="numero_pieza_presupuesto"> 1-8</span>
                                    </li>
                                    <li>
                                        <strong>Tratamiento:</strong><span id="tratamiento_presupuesto_"> Extracción</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Fecha procedimiento</label>
                                        <input type="date" class="form-control form-control-sm" name="fecha_proc" id="fecha_proc" value="<?php echo date('Y-m-d') ?>">
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Comentarios</label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="2" name="comentarios_tratamiento" id="comentarios_tratamiento"></textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="trabajo_terminado_check" value="option1" onclick="habilitar_agenda_control()">
                                    <label class="form-check-label" for="trabajo_terminado_check">Trabajo terminado</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="agendar_control_check" value="option1" onclick="habilitar_agenda_control()">
                                    <label class="form-check-label" for="agendar_control_check" >Agendar control</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="espera_lab_check" value="option1" onclick="habilitar_agenda_control()">
                                    <label class="form-check-label" for="espera_lab_check" >En espera de laboratorio</label>
                                </div>
                                <div id="agenda_control" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mt-2">
                                                <label class="floating-label-activo-sm">Fecha control</label>
                                                <input type="date" class="form-control form-control-sm" name="fecha_control" id="fecha_control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mt-2">
                                                <label class="floating-label-activo-sm">Hora control</label>
                                                <input type="time" class="form-control form-control-sm" name="hora_control" id="hora_control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-success btn-sm  btn-block" onclick="guardar_info_tratamiento()"><i class="fa fa-plus"></i> Guardar</button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <!--Tabla-->
                            <div class="table-responsive">
                                <table class="table table-bordered table-xs w-100" id="table_trabajos_presupuesto">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Fecha</th>
                                            <th class="text-center align-middle">Prestación</th>
                                            <th class="text-center align-middle">Caras</th>
                                            <th class="text-center align-middle">Pieza</th>
                                            <th class="text-center align-middle">Diagnostico</th>
                                            <th class="text-center align-middle">Valor</th>
                                            <th class="text-center align-middle">Estado</th>
                                            <th class="text-center align-middle">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($primer_cuadrante as $primer)
                                        <tr>
                                            <td class="text-center align-middle">02/12/2021</td>
                                            <td class="text-center align-middle">
                                                <strong>Pieza-sector: </strong><span>{{ $primer->numero_pieza }}</span><br>
                                                <strong>Tratamiento: </strong><span>General</span>
                                            </td>
                                            <td class="text-center align-middle">-</td>
                                            <td class="text-center align-middle">
                                                <span class="badge bg-success text-white">Finalizado</span>
                                            </td>
                                            <td class="text-center align-middle">
                                                <button class="btn btn-secondary btn-sm btn-icon" onclick="atender_procedimiento({{ $primer->id }})"><i class="fas fa-check"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @foreach ($primer_cuadrante_endodoncia as $primer)
                                        <tr>
                                            <td class="text-center align-middle">02/12/2021</td>
                                            <td class="text-center align-middle">
                                                <strong>Pieza-sector: </strong><span>{{ $primer->numero_pieza }}</span><br>
                                                <strong>Tratamiento: </strong><span>{{ $primer->tipo_examen == 1 ? 'General' : 'Endodoncia' }}</span>
                                            </td>
                                            <td class="text-center align-middle">-</td>
                                            <td class="text-center align-middle">
                                                <span class="badge bg-success text-white">Finalizado</span>
                                            </td>
                                            <td class="text-center align-middle">
                                                <button class="btn btn-secondary btn-sm btn-icon" onclick="atender_procedimiento({{ $primer->id }})"><i class="fas fa-check"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @foreach ($segundo_cuadrante as $segundo)
                                        <tr>
                                            <td class="text-center align-middle">02/12/2021</td>
                                            <td class="text-center align-middle">
                                                <strong>Pieza-sector: </strong><span>{{ $segundo->numero_pieza }}</span><br>
                                                <strong>Tratamiento: </strong><span>General</span>
                                            </td>
                                            <td class="text-center align-middle">-</td>
                                            <td class="text-center align-middle">
                                                <span class="badge bg-success text-white">Finalizado</span>
                                            </td>
                                            <td class="text-center align-middle">
                                                <button class="btn btn-secondary btn-sm btn-icon" onclick="atender_procedimiento({{ $segundo->id }})"><i class="fas fa-check"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @foreach ($segundo_cuadrante_endodoncia as $segundo)
                                        <tr>
                                            <td class="text-center align-middle">02/12/2021</td>
                                            <td class="text-center align-middle">
                                                <strong>Pieza-sector: </strong><span>{{ $segundo->numero_pieza }}</span><br>
                                                <strong>Tratamiento: </strong><span>Endodoncia</span>
                                            </td>
                                            <td class="text-center align-middle">-</td>
                                            <td class="text-center align-middle">
                                                <span class="badge bg-success text-white">Finalizado</span>
                                            </td>
                                            <td class="text-center align-middle">
                                                <button class="btn btn-secondary btn-sm btn-icon" onclick="atender_procedimiento({{ $segundo->id }})"><i class="fas fa-check"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @foreach ($tercer_cuadrante as $tercer)
                                        <tr>
                                            <td class="text-center align-middle">02/12/2021</td>
                                            <td class="text-center align-middle">
                                                <strong>Pieza-sector: </strong><span>{{ $tercer->numero_pieza }}</span><br>
                                                <strong>Tratamiento: </strong><span>General</span>
                                            </td>
                                            <td class="text-center align-middle">-</td>
                                            <td class="text-center align-middle">
                                                <span class="badge bg-success text-white">Finalizado</span>
                                            </td>
                                            <td class="text-center align-middle">
                                                <button class="btn btn-secondary btn-sm btn-icon" onclick="atender_procedimiento({{ $tercer->id }})"><i class="fas fa-check"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @foreach ($tercer_cuadrante_endodoncia as $tercer)
                                        <tr>
                                            <td class="text-center align-middle">02/12/2021</td>
                                            <td class="text-center align-middle">
                                                <strong>Pieza-sector: </strong><span>{{ $tercer->numero_pieza }}</span><br>
                                                <strong>Tratamiento: </strong><span>Endodoncia</span>
                                            </td>
                                            <td class="text-center align-middle">-</td>
                                            <td class="text-center align-middle">
                                                <span class="badge bg-success text-white">Finalizado</span>
                                            </td>
                                            <td class="text-center align-middle">
                                                <button class="btn btn-secondary btn-sm btn-icon" onclick="atender_procedimiento({{ $tercer->id }})"><i class="fas fa-check"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @foreach ($cuarto_cuadrante as $cuarto)
                                        <tr>
                                            <td class="text-center align-middle">02/12/2021</td>
                                            <td class="text-center align-middle">
                                                <strong>Pieza-sector: </strong><span>{{ $cuarto->numero_pieza }}</span><br>
                                                <strong>Tratamiento: </strong><span>General</span>
                                            </td>
                                            <td class="text-center align-middle">-</td>
                                            <td class="text-center align-middle">
                                                <span class="badge bg-success text-white">Finalizado</span>
                                            </td>
                                            <td class="text-center align-middle">
                                                <button class="btn btn-secondary btn-sm btn-icon" onclick="atender_procedimiento({{ $cuarto->id }})"><i class="fas fa-check"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @foreach ($cuarto_cuadrante_endodoncia as $cuarto)
                                        <tr>
                                            <td class="text-center align-middle">02/12/2021</td>
                                            <td class="text-center align-middle">
                                                <strong>Pieza-sector: </strong><span>{{ $cuarto->numero_pieza }}</span><br>
                                                <strong>Tratamiento: </strong><span>Endodoncia</span>
                                            </td>
                                            <td class="text-center align-middle">-</td>
                                            <td class="text-center align-middle">
                                                <span class="badge bg-success text-white">Finalizado</span>
                                            </td>
                                            <td class="text-center align-middle">
                                                <button class="btn btn-secondary btn-sm btn-icon" onclick="atender_procedimiento({{ $cuarto->id }})"><i class="fas fa-check"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @foreach ($quinto_cuadrante as $quinto)
                                        <tr>
                                            <td class="text-center align-middle">02/12/2021</td>
                                            <td class="text-center align-middle">
                                                <strong>Pieza-sector: </strong><span>{{ $quinto->numero_pieza }}</span><br>
                                                <strong>Tratamiento: </strong><span>General</span>
                                            </td>
                                            <td class="text-center align-middle">-</td>
                                            <td class="text-center align-middle">
                                                <span class="badge bg-success text-white">Finalizado</span>
                                            </td>
                                            <td class="text-center align-middle">
                                                <button class="btn btn-secondary btn-sm btn-icon" onclick="atender_procedimiento({{ $quinto->id }})"><i class="fas fa-check"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @foreach ($quinto_cuadrante_endodoncia as $quinto)
                                        <tr>
                                            <td class="text-center align-middle">02/12/2021</td>
                                            <td class="text-center align-middle">
                                                <strong>Pieza-sector: </strong><span>{{ $quinto->numero_pieza }}</span><br>
                                                <strong>Tratamiento: </strong><span>Endodoncia</span>
                                            </td>
                                            <td class="text-center align-middle">-</td>
                                            <td class="text-center align-middle">
                                                <span class="badge bg-success text-white">Finalizado</span>
                                            </td>
                                            <td class="text-center align-middle">
                                                <button class="btn btn-secondary btn-sm btn-icon" onclick="atender_procedimiento({{ $quinto->id }})"><i class="fas fa-check"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @foreach ($sexto_cuadrante as $sexto)
                                        <tr>
                                            <td class="text-center align-middle">02/12/2021</td>
                                            <td class="text-center align-middle">
                                                <strong>Pieza-sector: </strong><span>{{ $sexto->numero_pieza }}</span><br>
                                                <strong>Tratamiento: </strong><span>General</span>
                                            </td>
                                            <td class="text-center align-middle">-</td>
                                            <td class="text-center align-middle">
                                                <span class="badge bg-success text-white">Finalizado</span>
                                            </td>
                                            <td class="text-center align-middle">
                                                <button class="btn btn-secondary btn-sm btn-icon" onclick="atender_procedimiento({{ $sexto->id }})"><i class="fas fa-check"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @foreach ($sexto_cuadrante_endodoncia as $sexto)
                                        <tr>
                                            <td class="text-center align-middle">02/12/2021</td>
                                            <td class="text-center align-middle">
                                                <strong>Pieza-sector: </strong><span>{{ $sexto->numero_pieza }}</span><br>
                                                <strong>Tratamiento: </strong><span>Endodoncia</span>
                                            </td>
                                            <td class="text-center align-middle">-</td>
                                            <td class="text-center align-middle">
                                                <span class="badge bg-success text-white">Finalizado</span>
                                            </td>
                                            <td class="text-center align-middle">
                                                <button class="btn btn-secondary btn-sm btn-icon" onclick="atender_procedimiento({{ $sexto->id }})"><i class="fas fa-check"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach --}}
                                        @if(isset($odontograma))
                                @foreach ($odontograma as $odonto)
                                    @php
                                        if($odonto->estado == 0) $estado = 'PENDIENTE';
                                        else if($odonto->estado == 1) $estado = 'TERMINADO';
                                        else if($odonto->estado == 3) $estado = 'EN ESPERA DE LAB';
                                        else $estado = '';
                                    @endphp
                                    @if($odonto->presupuesto == 1)
                                    <tr>
                                        <td>{{ $odonto->fecha }}</td>
                                        <td>{{ $odonto->tratamiento }}</td>
                                        <td>{{ $odonto->caras }}</td>
                                        <td>{{ $odonto->pieza }}</td>
                                        <td>{{ $odonto->diagnostico }}</td>
                                        <td>{{ number_format($odonto->valor,0,',','.') }}</td>
                                        <td>{{ $estado }}</td>

                                        <td>

                                            <button type="button" class="btn btn-secondary btn-sm" onclick="atender_procedimiento({{ $odonto->id }},'{{ $odonto->descripcion }}',{{ $odonto->pieza }})"><i class="fas fa-check"></i>Cargar</button>

                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                                @endif
                                    </tbody>
                                </table>
                            </div>
                            <!--Cierre: Tabla-->
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info"> Guardar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalNuevoPresupuestoDental" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo presupuesto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label class="floating-label-activo-sm">Fecha</label>
                            <input type="date" class="form-control form-control-sm" name="fecha" id="fecha">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label class="floating-label-activo-sm">Nº Presupuesto</label>
                            <input type="text" class="form-control form-control-sm" name="nro_presupuesto" id="nro_presupuesto">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label class="floating-label-activo-sm">Aprobado</label>
                            <select class="form-control form-control-sm" name="aprobado" id="aprobado">
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label class="floating-label-activo-sm">Pieza</label>
                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label class="floating-label-activo-sm">Boca</label>
                            <select class="form-control form-control-sm" name="boca" id="boca">
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mt-2">
                            <label class="floating-label-activo-sm">Presupuesto</label>
                            <input type="text" class="form-control form-control-sm" name="presupuesto_monto" id="presupuesto_monto">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mt-2">
                            <label class="floating-label-activo-sm">Estado</label>
                            <select class="form-control form-control-sm" name="estado" id="estado">
                                <option value="1">Finalizado</option>
                                <option value="0">Pendiente</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label class="floating-label-activo-sm">Control</label>
                            <input type="date" class="form-control form-control-sm" name="control" id="control">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" onclick="guardar_presupuesto_dental()">Guardar</button>
        </div>
      </div>
    </div>
  </div>
<!-- HIDDEN ID ODONTOGRAMA -->
<input type="hidden" id="id_odontograma">
<script>

        function presupuesto()
        {
            $('#modal_presupuesto').modal('show');
        }

        function modalNuevoPresupuesto()
        {
            console.log('modal nuevo presupuesto');
            $('#modalNuevoPresupuestoDental').modal('show');
        }

        function atender_procedimiento(id, nombre_tratamiento, pieza){
            console.log(pieza);
            let url ="{{ route('dental.dame_pieza') }}";
            let id_paciente = dame_id_paciente();
            if(id_paciente == '' || id_paciente == null){
                id_paciente = $('#id_paciente').val();
            }
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    pieza: pieza,
                    id_ficha_atencion: $('#id_fc').val(),
                    id_paciente: id_paciente,
                    _token: "{{ csrf_token() }}"
                },
                success: function (response)  {
                        console.log(response);
                        let detalle = response[0];
                        $('#id_odontograma').val(id);
                        console.log(detalle.diagnostico);
                        $('#comentarios_tratamiento').val(detalle.diagnostico.observaciones);
                        if(detalle.diagnostico.estado == 1){
                            $('#trabajo_terminado_check').prop('checked', true);
                        }
                        if(detalle.diagnostico.estado == 3){
                            $('#espera_lab_check').prop('checked',true);
                        }
                        $('#numero_pieza_presupuesto').text(pieza);
                        $('#tratamiento_presupuesto_').text(nombre_tratamiento);
                        swal({
                            title:'exito',
                            text:'procedimiento cargado',
                            icon: 'success',
                            position:'top-end',
                            toast: true
                        })
                },
            })

        }

        function guardar_info_tratamiento(){
            var fecha_proc = $('#fecha_proc').val();
            var comentarios_tratamiento = $('#comentarios_tratamiento').val();
            var id_odontograma = $('#id_odontograma').val();

            var agenda_control = $('#agendar_control_check').is(':checked');
            var fecha_control = $('#fecha_control').val();
            var hora_control = $('#hora_control').val();

            var trabajo_terminado = $('#trabajo_terminado_check').is(':checked');
            if(trabajo_terminado){
                trabajo_terminado = 1;
            }else{
                trabajo_terminado = 0;
            }

            var espera_lab = $('#espera_lab_check').is(':checked');
            if(espera_lab){
                espera_lab = 1;
            }else{
                espera_lab = 0;
            }

            let valido = 1;
            let mensaje = '';

            if(id_odontograma == ''){
                valido = 0;
                mensaje += '<li>Debe seleccionar pieza</li>';

            }

            if(fecha_proc == ''){
                valido = 0;
                mensaje += '<li>Debe ingresar la fecha del procedimiento</li>';
            }
            // if(comentarios_tratamiento == ''){
            //     valido = 0;
            //     mensaje += '<li>Debe ingresar los comentarios del tratamiento</li>';
            // }

            if(agenda_control){
                if(fecha_control == ''){
                    valido = 0;
                    mensaje += '<li>Debe ingresar la fecha del control</li>';
                }
                if(hora_control == ''){
                    valido = 0;
                    mensaje += '<li>Debe ingresar la hora del control</li>';
                }
            }

            if(valido == 0){
                swal({
                    title: 'Error!',
                    content:{
                        element: 'ul',
                        attributes:{
                            innerHTML: mensaje
                        }
                    },
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });
                return false;
            }

            let data = {
                fecha_proc: fecha_proc,
                comentarios_tratamiento: comentarios_tratamiento,
                id_odontograma: id_odontograma,
                agenda_control: agenda_control,
                espera_lab: espera_lab,
                fecha_control: fecha_control,
                hora_control: hora_control,
                trabajo_terminado: trabajo_terminado,
                id_ficha_atencion: $('#id_fc').val(),
                _token: "{{ csrf_token() }}"
            }

            let url = "{{ route('profesional.actualizar_tratamiento_dental') }}";

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function(response){
                    console.log(response);
                    if(response.status == 1){
                        swal({
                            title: 'Correcto!',
                            text: 'Se ha guardado la información del tratamiento',
                            icon: 'success',
                            confirmButtonText: 'Aceptar'
                        });
                        //$('#modal_presupuesto').modal('hide');
                        let odontograma = response.odontograma_paciente;
                        let html = '';
                        odontograma.forEach(function(odonto){
                            html += '<tr>';
                            html += '<td>'+odonto.fecha+'</td>';
                            html += '<td>'+odonto.tratamiento+'</td>';
                            html += '<td>'+odonto.caras+'</td>';
                            html += '<td>'+odonto.pieza+'</td>';
                            html += '<td>'+odonto.diagnostico+'</td>';
                            html += '<td>'+odonto.valor+'</td>';
                            // html += '<td>';
                            // html += '<button type="button" class="btn btn-danger btn-sm" onclick="eliminar_odontograma('+odonto.id+')"><i class="feather icon-x"></i>Eliminar</button>';
                            // if(odonto.presupuesto == 0){
                            //     html += '<button type="button" class="btn btn-primary btn-sm" onclick="cargar_a_presupuesto('+odonto.id+')"><i class="fas fa-save"></i>Cargar a presupuesto</button>';
                            // }else{
                            //     html += '<button type="button" class="btn btn-danger btn-sm" onclick="sacar_de_presupuesto('+odonto.id+')"><i class="fas fa-trash"></i>Sacar de presupuesto</button>';
                            // }
                            // html += '</td>';
                             // Checkbox para seleccionar el odontograma
                            html += '<td>';
                            html += '<div class="form-check">';
                            html += '<input class="form-check-input" type="checkbox" value="' + odonto.id + '" '
                            html += odonto.presupuesto == 1 ? 'checked ' : '';
                            html += 'onchange="togglePresupuesto(' + odonto.id + ', this.checked)">';
                            html += '<label class="form-check-label"></label>';
                            html += '</div>';
                            html += '</td>';
                            html += '<td>';
                            html += '<div class="form-check">';
                            html += '<input class="form-check-input checkbox-seleccion" type="checkbox" value="' + odonto.id + '" ';
                            html += 'id="seleccionCheck' + odonto.id + '" ';
                            html += 'onchange="toggleSeleccion(' + odonto.id + ', this.checked)">';
                            html += '<label class="form-check-label" for="seleccionCheck' + odonto.id + '"></label>';
                            html += '</div>';
                            html += '</td>';
                            html += '</tr>';
                        });

                        $('#table_odontograma tbody').html(html);
                        $('#contenedor_piezas_dentales_presupuesto').empty();
                        $('#table_trabajos_presupuesto tbody').empty();
                        odontograma.forEach(function(odonto){

                                if(odonto.estado == 0){
                                    var estado_ = 'PENDIENTE';
                                }else if(odonto.estado == 1){
                                    var estado_ = 'TERMINADO';
                                }else if(odonto.estado == 3){
                                    var estado_ = 'EN ESPERA DE LAB';
                                }
                                console.log(estado_);
                                $('#contenedor_piezas_dentales_presupuesto').append(`
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-informacion">
                                        <div class="card-body pb-0">
                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Pieza</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${odonto.pieza}">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label-activo-sm">Prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${odonto.descripcion}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label class="floating-label-activo-sm">Descuento</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Total prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                </div>
                                                <div class="form-group col-md-2 d-flex justify-content-center">
                                                    <button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_odontograma(${odonto.id})"><i class="fas fa-trash"></i> </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        `);
                                if(odonto.presupuesto == 1){
                                $('#table_trabajos_presupuesto tbody').append(`
                                    <tr>
                                        <td>${odonto.fecha}</td>
                                        <td>${odonto.tratamiento} </td>
                                        <td>${odonto.caras} </td>
                                        <td>${odonto.pieza} </td>
                                        <td>${odonto.diagnostico} </td>
                                        <td>${odonto.valor} </td>
                                        <td>${estado_} </td>
                                        <td>
                                            <button type="button" class="btn btn-secondary btn-sm" onclick="atender_procedimiento(${odonto.id},'${odonto.tratamiento}',${odonto.pieza})"><i class="fas fa-check"></i>Cargar</button>
                                        </td>
                                    </tr>
                                `);
                            }
                        });

                        let table_odonto = $('#presup_estado_pago').DataTable();

                        // Limpiar la tabla antes de agregar nuevas filas
                        table_odonto.clear().draw();

                        // Recorrer el odontograma y agregar nuevas filas
                        odontograma.forEach(function(odonto) {

                            if (odonto.presupuesto == 1) {
                                if(odonto.estado_pago == 'ok'){
                                    var clase = 'bg-success';
                                }else if(odonto.estado_pago == 'incompleto'){
                                    var clase = 'bg-warning';
                                }else{
                                    var clase = 'bg-danger';
                                }

                                if(odonto.estado == 0){
                                    var estado = 'PENDIENTE';
                                }else{
                                    var estado = 'TERMINADO';
                                }
                                // Agregar una nueva fila a la tabla
                                let rowNode = table_odonto.row.add([
                                    odonto.descripcion,
                                    odonto.pieza,
                                    formatoMoneda(formatoMoneda(odonto.valor)),
                                    0,
                                    formatoMoneda(formatoMoneda(odonto.valor)),
                                    '<div class="circle '+clase+'"></div>',
                                    estado, // Columna vacía

                                ]).draw(false).node(); // Obtener el nodo de la fila

                                // Agregar clases a la fila
                                $(rowNode).addClass('text-center align-middle status-circle');
                            }
                        });

                        let valores = response.valores;
                        $('#valores_piezas_presupuesto').html((valores[1]));
                        $('#odon_adults').empty();
                        $('#odon_adults').append(response.odontograma_paciente_vista);
                    }else{
                        swal({
                            title: 'Error!',
                            text: 'Ha ocurrido un error al guardar la información del tratamiento',
                            icon: 'error',
                            confirmButtonText: 'Aceptar'
                        });
                    }
                }
            })
        }

        function habilitar_agenda_control(){
            if($('#agendar_control_check').is(':checked')){
                $('#agenda_control').show();
                $('#fecha_control').prop('disabled', false);
                $('#hora_control').prop('disabled', false);
            }else{
                $('#agenda_control').hide();
                $('#fecha_control').prop('disabled', true);
                $('#hora_control').prop('disabled', true);
            }
            if($('#trabajo_terminado_check').is(':checked')){
                $('#agendar_control_check').prop('disabled', true);
                // ocultar agenda control
                $('#agenda_control').hide();
            }else{
                $('#agendar_control_check').prop('disabled', false);
            }
        }

        function generar_pdf(){
            let url = "{{ route('profesional.generar_pdf_presupuesto_dental') }}";
            let id_paciente = $('#id_paciente_fc').val();
            let id_ficha_atencion = $('#id_fc').val();
            let id_lugar_atencion = $('#id_lugar_atencion').val();
            let data = {
                id_paciente: id_paciente,
                id_ficha_atencion: id_ficha_atencion,
                id_lugar_atencion: id_lugar_atencion,
                _token: "{{ csrf_token() }}"
            }

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function(data){
                    console.log(data);
                    if(data == 'error'){
                        swal({
                            title:'Error',
                            text:'Primero debe generar la liquidación.',
                            icon:'error',
                            button:"Aceptar"
                        });
                        return false;
                    }
                    if(data.ruta){
                        swal({
                            title: "Reporte generado",
                            text: "El reporte se ha generado correctamente",
                            icon: "success",
                            button: "Aceptar"
                        }).then(() => {
                            // Abrir el PDF en una ventana emergente
                            var width = 800;
                            var height = 600;
                            var left = (screen.width - width) / 2;
                            var top = (screen.height - height) / 2;
                            window.open(data.ruta, 'Presupuesto dental', 'width=' + width + ',height=' + height + ',top=' + top + ',left=' + left);
                        });
                    }else{
                        swal({
                            title: "Error",
                            text: "Ha ocurrido un error al generar el reporte",
                            icon: "error",
                            button: "Aceptar"
                        });
                    }
                }
            })
        }

        function guardar_presupuesto_dental(){
            let fecha = $('#fecha').val();
            let nro_presupuesto = $('#nro_presupuesto').val();
            let aprobado = $('#aprobado').val();
            let pieza = $('#pieza').val();
            let boca = $('#boca').val();
            let presupuesto_monto = $('#presupuesto_monto').val();
            let estado = $('#estado').val();
            let control = $('#control').val();

            let valido = 1;
            let mensaje = '';

            if(fecha == ''){
                valido = 0;
                mensaje += '<li>Debe ingresar la fecha del presupuesto</li>';
            }
            if(nro_presupuesto == ''){
                valido = 0;
                mensaje += '<li>Debe ingresar el número del presupuesto</li>';
            }
            if(aprobado == ''){
                valido = 0;
                mensaje += '<li>Debe seleccionar si el presupuesto está aprobado</li>';
            }
            if(pieza == ''){
                valido = 0;
                mensaje += '<li>Debe ingresar la pieza</li>';
            }
            if(boca == ''){
                valido = 0;
                mensaje += '<li>Debe seleccionar si el presupuesto es para boca</li>';
            }
            if(presupuesto_monto == ''){
                valido = 0;
                mensaje += '<li>Debe ingresar el monto del presupuesto</li>';
            }
            if(estado == ''){
                valido = 0;
                mensaje += '<li>Debe seleccionar el estado del presupuesto</li>';
            }
            if(control == ''){
                valido = 0;
                mensaje += '<li>Debe ingresar la fecha de control del presupuesto</li>';
            }

            if(valido == 0){
                swal({
                    title: 'Error!',
                    content:{
                        element: 'ul',
                        attributes:{
                            innerHTML: mensaje
                        }
                    },
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });
                return false;
            }

            let data = {
                fecha: fecha,
                nro_presupuesto: nro_presupuesto,
                aprobado: aprobado,
                pieza: pieza,
                boca: boca,
                presupuesto_monto: presupuesto_monto,
                estado: estado,
                control: control,
                _token: "{{ csrf_token() }}"
            }

            let url = "{{ route('profesional.registrar_presupuesto_dental') }}";

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function(data){
                    return console.log(data);
                    if(data == 1){
                        swal({
                            title: 'Correcto!',
                            text: 'Se ha guardado el presupuesto',
                            icon: 'success',
                            confirmButtonText: 'Aceptar'
                        });
                        $('#modalNuevoPresupuestoDental').modal('hide');
                    }else{
                        swal({
                            title: 'Error!',
                            text: 'Ha ocurrido un error al guardar el presupuesto',
                            icon: 'error',
                            confirmButtonText: 'Aceptar'
                        });
                    }
                }
            })
        }

</script>
