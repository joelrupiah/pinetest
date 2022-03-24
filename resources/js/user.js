require('./bootstrap');

import Vue from 'vue'

import router from './user/router'

import {store} from './common/store/store'

import filter from './common/filter'

import * as VueGoogleMaps from 'vue2-google-maps'

Vue.component('user-master', require('./components/user/UserMaster.vue').default);

//Start VueJS component frameworks

import ViewUI from 'view-design'
import 'view-design/dist/styles/iview.css'

import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'

import VueCompositionAPI from '@vue/composition-api'

import CKEditor from '@ckeditor/ckeditor5-vue2'

import Notifications from 'vue-notification'

Vue.use(VueGoogleMaps, {
  load: {
    key: 'AIzaSyA2QkTkJ6WGUlGQnhjI46VvmyGWLfALy64',
    libraries: 'places',
  },
})

Vue.use(VueCompositionAPI)
Vue.use( CKEditor )
Vue.use(ViewUI)
Vue.use(ElementUI);
Vue.use(Notifications)
// End VueJs frontend frameworks

const admin = new Vue({
    el: '#user',
    router,
    store
});
