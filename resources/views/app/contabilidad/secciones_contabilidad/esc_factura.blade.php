<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    require_once('../include/head.php');
    ?>
    <link rel="stylesheet" href="../assets/css/escritorio_laboratorio.css">
    <!--Estilos formularios sm-->  
    <link rel="stylesheet" href="../assets/css/formulario_sm.css?t=<?=time()?>">
    <!-- data tables css -->
    <link rel="stylesheet" href="../assets/css/plugins/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/css/plugins/responsive.bootstrap4.min.css">
</head>

<body>
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill">
            </div>
        </div>
    </div>
    <?php
    require_once('../include/menu_admin_general_laboratorio.php');
    require_once('../include/header.php');
    ?>


<!--****Container Completo****-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Administración</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="escritorio_admin_general_laboratorio.php" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="administracion.php">Administración</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="row">
            <!-- [ Invoice ] start -->
            <div class="container" id="printTable">
                <div>
                    <div class="card">
                        <div class="row invoice-contact">
                            <div class="col-md-8">
                                <div class="invoice-box row">
                                    <div class="col-sm-12">
                                        <table class="table table-responsive invoice-table table-borderless p-l-20">
                                            <tbody>
                                                <tr>
                                                    <td><a href="index.html" class="b-brand">
                                                            <img class="img-fluid" src="../assets/images/logos/logo.svg" style="width:50%" alt="Logo_sdi">
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre de empresa </font></font></td>
                                                </tr>
                                                <tr>
                                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1065 Mandan Road, Columbia MO, Misuri. </font><font style="vertical-align: inherit;">(123) -65202</font></font></td>
                                                </tr>
                                                <tr>
                                                    <td><a class="text-secondary" href="mailto:demo@gmail.com" target="_top"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">demo@gmail.com</font></font></a></td>
                                                </tr>
                                                <tr>
                                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">+91919-91-91-919</font></font></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="card-body">
                            <div class="row invoive-info">
                                <div class="col-md-4 col-xs-12 invoice-client-info">
                                    <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Información del cliente :</font></font></h6>
                                    <h6 class="m-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Josephin Villa</font></font></h6>
                                    <p class="m-0 m-t-10"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1065 Mandan Road, Columbia MO, Misuri. </font><font style="vertical-align: inherit;">(123) -65202</font></font></p>
                                    <p class="m-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">(1234) - 567891</font></font></p>
                                    <p><a class="text-secondary" href="mailto:demo@gmail.com" target="_top"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">demo@gmail.com</font></font></a></p>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Información del pedido :</font></font></h6>
                                    <table class="table table-responsive invoice-table invoice-order table-borderless">
                                        <tbody>
                                            <tr>
                                                <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Fecha :</font></font></th>
                                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">14 de noviembre</font></font></td>
                                            </tr>
                                            <tr>
                                                <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Estado :</font></font></th>
                                                <td>
                                                    <span class="label label-warning"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Pendiente</font></font></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Identificación :</font></font></th>
                                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                                    # 146859
                                                </font></font></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <h6 class="m-b-20"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Número de factura </font></font><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"># 125863478945</font></font></span></h6>
                                    <h6 class="text-uppercase text-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Total adeudado:
                                         </font></font><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ 3154.0</font></font></span>
                                    </h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table invoice-detail-table">
                                            <thead>
                                                <tr class="thead-default">
                                                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Descripción</font></font></th>
                                                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cantidad</font></font></th>
                                                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Monto</font></font></th>
                                                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Total</font></font></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Diseño de logo</font></font></h6>
                                                        <p class="m-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt </font></font></p>
                                                    </td>
                                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">6</font></font></td>
                                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">200,00 $</font></font></td>
                                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ 1200.00</font></font></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Diseño de logo</font></font></h6>
                                                        <p class="m-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt </font></font></p>
                                                    </td>
                                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">7</font></font></td>
                                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ 100,00</font></font></td>
                                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">700,00 $</font></font></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Diseño de logo</font></font></h6>
                                                        <p class="m-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt </font></font></p>
                                                    </td>
                                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">5</font></font></td>
                                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ 150,00</font></font></td>
                                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ 750,00</font></font></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-responsive invoice-table invoice-total">
                                        <tbody>
                                            <tr>
                                                <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Total parcial:</font></font></th>
                                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$2650,00</font></font></td>
                                            </tr>
                                            <tr>
                                                <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Descuento (5%):</font></font></th>
                                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$132</font></font></td>
                                            </tr>
                                            <tr>
                                                <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sub-Total:</font></font></th>
                                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$2418</font></font></td>
                                            </tr>
                                            <tr>
                                                <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Impuestos (19%):</font></font></th>
                                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ 504.3</font></font></td>
                                            </tr>
                                           
                                            <tr class="text-info">
                                                <td>
                                                    <hr>
                                                    <h5 class="text-primary m-r-10"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Total:</font></font></h5>
                                                </td>
                                                <td>
                                                    <hr>
                                                    <h5 class="text-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ 3154.0</font></font></h5>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Términos y Condiciones :</font></font></h6>
                                    <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </font><font style="vertical-align: inherit;">Ut enim ad minim veniam, quis nostrud ejercicio ullamco laboris nisi ut aliquip ex ea commodo consequat. </font><font style="vertical-align: inherit;">Duis aute irure dolor
                                    </font></font></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-sm-12 invoice-btn-group text-center">
                            <button type="button" class="btn waves-effect waves-light btn-primary btn-print-invoice m-b-10"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Impresión</font></font></button>
                            <button type="button" class="btn waves-effect waves-light btn-secondary m-b-10 "><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cancelar</font></font></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Invoice ] end -->
        </div>
        </div>
    </div>
</div>
<!--****Cierre Container Completo****-->

<!--Footer-->
<footer>
<?php
require_once('../include/footer.php');
?>
</footer>
<!--Cierre: Footer-->



<!-- Required Js -->
<script src="../assets/js/vendor-all.min.js"></script>
<script src="../assets/js/plugins/bootstrap.min.js"></script>
<script src="../assets/js/ripple.js"></script>
<script src="../assets/js/pcoded.min.js"></script>
<!-- datatable Js -->
<script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
<script src="../assets/js/plugins/dataTables.bootstrap4.min.js"></script>
<script src="../assets/js/plugins/dataTables.responsive.min.js"></script>
<script src="../assets/js/pages/data-responsive-custom.js"></script>
<script src="../assets/js/pages/data-basic-custom.js"></script>


</body>
</html>