import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Home from '../components/user/Home'
import AboutUs from '../components/user/pages/about/AboutUs'
import Event from '../components/user/pages/event/Event'
import Career from '../components/user/pages/career/Career'
import EventDetail from '../components/user/pages/event/EventDetail'
import AboutHistory from '../components/user/pages/about/AboutHistory'
import ContactUs from '../components/user/pages/contact/ContactUs'
import UserFaq from '../components/user/pages/faq/UserFaq'
import UserGallery from '../components/user/pages/gallery/UserGallery'

const router = new VueRouter({
    mode: 'history',
    linkActiveClass: 'active',
    routes: [

        {path:'/api', component: Home, name: 'Home'},
        {path:'/api/about-us', component: AboutUs, name: 'AboutUs'},
        {path:'/api/about-us/history', component: AboutHistory, name: 'AboutHistory'},
        {path:'/api/contact-us', component: ContactUs, name: 'ContactUs'},
        {path:'/api/faqs', component: UserFaq, name: 'UserFaq'},
        {path:'/api/gallery', component: UserGallery, name: 'UserGallery'},
        {path:'/api/events', component: Event, name: 'Event'},
        {path:'/api/careers', component: Career, name: 'Career'},
        {path:'/api/event-details/:eventSlug', component: EventDetail, name: 'EventDetail'},

    ]
})

export default router;