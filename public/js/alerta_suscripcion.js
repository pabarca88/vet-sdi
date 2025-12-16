 // [ sweet-multiple ]
$('.sweet-multiple').on('click', function() {
    swal({
            title: "¿Quiere cancelar la suscripción?",
            text: "Si cancela, su cuenta premium seguirá activa hasta el 15/11/2021",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("Su cuenta premium ha sido cancelada", {
                    icon: "success",
                });
            } else {
                swal("Su cuenta premium no ha sido cancelada", {
                    icon: "success",
                });
            }
        });
});