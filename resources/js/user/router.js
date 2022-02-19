import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Home from '../components/user/Home'
import AboutUs from '../components/user/pages/about/AboutUs'
import AboutHistory from '../components/user/pages/about/AboutHistory'

const router = new VueRouter({
    mode: 'history',
    linkActiveClass: 'active',
    routes: [

        {path:'/api', component: Home, name: 'Home'},
        {path:'/api/about-us', component: AboutUs, name: 'AboutUs'},
        {path:'/api/about-us/history', component: AboutHistory, name: 'AboutHistory'},

    ]
})

export default router;