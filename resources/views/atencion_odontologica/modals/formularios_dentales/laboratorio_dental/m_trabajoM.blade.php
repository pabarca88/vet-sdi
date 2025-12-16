<div id="modal_orden_trabajoM" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_orden_trabajoM"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Orden de trabajo mayor</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="form_orden_trabajo_mayor" method="post">

                    @csrf
                    <input type="hidden" name="ficha_id_trabajo_mayor" id="ficha_id_trabajo_mayor">
                       {{--   value=" @if ($ficha != null) {{ $ficha->id }}@endif">--}}
                    <input type="hidden" name="paciente_trabajo_mayor" id="paciente_trabajo_mayor"
                        value="">

                    <div class="form-row">
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">N° Orden</label>
                            <!--correlativo-->
                            <input type="text" class="form-control form-control-sm" name="nro_orden_trabajo_mayor"
                                id="nro_orden_trabajo_mayor">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <script>
                                var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
                                    "Octubre", "Noviembre", "Diciembre");
                                var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                                var f = new Date();
                                document.write(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f
                                    .getFullYear());
                            </script>
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Clinica/Dr./Dra</label>
                            <input type="text" class="form-control form-control-sm" name="clinica_doctor_trabajo_mayor"
                                id="clinica_doctor_trabajo_mayor" value="{{ $profesional->nombres }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Rut Profesional</label>
                            <input type="text" class="form-control form-control-sm" name="rut_profesional_trabajo_mayor"
                                id="rut_profesional_trabajo_mayor" value="{{ $profesional->rut }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Nombre Paciente</label>
                            <!--correlativo-->
                            <input type="text" class="form-control form-control-sm" name="paciente_nombre_trabajo_mayor"
                                id="paciente_nombre_trabajo_mayor"
                                value="{{ $paciente->nombres }} {{ $paciente->apellido_uno }} {{ $paciente->apellido_dos }}"
                                disabled>
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Rut Paciente</label>
                            <input type="text" class="form-control form-control-sm" name="paciente_rut_trabajo_mayor"
                                id="paciente_rut_trabajo_mayor" value="{{ $paciente->rut }}" disabled>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Laboratorios</label>
                            <select name="lab_trabajo_mayor" id="lab_trabajo_mayor" class="form-control form-control-sm">
                                <option value="0">Seleccione</option>
                                @foreach ($laboratorios as $lab)
                                    <option value="{{ $lab->id }}">{{ $lab->nombre }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Guia</label>
                            <input type="text" class="form-control form-control-sm" name="guia_trabajo_mayor"
                                id="guia_trabajo_mayor">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Color</label>
                            <input type="text" class="form-control form-control-sm" name="color_trabajo_mayor"
                                id="color_trabajo_mayor">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Urgencia</label>
                            <input type="text" class="form-control form-control-sm" name="urgencia_trabajo_mayor"
                                id="urgencia_trabajo_mayor">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Material</label>
                            <input type="text" class="form-control form-control-sm" name="material_trabajo_mayor"
                                id="material_trabajo_mayor">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Trabajo a realizar</label>
                            <input type="text" class="form-control form-control-sm"
                                name="trabajo_realizar_trabajo_mayor" id="trabajo_realizar_trabajo_mayor">

                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Valor</label>
                            <input type="text" class="form-control form-control-sm"
                                name="valor_prestacion_trabajo_mayor" id="valor_prestacion_trabajo_mayor">

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Comentarios</label>
                            <input type="text" class="form-control form-control-sm" name="comentarios_trabajo_mayor"
                                id="comentarios_trabajo_mayor">

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <h6 Style="text-align:center">Protesis c/implante</h6>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Marca Implante</label>
                            <select class="form-control form-control-sm" name="marca_implante_trabajo_mayor"
                                id="marca_implante_trabajo_mayor">
                                @foreach ($marcas_implantes as $marca)
                                    <option value="{{ $marca->id }}">{{ $marca->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Medida Implante</label>
                            <input type="text" class="form-control form-control-sm" name="medida_implante_trabajo_mayor"
                                id="medida_implante_trabajo_mayor">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <h6 Style="text-align:center">Aditamentos</h6>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-4 col-md-4">
                            <label class="floating-label-activo-sm">N° Replicas</label>
                            <input type="text" class="form-control form-control-sm" name="nro_replicas_trabajo_mayor"
                                id="nro_replicas_trabajo_mayor">
                        </div>
                        <div class="form-group col-sm-4 col-md-4">
                            <label class="floating-label-activo-sm">N° Tornillos</label>
                            <input type="text" class="form-control form-control-sm" name="nro_tornillos_trabajo_mayor"
                                id="nro_tornillos_trabajo_mayor">
                        </div>
                        <div class="form-group col-sm-4 col-md-4">
                            <label class="floating-label-activo-sm">Otros</label>
                            <input type="text" class="form-control form-control-sm" name="otros_trabajo_mayor"
                                id="otros_trabajo_mayor">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <h6 Style="text-align:center">Proximas Citas</h6>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-4 col-md-3">
                            <label class="floating-label-activo-sm">Cubetas</label>
                            <input type="text" class="form-control form-control-sm" name="cubetas_trabajo_mayor"
                                id="cubetas_trabajo_mayor">
                        </div>
                        <div class="form-group col-sm-4 col-md-3">
                            <label class="floating-label-activo-sm">P.Articulación</label>
                            <input type="text" class="form-control form-control-sm" name="p_articulacion_trabajo_mayor"
                                id="p_articulacion_trabajo_mayor">
                        </div>
                        <div class="form-group col-sm-4 col-md-3">
                            <label class="floating-label-activo-sm">P. Dientes</label>
                            <input type="text" class="form-control form-control-sm" name="p_dientes_trabajo_mayor"
                                id="p_dientes_trabajo_mayor">
                        </div>
                        <div class="form-group col-sm-4 col-md-3">
                            <label class="floating-label-activo-sm">P. Metal</label>
                            <input type="text" class="form-control form-control-sm" name="p_metal_trabajo_mayor"
                                id="p_metal_trabajo_mayor">
                        </div>
                        <div class="form-group col-sm-4 col-md-4">
                            <label class="floating-label-activo-sm">Bizcocho</label>
                            <input type="text" class="form-control form-control-sm" name="bizcocho_trabajo_mayor"
                                id="bizcocho_trabajo_mayor">
                        </div>
                        <div class="form-group col-sm-4 col-md-4">
                            <label class="floating-label-activo-sm">Terminación</label>
                            <input type="text" class="form-control form-control-sm" name="terminacion_trabajo_mayor"
                                id="terminacion_trabajo_mayor">
                        </div>
                        <div class="form-group col-sm-4 col-md-4">
                            <label class="floating-label-activo-sm">Compostura</label>
                            <input type="text" class="form-control form-control-sm" name="compostura_trabajo_mayor"
                                id="compostura_trabajo_mayor">
                        </div>
                    </div>

                    <div class="modal-footer">
                        
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-info" onclick="guardar_trabajo_mayor_dental()">Guardar</button>
                    </div>
                </form>
                <table class="table table-responsive w-100" id="table_trabajos_mayores_dental">
                    <thead>
                        <tr>
                            <th>N° Orden</th>
                            <th>Apellido</th>
                            <th>Guia</th>
                            <th>Color</th>
                            <th>Urgencia</th>
                            <th>Material</th>
                            <th>Trabajo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach ($ordenes_tmy as $orden)
                             <tr>
                                <td>{{ $orden->nro_orden }}</td>
                                <td>{{ $paciente->nombres }} {{ $paciente->apellido_uno }} {{ $paciente->apellido_dos }}</td>
                                <td>{{ $orden->guia }}</td>
                                <td>{{ $orden->color }}</td>
                                <td>{{ $orden->urgencia }}</td>
                                <td>{{ $orden->material }}</td>
                                <td>{{ $orden->trabajo_realizar }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-success" onclick="solicitar_permisos()"><i class="fas fa-user"></i>Solicitar permisos</button>
                                    <button type="button" class="btn btn-sm btn-primary" onclick="generar_pdf_trabajo_mayor_dental({{ $orden->id }})">Ver PDF</button>
                                    <button type="button" class="btn btn-sm btn-danger btn-icon" onclick="eliminar_trabajo_mayor_dental({{ $orden->id }})"><i class="fas fa-trash"></i></button>
                                </td>
                             </tr>
                         @endforeach
                    </tbody>
                 </table>
            </div>

        </div>
    </div>
</div>
<script>
    function lab_dent_mayor() {
        $('#modal_orden_trabajoM').modal('show');
    }

    function generar_pdf_trabajo_mayor_dental(id_orden_trabajo) {
    
        let url = "{{ ROUTE('dental.generar_pdf_trabajo_mayor') }}";
       let data = {
        id_orden_trabajo: id_orden_trabajo,
        id_ficha_atencion: $('#id_fc').val(),
        id_lugar_atencion: $('#id_lugar_atencion').val(),
        _token: CSRF_TOKEN
       }

       $.ajax({
            type:'post',
            url: url,
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
            },
            error: function(error){
                console.log(error);
            }
       });
    
}

</script>
