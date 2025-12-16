{{-- @extends('template.otros_profesionales.template_fono') --}}
@extends('template.laboratorio.laboratorio_profesional.template')

@section('page-style')
    <style type="text/css">
        .ng_esp {
            /* Common */
            font : 14px 'Wingdings 3';
            color : #0000ff;
            width: 60px; background-color: #f6faf9; color: #FF0000;text-align:center; font-weight: bold; font-size: x-large;
            background-color: #f6faf9;
            text-align:center;
            font-weight: bold;
            display: block;
            width: 100%;
            padding: 0.4rem 0.5rem 0.3rem 0.5rem!important;
            font-size: 1.0rem;
            font-weight: 400;
            line-height: 1.5;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 3px;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        @font-face {
            font-family: 'Wingdings 3';
        }

        /* === ESTILOS PARA ESTRELLAS DE CALIFICACIÓN === */
        .rating-display {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .rating-stars {
            display: inline-flex;
            gap: 2px;
            font-size: 20px;
        }

        .rating-stars i {
            color: #ffc107; /* Amarillo/dorado */
        }

        .rating-stars .star-empty {
            color: #e0e0e0; /* Gris claro */
        }

        .rating-text {
            font-size: 13px;
            color: #6c757d;
            margin-left: 8px;
        }

        .rating-value {
            font-weight: 600;
            color: #495057;
        }

        /* Colores según nivel de satisfacción */
        .rating-5 { color: #28a745 !important; } /* Verde */
        .rating-4 { color: #5cb85c !important; } /* Verde claro */
        .rating-3 { color: #ffc107 !important; } /* Amarillo */
        .rating-2 { color: #ff9800 !important; } /* Naranja */
        .rating-1 { color: #dc3545 !important; } /* Rojo */
        .rating-0 { color: #e0e0e0 !important; } /* Gris - Sin calificar */

        /* Estilos para tabs deshabilitados */
        .nav-link.disabled {
            pointer-events: none !important;
            opacity: 0.5 !important;
            color: #6c757d !important;
            cursor: not-allowed !important;
            transition: all 0.3s ease;
        }

        .nav-link.disabled:hover {
            color: #6c757d !important;
            background-color: transparent !important;
        }

        /* Indicador visual adicional para tabs deshabilitados */
        .nav-link.disabled::after {
            content: " 🔒";
            font-size: 0.8em;
            opacity: 0.7;
        }

        /* Estilos para tarjetas de productos */
        .hover-shadow {
            transition: all 0.3s ease;
        }

        .hover-shadow:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.2) !important;
        }

        /* Cursor pointer para elementos clickeables */
        .cursor-pointer {
            cursor: pointer !important;
        }

        /* Estilos para modal de archivos */
        .archivo-item {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
            background: #f8f9fa;
            transition: all 0.3s ease;
        }

        .archivo-item:hover {
            background: #e8f4fd;
            border-color: #007bff;
            transform: translateY(-2px);
            box-shadow: 0 2px 8px rgba(0,123,255,0.15);
        }

        .archivo-nombre {
            font-weight: 600;
            color: #495057;
            margin-bottom: 5px;
        }

        .archivo-url {
            font-size: 0.85em;
            color: #6c757d;
            word-break: break-all;
        }

        .producto-card {
            border: 1px solid #e0e0e0;
            transition: all 0.3s ease;
        }

        .producto-card:hover {
            border-color: #007bff;
        }

        .producto-imagen {
            max-height: 150px;
            object-fit: contain;
            width: 100%;
        }

        .badge-stock-bajo {
            background-color: #dc3545;
            color: white;
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 0.75rem;
        }

        .badge-stock-ok {
            background-color: #28a745;
            color: white;
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 0.75rem;
        }

        /* Estilos para el modal del carrito */
        .swal-wide {
            width: 80% !important;
            max-width: 900px !important;
        }

        .swal-modal {
            border-radius: 10px !important;
        }

        .carrito-header {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #28a745;
        }

        .carrito-header i {
            font-size: 2.5rem;
            color: #28a745;
            margin-bottom: 10px;
        }

        .carrito-tabla {
            width: 100%;
            margin-top: 15px;
        }

        .carrito-total {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-top: 15px;
            font-size: 1.2rem;
        }

        /* Estilos para botón del carrito en header */
        #btn-abrir-carrito {
            position: relative;
            transition: all 0.3s ease;
        }

        #btn-abrir-carrito:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(40, 167, 69, 0.3);
        }

        #badge-carrito-header {
            font-size: 0.75rem;
            padding: 3px 6px;
            border-radius: 10px;
            background-color: #dc3545 !important;
            color: white !important;
            font-weight: bold;
        }

        #total-carrito-header {
            color: #28a745;
            font-weight: bold;
            font-size: 0.85rem;
        }

        /* Animación para badge cuando se actualiza */
        @keyframes badgePulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }

        .badge-animated {
            animation: badgePulse 0.5s ease;
        }

        /* === ESTILOS PARA FORMULARIO AUDÍFONO EXTERNO === */
        .card.border-info {
            border-width: 2px;
            border-color: #17a2b8 !important;
        }

        .card-header.bg-info {
            background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
        }

        #div_otro_proveedor .form-control:focus {
            border-color: #17a2b8;
            box-shadow: 0 0 0 0.2rem rgba(23, 162, 184, 0.25);
        }

        #div_otro_proveedor .form-group label span.text-danger {
            font-weight: bold;
        }

        #div_otro_proveedor hr {
            border-top: 2px solid #e9ecef;
            margin-top: 0.5rem;
            margin-bottom: 1rem;
        }

        #div_otro_proveedor .alert-info {
            background-color: #d1ecf1;
            border-color: #bee5eb;
            color: #0c5460;
        }

        /* Animación para mostrar formulario */
        #div_otro_proveedor {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* === ESTILOS PARA CARDS DE AUDÍFONOS PROPIOS === */
        #lista_audifonos_control .card-audifono {
            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            transition: all 0.3s ease;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        #lista_audifonos_control .card-audifono:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
            border-color: #c0c0c0;
        }

        /* Contenedor de imagen */
        #lista_audifonos_control .imagen-container {
            position: relative;
            background: #f8f9fa;
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid #e0e0e0;
        }

        #lista_audifonos_control .card-audifono .card-img-top {
            width: 100%;
            height: 180px;
            object-fit: contain;
            mix-blend-mode: multiply;
        }

        /* Badge de stock */
        #lista_audifonos_control .card-audifono .badge-stock {
            position: absolute;
            top: 12px;
            right: 12px;
            background: rgba(255, 255, 255, 0.98);
            color: #333;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.75rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            border: 1px solid #e0e0e0;
        }

        #lista_audifonos_control .card-audifono .badge-stock.stock-bajo {
            background: #ff4d4d;
            color: white;
            border-color: #ff4d4d;
        }

        #lista_audifonos_control .card-audifono .badge-stock.stock-medio {
            background: #ffc107;
            color: #333;
            border-color: #ffc107;
        }

        #lista_audifonos_control .card-audifono .badge-stock.stock-alto {
            background: #28a745;
            color: white;
            border-color: #28a745;
        }

        /* Cuerpo de la card */
        #lista_audifonos_control .card-body-audifono {
            padding: 15px;
            box-sizing: border-box;
        }

        /* Header del producto */
        #lista_audifonos_control .producto-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 12px;
            border-bottom: 2px solid #f0f0f0;
        }

        #lista_audifonos_control .producto-header .icon-producto {
            font-size: 1.5rem;
            color: #5a67d8;
            margin-right: 10px;
        }

        #lista_audifonos_control .producto-nombre {
            margin: 0;
            font-size: 1rem;
            font-weight: 600;
            color: #2d3748;
            line-height: 1.4;
        }

        /* Información del producto */
        #lista_audifonos_control .producto-info {
            margin-bottom: 15px;
        }

        #lista_audifonos_control .info-row {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
            font-size: 0.85rem;
            color: #4a5568;
        }

        #lista_audifonos_control .info-row i {
            font-size: 0.9rem;
            margin-right: 8px;
            color: #718096;
            min-width: 16px;
        }

        #lista_audifonos_control .info-row strong {
            color: #2d3748;
            font-weight: 600;
        }

        /* Precio */
        #lista_audifonos_control .producto-precio {
            text-align: center;
            font-size: 1.1rem;
            font-weight: 700;
            color: #2d3748;
            padding: 10px;
            background: #f7fafc;
            border-radius: 8px;
            margin-bottom: 15px;
            border: 1px solid #e2e8f0;
        }

        /* Botones de acción */
        #lista_audifonos_control .botones-accion {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-top: 10px;
        }

        /* Estilos base para botones */
        #lista_audifonos_control .card-audifono .botones-accion button.btn-accion {
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
            justify-content: center !important;
            padding: 14px 10px !important;
            border: none !important;
            border-radius: 8px !important;
            font-size: 0.8rem !important;
            font-weight: 600 !important;
            transition: all 0.3s ease !important;
            cursor: pointer !important;
            text-align: center !important;
            box-shadow: 0 2px 6px rgba(0,0,0,0.12) !important;
            line-height: 1.2 !important;
            text-decoration: none !important;
            width: 100%;
        }

        #lista_audifonos_control .card-audifono .botones-accion button.btn-accion:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2) !important;
            text-decoration: none !important;
        }

        #lista_audifonos_control .card-audifono .botones-accion button.btn-accion:active {
            transform: translateY(0) !important;
        }

        #lista_audifonos_control .card-audifono .botones-accion button.btn-accion:focus {
            outline: none !important;
            box-shadow: 0 0 0 3px rgba(90, 103, 216, 0.3) !important;
        }

        #lista_audifonos_control .card-audifono .botones-accion button.btn-accion i {
            font-size: 1.6rem !important;
            margin-bottom: 5px !important;
            display: block !important;
        }

        #lista_audifonos_control .card-audifono .botones-accion button.btn-accion span {
            display: block !important;
            line-height: 1.3 !important;
            font-size: 0.8rem !important;
        }

        /* Botón Calibración - Especificidad máxima */
        #lista_audifonos_control .card-audifono .botones-accion button.btn-accion.btn-calibracion {
            background: #5a67d8 !important;
            background-color: #5a67d8 !important;
            color: white !important;
            border-color: #5a67d8 !important;
        }

        #lista_audifonos_control .card-audifono .botones-accion button.btn-accion.btn-calibracion:hover {
            background: #4c51bf !important;
            background-color: #4c51bf !important;
            color: white !important;
            border-color: #4c51bf !important;
        }

        #lista_audifonos_control .card-audifono .botones-accion button.btn-accion.btn-calibracion:focus,
        #lista_audifonos_control .card-audifono .botones-accion button.btn-accion.btn-calibracion:active {
            background: #4c51bf !important;
            background-color: #4c51bf !important;
            color: white !important;
            border-color: #4c51bf !important;
        }

        /* Botón Reparación - Especificidad máxima */
        #lista_audifonos_control .card-audifono .botones-accion button.btn-accion.btn-reparacion {
            background: #ed8936 !important;
            background-color: #ed8936 !important;
            color: white !important;
            border-color: #ed8936 !important;
        }

        #lista_audifonos_control .card-audifono .botones-accion button.btn-accion.btn-reparacion:hover {
            background: #dd6b20 !important;
            background-color: #dd6b20 !important;
            color: white !important;
            border-color: #dd6b20 !important;
        }

        #lista_audifonos_control .card-audifono .botones-accion button.btn-accion.btn-reparacion:focus,
        #lista_audifonos_control .card-audifono .botones-accion button.btn-accion.btn-reparacion:active {
            background: #dd6b20 !important;
            background-color: #dd6b20 !important;
            color: white !important;
            border-color: #dd6b20 !important;
        }

        /* Animación de carga para lista de audífonos */
        #lista_audifonos_control .loading-message {
            text-align: center;
            padding: 40px 20px;
            color: #6c757d;
        }

        #lista_audifonos_control .loading-message i {
            font-size: 3rem;
            color: #667eea;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        #lista_audifonos_control .empty-message {
            text-align: center;
            padding: 60px 20px;
            color: #6c757d;
        }

        #lista_audifonos_control .empty-message i {
            font-size: 4rem;
            color: #dee2e6;
            margin-bottom: 15px;
        }

        .badge-prestado {
            background: #f6ad55;
            color: #fff;
            font-weight: bold;
            padding: 6px 12px;
            border-radius: 8px;
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 10;
        }
    </style>
@endsection

