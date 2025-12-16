<template>
    <nav class="pcoded-navbar menu-light">
	<div class="navbar-wrapper">
		<div class="navbar-content scroll-div">
			<div class="">
				<div class="main-menu-header">
					<img class="img-radius" src="/images/iconos/usuario_profesional.svg" alt="Profesional">
					<div class="user-details">
						<div id="more-details">Jaime Kriman Astorga <i class="fa fa-caret-down"></i></div>
					</div>
				</div>
				<div id="nav-user-link">
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="#" data-toggle="tooltip" title="Mi perfil">
								<i class="feather icon-user"></i>
							</a>
						</li>
						<li class="list-inline-item"><a href="cerrar.php" data-toggle="tooltip" title="Cerrar sesión" class="text-danger"><i class="feather icon-power"></i></a></li>
					</ul>
				</div>
			</div>
			<ul class="nav pcoded-inner-navbar ">
				<li class="nav-item pcoded-menu-caption text-center">
				</li>
				<li class="nav-item pcoded-hasmenu">
					<a href="javascript:void(0)" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext text-center">Mi Escritorio</span></a>
					<ul class="pcoded-submenu">
						<li><a href="#">Mi Escritorio Profesional</a></li>
						<li><a href="#">Mis Pacientes</a></li>
						<li><a href="#">
						Panel de Configuración</a></li>
						<li><a href="#">Receta Online</a></li>
						<li>
							<li>
							<a href="#">Flujo de Caja</a>
						</li>
						<li>
							<a href="#">Mis Estadísticas</a>
						</li>
					</ul>
				</li>
				<li class="nav-item pcoded-hasmenu">
					<a href="javascript:void(0)" class="nav-link"><span class="pcoded-micon"><i class="feather feather icon-menu"></i></span><span class="pcoded-mtext text-center">Otras opciones</span></a>
					<ul class="pcoded-submenu">
						<li><a href="#">Editar Perfil</a></li>
						<li><a href="#">Suscripción y Pagos</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>
</template>
<script>
    export default {
        methods: {
            viewEscritorio() {
                if ($('#navEscritorio').hasClass('pcoded-trigger')) {
                    $('#navEscritorio').removeClass('pcoded-trigger');
                } else {
                    $('#navEscritorio').addClass('pcoded-trigger');
					if ($('#navConfig').hasClass('active pcoded-trigger')) {
						$('#navConfig').removeClass('active pcoded-trigger');
					}
                }
            },
            viewConfig() {
                if ($('#navConfig').hasClass('active pcoded-trigger')) {
                    $('#navConfig').removeClass('active pcoded-trigger');
                    if ($('#navEscritorio').hasClass('pcoded-trigger')) {
                        $('#navEscritorio').addClass('pcoded-trigger');
                    }
                } else {
                    $('#navConfig').addClass('active pcoded-trigger');
                    if ($('#navEscritorio').hasClass('pcoded-trigger')) {
                        $('#navEscritorio').removeClass('pcoded-trigger');
                    }
                }
            },
            showNavUser(){
                $('#nav-user-link').slideToggle();
            },
        }
    }

</script>
