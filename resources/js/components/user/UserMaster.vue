<template>
    <div id="user_master">
        <PageLoader />
		<user-header></user-header>

		<router-view></router-view>
						
		<user-footer></user-footer>

    </div>
</template>

<script>
import PageLoader from '../res/PageLoader.vue'
import UserHeader from './inc/UserHeader.vue'
// import UserNavbar from './inc/UserNavbar.vue'
import UserFooter from './inc/UserFooter.vue'
export default {
    name: 'UserMaster',
    components: {
        PageLoader,
        UserHeader,
        UserFooter
    }
}
</script>