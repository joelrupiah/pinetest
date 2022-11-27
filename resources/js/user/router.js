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
import FacilitiesAndActivities from '../components/user/pages/additional/FacilitiesAndActivities'
import EnquiryAndAdmission from '../components/user/pages/additional/EnquiryAndAdmission'
import UserGallery from '../components/user/pages/gallery/UserGallery'

const router = new VueRouter({
    mode: 'history',
    linkActiveClass: 'active',
    routes: [

        {path:'/', component: Home, name: 'Home'},
        // {path:'', component: Home, name: 'Home'},
        {path:'/about-us', component: AboutUs, name: 'AboutUs'},
        {path:'/about-us/history', component: AboutHistory, name: 'AboutHistory'},
        {path:'/contact-us', component: ContactUs, name: 'ContactUs'},
        {path:'/faqs', component: UserFaq, name: 'UserFaq'},
        {path:'/gallery', component: UserGallery, name: 'UserGallery'},
        {path:'/events', component: Event, name: 'Event'},
        {path:'/careers', component: Career, name: 'Career'},
        {path: '/activites-and-facilities', component: FacilitiesAndActivities, name: 'FacilitiesAndActivities'},
        {path: '/enquiry-and-admission', component: FacilitiesAndActivities, name: 'FacilitiesAndActivities'},
        {path:'/event-details/:eventSlug', component: EventDetail, name: 'EventDetail'},

    ]
})

export default router;