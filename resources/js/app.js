
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


import Vue2TouchEvents from 'vue2-touch-events'

Vue.use(Vue2TouchEvents);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('chat', require('./components/chatPopUp.vue').default);
Vue.component('chat-room', require('./components/affiliate/chatRoom.vue').default);
Vue.component('alert', require('./components/Alert').default);
Vue.component('notification', require('./components/Notification').default);
Vue.component('product-section', require('./components/product/section').default);
Vue.component('main-slideshow', require('./components/MainSlideshow').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
