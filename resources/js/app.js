require('./bootstrap');

import Vue from 'vue'
import VueRouter from "vue-router";
import route from "./router/route";
import '@fortawesome/fontawesome-free/css/all.css'
import '@fortawesome/fontawesome-free/js/all.js'
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"

Vue.use(VueRouter);

const router = new VueRouter(route);

const app = new Vue({
    el: '#app',
    router
});
