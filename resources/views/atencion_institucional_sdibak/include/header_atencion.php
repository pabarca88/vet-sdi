	<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
		<div class="m-header">
			<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
			<a href="#!" class="b-brand">
				<img src="../assets/images/logo_pais.png" alt="" class="logo" height="45px">
			</a>
			<a href="#!" class="mob-toggler">
				<i class="feather icon-more-vertical"></i>
			</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="navbar-nav ml-auto">
				<li>
					<div class="dropdown drp-user pt-3">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="feather icon-user fa-2x"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right profile-notification">
							<div class="pro-head">
								<img src="assets/images/user/medico.png" class="img-radius" alt="User-Profile-Image">
								<span>Jaime Kriman Astorga</span>
								<a href="cerrar.php" class="dud-logout" title="Logout">
									<i class="feather icon-log-out"></i>
								</a>
							</div>
							<ul class="pro-body">
								<li><a href="perfil.php" class="dropdown-item"><i class="feather icon-user"></i> Mi perfil</a></li>
								<li><a href="mensajeria.php" class="dropdown-item"><i class="far fa-envelope"></i> Mis Mensajes</a></li>
								<li>
                                    <form action="{{ ROUTE('logout') }}" method="post" id="closeSession">
                                        @csrf
                                        <a class="nav-link text-white" onclick="document.getElementById('closeSession').submit();"
                                            href="#">
                                            Cerrar sesión
                                        </a>
                                    </form>
                                    <!-- <a href="cerrar.php" class="dropdown-item"><i class="feather icon-lock"></i> Cerrar sesión</a> -->
                                </li>
							</ul>
						</div>
					</div>
				</li>
			</ul>
		</div>
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/7066bc9f2e.js" crossorigin="anonymous"></script>
	</header>
