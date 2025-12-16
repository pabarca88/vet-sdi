<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
</script>
<!-- Scripts -->
<script src="{{ asset('js/vendor-all.min.js') }}"></script>
<script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/ripple.js') }}"></script>
<script src="{{ asset('js/pcoded.min.js') }}"></script>
<!--<script src="../assets/js/menu-setting.min.js"></script>-->
<!-- datatable Js -->
<script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/plugins/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/plugins/dataTables.responsive.min.js') }}"></script>
{{--  <script src="{{ asset('js/pages/data-responsive-custom.js') }}"></script>  --}}

<script src="{{ asset('js/sidebar.js') }}?upd={{ random_int(1111,9999) }}"></script>
<script src="{{ asset('js/pages/data-basic-custom.js') }}"></script>

<!--Form wizard-->
<script src="{{ asset('js/plugins/jquery.bootstrap.wizard.min.js') }}"></script>
<script src="{{ asset('js/formularios_wizard.js') }}?upd={{ random_int(1111,9999) }}"></script>

<!-- datepicker js -->
<script src="{{ asset('js/plugins/moment.min.js') }}"></script>
<script src="{{ asset('js/plugins/daterangepicker.js') }}"></script>
<script src="{{ asset('js/pages/ac-datepicker.js') }}"></script>

<!-- mensajes -->
<script src="{{ asset('js/plugins/sweetalert.min.js') }}"></script>

<!--Botón cards-->
<script src="{{ asset('js/btn-cards.js') }}?upd={{ random_int(1111,9999) }}"></script>


