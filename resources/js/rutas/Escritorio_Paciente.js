const Escritorio =          ()=> import('../components/paciente/Escritorio.vue');
const MisProfesionales =    ()=> import('../components/paciente/MisProfesionales.vue');
const RecetaOnline =        ()=> import('../components/paciente/RecetaOnline.vue');
const ReservarHora =        ()=> import('../components/elements/view/ReservarHora.vue');

const PagoSub =        ()=> import('../components/elements/view/ReservarHora.vue');
const RompeClave =        ()=> import('../components/elements/view/ReservarHora.vue');
const Perfil =        ()=> import('../components/paciente/Perfil.vue');

const MisRecetas =          ()=> import('../components/paciente/receta/MisRecetas.vue');
const MisLicencias =        ()=> import('../components/paciente/receta/MisLicencias.vue');
const MisCertificados =     ()=> import('../components/paciente/receta/MisCertificados.vue');
const MisExamenes =         ()=> import('../components/paciente/receta/MisExamenes.vue');

export const routes = [
    {
        name: 'escritorio',
        path: '/Paciente',
        component: Escritorio
    },
    {
        name: 'mis_profecionales',
        path: '/Paciente/Mis_Profesionales',
        component: MisProfesionales
    },
    {
        name: 'ReservarHora',
        path: '/Paciente/Reservar_Hora_Medica',
        component: ReservarHora
    },
    {
        name: 'FichaMedica',
        path: '/Paciente/Ficha_Medica_Unica',
        component: RecetaOnline
    },
    {
        name: 'RecetaOnline',
        path: '/Paciente/Receta_Online',
        component: RecetaOnline
    },
    {
        name: 'Perfil',
        path: '/Paciente/Perfil',
        component: Perfil
    },
    {
        name: 'RompeClave',
        path: '/Paciente/Rompe_Clave',
        component: RompeClave
    },
    {
        name: 'PagoSub',
        path: '/Paciente/Pago_Suscripción',
        component: PagoSub
    },

    {
        name: 'MisRecetas',
        path: '/Paciente/Receta_Online/Mis_Recetas',
        component: MisRecetas
    },
    {
        name: 'MisLicencias',
        path: '/Paciente/Receta_Online/Mis_Licencias',
        component: MisLicencias
    },
    {
        name: 'MisCertificados',
        path: '/Paciente/Receta_Online/Mis_Certificados',
        component: MisCertificados
    },
    {
        name: 'MisExamenes',
        path: '/Paciente/Receta_Online/Mis_Examenes',
        component: MisExamenes
    },
];