@section('content')
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center pb-2 mt-4">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                            <div class="page-header-title">
                            <h5 class="text-white d-inline f-16 mt-1"><strong>ATENCIÓN: </strong> <br>LABORATORIO OTORRINOLARINGOLOGÍA</h5>
                                <p class="font-weight-bold mt-0 mb-0 text-white float-md-right">
                                    @php
                                        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                        $fecha = \Carbon\Carbon::parse(now());
                                        $mes = $meses[($fecha->format('n')) - 1];
                                        $fecha = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');
                                    @endphp
                                    {{ $fecha }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <!-- TAB ATENCIÓN -->
            <div class="user-profile user-card pt-0">
                <div class="card-body py-0">
                    <div class="user-about-block m-0">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs profile-tabs nav-fill mt-2" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link text-reset active" id="ficha_atenc_gral-tab" data-toggle="tab" href="#ficha_atenc_gral" role="tab" aria-controls="ficha_atenc_gral" aria-selected="true">Atención General</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="audicion-tab" data-toggle="tab" href="#audicion" role="tab" aria-controls="audicion" aria-selected="false">Audición</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="equilibrio-tab" data-toggle="tab" href="#equilibrio" role="tab" aria-controls="equilibrio" aria-selected="false">Equilibrio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="audif-tab" data-toggle="tab" href="#audif" role="tab"  aria-controls="audif" aria-selected="false">Audífonos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="aten-previas-tab" data-toggle="tab" href="#aten-previas" role="tab" aria-controls="aten-previas" onclick="dame_atenciones_previas_lab()" aria-selected="false">Historial de visitas</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- tab general-->
            <!--Contenido de tab-->
                    <!--SECCION INFO PACIENTE / DERIVADO POR -->
                    <div class="row">
                        <!--<div class="col-sm-12 col-md-12 col-lg-12 col-xl-3 col-xxl-3 mt-3">
                            <div class="card-a">
                                <div class="card-header-a" id="sec_derivado_por">
                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#sec_derivado_por_c" aria-expanded="false" aria-controls="sec_derivado_por_c">
                                       Paciente y Derivación
                                    </button>
                                </div>
                                <div id="sec_derivado_por_c" class="collapse show" aria-labelledby="sec_derivado_por" data-parent="#sec_derivado_por">
                                    <div class="card-body-aten-a">
                                        <div class="form-row" >
                                            <div class="form-group col-12">
                                                <label class="floating-label-activo-sm">Fecha de examen</label>
                                                <input type="date" class="form-control form-control-sm" name="fecha_ex" id="fecha_ex" value="{{ date('Y-m-d') }}" readonly>
                                            </div>
                                            <div class="form-group col-12">
                                                <label class="floating-label-activo-sm">Examinador</label>
                                                <input type="text" class="form-control form-control-sm" name="profesional" id="profesional" value="Dr. {{ $profesional->apellido_uno }}" readonly>
                                            </div>
                                            <div class="form-group col-12">
                                                {{-- <label class="floating-label-activo-sm">Derivado por:</label> --}}
                                                {{-- <input type="text" class="form-control form-control-sm" name="derivado_por" id="derivado_por" value=""> --}}
                                                <div class="row">
                                                    <div class="form-group col-sm-12">
                                                        <input type="hidden" name="solicitado_id_profesional" id="solicitado_id_profesional" value="">
                                                        <label class="floating-label-activo-sm ml-3">Derivado por RUT</label>
                                                        <input type="text" class="form-control form-control-sm" name="derivado_por_rut" id="derivado_por_rut" value=""
                                                            onblur="cargar_profesional(this,'derivado_por', 'solicitado_id_profesional', 'div_profesional_no_inscrito');"
                                                            onkeyup="cargar_profesional(this,'derivado_por', 'solicitado_id_profesional', 'div_profesional_no_inscrito');"
                                                            oninput="formatoRut(this);"
                                                        >

                                                    </div>
                                                    <div class="form-group col-12">
                                                        <label class="floating-label-activo-sm ml-3">Nombre</label>
                                                        <input type="text" class="form-control form-control-sm" name="derivado_por" id="derivado_por" value="">
                                                    </div>
                                                    <div class="form-group col-12" id="div_mensaje"  style="display: none;">
                                                        <span style="font-size: 10px;color: #ff0808;" id="mensaje_solicitado_por"></span>
                                                    </div>
                                                </div>
                                                <div class="row mt-3" id="div_profesional_no_inscrito" style="display: none;">

                                                    <div class="form-group col-12">
                                                        <label class="floating-label-activo-sm">Nombre</label>
                                                        <input type="text" class="form-control form-control-sm"  name="solicitado_nombre" id="solicitado_nombre" onchange="actualizar_solicitado_por('derivado_por', 'solicitado_nombre', 'solicitado_apellido');">
                                                    </div>
                                                    <div class="form-group col-12">
                                                        <label class="floating-label-activo-sm">Apellido</label>
                                                        <input type="text" class="form-control form-control-sm"  name="solicitado_apellido" id="solicitado_apellido" onchange="actualizar_solicitado_por('derivado_por', 'solicitado_nombre', 'solicitado_apellido');">
                                                    </div>
                                                    <div class="form-group col-12">
                                                        <label class="floating-label-activo-sm">Telefono</label>
                                                        <input type="text" class="form-control form-control-sm"  name="solicitado_telefono" id="solicitado_telefono" >
                                                    </div>
                                                    <div class="form-group col-12">
                                                        <label class="floating-label-activo-sm">Email</label>
                                                        <input type="text" class="form-control form-control-sm"  name="solicitado_email" id="solicitado_email" >
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group col-12">
                                                <label class="floating-label-activo-sm">Nombre paciente</label>
                                                <input type="text" class="form-control form-control-sm" name="nombre_pcte" id="nombre_pcte" value="{{ $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos }}">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-4">
                                                <label class="floating-label-activo-sm">Edad</label>
                                                <input type="text" class="form-control form-control-sm" name="edad" id="edad" value="{{ \Carbon\Carbon::parse($paciente->fecha_nac)->age }}" readonly>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-8">
                                                <label class="floating-label-activo-sm">Rut</label>
                                                <input type="text" class="form-control form-control-sm" name="rut" id="rut" value="{{ $paciente->rut }}">
                                            </div>
                                            <div class="form-group col-12">
                                                <label class="floating-label-activo-sm">Dirección</label>
                                                <input type="text" class="form-control form-control-sm" name="direccion" id="direccion"
                                                @if (isset($paciente))
                                                    @if ($paciente->Direccion()->first() != null)
                                                        value="{{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}"
                                                    @else
                                                        value="No ha registrado dirección !"
                                                    @endif
                                                @else
                                                    value="No ha registrado dirección !"
                                                @endif
                                                readonly>
                                            </div>
                                            <div class="form-group col-12">
                                                <label class="floating-label-activo-sm">Email</label>
                                                <input type="text" class="form-control form-control-sm" name="email" id="email" value="{{ $paciente->email }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->

                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                            <div class="tab-content" id="at-tecn_orl">
                                {{-- Atención General --}}
                                <div class="tab-pane fade show active" id="ficha_atenc_gral" role="tabpanel" aria-labelledby="ficha_atenc_gral-tab">
                                    <form action="{{ route('ficha.otro.prof.registrar_lab_general') }}" method="POST">
                                        <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
                                        <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
                                        <input type="hidden" name="id_examen" value="{{ $id_ficha_atencion }}" id="id_examen">
                                        <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
                                        <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
                                        <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                                        <input type="hidden" name="listado_archivos" id="listado_archivos" value="">
                                        <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">
                                        @csrf
                                        <div class="row mt-2">
                                            <div class="col-sm-12 col-md-12">
                                                <ul class="nav nav-tabs-secciones mb-3 mt-10" id="orl" role="tablist">
                                                    <li class="nav-item-secciones">
                                                        <a class="nav-secciones active text-uppercase" id="atenc_lavado-tab" data-toggle="tab" href="#atenc_lavado" role="tab" aria-controls="atenc_lavado" aria-selected="true">Lavado de Oídos</a>
                                                    </li>
                                                    <li class="nav-item-secciones">
                                                        <a class="nav-secciones text-uppercase" id="sec_vppb-tab" data-toggle="tab" href="#sec_vppb" onclick="dame_sesiones_vppb()" role="tab" aria-controls="sec_vppb" aria-selected="false">Tratamiento del VPPB</a>
                                                    </li>
                                                    <li class="nav-item-secciones">
                                                        <a class="nav-secciones text-uppercase" id="eval_ter_voz-tab" data-toggle="tab" href="#eval_ter_voz" onclick="dame_sesiones_terapia_voz()" role="tab" aria-controls="eval_ter_voz" aria-selected="false">Evaluación y terapia de la Voz</a>
                                                    </li>
                                                    {{--  <li class="nav-item-secciones">
                                                        <a class="nav-secciones text-uppercase" id="otro1-tab" data-toggle="tab" href="#otro1" role="tab" aria-controls="otro1" aria-selected="false">Otro1</a>
                                                    </li>  --}}
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="tab-content" id="tecn-orl-contenido">
                                            <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                                            <div class="tab-pane fade show active" id="atenc_lavado" role="tabpanel" aria-labelledby="atenc_lavado-tab">
                                                <div class="form-row div_ex_gral_tec_orl">
                                                    <!-- FORMULARIO LAVADO OIDOS-->
                                                    <div class="col-12">
                                                        <h6 class="tit-gen mb-2">Lavado de oídos</h6>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="card-a">
                                                            <div class="card-body pb-0">
                                                                <div class="form-row">
                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <label class="floating-label-activo-sm">Motivo de consulta</label>
                                                                        <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="lavado_ant_especialidad" id="lavado_ant_especialidad" placeholder="Diagnóstico, sintomatología, uso de audífonos, cirugías examen fisico relevante patologías crónicas, etc."></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="form-row">
                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <label class="floating-label-activo-sm">Examen y Observación General Procedimiento</label>
                                                                        <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="lavado_obs_general" id="lavado_obs_general" placeholder="Diagnóstico, sintomatología, uso de audífonos, cirugías examen fisico relevante patologías crónicas, etc."></textarea>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- CARGA DE ARCHIVOS LAVADO DE OIDO-->
                                                    <div class="col-12">
                                                        <h6 class="tit-gen mb-2 mt-4">Carga de archivos lavado de oido</h6>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="card-a">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <!-- Los archivos de lavado ahora se guardan en input_lista_archivo junto con los demás -->
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <!-- [ Main Content ] start -->
                                                                        <div class="dropzone" id="misArchivosLavado" action="{{ route('profesional.archivo.carga') }}">
                                                                        </div>
                                                                        <!-- [ file-upload ] end -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- VPPB -->
                                            <div class="tab-pane fade show" id="sec_vppb" role="tabpanel" aria-labelledby="sec_vppb-tab">
                                                <div class="row div_vppb">
                                                    <div class="col-12">
                                                        <h6 class="tit-gen mb-2">VPPB</h6>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-none">
                                                        <div class="card-a">
                                                            <div class="card-body pb-0">
                                                                <div class="form-row">
                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <label class="floating-label-activo-sm">Tipo de tratamiento</label>
                                                                        <input type="text" class="form-control form-control-sm" name="vppb_tipo_tratamiento" id="vppb_tipo_tratamiento">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <label class="floating-label-activo-sm">Descripción</label>
                                                                        <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="vppb_obs_general" id="vppb_obs_general" placeholder="Diagnóstico, sintomatología, uso de audífonos, cirugías examen fisico relevante patologías crónicas, etc."></textarea>
                                                                    </div>
                                                                </div>
                                                                <button type="button" class="btn btn-primary btn-sm has-ripple" onclick="generar_pdf_vppb()"><i class="fa fa-file-pdf"></i> Generar PDF y enviar informe</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="card-a">
                                                            <div class="card-body">
                                                                <div class="form-row">
                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 fill">
                                                                        <label class="floating-label-activo-sm">Motivo de consulta</label>
                                                                        <textarea class="form-control caja-texto form-control-sm mb-9" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="vppb_ant_especialidad" id="vppb_ant_especialidad" placeholder="Diagnóstico, sintomatología, uso de audífonos, cirugías examen fisico relevante patologías crónicas, etc."></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="form-row">
                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 fill">
                                                                        <label class="floating-label-activo-sm">Examen y observación General de la Voz</label>
                                                                        <textarea class="form-control caja-texto form-control-sm mb-9" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="vppb_obs_general" id="vppb_obs_general" placeholder="Diagnóstico, sintomatología, uso de audífonos, cirugías examen fisico relevante patologías crónicas, etc."></textarea>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="form-row">
                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 fill">
                                                                        <label class="floating-label-activo-sm">Plan de tratamiento</label>
                                                                        <textarea class="form-control caja-texto form-control-sm mb-9" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="vppb_tratamiento" id="vppb_tratamiento" placeholder="Plan de tratamiento"></textarea>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="card-a">
                                                            <div class="card-body">
                                                                <div class="form-row">
                                                                    <div class="form-group col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                                        <label class="floating-label-activo-sm">Sesión N°</label>
                                                                        <input type="number" class="form-control form-control-sm" name="vppb_ses_num" id="vppb_ses_num">
                                                                    </div>
                                                                    <div class="form-group col-sm-10 col-md-10 col-lg-10 col-xl-10 fill">
                                                                        <label class="floating-label-activo-sm">Tipo de terapia </label>
                                                                        <textarea class="form-control caja-texto form-control-sm mb-9" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="vppb_tipo_terapia" id="vppb_tipo_terapia" placeholder="Diagnóstico, sintomatología, uso de audífonos, cirugías examen fisico relevante patologías crónicas, etc."></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 fill">
                                                                        <label class="floating-label-activo-sm">Comentario</label>
                                                                        <textarea class="form-control caja-texto form-control-sm mb-9" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="vppb_comentario" id="vppb_comentario" placeholder="Plan de tratamiento"></textarea>
                                                                    </div>
                                                                </div>
                                                                <button type="button" class="btn btn-success btn-sm has-ripple" onclick="guardar_observaciones_vppb()"><i class="fas fa-save"></i> Guardar</button>
                                                                {{-- <button type="button" class="btn btn-primary btn-sm has-ripple" onclick="generar_pdf_informe('vppb')"><i class="fa fa-file-pdf"></i> Generar PDF de informe a médico tratante</button> --}}
                                                                <div id="informe_vppb" class="mt-4 d-block">
                                                                    <div class="card">
                                                                        <div class="card-header">
                                                                            <h6>Informe para Médico Tratante</h6>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <textarea id="editor_informe_vppb" name="informe_contenido" style="display: none;">                                                                                Escriba aquí el contenido del informe...
                                                                            </textarea><div class="ck ck-reset ck-editor ck-rounded-corners" role="application" dir="ltr" lang="es" aria-labelledby="ck-editor__label_e1e543c92783c57415549cc7923dd44a9"><label class="ck ck-label ck-voice-label" id="ck-editor__label_e1e543c92783c57415549cc7923dd44a9">Rich Text Editor</label><div class="ck ck-editor__top ck-reset_all" role="presentation"><div class="ck ck-sticky-panel"><div class="ck ck-sticky-panel__placeholder" style="display: none;"></div><div class="ck ck-sticky-panel__content"><div class="ck ck-toolbar ck-toolbar_grouping" role="toolbar" aria-label="Editor toolbar" tabindex="-1"><div class="ck ck-toolbar__items"><div class="ck ck-dropdown ck-heading-dropdown"><button class="ck ck-button ck-off ck-button_with-text ck-dropdown__button" type="button" tabindex="-1" aria-label="Heading" data-cke-tooltip-text="Heading" data-cke-tooltip-position="s" aria-haspopup="true" aria-expanded="false"><span class="ck ck-button__label">Paragraph</span><svg class="ck ck-icon ck-reset_all-excluded ck-icon_inherit-color ck-dropdown__arrow" viewBox="0 0 10 10"><path d="M.941 4.523a.75.75 0 1 1 1.06-1.06l3.006 3.005 3.005-3.005a.75.75 0 1 1 1.06 1.06l-3.549 3.55a.75.75 0 0 1-1.168-.136L.941 4.523z"></path></svg></button><div class="ck ck-reset ck-dropdown__panel ck-dropdown__panel_se" tabindex="-1"></div></div><span class="ck ck-toolbar__separator"></span><button class="ck ck-button ck-off" type="button" tabindex="-1" aria-labelledby="ck-editor__aria-label_e5f8ed5ff62a8deab59949178c6ca7cb0" aria-pressed="false" data-cke-tooltip-text="Bold (Ctrl+B)" data-cke-tooltip-position="s"><svg class="ck ck-icon ck-reset_all-excluded ck-icon_inherit-color ck-button__icon" viewBox="0 0 20 20"><path d="M10.187 17H5.773c-.637 0-1.092-.138-1.364-.415-.273-.277-.409-.718-.409-1.323V4.738c0-.617.14-1.062.419-1.332.279-.27.73-.406 1.354-.406h4.68c.69 0 1.288.041 1.793.124.506.083.96.242 1.36.478.341.197.644.447.906.75a3.262 3.262 0 0 1 .808 2.162c0 1.401-.722 2.426-2.167 3.075C15.05 10.175 16 11.315 16 13.01a3.756 3.756 0 0 1-2.296 3.504 6.1 6.1 0 0 1-1.517.377c-.571.073-1.238.11-2 .11zm-.217-6.217H7v4.087h3.069c1.977 0 2.965-.69 2.965-2.072 0-.707-.256-1.22-.768-1.537-.512-.319-1.277-.478-2.296-.478zM7 5.13v3.619h2.606c.729 0 1.292-.067 1.69-.2a1.6 1.6 0 0 0 .91-.765c.165-.267.247-.566.247-.897 0-.707-.26-1.176-.778-1.409-.519-.232-1.31-.348-2.375-.348H7z"></path></svg><span class="ck ck-button__label" id="ck-editor__aria-label_e5f8ed5ff62a8deab59949178c6ca7cb0">Bold</span></button><button class="ck ck-button ck-off" type="button" tabindex="-1" aria-labelledby="ck-editor__aria-label_e47819c337bb2c4935379be09c18de07a" aria-pressed="false" data-cke-tooltip-text="Italic (Ctrl+I)" data-cke-tooltip-position="s"><svg class="ck ck-icon ck-reset_all-excluded ck-icon_inherit-color ck-button__icon" viewBox="0 0 20 20"><path d="m9.586 14.633.021.004c-.036.335.095.655.393.962.082.083.173.15.274.201h1.474a.6.6 0 1 1 0 1.2H5.304a.6.6 0 0 1 0-1.2h1.15c.474-.07.809-.182 1.005-.334.157-.122.291-.32.404-.597l2.416-9.55a1.053 1.053 0 0 0-.281-.823 1.12 1.12 0 0 0-.442-.296H8.15a.6.6 0 0 1 0-1.2h6.443a.6.6 0 1 1 0 1.2h-1.195c-.376.056-.65.155-.823.296-.215.175-.423.439-.623.79l-2.366 9.347z"></path></svg><span class="ck ck-button__label" id="ck-editor__aria-label_e47819c337bb2c4935379be09c18de07a">Italic</span></button><span class="ck ck-toolbar__separator"></span><button class="ck ck-button ck-off" type="button" tabindex="-1" aria-labelledby="ck-editor__aria-label_e2c76074bb063e430462be4d869fec4dc" aria-pressed="false" data-cke-tooltip-text="Numbered List" data-cke-tooltip-position="s"><svg class="ck ck-icon ck-reset_all-excluded ck-icon_inherit-color ck-button__icon" viewBox="0 0 20 20"><path d="M7 5.75c0 .414.336.75.75.75h9.5a.75.75 0 1 0 0-1.5h-9.5a.75.75 0 0 0-.75.75zM3.5 3v5H2V3.7H1v-1h2.5V3zM.343 17.857l2.59-3.257H2.92a.6.6 0 1 0-1.04 0H.302a2 2 0 1 1 3.995 0h-.001c-.048.405-.16.734-.333.988-.175.254-.59.692-1.244 1.312H4.3v1h-4l.043-.043zM7 14.75a.75.75 0 0 1 .75-.75h9.5a.75.75 0 1 1 0 1.5h-9.5a.75.75 0 0 1-.75-.75z"></path></svg><span class="ck ck-button__label" id="ck-editor__aria-label_e2c76074bb063e430462be4d869fec4dc">Numbered List</span></button><button class="ck ck-button ck-off" type="button" tabindex="-1" aria-labelledby="ck-editor__aria-label_e95dba6f2a87ffc0dd2964a9693796352" aria-pressed="false" data-cke-tooltip-text="Bulleted List" data-cke-tooltip-position="s"><svg class="ck ck-icon ck-reset_all-excluded ck-icon_inherit-color ck-button__icon" viewBox="0 0 20 20"><path d="M7 5.75c0 .414.336.75.75.75h9.5a.75.75 0 1 0 0-1.5h-9.5a.75.75 0 0 0-.75.75zm-6 0C1 4.784 1.777 4 2.75 4c.966 0 1.75.777 1.75 1.75 0 .966-.777 1.75-1.75 1.75C1.784 7.5 1 6.723 1 5.75zm6 9c0 .414.336.75.75.75h9.5a.75.75 0 1 0 0-1.5h-9.5a.75.75 0 0 0-.75.75zm-6 0c0-.966.777-1.75 1.75-1.75.966 0 1.75.777 1.75 1.75 0 .966-.777 1.75-1.75 1.75-.966 0-1.75-.777-1.75-1.75z"></path></svg><span class="ck ck-button__label" id="ck-editor__aria-label_e95dba6f2a87ffc0dd2964a9693796352">Bulleted List</span></button><span class="ck ck-toolbar__separator"></span><button class="ck ck-button ck-disabled ck-off" type="button" tabindex="-1" aria-labelledby="ck-editor__aria-label_e2a49959c5e5ac071dde8fe8305d081f0" aria-disabled="true" data-cke-tooltip-text="Decrease indent" data-cke-tooltip-position="s"><svg class="ck ck-icon ck-reset_all-excluded ck-icon_inherit-color ck-button__icon" viewBox="0 0 20 20"><path d="M2 3.75c0 .414.336.75.75.75h14.5a.75.75 0 1 0 0-1.5H2.75a.75.75 0 0 0-.75.75zm5 6c0 .414.336.75.75.75h9.5a.75.75 0 1 0 0-1.5h-9.5a.75.75 0 0 0-.75.75zM2.75 16.5h14.5a.75.75 0 1 0 0-1.5H2.75a.75.75 0 1 0 0 1.5zm1.618-9.55L.98 9.358a.4.4 0 0 0 .013.661l3.39 2.207A.4.4 0 0 0 5 11.892V7.275a.4.4 0 0 0-.632-.326z"></path></svg><span class="ck ck-button__label" id="ck-editor__aria-label_e2a49959c5e5ac071dde8fe8305d081f0">Decrease indent</span></button><button class="ck ck-button ck-disabled ck-off" type="button" tabindex="-1" aria-labelledby="ck-editor__aria-label_e2f9dc2f8a0a88465aa87014894edeee7" aria-disabled="true" data-cke-tooltip-text="Increase indent" data-cke-tooltip-position="s"><svg class="ck ck-icon ck-reset_all-excluded ck-icon_inherit-color ck-button__icon" viewBox="0 0 20 20"><path d="M2 3.75c0 .414.336.75.75.75h14.5a.75.75 0 1 0 0-1.5H2.75a.75.75 0 0 0-.75.75zm5 6c0 .414.336.75.75.75h9.5a.75.75 0 1 0 0-1.5h-9.5a.75.75 0 0 0-.75.75zM2.75 16.5h14.5a.75.75 0 1 0 0-1.5H2.75a.75.75 0 1 0 0 1.5zM1.632 6.95 5.02 9.358a.4.4 0 0 1-.013.661l-3.39 2.207A.4.4 0 0 1 1 11.892V7.275a.4.4 0 0 1 .632-.326z"></path></svg><span class="ck ck-button__label" id="ck-editor__aria-label_e2f9dc2f8a0a88465aa87014894edeee7">Increase indent</span></button><span class="ck ck-toolbar__separator"></span><button class="ck ck-button ck-off" type="button" tabindex="-1" aria-labelledby="ck-editor__aria-label_e12563d798dc24e8e913283bf065f84b2" aria-pressed="false" data-cke-tooltip-text="Link (Ctrl+K)" data-cke-tooltip-position="s"><svg class="ck ck-icon ck-reset_all-excluded ck-icon_inherit-color ck-button__icon" viewBox="0 0 20 20"><path d="m11.077 15 .991-1.416a.75.75 0 1 1 1.229.86l-1.148 1.64a.748.748 0 0 1-.217.206 5.251 5.251 0 0 1-8.503-5.955.741.741 0 0 1 .12-.274l1.147-1.639a.75.75 0 1 1 1.228.86L4.933 10.7l.006.003a3.75 3.75 0 0 0 6.132 4.294l.006.004zm5.494-5.335a.748.748 0 0 1-.12.274l-1.147 1.639a.75.75 0 1 1-1.228-.86l.86-1.23a3.75 3.75 0 0 0-6.144-4.301l-.86 1.229a.75.75 0 0 1-1.229-.86l1.148-1.64a.748.748 0 0 1 .217-.206 5.251 5.251 0 0 1 8.503 5.955zm-4.563-2.532a.75.75 0 0 1 .184 1.045l-3.155 4.505a.75.75 0 1 1-1.229-.86l3.155-4.506a.75.75 0 0 1 1.045-.184z"></path></svg><span class="ck ck-button__label" id="ck-editor__aria-label_e12563d798dc24e8e913283bf065f84b2">Link</span></button><div class="ck ck-dropdown"><button class="ck ck-button ck-off ck-dropdown__button" type="button" tabindex="-1" aria-labelledby="ck-editor__aria-label_e709165da4773cb744085bb0e11989772" data-cke-tooltip-text="Insert table" data-cke-tooltip-position="s" aria-haspopup="true" aria-expanded="false"><svg class="ck ck-icon ck-reset_all-excluded ck-icon_inherit-color ck-button__icon" viewBox="0 0 20 20"><path d="M3 6v3h4V6H3zm0 4v3h4v-3H3zm0 4v3h4v-3H3zm5 3h4v-3H8v3zm5 0h4v-3h-4v3zm4-4v-3h-4v3h4zm0-4V6h-4v3h4zm1.5 8a1.5 1.5 0 0 1-1.5 1.5H3A1.5 1.5 0 0 1 1.5 17V4c.222-.863 1.068-1.5 2-1.5h13c.932 0 1.778.637 2 1.5v13zM12 13v-3H8v3h4zm0-4V6H8v3h4z"></path></svg><span class="ck ck-button__label" id="ck-editor__aria-label_e709165da4773cb744085bb0e11989772">Insert table</span><svg class="ck ck-icon ck-reset_all-excluded ck-icon_inherit-color ck-dropdown__arrow" viewBox="0 0 10 10"><path d="M.941 4.523a.75.75 0 1 1 1.06-1.06l3.006 3.005 3.005-3.005a.75.75 0 1 1 1.06 1.06l-3.549 3.55a.75.75 0 0 1-1.168-.136L.941 4.523z"></path></svg></button><div class="ck ck-reset ck-dropdown__panel ck-dropdown__panel_se" tabindex="-1"></div></div><span class="ck ck-toolbar__separator"></span><button class="ck ck-button ck-disabled ck-off" type="button" tabindex="-1" aria-labelledby="ck-editor__aria-label_e118152b702cb638bfb8e9c419cfbfd04" aria-disabled="true" data-cke-tooltip-text="Undo (Ctrl+Z)" data-cke-tooltip-position="s"><svg class="ck ck-icon ck-reset_all-excluded ck-icon_inherit-color ck-button__icon" viewBox="0 0 20 20"><path d="m5.042 9.367 2.189 1.837a.75.75 0 0 1-.965 1.149l-3.788-3.18a.747.747 0 0 1-.21-.284.75.75 0 0 1 .17-.945L6.23 4.762a.75.75 0 1 1 .964 1.15L4.863 7.866h8.917A.75.75 0 0 1 14 7.9a4 4 0 1 1-1.477 7.718l.344-1.489a2.5 2.5 0 1 0 1.094-4.73l.008-.032H5.042z"></path></svg><span class="ck ck-button__label" id="ck-editor__aria-label_e118152b702cb638bfb8e9c419cfbfd04">Undo</span></button><button class="ck ck-button ck-disabled ck-off" type="button" tabindex="-1" aria-labelledby="ck-editor__aria-label_eca1b056419e94928ed90cf3aea0f99e7" aria-disabled="true" data-cke-tooltip-text="Redo (Ctrl+Y)" data-cke-tooltip-position="s"><svg class="ck ck-icon ck-reset_all-excluded ck-icon_inherit-color ck-button__icon" viewBox="0 0 20 20"><path d="m14.958 9.367-2.189 1.837a.75.75 0 0 0 .965 1.149l3.788-3.18a.747.747 0 0 0 .21-.284.75.75 0 0 0-.17-.945L13.77 4.762a.75.75 0 1 0-.964 1.15l2.331 1.955H6.22A.75.75 0 0 0 6 7.9a4 4 0 1 0 1.477 7.718l-.344-1.489A2.5 2.5 0 1 1 6.039 9.4l-.008-.032h8.927z"></path></svg><span class="ck ck-button__label" id="ck-editor__aria-label_eca1b056419e94928ed90cf3aea0f99e7">Redo</span></button></div></div></div></div></div><div class="ck ck-editor__main" role="presentation"><div class="ck-blurred ck ck-content ck-editor__editable ck-rounded-corners ck-editor__editable_inline" lang="es" dir="ltr" role="textbox" aria-label="Editor editing area: main" contenteditable="true"><p>Escriba aquí el contenido del informe...</p></div></div></div>
                                                                            <div class="mt-3">
                                                                                <button type="button" class="btn btn-primary btn-sm" onclick="generar_pdf_informe('vppb')">
                                                                                    <i class="fa fa-file-pdf"></i> Generar PDF
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row mt-3">
                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-bordered table-striped" id="tabla_observaciones_vppb">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Sesión N°</th>
                                                                                        <th>Tipo de terapia</th>
                                                                                        <th>Comentario</th>
                                                                                        <th>Fecha/Hora</th>
                                                                                        <th>Profesional</th>
                                                                                        <th>Estado</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>

                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <input type="hidden" name="input_lista_observaciones_vppb" id="input_lista_observaciones_vppb" value="">
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <button type="button" class="btn btn-danger btn-sm" onclick="finalizar_sesiones('vppb')">Finalizar sesiones</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- CARGA DE ARCHIVOS VPPB-->
                                                    <div class="col-12">
                                                        <h6 class="tit-gen mb-2 mt-4">Carga de archivos VPPB</h6>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="card-a">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <!-- Los archivos de VPPB ahora se guardan en input_lista_archivo junto con los demás -->
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <!-- [ Main Content ] start -->
                                                                        <div class="dropzone" id="misArchivosVppb" action="{{ route('profesional.archivo.carga') }}">
                                                                        </div>
                                                                        <!-- [ file-upload ] end -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- EVALUACION DE VOZ -->
                                            <div class="tab-pane fade show" id="eval_ter_voz" role="tabpanel" aria-labelledby="eval_ter_voz-tab">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h6 class="tit-gen mb-2">Evaluación y terapia de la voz</h6>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="card-a">
                                                            <div class="card-body">
                                                                <div class="form-row">
                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <label class="floating-label-activo-sm">Motivo de consulta</label>
                                                                        <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="etv_ant_especialidad" id="etv_ant_especialidad" placeholder="Diagnóstico, sintomatología, uso de audífonos, cirugías examen fisico relevante patologías crónicas, etc."></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="form-row">
                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <label class="floating-label-activo-sm">Examen y observación General de la Voz</label>
                                                                        <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="etv_obs_general" id="etv_obs_general" placeholder="Diagnóstico, sintomatología, uso de audífonos, cirugías examen fisico relevante patologías crónicas, etc."></textarea>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="form-row">
                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <label class="floating-label-activo-sm">Plan de tratamiento</label>
                                                                        <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="etv_tratamiento" id="etv_tratamiento" placeholder="Plan de tratamiento"></textarea>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mt-4">
                                                        <h6 class="tit-gen mb-2">Terapia de la voz</h6>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="card-a">
                                                            <div class="card-body">
                                                                <div class="form-row" >
                                                                    <div class="form-group col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                                        <label class="floating-label-activo-sm">Sesión N°</label>
                                                                        <input type="number" class="form-control form-control-sm" name="etv_ses_num" id="etv_ses_num">
                                                                    </div>
                                                                    <div class="form-group col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                                                        <label class="floating-label-activo-sm">Tipo de terapia </label>
                                                                        <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="etv_tipo_terapia" id="etv_tipo_terapia" placeholder="Diagnóstico, sintomatología, uso de audífonos, cirugías examen fisico relevante patologías crónicas, etc."></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <label class="floating-label-activo-sm">Comentario</label>
                                                                        <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="etv_comentario" id="etv_comentario" placeholder="Plan de tratamiento"></textarea>
                                                                    </div>
                                                                </div>
                                                                <button type="button" class="btn btn-success btn-sm has-ripple" onclick="guardar_observaciones_terapia_voz()"><i class="fas fa-save"></i> Guardar</button>
                                                                {{-- <button type="button" class="btn btn-primary btn-sm has-ripple" onclick="agregar_observaciones_terapia_voz()"><i class="fa fa-file-pdf"></i> Generar PDF de informe a médico tratante</button> --}}
                                                                <div id="informe_terapia_voz" class="mt-4 d-none">
                                                                    <div class="card">
                                                                        <div class="card-header">
                                                                            <h6>Informe para Médico Tratante</h6>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <textarea id="editor_informe_terapia_voz" name="informe_contenido">
                                                                                Escriba aquí el contenido del informe...
                                                                            </textarea>
                                                                            <div class="mt-3">
                                                                                <button type="button" class="btn btn-primary btn-sm" onclick="generar_pdf_informe('terapia_voz')">
                                                                                    <i class="fa fa-file-pdf"></i> Generar PDF
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row mt-3">
                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-bordered table-striped" id="tabla_observaciones_terapia_voz">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Sesión N°</th>
                                                                                        <th>Tipo de terapia</th>
                                                                                        <th>Comentario</th>
                                                                                        <th>Fecha y hora</th>
                                                                                        <th>Profesional</th>
                                                                                        <th>Estado</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>

                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <input type="hidden" name="input_lista_observaciones_terapia_voz" id="input_lista_observaciones_terapia_voz" value="">
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <button type="button" class="btn btn-danger btn-sm" onclick="finalizar_sesiones('terapia_voz')">Finalizar sesiones</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- CARGA DE ARCHIVOS TERAPIA DE VOZ-->
                                                    <div class="col-12">
                                                        <h6 class="tit-gen mb-2 mt-4">Carga de archivos Terapia de Voz</h6>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="card-a">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <!-- Los archivos de Terapia de Voz ahora se guardan en input_lista_archivo junto con los demás -->
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <!-- [ Main Content ] start -->
                                                                        <div class="dropzone" id="misArchivosTerapiaVoz" action="{{ route('profesional.archivo.carga') }}">
                                                                        </div>
                                                                        <!-- [ file-upload ] end -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <!--GUARDAR O IMPRIMIR FICHA-->
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="row mb-3">
                                                    <div class="col-md-12 text-center">
                                                        <input type="submit" class="btn btn-purple mt-1" onclick="$('#cerrarsession').val('1');" value="Guardar Ficha y Finalizar su Consulta">
                                                        <input type="submit" class="btn btn-success mt-1" value="Guardar Ficha e ir a su Agenda">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                {{-- Audición --}}
                                <div class="tab-pane fade show" id="audicion" role="tabpanel" aria-labelledby="audicion-tab">
                                    <!-- FORMULARIO EXAMENES AUDITIVOS-->
                                    <div class="row">
                                        <div class="col-12">
                                            <h6 class="tit-gen mb-2 mt-3">Exámenes de audición</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-a">
                                                <div class="card-body">
                                                    <div class="form-row" >
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="floating-label-activo-sm" for="ex_aud_id_examen">Seleccione el o los exámenes</label>
                                                            <select class="js-example-basic-multiple select2-dental" name="ex_aud_id_examen" id="ex_aud_id_examen" multiple="multiple">
                                                                <option  value="1">Audiometría Adultos</option>
                                                                <option  value="2">Audiometría Niños</option>
                                                                <option  value="3">Impedanciometría</option>
                                                                <option  value="4">Pruebas de función tubárica</option>
                                                                <option  value="5">Emisiones Otoacústicas</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <div class="card-a">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <input type="hidden" name="input_lista_archivo_ex_aud" id="input_lista_archivo_ex_aud" value="">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <!-- [ Main Content ] start -->
                                                                            <div class="dropzone" id="mis-archivos" action="{{ route('profesional.archivo.carga') }}">
                                                                            </div>
                                                                            <!-- [ file-upload ] end -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <!--GUARDAR O IMPRIMIR FICHA-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="row mb-3">
                                                <div class="col-md-12 text-center">
                                                    <input type="submit" class="btn btn-purple mt-1" onclick="guardar_examen_audicion()" value="Guardar Examen">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <!--GUARDAR O IMPRIMIR FICHA-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="row mb-3">
                                                <div class="col-md-12 text-center">
                                                    <input type="button" class="btn btn-purple mt-1" onclick="$('#cerrarsession').val('1');" value="Guardar Ficha y Finalizar su Consulta">
                                                    <input type="button" class="btn btn-success mt-1" value="Guardar Ficha e ir a su Agenda">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Equilibrio --}}
                                <div class="tab-pane fade show" id="equilibrio" role="tabpanel" aria-labelledby="equilibrio-tab">
                                    <!-- FORMULARIO EXAMENES EQUILIOBRIO-->
                                    <div class="row mt-3">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

                                            @include('app.laboratorio.atencion_fono_octavopar')

                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <!--GUARDAR O IMPRIMIR FICHA-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="row mb-3">
                                                <div class="col-md-12 text-center">
                                                    <input type="button" class="btn btn-purple mt-1" onclick="$('#cerrarsession').val('1');" value="Guardar Ficha y Finalizar su Consulta">
                                                    <input type="button" class="btn btn-success mt-1" value="Guardar Ficha e ir a su Agenda">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Audífonos y repuestos--}}
                                <div class="tab-pane fade show " id="audif" role="tabpanel" aria-labelledby="audif-tab">
                                        @include('app.laboratorio.atencion_fono_audifonos')
                                </div>

                                {{-- atenciones previas --}}
                                <div class="tab-pane fade show " id="aten-previas"  role="tabpanel" aria-labelledby="aten-previas-tab">
                                    <div class="row">
                                        <div class="col-12 pl-0">
                                            <h6 class="tit-gen mb-2 mt-3">Atenciones Previas</h6>
                                        </div>
                                        <div class="card-a">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        {{-- tabla --}}
                                                        <table class="table table-hover" id="tabla_atenciones_previas_lab">
                                                            <thead>
                                                                <tr>
                                                                    <th>Fecha</th>
                                                                    <th>Hora</th>
                                                                    <th>Profesional</th>
                                                                    <th>Procedimientos</th>
                                                                    <th>Lugar de Atención</th>
                                                                    <th>Estado</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="atenciones-previas-body">
                                                                <!-- Contenido se llenará dinámicamente -->
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
        </div>
    </div>
    <!-- SIDE BAR FONO -->
    {{-- base de botones de sidebar --}}
    @include("atencion_otros_prof.modales")
    {{-- modales y data de sidebar especialidad --}}
    @include("atencion_otros_prof.include.sidebar_derecho_fono")
    @include('general.reserva_hora.modal.tomar_hora_otras_prof')
