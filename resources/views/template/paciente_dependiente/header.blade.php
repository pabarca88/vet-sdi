<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">

	<div class="m-header">

			<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>

			<a href="#!" class="b-brand">

				<img src="{{ asset('images/logo_pais.png') }}" alt="" class="logo" height="45px">

			</a>

			<a href="#!" class="mob-toggler">

				<i class="feather icon-more-vertical" style="font-size: 1.2rem;"></i>

			</a>

		</div>

		<div class="collapse navbar-collapse">

			<ul class="navbar-nav ml-auto">

			<li>

                <div class="dropdown drp-user">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <i class="feather icon-user" style="font-size: 1.2rem;"></i>

                    </a>

                    <div class="dropdown-menu dropdown-menu-right profile-notification">

                        <div class="pro-head">

                            <span>{{  @Auth::user()->name  }}</span>

                            <br/><span>Dependiente: {{ $paciente->nombres . ' ' . $paciente->apellido_uno }}</span>

                        </div>

                        {{--  <ul></ul>  --}}

                        <ul class="pro-body">

                            <li>

                                <form action="{{ ROUTE('logout') }}" method="post" id="closeSession">

                                    @csrf

                                    <a data-toggle="tooltip" title="Cerrar sesión" class="text-danger" href="javascript:{}" onclick="document.getElementById('closeSession').submit();">

                                        <i class="feather icon-power" style="font-size: 1.2rem;"></i> Cerrar sesión

                                    </a>

                                </form>

                            </li>

                        </ul>

                    </div>

                </div>

            </li>

		</ul>

	</div>

</header>

