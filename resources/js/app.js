import './bootstrap';

window.Vue = require('vue');
import axios from 'axios';
axios.defaults.baseURL = 'http://127.0.0.1:8000/api/'; 

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('Vuelos', require('./components/Vuelos/ShowComponent.vue').default);
Vue.component('Domicilio', require('./components/Domicilio/showComponent.vue').default);
const app = new Vue({
    el: '#app',
});
