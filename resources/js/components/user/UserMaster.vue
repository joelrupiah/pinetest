<template>
    <div id="user_master">
		<user-header></user-header>

		<router-view></router-view>
						
		<user-footer></user-footer>

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
        UserFooter
    }
}
</script>