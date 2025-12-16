
<!-- BOTÓN FLOTANTE AGENDA (ESPACIO PARA INSERTAR LA NUEVA AGENDA) -->
<div class="bs-offset-main bs-canvas-anim">
    <button class="btn btn-agenda shadow-sm" type="button" data-toggle="canvas" data-target="#bs-canvas-right" aria-expanded="false" aria-controls="bs-canvas-right"><i class="feather icon-calendar f-22"></i> <br>Agenda <br> examenes</button>
</div>

<!-- SIDEBAR (ESPACIO PARA INSERTAR LA NUEVA AGENDA) -->
<div id="bs-canvas-right" class="bs-canvas bs-canvas-anim bs-canvas-right position-fixed bg-light h-100" data-width="100%">
    <header class="bs-canvas-header p-3 bg-primary overflow-auto">
        <button type="button" class="bs-canvas-close float-left close" aria-label="Close"><span aria-hidden="true" class="text-light">&times;</span></button>
        <h4 class=" text-light mb-0 text-center">Agenda de exámenes</h4>
    </header>
    <div class="bs-canvas-content px-3 py-5">
        <img class="img-fluid" src="{{ asset('images/demo/agenda_demo.jpg') }}" alt="agenda Examen">
    </div>
</div>




<!--SCRIPT (DEJARLO EN JS CON JOHAN)-->
@section('page-script')
   <script type="text/javascript">
    jQuery(document).ready(function($) {
        var bsDefaults = {
            offset: false,
            overlay: true,
            width: '330px'
        },
        bsMain = $('.bs-offset-main'),
        bsOverlay = $('.btn-flotante-exa-ciru-bs-canvas-overlay');

        $('[data-toggle="canvas"][aria-expanded="false"]').on('click', function() {
            var canvas = $(this).data('target'),
                opts = $.extend({}, bsDefaults, $(canvas).data()),
                prop = $(canvas).hasClass('bs-canvas-right') ? 'margin-right' : 'margin-left';

            if (opts.width === '100%')
                opts.offset = false;

            $(canvas).css('width', opts.width);
            if (opts.offset && bsMain.length)
                bsMain.css(prop, opts.width);

            $(canvas + ' .bs-canvas-close').attr('aria-expanded', "true");
            $('[data-toggle="canvas"][data-target="' + canvas + '"]').attr('aria-expanded', "true");
            if (opts.overlay && bsOverlay.length)
                bsOverlay.addClass('show');
            return false;
        });

        $('.bs-canvas-close, .btn-flotante-exa-ciru-bs-canvas-overlay').on('click', function() {
            var canvas, aria;
            if ($(this).hasClass('bs-canvas-close')) {
                canvas = $(this).closest('.bs-canvas');
                aria = $(this).add($('[data-toggle="canvas"][data-target="#' + canvas.attr('id') + '"]'));
                if (bsMain.length)
                    bsMain.css(($(canvas).hasClass('bs-canvas-right') ? 'margin-right' : 'margin-left'), '');
            } else {
                canvas = $('.bs-canvas');
                aria = $('.bs-canvas-close, [data-toggle="canvas"]');
                if (bsMain.length)
                    bsMain.css({
                    'margin-left': '',
                    'margin-right': ''
                    });
            }
            canvas.css('width', '');
            aria.attr('aria-expanded', "false");
            if (bsOverlay.length)
                bsOverlay.removeClass('show');
            return false;
        });
});
</script>
@endsection
