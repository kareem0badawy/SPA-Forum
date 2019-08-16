equire('./bootstrap');
window.Vue = require('vue');
import Vue from 'vue'
import Vuetify from 'vuetify'

window.Vue = Vue;
Vue.use(Vuetify)


// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('app-home', require('./components/AppHome.vue').default);
import router from './Router/router.js'

const app = new Vue({
    el: '#app',
    router,
    vuetify: new Vuetify(),
});
