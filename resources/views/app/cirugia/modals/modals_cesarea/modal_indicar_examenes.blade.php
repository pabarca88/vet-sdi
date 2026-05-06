@php
    $modalIndicarExamenesId = $modalIndicarExamenesId ?? 'indicar_examenes';
@endphp

<div id="{{ $modalIndicarExamenesId }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_indicar_examen"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg"  data-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_indicar_examen">Indicar Examen</h5>
                <button type="button" class="close" aria-label="Close"  onclick="cerrarModalExamenesFicha();">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-row">
                    <div class="col-sm-12 mt-2">
                        <div class="form-group fill">
                            <label class="floating-label">Tipo Examen</label>

                            <select class="form-control form-control-sm" name="tipo_examen_d" id="tipo_examen_d">
                                <option value="0">Seleccione</option>
                                @foreach ($examenMedico as $exa)
                                    <option value="{{ $exa->cod_examen }}">
                                        {{ $exa->nombre_examen }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 mt-2">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Sub-tipo de Examen</label>

                            <select class="form-control form-control-sm" name="sub_tipo_examen_d" id="sub_tipo_examen_d">
                                <option value="">Seleccione</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 mt-2">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Examen</label>
                            <select class="form-control form-control-sm" name="examen_d" id="examen_d">
                                <option value="">Seleccione</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 mt-2">
                        <div class="form-group fill">
                            <label class="floating-label">Lado</label>
                            <select class="form-control form-control-sm" id="lado_d" name="lado_d">
                                <option value="0" selected>Seleccione</option>
                                <option value="Derecho">Derecho</option>
                                <option value="Izquierdo">Izquierdo</option>
                                <option value="Bilateral">Bilateral</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6 mt-2">
                        <div class="form-group fill">
                            <label class="floating-label">Prioridad</label>
                            <select class="form-control form-control-sm" id="prioridad_d" name="prioridad_d">
                                <option value="0">Seleccione</option>
                                <option value="1">Baja</option>
                                <option value="2" selected>Media</option>
                                <option value="3">Alta</option>
                                <option value="4">Urgente</option>
                            </select>
                        </div>
                    </div>


                    <div class="col-sm-12 mt-3">
                        <div class="form-group mb-1">
                            <label><strong>Con Contraste</strong></label>
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="imagenologia_con_contraste_d" disabled='disabled' >
                                <label for="imagenologia_con_contraste_d" class="cr"></label>
                            </div>
                            <div class="alert-primary" id="mensaje_imagenologia_con_contraste_d" style="display:none;">Acaba de seleccionar Imagen con Constraste, El examen de Creatinina fue adjuntado correctamente.</div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button type="button" onclick="indicar_examen_cirugia_d();" id="agregar_examen_tabla" class="btn btn-success btn-sm float-right">
                            <i lass="fa fa-plus"></i> Agregar Examen
                        </button>
                    </div>
                    <div class="col-sm-12 mt-3">
                        <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                        <!--Tabla-->
                        <div class="table-responsive">
                            <table id="tabla_examen_cirugia_d" class="table table-bordered table-sm tabla_examenes_ficha">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Fecha y Hora</th>
                                        <th class="text-center align-middle">Nombre Examen</th>
                                        <th class="text-center align-middle">Lado</th>
                                        <th class="text-center align-middle">Tipo</th>
                                        {{--  <th class="text-center align-middle">Sub-Tipo</th>  --}}
                                        <th class="text-center align-middle">Prioridad</th>
                                        <th class="text-center align-middle">Con Contraste</th>
                                        <th class="text-center align-middle">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($examenes_solicitados))
                                        @foreach($examenes_solicitados as $examen)
                                            <tr>
                                                <td class="text-center align-middle">{{ $examen->fecha }} {{ $examen->hora }} <br> {{ $examen->responsable }}</td>
                                                <td class="text-center align-middle">{{ $examen->datos_examen->examen }}</td>
                                                <td class="text-center align-middle">{{ $examen->datos_examen->lado }}</td>
                                                <td class="text-center align-middle">{{ $examen->datos_examen->tipo_examen }}</td>
                                                <td class="text-center align-middle">{{ $examen->datos_examen->prioridad }}</td>
                                                <td class="text-center align-middle">{{ $examen->datos_examen->imagenologia_con_contraste ? $examen->datos_examen->imagenologia_con_contraste_d : 'N/C' }}</td>
                                                <td class="text-center align-middle">
                                                    <div class="btn btn-danger btn_remove btn-sm" onclick="eliminar_examen_cirugia_d({{ $examen->id }});"><i class="fas fa-trash"></i></div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!--Cierre Tabla-->
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                {{--  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>  --}}
                {{--  <button type="button" data-dismiss="modal" class="btn btn-info">Guardar</button>  --}}
                {{--  <button type="button" onclick="alerta_registro_examen();" data-dismiss="modal" class="btn btn-info">Generar Orden de Examen</button>  --}}
                <button type="button" onclick="registro_examen_ficha();" data-dismiss="modal" class="btn btn-info">Generar Orden de Examen</button>
            </div>
        </div>
    </div>
