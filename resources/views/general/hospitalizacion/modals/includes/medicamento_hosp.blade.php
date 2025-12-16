<div class="form-row">
    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
            <div class="form-group">
            <label for="nombre_medicamento_indicaciones{{$counter}}" class="floating-label-activo-sm">Nombre medicamento</label>
            <input type="text" name="nombre_medicamento_indicaciones{{$counter}}" id="nombre_medicamento_indicaciones{{$counter}}" class="form-control form-control-sm">
        </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
        <div class="form-group">
            <label for="dosis_medicamento_indicaciones{{$counter}}" class="floating-label-activo-sm">Dosis</label>
            <input type="text" name="dosis_medicamento_indicaciones{{$counter}}" id="dosis_medicamento_indicaciones{{$counter}}" class="form-control form-control-sm">
        </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
        <div class="form-group">
            <label for="frecuencia_medicamento_indicaciones" class="floating-label-activo-sm">Frecuencia</label>
            <input type="text" name="frecuencia_medicamento_indicaciones{{$counter}}" id="frecuencia_medicamento_indicaciones{{$counter}}" class="form-control form-control-sm">
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
        <button type="button" class="btn btn-danger btn-sm" onclick="ocultar_medicamento_hosp({{ $counter }})"><i class="feather icon-x"></i> Ocultar</button>
        <button type="button" class="btn btn-info btn-sm" onclick="guardar_medicamento_hosp({{ $counter }})"><i class="feather icon-save"></i> Guardar</button>
    </div>
</div>

<script>
    let medicamentos_hospitalizacion = [];
    function guardar_medicamento_hosp(counter) {
        const nombre = $(`#nombre_medicamento_indicaciones${counter}`).val();
        const dosis = $(`#dosis_medicamento_indicaciones${counter}`).val();
        const frecuencia = $(`#frecuencia_medicamento_indicaciones${counter}`).val();

        if (!nombre || !dosis || !frecuencia) {
            swal({
                icon: 'error',
                text: "Debe completar todos los campos del medicamento.",
            });
            return;
        }

        const index = medicamentos_hospitalizacion.findIndex(med => med.nombre.toLowerCase() === nombre.toLowerCase());
        const data = { counter, nombre, dosis, frecuencia };

        let tabla_medicamentos_dt = $('#tabla_medicamentos').DataTable();

        if (index >= 0) {
            medicamentos_hospitalizacion[index] = data;

            // Buscar y actualizar la fila correspondiente en DataTable
            tabla_medicamentos_dt.rows().every(function () {
                const rowData = this.data();
                if ($(rowData[3]).find('button').attr('onclick')?.includes(`eliminar_medicamento(${counter})`)) {
                    this.data([
                        nombre,
                        dosis,
                        frecuencia,
                        `<button type="button" class="btn btn-icon btn-danger" onclick="eliminar_medicamento(${counter})"><i class="fas feather icon-x"></i></button>`
                    ]).draw(false);
                }
            });

        } else {
            medicamentos_hospitalizacion.push(data);

            tabla_medicamentos_dt.row.add([
                nombre,
                dosis,
                frecuencia,
                `<button type="button" class="btn btn-icon btn-danger" onclick="eliminar_medicamento(${counter})"><i class="feather icon-x"></i></button>`
            ]).draw(false);
        }

        // Limpiar formulario
        $(`#medicamento_row_${counter}`).remove();
        ocultar_medicamento_hosp(counter);
    }


    function ocultar_medicamento_hosp(counter){
        $('#contenedor_nuevo_medicamento').empty();
        // limpiar campos
        $('#nombre_medicamento_indicaciones'+counter).val('');
        $('#dosis_medicamento_indicaciones'+counter).val('');
        $('#frecuencia_medicamento_indicaciones'+counter).val('');
    }

    function eliminar_medicamento(counter) {
        console.log(counter);
        medicamentos_hospitalizacion = medicamentos_hospitalizacion.filter(m => m.counter !== counter);
        $(`#fila_medicamento_${counter}`).remove();
    }
</script>
