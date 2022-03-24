require('./bootstrap')

import Vue from 'vue'

import router from './admin/router'

import {store} from './common/store/store'

import filter from './common/filter'

import CKEditor from '@ckeditor/ckeditor5-vue2'

import Notifications from 'vue-notification'

Vue.component('admin-master', require('./components/admin/AdminMaster.vue').default)

//Start VueJS component frameworks

import ViewUI from 'view-design'
import 'view-design/dist/styles/iview.css'

import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'

Vue.use(ViewUI)
Vue.use( CKEditor )
Vue.use(ElementUI);
Vue.use(Notifications)
// End VueJs frontend frameworks

router.beforeEach((to, from, next)=>{
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (!localStorage.getItem('token')) {
            next({
                name: 'AdminLogin'
            })
        } else {
            next()
        }
    }else if(to.matched.some(record => record.meta.requiresVisitor)){
        if (localStorage.getItem('token')) {
            next({
                name: 'AdminDashboard'
            })
        } else {
            next()
        }
    }else{
        next()
    }
})

const admin = new Vue({
    el: '#admin',
    router,
    store
});
