<template>
    <div id="admin-sidebar">
        <!-- Page Sidebar -->
            <div class="page-sidebar">
                <a class="logo-box" href="index.html">
                    <span>ecaps</span>
                    <i class="icon-radio_button_unchecked" id="fixed-sidebar-toggle-button"></i>
                    <i class="icon-close" id="sidebar-toggle-button-close"></i>
                </a>
                <div class="page-sidebar-inner">
                    <div class="page-sidebar-menu">
                        <ul class="accordion-menu">
                            <li class="active-page">
                                <a href="/api/admin">
                                    <i class="menu-icon icon-home4"></i><span>Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <router-link :to="{name: 'AdminProfile'}">
                                    <i class="menu-icon icon-inbox"></i><span>Profile</span>
                                </router-link>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon icon-flash_on"></i><span>Admins</span><i class="accordion-icon fa fa-angle-left"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li><router-link :to="{name: 'RoleList'}">Roles</router-link></li>
                                    <li><router-link :to="{name: 'PermissionList'}">Permissions</router-link></li>
                                    <li><router-link :to="{name: 'AdminList'}">Admin List</router-link></li>
                                    <li><router-link :to="{name: 'AdminTrash'}">Admin Trash</router-link></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon icon-flash_on"></i><span>Pages</span><i class="accordion-icon fa fa-angle-left"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li><router-link :to="{name: 'AdminAboutUs'}">Admin About Us</router-link></li>
                                    <li><router-link :to="{name: 'AdminAboutHistory'}">Admin About History</router-link></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon icon-flash_on"></i><span>Emailing</span><i class="accordion-icon fa fa-angle-left"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li><router-link :to="{name: 'ParentsBulkEmail'}">Parents Bulk Email</router-link></li>
                                    <li><router-link :to="{name: 'TeachersBulkEmail'}">Teachers Bulk Email</router-link></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- /Page Sidebar -->
    </div>
</template>

<script>
export default {
    name: 'AdminSidebar'
}
</script>