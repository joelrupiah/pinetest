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

import ParentsBulkEmail from '../components/admin/pages/email/ParentsBulkEmail'
import TeachersBulkEmail from '../components/admin/pages/email/TeachersBulkEmail'

import AdminAboutUs from '../components/admin/pages/about/AdminAboutUs'
import AdminAboutHistory from '../components/admin/pages/about/AdminAboutHistory'

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

        {path:'/api/admin/parents-bulk-email', component: ParentsBulkEmail, name: 'ParentsBulkEmail', meta: { requiresAuth: true } },
        {path:'/api/admin/teachers-bulk-email', component: TeachersBulkEmail, name: 'TeachersBulkEmail', meta: { requiresAuth: true } },

        {path:'/api/admin/admin-about-us', component: AdminAboutUs, name: 'AdminAboutUs', meta: { requiresAuth: true } },
        {path:'/api/admin/admin-about-history', component: AdminAboutHistory, name: 'AdminAboutHistory', meta: { requiresAuth: true } },

    ]
})

export default router;