import Vuex from 'vuex'
import Vue from 'vue'
import store from './store';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'


Vue.use(BootstrapVue)
Vue.use(Vuex)
Vue.component('list-customers', require('./components/customers/listCustomers.vue').default);
Vue.component('show-customer', require('./components/customers/showCustomer.vue').default);


const customers = new Vue({
    el: '#customers',
    store
});
