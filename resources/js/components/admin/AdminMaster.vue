<template>
  <div id="admin_master">
    <div class="wrapper">
      <admin-header v-if="!['AdminLogin'].includes($route.name)"></admin-header>
      <admin-sidebar v-if="!['AdminLogin'].includes($route.name)"></admin-sidebar>
      <router-view></router-view>
    </div> <!-- .wrapper -->
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