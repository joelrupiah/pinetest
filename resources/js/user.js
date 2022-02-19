require('./bootstrap');

import Vue from 'vue'

import router from './user/router'

import {store} from './common/store/store'

import filter from './common/filter'

Vue.component('user-master', require('./components/user/UserMaster.vue').default);

//Start VueJS component frameworks

import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';


Vue.use(ElementUI);
// End VueJs frontend frameworks

const admin = new Vue({
    el: '#user',
    router,
    store
});
