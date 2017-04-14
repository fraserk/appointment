
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 window.services = new Vue();

Vue.component('createservices', require('./components/create-services.vue'));
Vue.component('getservices', require('./components/get-services.vue'));
Vue.component('company', require('./components/company.vue'));
Vue.component('storehours', require('./components/store-hours.vue'));
Vue.component('appointmentcalendar', require('./components/appointment-calendar.vue'));
const app = new Vue({
    el: '#app'
});
