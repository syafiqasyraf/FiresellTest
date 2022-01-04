require('./bootstrap');

// window.Vue = require('vue');

// Vue.component('front-page', require('./components/Front.vue').default);

import Vue from 'vue'
import App from './components/app'

const app = new Vue({
        el: '#app',
        components: {App}
});
