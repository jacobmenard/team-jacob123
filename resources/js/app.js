require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import routes from './routes';

Vue.use(VueRouter);

Vue.component('footer-component', require('./components/Footer.vue').default);

const app = new Vue({
    el: '#app',
    router: new VueRouter(routes)
});
