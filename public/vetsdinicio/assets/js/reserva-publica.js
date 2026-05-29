(function () {
    const apiBase = "/api/vetsdinicio/reservas";
    const state = {
        especies: [],
        areasVeterinarias: [],
        selectedReservation: null,
        responsibleLookupKey: "",
        responsibleFound: false,
        mascotasRegistradas: [],
    };

    const el = {
        filterForm: document.getElementById("reservation-search-form"),
        bookingForm: document.getElementById("reservation-booking-form"),
        region: document.getElementById("filter-region"),
        city: document.getElementById("filter-city"),
        specialty: document.getElementById("filter-specialty"),
        type: document.getElementById("filter-type"),
        typeLabel: document.getElementById("filter-type-label"),
        species: document.getElementById("mascota-especie"),
        searchFeedback: document.getElementById("search-feedback"),
        searchResults: document.getElementById("search-results"),
        bookingFeedback: document.getElementById("booking-feedback"),
        bookingSection: document.getElementById("reservation-form-section"),
        selectedSummary: document.getElementById("selected-summary"),
        hiddenProfessional: document.getElementById("booking-professional-id"),
        hiddenLocation: document.getElementById("booking-location-id"),
        hiddenDate: document.getElementById("booking-date"),
        hiddenTime: document.getElementById("booking-time"),
        responsibleId: document.getElementById("responsable-id"),
        responsibleRut: document.getElementById("responsable-rut"),
        responsibleNames: document.getElementById("responsable-nombres"),
        responsibleLastNameOne: document.getElementById("responsable-apellido-uno"),
        responsibleLastNameTwo: document.getElementById("responsable-apellido-dos"),
        responsibleEmail: document.getElementById("responsable-email"),
        responsiblePhone: document.getElementById("responsable-telefono"),
        responsibleLookupFeedback: document.getElementById("responsable-lookup-feedback"),
        petManualGroup: document.getElementById("mascota-nombre-manual-group"),
        petSelectGroup: document.getElementById("mascota-nombre-select-group"),
        petManualHelperRow: document.getElementById("mascota-manual-helper-row"),
        petNameInput: document.getElementById("mascota-nombre-input"),
        petNameSelect: document.getElementById("mascota-nombre-select"),
        bookingSubmit: document.getElementById("booking-submit"),
    };

    document.addEventListener("DOMContentLoaded", function () {
        if (!el.filterForm || !el.bookingForm) {
            return;
        }

        bindEvents();
        loadCatalogo();
    });

    function bindEvents() {
        el.region.addEventListener("change", onRegionChange);
        el.specialty.addEventListener("change", onSpecialtyChange);
        el.filterForm.addEventListener("submit", onSearchSubmit);
        el.bookingForm.addEventListener("submit", onBookingSubmit);
        el.responsibleRut.addEventListener("blur", onResponsibleRutLookup);
        el.responsibleRut.addEventListener("change", onResponsibleRutLookup);
        el.responsibleRut.addEventListener("input", onResponsibleRutInput);
        el.petNameSelect.addEventListener("change", onPetSelectionChange);

        el.searchResults.addEventListener("click", function (event) {
            const searchButton = event.target.closest("[data-action='search-hours']");
            if (searchButton) {
                handleSearchHours(searchButton);
                return;
            }

            const slotButton = event.target.closest("[data-action='select-slot']");
            if (slotButton) {
                handleSelectSlot(slotButton);
            }
        });
    }

    async function loadCatalogo() {
        setFeedback(el.searchFeedback, "Cargando filtros...", "info");

        try {
            const response = await fetchJson(apiBase + "/catalogo");
            state.especies = response.especies || [];
            state.areasVeterinarias = response.areas_veterinarias || [];

            fillSelect(el.region, response.regiones || [], "Todas");
            fillSelect(el.specialty, state.areasVeterinarias, "Todas");
            fillSelect(el.species, state.especies, "Selecciona una opción");
            clearFeedback(el.searchFeedback);
        } catch (error) {
            setFeedback(el.searchFeedback, error.message, "danger");
        }
    }

    async function onRegionChange() {
        resetSelect(el.city, "Todas");
        el.city.disabled = true;

        const regionId = el.region.value;
        if (!regionId) {
            return;
        }

        try {
            const response = await fetchJson(apiBase + "/ciudades?id_region=" + encodeURIComponent(regionId));
            fillSelect(el.city, response.ciudades || [], "Todas");
            el.city.disabled = false;
        } catch (error) {
            setFeedback(el.searchFeedback, error.message, "danger");
        }
    }

    async function onSpecialtyChange() {
        resetSelect(el.type, "Todos");
        el.type.disabled = true;
        el.typeLabel.textContent = "Servicio";

        if (!el.specialty.value) {
            return;
        }

        try {
            const response = await fetchJson(apiBase + "/tipos-especialidad?area=" + encodeURIComponent(el.specialty.value));
            fillSelect(el.type, response.tipos_especialidad || [], "Todos");
            el.typeLabel.textContent = response.label_item || "Servicio";
            el.type.disabled = false;
        } catch (error) {
            setFeedback(el.searchFeedback, error.message, "danger");
        }
    }

    async function onSearchSubmit(event) {
        event.preventDefault();

        state.selectedReservation = null;
        renderSelectedReservation();
        el.bookingSection.classList.add("d-none");
        el.searchResults.innerHTML = "";
        setFeedback(el.searchFeedback, "Buscando profesionales y horarios...", "info");

        try {
            const params = new URLSearchParams(new FormData(el.filterForm));
            const response = await fetchJson(apiBase + "/profesionales?" + params.toString());
            renderProfessionals(response.registros || []);
        } catch (error) {
            setFeedback(el.searchFeedback, error.message, "danger");
        }
    }

    function renderProfessionals(professionals) {
        el.searchResults.innerHTML = "";

        if (!professionals.length) {
            setFeedback(el.searchFeedback, "No encontramos resultados con esos filtros.", "warning");
            return;
        }

        clearFeedback(el.searchFeedback);

        professionals.forEach(function (professional) {
            const card = document.createElement("article");
            card.className = "professional-card";
            card.dataset.professionalId = professional.id;
            card.dataset.professionalName = professional.nombre;
            const hasAgenda = Array.isArray(professional.lugares_atencion) && professional.lugares_atencion.length > 0;
            card.innerHTML = [
                "<div class='professional-head'>",
                "  <img class='professional-photo' src='" + escapeHtml(professional.imagen || "") + "' alt='Profesional'>",
                "  <div class='flex-grow-1'>",
                "    <div class='professional-name'>" + escapeHtml(professional.nombre) + "</div>",
                "    <div class='professional-meta'>",
                "      <strong>" + escapeHtml(professional.especialidad || "Atención veterinaria") + "</strong><br>",
                renderMetaLine(professional.tipo_especialidad),
                renderMetaLine(professional.sub_tipo_especialidad),
                (professional.direccion_principal ? "      " + escapeHtml(professional.direccion_principal) + "<br>" : ""),
                (hasAgenda ? "      Agenda pública disponible" : "      Agenda pública no disponible"),
                "    </div>",
                "  </div>",
                "</div>",
                "<div class='availability-panel'>",
                "  <div class='form-row'>",
                "    <div class='form-group col-md-5 mb-md-0'>",
                "      <label>Sucursal</label>",
                "      <select class='form-control rounded-xl' data-role='location-select'" + (hasAgenda ? "" : " disabled") + ">",
                renderLocationOptions(professional.lugares_atencion || []),
                "      </select>",
                "    </div>",
                "    <div class='form-group col-md-4 mb-md-0'>",
                "      <label>Fecha</label>",
                "      <input class='form-control rounded-xl' data-role='date-input' type='date' min='" + today() + "'" + (hasAgenda ? "" : " disabled") + ">",
                "    </div>",
                "    <div class='form-group col-md-3 d-flex align-items-end mb-0'>",
                "      <button class='btn btn-azul btn-block rounded-xl reservation-action' data-action='search-hours' type='button'" + (hasAgenda ? "" : " disabled") + ">Ver horas</button>",
                "    </div>",
                "  </div>",
                "  <div class='reservation-feedback' data-role='hours-feedback'>" + (hasAgenda ? "" : "<div class='alert alert-warning' role='alert'>Este profesional aún no tiene agenda pública configurada.</div>") + "</div>",
                "  <div class='timeslots' data-role='timeslots'></div>",
                "</div>",
            ].join("");

            el.searchResults.appendChild(card);
        });
    }

    async function handleSearchHours(button) {
        const card = button.closest(".professional-card");
        const locationSelect = card.querySelector("[data-role='location-select']");
        const dateInput = card.querySelector("[data-role='date-input']");
        const feedback = card.querySelector("[data-role='hours-feedback']");
        const timeslots = card.querySelector("[data-role='timeslots']");

        if (!locationSelect.value) {
            setFeedback(feedback, "Selecciona una sucursal para consultar disponibilidad.", "warning");
            return;
        }

        if (!dateInput.value) {
            setFeedback(feedback, "Selecciona una fecha para consultar disponibilidad.", "warning");
            return;
        }

        timeslots.innerHTML = "";
        setFeedback(feedback, "Buscando horas disponibles...", "info");

        try {
            const params = new URLSearchParams({
                id_profesional: card.dataset.professionalId,
                id_lugar_atencion: locationSelect.value,
                fecha: dateInput.value,
            });
            const response = await fetchJson(apiBase + "/horas?" + params.toString());
            renderTimeslots(card, response.horarios || [], response.text_fecha || "");
        } catch (error) {
            setFeedback(feedback, error.message, "danger");
        }
    }

    function renderTimeslots(card, slots, label) {
        const feedback = card.querySelector("[data-role='hours-feedback']");
        const timeslots = card.querySelector("[data-role='timeslots']");

        timeslots.innerHTML = "";

        if (!slots.length) {
            setFeedback(feedback, "No hay bloques disponibles para la fecha seleccionada.", "warning");
            return;
        }

        setFeedback(feedback, "Disponibilidad para " + label + ".", "success");

        slots.forEach(function (slot) {
            const button = document.createElement("button");
            button.type = "button";
            button.className = "timeslot-btn";
            button.dataset.action = "select-slot";
            button.dataset.professionalId = card.dataset.professionalId;
            button.dataset.professionalName = card.dataset.professionalName;
            button.dataset.locationId = card.querySelector("[data-role='location-select']").value;
            button.dataset.locationName = card.querySelector("[data-role='location-select'] option:checked").textContent;
            button.dataset.date = slot.fecha;
            button.dataset.time = slot.hora;
            button.textContent = slot.hora;
            timeslots.appendChild(button);
        });
    }

    function handleSelectSlot(button) {
        document.querySelectorAll(".timeslot-btn.is-selected").forEach(function (item) {
            item.classList.remove("is-selected");
        });
        button.classList.add("is-selected");

        state.selectedReservation = {
            professionalId: button.dataset.professionalId,
            professionalName: button.dataset.professionalName,
            locationId: button.dataset.locationId,
            locationName: button.dataset.locationName,
            date: button.dataset.date,
            time: button.dataset.time,
        };

        el.hiddenProfessional.value = state.selectedReservation.professionalId;
        el.hiddenLocation.value = state.selectedReservation.locationId;
        el.hiddenDate.value = state.selectedReservation.date;
        el.hiddenTime.value = state.selectedReservation.time;
        el.bookingSection.classList.remove("d-none");
        renderSelectedReservation();
        el.bookingSection.scrollIntoView({ behavior: "smooth", block: "start" });
    }

    function renderSelectedReservation() {
        if (!state.selectedReservation) {
            el.selectedSummary.innerHTML = [
                "<p class='summary-eyebrow'>Reserva seleccionada</p>",
                "<h2>Aún no has elegido una hora</h2>",
                "<p>Primero filtra, luego selecciona un profesional, una sucursal y un bloque disponible.</p>",
            ].join("");
            return;
        }

        el.selectedSummary.innerHTML = [
            "<p class='summary-eyebrow'>Reserva seleccionada</p>",
            "<h2>Bloque listo para confirmar</h2>",
            "<div class='reservation-selection-grid'>",
            "  <div><span>Profesional</span><strong>" + escapeHtml(state.selectedReservation.professionalName) + "</strong></div>",
            "  <div><span>Sucursal</span><strong>" + escapeHtml(state.selectedReservation.locationName) + "</strong></div>",
            "  <div><span>Fecha</span><strong>" + escapeHtml(formatDate(state.selectedReservation.date)) + "</strong></div>",
            "  <div><span>Hora</span><strong>" + escapeHtml(state.selectedReservation.time) + "</strong></div>",
            "</div>",
        ].join("");
    }

    async function onBookingSubmit(event) {
        event.preventDefault();

        if (!state.selectedReservation) {
            setFeedback(el.bookingFeedback, "Selecciona una hora antes de confirmar la reserva.", "warning");
            return;
        }

        clearFeedback(el.bookingFeedback);
        el.bookingSubmit.disabled = true;
        setFeedback(el.bookingFeedback, "Confirmando reserva...", "info");

        try {
            const payload = Object.fromEntries(new FormData(el.bookingForm).entries());
            const response = await fetchJson(apiBase + "/agendar", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                },
                body: JSON.stringify(payload),
            });

            el.bookingForm.reset();
            fillSelect(el.species, state.especies, "Selecciona una opción");
            resetResponsibleState({ preserveRut: false, preserveFeedback: false, clearFields: true });
            state.selectedReservation = null;
            renderSelectedReservation();
            el.bookingSection.classList.add("d-none");
            document.querySelectorAll(".timeslot-btn.is-selected").forEach(function (item) {
                item.classList.remove("is-selected");
            });

            setFeedback(
                el.searchFeedback,
                "Reserva confirmada para " + response.registro.fecha + " a las " + response.registro.hora + ". Se envió un correo de confirmación al responsable.",
                "success"
            );
            clearFeedback(el.bookingFeedback);
            window.scrollTo({ top: 0, behavior: "smooth" });
        } catch (error) {
            setFeedback(el.bookingFeedback, error.message, "danger");
        } finally {
            el.bookingSubmit.disabled = false;
        }
    }

    function onResponsibleRutInput() {
        const lookupKey = normalizeRutLookup(el.responsibleRut.value);
        if (state.responsibleLookupKey && lookupKey !== state.responsibleLookupKey) {
            resetResponsibleState({ preserveRut: true, preserveFeedback: false, clearFields: true });
        }
    }

    async function onResponsibleRutLookup() {
        const rut = el.responsibleRut.value.trim();
        const lookupKey = normalizeRutLookup(rut);

        if (!lookupKey) {
            resetResponsibleState({ preserveRut: true, preserveFeedback: false, clearFields: false });
            return;
        }

        if (lookupKey === state.responsibleLookupKey && state.responsibleFound) {
            return;
        }

        setResponsibleLookupFeedback("Buscando responsable por RUT...", "info");

        try {
            const response = await fetchJson(apiBase + "/responsable?rut=" + encodeURIComponent(rut));
            applyResponsibleLookup(response);
        } catch (error) {
            resetResponsibleState({ preserveRut: true, preserveFeedback: true, clearFields: false });
            setResponsibleLookupFeedback(error.message, "danger");
        }
    }

    function applyResponsibleLookup(response) {
        state.responsibleLookupKey = normalizeRutLookup(el.responsibleRut.value);
        state.responsibleFound = Boolean(response.encontrado);
        state.mascotasRegistradas = response.mascotas || [];

        if (!response.encontrado || !response.responsable) {
            el.responsibleId.value = "";
            setPetManualMode();
            clearPetSelection();
            setResponsibleLookupFeedback("Responsable no registrado. Completa los datos manualmente.", "warning");
            return;
        }

        el.responsibleId.value = response.responsable.id || "";
        el.responsibleRut.value = response.responsable.rut || el.responsibleRut.value;
        el.responsibleNames.value = response.responsable.nombres || "";
        el.responsibleLastNameOne.value = response.responsable.apellido_uno || "";
        el.responsibleLastNameTwo.value = response.responsable.apellido_dos || "";
        el.responsibleEmail.value = response.responsable.email || "";
        el.responsiblePhone.value = response.responsable.telefono || "";

        if (state.mascotasRegistradas.length) {
            setPetSelectMode(state.mascotasRegistradas);
            setResponsibleLookupFeedback("Responsable encontrado. Selecciona una de sus mascotas registradas.", "success");
        } else {
            setPetManualMode();
            clearPetSelection();
            setResponsibleLookupFeedback("Responsable encontrado, pero no tiene mascotas activas registradas. Ingresa la mascota manualmente.", "info");
        }
    }

    function onPetSelectionChange() {
        const selectedId = el.petNameSelect.value;
        const mascota = state.mascotasRegistradas.find(function (item) {
            return String(item.id) === String(selectedId);
        });

        if (!mascota) {
            el.species.value = "";
            return;
        }

        el.species.value = mascota.especie_id ? String(mascota.especie_id) : "";
    }

    function setPetSelectMode(mascotas) {
        el.petManualGroup.classList.add("d-none");
        el.petSelectGroup.classList.remove("d-none");
        el.petManualHelperRow.classList.add("d-none");
        el.petNameInput.value = "";
        el.petNameInput.required = false;
        el.petNameSelect.disabled = false;
        el.petNameSelect.required = true;
        el.petNameSelect.innerHTML = buildPetOptions(mascotas);
        el.species.value = "";
    }

    function setPetManualMode() {
        el.petManualGroup.classList.remove("d-none");
        el.petSelectGroup.classList.add("d-none");
        el.petManualHelperRow.classList.toggle("d-none", !state.responsibleFound);
        el.petNameInput.required = true;
        el.petNameSelect.required = false;
        el.petNameSelect.disabled = true;
        el.petNameSelect.innerHTML = "<option value=''>Selecciona una mascota</option>";
        el.species.value = "";
    }

    function clearPetSelection() {
        state.mascotasRegistradas = [];
        el.petNameInput.value = "";
        el.petNameSelect.innerHTML = "<option value=''>Selecciona una mascota</option>";
        el.petNameSelect.disabled = true;
        el.species.value = "";
    }

    function resetResponsibleState(options) {
        const settings = Object.assign({
            preserveRut: true,
            preserveFeedback: false,
            clearFields: true,
        }, options || {});

        state.responsibleLookupKey = "";
        state.responsibleFound = false;
        el.responsibleId.value = "";
        clearPetSelection();
        setPetManualMode();

        if (settings.clearFields) {
            el.responsibleNames.value = "";
            el.responsibleLastNameOne.value = "";
            el.responsibleLastNameTwo.value = "";
            el.responsibleEmail.value = "";
            el.responsiblePhone.value = "";
        }

        if (!settings.preserveRut) {
            el.responsibleRut.value = "";
        }

        if (!settings.preserveFeedback) {
            setResponsibleLookupFeedback("", "");
        }
    }

    function buildPetOptions(mascotas) {
        const options = ["<option value=''>Selecciona una mascota</option>"];
        mascotas.forEach(function (mascota) {
            const speciesName = mascota.especie_nombre ? " · " + mascota.especie_nombre : "";
            options.push(
                "<option value='" + escapeHtml(String(mascota.id)) + "'>" +
                    escapeHtml(mascota.nombre + speciesName) +
                "</option>"
            );
        });
        return options.join("");
    }

    function setResponsibleLookupFeedback(message, type) {
        el.responsibleLookupFeedback.textContent = message || "";
        el.responsibleLookupFeedback.className = "form-text";

        if (!message || !type) {
            return;
        }

        if (type === "danger") {
            el.responsibleLookupFeedback.classList.add("text-danger");
            return;
        }

        if (type === "warning") {
            el.responsibleLookupFeedback.classList.add("text-warning");
            return;
        }

        if (type === "success") {
            el.responsibleLookupFeedback.classList.add("text-success");
            return;
        }

        el.responsibleLookupFeedback.classList.add("text-muted");
    }

    function normalizeRutLookup(value) {
        return String(value || "")
            .replace(/[^0-9kK]/g, "")
            .toUpperCase();
    }

    async function fetchJson(url, options) {
        const response = await fetch(url, options || {});
        const data = await response.json().catch(function () {
            return { msj: "No fue posible interpretar la respuesta del servidor." };
        });

        if (!response.ok || data.estado === 0) {
            throw new Error(data.msj || "Ocurrió un error al procesar la solicitud.");
        }

        return data;
    }

    function fillSelect(select, items, placeholder) {
        const currentValue = select.value;
        const options = ["<option value=''>" + escapeHtml(placeholder) + "</option>"];
        items.forEach(function (item) {
            options.push("<option value='" + escapeHtml(String(item.id)) + "'>" + escapeHtml(item.nombre) + "</option>");
        });
        select.innerHTML = options.join("");

        if (currentValue && items.some(function (item) { return String(item.id) === currentValue; })) {
            select.value = currentValue;
        }
    }

    function resetSelect(select, placeholder) {
        select.innerHTML = "<option value=''>" + escapeHtml(placeholder) + "</option>";
    }

    function renderLocationOptions(locations) {
        const options = ["<option value=''>Selecciona una sucursal</option>"];
        locations.forEach(function (location) {
            options.push(
                "<option value='" + escapeHtml(String(location.id)) + "'>" +
                    escapeHtml(location.nombre + (location.ciudad ? " · " + location.ciudad : "")) +
                "</option>"
            );
        });
        return options.join("");
    }

    function setFeedback(container, message, type) {
        container.innerHTML = "<div class='alert alert-" + type + "' role='alert'>" + escapeHtml(message) + "</div>";
    }

    function clearFeedback(container) {
        container.innerHTML = "";
    }

    function formatDate(value) {
        const [year, month, day] = value.split("-");
        return [day, month, year].join("-");
    }

    function today() {
        return new Date().toISOString().split("T")[0];
    }

    function renderMetaLine(value) {
        return value ? escapeHtml(value) + "<br>" : "";
    }

    function escapeHtml(value) {
        return String(value || "")
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }
})();
