<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
	<div class="m-header">
			<a class="mobile-menu" id="mobile-collapse"><span></span></a>
			<a href="#!" class="b-brand">
				<img src="../assets/images/logo_pais.png" alt="" class="logo" height="40px">
			</a>
			<a href="#!" class="mob-toggler">
				<i class="feather icon-more-vertical"></i>
			</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="navbar-nav ml-auto">
				<li>
					<div class="dropdown drp-user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Cambiar escritorio" data-placement="button" >
							<i class="feather icon-refresh-cw p-16"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right profile-notification">
							<div class="pro-head">
								<span>Cambiar escritorio</span>
							</div>
							<ul></ul>
							<ul class="pro-body">
								<li><a href="#" class="dropdown-item"><i class="feather icon-user"></i>Escritorio paciente</a></li>
								<li><a href="#" class="dropdown-item"><i class="feather icon-user"></i>Escritorio profesional</a></li>
								<li><a href="#" class="dropdown-item"><i class="feather icon-user"></i>Escritorio Asistentesss</a></li>
							</ul>
						</div>
					</div>
				</li>
				<li>
					<div class="dropdown drp-user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="feather icon-user "></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right profile-notification">
							<div class="pro-head">
								<span>Nombre y Apellido</span>
							</div>
							<ul></ul>
							<ul class="pro-body">
								<li>
                                    <form action="{{ ROUTE('logout') }}" method="post" id="closeSession">
                                        @csrf
                                        <a class="nav-link text-white" onclick="document.getElementById('closeSession').submit();"
                                            href="#">
                                            Cerrar sesión
                                        </a>
                                    </form>
                                    <!-- <a href="cerrar.php" class="dropdown-item"><i class="feather icon-log-out"></i> Cerrar sesión</a> -->
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
