<!--detalle rendicion-->
<div id="detalle_rendicion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="detalle_rendicion"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content ">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="modal_pago_consulta_title">Detalle Rendición</h5>
                <button type="button" class="close cerrar_modal_detalle_rendicion" data-dismiss="modal" aria-label="Close" onclick="$('#detalle_rendicion').modal('hide')"><span>×</span></button>

            </div>
            <div class="modal-body">
                <div class="col-sm-12 col-md-12">
                    <table id="tabla_detalle_rendicion" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                        <thead>
                            <tr>
                                {{-- <th class="text-center align-middle">ID Bono</th> --}}
                                <th class="text-center align-middle">Tipo</th>
                                <th class="text-center align-middle">Convenio</th>
                                <th class="text-center align-middle">Numero Bono</th>
                                <th class="text-center align-middle">F/Atención</th>
                                <th class="text-center align-middle">Valor $</th>
                                <th class="text-center align-middle">Profesional</th>
                                <th class="text-center align-middle">Paciente</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <div type="button" class="btn btn-info cerrar_modal_detalle_rendicion" data-dismiss="modal" aria-label="Close" onclick="$('#detalle_rendicion').modal('hide')">Cerrar</div>
            </div>
        </div>
    </div>
</div>

<script>
    function ver_datalle_rendicion(id_rendicion)
    {
        $('#tabla_detalle_rendicion').DataTable().destroy();
        $('#tabla_detalle_rendicion tbody').html('');
        let url = "{{ route('asistentejcm.rendicion.detalle') }}";

        $.ajax({
            url: url,
            type: "GET",
            data: {
                id_rendicion : id_rendicion
            },
        })
        .done(function(resp) {

            console.log(resp);



            if (resp.estado == 1)
            {
                $.each(resp.registros, function (key, value) {
                    var html = '';
                    html += '<tr>';
                    // html += '    <td class="text-center align-middle">'+value.id+'</td>';
                    html += '    <td class="text-left align-middle">'+value.tipo_bono.nombre+'</td>';
                    html += '    <td class="text-left align-middle">'+value.convenio.nombre+'</td>';
                    var bono = '-';
                    if(value.numero_bono != null)
                        bono = value.numero_bono;
                    html += '    <td class="text-right align-middle">'+bono+'</td>';
                    html += '    <td class="text-left align-middle">'+value.fecha_atencion+'</td>';
                    html += '    <td class="text-right align-middle">'+value.valor_atencion+'</td>';

                    /** PROFESIONAL */
                    var profesional = value.profesional.apellido_uno+' '+value.profesional.apellido_dos;
                    if(value.profesional.sub_tipo_especialidad !== null)
                        profesional += '<br>'+value.profesional.sub_tipo_especialidad.nombre;
                    else if(value.profesional.tipo_especialidad !== null)
                        profesional += '<br>'+value.profesional.tipo_especialidad.nombre;
                    else
                        profesional += '<br>'+value.profesional.especialidad.nombre;
                    html += '    <td class="text-left align-middle">'+profesional+'</td>';

                    /** PACIENTE */
                    var paciente = value.paciente.nombres+' '+value.paciente.apellido_uno+' '+value.paciente.apellido_dos;
                    html += '    <td class="text-left align-middle">'+paciente+'</td>';

                    html += '</tr>';

                    $('#tabla_detalle_rendicion tbody').append(html);
                });


                $('#tabla_detalle_rendicion').DataTable({
                    responsive: true,
                });

                $('#detalle_rendicion').modal('show');
            }
            else
            {
                var mensaje = '';
                if(data.error)
                {
                    $.each(data.error, function (indexInArray, valueOfElement)
                    {
                        mensaje += valueOfElement+'\n';
                    });
                }
                else
                {
                    mensaje += 'Intente nuevamente.';
                }

                swal({
                    title: "Falla al cargar Detalle de Rendición",
                    text: mensaje,
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }
</script>
