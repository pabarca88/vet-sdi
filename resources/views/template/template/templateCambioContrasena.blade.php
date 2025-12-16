<!-- VALIDACION DE FORMULARIO -->
{{--  <script>
    $(document).ready(function() {  --}}
        var $validacion = $("#form_cambio_contrasena_perfil").validate({
            rules: {
                contrasena_actual: {
                    required: true,
                    minlength: 3
                },
                password_registro: {
                    required: true,
                    minlength: 3
                },
                password_confirmacion_registro: {
                    required: true,
                    minlength: 3,
                    equalTo: "#password_registro"
                }
            },
            messages: {
                contrasena_actual: {
                    required: "Ingrese su contraseña actual",
                    minlength: "Debe poseer por lo menos 3 caracteres"
                },
                password_registro: {
                    required: "Ingrese su contraseña",
                    minlength: "Debe poseer por lo menos 3 caracteres"

                },
                password_confirmacion_registro: {
                    required: "Ingrese su confirmacion de contraseña",
                    minlength: "Debe poseer por lo menos 3 caracteres",
                    equalTo: "Las Contraseñas no son iguales"
                }
            },
            highlight: function(element) {
                var $el = $(element);
                var $parent = $el.parents(".form-group");

                $el.addClass("es-invalido");

                // Select2 and Tagsinput
                if ($el.hasClass("select2-hidden-accessible") || $el.attr("data-role") === "tagsinput") {
                    $el.parent().addClass("es-invalido");
                }
            },
            unhighlight: function(element) {
                $(element).parents(".form-group").find(".es-invalido").removeClass("es-invalido");
            },
            submitHandler: function(form) {
                $('#submit').attr('disabled', 'disabled');
                form.submit();
            }
        });
    {{--  });
</script>  --}}
