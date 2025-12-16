<template>
    <nav class="pcoded-navbar menu-light">
        <div class="navbar-wrapper">
            <div class="navbar-content scroll-div">
                <div>
                    <div class="main-menu-header">
                        <img class="img-radius" src="/images/iconos/usuario.svg" alt="Imagen">
                        <div class="user-details">
                            <div v-on:click="showNavUser">Juan<i class="fa fa-caret-down"></i></div>
                        </div>
                    </div>
                    <div id="nav-user-link">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <router-link to="/Paciente/Perfil" data-toggle="tooltip" title="Mi perfil">
                                    <i class="feather icon-user"></i>
                                </router-link>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" @click.prevent="logout()"
                                    data-toggle="tooltip" title="Cerrar sesión" class="text-danger">
                                    <i class="feather icon-power"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <ul class="nav pcoded-inner-navbar">
                    <li class="nav-item pcoded-menu-caption text-center">
                    </li>
                    <li class="nav-item pcoded-hasmenu active pcoded-trigger" id="navEscritorio">
                        <a href="javascript:void(0)" class="nav-link" v-on:click="viewEscritorio">
                            <span class="pcoded-micon">
                                <i class="feather icon-home"></i>
                            </span>
                            <span class="pcoded-mtext text-center">Mi Escritorio</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li>
                                <router-link to="/Paciente">Mi Escritorio Paciente</router-link>
                            </li>
                            <li>
                                <router-link to="/Paciente/Reservar_Hora_Medica">Reservar Hora Médica</router-link>
                            </li>
                            <li>
                                <router-link to="/Paciente/Mis_Profesionales">Mis Médicos</router-link>
                            </li>
                            <li>
                                <router-link to="/Paciente/Receta_Online">Receta Online</router-link>
                            </li>
                            <li>
                                <router-link to="/Paciente/Mis_Examenes">Mis Exámenes</router-link>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item pcoded-hasmenu" id="navConfig">
                        <a href="javascript:void(0)" class="nav-link" v-on:click="viewConfig">
                            <span class="pcoded-micon">
                                <i class="feather icon-settings"></i>
                            </span>
                            <span class="pcoded-mtext text-center">Configuraciones</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li>
                                <router-link to="/Paciente/Perfil">Editar Perfil</router-link>
                            </li>
                            <li>
                                <router-link to="/Paciente/Rompe_Clave">Rompeclave</router-link>
                            </li>
                            <li>
                                <router-link to="/Paciente/Pago_Suscripción">Pagos y Suscripción</router-link>
                            </li>
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
            LogOut() {
                this.axios.post('/logout')
                    .then(response => {
                        window.location.href = '/login';
                    })
                    .catch(error => {
                        window.location.href = '/login';
                    })
            },
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