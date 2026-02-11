<!-- Modal ver acompañante -->

<div class="modal fade" id="m_ver_acomp_dep" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content">

            <div class="modal-header bg-info">

                <h5 class="modal-title text-white mt-1" id="modal_indicar_examen">Ver acompañantes de dependiente</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-md-12">

                        <table id="lista_acompananate" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">

                            <thead>

                                <tr>

                                    <th>Nombre</th>

                                    <th>RUT</th>

                                </tr>

                            </thead>

                            <tbody>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>





<script>

    function ver_acomp_dep(id_responsable, id_dependiente)

    {

        cargar_acompanantes(id_responsable, id_dependiente);

        $('#m_ver_acomp_dep').modal('show');

    }



    function cargar_acompanantes(id_responsable, id_dependiente)

    {

        $('#lista_acompananate tbody').html('');



        var url = "{{ route('paciente.acompanante.ver') }}";

        $.ajax({

            url: url,

            type: "get",

            data: {

                id_responsable: id_responsable,

                id_dependiente: id_dependiente,

            },

        })

        .done(function(resp) {

            console.log(resp);

            if (resp !== 'null')

            {

                if(resp.estado == 1)

                {

                    $.each(resp.registros, function (key, value)

                    {

                        var html = '';

                        html += '<tr>';

                        html += '    <td>'+value.acompanante.rut+'</td>';

                        html += '    <td>'+value.acompanante.nombre+' '+value.acompanante.apellido_uno+' '+value.acompanante.apellido_dos+'</td>';

                        html += '</tr>';

                        $('#lista_acompananate tbody').append(html);

                    });



                }

            }

            else

            {

                var mensaje = '';

                if(resp.error)

                {

                    $.each(resp.error, function (indexInArray, valueOfElement)

                    {

                        mensaje += valueOfElement+'\n';

                    });

                }

                else

                {

                    mensaje += 'Intente nuevamente.';

                }



                swal({

                    title: "Carga de Responsables",

                    text: mensaje,

                    icon: "error",

                });

            }

        })

        .fail(function(jqXHR, ajaxOptions, thrownError) {

            console.log(jqXHR, ajaxOptions, thrownError)

        });

    }

</script>

