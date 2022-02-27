<template>
    <div id="admin_master">

<admin-header v-if="!['AdminLogin'].includes($route.name)"></admin-header>

<admin-sidebar v-if="!['AdminLogin'].includes($route.name)"></admin-sidebar>

<router-view></router-view>
    
	<div class="ttr-overlay"></div>
    </div>
</template>

<script>
import AdminHeader from './inc/AdminHeader.vue'
import AdminSidebar from './inc/AdminSidebar.vue'
export default {
    name: 'AdminMaster',
    components: {
        AdminHeader,
        AdminSidebar
    }
}
</script>