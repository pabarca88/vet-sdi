<div class="container">

    <div class="row mx-2 px-2">
        <div class="col-sm-12 col-md">
            <div class="card text-center bg-primary h-100">
                <div class="card-body pt-3 pb-1">
                    <h4 class="text-white font-weight-bold">C1</h4>
                    <p class="card-text text-white font-weight-bold">Leve</p>
                    <button type="button"
                        class="btn btn-xxs btn-outline-light" onclick="asignar_nueva_urgencia_paciente(1)">ASIGNAR</button>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md">
            <div class="card text-center bg-warning h-100">
                <div class="card-body pt-3 pb-1">
                    <h4 class="text-white font-weight-bold">C2</h4>
                    <p class="card-text text-white font-weight-bold">Mediana gravedad</p>
                    <button type="button"
                        class="btn btn-xxs btn-outline-light" onclick="asignar_nueva_urgencia_paciente(2)">ASIGNAR</button>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md">
            <div class="card text-center bg-danger h-100">
                <div class="card-body pt-3 pb-1">
                    <h4 class="text-white font-weight-bold">C3</h4>
                    <p class="card-text text-white font-weight-bold">Grave</p>
                    <button type="button"
                        class="btn btn-xxs btn-outline-light" onclick="asignar_nueva_urgencia_paciente(3)">ASIGNAR</button>
                </div>
            </div>
        </div>
        <div class="col-sm-12 mt-3">
            <div id="info_paciente_triage">
                <div class="alert {{ $paciente_sala->clase_html }} text-white" role="alert" >
                    <i class="fas fa-check"></i>&nbsp; &nbsp; {{ $paciente_sala->nombres }} {{ $paciente_sala->apellido_uno_paciente }} <strong>{{ $paciente_sala->apellido_dos_paciente }}</strong>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="hidden" name="id_triage" id="id_triage" value="">

<script>
    function asignar_nueva_urgencia_paciente(id_triage) {
        $('#id_triage').val(id_triage);
        var urlParams = new URLSearchParams(window.location.search);
        var idPaciente = urlParams.get('id_paciente');

        $.ajax({
            url: "{{ route('enfermeria.asignar_nueva_urgencia_paciente') }}",
            type: 'POST',
            data: {
                id_triage: id_triage,
                id_paciente: idPaciente,
                _token: "{{ csrf_token() }}"
            },
            success: function(data) {
                console.log(data);
                if (data.mensaje == 'OK') {
                    $('#modal_asignar_triage').modal('hide');
                    swal({
                        title: "Triage Asignado",
                        text: "El triage ha sido asignado correctamente",
                        icon: "success",
                        button: "Aceptar",
                    }).then(function() {
                        let paciente = data.paciente;
                        console.log(paciente);
                        let clase;
                        if(paciente.nivel_urgencia == 1) clase = 'bg-primary'; else if(paciente.nivel_urgencia == 2) clase = 'bg-warning'; else clase = 'bg-danger';
                        $('#info_paciente_triage').empty();
                        $('#info_paciente_triage').append(`
                        <div class="alert ` + clase +
                            ` text-white" role="alert">
                            <i class="fas fa-check"></i>&nbsp; &nbsp; ` + paciente.nombres + ` ` + paciente
                            .apellido_uno + ` ` + paciente.apellido_dos + `
                        </div>
                        `);
                    })
                } else {
                    console.log(data);
                }
            },
            error: function(data) {
                console.log(data.responseText);
            }
        });
    }
</script>
