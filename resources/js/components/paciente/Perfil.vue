<template>
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="font-weight-bolder">Editar Perfil</h5>
                        </div>
                        <ul class="breadcrumb mb-4">
                            <li class="breadcrumb-item">
                                <router-link to="/Paciente" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                    <i class="feather icon-home"></i>
                                </router-link>
                            </li>
                            <li class="breadcrumb-item">
                                <router-link to="/Paciente/Perfil">Editar Perfil</router-link>                                
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="user-profile user-card mb-4">
            <div class="card-body py-0">
                <div class="user-about-block m-0">
                    <div class="row">
                        <div class="col-md-12 text-center mt-n4">
                            <div class="change-profile text-center">
                                <div class="dropdown w-auto d-inline-block">
                                    <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <div class="profile-dp">
                                            <div class="position-relative d-inline-block">
                                                <img class="img-radius img-fluid wid-100" src="/images/iconos/usuario.svg" alt="User image">
                                            </div>
                                            <div class="overlay">
                                                <span>Actualizar</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">
                                            <i class="feather icon-upload-cloud mr-2"></i>
                                            Cambiar foto de perfil
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="feather icon-trash-2 mr-2"></i>
                                            Eliminar fotografía
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-md-2">
                            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="btn btn-outline-info btn-sm mb-2 mx-2 active" id="personal-tab"
                                        data-toggle="tab" href="#info_personal" role="tab" aria-controls="info_personal"
                                        aria-selected="true">
                                        <i class="feather icon-user mr-2"></i>
                                        Información Personal
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-outline-info btn-sm mb-2 mx-2" id="emergencia-tab"
                                        data-toggle="tab" href="#emergencia" role="tab" aria-controls="emergencia"
                                        aria-selected="false">
                                        <i class="feather icon-user-plus mr-2"></i>
                                        Contacto de Emergencia
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-outline-info btn-sm mb-2 mx-2" id="datmedicos-tab"
                                        data-toggle="tab" href="#datmedicos" role="tab" aria-controls="datmedicos"
                                        aria-selected="false">
                                        <i class="feather icon-plus-circle mr-2"></i>
                                        Datos Médicos
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-outline-info btn-sm mb-2 mx-2" id="pass-tab" data-toggle="tab"
                                        href="#pass" role="tab" aria-controls="pass" aria-selected="false">
                                        <i class="feather icon-lock mr-2"></i>
                                        Cambiar Contraseñas
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tab-content" id="myTabContent">
                    <InformacionPersonal></InformacionPersonal>
                    <!--Tab Contactos de Emergencia-->
                    <ContactoEmergencia></ContactoEmergencia>
                    <!--Cierre: Tab Contactos de Emergencia-->
                    <!--Tab Datos médicos  OJO   IDENTIFICAR AL PROFESIONAL RESPONSABLE Y PONER UN ALERT DICIENDO LO IMPORTANTE QUE ES EL LLENADO CORRECTO-->
                    <DatosMedicos></DatosMedicos>
                    <!--Cierre: Tab Tab Datos médicos-->
                    <!--Tab Cambiar Contraseñas-->
                    <CambiarContrasena></CambiarContrasena>
                    <!--Cierre: Tab Cambiar Contraseñas-->
                    <div class="tab-pane fade" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import InformacionPersonal from './perfil/InformacionPersonal.vue';
    import CambiarContrasena from './perfil/CambiarContrasena.vue';
    import DatosMedicos from './perfil/DatosMedicos.vue';
    import ContactoEmergencia from './perfil/ContactoEmergencia.vue';
    export default {
        components: {
            InformacionPersonal,
            CambiarContrasena,
            DatosMedicos,
            ContactoEmergencia
        },
    }
</script>
