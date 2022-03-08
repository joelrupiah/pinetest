<template>
    <div id="user_master">
<div class="page-wraper">
<div id="loading-icon-bx"></div>
	<!-- Header Top ==== -->
    <header class="header rs-nav header-transparent">
		<user-header></user-header>
		<user-navbar></user-navbar>
    </header>
    <!-- Header Top END ==== -->
    <!-- Content -->
    <router-view></router-view>
    <!-- Content END-->
	<!-- Footer ==== -->
    <user-footer></user-footer>
    <!-- Footer END ==== -->
    <button class="back-to-top fa fa-chevron-up" ></button>
</div>
    </div>
</template>

<script>
import UserHeader from './inc/UserHeader.vue'
import UserNavbar from './inc/UserNavbar.vue'
import UserFooter from './inc/UserFooter.vue'
export default {
    name: 'UserMaster',
    components: {
        UserHeader,
        UserNavbar,
        UserFooter
    }
}
</script>