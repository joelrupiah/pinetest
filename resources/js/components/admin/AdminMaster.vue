<template>
    <div id="admin_master">
        <!-- Page Container -->
        <div class="page-container">
            
            <admin-sidebar v-if="!['AdminLogin', 'ResetPassword'].includes($route.name)"></admin-sidebar>
            
            <!-- Page Content -->
            <div class="page-content">
                <admin-header v-if="!['AdminLogin', 'ResetPassword'].includes($route.name)"></admin-header>
                <!-- Page Inner -->
                <div class="page-inner">
                    
                    <router-view></router-view>

                    <admin-footer v-if="!['AdminLogin', 'ResetPassword'].includes($route.name)"></admin-footer>
                </div><!-- /Page Inner -->
            </div><!-- /Page Content -->
        </div><!-- /Page Container -->
    </div>
</template>

<script>
import AdminSidebar from './inc/AdminSidebar.vue'
import AdminHeader from './inc/AdminHeader.vue'
import AdminFooter from './inc/AdminFooter.vue'
export default {
    name: 'AdminMaster',
    components: {
        AdminSidebar,
        AdminHeader,
        AdminFooter
    }
}
</script>