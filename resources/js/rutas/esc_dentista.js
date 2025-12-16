const Escritorio =      ()=> import('../components/dentista/Escritorio.vue');
const Pacientes =      ()=> import('../components/elements/view/profesional/MisPacientes.vue');
const PanelConfig =     ()=> import('../components/dentista/configuracion/PanelConfiguracion.vue');
const FlujoCaja =      ()=> import('../components/flujocaja/Dental.vue');

const C10 =             ()=> import('../components/dentista/configuracion/C10.vue');
const MisLugares =      ()=> import('../components/elements/view/profesional/MisLugaresAten.vue');
const Derivaciones =      ()=> import('../components/dentista/configuracion/Derivacion.vue');

/*Mis Clinicas*/
const MisClinicas =      ()=> import('../components/dentista/configuracion/MisClinicas.vue');

const pacAtencionesPrev =      ()=> import('../components/elements/view/paciente/MisAtenciones.vue');


export const routes = [
    {
        name: 'escritorio',
        path: '/Dental',
        component: Escritorio
    },
    {
        name: 'panelConfig',
        path: '/Dental/Panel_Configuracion',
        component: PanelConfig
    },
    {
        name: 'C10',
        path: '/Dental/Panel_Configuracion/Configuracion_C10',
        component: C10
    },
    {
        name: 'mislugares',
        path: '/Dental/Panel_Configuracion/Mis_Lugares_Atencion',
        component: MisLugares
    },
    {
        name: 'misderivaciones',
        path: '/Dental/Panel_Configuracion/Mis_Derivaciones',
        component: Derivaciones
    },

    {
        name: 'misclinicas',
        path: '/Dental/Panel_Configuracion/Mis_Clinicas',
        component: MisClinicas
    },

    {
        name: 'misPacientes',
        path: '/Dental/Mis_Pacientes',
        component: Pacientes
    },
    {
        name: 'flujocaja',
        path: '/Dental/Flujo_Caja',
        component: FlujoCaja
    },

    {
        name: 'pacAtencionesPrev',
        path: '/Dental/Paciente/Atenciones_previas/:id',
        component: pacAtencionesPrev
    },

    
];
