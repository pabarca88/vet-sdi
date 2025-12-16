<nav class="pcoded-navbar menu-light">
	<div class="navbar-wrapper">
		<div class="navbar-content scroll-div">
			<div class="">
				<div class="main-menu-header">
					<img class="img-radius" src="{{ asset('images/iconos/usuario_administrador.svg') }}" alt="Administrador centro médico">
					<div class="user-details">
						<div id="more-details">Nombre Centro Médico <i class="fa fa-caret-down"></i></div>
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
							<a href="{{ route('lab.exa.asistente.home') }}">Mi Escritorio</a>
						</li>
						<li>
							<a href="#">Administradores</a>
						</li>
						<li>
							<a href="#">Sucursales Centro Médico</a>
						</li>
						<li>
							<a href="#">Laboratorio Centro Médico</a>
						</li>
						<li>
							<a href="#">Personal</a>
						</li>
						<li>
							<a href="#">Asistentes</a>
						</li>
						<li>
							<a href="#">Finanzas</a>
						</li>
						<li>
							<a href="#">Inventarios</a>
						</li>
						<li>
							<a href="#">Estadísticas</a>
						</li>
						<li>
							<a href="#">Soporte</a>
						</li>
						<li>
							<a href="#">Perfil Centro Médico</a>
						</li>
						<li>
							<a href="#">Mi Perfil</a>
						</li>
						<li>
							<a href="#">Suscripciones y pagos</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>
