require('./bootstrap');
import vue from 'vue';

window.Vue = vue;

import App from './components/App.vue';

import VueAxios from 'vue-axios';
import axios from 'axios';

import VueRouter from 'vue-router';
import {routes} from './rutas/esc_asis_lab.js';
import Vue from 'vue';

import Menu from './components/template/asistente/Menu.vue';

import Load from './components/template/LoadApp.vue';
import Header from './components/template/HeaderApp.vue';
import Footer from './components/template/FooterApp.vue';


Vue.component('headerApp',Header );
Vue.component('loadApp',Load );
Vue.component('footerApp',Footer );
Vue.component('menuApp',Menu );

Vue.use(VueRouter);
Vue.use(VueAxios, axios);

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App)
});