</div>

<script>
    function obtenerPrioridadTexto(prioridad) {
        var prioridades = {
            1: 'Baja',
            2: 'Media',
            3: 'Alta',
            4: 'Urgente'
        };

        if (prioridades[prioridad]) {
            return prioridades[prioridad];
        }

        return prioridad || 'Media';
    }

    function normalizarExamenModal(item, index) {
        var examen = item && item.datos_examen ? item.datos_examen : item || {};
        var fecha = item && item.fecha ? item.fecha : '';
        var hora = item && item.hora ? item.hora : '';
        var responsable = item && item.responsable ? item.responsable : '';
        var textoContraste = examen.imagenologia_con_contraste_d || item.con_contraste_texto || 'N/C';

        if (textoContraste === 'N/C' && (examen.imagenologia_con_contraste || item.con_contraste == 1)) {
            textoContraste = 'Con Contraste';
        }

        if (!fecha && item && item.created_at) {
            var fechaCreacion = new Date(item.created_at);
            if (!Number.isNaN(fechaCreacion.getTime())) {
                fecha = fechaCreacion.toLocaleDateString('es-CL');
                hora = fechaCreacion.toLocaleTimeString('es-CL', { hour: '2-digit', minute: '2-digit', hour12: false });
            }
        }

        if (!fecha && item && item.id) {
            fecha = 'Generado';
        }

        if (!responsable && item && item.id) {
            responsable = 'Registrado';
        }

        return {
            uid: item.uid || ('examen-modal-' + index + '-' + (item.id || examen.id_examen || Date.now())),
            id: item.id || null,
            id_examen: examen.id_examen || item.id_examen || '',
            nombre_examen: examen.examen || item.examen || item.nombre_examen || '',
            lado: examen.lado || item.otro || item.lado || '',
            tipo: examen.tipo_examen || item.tipo_examen || item.tipo || '',
            prioridad: obtenerPrioridadTexto(examen.prioridad || item.prioridad || item.id_prioridad),
            con_contraste: textoContraste,
            fecha: fecha,
            hora: hora,
            responsable: responsable
        };
    }

    function obtenerExamenesModal() {
        return getModalIndicarExamenesRoot().data('examenesSolicitados') || [];
    }

    function guardarExamenesModal(examenes) {
        getModalIndicarExamenesRoot().data('examenesSolicitados', examenes);
    }

    function getModalIndicarExamenesRoot() {
        var modalSelector = window.modalIndicarExamenesId || '#{{ $modalIndicarExamenesId }}';
        return $(modalSelector);
    }

    function getTablaExamenesCirugiaD() {
        return getModalIndicarExamenesRoot().find('#tabla_examen_cirugia_d');
    }

    function getTablaExamenesCirugiaDDataTable() {
        var $table = getTablaExamenesCirugiaD();

        if (!$table.length) {
            return null;
        }

        if ($.fn.DataTable.isDataTable($table[0])) {
            return $table.DataTable();
        }

        return $table.DataTable({
            paging: false,
            info: false,
            searching: true,
            ordering: false,
            responsive: true,
            autoWidth: false,
            language: {
                lengthMenu: "Mostrar _MENU_ registros por página",
                zeroRecords: "No se encontraron resultados",
                info: "Mostrando la página _PAGE_ de _PAGES_",
                infoEmpty: "No hay registros disponibles",
                infoFiltered: "(filtrando de _MAX_ registros)",
                search: "Buscar:",
                paginate: {
                    first: "Primero",
                    last: "Último",
                    next: "Siguiente",
                    previous: "Anterior"
                }
            }
        });
    }

    function renderExamenesCirugiaTablaD(examenes, mensaje) {
        var $table = getTablaExamenesCirugiaD();
        var table = getTablaExamenesCirugiaDDataTable();
        var registros = Array.isArray(examenes) ? examenes.map(normalizarExamenModal) : [];

        if (!table || !$table.length) {
            console.error('No se encontró la tabla de exámenes del modal activo.');
            return;
        }

        guardarExamenesModal(registros);
        table.clear();

        if (!registros.length) {
            table.draw();
            $table.find('tbody').html(
                '<tr class="examenes_sin_registros"><td class="text-center align-middle" colspan="7">' + (mensaje || 'No se han agregado Examenes a esta Ficha.') + '</td></tr>'
            );
            return;
        }

        registros.forEach(function(resp, index) {
            table.row.add([
                `${resp.fecha || ''} ${resp.hora || ''} <br> ${resp.responsable || ''}`,
                resp.nombre_examen || '',
                resp.lado || '',
                resp.tipo || '',
                resp.prioridad || '',
                resp.con_contraste || 'N/C',
                `<div class="btn btn-danger btn_remove btn-sm" onclick="quitarExamenDelModal('${resp.uid}', ${index});"><i class="fas fa-trash"></i></div>`
            ]);
        });

        table.draw(false);
    }

    function indicar_examen_cirugia_d() {
        var $modal = getModalIndicarExamenesRoot();

        var tipo_examen = $modal.find("#tipo_examen_d option:selected").text();
        var id_tipo_examen = $modal.find("#tipo_examen_d").val();
        var sub_tipo_examen = $modal.find("#sub_tipo_examen_d option:selected").text();
        var id_sub_tipo_examen = $modal.find("#sub_tipo_examen_d").val();
        var examen = $modal.find("#examen_d option:selected").text();
        var id_examen = $modal.find("#examen_d").val();
        var prioridad = $modal.find("#prioridad_d option:selected").text();
        var lado = $modal.find("#lado_d option:selected").text();
        var id_paciente = $('#id_paciente').val();
        var id_ficha_atencion = $('#id_fc').val();

        var imagenologia_con_contraste_d = 'N/C';
        if($modal.find('#imagenologia_con_contraste_d').is(':checked'))
            imagenologia_con_contraste_d = 'Con Contraste';

        var valido = 0;
        var mensaje = '';

        if ($.trim(tipo_examen) == '' || $.trim(tipo_examen) == 'Seleccione...' || $.trim(tipo_examen) == 'Seleccione') {
            valido = 1;
            mensaje += ' Debe seleccionar Tipo Examen\n';
        }
        if( $.trim(sub_tipo_examen) == '' || $.trim(sub_tipo_examen) == 'Seleccione...' || $.trim(sub_tipo_examen) == 'Seleccione' ){
            valido = 1;
            mensaje += ' Debe seleccionar Sub Tipo Examen\n';
        }
        if ($.trim(examen) == '' || $.trim(examen) == 'Seleccione...' || $.trim(examen) == 'Seleccione') {
            valido = 1;
            mensaje += ' Debe seleccionar Examen\n';
        }
        if ($.trim(prioridad) == '' || $.trim(prioridad) == 'Seleccione...' || $.trim(prioridad) == 'Seleccione') {
            valido = 1;
            mensaje += ' Debe seleccionar Prioridad\n';
        }


        if (valido == 0) {
            var examenesActuales = obtenerExamenesModal();

            examenesActuales.push(normalizarExamenModal({
                uid: 'draft-' + Date.now(),
                id_examen: id_examen,
                nombre_examen: examen,
                examen: examen,
                lado: lado === 'Seleccione' ? '' : lado,
                tipo: tipo_examen,
                tipo_examen: tipo_examen,
                prioridad: prioridad,
                con_contraste_texto: imagenologia_con_contraste_d,
                responsable: 'Pendiente',
                fecha: 'Pendiente',
                hora: '',
            }, examenesActuales.length));

            renderExamenesCirugiaTablaD(examenesActuales, 'Examen agregado correctamente.');
        }else{
            swal({
                title: "Ingreso de examen(es).",
                text: mensaje,
                icon: "error",
                buttons: "Aceptar",
                //SuccessMode: true,
            });
        }

        // $('.examenes_sin_registros').remove();


        // if ($('#imagenologia_con_contraste_d').prop('checked')) {
        //     $('#tabla_examen_cirugia tr').each(function(key, value) {
        //         $(value).find('td').each(function(key_td, value_td) {
        //             if (key_td == 0) {
        //                 if ($(value_td).text() == 'CREATININA EN SANGRE') {
        //                     creatinina = 1;
        //                 }
        //             }
        //         });
        //     });
        //     if (creatinina == 0) {
        //         fila = '';
        //         fila += '<tr class="tr_examen_cirugia" id="row' + i + '">';
        //         fila += '<td class="text-center align-middle text-wrap">CREATININA EN SANGRE</td>';
        //         fila += '<td class="text-center align-middle text-wrap">SANGRE</td>';
        //         //fila =     '<td>' + sub_tipo_examen + '</td>';
        //         fila += '<td class="text-center align-middle text-wrap">Media</td>';
        //         fila += '<td class="text-center align-middle text-wrap">N/C</td>';
        //         fila += '<td class="text-center align-middle"><div name="remove" id="' + i +
        //             '" class="btn btn-danger btn_remove btn-sm" onclick="eliminar_examen_contraste(\'row' + i +
        //             '\');"><i class="fas fa-trash"></i></div></td>';
        //         fila += '</tr>';
        //         $('#tabla_examen_cirugia tr:first').after(fila);
        //         i++;
        //         creatinina = 1;
        //     }
        // }




        $modal.find("#tipo_examen_d").val('');
        $modal.find("#sub_tipo_examen_d").val('');
        $modal.find("#examen_d").val('');
        $modal.find("#prioridad_d").val(2);
        $modal.find('#imagenologia_con_contraste_d').prop('checked', false);
        $modal.find('#mensaje_imagenologia_con_contraste_d').hide();
        $modal.find("#lado_d").val(0);
    }

    function quitarExamenDelModal(uid, index){
        var examenesActuales = obtenerExamenesModal().filter(function(examenActual, examenIndex) {
            if (uid) {
                return examenActual.uid !== uid;
            }

            return examenIndex !== index;
        });

        renderExamenesCirugiaTablaD(examenesActuales, 'No se han agregado Examenes a esta Ficha.');
    }

    function eliminar_examen_cirugia_d(id){
        swal({
            title: "Eliminar Examen.",
            text: 'Al "Aceptar" Elimina el examen.\n',
            icon: "warning",
            buttons: ["Cancelar", 'Aceptar'],
        }).then((result) => {
            if (result == true) {
                quitarExamenDelModal(id, null);
            } else {
                console.log('regresar');
            }
        })


    }

    function eliminar_examen_cirugia_ajax_d(id){
        quitarExamenDelModal(id, null);
    }
</script>
