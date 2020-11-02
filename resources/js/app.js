require('./bootstrap');
window.Vue = require('vue');


import VueRouter from 'vue-router';
import routes from './routes';
import toastr from 'toastr';
import swal from 'sweetalert';

window.toastr = toastr;
window.swal = swal;

import vueNumeralFilterInstaller from 'vue-numeral-filter';
Vue.use(vueNumeralFilterInstaller, { locale: 'en-gb' });

Vue.use(VueRouter);

Vue.component('footer-component', require('./components/Footer.vue').default);
Vue.component('directory-component', require('./components/Directory.vue').default);

const app = new Vue({
    el: '#app',
    router: new VueRouter(routes)
});
