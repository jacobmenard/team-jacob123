require('./bootstrap');
window.Vue = require('vue');



import VueRouter from 'vue-router';
import routes from './routes';
import swal from 'sweetalert';

import vueNumeralFilterInstaller from 'vue-numeral-filter';
Vue.use(vueNumeralFilterInstaller, { locale: 'en-gb' });

import moment from 'moment';

Vue.filter('formatDate', function(value) {
    if (value) {
      return moment(String(value)).format('MM/DD/YYYY hh:mm:ss')
    }
});

Vue.use(VueRouter);

Vue.component('footer-component', require('./components/Footer.vue').default);
Vue.component('directory-component', require('./components/Directory.vue').default);

const app = new Vue({
    el: '#app',
    router: new VueRouter(routes)
});
