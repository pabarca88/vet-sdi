<template>
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
		<div class="m-header">
			<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
			<a href="#!" class="b-brand">
				<img src="/images/logo_pais.png" alt="" class="logo" height="45px">
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
								<span>Perez</span>
							</div>
							<ul class="pro-body">	
								<li>
									<a href="#" @click.prevent="logout()" class="dropdown-item">
										<i class="feather icon-log-out"></i>
										Cerrar sesión
									</a>
								</li>
							</ul>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</header>
</template>
<script>
    export default {
        methods: {
            LogOut() {
                this.axios.post('/logout')
                    .then(response => {
                        window.location.href = '/login';
                    })
                    .catch(error => {
                        window.location.href = '/login';
                    })
            },
        },
    }
</script>
