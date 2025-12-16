
<!-- BOTÓN FLOTANTE AGENDA (ESPACIO PARA INSERTAR LA NUEVA AGENDA) -->
<div class="botones-container-asistente">

    {{-- @case(1) --}}
    <button class="btn boton btn-agenda-seleccion btn-agenda-1 shadow-sm  pt-3" style="display:none; " type="button" onclick="cargarAgendaProfesional(1, '{{ date('Y-m-d') }}');"><i class="feather icon-calendar"></i> CONSULTA</button>

    {{-- @case(2) --}}
    <button class="btn boton btn-agenda-seleccion btn-agenda-2 shadow-sm  pt-3" style="display:none; " type="button" onclick="cargarAgendaProfesional(2, '{{ date('Y-m-d') }}');"><i class="feather icon-calendar"></i> DENTAL</button>

    {{-- @case(3) --}}
    <button class="btn boton btn-agenda-seleccion btn-agenda-3 shadow-sm  pt-3" style="display:none; " type="button" onclick="cargarAgendaProfesional(3, '{{ date('Y-m-d') }}');"><i class="feather icon-calendar"></i> TELEMEDICINA</button>

    {{-- @case(4) --}}
    <button class="btn boton btn-agenda-seleccion btn-agenda-4 shadow-sm  pt-3" style="display:none; " type="button" onclick="cargarAgendaProfesional(4, '{{ date('Y-m-d') }}');"><i class="feather icon-calendar"></i> EXÁMENES</button>

    {{-- @case(5) --}}
    <button class="btn boton btn-agenda-seleccion btn-agenda-5 shadow-sm  pt-3" style="display:none; " type="button" onclick="cargarAgendaProfesional(5, '{{ date('Y-m-d') }}');"><i class="feather icon-calendar"></i> MODULAR</button>

    <input type="hidden" name="id_tipo_agenda" id="id_tipo_agenda" value="1">
</div>

<!-- SCRIPT -->
@section('btn-script-agenda')
    <script type="text/javascript">

        function getInactiveDays(startDate, endDate, activeDays)
        {
            const diffInDays = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24));

            for (let i = 0; i <= diffInDays; i++)
            {
                const day = new Date(startDate.getTime() + i * 1000 * 60 * 60 * 24);
                if (!activeDays[day.getDay()]) {
                    activeDaysInRange.push(day);
                }
            }

            return activeDaysInRange;
        }

    </script>
@endsection
