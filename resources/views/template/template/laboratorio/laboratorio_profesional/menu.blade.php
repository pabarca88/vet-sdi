<nav class="pcoded-navbar menu-light">
	<div class="navbar-wrapper">
		<div class="navbar-content scroll-div">
			<div class="">
				<div class="main-menu-header">
					<img class="img-radius" src="{{ asset('images/iconos/usuario_administrador.svg') }}" alt="Administrador centro médico">
					<div class="user-details">
						<div id="more-details">Nombre Profesional <i class="fa fa-caret-down"></i></div>
					</div>
				</div>
				<div id="nav-user-link">
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="perfil_cm.php" data-toggle="tooltip" title="Mi perfil">
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
						<li>
							<a href="escritorio_admin_general_cm.php">Mi Escritorio</a>
						</li>
						<li>
							<a href="admin_cm.php">Administradores</a>
						</li>
						<li>
							<a href="sucursales_cm.php">Sucursales Centro Médico</a>
						</li>
						<li>
							<a href="laboratorio_cm.php">Laboratorio Centro Médico</a>
						</li>
						<li>
							<a href="profesionales_cm.php">Personal</a>
						</li>
						<li>
							<a href="asistentes_cm.php">Asistentes</a>
						</li>
						<li>
							<a href="suscripcion_finanzas.php">Finanzas</a>
						</li>
						<li>
							<a href="asistentes_inventarios.php">Inventarios</a>
						</li>
						<li>
							<a href="suscripcion_estadisticas_cm.php">Estadísticas</a>
						</li>
						<li>
							<a href="suscripcion_soporte.php">Soporte</a>
						</li>
						<li>
							<a href="perfil_cm.php">Perfil Centro Médico</a>
						</li>
						<li>
							<a href="perfil_admin.php">Mi Perfil</a>
						</li>
						<li>
							<a href="suscripcion_pago_cm.php">Suscripciones y pagos</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>
