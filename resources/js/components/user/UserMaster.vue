<template>
    <div id="user_master">
    <div class="boxed_wrapper">

        <div class="preloader"></div>

<user-header></user-header>

<user-navbar></user-navbar>

<router-view></router-view>

    <user-footer></user-footer>

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