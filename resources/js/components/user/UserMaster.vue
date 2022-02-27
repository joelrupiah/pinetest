<template>
    <div id="user_master">
<div class="page-wraper">
<div id="loading-icon-bx"></div>
    <user-header></user-header>
        <router-view></router-view>
    <user-footer></user-footer>
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