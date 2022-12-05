require('./bootstrap');

import Vue from 'vue'

import router from './user/router'

import {store} from './common/store/store'

import filter from './common/filter'

Vue.component('user-master', require('./components/user/UserMaster.vue').default);

//Start VueJS component frameworks

import Vuesax from 'vuesax'
import 'vuesax/dist/vuesax.css'

import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'

import ViewUI from 'view-design'
import 'view-design/dist/styles/iview.css'

import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'

import VueCompositionAPI from '@vue/composition-api'

import CKEditor from '@ckeditor/ckeditor5-vue2'

import Notifications from 'vue-notification'

import VueGeolocation from 'vue-browser-geolocation'

import * as VueGoogleMaps from 'vue2-google-maps'

import Datepicker from 'vuejs-datepicker';

Vue.use(VueGoogleMaps, {
  load: {
    key: 'AIzaSyA2QkTkJ6WGUlGQnhjI46VvmyGWLfALy64',
    libraries: 'places',
  },
})

Vue.use(Vuesax)
Vue.use(Vuetify)
Vue.use(VueCompositionAPI)
Vue.use( CKEditor )
Vue.use(ViewUI)
Vue.use(ElementUI)
Vue.use(Notifications)
Vue.use(VueGeolocation)
Vue.use(Datepicker)
// End VueJs frontend frameworks

const admin = new Vue({
    el: '#user',
    router,
    store
});
