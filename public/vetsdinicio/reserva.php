<!DOCTYPE html>
<html lang="es">

<?php
$titulo = 'Reserva VET SDI';
$extra_css = ['assets/css/reserva-publica.css'];
require_once('include/head.php');
?>

<body class="reserva-page">

<?php require_once('include/header-dos.php'); ?>

<main class="reserva-wrapper">
    <section class="reserva-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <span class="reserva-badge">Reserva externa VET SDI</span>
                    <h1>Agenda una atención veterinaria sin iniciar sesión</h1>
                    <p>Busca profesionales y servicios por ubicación, revisa disponibilidad en tiempo real y confirma la reserva con los datos del responsable y de la mascota.</p>
                </div>
                <div class="col-lg-5">
                    <div class="reserva-summary-card" id="selected-summary">
                        <p class="summary-eyebrow">Reserva seleccionada</p>
                        <h2>Aún no has elegido una hora</h2>
                        <p>Primero filtra, luego selecciona un profesional, una sucursal y un bloque disponible.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container reserva-main">
        <div class="reserva-section-card">
            <div class="section-heading">
                <div>
                    <span class="section-step">Paso 1</span>
                    <h3>Busca disponibilidad</h3>
                </div>
                <p>Filtra por zona y servicio. Si quieres, también puedes buscar por nombre del profesional.</p>
            </div>

            <form id="reservation-search-form">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="filter-region">Región</label>
                        <select class="form-control rounded-xl" id="filter-region" name="id_region">
                            <option value="">Todas</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="filter-city">Ciudad</label>
                        <select class="form-control rounded-xl" id="filter-city" name="id_ciudad" disabled>
                            <option value="">Todas</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="filter-specialty">Área veterinaria</label>
                        <select class="form-control rounded-xl" id="filter-specialty" name="veterinaria_area">
                            <option value="">Todas</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="filter-type" id="filter-type-label">Servicio</label>
                        <select class="form-control rounded-xl" id="filter-type" name="veterinaria_item" disabled>
                            <option value="">Todos</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="filter-query">Profesional</label>
                        <input class="form-control rounded-xl" id="filter-query" name="q" type="text" placeholder="Nombre o apellido">
                    </div>
                    <div class="form-group col-md-4 d-flex align-items-end">
                        <button class="btn btn-azul btn-block rounded-xl reservation-action" type="submit">Buscar horarios disponibles</button>
                    </div>
                </div>
            </form>

            <div class="reservation-feedback" id="search-feedback"></div>
            <div class="reservation-results" id="search-results"></div>
        </div>

        <div class="reserva-section-card d-none" id="reservation-form-section">
            <div class="section-heading">
                <div>
                    <span class="section-step">Paso 2</span>
                    <h3>Confirma los datos de la reserva</h3>
                </div>
                <p>El correo de confirmación se enviará al responsable de la mascota.</p>
            </div>

            <form id="reservation-booking-form">
                <input type="hidden" id="responsable-id" name="responsable_id">
                <input type="hidden" id="booking-professional-id" name="id_profesional">
                <input type="hidden" id="booking-location-id" name="id_lugar_atencion">
                <input type="hidden" id="booking-date" name="fecha">
                <input type="hidden" id="booking-time" name="hora">

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="responsable-rut">RUT del responsable</label>
                        <input class="form-control rounded-xl" id="responsable-rut" name="responsable_rut" type="text" required>
                        <small class="form-text text-muted" id="responsable-lookup-feedback"></small>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="responsable-nombres">Nombres del responsable</label>
                        <input class="form-control rounded-xl" id="responsable-nombres" name="responsable_nombres" type="text" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="responsable-apellido-uno">Primer apellido</label>
                        <input class="form-control rounded-xl" id="responsable-apellido-uno" name="responsable_apellido_uno" type="text" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="responsable-apellido-dos">Segundo apellido</label>
                        <input class="form-control rounded-xl" id="responsable-apellido-dos" name="responsable_apellido_dos" type="text">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="responsable-email">Correo electrónico</label>
                        <input class="form-control rounded-xl" id="responsable-email" name="responsable_email" type="email" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="responsable-telefono">Teléfono</label>
                        <input class="form-control rounded-xl" id="responsable-telefono" name="responsable_telefono" type="text" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6" id="mascota-nombre-manual-group">
                        <label for="mascota-nombre-input">Nombre de la mascota</label>
                        <input class="form-control rounded-xl" id="mascota-nombre-input" name="mascota_nombre" type="text" required>
                    </div>
                    <div class="form-group col-md-6 d-none" id="mascota-nombre-select-group">
                        <label for="mascota-nombre-select">Nombre de la mascota</label>
                        <select class="form-control rounded-xl" id="mascota-nombre-select" name="mascota_id" disabled>
                            <option value="">Selecciona una mascota</option>
                        </select>
                        <small class="form-text text-muted">Se muestran las mascotas asociadas al responsable.</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="mascota-especie">Tipo de mascota</label>
                        <select class="form-control rounded-xl" id="mascota-especie" name="mascota_especie_id" required>
                            <option value="">Selecciona una opción</option>
                        </select>
                    </div>
                </div>

                <div class="form-row d-none" id="mascota-manual-helper-row">
                    <div class="form-group col-md-12">
                        <small class="form-text text-muted">Si el responsable no tiene mascotas registradas, ingresa la mascota manualmente.</small>
                    </div>
                </div>

                <div class="form-group">
                    <label for="booking-comments">Información adicional</label>
                    <textarea class="form-control rounded-xl" id="booking-comments" name="comentarios" rows="4" placeholder="Ejemplo: motivo de consulta, antecedentes breves o instrucciones relevantes."></textarea>
                </div>

                <div class="reservation-feedback" id="booking-feedback"></div>

                <div class="form-row align-items-center">
                    <div class="col-lg-8">
                        <p class="reservation-note mb-0">Al confirmar, se genera la reserva y se envía un correo con la fecha, hora, profesional y lugar de atención.</p>
                    </div>
                    <div class="col-lg-4 mt-3 mt-lg-0">
                        <button class="btn btn-purple btn-block rounded-xl reservation-action" id="booking-submit" type="submit">Confirmar reserva</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>

<footer>
    <?php require_once('include/footer_es.php'); ?>
</footer>

<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/aos.js"></script>
<script src="assets/js/reserva-publica.js"></script>
<script>
    AOS.init();
</script>
</body>
</html>
