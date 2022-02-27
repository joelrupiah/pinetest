import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import AdminLogin from '../components/admin/pages/auth/AdminLogin'
import ResetPassword from '../components/admin/pages/auth/ResetPassword'

import AdminProfile from '../components/admin/pages/profile/AdminProfile'

import RoleList from '../components/admin/pages/role/RoleList.vue'

import PermissionList from '../components/admin/pages/permission/PermissionList.vue'

import AdminDashboard from '../components/admin/AdminDashboard'
import AdminList from '../components/admin/pages/admin/AdminList'
import AdminTrash from '../components/admin/pages/admin/AdminTrash'

import GradeList from '../components/admin/pages/grade/GradeList'

import GalleryList from '../components/admin/pages/gallery/GalleryList'
import CreateGallery from '../components/admin/pages/gallery/CreateGallery'
import EditGallery from '../components/admin/pages/gallery/EditGallery'

import ParentsBulkEmail from '../components/admin/pages/email/ParentsBulkEmail'
import TeachersBulkEmail from '../components/admin/pages/email/TeachersBulkEmail'

import AdminAboutUsList from '../components/admin/pages/about/AdminAboutUsList'
import CreateAdminAboutUs from '../components/admin/pages/about/CreateAdminAboutUs'
import EditAdminAboutUs from '../components/admin/pages/about/EditAdminAboutUs'

import AdminAboutHistoryList from '../components/admin/pages/about/AdminAboutHistoryList'
import CreateAboutHistory from '../components/admin/pages/about/CreateAboutHistory'
import EditAboutHistory from '../components/admin/pages/about/EditAboutHistory'

import FaqList from '../components/admin/pages/faq/FaqList'
import EditFaq from '../components/admin/pages/faq/EditFaq'

import CreateFaq from '../components/admin/pages/faq/CreateFaq'
import CreatedFaqList from '../components/admin/pages/faq/CreatedFaqList'
import EditCreatedFaq from '../components/admin/pages/faq/EditCreatedFaq'

import ReplyQuestion from '../components/admin/pages/faq/ReplyQuestion'

import EventList from '../components/admin/pages/event/EventList'
import CreateEvent from '../components/admin/pages/event/CreateEvent'

import CarouselList from '../components/admin/pages/carousel/CarouselList'
import CreateCarousel from '../components/admin/pages/carousel/CreateCarousel'
import EditCarousel from '../components/admin/pages/carousel/EditCarousel'

const router = new VueRouter({
    mode: 'history',
    linkActiveClass: 'active',
    routes: [

        {path:'/api/admin', component: AdminDashboard, name: 'AdminDashboard', meta: { requiresAuth: true } },

        {path:'/api/admin/admin-login', component: AdminLogin, name: 'AdminLogin', meta: { requiresVisitor: true } },
        {path:'/api/admin/admin-reset-password', component: ResetPassword, name: 'ResetPassword', meta: { requiresVisitor: true } },

        {path: '/api/admin/admin-profile', component: AdminProfile, name: 'AdminProfile', meta: { requiresAuth: true } },

        {path: '/api/admin/roles', component: RoleList, name: 'RoleList', meta: { requiresAuth: true } },

        {path: '/api/admin/permissions', component: PermissionList, name: 'PermissionList', meta: { requiresAuth: true } },

        {path:'/api/admin/admins', component: AdminList, name: 'AdminList', meta: { requiresAuth: true } },
        {path:'/api/admin/admin-trash', component: AdminTrash, name: 'AdminTrash', meta: { requiresAuth: true } },

        {path:'/api/admin/grade-list', component: GradeList, name: 'GradeList', meta: { requiresAuth: true } },
        
        {path:'/api/admin/gallery-list', component: GalleryList, name: 'GalleryList', meta: { requiresAuth: true } },
        {path:'/api/admin/create-gallery', component: CreateGallery, name: 'CreateGallery', meta: { requiresAuth: true } },
        {path:'/api/admin/edit-gallery/:id', component: EditGallery, name: 'EditGallery', meta: { requiresAuth: true } },

        {path:'/api/admin/parents-bulk-email', component: ParentsBulkEmail, name: 'ParentsBulkEmail', meta: { requiresAuth: true } },
        {path:'/api/admin/teachers-bulk-email', component: TeachersBulkEmail, name: 'TeachersBulkEmail', meta: { requiresAuth: true } },

        {path:'/api/admin/admin-about-us-list', component: AdminAboutUsList, name: 'AdminAboutUsList', meta: { requiresAuth: true } },
        {path:'/api/admin/create-admin-about-us', component: CreateAdminAboutUs, name: 'CreateAdminAboutUs', meta: { requiresAuth: true } },
        {path:'/api/admin/edit-admin-about-us/:id', component: EditAdminAboutUs, name: 'EditAdminAboutUs', meta: { requiresAuth: true } },
       
        {path:'/api/admin/admin-about-history-list', component: AdminAboutHistoryList, name: 'AdminAboutHistoryList', meta: { requiresAuth: true } },
        {path:'/api/admin/create-about-history', component: CreateAboutHistory, name: 'CreateAboutHistory', meta: { requiresAuth: true } },
        {path:'/api/admin/edit-about-history/:id', component: EditAboutHistory, name: 'EditAboutHistory', meta: { requiresAuth: true } },

        {path:'/api/admin/admin-faq-list', component: FaqList, name: 'FaqList', meta: { requiresAuth: true } },
        {path:'/api/admin/edit-faq/:id', component: EditFaq, name: 'EditFaq', meta: { requiresAuth: true } },

        {path:'/api/admin/created-faq-list', component: CreatedFaqList, name: 'CreatedFaqList', meta: { requiresAuth: true } },
        {path:'/api/admin/create-faq', component: CreateFaq, name: 'CreateFaq', meta: { requiresAuth: true } },
        {path:'/api/admin/edit-created-faq/:id', component: EditCreatedFaq, name: 'EditCreatedFaq', meta: { requiresAuth: true } },

        {path:'/api/admin/reply-question/:id', component: ReplyQuestion, name: 'ReplyQuestion', meta: { requiresAuth: true } },

        {path:'/api/admin/event-list', component: EventList, name: 'EventList', meta: { requiresAuth: true } },
        {path:'/api/admin/create-event', component: CreateEvent, name: 'CreateEvent', meta: { requiresAuth: true } },

        {path:'/api/admin/carousel-list', component: CarouselList, name: 'CarouselList', meta: { requiresAuth: true } },
        {path:'/api/admin/create-carousel', component: CreateCarousel, name: 'CreateCarousel', meta: { requiresAuth: true } },
        {path:'/api/admin/edit-carousel/:id', component: EditCarousel, name: 'EditCarousel', meta: { requiresAuth: true } },

    ]
})

export default router;