const Escritorio =          ()=> import('../components/asistente/laboratorio/Escritorio.vue');
const AgendaLaboratorio =        ()=> import('../components/asistente/laboratorio/AgendaLaboratorio.vue');
const Pacientes =    ()=> import('../components/asistente/laboratorio/Pacientes.vue');
const CotizarExamen =        ()=> import('../components/asistente/laboratorio/CotizacionExamen.vue');

const ReservarHora =        ()=> import('../components/elements/view/ReservarHora.vue');
const ResultadoExamen =        ()=> import('../components/elements/view/ReservarHora.vue');

const FlujoCaja =        ()=> import('../components/paciente/RecetaOnline.vue');

const Perfil =        ()=> import('../components/paciente/Perfil.vue');


export const routes = [
    {
        name: 'escritorio',
        path: '/Asistente_Laboratorio',
        component: Escritorio
    },
    {
        name: 'pacientes',
        path: '/Asistente_Laboratorio/Pacientes',
        component: Pacientes
    },
    {
        name: 'reservarHora',
        path: '/Asistente_Laboratorio/Reservar_Hora_Medica',
        component: ReservarHora
    },
    {
        name: 'agendaLaboratorio',
        path: '/Asistente_Laboratorio/Agenda_Laboratorio',
        component: AgendaLaboratorio
    },
    {
        name: 'resultadoExamen',
        path: '/Asistente_Laboratorio/Resultado_Examen',
        component: ResultadoExamen
    },
    {
        name: 'flujoCaja',
        path: '/Asistente_Laboratorio/Flujo_Caja',
        component: FlujoCaja
    },
    {
        name: 'cotizarExamen',
        path: '/Asistente_Laboratorio/Cotizar_Examen',
        component: CotizarExamen
    },
    {
        name: 'Perfil',
        path: '/Asistente_Laboratorio/Perfil',
        component: Perfil
    },
];
