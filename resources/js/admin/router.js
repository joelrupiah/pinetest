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

import ApplicationList from '../components/admin/pages/application/ApplicationList'
import ReplyEmailApplication from '../components/admin/pages/application/ReplyEmailApplication'
import ApplicationDetails from '../components/admin/pages/application/ApplicationDetails'

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
import EditEvent from '../components/admin/pages/event/EditEvent'

import CarouselList from '../components/admin/pages/carousel/CarouselList'
import CreateCarousel from '../components/admin/pages/carousel/CreateCarousel'
import EditCarousel from '../components/admin/pages/carousel/EditCarousel'

import SiteSettingsList  from '../components/admin/pages/site-settings/SiteSettingsList.vue'
import CreateSiteSetting  from '../components/admin/pages/site-settings/CreateSiteSetting.vue'
import EditSiteSetting  from '../components/admin/pages/site-settings/EditSiteSetting.vue'

import ChooseList from '../components/admin/pages/choose/ChooseList.vue'
import CreateChoose from '../components/admin/pages/choose/CreateChoose.vue'
import EditChoose from '../components/admin/pages/choose/EditChoose.vue'

const router = new VueRouter({
    mode: 'history',
    linkActiveClass: 'active',
    routes: [

        {path:'/admin', component: AdminDashboard, name: 'AdminDashboard', meta: { requiresAuth: true } },

        {path:'/admin/admin-login', component: AdminLogin, name: 'AdminLogin', meta: { requiresVisitor: true } },
        {path:'/admin/admin-reset-password', component: ResetPassword, name: 'ResetPassword', meta: { requiresVisitor: true } },

        {path: '/admin/admin-profile', component: AdminProfile, name: 'AdminProfile', meta: { requiresAuth: true } },

        {path: '/admin/roles', component: RoleList, name: 'RoleList', meta: { requiresAuth: true } },

        {path: '/admin/permissions', component: PermissionList, name: 'PermissionList', meta: { requiresAuth: true } },

        {path:'/admin/admins', component: AdminList, name: 'AdminList', meta: { requiresAuth: true } },
        {path:'/admin/admin-trash', component: AdminTrash, name: 'AdminTrash', meta: { requiresAuth: true } },

        {path:'/admin/grade-list', component: GradeList, name: 'GradeList', meta: { requiresAuth: true } },
        
        {path:'/admin/application-list', component: ApplicationList, name: 'ApplicationList', meta: { requiresAuth: true } },
        {path:'/admin/reply-email-application/:id', component: ReplyEmailApplication, name: 'ReplyEmailApplication', meta: { requiresAuth: true } },
        {path:'/admin/show-application-details/:id', component: ApplicationDetails, name: 'ApplicationDetails', meta: { requiresAuth: true } },

        {path:'/admin/gallery-list', component: GalleryList, name: 'GalleryList', meta: { requiresAuth: true } },
        {path:'/admin/create-gallery', component: CreateGallery, name: 'CreateGallery', meta: { requiresAuth: true } },
        {path:'/admin/edit-gallery/:id', component: EditGallery, name: 'EditGallery', meta: { requiresAuth: true } },

        {path:'/admin/parents-bulk-email', component: ParentsBulkEmail, name: 'ParentsBulkEmail', meta: { requiresAuth: true } },
        {path:'/admin/teachers-bulk-email', component: TeachersBulkEmail, name: 'TeachersBulkEmail', meta: { requiresAuth: true } },

        {path:'/admin/admin-about-us-list', component: AdminAboutUsList, name: 'AdminAboutUsList', meta: { requiresAuth: true } },
        {path:'/admin/create-admin-about-us', component: CreateAdminAboutUs, name: 'CreateAdminAboutUs', meta: { requiresAuth: true } },
        {path:'/admin/edit-admin-about-us/:id', component: EditAdminAboutUs, name: 'EditAdminAboutUs', meta: { requiresAuth: true } },
       
        {path:'/admin/admin-about-history-list', component: AdminAboutHistoryList, name: 'AdminAboutHistoryList', meta: { requiresAuth: true } },
        {path:'/admin/create-about-history', component: CreateAboutHistory, name: 'CreateAboutHistory', meta: { requiresAuth: true } },
        {path:'/admin/edit-about-history/:id', component: EditAboutHistory, name: 'EditAboutHistory', meta: { requiresAuth: true } },

        {path:'/admin/admin-faq-list', component: FaqList, name: 'FaqList', meta: { requiresAuth: true } },
        {path:'/admin/edit-faq/:id', component: EditFaq, name: 'EditFaq', meta: { requiresAuth: true } },

        {path:'/admin/created-faq-list', component: CreatedFaqList, name: 'CreatedFaqList', meta: { requiresAuth: true } },
        {path:'/admin/create-faq', component: CreateFaq, name: 'CreateFaq', meta: { requiresAuth: true } },
        {path:'/admin/edit-created-faq/:id', component: EditCreatedFaq, name: 'EditCreatedFaq', meta: { requiresAuth: true } },

        {path:'/admin/reply-question/:id', component: ReplyQuestion, name: 'ReplyQuestion', meta: { requiresAuth: true } },

        {path:'/admin/event-list', component: EventList, name: 'EventList', meta: { requiresAuth: true } },
        {path:'/admin/create-event', component: CreateEvent, name: 'CreateEvent', meta: { requiresAuth: true } },
        {path:'/admin/edit-event/:id', component: EditEvent, name: 'EditEvent', meta: { requiresAuth: true } },

        {path:'/admin/carousel-list', component: CarouselList, name: 'CarouselList', meta: { requiresAuth: true } },
        {path:'/admin/create-carousel', component: CreateCarousel, name: 'CreateCarousel', meta: { requiresAuth: true } },
        {path:'/admin/edit-carousel/:id', component: EditCarousel, name: 'EditCarousel', meta: { requiresAuth: true } },

        {path:'/admin/site-settings-list', component: SiteSettingsList, name: 'SiteSettingsList', meta: { requiresAuth: true }},
        {path:'/admin/create-site-setting', component: CreateSiteSetting, name: 'CreateSiteSetting', meta: { requiresAuth: true }},
        {path:'/admin/edit-site-setting/:id', component: EditSiteSetting, name: 'EditSiteSetting', meta: { requiresAuth: true }},

        {path: '/admin/choose-list', component: ChooseList, name: 'ChooseList', meta: { requiresAuth: true }},
        {path: '/admin/create-choose', component: CreateChoose, name: 'CreateChoose', meta: { requiresAuth: true }},
        {path: '/admin/edit-choose/:id', component: EditChoose, name: 'EditChoose', meta: { requiresAuth: true }}
    ]
})

export default router;