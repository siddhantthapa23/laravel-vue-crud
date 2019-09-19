
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

window.Vue.use(VueRouter);

import ClubsIndex from './components/clubs/Index.vue';
import ClubsCreate from './components/clubs/Create.vue';
import ClubsEdit from './components/clubs/Edit.vue';

const routes = [
    {
        path: '/admin/clubs',
        component: ClubsIndex,
        name: 'clubsIndex'
    },
    {path: '/admin/clubs/create', component: ClubsCreate, name: 'createClub'},
    {path: '/admin/clubs/edit/:id', component: ClubsEdit, name: 'editClub'},
];

const router = new VueRouter({ 
    routes,
    mode: 'history'
})

const app = new Vue({ router }).$mount('#app')