@endsection

@section('page-script')
    <script>
            // ===== RUTAS PARA EL SISTEMA DE COTIZACIONES =====
            window.cotizacionRoutes = {
                buscarProductos: "{{ route('laboratorio.profesional.buscar_productos_audifonos') }}",
                guardarBorrador: "{{ route('laboratorio.cotizaciones.guardar_borrador') }}",
                vistaPrevia: "{{ route('laboratorio.cotizaciones.vista_previa') }}",
                generar: "{{ route('laboratorio.cotizaciones.generar') }}",
                enviarEmail: "{{ route('laboratorio.cotizaciones.enviar_email') }}",
                historial: "{{ route('laboratorio.cotizaciones.historial', ':paciente_id') }}",
                detalle: "{{ route('laboratorio.cotizaciones.detalle', ':id') }}",
                descargarPdf: "{{ route('laboratorio.cotizaciones.descargar_pdf', ':id') }}",
                anular: "{{ route('laboratorio.cotizaciones.anular', ':id') }}",
                aceptar: "{{ route('laboratorio.cotizaciones.aceptar', ':id') }}",
                rechazar: "{{ route('laboratorio.cotizaciones.rechazar', ':id') }}"
            };
            // ===== FIN RUTAS COTIZACIONES =====

        // Variable global para almacenar el carrito
        var carritoData = {
            items: [],
            total: 0,
            cantidad_items: 0
        };
        // Datos de procedimientos enviados desde el controlador
        @if(isset($procedimientoCentro))
            var procedimientos = @json($procedimientoCentro);
            console.log('Procedimientos cargados desde $procedimientoCentro:', procedimientos);
        @else
            var procedimientos = [];
            console.log('No se encontró la variable $procedimientoCentro');
        @endif

        $(document).ready(function () {
            // $('#aud').select2();
            // $('#equil').select2();
            $('#ex_aud_id_examen').select2();
            $('#tabla_observaciones_terapia_voz').DataTable();
            console.log('Document ready - procedimientos:', procedimientos);
            console.log('Tipo de datos:', typeof procedimientos);
            console.log('Es array:', Array.isArray(procedimientos));
            // NO llamar agregar_observaciones_terapia_voz() aquí para evitar inicialización prematura
            dame_tipos_productos();

            // NO inicializar editores aquí para evitar duplicación
            // Los editores se inicializan de manera diferida en sus funciones respectivas

            //obtenerCarrito();
            // Activar tabs según los procedimientos
            //activarTabsSegunProcedimientos();
        });        // Función para inicializar editores CKEditor de manera consistente
        // DESHABILITADA - Los editores se inicializan de manera diferida en sus funciones respectivas
        /*
        function inicializar_editores_ckeditor() {
            // Editor para Terapia de Voz
            if (document.querySelector('#editor_informe_terapia_voz') && !window.editorTerapiaVoz) {
                ClassicEditor
                    .create(document.querySelector('#editor_informe_terapia_voz'), {
                        toolbar: [
                            'heading', '|',
                            'bold', 'italic', 'underline', 'strikethrough', '|',
                            'fontSize', 'fontColor', 'fontBackgroundColor', '|',
                            'alignment', '|',
                            'numberedList', 'bulletedList', '|',
                            'outdent', 'indent', '|',
                            'link', 'insertTable', '|',
                            'undo', 'redo'
                        ],
                        language: 'es'
                    })
                    .then(editor => {
                        window.editorTerapiaVoz = editor;
                        console.log('✅ Editor Terapia Voz inicializado');
                    })
                    .catch(error => {
                        console.error('❌ Error inicializando editor Terapia Voz:', error);
                    });
            }

            // Editor VPPB se inicializa bajo demanda desde agregar_observaciones_vppb()
            // No se inicializa automáticamente para evitar duplicación
        }
        */

        function dame_tipos_productos(){
            url = "{{ route('laboratorio.tipos_productos') }}";
            $.ajax({
                url: url,
                type: "GET",
                data: {
                },
            })
            .done(function(data)
            {
                console.log('-----------------------');
                console.log(data);
                console.log('-----------------------');
                if(data.estado == 1)
                {
                    if(data.tipos.length>0)
                    {
                        var html = '<option value="">Seleccione</option>';
                        data.tipos.forEach(element => {
                            html += '<option value="'+element.id+'">'+element.nombre+'</option>';
                        });
                        html += '<option value="0">Otros</option>';
                        $('#tipo_producto_busqueda').html(html);
                        $('#cotiz_tipo_producto').html(html);
                    }
                    else
                    {
                        $('#tipo_producto_busqueda').html('<option value="">No hay registros</option>');
                        $('#cotiz_tipo_producto').html('<option value="">No hay registros</option>');
                    }
                }
                else
                {
                    $('#tipo_producto_busqueda').html('<option value="">No hay registros</option>');
                    $('#cotiz_tipo_producto').html('<option value="">No hay registros</option>');
                    swal({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error al comunicarse con el servidor'
                    });
                }
            });
        }

        function activarTabsSegunProcedimientos() {
            // Mapeo de IDs de procedimientos a tabs
            var mapaProcedimientoTab = {
                2: 'equilibrio',   // OCTAVO PAR -> tab equilibrio
                4: 'audicion',     // AUDIOMETRIA ADULTO -> tab audición
                5: 'audif',        // Para audífonos
            };

            // Verificar qué procedimientos están presentes
            var tabsParaActivar = [];

            if (Array.isArray(procedimientos) && procedimientos.length > 0) {

                procedimientos.forEach(function(procedimiento, index) {

                    if (mapaProcedimientoTab[procedimiento.id]) {
                        var tabId = mapaProcedimientoTab[procedimiento.id];
                        console.log('Procedimiento ID', procedimiento.id, 'mapeado a tab:', tabId);

                        if (tabsParaActivar.indexOf(tabId) === -1) {
                            tabsParaActivar.push(tabId);
                        }
                    } else {
                        console.log('Procedimiento ID', procedimiento.id, 'NO tiene mapeo definido');
                    }
                });
            } else {
                console.log('No hay procedimientos válidos para procesar');
            }

            console.log('Tabs para activar:', tabsParaActivar);

            // Lista de todos los tabs de procedimientos (excluyendo "Atención General" y "Atenciones Previas")
            var todosLosTabsProcedimientos = ['audicion', 'equilibrio', 'audif'];

            // Si hay procedimientos específicos, gestionar activación y deshabilitación de tabs
            if (tabsParaActivar.length > 0) {
                console.log('Activando tabs específicos y deshabilitando los demás...');

                // Remover active solo de los tabs principales (no de sub-tabs internos)
                $('#myTab .nav-link').removeClass('active').attr('aria-selected', 'false');
                $('#at-tecn_orl > .tab-pane').removeClass('active show');

                // Gestionar cada tab de procedimiento
                todosLosTabsProcedimientos.forEach(function(tabId) {
                    var tabElement = $('#' + tabId + '-tab');

                    if (tabsParaActivar.indexOf(tabId) !== -1) {
                        // Tab está en la lista de procedimientos - habilitarlo
                        tabElement.removeClass('disabled').css({
                            'pointer-events': 'auto',
                            'opacity': '1',
                            'color': ''
                        });
                        console.log('✅ Tab habilitado:', tabId);
                    } else {
                        // Tab NO está en procedimientos - deshabilitarlo
                        tabElement.addClass('disabled').css({
                            'pointer-events': 'none',
                            'opacity': '0.5',
                            'color': '#6c757d'
                        });
                        console.log('🚫 Tab deshabilitado:', tabId);
                    }
                });

                // Activar el primer tab de procedimiento
                var primerTab = tabsParaActivar[0];
                $('#' + primerTab + '-tab').addClass('active').attr('aria-selected', 'true');
                $('#' + primerTab).addClass('active show');

                console.log('✅ Tab activado automáticamente:', primerTab);

            } else {
                console.log('No hay procedimientos específicos - habilitando todos los tabs...');

                // Si no hay procedimientos específicos, habilitar todos los tabs
                todosLosTabsProcedimientos.forEach(function(tabId) {
                    $('#' + tabId + '-tab').removeClass('disabled').css({
                        'pointer-events': 'auto',
                        'opacity': '1',
                        'color': ''
                    });
                });

                console.log('ℹ️ Todos los tabs habilitados, manteniendo "Atención General"');
            }

        }


        function cargar_profesional(rut, input_nombre, input_id, div_solicitar)
        {
            rut = $(rut).val();

            // console.log('------------------------------------');
            // console.log(rut.length);
            // console.log(rut);
            // console.log('------------------------------------');

            if(rut.length>5)
            {
                url = "{{ route('profesional.buscar') }}";
                $.ajax({

                    url: url,
                    type: "GET",
                    data: {
                        rut : rut,
                    },
                })
                .done(function(data)
                {
                    console.log('-----------------------');
                    console.log(data);
                    console.log('-----------------------');
                    if(data.estado == 1)
                    {

                        if(data.registros.length>0)
                        {
                            var nombre = data.registros[0].nombre+' '+data.registros[0].apellido_uno;
                            var id = data.registros[0].id;
                            // $('#'+input_nombre).attr('readonly', true);
                            $('#'+input_nombre).val(nombre);
                            $('#'+input_id).val(id);
                            $('#'+div_solicitar).hide();
                            mensaje = '';
                            $('#div_mensaje').hide();
                            $('#mensaje_solicitado_por').html(mensaje);
                            $('#solicitado_nombre_oct_par').val(data.registros[0].nombre);
                            $('#solicitado_apellido_oct_par').val(data.registros[0].apellido_uno);
                            $('#solicitado_telefono_oct_par').val(data.registros[0].telefono_uno);
                            $('#solicitado_email_oct_par').val(data.registros[0].email);
                        }
                        else
                        {
                            mensaje = 'Profesional no encontrato, debe ingresar datos.';
                            $('#'+input_nombre).val('');
                            $('#'+input_id).val('');
                            $('#'+div_solicitar).show();
                            $('#div_mensaje').show();
                            $('#mensaje_solicitado_por').html(mensaje);
                            $('#solicitado_nombre_oct_par').val('');
                            $('#solicitado_apellido_oct_par').val('');
                            $('#solicitado_telefono_oct_par').val('');
                            $('#solicitado_email_oct_par').val('');
                            $('#'+input_nombre).attr('readonly', true);
                        }
                    }
                    else
                    {
                        mensaje = 'Se presento un problema en la busqueda intente nuevamente';
                        $('#div_mensaje').show();
                        $('#mensaje_solicitado_por').html(mensaje);
                        $('#'+input_nombre).attr('readonly', false);
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
            }
            else if(rut.length==0)
            {
                $('#'+input_nombre).val('');
                // $('#'+input_nombre).attr('readonly', true);
                $('#'+input_id).val('');
                $('#'+div_solicitar).hide();
                $('#div_mensaje').hide();
                $('#mensaje_solicitado_por').html('');
            }
        }

        function actualizar_solicitado_por(input_solitado_por, input_nombre, input_apellido)
        {
            var nombre = $('#'+input_nombre).val();
            var apellido = $('#'+input_apellido).val();
            if(nombre != '' || apellido != '')
            {
                // $('#'+input_solitado_por).attr('readonly', true);
                $('#'+input_solitado_por).val($('#'+input_nombre).val()+' '+$('#'+input_apellido).val());
            }
            else
            {
                // $('#'+input_solitado_por).attr('readonly', false);
                $('#'+input_solitado_por).val();
            }
        }

        /************** ARCHIVO **************/
        var myDropzone_Archivo ;
        var myDropzone_Lavado ;
        var myDropzone_Vppb ;
        var myDropzone_OctavoPar;

        // CRÍTICO: Deshabilitar autoDiscover ANTES de configurar Dropzone.options
        // Esto evita que Dropzone inicialice automáticamente con configuración en inglés
        if (typeof Dropzone !== 'undefined') {
            Dropzone.autoDiscover = false;
            console.log('✅ Dropzone.autoDiscover deshabilitado globalmente');
        }

        Dropzone.options.misArchivos = {
            init:function()
            {
                myDropzone_Archivo = this;
            },
            url: "{{ route('profesional.archivo.carga') }}",
            method: 'post',
            createImageThumbnails: true,
            addRemoveLinks: true,
            headers:{
                'X-CSRF-TOKEN' : CSRF_TOKEN,
            },

            acceptedFiles: "application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*",
            maxFilesize: 4,
            maxFiles: 4,
            /** El texto utilizado antes de que se eliminen los archivos. */
            dictDefaultMessage: "Arrastre Archivo al recuadro para subirlo.",

            /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
            dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

            /**
             * El texto que se agregará antes del formulario alternativo.
             * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
             * ser ignorado.
             */
            dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

            /**
             * Si el tamaño del archivo es demasiado grande.
             * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
             */
            dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

            /** Si el archivo no coincide con el tipo de archivo. */
            dictInvalidFileType: "No puedes subir archivos de este tipo.",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
            dictCancelUpload: "Cancelar carga",

            /** El texto que se muestra si una carga se canceló manualmente */
            dictUploadCanceled: "Subida cancelada.",

            /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
            dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
            dictRemoveFile: "Eliminar archivo",

            /**
             * Se muestra si `maxFiles` es st y se excede.
             */
            dictMaxFilesExceeded: "No puede cargar más archivos.",

            // accept(file, done) {
            //     console.log('-------------accept-----------------------');
            //     cargar_lista_archivo();
            //     return done();
            // },
            success: function(file, response){
                // console.log('-------------success-----------------------');
                cargar_lista_archivo_unificada();

                if (file.previewElement) {
                    return file.previewElement.classList.add("dz-success");
                }
            },
            error(file, message) {
                // console.log('-------------error-----------------------');
                if (file.previewElement) {
                    file.previewElement.classList.add("dz-error");
                    if (typeof message !== "string" && message.error)
                    {
                        message = message.error;
                    }
                    else
                    {
                        message = message.message;
                    }
                    for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                        node.textContent = message;
                    }
                }
            },
            removedfile(file) {
                // console.log('-------------removedfile-----------------------');
                cargar_lista_archivo_unificada();
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                cargar_lista_archivo_unificada();
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        };

        // Configuración para dropzone de Lavado de Oído
        Dropzone.options.misArchivosLavado = {
            init:function()
            {
                myDropzone_Lavado = this;
            },
            url: "{{ route('profesional.archivo.carga') }}",
            method: 'post',
            createImageThumbnails: true,
            addRemoveLinks: true,
            headers:{
                'X-CSRF-TOKEN' : CSRF_TOKEN,
            },
            acceptedFiles: "application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*",
            maxFilesize: 4,
            maxFiles: 4,
            dictDefaultMessage: "Arrastre Archivo al recuadro para subirlo.",
            dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",
            dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",
            dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",
            dictInvalidFileType: "No puedes subir archivos de este tipo.",
            dictCancelUpload: "Cancelar carga",
            dictUploadCanceled: "Subida cancelada.",
            dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",
            dictRemoveFile: "Eliminar archivo",
            dictMaxFilesExceeded: "No puede cargar más archivos.",
            success: function(file, response){
                cargar_lista_archivo_unificada();
                if (file.previewElement) {
                    return file.previewElement.classList.add("dz-success");
                }
            },
            error(file, message) {
                if (file.previewElement) {
                    file.previewElement.classList.add("dz-error");
                    if (typeof message !== "string" && message.error) {
                        message = message.error;
                    } else {
                        message = message.message;
                    }
                    for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                        node.textContent = message;
                    }
                }
            },
            removedfile(file) {
                cargar_lista_archivo_unificada();
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                cargar_lista_archivo_unificada();
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        };

        // Configuración para dropzone de VPPB
        Dropzone.options.misArchivosVppb = {
            init:function()
            {
                myDropzone_Vppb = this;
            },
            url: "{{ route('profesional.archivo.carga') }}",
            method: 'post',
            createImageThumbnails: true,
            addRemoveLinks: true,
            headers:{
                'X-CSRF-TOKEN' : CSRF_TOKEN,
            },
            acceptedFiles: "application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*",
            maxFilesize: 4,
            maxFiles: 4,
            dictDefaultMessage: "Arrastre Archivo al recuadro para subirlo.",
            dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",
            dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",
            dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",
            dictInvalidFileType: "No puedes subir archivos de este tipo.",
            dictCancelUpload: "Cancelar carga",
            dictUploadCanceled: "Subida cancelada.",
            dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",
            dictRemoveFile: "Eliminar archivo",
            dictMaxFilesExceeded: "No puede cargar más archivos.",
            success: function(file, response){
                cargar_lista_archivo_unificada();
                if (file.previewElement) {
                    return file.previewElement.classList.add("dz-success");
                }
            },
            error(file, message) {
                if (file.previewElement) {
                    file.previewElement.classList.add("dz-error");
                    if (typeof message !== "string" && message.error) {
                        message = message.error;
                    } else {
                        message = message.message;
                    }
                    for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                        node.textContent = message;
                    }
                }
            },
            removedfile(file) {
                cargar_lista_archivo_unificada();
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                cargar_lista_archivo_unificada();
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        };

        // Configuración para dropzone de Terapia de la voz
        Dropzone.options.misArchivosTerapiaVoz = {
            init:function()
            {
                myDropzone_TerapiaVoz = this;
            },
            url: "{{ route('profesional.archivo.carga') }}",
            method: 'post',
            createImageThumbnails: true,
            addRemoveLinks: true,
            headers:{
                'X-CSRF-TOKEN' : CSRF_TOKEN,
            },
            acceptedFiles: "application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*",
            maxFilesize: 4,
            maxFiles: 4,
            dictDefaultMessage: "Arrastre Archivo al recuadro para subirlo.",
            dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",
            dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",
            dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",
            dictInvalidFileType: "No puedes subir archivos de este tipo.",
            dictCancelUpload: "Cancelar carga",
            dictUploadCanceled: "Subida cancelada.",
            dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",
            dictRemoveFile: "Eliminar archivo",
            dictMaxFilesExceeded: "No puede cargar más archivos.",
            success: function(file, response){
                cargar_lista_archivo_unificada();
                if (file.previewElement) {
                    return file.previewElement.classList.add("dz-success");
                }
            },
            error(file, message) {
                if (file.previewElement) {
                    file.previewElement.classList.add("dz-error");
                    if (typeof message !== "string" && message.error) {
                        message = message.error;
                    } else {
                        message = message.message;
                    }
                    for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                        node.textContent = message;
                    }
                }
            },
            removedfile(file) {
                cargar_lista_archivo_unificada();
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                cargar_lista_archivo_unificada();
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        }

        // Configuración para dropzone del Octavo Par (Equilibrio)
        var myDropzone_OctavoPar;

        Dropzone.options.misArchivosOctavoPar = {
            init:function()
            {
                myDropzone_OctavoPar = this;
                console.log('✅ Dropzone misArchivosOctavoPar inicializado correctamente');
            },
            url: "{{ route('profesional.archivo.carga') }}",
            method: 'post',
            paramName: 'file',
            createImageThumbnails: true,
            addRemoveLinks: true,
            renameFile: function (file) {
                // Aquí puedes usar cualquier lógica para renombrar
                const nuevoNombre = prompt("Cambiar nombre del archivo:", file.name);
                return nuevoNombre ? nuevoNombre.replace(/\s+/g, "_") : file.name;
            },
            parallelUploads: 1,
            timeout: 120000,
            headers:{
                'X-CSRF-TOKEN' : CSRF_TOKEN,
                'X-Requested-With': 'XMLHttpRequest'
            },
            acceptedFiles: ".pdf,.doc,.docx,.jpg,.jpeg,.png,.gif,.bmp,.webp",
            maxFilesize: 4,
            maxFiles: 4,
            autoProcessQueue: true,
            uploadMultiple: false,

            // Mensajes en español
            dictDefaultMessage: "📎 Arrastre archivos aquí o haga clic para seleccionar<br><small>Máximo 4 archivos de 4MB cada uno</small>",
            dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",
            dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos.",
            dictFileTooBig: "❌ El archivo es demasiado grande (MB). Tamaño máximo: MB.",
            dictInvalidFileType: "❌ Tipo de archivo no permitido. Solo se aceptan: PDF, DOC, DOCX e imágenes.",
            dictResponseError: "❌ Error del servidor: ",
            dictCancelUpload: "Cancelar",
            dictUploadCanceled: "Carga cancelada",
            dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",
            dictRemoveFile: "🗑️ Eliminar",
            dictMaxFilesExceeded: "❌ No puede cargar más archivos. Máximo permitido: 4",

            // Validación antes de aceptar
            accept: function(file, done) {
                if (file.size === 0) {
                    done("❌ El archivo está vacío");
                    return;
                }
                var archivosActuales = this.getAcceptedFiles().length + this.getQueuedFiles().length;
                if (archivosActuales >= this.options.maxFiles) {
                    done("❌ Máximo " + this.options.maxFiles + " archivos permitidos.");
                    return;
                }
                var tamañoMB = file.size / 1024 / 1024;
                if (tamañoMB > this.options.maxFilesize) {
                    done("❌ El archivo es demasiado grande (" + tamañoMB.toFixed(2) + "MB). Tamaño máximo: " + this.options.maxFilesize + "MB.");
                    return;
                }
                done();
            },

            success: function(file, response){
                console.log('✅ Archivo subido exitosamente (Octavo Par):', file.name);
                // Llamar a la función específica de Octavo Par (no a la unificada)
                if (typeof cargar_lista_archivo === 'function') {
                    cargar_lista_archivo(myDropzone_OctavoPar, '');
                }
                if (file.previewElement) {
                    file.previewElement.classList.add("dz-success");
                    var infoElement = file.previewElement.querySelector('[data-dz-name]');
                    if (infoElement) {
                        infoElement.innerHTML += '<br><small class="text-success">✅ Subido</small>';
                    }
                }
            },
            error(file, message) {
                console.error('❌ Error subiendo archivo (Octavo Par):', file.name, message);
                if (file.previewElement) {
                    file.previewElement.classList.add("dz-error");
                    var errorMessage = message;
                    if (typeof message !== "string") {
                        if (message.error) {
                            errorMessage = message.error;
                        } else if (message.message) {
                            errorMessage = message.message;
                        } else {
                            errorMessage = "Error desconocido al subir el archivo";
                        }
                    }
                    for (let node of file.previewElement.querySelectorAll("[data-dz-errormessage]")) {
                        node.textContent = errorMessage;
                    }
                }
            },
            removedfile(file) {
                console.log('🗑️ Archivo eliminado (Octavo Par):', file.name);
                // Llamar a la función específica de Octavo Par (no a la unificada)
                if (typeof cargar_lista_archivo === 'function') {
                    cargar_lista_archivo(myDropzone_OctavoPar, '');
                }
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                console.log('⏹️ Carga cancelada (Octavo Par):', file.name);
                // Llamar a la función específica de Octavo Par (no a la unificada)
                if (typeof cargar_lista_archivo === 'function') {
                    cargar_lista_archivo(myDropzone_OctavoPar, '');
                }
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
            sending: function(file, xhr, formData) {
                console.log('📤 Enviando archivo (Octavo Par):', file.name);
            },
            uploadprogress: function(file, progress, bytesSent) {
                if (progress % 10 === 0) {
                    console.log('📊 Progreso (Octavo Par):', file.name, Math.round(progress) + '%');
                }
            }
        };

        // INICIALIZAR MANUALMENTE todos los Dropzones cuando el DOM esté listo
        $(document).ready(function() {
            console.log('🚀 Inicializando Dropzones manualmente...');

            // Esperar un momento para que el DOM esté completamente cargado
            setTimeout(function() {
                // Inicializar cada Dropzone solo si el elemento existe
                // NOTA: Los IDs en HTML usan guiones (mis-archivos) pero Dropzone los convierte automáticamente
                if (document.getElementById('mis-archivos')) {
                    try {
                        myDropzone_Archivo = new Dropzone("#mis-archivos");
                        console.log('✅ Dropzone mis-archivos (exámenes auditivos) inicializado');
                    } catch (e) {
                        console.warn('⚠️ Error inicializando mis-archivos:', e.message);
                    }
                }

                if (document.getElementById('misArchivosLavado')) {
                    try {
                        myDropzone_Lavado = new Dropzone("#misArchivosLavado");
                        console.log('✅ Dropzone misArchivosLavado inicializado');
                    } catch (e) {
                        console.warn('⚠️ Error inicializando misArchivosLavado:', e.message);
                    }
                }

                if (document.getElementById('misArchivosVppb')) {
                    try {
                        myDropzone_Vppb = new Dropzone("#misArchivosVppb");
                        console.log('✅ Dropzone misArchivosVppb inicializado');
                    } catch (e) {
                        console.warn('⚠️ Error inicializando misArchivosVppb:', e.message);
                    }
                }

                if(document.getElementById('misArchivosTerapiaVoz')) {
                    try {
                        myDropzone_TerapiaVoz = new Dropzone("#misArchivosTerapiaVoz");
                        console.log('✅ Dropzone misArchivosTerapiaVoz inicializado');
                    } catch (e) {
                        console.warn('⚠️ Error inicializando misArchivosTerapiaVoz:', e.message);
                    }
                }

                if (document.getElementById('misArchivosOctavoPar')) {
                    try {
                        myDropzone_OctavoPar = new Dropzone("#misArchivosOctavoPar");
                        console.log('✅ Dropzone misArchivosOctavoPar inicializado con mensajes en español');
                        console.log('📋 Configuración aplicada:', myDropzone_OctavoPar.options.dictDefaultMessage);
                    } catch (e) {
                        console.warn('⚠️ Error inicializando misArchivosOctavoPar:', e.message);
                    }
                }

                console.log('🎯 Todos los Dropzones inicializados');
            }, 500); // Esperar 500ms
        });

        var lista_archivo = {};

        // Función unificada que recolecta archivos de todos los dropzones
        function cargar_lista_archivo_unificada()
        {
            lista_archivo = [];
            $('#input_lista_archivo').val('');
            $('#listado_archivos').val('');
            let archivo_index = 0;

            // Recolectar archivos del dropzone principal (misArchivos)
            if (typeof myDropzone_Archivo !== 'undefined' && myDropzone_Archivo) {
                let temp_archivo = myDropzone_Archivo.getAcceptedFiles();
                $.each(temp_archivo, function( index, value )
                {
                    if(value.status == "success")
                    {
                        if(value.xhr !== undefined)
                        {
                            var archivo_temp = JSON.parse(value.xhr.response);
                            lista_archivo[archivo_index] = {
                                url: archivo_temp.archivo.url,
                                nombre_original: archivo_temp.archivo.original_file_name,
                                nombre_archivo: archivo_temp.archivo.nombre_archivo,
                                file_extension: archivo_temp.archivo.file_extension,
                                tipo_dropzone: 'general'
                            };
                            archivo_index++;
                        }
                    }
                });
            }

            // Recolectar archivos del dropzone de lavado
            if (typeof myDropzone_Lavado !== 'undefined' && myDropzone_Lavado) {
                let temp_lavado = myDropzone_Lavado.getAcceptedFiles();
                $.each(temp_lavado, function( index, value )
                {
                    if(value.status == "success")
                    {
                        if(value.xhr !== undefined)
                        {
                            var archivo_temp = JSON.parse(value.xhr.response);
                            lista_archivo[archivo_index] = {
                                url: archivo_temp.archivo.url,
                                nombre_original: archivo_temp.archivo.original_file_name,
                                nombre_archivo: archivo_temp.archivo.nombre_archivo,
                                file_extension: archivo_temp.archivo.file_extension,
                                tipo_dropzone: 'lavado'
                            };
                            archivo_index++;
                        }
                    }
                });
            }

            // Recolectar archivos del dropzone de VPPB
            if (typeof myDropzone_Vppb !== 'undefined' && myDropzone_Vppb) {
                let temp_vppb = myDropzone_Vppb.getAcceptedFiles();
                $.each(temp_vppb, function( index, value )
                {
                    if(value.status == "success")
                    {
                        if(value.xhr !== undefined)
                        {
                            var archivo_temp = JSON.parse(value.xhr.response);
                            lista_archivo[archivo_index] = {
                                url: archivo_temp.archivo.url,
                                nombre_original: archivo_temp.archivo.original_file_name,
                                nombre_archivo: archivo_temp.archivo.nombre_archivo,
                                file_extension: archivo_temp.archivo.file_extension,
                                tipo_dropzone: 'vppb'
                            };
                            archivo_index++;
                        }
                    }
                });
            }

            //Recolectar archivos del dropzone Terapia de la voz
            if (typeof myDropzone_TerapiaVoz !== 'undefined' && myDropzone_TerapiaVoz) {
                let temp_terapia_voz = myDropzone_TerapiaVoz.getAcceptedFiles();
                $.each(temp_terapia_voz, function( index, value )
                {
                    if(value.status == "success")
                    {
                        if(value.xhr !== undefined)
                        {
                            var archivo_temp = JSON.parse(value.xhr.response);
                            lista_archivo[archivo_index] = {
                                url: archivo_temp.archivo.url,
                                nombre_original: archivo_temp.archivo.original_file_name,
                                nombre_archivo: archivo_temp.archivo.nombre_archivo,
                                file_extension: archivo_temp.archivo.file_extension,
                                tipo_dropzone: 'terapia_voz'
                            };
                            archivo_index++;
                        }
                    }
                });
            }

            // Recolectar archivos del dropzone del Octavo Par (Equilibrio)
            if (typeof myDropzone_OctavoPar !== 'undefined' && myDropzone_OctavoPar) {
                let temp_octavopar = myDropzone_OctavoPar.getAcceptedFiles();
                $.each(temp_octavopar, function( index, value )
                {
                    if(value.status == "success")
                    {
                        if(value.xhr !== undefined)
                        {
                            var archivo_temp = JSON.parse(value.xhr.response);
                            lista_archivo[archivo_index] = {
                                url: archivo_temp.archivo.url,
                                nombre_original: archivo_temp.archivo.original_file_name,
                                nombre_archivo: archivo_temp.archivo.nombre_archivo,
                                file_extension: archivo_temp.archivo.file_extension,
                                tipo_dropzone: 'octavopar'
                            };
                            archivo_index++;
                        }
                    }
                });
            }

            // Actualizar el input con todos los archivos
            $('#input_lista_archivo').val(JSON.stringify(lista_archivo));
            $('#listado_archivos').val(JSON.stringify(lista_archivo));
            // Log para debug (opcional - puedes quitarlo en producción)
            console.log('Lista unificada de archivos:', lista_archivo);
        }

        // Función de compatibilidad (mantener por si hay llamadas directas)
        function cargar_lista_archivo(obj_dropzone, alias_archivo)
        {
            cargar_lista_archivo_unificada();
        }
        /************** ARCHIVO **************/
        function generar_pdf_vppb(){
            let tipo_tto = $('#vppb_tipo_tratamiento').val();
            let observaciones = $('#vppb_obs_general').val();

            let valido = 1;
            let mensaje = '';

            if(tipo_tto === ''){
                valido = 0;
                mensaje += 'Debe seleccionar un tipo de tratamiento.<br>';
            }
            if(observaciones === ''){
                valido = 0;
                mensaje += 'Debe ingresar observaciones generales.<br>';
            }

            if(valido == 1){
                let url = "{{ route('laboratorio.profesional.examen.vppb') }}";
                let data = {
                    tipo_tto: tipo_tto,
                    observaciones: observaciones,
                    ficha_id: $('#id_fc').val(),
                };
                $.ajax({
                    url: url,
                    type: "GET",
                    data: data,
                })
                .done(function(data)
                {
                    console.log(data);
                    if(data.estado == 1){
                        let pdf_url = data.ruta;
                        window.open(pdf_url, '_blank');
                    }
                });

            }else{
                swal({
                    icon: 'error',
                    title: 'Error',
                    content:{
                        element: "div",
                        attributes: {
                            innerHTML: mensaje
                        },
                    }
                });
            }
        }

        function agregar_observaciones_terapia_voz() {
            if($('#informe_terapia_voz').hasClass('d-none')){
                $('#informe_terapia_voz').removeClass('d-none');
                $('#informe_terapia_voz').addClass('d-block');

                // Esperar un momento para que el elemento sea completamente visible
                setTimeout(function() {
                    // Verificar que el elemento existe y no hay editor previo
                    if (!window.editorTerapiaVoz && document.querySelector('#editor_informe_terapia_voz')) {
                        console.log('🚀 Inicializando Editor Terapia Voz...');

                        ClassicEditor
                            .create(document.querySelector('#editor_informe_terapia_voz'), {
                                toolbar: [
                                    'heading', '|',
                                    'bold', 'italic', 'underline', 'strikethrough', '|',
                                    'fontSize', 'fontColor', 'fontBackgroundColor', '|',
                                    'alignment', '|',
                                    'numberedList', 'bulletedList', '|',
                                    'outdent', 'indent', '|',
                                    'link', 'insertTable', '|',
                                    'undo', 'redo'
                                ],
                                language: 'es'
                            })
                            .then(editor => {
                                window.editorTerapiaVoz = editor;
                                console.log('✅ Editor Terapia Voz inicializado correctamente');

                                // Configurar contenido inicial si está vacío
                                if (!editor.getData().trim()) {
                                    editor.setData('Escriba aquí el contenido del informe...');
                                }
                            })
                            .catch(error => {
                                console.error('❌ Error inicializando editor Terapia Voz:', error);
                                swal('Error', 'No se pudo inicializar el editor de texto', 'error');
                            });
                    } else if (window.editorTerapiaVoz) {
                        console.log('ℹ️ Editor Terapia Voz ya está inicializado');
                    } else {
                        console.error('❌ No se encontró el elemento #editor_informe_terapia_voz');
                    }
                }, 100); // Esperar 100ms para que el DOM se actualice

            } else if($('#informe_terapia_voz').hasClass('d-block')){
                $('#informe_terapia_voz').removeClass('d-block');
                $('#informe_terapia_voz').addClass('d-none');

                // Opcional: Destruir editor si se oculta (descomenta si lo necesitas)
                // if (window.editorTerapiaVoz) {
                //     window.editorTerapiaVoz.destroy();
                //     window.editorTerapiaVoz = null;
                //     console.log('🗑️ Editor Terapia Voz destruido');
                // }
            }
        }

        /**
         * Función para inicializar solo el editor VPPB sin mostrar/ocultar contenedor
         * Evita duplicación al separar responsabilidades
         */
        function inicializar_editor_vppb() {
            console.log('🔧 Inicializando editor VPPB...');

            // Destruir cualquier editor previo para evitar duplicación
            if (window.editorVppb) {
                console.log('🗑️ Destruyendo editor VPPB previo...');
                try {
                    window.editorVppb.destroy();
                } catch (error) {
                    console.warn('⚠️ Error al destruir editor previo:', error);
                }
                window.editorVppb = null;
            }

            // Limpiar cualquier editor CKEditor en el contenedor #informe_vppb
            const contenedorVppb = document.querySelector('#informe_vppb');
            if (contenedorVppb) {
                const editoresExistentes = contenedorVppb.querySelectorAll('.ck-editor');
                editoresExistentes.forEach((editor, index) => {
                    console.log(`🧹 Eliminando editor CKEditor existente ${index + 1}`);
                    editor.remove();
                });
            }

            // Verificar que el elemento existe y está visible
            const editorElement = document.querySelector('#editor_informe_vppb');
            const contenedor = $('#informe_vppb');

            if (!editorElement) {
                console.error('❌ No se encontró el elemento #editor_informe_vppb');
                return;
            }

            if (!contenedor.is(':visible')) {
                console.warn('⚠️ El contenedor #informe_vppb no está visible, mostrándolo...');
                contenedor.removeClass('d-none').addClass('d-block');
            }

            // Pequeña pausa para asegurar que el DOM está listo
            setTimeout(() => {
                console.log('🚀 Creando nuevo editor VPPB...');

                ClassicEditor
                    .create(editorElement, {
                        toolbar: [
                            'heading', '|',
                            'bold', 'italic', 'underline', 'strikethrough', '|',
                            'fontSize', 'fontColor', 'fontBackgroundColor', '|',
                            'alignment', '|',
                            'numberedList', 'bulletedList', '|',
                            'outdent', 'indent', '|',
                            'link', 'insertTable', '|',
                            'undo', 'redo'
                        ],
                        language: 'es'
                    })
                    .then(editor => {
                        window.editorVppb = editor;
                        console.log('✅ Editor VPPB inicializado correctamente');

                        // Configurar contenido inicial si está vacío
                        if (!editor.getData().trim()) {
                            editor.setData('Escriba aquí el contenido del informe...');
                        }
                    })
                    .catch(error => {
                        console.error('❌ Error inicializando editor VPPB:', error);
                        swal('Error', 'No se pudo inicializar el editor de texto', 'error');
                    });
            }, 100);
        }

        /**
         * Función para mostrar/ocultar el contenedor del informe VPPB
         * Solo maneja la visibilidad, no inicializa editores
         */
        function toggle_informe_vppb() {
            const contenedor = $('#informe_vppb');

            if (contenedor.hasClass('d-none')) {
                console.log('👁️ Mostrando contenedor VPPB...');
                contenedor.removeClass('d-none').addClass('d-block');

                // Inicializar editor después de mostrar contenedor
                setTimeout(() => {
                    inicializar_editor_vppb();
                }, 150);
            } else {
                console.log('👁️‍🗨️ Ocultando contenedor VPPB...');
                contenedor.removeClass('d-block').addClass('d-none');

                // Destruir editor y limpiar DOM al ocultar contenedor
                if (window.editorVppb) {
                    try {
                        window.editorVppb.destroy();
                    } catch (error) {
                        console.warn('⚠️ Error al destruir editor:', error);
                    }
                    window.editorVppb = null;
                }

                // Limpiar cualquier editor residual del DOM
                const editoresExistentes = contenedor[0].querySelectorAll('.ck-editor');
                editoresExistentes.forEach((editor, index) => {
                    console.log(`🧹 Eliminando editor residual ${index + 1}`);
                    editor.remove();
                });

                console.log('🗑️ Editor VPPB destruido al ocultar contenedor');
            }
        }

        /**
         * Función original mantenida por compatibilidad
         * Ahora llama a toggle_informe_vppb()
         */
        function agregar_observaciones_vppb() {
            toggle_informe_vppb();
        }

        /**
         * Función auxiliar para verificar el estado de los editores CKEditor
         * Útil para debugging
         */
        function verificarEstadoEditores() {
            console.log('=== ESTADO DE EDITORES CKEDITOR ===');

            // Verificar múltiples instancias en el DOM
            let editorTerapiaElements = document.querySelectorAll('#editor_informe_terapia_voz');
            let editorVppbElements = document.querySelectorAll('#editor_informe_vppb');
            let ckEditorsInDOM = document.querySelectorAll('.ck-editor');

            console.log('📊 Elementos en DOM:');
            console.log('  - #editor_informe_terapia_voz:', editorTerapiaElements.length, 'elementos');
            console.log('  - #editor_informe_vppb:', editorVppbElements.length, 'elementos');
            console.log('  - .ck-editor:', ckEditorsInDOM.length, 'elementos');

            console.log('Editor Terapia Voz:', {
                existe: !!window.editorTerapiaVoz,
                elemento: !!document.querySelector('#editor_informe_terapia_voz'),
                visible: $('#informe_terapia_voz').hasClass('d-block'),
                contenedor_visible: $('#informe_terapia_voz').is(':visible')
            });
            console.log('Editor VPPB:', {
                existe: !!window.editorVppb,
                elemento: !!document.querySelector('#editor_informe_vppb'),
                visible: $('#informe_vppb').hasClass('d-block'),
                contenedor_visible: $('#informe_vppb').is(':visible')
            });

            if (ckEditorsInDOM.length > 2) {
                console.warn('⚠️ ADVERTENCIA: Hay más de 2 editores CKEditor en el DOM!');
            }

            console.log('=====================================');
        }

        /**
         * Función para forzar la inicialización de un editor específico
         * @param {string} tipo - 'terapia_voz' o 'vppb'
         */
        function forzarInicializacionEditor(tipo) {
            if (tipo === 'terapia_voz') {
                if (window.editorTerapiaVoz) {
                    console.log('⚠️ Destruyendo editor Terapia Voz existente...');
                    window.editorTerapiaVoz.destroy();
                    window.editorTerapiaVoz = null;
                }
                // Forzar reinicialización
                setTimeout(() => agregar_observaciones_terapia_voz(), 200);
            } else if (tipo === 'vppb') {
                if (window.editorVppb) {
                    console.log('⚠️ Destruyendo editor VPPB existente...');
                    window.editorVppb.destroy();
                    window.editorVppb = null;
                }
                // Forzar reinicialización
                setTimeout(() => inicializar_editor_vppb(), 200);
            }
        }

        /**
         * Función de emergencia para limpiar todos los editores CKEditor del DOM
         * Útil cuando hay duplicaciones
         */
        function limpiarTodosLosEditores() {
            console.log('🧹 Limpiando todos los editores CKEditor...');

            // Destruir editores en variables globales
            if (window.editorTerapiaVoz) {
                try {
                    window.editorTerapiaVoz.destroy();
                } catch (error) {
                    console.warn('⚠️ Error al destruir editor Terapia Voz:', error);
                }
                window.editorTerapiaVoz = null;
                console.log('✅ Editor Terapia Voz destruido');
            }

            if (window.editorVppb) {
                try {
                    window.editorVppb.destroy();
                } catch (error) {
                    console.warn('⚠️ Error al destruir editor VPPB:', error);
                }
                window.editorVppb = null;
                console.log('✅ Editor VPPB destruido');
            }

            // Limpiar todos los elementos .ck-editor del DOM
            let editorsInDOM = document.querySelectorAll('.ck-editor');
            editorsInDOM.forEach((editor, index) => {
                editor.remove();
                console.log(`✅ Editor DOM ${index + 1} eliminado`);
            });

            console.log('🎉 Limpieza completa finalizada');
            verificarEstadoEditores();
        }

        /**
         * Función específica para limpiar solo editores VPPB
         */
        function limpiarEditorVppb() {
            console.log('🧹 Limpiando específicamente editor VPPB...');

            // Destruir editor en variable global
            if (window.editorVppb) {
                try {
                    window.editorVppb.destroy();
                } catch (error) {
                    console.warn('⚠️ Error al destruir editor VPPB:', error);
                }
                window.editorVppb = null;
                console.log('✅ Editor VPPB global destruido');
            }

            // Limpiar editores CKEditor específicamente en el contenedor VPPB
            const contenedorVppb = document.querySelector('#informe_vppb');
            if (contenedorVppb) {
                const editoresVppb = contenedorVppb.querySelectorAll('.ck-editor');
                editoresVppb.forEach((editor, index) => {
                    editor.remove();
                    console.log(`✅ Editor VPPB DOM ${index + 1} eliminado`);
                });
            }

            console.log('🎉 Limpieza VPPB finalizada');
        }

        function generar_pdf_informe(examen){
            swal({
                title: "¿Generar PDF del informe?",
                text: "Se generará un archivo PDF con el informe del examen.",
                icon: "info",
                buttons: {
                    cancel: {
                        text: "Cancelar",
                        value: null,
                        visible: true,
                        className: "",
                        closeModal: true,
                    },
                    confirm: {
                        text: "Generar PDF",
                        value: true,
                        visible: true,
                        className: "",
                        closeModal: true
                    }
                }
            }).then((willGenerate) => {
                if (willGenerate) {
                    generar_pdf_informe_confirmar(examen);
                }
            })
        }

        function generar_pdf_informe_confirmar(examen){
            let observaciones = '';
            console.log('generar_pdf_informe', examen);
            if(examen === 'vppb'){

                // Intentar obtener datos del editor CKEditor específico para VPPB
                if(window.editorVppb){
                    observaciones = window.editorVppb.getData();
                    console.log('Observaciones obtenidas de editorVppb:', observaciones);
                }else{
                    observaciones = $('#editor_informe_vppb').val();
                    console.log('Observaciones obtenidas del textarea VPPB:', observaciones);
                }

                var url_ = "{{ route('laboratorio.profesional.examen.informe_vppb') }}";
            }else if(examen === 'terapia_voz'){
                // Usar el editor específico para terapia de voz
                if(window.editorTerapiaVoz){
                    observaciones = window.editorTerapiaVoz.getData();
                    console.log('Observaciones obtenidas de editorTerapiaVoz:', observaciones);
                }else{
                    observaciones = $('#editor_informe_terapia_voz').val();
                    console.log('Observaciones obtenidas del textarea terapia_voz:', observaciones);
                }
                var url_ = "{{ route('laboratorio.profesional.examen.informe_terapia_voz') }}";
            }

             console.log('Observaciones finales:', observaciones);

            let valido = 1;
            let mensaje = '';

            if(observaciones === '' || observaciones.trim() === '' || observaciones === 'Escriba aquí el contenido del informe...'){
                valido = 0;
                mensaje += 'Debe ingresar observaciones generales.<br>';
            }

            if(valido == 1){
                let url = url_;
                let data = {
                    observaciones: observaciones,
                    hora_medica: $('#hora_medica').val(),
                    examen: examen,
                    _token: CSRF_TOKEN
                };
                $.ajax({
                    url: url,
                    type: "POST",
                    data: data,
                })
                .done(function(data)
                {
                    console.log(data);
                    if(data.estado == 1){
                        let pdf_url = data.ruta;

                        // Mostrar información sobre los correos enviados
                        let mensaje_correos = '';
                        if(data.correos) {
                            if(data.correos.exitosos && data.correos.exitosos.length > 0) {
                                mensaje_correos += '✅ Correos enviados a: ' + data.correos.exitosos.join(', ') + '\n';
                            }
                            if(data.correos.fallidos && data.correos.fallidos.length > 0) {
                                mensaje_correos += '❌ Falló el envío a: ' + data.correos.fallidos.join(', ') + '\n';
                            }
                        }

                        if(mensaje_correos) {
                            swal({
                                icon: 'success',
                                title: 'PDF Generado',
                                text: 'El PDF se ha generado correctamente.\n\n' + mensaje_correos,
                                buttons: {
                                    cancel: {
                                        text: "Cerrar",
                                        value: null,
                                        visible: true,
                                        className: "",
                                        closeModal: true,
                                    },
                                    confirm: {
                                        text: "Abrir PDF",
                                        value: true,
                                        visible: true,
                                        className: "",
                                        closeModal: true
                                    }
                                }
                            }).then((willOpen) => {
                                if (willOpen) {
                                    window.open(pdf_url, '_blank');
                                }
                            });
                        } else {
                            window.open(pdf_url, '_blank');
                        }
                    } else {
                        swal({
                            icon: 'error',
                            title: 'Error',
                            text: data.error || 'Error al generar el PDF'
                        });
                    }
                })
                .fail(function(xhr, status, error) {
                    console.error('Error AJAX:', xhr.responseText);
                    swal({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error al procesar la solicitud: ' + error
                    });
                });

            }else{
                swal({
                    icon: 'error',
                    title: 'Error',
                    content:{
                        element: "div",
                        attributes: {
                            innerHTML: mensaje
                        },
                    }
                });
            }
        }

        function guardar_examen_audicion(){
            console.log('guardar_examen_audicion');
            let examenes = $('#ex_aud_id_examen');
            let files = $('#mis-archivos').get(0).dropzone.getAcceptedFiles();
            let valido = 1;
            let mensaje = '';
            if(examenes.val() === null || examenes.val().length === 0){
                valido = 0;
                mensaje += 'Debe seleccionar al menos un examen.<br>';
            }
            if(files.length === 0){
                valido = 0;
                mensaje += 'Debe adjuntar al menos un archivo.<br>';
            }
            // validar que la cantidad de examenes coincida con la cantidad de archivos
            if(examenes.val() !== null && examenes.val().length !== files.length){
                valido = 0;
                mensaje += 'La cantidad de exámenes seleccionados no coincide con la cantidad de archivos adjuntados.<br>';
            }
            if(valido == 1){
                // Guardar examen
                console.log('Guardar examen de audición');
                let url = "{{ route('ficha.otro.prof.registrar_ficha_fono_audicion') }}";
                let data = {
                    id_ficha: $('#id_fc').val(),
                    id_paciente_fc: $('#id_paciente_fc').val(),
                    id_profesional_fc: $('#id_profesional_fc').val(),
                    id_lugar_atencion: $('#id_lugar_atencion').val(),
                    hora_medica: $('#hora_medica').val(),
                    input_lista_archivo: JSON.stringify(lista_archivo),
                    id_procedimiento: 4, // Audición
                    examenes: $('#ex_aud_id_examen').val(),
                    _token: CSRF_TOKEN
                };
                $.ajax({
                    url: url,
                    type: "POST",
                    data: data,
                })
                .done(function(data)
                {
                    console.log(data);
                    if (data.success || data.estado == 1) {
                        // alert('✅ Examen guardado exitosamente');
                        swal({
                            title: "✅ Examen guardado exitosamente",
                            text: "Sus archivos han sido guardados correctamente.",
                            icon: "success",
                            button: "Aceptar"
                        }).then(() => {
                            // Opcional: redireccionar o realizar alguna acción
                            if (data.redirect) {
                                //window.location.href = data.redirect;
                            } else {
                                // Recargar la página o ir a otra vista
                                // window.location.reload();
                                console.log('ℹ️ No hay redirección proporcionada, permaneciendo en la página actual.');
                            }
                        });
                    } else {
                        // alert('❌ Error al guardar: ' + (data.message || 'Error desconocido'));
                        swal({
                            title: "❌ Error al guardar",
                            content:{
                                element: "div",
                                attributes: {
                                    innerHTML: data.msj || 'Error desconocido'
                                }
                            },
                            icon: "error",
                            button: "Aceptar"
                        });
                    }
                });
            }else{
                swal({
                    icon: 'error',
                    title: 'Error',
                    content:{
                        element: "div",
                        attributes: {
                            innerHTML: mensaje
                        },
                    }
                });
            }
        }

        function dame_audifonos_paciente(){
            let id_paciente = $('#id_paciente_fc').val();
            let id_ficha = $('#id_fc').val();
            let url = "{{ route('laboratorio.profesional.examen.mis_audifonos') }}";
            let data = {
                id_paciente: id_paciente,
                id_ficha: id_ficha,
            };
            $.ajax({
                url: url,
                type: "GET",
                data: data,
            })
            .done(function(data)
            {
                console.log(data);
                if(data.estado == 1){
                    let audifonos = data.audifonos;
                    let html = '';
                    if(audifonos.length > 0){
                        html += '<div class="table-responsive">';
                        html += '<table class="table table-striped table-hover">';
                        html += '<thead><tr><th>Imagen</th><th>Marca</th><th>Modelo</th><th>Tipo</th><th>Frecuencia de cambio</th><th>Último cambio</th><th>Acciones</th></tr></thead>';
                        html += '<tbody>';
                        $.each(audifonos, function(index, value){
                            // Construir la URL completa de la imagen
                            let imagenUrl = value.image_path;
                            // Si la ruta no empieza con http, agregar la ruta base
                            if (!imagenUrl.startsWith('http')) {
                                imagenUrl = '/' + imagenUrl;
                            }

                            html += '<tr>';
                            html += '<td><img src="' + imagenUrl + '" alt="' + value.nombre + '" class="img-thumbnail" width="100" onerror="this.src=\'/images/no-image.png\'"></td>';
                            html += '<td>' + value.marca + '</td>';
                            html += '<td>' + value.nombre + '</td>';
                            html += '<td>' + value.tipo_producto + '</td>';
                            html += '<td>' + (value.frecuencia_cambio || 'N/A') + '</td>';
                            html += '<td>' + (value.ultimo_cambio || 'N/A') + '</td>';
                            html += '<td><button class="btn btn-sm btn-primary" onclick="ver_detalle_audifono(' + value.id + ')">Ver detalle</button></td>';
                            html += '</tr>';
                        });
                        html += '</tbody></table></div>';
                    }else{
                        html = '<p>No se encontraron audífonos para este paciente.</p>';
                    }
                    $('#lista_audifonos').html(html);
                }
            });
        }

       

        // Seleccionar producto
        function dame_producto(id_producto) {
            console.log('Producto seleccionado ID:', id_producto);

            // cargamos datos del producto en campos del formulario
            let url = "{{ route('laboratorio.paciente.producto.dameProducto', '') }}/" + id_producto;
            console.log(url);
            $.ajax({
                url: url,
                type: "GET",
                success: function(data) {
                    console.log(data);
                    if(data.estado == 1){
                        let producto = data.producto.producto;
                        swal({
                            icon: 'success',
                            title: 'Producto seleccionado',
                            text: 'Ha seleccionado el producto: ' + (producto.nombre || 'Sin nombre'),
                            showConfirmButton: false,
                            timer: 1500
                        });
                        // abrir modal de detalle del producto para su control y revision
                        console.log(producto);
                        if(producto.image_path && !producto.image_path.startsWith('http')){
                            producto.image_path = '/' + producto.image_path;
                        }
                        $('#detalle-codigo-interno').text(producto.codigo_interno || 'N/A');
                        $('#detalle-nombre').text(producto.nombre || 'N/A');
                        $('#detalle-descripcion').text(producto.descripcion || 'N/A');
                        $('#detalle-numero-serie').text(producto.numero_serie || 'N/A');
                        $('#detalle-imagen').attr('src', producto.image_path || '').toggle(!!producto.image_path);

                        // Mostrar calificación con estrellas
                        mostrarCalificacionEstrellas(data.producto.satisfaccion);

                        $('#id_producto_seleccionado').val(producto.id);
                    }
                },
                error: function() {
                    console.error('Error al cargar los datos del producto');
                }
            });
        }

        function dame_audifono(id_producto, seccion) {
            console.log('Producto seleccionado ID:', id_producto);

            // cargamos datos del producto en campos del formulario
            let url = "{{ route('laboratorio.paciente.producto.dameProducto', '') }}/" + id_producto;
            console.log(url);
            $.ajax({
                url: url,
                type: "GET",
                success: function(data) {
                    console.log(data);
                    if(data.estado == 1){
                        let producto = data.producto.producto;
                        $('#id_producto').val(producto.id);
                        // abrir modal de detalle del producto para su control y revision
                        console.log(producto);
                        if(seccion == 'calibracion') {
                            $('#marca_audif').val(producto.marca.nombre || 'N/A');
                            $('#model_audif').val(producto.nombre || 'N/A');
                        }else{
                            $('#marca_rep').val(producto.marca.nombre || 'N/A');
                            $('#modelo_rep').val(producto.nombre || 'N/A');
                        }
                    }
                },
                error: function() {
                    console.error('Error al cargar los datos del producto');
                }
            });
        }

        // Ver detalle del producto
        function ver_detalle_producto_audifono(id_producto) {
            console.log('Ver detalle del producto ID:', id_producto);

            // Hacer petición AJAX para obtener detalles completos
            let url = "{{ route('laboratorio.profesional.detalle_producto_audifono', '') }}/" + id_producto;

            $.ajax({
                url: url,
                type: "GET",
            })
            .done(function(data) {
                console.log('Detalle del producto:', data);
                if (data.producto) {
                    mostrar_modal_detalle_producto(data.producto);
                }
            })
            .fail(function() {
                swal({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo cargar el detalle del producto.'
                });
            });
        }

        // Mostrar modal con detalle del producto
        function mostrar_modal_detalle_producto(producto) {
            let imagenUrl = producto.image_path || '';
            if (imagenUrl && !imagenUrl.startsWith('http')) {
                imagenUrl = '/' + imagenUrl;
            }

            let contenido = '<div class="container-fluid">';
            contenido += '<div class="row">';
            contenido += '<div class="col-md-4 text-center">';
            contenido += '<img src="' + (imagenUrl || '/images/no-image.png') + '" class="img-fluid rounded mb-2" onerror="this.src=\'/images/no-image.png\'">';
            contenido += '</div>';
            contenido += '<div class="col-md-8">';
            contenido += '<h5>' + producto.nombre + '</h5>';
            contenido += '<p><strong>Código:</strong> ' + (producto.codigo_interno || 'N/A') + '</p>';
            contenido += '<p><strong>Marca:</strong> ' + (producto.marca.nombre || 'N/A') + '</p>';
            contenido += '<p><strong>Tipo:</strong> ' + (producto.tipo_producto.nombre || 'N/A') + '</p>';
            contenido += '<p><strong>Stock Actual:</strong> ' + (producto.stock_actual || 0) + '</p>';
            contenido += '<p><strong>Stock Mínimo:</strong> ' + (producto.stock_minimo || 0) + '</p>';
            contenido += '<p><strong>Stock Máximo:</strong> ' + (producto.stock_maximo || 0) + '</p>';
            contenido += '<p><strong>Descripción:</strong> ' + (producto.descripcion || 'Sin descripción') + '</p>';
            if (producto.observaciones) {
                contenido += '<p><strong>Observaciones:</strong> ' + producto.observaciones + '</p>';
            }
            contenido += '</div>';
            contenido += '</div>';
            contenido += '</div>';

            swal({
                title: 'Detalle del Producto',
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: contenido
                    }
                },
                buttons: {
                    cancel: "Cerrar",
                    confirm: {
                        text: "Seleccionar",
                        value: true,
                    }
                }
            }).then((seleccionar) => {
                if (seleccionar) {
                    seleccionar_producto_audifono(producto.id, producto.precio_venta);
                }
            });
        }

        // Event listener para búsqueda con Enter
        $(document).ready(function() {
            $('#buscar_producto').on('keypress', function(e) {
                if (e.which === 13) { // Enter key
                    e.preventDefault();
                    buscar_productos_audifonos();
                }
            });

            // Mostrar mensaje inicial
            limpiar_busqueda_audifonos();
        });

        /**
         * Agregar producto al carrito
         */
        function agregarProductoAlCarrito(id_producto, datos_adicionales = {}) {
            // Mostrar loading
            swal({
                title: 'Agregando al carrito...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            let url = "{{ route('laboratorio.carrito.agregar') }}";

            let data = {
                id_producto: id_producto,
                cantidad: datos_adicionales.cantidad || 1,
                id_paciente: datos_adicionales.id_paciente || $('#id_paciente_fc').val(),
                id_ficha: datos_adicionales.id_ficha || $('#id_fc').val(),
                precio_unitario: datos_adicionales.precio_unitario || 0,
                descuento: datos_adicionales.descuento || 0,
                observaciones: datos_adicionales.observaciones || '',
                _token: CSRF_TOKEN
            };

            $.ajax({
                url: url,
                type: "POST",
                data: data,
            })
            .done(function(response) {
                console.log('Producto agregado al carrito:', response);

                if (response.estado === 1) {
                    // Actualizar datos del carrito
                    carritoData.total = response.total_carrito;
                    carritoData.cantidad_items = response.cantidad_items;

                    // Actualizar UI
                    actualizarBadgeCarrito();

                    swal({
                        icon: 'success',
                        title: '¡Agregado!',
                        text: response.mensaje,
                        showConfirmButton: false,
                        timer: 1500
                    });

                    // Opcional: Mostrar botón para ver carrito
                    mostrarBotonVerCarrito();
                } else {
                    swal({
                        icon: 'error',
                        title: 'Error',
                        text: response.mensaje
                    });
                }
            })
            .fail(function(jqXHR) {
                console.error('Error al agregar al carrito:', jqXHR);

                let mensaje = 'Error al agregar el producto al carrito';
                if (jqXHR.responseJSON && jqXHR.responseJSON.mensaje) {
                    mensaje = jqXHR.responseJSON.mensaje;
                }

                swal({
                    icon: 'error',
                    title: 'Error',
                    text: mensaje
                });
            });
        }

        /**
         * Modificar la función de selección de producto para agregar al carrito
         */
        function seleccionar_producto_audifono(id_producto, precio_venta) {
            console.log('Producto seleccionado ID:', id_producto);

            swal({
                title: '¿Agregar al carrito?',
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: `
                            <div class="form-group text-left">
                                <label class="font-weight-bold">Cantidad:</label>
                                <input type="number" id="swal-cantidad" class="form-control" value="1" min="1" max="100">
                            </div>
                            <div class="form-group text-left">
                                <label class="font-weight-bold">Precio Unitario:</label>
                                <input type="number" id="swal-precio" class="form-control" value="${precio_venta}" min="0" step="0.01">
                            </div>
                            <div class="form-group text-left">
                                <label class="font-weight-bold">Descuento:</label>
                                <input type="number" id="swal-descuento" class="form-control" value="0" min="0" step="0.01">
                            </div>
                            <div class="form-group text-left">
                                <label class="font-weight-bold">Observaciones:</label>
                                <textarea id="swal-observaciones" class="form-control" rows="2" placeholder="Ingrese observaciones adicionales (opcional)"></textarea>
                            </div>
                        `
                    }
                },
                buttons: {
                    cancel: {
                        text: "Cancelar",
                        value: null,
                        visible: true,
                        className: "btn btn-secondary",
                        closeModal: true,
                    },
                    confirm: {
                        text: "Agregar al Carrito",
                        value: true,
                        visible: true,
                        className: "btn btn-success",
                        closeModal: false
                    }
                }
            }).then((willAdd) => {
                if (willAdd) {
                    // Validar campos
                    let cantidad = parseInt(document.getElementById('swal-cantidad').value);
                    let precio = parseFloat(document.getElementById('swal-precio').value);
                    let descuento = parseFloat(document.getElementById('swal-descuento').value);
                    let observaciones = document.getElementById('swal-observaciones').value;

                    // Validaciones
                    if (!cantidad || cantidad <= 0) {
                        swal("Error", "La cantidad debe ser mayor a 0", "error");
                        return;
                    }

                    if (precio < 0) {
                        swal("Error", "El precio no puede ser negativo", "error");
                        return;
                    }

                    if (descuento < 0) {
                        swal("Error", "El descuento no puede ser negativo", "error");
                        return;
                    }

                    if (descuento > precio * cantidad) {
                        swal("Error", "El descuento no puede ser mayor al subtotal", "error");
                        return;
                    }

                    // Cerrar modal y agregar al carrito
                    swal.close();

                    let datos = {
                        cantidad: cantidad,
                        precio_unitario: precio,
                        descuento: descuento,
                        observaciones: observaciones
                    };

                    agregarProductoAlCarrito(id_producto, datos);
                }
            });
        }

        /**
         * Obtener y mostrar carrito
         */
        function obtenerCarrito() {
            let url = "{{ route('laboratorio.carrito.obtener') }}";

            $.ajax({
                url: url,
                type: "GET",
            })
            .done(function(response) {
                console.log('Carrito obtenido:', response);
                if (response.estado === 1) {
                    carritoData = {
                        items: response.items,
                        total: response.total,
                        cantidad_items: response.cantidad_items
                    };

                    mostrarModalCarrito();
                    actualizarBadgeCarrito();
                }
            })
            .fail(function(jqXHR) {
                console.error('Error al obtener carrito:', jqXHR);
                swal({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo cargar el carrito'
                });
            });
        }

        /**
         * Mostrar modal con contenido del carrito
         */
        function mostrarModalCarrito() {
            let html = '<div class="table-responsive">';

            if (carritoData.items.length === 0) {
                html += '<p class="text-center py-4">El carrito está vacío</p>';
            } else {
                html += '<table class="table table-hover">';
                html += '<thead><tr>';
                html += '<th>Producto</th>';
                html += '<th>Cantidad</th>';
                html += '<th>Precio</th>';
                html += '<th>Subtotal</th>';
                html += '<th>Acciones</th>';
                html += '</tr></thead><tbody>';

                carritoData.items.forEach(function(item) {
                    html += '<tr>';
                    html += '<td>';
                    if (item.image_path) {
                        html += '<img src="/' + item.image_path + '" alt="' + item.nombre_producto + '" class="img-thumbnail mr-2" style="width:50px;">';
                    }
                    html += '<div>';
                    html += '<strong>' + item.nombre_producto + '</strong><br>';
                    html += '<small class="text-muted">' + (item.marca_producto || '') + '</small>';
                    html += '</div>';
                    html += '</td>';
                    html += '<td>';
                    html += '<input type="number" class="form-control form-control-sm" value="' + item.cantidad + '" ';
                    html += 'min="1" max="' + (item.stock_disponible || 100) + '" ';
                    html += 'onchange="actualizarCantidadItem(' + item.id + ', this.value)">';
                    html += '</td>';
                    html += '<td>$' + parseFloat(item.precio_unitario).toFixed(2) + '</td>';
                    html += '<td><strong>$' + parseFloat(item.subtotal).toFixed(2) + '</strong></td>';
                    html += '<td>';
                    html += '<button class="btn btn-sm btn-danger" onclick="eliminarItemCarrito(' + item.id + ')" title="Eliminar">';
                    html += '<i class="feather icon-trash-2"></i>';
                    html += '</button>';
                    html += '</td>';
                    html += '</tr>';
                });

                html += '</tbody>';
                html += '<tfoot>';
                html += '<tr class="bg-light">';
                html += '<td colspan="3" class="text-right"><strong>TOTAL:</strong></td>';
                html += '<td colspan="2"><strong class="text-success">$' + parseFloat(carritoData.total).toFixed(2) + '</strong></td>';
                html += '</tr>';
                html += '</tfoot>';
                html += '</table>';

                html += '<div class="text-right mt-3">';
                html += '<button class="btn btn-secondary mr-2" onclick="swal.close()">Cerrar</button>';
                html += '<button class="btn btn-danger mr-2" onclick="vaciarCarritoCompleto()"><i class="feather icon-trash"></i> Vaciar Carrito</button>';
                html += '<button class="btn btn-success" onclick="procesarVenta()"><i class="feather icon-check"></i> Procesar Venta</button>';
                html += '</div>';
            }

            html += '</div>';

            swal({
                title: 'Carrito de Compras',
                icon: 'info', // Opcional: agrega un ícono visual
                content:{
                    element: "div",
                    attributes: {
                        innerHTML: '<div class="text-center mb-3"><i class="feather icon-shopping-cart" style="font-size: 2rem; color: #28a745;"></i><h4 class="mt-2">Carrito de Compras</h4></div>' + html
                    }
                },
                buttons: false,
                closeOnClickOutside: true,
                className: 'swal-wide' // Clase personalizada para ancho
            });
        }

        /**
         * Actualizar cantidad de un item
         */
        function actualizarCantidadItem(id_item, cantidad) {
            let url = "{{ route('laboratorio.carrito.actualizar_cantidad') }}";

            $.ajax({
                url: url,
                type: "PUT",
                data: {
                    id_item: id_item,
                    cantidad: cantidad,
                    _token: CSRF_TOKEN
                },
            })
            .done(function(response) {
                if (response.estado === 1) {
                    // Actualizar carrito
                    obtenerCarrito();
                } else {
                    swal({
                        icon: 'error',
                        title: 'Error',
                        text: response.mensaje
                    });
                }
            })
            .fail(function(jqXHR) {
                console.error('Error al actualizar cantidad:', jqXHR);
            });
        }

        /**
         * Eliminar item del carrito
         */
        function eliminarItemCarrito(id_item) {
            swal({
                title: '¿Eliminar producto?',
                text: 'Se eliminará este producto del carrito',
                icon: 'warning',
                buttons: {
                    cancel: {
                        text: "Cancelar",
                        value: null,
                        visible: true,
                        className: "btn btn-secondary",
                        closeModal: true,
                    },
                    confirm: {
                        text: "Sí, eliminar",
                        value: true,
                        visible: true,
                        className: "btn btn-danger",
                        closeModal: true
                    }
                },
                dangerMode: true
            }).then((willDelete) => {
                if (willDelete) {
                    let url = "{{ route('laboratorio.carrito.eliminar') }}";

                    $.ajax({
                        url: url,
                        type: "DELETE",
                        data: {
                            id_item: id_item,
                            _token: CSRF_TOKEN
                        },
                    })
                    .done(function(response) {
                        if (response.estado === 1) {
                            // Actualizar carrito
                            obtenerCarrito();

                            swal({
                                icon: 'success',
                                title: 'Eliminado',
                                text: response.mensaje || 'Producto eliminado del carrito',
                                buttons: false,
                                timer: 1500
                            });
                        } else {
                            swal({
                                icon: 'error',
                                title: 'Error',
                                text: response.mensaje || 'No se pudo eliminar el producto'
                            });
                        }
                    })
                    .fail(function(jqXHR) {
                        console.error('Error al eliminar del carrito:', jqXHR);
                        swal({
                            icon: 'error',
                            title: 'Error',
                            text: 'Error al comunicarse con el servidor'
                        });
                    });
                }
            });
        }

        /**
         * Vaciar carrito completo
         */
        function vaciarCarritoCompleto() {
            swal({
                title: '¿Vaciar carrito?',
                text: 'Se eliminarán todos los productos del carrito',
                icon: 'warning',
                buttons: {
                    cancel: {
                        text: "Cancelar",
                        value: null,
                        visible: true,
                        className: "btn btn-secondary",
                        closeModal: true,
                    },
                    confirm: {
                        text: "Sí, vaciar",
                        value: true,
                        visible: true,
                        className: "btn btn-danger",
                        closeModal: true
                    }
                },
                dangerMode: true
            }).then((willEmpty) => {
                if (willEmpty) {
                    let url = "{{ route('laboratorio.carrito.vaciar') }}";

                    $.ajax({
                        url: url,
                        type: "DELETE",
                        data: {
                            _token: CSRF_TOKEN
                        },
                    })
                    .done(function(response) {
                        if (response.estado === 1) {
                            carritoData = {
                                items: [],
                                total: 0,
                                cantidad_items: 0
                            };

                            actualizarBadgeCarrito();
                            swal.close();

                            swal({
                                icon: 'success',
                                title: 'Carrito vaciado',
                                text: 'Se eliminaron todos los productos',
                                buttons: false,
                                timer: 1500
                            });
                        } else {
                            swal({
                                icon: 'error',
                                title: 'Error',
                                text: response.mensaje || 'No se pudo vaciar el carrito'
                            });
                        }
                    })
                    .fail(function(jqXHR) {
                        console.error('Error al vaciar carrito:', jqXHR);
                        swal({
                            icon: 'error',
                            title: 'Error',
                            text: 'Error al comunicarse con el servidor'
                        });
                    });
                }
            });
        }

        /**
         * Actualizar badge del carrito
         */
        function actualizarBadgeCarrito() {
            // Actualizar badge del botón flotante
            let badge = $('#badge-carrito');
            if (carritoData.cantidad_items > 0) {
                badge.text(carritoData.cantidad_items).show();
            } else {
                badge.hide();
            }

            // Actualizar badge del botón en el header
            let badgeHeader = $('#badge-carrito-header');
            let totalHeader = $('#total-carrito-header');

            if (carritoData.cantidad_items > 0) {
                // Animación de pulso al actualizar
                badgeHeader.addClass('badge-animated');
                setTimeout(function() {
                    badgeHeader.removeClass('badge-animated');
                }, 500);

                badgeHeader.text(carritoData.cantidad_items).show();
                totalHeader.text('Total: $' + parseFloat(carritoData.total || 0).toFixed(2)).show();

                // Mostrar el botón del carrito si estaba oculto
                $('#btn-abrir-carrito').removeClass('d-none');
            } else {
                badgeHeader.hide();
                totalHeader.hide();
            }
        }

        /**
         * Mostrar botón flotante del carrito
         */
        function mostrarBotonVerCarrito() {
            if ($('#btn-ver-carrito').length === 0) {
                let boton = `
                    <button id="btn-ver-carrito" class="btn btn-success btn-lg"
                            style="position:fixed; bottom:20px; right:20px; z-index:9999; border-radius:50%; width:60px; height:60px;"
                            onclick="obtenerCarrito()" title="Ver carrito">
                        <i class="feather icon-shopping-cart"></i>
                        <span id="badge-carrito" class="badge badge-danger"
                            style="position:absolute; top:-5px; right:-5px; display:none;">0</span>
                    </button>
                `;
                //$('body').append(boton);
            }
        }

        /**
         * Procesar venta
         */
        function procesarVenta() {
            // Aquí puedes implementar lógica adicional para procesar la venta
            swal({
                title: 'Procesar Venta',
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: `
                            <div class="form-group text-left">
                                <label class="font-weight-bold">Método de Pago:</label>
                                <select id="swal-metodo-pago" class="form-control">
                                    <option value="efectivo">Efectivo</option>
                                    <option value="tarjeta">Tarjeta</option>
                                    <option value="transferencia">Transferencia</option>
                                </select>
                            </div>
                            <div class="form-group text-left">
                                <label class="font-weight-bold">Observaciones:</label>
                                <textarea id="swal-obs-venta" class="form-control" rows="3" placeholder="Ingrese observaciones adicionales (opcional)"></textarea>
                            </div>
                        `
                    }
                },
                buttons: {
                    cancel: {
                        text: "Cancelar",
                        value: null,
                        visible: true,
                        className: "btn btn-secondary",
                        closeModal: true,
                    },
                    confirm: {
                        text: "Confirmar Venta",
                        value: true,
                        visible: true,
                        className: "btn btn-success",
                        closeModal: false
                    }
                }
            }).then((willProcess) => {
                if (willProcess) {
                    let metodo_pago = document.getElementById('swal-metodo-pago').value;
                    let observaciones = document.getElementById('swal-obs-venta').value;

                    // Validar método de pago
                    if (!metodo_pago) {
                        swal("Error", "Debe seleccionar un método de pago", "error");
                        return;
                    }

                    // Cerrar modal y procesar
                    swal.close();

                    let datos = {
                        metodo_pago: metodo_pago,
                        observaciones: observaciones
                    };

                    finalizarVenta(datos);
                }
            });
        }

        /**
         * Finalizar venta (enviar al servidor)
         */
        function finalizarVenta(datos) {
            let url = "{{ route('laboratorio.carrito.procesar_venta') }}";

            swal({
                title: 'Procesando venta...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: url,
                type: "POST",
                data: {
                    id_paciente: $('#id_paciente_fc').val(),
                    id_ficha: $('#id_fc').val(),
                    id_lugar_atencion: $('#id_lugar_atencion').val(),
                    metodo_pago: datos.metodo_pago,
                    observaciones: datos.observaciones,
                    _token: CSRF_TOKEN
                },
            })
            .done(function(response) {
                console.log(response);
                if (response.estado === 1) {
                    carritoData = {
                        items: [],
                        total: 0,
                        cantidad_items: 0
                    };

                    actualizarBadgeCarrito();

                    swal({
                        icon: 'success',
                        title: '¡Venta Exitosa!',
                        html: `
                            <p>${response.mensaje}</p>
                            <p><strong>Items procesados:</strong> ${response.items_procesados}</p>
                            <p><strong>Total:</strong> $${parseFloat(response.total).toFixed(2)}</p>
                        `,
                        confirmButtonText: 'Aceptar'
                    });
                } else {
                    swal({
                        icon: 'error',
                        title: 'Error',
                        text: response.mensaje
                    });
                }
            })
            .fail(function(jqXHR) {
                console.error('Error al procesar venta:', jqXHR);
                swal({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo procesar la venta'
                });
            });
        }

        function mis_productos(){
            let url = "{{ route('laboratorio.paciente.producto.listar') }}";
            let data = {
                id_paciente: $('#id_paciente_fc').val(),
                _token: CSRF_TOKEN
            }

            $.ajax({
                url: url,
                type: "GET",
                data: data,
            })
            .done(function(response) {
                console.log(response);
                $('#productos-lista').empty();
                let productos = response.productos;
                if(productos.length > 0){
                    productos.forEach(function(producto){
                        console.log(producto);
                        let imagenUrl = producto.producto.image_path || '';
                        if (imagenUrl && !imagenUrl.startsWith('http')) {
                            imagenUrl = '/' + imagenUrl;
                        }

                        let item = `
                            <div class="col-md-4 mb-3">
                                <div class="card h-100">
                                    <img src="${imagenUrl}" class="img-fluid rounded" style="width: 200px; height: 200px;" alt="${producto.producto.nombre}">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">${producto.producto.nombre}</h5>
                                        <p class="card-text">Código: ${producto.producto.codigo_interno || 'N/A'}</p>
                                        <p class="card-text">Marca: ${producto.producto.marca ? producto.producto.marca.nombre : 'N/A'}</p>
                                        <p class="card-text">Tipo: ${producto.producto.tipo_producto ? producto.producto.tipo_producto.nombre : 'N/A'}</p>
                                        <p class="card-text">Stock Actual: ${producto.producto.stock_actual || 0}</p>
                                        <p class="card-text">Precio: $${parseFloat(producto.producto.precio_venta).toFixed(0)}</p>
                                        <button class="btn btn-primary mt-auto" onclick="dame_producto(${producto.id})">Revisar</button>
                                    </div>
                                </div>
                            </div>
                        `;
                        $('#productos-lista').append(item);
                    });
                } else {
                    $('#productos-lista').append('<p>No se encontraron productos.</p>');
                }
            })
            .fail(function(jqXHR) {
                console.error('Error al obtener productos:', jqXHR);
            });
        }

        function mis_audifonos(){
            // Mostrar mensaje de carga
            $('#lista_audifonos_control').html(`
                <div class="col-12">
                    <div class="loading-message">
                        <i class="feather icon-loader"></i>
                        <h5 class="mt-3">Cargando audífonos...</h5>
                        <p class="text-muted">Por favor espere un momento</p>
                    </div>
                </div>
            `);

            let url = "{{ route('laboratorio.paciente.producto.listar') }}";
            let data = {
                id_paciente: $('#id_paciente_fc').val(),
                _token: CSRF_TOKEN
            }

            $.ajax({
                url: url,
                type: "GET",
                data: data,
            })
            .done(function(response) {
                console.log(response);
                $('#lista_audifonos_control').empty();
                let productos = response.productos;

                if(productos.length > 0){
                    productos.forEach(function(producto){
                        let esPrestado = producto.estado == 2; // O producto.producto.estado == 2 según tu estructura

                        let bandaPrestado = '';
                        if (esPrestado) {
                            bandaPrestado = `
                                <span class="badge badge-prestado" style="position: absolute; top: 10px; right: 10px; background: #f6ad55; color: #fff; font-weight: bold; padding: 6px 12px; border-radius: 8px; z-index: 10;">
                                    <i class="feather icon-clock"></i> Prestado
                                </span>
                            `;
                        }

                        // Filtrar solo audífonos
                        if(producto.producto.tipo_producto && producto.producto.tipo_producto.nombre.toLowerCase() !== 'audífonos'){
                            return;
                        }

                        console.log(producto);

                        // Procesar imagen
                        let imagenUrl = producto.producto.image_path || '';
                        if (imagenUrl && !imagenUrl.startsWith('http')) {
                            imagenUrl = '/' + imagenUrl;
                        }
                        if (!imagenUrl) {
                            imagenUrl = '/images/no-image.png';
                        }

                        // Determinar clase de stock
                        let stockActual = parseInt(producto.producto.stock_actual) || 0;
                        let stockClase = 'stock-alto';
                        let stockTexto = 'Stock disponible';

                        if (stockActual === 0) {
                            stockClase = 'stock-bajo';
                            stockTexto = 'Sin stock';
                        } else if (stockActual <= 5) {
                            stockClase = 'stock-medio';
                            stockTexto = 'Stock bajo';
                        } else if (stockActual <= 10) {
                            stockClase = 'stock-medio';
                            stockTexto = 'Stock medio';
                        }

                        // Obtener datos
                        let nombre = producto.producto.nombre || 'Sin nombre';
                        let codigo = producto.producto.codigo_interno || 'N/A';
                        let marca = producto.producto.marca ? producto.producto.marca.nombre : 'N/A';
                        let tipo = producto.producto.tipo_producto ? producto.producto.tipo_producto.nombre : 'N/A';
                        let precio = parseFloat(producto.producto.precio_venta || 0).toLocaleString('es-CL');
                        let lado = producto.lado || 'Ambos lados';

                        let item = `
                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                                <div class="card card-audifono h-100">
                                     ${bandaPrestado}
                                    <!-- Imagen del producto -->
                                    <div class="imagen-container">
                                        <img src="${imagenUrl}"
                                             class="card-img-top"
                                             alt="${nombre}"
                                             onerror="this.src='/images/no-image.png'">
                                        <span class="badge badge-stock ${stockClase}">
                                            <i class="feather icon-package"></i> ${stockTexto} (${stockActual} unidades)
                                        </span>
                                    </div>

                                    <!-- Cuerpo de la card -->
                                    <div class="card-body-audifono" style="padding: 15px;">
                                        <!-- Icono y nombre -->
                                        <div class="producto-header">
                                            <i class="feather icon-headphones icon-producto"></i>
                                            <h6 class="producto-nombre">${nombre}</h6>
                                        </div>

                                        <!-- Información compacta -->
                                        <div class="producto-info">
                                            <div class="info-row">
                                                <i class="feather icon-tag"></i>
                                                <span>Código: <strong>${codigo}</strong></span>
                                            </div>
                                            <div class="info-row">
                                                <i class="feather icon-award"></i>
                                                <span>Marca: <strong>${marca}</strong></span>
                                            </div>
                                            <div class="info-row">
                                                <i class="feather icon-headphones"></i>
                                                <span>Tipo: <strong>${tipo}</strong></span>
                                            </div>
                                            <div class="info-row">
                                                <i class="feather icon-headphones"></i>
                                                <span>Lado: <strong>${lado}</strong></span>
                                            </div>
                                        </div>

                                        <!-- Precio -->
                                        <div class="producto-precio">
                                            $${precio}
                                        </div>

                                        <!-- Botones de acción -->
                                        <div class="botones-accion" style="display: grid; grid-template-columns: 1fr 1fr; gap: 8px; margin-top: 10px; width: 100%;">
                                            <button type="button"
                                                    class="btn-accion btn-calibracion"
                                                    onclick="calib_audif(); dame_audifono(${producto.id}, 'calibracion')"
                                                    style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 12px 6px; border: none; border-radius: 8px; font-size: 0.75rem; font-weight: 600; cursor: pointer; text-align: center; background: #5a67d8; background-color: #5a67d8; color: white; box-shadow: 0 2px 6px rgba(0,0,0,0.12); min-width: 0; width: 100%;">
                                                <i class="feather icon-settings" style="font-size: 1.5rem; margin-bottom: 4px; display: block;"></i>
                                                <span style="display: block; line-height: 1.2; font-size: 0.75rem;">Calibración</span>
                                            </button>
                                            <button type="button"
                                                    class="btn-accion btn-reparacion"
                                                    onclick="reparacion_audif(); dame_audifono(${producto.id}, 'reparacion')"
                                                    style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 12px 6px; border: none; border-radius: 8px; font-size: 0.75rem; font-weight: 600; cursor: pointer; text-align: center; background: #ed8936; background-color: #ed8936; color: white; box-shadow: 0 2px 6px rgba(0,0,0,0.12); min-width: 0; width: 100%;">
                                                <i class="feather icon-settings" style="font-size: 1.5rem; margin-bottom: 4px; display: block;"></i>
                                                <span style="display: block; line-height: 1.2; font-size: 0.75rem;">Reparación</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;

                        $('#lista_audifonos_control').append(item);
                    });

                    // Agregar eventos hover a los botones después de crearlos
                    $('#lista_audifonos_control .btn-calibracion').hover(
                        function() {
                            $(this).css({
                                'background': '#4c51bf',
                                'background-color': '#4c51bf',
                                'transform': 'translateY(-2px)',
                                'box-shadow': '0 4px 12px rgba(0,0,0,0.2)'
                            });
                        },
                        function() {
                            $(this).css({
                                'background': '#5a67d8',
                                'background-color': '#5a67d8',
                                'transform': 'translateY(0)',
                                'box-shadow': '0 2px 6px rgba(0,0,0,0.12)'
                            });
                        }
                    );

                    $('#lista_audifonos_control .btn-reparacion').hover(
                        function() {
                            $(this).css({
                                'background': '#dd6b20',
                                'background-color': '#dd6b20',
                                'transform': 'translateY(-2px)',
                                'box-shadow': '0 4px 12px rgba(0,0,0,0.2)'
                            });
                        },
                        function() {
                            $(this).css({
                                'background': '#ed8936',
                                'background-color': '#ed8936',
                                'transform': 'translateY(0)',
                                'box-shadow': '0 2px 6px rgba(0,0,0,0.12)'
                            });
                        }
                    );
                } else {
                    // Mensaje cuando no hay productos
                    let emptyMessage = `
                        <div class="col-12">
                            <div class="empty-message">
                                <i class="feather icon-inbox"></i>
                                <h5 class="mt-3">No se encontraron audífonos</h5>
                                <p class="text-muted">Este paciente no tiene audífonos registrados en el sistema.</p>
                            </div>
                        </div>
                    `;
                    $('#lista_audifonos_control').append(emptyMessage);
                }
            })
            .fail(function(jqXHR) {
                console.error('Error al obtener productos:', jqXHR);

                // Mostrar mensaje de error amigable
                $('#lista_audifonos_control').html(`
                    <div class="col-12">
                        <div class="alert alert-danger text-center" role="alert">
                            <i class="feather icon-alert-circle" style="font-size: 2rem;"></i>
                            <h5 class="mt-3">Error al cargar los audífonos</h5>
                            <p>No se pudieron obtener los datos del servidor. Por favor intente nuevamente.</p>
                            <button class="btn btn-danger mt-2" onclick="mis_audifonos()">
                                <i class="feather icon-refresh-cw"></i> Reintentar
                            </button>
                        </div>
                    </div>
                `);
            });
        }

        /**
         * Mostrar calificación con estrellas
         * @param {number|null} satisfaccion - Nivel de satisfacción (1-5 o null)
         */
        function mostrarCalificacionEstrellas(satisfaccion) {
            const container = $('#detalle-calificacion');

            // Si no hay calificación
            if (!satisfaccion || satisfaccion === null || satisfaccion === 0) {
                container.html('<span class="text-muted">Sin calificar</span>');
                return;
            }

            // Textos descriptivos por nivel
            const textos = {
                1: 'Muy insatisfecho',
                2: 'Insatisfecho',
                3: 'Neutral',
                4: 'Satisfecho',
                5: 'Muy satisfecho'
            };

            // Generar estrellas
            let estrellasHTML = '<div class="rating-display">';
            estrellasHTML += '<div class="rating-stars">';

            for (let i = 1; i <= 5; i++) {
                if (i <= satisfaccion) {
                    // Estrella llena
                    estrellasHTML += `<i class="fas fa-star rating-${satisfaccion}"></i>`;
                } else {
                    // Estrella vacía
                    estrellasHTML += '<i class="far fa-star star-empty"></i>';
                }
            }

            estrellasHTML += '</div>';
            estrellasHTML += `<span class="rating-text">(<span class="rating-value">${satisfaccion}/5</span> - ${textos[satisfaccion]})</span>`;
            estrellasHTML += '</div>';

            container.html(estrellasHTML);
        }

        function guardar_evaluacion_producto(){
            let id_producto = $('#id_producto_seleccionado').val();
            let id_paciente = $('#id_paciente_fc').val();
            let satisfaccion = $('#nivel_satisfaccion').val();
            let observaciones = $('#observaciones_satisfaccion').val();
            if(!id_producto){
                swal('Error', 'No se ha seleccionado ningún producto', 'error');
                return;
            }
            if(!satisfaccion || satisfaccion < 1 || satisfaccion > 5){
                swal('Error', 'Debe seleccionar una valoración válida', 'error');
                return;
            }

            let url = "{{ route('laboratorio.paciente.producto.evaluar') }}";
            let data = {
                id_producto: id_producto,
                id_paciente: id_paciente,
                satisfaccion: satisfaccion,
                observaciones: observaciones,
                _token: CSRF_TOKEN
            };

            $.ajax({
                url: url,
                type: "POST",
                data: data,
            })
            .done(function(response) {
                console.log(response);
                if(response.estado === 1){
                    // Actualizar visualización de estrellas
                    mostrarCalificacionEstrellas(satisfaccion);

                    swal({
                        icon: 'success',
                        title: '¡Gracias por su evaluación!',
                        text: response.mensaje || 'Su valoración ha sido registrada.',
                        buttons: false,
                        timer: 2000
                    });

                    // Limpiar formulario
                    $('#nivel_satisfaccion').val('');
                    $('#observaciones_satisfaccion').val('');

                    // Opcional: recargar lista de productos
                    // cargar_productos_paciente();
                } else {
                    swal('Error', response.mensaje || 'No se pudo guardar la evaluación', 'error');
                }
            })
            .fail(function(jqXHR) {
                console.error('Error al guardar evaluación:', jqXHR);
                swal('Error', 'No se pudo comunicar con el servidor', 'error');
            });
        }

        /**
         * Evaluar tipo de control de audífono
         * Muestra u oculta el formulario según el tipo seleccionado
         */
        function evaluar_tipo_control(){
            let tipo_control = $('#tipo_control_audifono').val();
            console.log('Tipo de control seleccionado:', tipo_control);
            if(tipo_control === 'Otro proveedor'){
                $('#div_otro_proveedor').removeClass('d-none');
                $('#lista_audifonos_control').addClass('d-none');
                dame_audifonos_externos();
            } else {
                $('#div_otro_proveedor').addClass('d-none');
                $('#lista_audifonos_control').removeClass('d-none');
            }
        }

        function dame_audifonos_externos(){
            let id_paciente = $('#id_paciente_externo').val();
            let url = "{{ route('laboratorio.audifono.externo.listar') }}";
            let data = {
                id_paciente: id_paciente,
                _token: CSRF_TOKEN
            };

            // Mostrar mensaje de carga
            $('#lista_audifonos_externos').html(`
                <div class="col-12">
                    <div class="loading-message">
                        <i class="feather icon-loader"></i>
                        <h5 class="mt-3">Cargando audífonos externos...</h5>
                        <p class="text-muted">Por favor espere un momento</p>
                    </div>
                </div>
            `);
            $.ajax({
                url: url,
                type: "GET",
                data: data,
            })
            .done(function(response) {
                console.log(response);
                $('#lista_audifonos_externos').empty();
                let audifonos = response.audifonos;
                if(audifonos.length > 0){
                    audifonos.forEach(function(audifono){
                        console.log(audifono);

                        // Formatear fecha
                        let fechaAdq = new Date(audifono.fecha_adquisicion);
                        let fechaAdqStr = fechaAdq.toLocaleDateString('es-CL');

                        let item = `
                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                                <div class="card h-100">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">Proveedor: ${audifono.procedencia_laboratorio}</h5>
                                        <p class="card-text">Fecha Adquisición: ${fechaAdqStr}</p>
                                        <hr>
                                        <h6>Audífono Izquierdo</h6>
                                        <p class="card-text">Marca: ${audifono.marca_izquierdo || 'N/A'}</p>
                                        <p class="card-text">Modelo: ${audifono.modelo_izquierdo || 'N/A'}</p>
                                        <p class="card-text">N° Serie: ${audifono.n_serie_izquierdo || 'N/A'}</p>
                                        <hr>
                                        <h6>Audífono Derecho</h6>
                                        <p class="card-text">Marca: ${audifono.marca_derecho || 'N/A'}</p>
                                        <p class="card-text">Modelo: ${audifono.modelo_derecho || 'N/A'}</p>
                                        <p class="card-text">N° Serie: ${audifono.n_serie_derecho || 'N/A'}</p>
                                        <hr>
                                        <p class="card-text">Estado: ${audifono.estado_audifono || 'N/A'}</p>
                                        <p class="card-text">Motivo Control: ${audifono.motivo_control || 'N/A'}</p>
                                        <p class="card-text">Observaciones: ${audifono.observaciones || 'N/A'}</p>
                                    </div>
                                </div>
                            </div>
                        `;
                        $('#lista_audifonos_externos').append(item);
                    });
                } else {
                    $('#lista_audifonos_externos').append('<p>No se encontraron audífonos externos.</p>');
                }
            })
            .fail(function(jqXHR) {
                console.error('Error al obtener audífonos externos:', jqXHR);
                $('#lista_audifonos_externos').html('<p>Error al cargar audífonos externos.</p>');
            });

        }

        /**
         * Validar formulario de audífono externo
         * @returns {boolean}
         */
        function validar_formulario_audifono_externo(){
            let errores = [];

            // Validar procedencia
            if($('#procedencia_laboratorio').val().trim() === ''){
                errores.push('Debe ingresar el laboratorio o proveedor');
            }

            // Validar fecha de adquisición
            if($('#fecha_adquisicion_ext').val() === ''){
                errores.push('Debe ingresar la fecha de adquisición');
            }

            // Validar audífono izquierdo
            if($('#marca_izq_ext').val().trim() === ''){
                errores.push('Debe ingresar la marca del audífono izquierdo');
            }
            if($('#modelo_izq_ext').val().trim() === ''){
                errores.push('Debe ingresar el modelo del audífono izquierdo');
            }

            // Validar audífono derecho
            if($('#marca_der_ext').val().trim() === ''){
                errores.push('Debe ingresar la marca del audífono derecho');
            }
            if($('#modelo_der_ext').val().trim() === ''){
                errores.push('Debe ingresar el modelo del audífono derecho');
            }

            if(errores.length > 0){
                let mensaje = '<ul class="text-left mb-0">';
                errores.forEach(function(error){
                    mensaje += '<li>' + error + '</li>';
                });
                mensaje += '</ul>';

                swal({
                    icon: 'warning',
                    title: 'Faltan datos obligatorios',
                    content: {
                        element: 'div',
                        attributes: {
                            innerHTML: mensaje
                        }
                    }
                });
                return false;
            }

            return true;
        }

        /**
         * Obtener datos del formulario de audífono externo
         * @returns {Object}
         */
        function obtener_datos_audifono_externo(){
            return {
                id_paciente: $('#id_paciente_externo').val(),
                procedencia_laboratorio: $('#procedencia_laboratorio').val().trim(),
                fecha_adquisicion: $('#fecha_adquisicion_ext').val(),

                // Audífono izquierdo
                n_serie_izquierdo: $('#n_serie_izq_ext').val().trim(),
                marca_izquierdo: $('#marca_izq_ext').val().trim(),
                modelo_izquierdo: $('#modelo_izq_ext').val().trim(),
                tipo_izquierdo: $('#tipo_izq_ext').val(),

                // Audífono derecho
                n_serie_derecho: $('#n_serie_der_ext').val().trim(),
                marca_derecho: $('#marca_der_ext').val().trim(),
                modelo_derecho: $('#modelo_der_ext').val().trim(),
                tipo_derecho: $('#tipo_der_ext').val(),

                // Información adicional
                estado_audifono: $('#estado_audifono_ext').val(),
                motivo_control: $('#motivo_control_ext').val(),
                observaciones: $('#observaciones_control_ext').val().trim(),

                // Datos del control
                fecha_control: $('#fecha_ex').val(),
                examinador: $('#profesional').val(),
                examen_cae: $('#ex_fis_control_audif').val(),

                _token: CSRF_TOKEN
            };
        }

        /**
         * Guardar audífono externo
         */
        function guardar_audifono_externo(){
            console.log('Guardando audífono externo...');

            // Validar formulario
            if(!validar_formulario_audifono_externo()){
                return;
            }

            // Obtener datos
            let datos = obtener_datos_audifono_externo();
            console.log('Datos a enviar:', datos);

            // Mostrar confirmación
            swal({
                title: '¿Guardar audífono externo?',
                text: 'Se registrará el audífono del proveedor: ' + datos.procedencia_laboratorio,
                icon: 'question',
                buttons: {
                    cancel: {
                        text: 'Cancelar',
                        value: null,
                        visible: true,
                        className: 'btn-secondary',
                        closeModal: true,
                    },
                    confirm: {
                        text: 'Sí, guardar',
                        value: true,
                        visible: true,
                        className: 'btn-primary',
                        closeModal: false
                    }
                }
            }).then((confirmar) => {
                if (confirmar) {
                    // Aquí irá la petición AJAX cuando esté listo el backend
                    console.log('Datos que se enviarían al backend:', datos);

                    // Simulación de guardado exitoso (comentar cuando esté el backend)
                    // setTimeout(function(){
                    //     swal({
                    //         icon: 'success',
                    //         title: 'Audífono registrado',
                    //         text: 'El audífono externo ha sido registrado correctamente',
                    //         buttons: false,
                    //         timer: 2000
                    //     }).then(() => {
                    //         limpiar_formulario_audifono_externo();
                    //         // Opcional: recargar lista de audífonos
                    //         // mis_audifonos();
                    //     });
                    // }, 500);

                    let url = "{{ route('laboratorio.audifono.externo.guardar') }}";
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: datos,
                    })
                    .done(function(response) {
                        console.log('Respuesta del servidor:', response);
                        if(response.estado === 1){
                            swal({
                                icon: 'success',
                                title: 'Audífono registrado',
                                text: response.mensaje || 'El audífono externo ha sido registrado correctamente',
                                buttons: false,
                                timer: 2000
                            }).then(() => {
                                limpiar_formulario_audifono_externo();
                                // Recargar lista de audífonos
                                mis_audifonos();
                            });
                        } else {
                            swal('Error', response.mensaje || 'No se pudo guardar el audífono', 'error');
                        }
                    })
                    .fail(function(jqXHR) {
                        console.error('Error al guardar:', jqXHR);
                        swal({
                            icon: 'error',
                            title: 'Error',
                            text: 'Ocurrió un error al guardar el audífono externo'
                        });
                    });

                }
            });
        }

        /**
         * Limpiar formulario de audífono externo
         */
        function limpiar_formulario_audifono_externo(){
            $('#form_audifono_externo')[0].reset();
            $('#procedencia_laboratorio').val('');
            $('#fecha_adquisicion_ext').val('');

            // Audífono izquierdo
            $('#n_serie_izq_ext').val('');
            $('#marca_izq_ext').val('');
            $('#modelo_izq_ext').val('');
            $('#tipo_izq_ext').val('');

            // Audífono derecho
            $('#n_serie_der_ext').val('');
            $('#marca_der_ext').val('');
            $('#modelo_der_ext').val('');
            $('#tipo_der_ext').val('');

            // Información adicional
            $('#estado_audifono_ext').val('Bueno');
            $('#motivo_control_ext').val('');
            $('#observaciones_control_ext').val('');

            console.log('Formulario limpiado');
        }

        /**
         * Cancelar registro de audífono externo
         */
        function cancelar_audifono_externo(){
            swal({
                title: '¿Cancelar registro?',
                text: 'Se perderán los datos ingresados',
                icon: 'warning',
                buttons: {
                    cancel: {
                        text: 'No, continuar editando',
                        value: null,
                        visible: true,
                        className: 'btn-secondary',
                        closeModal: true,
                    },
                    confirm: {
                        text: 'Sí, cancelar',
                        value: true,
                        visible: true,
                        className: 'btn-danger',
                        closeModal: true
                    }
                }
            }).then((confirmar) => {
                if (confirmar) {
                    limpiar_formulario_audifono_externo();
                    $('#tipo_control_audifono').val('Seleccione');
                    evaluar_tipo_control();
                    swal({
                        icon: 'info',
                        title: 'Registro cancelado',
                        buttons: false,
                        timer: 1500
                    });
                }
            });
        }

        function guardar_observaciones_terapia_voz(){


            let id_ficha = $('#id_fc').val();
            let id_lugar_atencion = $('#id_lugar_atencion').val();
            let id_paciente = $('#id_paciente_fc').val();
            let id_profesional = $('#id_profesional_fc').val();
            let numero_sesion = $('#etv_ses_num').val();
            let tipo_terapia = $('#etv_tipo_terapia').val();
            let comentarios = $('#etv_comentario').val();

            console.log(id_ficha, id_lugar_atencion, id_paciente, id_profesional, numero_sesion, tipo_terapia, comentarios);

            if(!id_paciente || !id_profesional || !numero_sesion || !tipo_terapia || !id_ficha){
                swal('Error', 'Faltan datos obligatorios para guardar la terapia de voz', 'error');
                return;
            }

            let url = "{{ route('laboratorio.profesional.guardar_terapia_voz') }}";
            let data = {
                id_ficha: id_ficha,
                id_lugar_atencion: id_lugar_atencion,
                id_paciente: id_paciente,
                id_profesional: id_profesional,
                numero_sesion: numero_sesion,
                tipo_terapia: tipo_terapia,
                comentarios: comentarios,
                _token: CSRF_TOKEN
            };

            $.ajax({
                url: url,
                type: "POST",
                data: data,
            })
            .done(function(response) {
                console.log(response);
                if(response.estado === 1){
                    swal({
                        icon: 'success',
                        title: 'Terapia guardada',
                        text: response.mensaje || 'La terapia de voz ha sido registrada correctamente',
                        buttons: false,
                        timer: 2000
                    });

                    // Limpiar formulario
                    // $('#form_terapia_voz')[0].reset();
                    $('#fecha_terapia').val(new Date().toISOString().slice(0,10));
                    $('#hora_terapia').val(new Date().toTimeString().slice(0,5));
                    dame_sesiones_terapia_voz();
                } else {
                    swal('Error', response.mensaje || 'No se pudo guardar la terapia', 'error');
                }
            })
            .fail(function(jqXHR) {
                console.error('Error al guardar terapia:', jqXHR);
                swal('Error', 'No se pudo comunicar con el servidor', 'error');
            });
        }

        function dame_sesiones_terapia_voz(){
            let id_ficha = $('#id_fc').val();
            let url = "{{ route('laboratorio.profesional.dame_sesiones_terapia_voz')}}";

            let data = {
                id_ficha: id_ficha,
                _token: CSRF_TOKEN
            };

            $.ajax({
                url: url,
                type: "GET",
                data: data,
            })
            .done(function(response) {
                console.log(response);
                if(response.estado === 1){
                    // Procesar las sesiones de terapia de voz
                    let table = $('#tabla_observaciones_terapia_voz').DataTable();
                    table.clear().draw();
                    let sesiones = response.data;
                    sesiones.forEach(function(sesion) {
                        let fecha = new Date(sesion.created_at).toLocaleDateString('es-CL');
                        let hora = new Date(sesion.created_at).toLocaleTimeString('es-CL', { hour: '2-digit', minute: '2-digit' });
                        if(sesion.estado == 1){
                            var estado = '<span class="badge badge-success">Activa</span>';
                        }else{
                            var estado = '<span class="badge badge-secondary">Inactiva</span>';
                        }
                        let fila = [
                            sesion.numero_sesion,
                            sesion.tipo_terapia,
                            sesion.comentarios,
                            `${fecha} ${hora}`,
                            sesion.profesional ? sesion.profesional.nombre + ' ' + sesion.profesional.apellido : 'N/A',
                            estado
                        ];
                        table.row.add(fila).draw();
                    });

                    // Inicializar el editor CKEditor para Terapia de Voz después de cargar los datos
                    console.log('🎯 Inicializando editor Terapia Voz desde dame_sesiones_terapia_voz...');
                    setTimeout(() => {
                        //agregar_observaciones_terapia_voz();
                    }, 200);
                } else {
                    swal('Error', response.mensaje || 'No se pudo obtener las sesiones de terapia de voz', 'error');
                }
            })
            .fail(function(jqXHR) {
                console.error('Error al obtener sesiones de terapia de voz:', jqXHR);
                swal('Error', 'No se pudo comunicar con el servidor', 'error');
            });
        }

        function guardar_observaciones_vppb(){
            let id_ficha = $('#id_fc').val();
            let id_lugar_atencion = $('#id_lugar_atencion').val();
            let id_paciente = $('#id_paciente_fc').val();
            let id_profesional = $('#id_profesional_fc').val();
            let numero_sesion = $('#vppb_ses_num').val();
            let tipo_terapia = $('#vppb_tipo_terapia').val();
            let comentarios = $('#vppb_comentario').val();

            console.log(id_ficha, id_lugar_atencion, id_paciente, id_profesional, numero_sesion, tipo_terapia, comentarios);

            if(!id_paciente || !id_profesional || !id_ficha || !numero_sesion || !tipo_terapia || !comentarios){
                swal('Error', 'Faltan datos obligatorios para guardar las observaciones VPPB', 'error');
                return;
            }

            let url = "{{ route('laboratorio.profesional.guardar_vppb') }}";
            let data = {
                id_ficha: id_ficha,
                id_lugar_atencion: id_lugar_atencion,
                id_paciente: id_paciente,
                id_profesional: id_profesional,
                numero_sesion: numero_sesion,
                tipo_terapia: tipo_terapia,
                comentarios: comentarios,
                _token: CSRF_TOKEN
            };

            $.ajax({
                url: url,
                type: "POST",
                data: data,
            })
            .done(function(response) {
                console.log(response);
                if(response.estado === 1){
                    swal({
                        icon: 'success',
                        title: 'Observaciones guardadas',
                        text: response.mensaje || 'Las observaciones VPPB han sido registradas correctamente',
                        buttons: false,
                        timer: 2000
                    });

                    // Limpiar formulario
                    // $('#form_vppb')[0].reset();
                    dame_sesiones_vppb();
                } else {
                    swal('Error', response.mensaje || 'No se pudo guardar las observaciones VPPB', 'error');
                }
            })
            .fail(function(jqXHR) {
                console.error('Error al guardar observaciones VPPB:', jqXHR);
                swal('Error', 'No se pudo comunicar con el servidor', 'error');
            });
        }

        function dame_sesiones_vppb(){
            let id_ficha = $('#id_fc').val();
            let url = "{{ route('laboratorio.profesional.dame_sesiones_vppb')}}";

            let data = {
                id_ficha: id_ficha,
                _token: CSRF_TOKEN
            };

            $.ajax({
                url: url,
                type: "GET",
                data: data,
            })
            .done(function(response) {
                console.log(response);
                if(response.estado === 1){
                    // Procesar las sesiones VPPB
                    let table = $('#tabla_observaciones_vppb').DataTable();
                    table.clear().draw();
                    let sesiones = response.data;
                    sesiones.forEach(function(sesion) {
                        let fecha = new Date(sesion.created_at).toLocaleDateString('es-CL');
                        let hora = new Date(sesion.created_at).toLocaleTimeString('es-CL', { hour: '2-digit', minute: '2-digit' });
                        if(sesion.estado == 1){
                            var estado = '<span class="badge badge-success">Activa</span>';
                        }else{
                            var estado = '<span class="badge badge-secondary">Inactiva</span>';
                        }
                        let fila = [
                            sesion.numero_sesion,
                            sesion.tipo_terapia,
                            sesion.comentarios,
                            `${fecha} ${hora}`,
                            sesion.profesional ? sesion.profesional.nombre + ' ' + sesion.profesional.apellido : 'N/A',
                            estado
                        ];
                        table.row.add(fila).draw();
                    });

                    // Inicializar solo el editor CKEditor para VPPB después de cargar los datos
                    console.log('🎯 Inicializando solo editor VPPB desde dame_sesiones_vppb...');
                    setTimeout(() => {
                        inicializar_editor_vppb();
                    }, 200);
                } else {
                    swal('Error', response.mensaje || 'No se pudo obtener las sesiones VPPB', 'error');
                }
            })
            .fail(function(jqXHR) {
                console.error('Error al obtener sesiones VPPB:', jqXHR);
                swal('Error', 'No se pudo comunicar con el servidor', 'error');
            });
        }

        // Función auxiliar para mapear procedimientos
        function mapear_procedimientos(id_procedimiento) {
            if (!id_procedimiento) return 'N/A';

            // Mapear IDs conocidos de procedimientos
            const procedimientos_map = {
                '1': 'Consulta General',
                '2': 'Octavo Par',
                '3': 'Lavado de Oídos',
                '4': 'Audiometría Adulto',
                '5': 'Audiometría Niños',
                '6': 'Impedanciometría',
                '7': 'VPPB',
                '8': 'Terapia de Voz'
            };

            // Si viene con formato "2|4", separar y mapear cada uno
            if (id_procedimiento.includes('|')) {
                return id_procedimiento.split('|')
                    .map(id => procedimientos_map[id.trim()] || `Proc. ${id.trim()}`)
                    .join(', ');
            }

            return procedimientos_map[id_procedimiento] || `Procedimiento ${id_procedimiento}`;
        }

        // Función auxiliar para obtener estado de atención
        function obtener_estado_atencion(id_estado, finalizada) {
            const estados = {
                1: { texto: 'Agendada', clase: 'secondary' },
                2: { texto: 'Confirmada', clase: 'info' },
                3: { texto: 'Cancelada', clase: 'danger' },
                4: { texto: 'En Progreso', clase: 'warning' },
                5: { texto: 'Realizada', clase: 'success' },
                6: { texto: 'Finalizada', clase: 'primary' }
            };

            let estado_info = estados[id_estado] || { texto: `Estado ${id_estado}`, clase: 'light' };

            // Si está finalizada, darle prioridad
            if (finalizada == 1) {
                estado_info = { texto: 'Finalizada', clase: 'primary' };
            }

            return `<span class="badge badge-${estado_info.clase}">${estado_info.texto}</span>`;
        }

        // Variable para controlar si ya se está ejecutando la función
        var cargando_atenciones_previas = false;

        /**
         * Muestra un modal con los archivos adjuntos de una atención
         * @param {string} archivoDataEncoded - Datos del archivo codificados en URL
         * @param {string} fecha - Fecha de la atención
         * @param {string} profesional - Nombre del profesional
         */
        function mostrarArchivosAdjuntos(archivoDataEncoded, fecha, profesional) {
            try {
                // Decodificar los datos del archivo
                let archivoDataString = decodeURIComponent(archivoDataEncoded);
                let archivos = JSON.parse(archivoDataString);

                console.log('📎 Mostrando archivos adjuntos:', archivos);

                // Actualizar el título del modal
                $('#modalArchivosAdjuntosLabel').html(`
                    <i class="feather icon-paperclip"></i> Archivos Adjuntos
                    <small class="text-muted d-block" style="font-size: 0.8em;">
                        ${fecha} - ${profesional}
                    </small>
                `);

                // Limpiar el contenido previo
                $('#listaArchivosAdjuntos').empty();

                if (Array.isArray(archivos) && archivos.length > 0) {
                    // Generar HTML para cada archivo
                    archivos.forEach((archivo, index) => {
                        let extension = archivo.nombre ? archivo.nombre.split('.').pop().toLowerCase() : '';
                        let iconoArchivo = obtenerIconoArchivo(extension);

                        let archivoHtml = `
                            <div class="archivo-item">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="flex-grow-1">
                                        <div class="archivo-nombre">
                                            <i class="${iconoArchivo}"></i>
                                            ${archivo.nombre || 'Archivo sin nombre'}
                                        </div>
                                        <div class="archivo-url">
                                            ${archivo.url || 'URL no disponible'}
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0 ml-3">
                                        ${archivo.url ? `
                                            <a href="${archivo.url}" target="_blank" class="btn btn-sm btn-outline-primary">
                                                <i class="feather icon-download"></i> Descargar
                                            </a>
                                        ` : `
                                            <span class="text-muted">No disponible</span>
                                        `}
                                    </div>
                                </div>
                            </div>
                        `;

                        $('#listaArchivosAdjuntos').append(archivoHtml);
                    });
                } else {
                    $('#listaArchivosAdjuntos').html(`
                        <div class="text-center text-muted py-4">
                            <i class="feather icon-file-text f-48 d-block mb-3" style="font-size: 3rem; opacity: 0.5;"></i>
                            <p>No hay archivos adjuntos disponibles</p>
                        </div>
                    `);
                }

                // Mostrar el modal
                $('#modalArchivosAdjuntos').modal('show');

            } catch (error) {
                console.error('❌ Error al procesar archivos adjuntos:', error);
                swal('Error', 'No se pudieron cargar los archivos adjuntos', 'error');
            }
        }

        /**
         * Obtiene el icono apropiado según la extensión del archivo
         * @param {string} extension - Extensión del archivo
         * @returns {string} Clase del icono
         */
        function obtenerIconoArchivo(extension) {
            const iconos = {
                'pdf': 'feather icon-file-text text-danger',
                'doc': 'feather icon-file-text text-primary',
                'docx': 'feather icon-file-text text-primary',
                'xls': 'feather icon-file-text text-success',
                'xlsx': 'feather icon-file-text text-success',
                'jpg': 'feather icon-image text-warning',
                'jpeg': 'feather icon-image text-warning',
                'png': 'feather icon-image text-warning',
                'gif': 'feather icon-image text-warning',
                'zip': 'feather icon-archive text-secondary',
                'rar': 'feather icon-archive text-secondary',
                'txt': 'feather icon-file-text text-muted'
            };

            return iconos[extension] || 'feather icon-file text-info';
        }

        function dame_atenciones_previas_lab(){
            // Evitar múltiples ejecuciones simultáneas
            if (cargando_atenciones_previas) {
                console.log('⏳ Ya se están cargando las atenciones previas...');
                return;
            }

            cargando_atenciones_previas = true;

            let id_profesional = $('#id_profesional_fc').val();
            let id_paciente = $('#id_paciente_fc').val();
            let id_hora = $('#hora_medica').val();
            let id_lugar_atencion = $('#id_lugar_atencion').val();
            let id_ficha_atencion = $('#id_fc').val();
            let url = "{{ route('laboratorio.profesional.dame_atenciones_previas_lab')}}";
            let data = {
                id_profesional: id_profesional,
                id_paciente: id_paciente,
                id_hora: id_hora,
                id_lugar_atencion: id_lugar_atencion,
                id_ficha_atencion: id_ficha_atencion,
                _token: CSRF_TOKEN
            };

            console.log('📋 Buscando atenciones previas...');

            // LIMPIEZA COMPLETA ANTES DE EMPEZAR
            // Destruir DataTable si ya existe
            if ($.fn.DataTable.isDataTable('#tabla_atenciones_previas_lab')) {
                $('#tabla_atenciones_previas_lab').DataTable().destroy();
                console.log('🗑️ DataTable anterior destruido');
            }

            // Limpiar completamente el tbody
            $('#atenciones-previas-body').empty();
            console.log('🧹 Tbody limpiado');

            $.ajax({
                url: url,
                type: "GET",
                data: data,
            })
            .done(function(response) {
                console.log('✅ Respuesta atenciones previas:', response);

                if(response.estado === 1){
                    let atenciones = response.atenciones || [];

                    // Asegurar que el tbody esté vacío
                    $('#atenciones-previas-body').empty();

                    let tabla;

                    if(atenciones.length > 0) {
                        // Hay datos - crear filas HTML primero
                        atenciones.forEach(function(atencion){
                            // Formatear fecha con mejor legibilidad
                            let fechaPartes = atencion.fecha_consulta.split('-');
                            let fechaObj = new Date(fechaPartes[0], fechaPartes[1] - 1, fechaPartes[2]); // Año, Mes-1, Día
                            let fecha = fechaObj.toLocaleDateString('es-CL', {
                                day: '2-digit',
                                month: '2-digit',
                                year: 'numeric'
                            });

                            // Formatear hora con rango
                            let hora_inicio = atencion.hora_inicio ? atencion.hora_inicio.substring(0, 5) : '';
                            let hora_termino = atencion.hora_termino ? atencion.hora_termino.substring(0, 5) : '';
                            let hora = hora_inicio;
                            if (hora_termino && hora_termino !== hora_inicio) {
                                hora += ` - ${hora_termino}`;
                            }
                            if (!hora) hora = 'N/A';

                            // Profesional con información adicional
                            let profesional = atencion.profesional ?
                                `${atencion.profesional.nombre} ${atencion.profesional.apellido_uno}` :
                                `Profesional ${atencion.id_profesional}`;

                            let lugar_atencion = atencion.lugar_atencion.nombre || `Lugar ${atencion.id_lugar_atencion}`;

                            // Obtener estado usando la función auxiliar
                            let estado = obtener_estado_atencion(atencion.id_estado, atencion.finalizada);

                            // Información adicional en tooltips
                            let info_adicional = [];
                            if(atencion.motivo) {
                                info_adicional.push(`Motivo: ${atencion.motivo}`);
                            }

                            // Usar los procedimientos que vienen del backend
                            if(atencion.procedimientos && atencion.procedimientos.length > 0) {
                                let procedimientos_nombres = atencion.procedimientos.map(proc => proc.descripcion).join(', ');
                                info_adicional.push(`Procedimientos: ${procedimientos_nombres}`);
                            } else if(atencion.procedimientos_texto && atencion.procedimientos_texto.trim() !== '') {
                                info_adicional.push(`Procedimientos: ${atencion.procedimientos_texto}`);
                            } else if(atencion.id_procedimiento) {
                                // Fallback al mapeo manual si no vienen los procedimientos del backend
                                let procedimientos = mapear_procedimientos(atencion.id_procedimiento);
                                info_adicional.push(`Procedimientos: ${procedimientos}`);
                            }

                            if(atencion.hipotesis_diagnostico) {
                                info_adicional.push(`Diagnóstico: ${atencion.hipotesis_diagnostico}`);
                            }

                            let tooltip = info_adicional.length > 0 ?
                                `title="${info_adicional.join(' | ')}"` : '';

                            // Icono de archivo si existe
                            let archivo_icono = '';
                            if(atencion.archivo && atencion.archivo !== 'null') {
                                // Codificar los datos del archivo para pasarlos al modal
                                let archivoData = encodeURIComponent(atencion.archivo);
                                archivo_icono = ` <i class="feather icon-paperclip text-info cursor-pointer"
                                    title="Ver archivos adjuntos"
                                    onclick="mostrarArchivosAdjuntos('${archivoData}', '${fecha}', '${profesional.replace(/'/g, "\\'")}')"></i>`;
                            }

                            // Preparar texto de procedimientos para mostrar en la tabla
                            let procedimientos_tabla = '';
                            if(atencion.procedimientos && atencion.procedimientos.length > 0) {
                                // Mostrar hasta 2 procedimientos en la tabla, si hay más agregar indicador
                                let procs_mostrar = atencion.procedimientos.slice(0, 2);
                                procedimientos_tabla = procs_mostrar.map(proc =>
                                    `<span class="badge badge-light" title="${proc.descripcion || proc.nombre}${proc.nombre && proc.descripcion ? ` (${proc.nombre})` : ''}">${proc.descripcion || proc.nombre}</span>`
                                ).join(' ');
                                if(atencion.procedimientos.length > 2) {
                                    let restantes = atencion.procedimientos.length - 2;
                                    procedimientos_tabla += ` <small class="text-muted">+${restantes} más</small>`;
                                }
                            } else if(atencion.procedimientos_texto && atencion.procedimientos_texto.trim() !== '') {
                                // Fallback si no hay array de procedimientos pero sí texto
                                let texto = atencion.procedimientos_texto.length > 30
                                    ? atencion.procedimientos_texto.substring(0, 30) + '...'
                                    : atencion.procedimientos_texto;
                                procedimientos_tabla = `<span class="badge badge-secondary" title="${atencion.procedimientos_texto}">${texto}</span>`;
                            } else {
                                procedimientos_tabla = '<span class="text-muted">N/A</span>';
                            }

                            // Crear fila HTML directamente
                            let filaHtml = `
                                <tr>
                                    <td><span ${tooltip}>${fecha}</span></td>
                                    <td>${hora}</td>
                                    <td>${profesional}${archivo_icono}</td>
                                    <td>${procedimientos_tabla}</td>
                                    <td>${lugar_atencion}</td>
                                    <td>${estado}</td>
                                </tr>
                            `;
                            $('#atenciones-previas-body').append(filaHtml);
                        });

                        // Inicializar DataTable después de agregar todas las filas
                        tabla = $('#tabla_atenciones_previas_lab').DataTable({
                            language: {
                                url: "//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json"
                            },
                            responsive: true,
                            pageLength: 10,
                            order: [[0, 'desc']] // Ordenar por fecha descendente
                        });

                        console.log(`✅ Se cargaron ${atenciones.length} atenciones previas`);
                    } else {
                        // No hay datos - mostrar mensaje sin DataTable
                        $('#atenciones-previas-body').html(`
                            <tr>
                                <td colspan="6" class="text-center text-muted py-3">
                                    <i class="feather icon-calendar f-18 d-block mb-2"></i>
                                    No hay atenciones previas registradas
                                </td>
                            </tr>
                        `);
                        console.log('ℹ️ No hay atenciones previas');
                    }
                } else {
                    console.error('❌ Error en la respuesta:', response.mensaje);
                    swal('Error', response.mensaje || 'No se pudieron obtener las atenciones previas', 'error');

                    // Mostrar mensaje de error en la tabla
                    $('#atenciones-previas-body').html(`
                        <tr>
                            <td colspan="6" class="text-center text-warning py-3">
                                <i class="feather icon-alert-circle f-18 d-block mb-2"></i>
                                ${response.mensaje || 'Error al obtener las atenciones previas'}
                            </td>
                        </tr>
                    `);
                }

                // Restablecer variable de control
                cargando_atenciones_previas = false;
            })
            .fail(function(jqXHR) {
                console.error('❌ Error al obtener atenciones previas:', jqXHR);
                swal('Error', 'No se pudo comunicar con el servidor para obtener las atenciones previas', 'error');

                // Limpiar DataTable si existe
                if ($.fn.DataTable.isDataTable('#tabla_atenciones_previas_lab')) {
                    $('#tabla_atenciones_previas_lab').DataTable().destroy();
                }

                // Mostrar mensaje de error en la tabla
                $('#atenciones-previas-body').html(`
                    <tr>
                        <td colspan="6" class="text-center text-danger py-3">
                            <i class="feather icon-alert-triangle f-18 d-block mb-2"></i>
                            Error al cargar atenciones previas
                        </td>
                    </tr>
                `);

                // Restablecer variable de control
                cargando_atenciones_previas = false;
            });
        }

        function finalizar_sesiones(examen){
            console.log('Finalizando sesiones para examen:', examen);
            swal({
                title: '¿Finalizar sesiones?',
                text: 'Esta acción marcará todas las sesiones de este examen como finalizadas. ¿Desea continuar?',
                icon: 'warning',
                buttons: {
                    cancel: {
                        text: 'No, cancelar',
                        value: null,
                        visible: true,
                        className: 'btn-secondary',
                        closeModal: true,
                    },
                    confirm: {
                        text: 'Sí, finalizar',
                        value: true,
                        visible: true,
                        className: 'btn-danger',
                        closeModal: true
                    }
                }
            }).then((confirmar) => {
                if (confirmar) {
                    let id_ficha = $('#id_fc').val();
                    let id_lugar_atencion = $('#id_lugar_atencion').val();
                    let id_paciente = $('#id_paciente_fc').val();
                    let id_profesional = $('#id_profesional_fc').val();

                    let url = "{{ route('laboratorio.profesional.finalizar_sesiones') }}";
                    let data = {
                        id_ficha: id_ficha,
                        id_lugar_atencion: id_lugar_atencion,
                        id_paciente: id_paciente,
                        id_profesional: id_profesional,
                        examen: examen,
                        _token: CSRF_TOKEN
                    };

                    $.ajax({
                        url: url,
                        type: "POST",
                        data: data,
                    })
                    .done(function(response) {
                        console.log(response);
                        if(response.estado === 1){
                            swal({
                                icon: 'success',
                                title: 'Sesiones finalizadas',
                                text: response.mensaje || 'Las sesiones han sido finalizadas correctamente',
                                buttons: false,
                                timer: 2000
                            }).then(() => {
                                // Recargar lista de sesiones según el examen
                                if(examen === 'terapia_voz'){
                                    //dame_sesiones_terapia_voz();
                                } else if(examen === 'vppb'){
                                    //dame_sesiones_vppb();
                                }
                            });
                        } else {
                            swal('Error', response.mensaje || 'No se pudieron finalizar las sesiones', 'error');
                        }
                    })
                    .fail(function(jqXHR) {
                        console.error('Error al finalizar sesiones:', jqXHR);
                        swal('Error', 'No se pudo comunicar con el servidor', 'error');
                    });
                }
            })
        }

        function proxima_atencion_paciente(){
            let id_ficha_atencion = $('#id_fc').val();
            let id_paciente = $('#id_paciente_fc').val();
            let id_lugar_atencion = $('#id_lugar_atencion').val();
            let id_profesional = $('#id_profesional_fc').val();
            let id_hora_medica = $('#hora_medica').val();

            let url = "{{ ROUTE('dental.proxima_atencion_paciente')}}";

            let data = {
                id_ficha_atencion: id_ficha_atencion,
                id_paciente: id_paciente,
                id_lugar_atencion: id_lugar_atencion,
                id_profesional: id_profesional,
                id_hora_medica: id_hora_medica,
                _token: CSRF_TOKEN
            }

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                beforeSend: function(){
                    swal({
                        title: "Cargando...",
                        text: "Por favor, espere mientras se procesa su solicitud.",
                        icon: "info",
                        buttons: false,
                        closeOnClickOutside: false
                    });
                },
                success: function(response) {
                    swal.close();
                    console.log(response);
                    if(response.estado == 'ok'){
                        let fecha = response.fecha_atencion;
                        $('#proxima_fecha_atencion').html(fecha.fecha_consulta);
                        $('#proxima_hora_atencion').html(fecha.hora_inicio+' a '+fecha.hora_termino);
                    }else{
                        $('#proxima_fecha_atencion').html('N/A');
                        $('#proxima_hora_atencion').html('N/A');
                        // swal('Error', response.mensaje, 'error');
                    }

                },
                error: function(error) {
                    swal.close();
                    console.log(error);
                }
            });
        }

    function dame_historial_calibraciones_audifono(){
        let id_producto = $('#id_producto').val();
        let id_paciente = $('#id_paciente_fc').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_profesional = $('#id_profesional_fc').val();

        let url = "{{ route('laboratorio.profesional.dame_historial_calibraciones_audifono') }}";
        let data = {
            id_producto: id_producto,
            id_paciente: id_paciente,
            id_lugar_atencion: id_lugar_atencion,
            id_profesional: id_profesional,
            _token: CSRF_TOKEN
        };

        $.ajax({
            url: url,
            type: "POST",
            data: data,
        })
        .done(function(response) {
         
            if(response.estado === 1){
                // Procesar las calibraciones de audífono
                let table = $('#tabla_historial_calibraciones_audifono').DataTable();
                table.clear().draw();
                let calibraciones = response.data;
                calibraciones.forEach(function(calibracion) {
                    console.log(calibracion);
                    let fecha = new Date(calibracion.created_at).toLocaleDateString('es-CL');
                    let hora = new Date(calibracion.created_at).toLocaleTimeString('es-CL', { hour: '2-digit', minute: '2-digit' });
                    let fila = [
                        fecha + ' ' + hora,
                        calibracion.motivo_control_text || 'N/A',
                        calibracion.estado_audifono_text || 'N/A',
                        calibracion.nombre_producto || 'N/A',
                        calibracion.acciones_calibrado || 'N/A',
                        calibracion.opinion_paciente || 'N/A',
                    ];
                    table.row.add(fila).draw();
                });
            } else {
                swal('Error', response.mensaje || 'No se pudo obtener el historial de calibraciones', 'error');
            }
        })
    }

    function dame_historial_reparaciones_audifono(){
        let id_producto = $('#id_producto').val();
        let id_paciente = $('#id_paciente_fc').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_profesional = $('#id_profesional_fc').val();

        let url = "{{ route('laboratorio.profesional.dame_historial_reparaciones_audifono') }}";
        let data = {
            id_producto: id_producto,
            id_paciente: id_paciente,
            id_lugar_atencion: id_lugar_atencion,
            id_profesional: id_profesional,
            _token: CSRF_TOKEN
        };

        $.ajax({
            url: url,
            type: "POST",
            data: data,
        })
        .done(function(response) {
            console.log(response);
            if(response.estado === 1){
                // Procesar las reparaciones de audífono
                let table = $('#tabla_historial_reparaciones_audifono').DataTable();
                table.clear().draw();
                let reparaciones = response.data;
                reparaciones.forEach(function(reparacion) {
                    let fecha = new Date(reparacion.created_at).toLocaleDateString('es-CL');
                    let hora = new Date(reparacion.created_at).toLocaleTimeString('es-CL', { hour: '2-digit', minute: '2-digit' });
                    let fila = [
                        fecha + ' ' + hora,
                        reparacion.motivo_reparacion,
                        reparacion.estado_reparacion,
                        reparacion.marca_producto + ' ' + reparacion.nombre_producto,
                        reparacion.acciones_reparacion,
                        reparacion.opinion_paciente,
                        reparacion.nombre_producto_reparo
                    ];
                    table.row.add(fila).draw();
                });
            } else {
                swal('Error', response.mensaje || 'No se pudo obtener el historial de reparaciones', 'error');
            }
        })
    }
    </script>

     <script src="{{ asset('js/cotizacion_audifonos.js') }}?v={{ time() }}"></script>
@endsection

{{-- Modal para mostrar archivos adjuntos --}}
<div class="modal fade" id="modalArchivosAdjuntos" tabindex="-1" aria-labelledby="modalArchivosAdjuntosLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalArchivosAdjuntosLabel">
                    <i class="feather icon-paperclip"></i> Archivos Adjuntos
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="listaArchivosAdjuntos">
                    <!-- Contenido se llenará dinámicamente -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

{{-- @include('app.profesional.modales.boton_flotante_agenda_autorizacion') --}}
@include('app.laboratorio.lab_profesional.modal_cont_audifono.calibracion_audifono')
@include('app.laboratorio.lab_profesional.modal_cont_audifono.reparacion_audifono')
