//
// /**
//  * First we will load all of this project's JavaScript dependencies which
//  * includes Vue and other libraries. It is a great starting point when
//  * building robust, powerful web applications using Vue and Laravel.
//  */
//
// require('./bootstrap');
//
// window.Vue = require('vue');
//
// import 'bootstrap/dist/css/bootstrap.css'
// import 'bootstrap-vue/dist/bootstrap-vue.css'
//
// /**
//  * The following block of code may be used to automatically register your
//  * Vue components. It will recursively scan this directory for the Vue
//  * components and automatically register them with their "basename".
//  *
//  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
//  */
//
// // const files = require.context('./', true, /\.vue$/i);
// // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
//
// Vue.component('index', require('./components/admin/category/index.vue').default);
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// // Vue.component('private-chat', require('./components/PrivateChat.vue').default);
// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */
// window.onload = function () {
//     const app = new Vue({
//         el: '#app'
//     });
// }

import Vue from 'vue'
import VueRouter from 'vue-router'
import routes from "./routes";


Vue.use(VueRouter);

// Vue.component('faq-index', require('./pages/faq/Index').default);
// Vue.component('index', require('./pages/Index').default);

window.onload = function () {
    const app = new Vue({
        el: '#app',
        router: new VueRouter({routes}),
    });
}
