/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('material-component', require('./components/menu/MaterialComponent.vue').default);
Vue.component('energy-component', require('./components/menu/EnergyComponent.vue').default);
Vue.component('depreciation-component', require('./components/menu/DepreciationComponent.vue').default);
Vue.component('mainworker-component', require('./components/menu/MainworkerComponent.vue').default);
Vue.component('management-component', require('./components/menu/ManagementComponent.vue').default);

Vue.component('deduction-component', require('./components/menu/DeductionComponent.vue').default);
Vue.component('sales-component', require('./components/menu/SalesComponent.vue').default);
Vue.component('transport-component', require('./components/menu/TransportComponent.vue').default);
Vue.component('other-component', require('./components/menu/OtherComponent.vue').default);
Vue.component('total-component', require('./components/menu/TotalComponent.vue').default);



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const app = new Vue({
    el: '#app',
});
