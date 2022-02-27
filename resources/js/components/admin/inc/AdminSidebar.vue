<template>
    <div id="admin-sidebar">
	<!-- Left sidebar menu start -->
	<div class="ttr-sidebar">
		<div class="ttr-sidebar-wrapper content-scroll">
			<!-- side menu logo start -->
			<div class="ttr-sidebar-logo">
				<a href="#"><img alt="" src="/backend/assets/images/logo.png" width="122" height="27"></a>
				<div class="ttr-sidebar-toggle-button">
					<i class="ti-arrow-left"></i>
				</div>
			</div>
			<!-- side menu logo end -->
			<!-- sidebar menu start -->
			<nav class="ttr-sidebar-navi">
				<ul>
					<li>
						<a href="/api/admin" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-home"></i></span>
		                	<span class="ttr-label">Dashboard</span>
		                </a>
		            </li>
					<li>
						<router-link :to="{name: 'GradeList'}" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-home"></i></span>
		                	<span class="ttr-label">Grade List</span>
		                </router-link>
		            </li>
					<li>
						<router-link :to="{name: 'GalleryList'}" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-home"></i></span>
		                	<span class="ttr-label">Gallery List</span>
		                </router-link>
		            </li>
					<li>
						<router-link :to="{name: 'CarouselList'}" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-home"></i></span>
		                	<span class="ttr-label">Carousel List</span>
		                </router-link>
		            </li>
					<li>
						<router-link :to="{name: 'AdminProfile'}" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-book"></i></span>
		                	<span class="ttr-label">Profile</span>
		                </router-link>
		            </li>
					<li>
						<a href="#" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-email"></i></span>
		                	<span class="ttr-label">Admins</span>
		                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
		                </a>
		                <ul>
		                	<li>
		                		<router-link :to="{name: 'RoleList'}" class="ttr-material-button">
                                    <span class="ttr-label">Roles</span>
                                </router-link>
		                	</li>
		                	<li>
		                		<router-link :to="{name: 'PermissionList'}" class="ttr-material-button">
                                    <span class="ttr-label">Permissions</span>
                                </router-link>
		                	</li>
							<li>
		                		<router-link :to="{name: 'AdminList'}" class="ttr-material-button">
                                    <span class="ttr-label">Admin List</span>
                                </router-link>
		                	</li>
                            <li>
		                		<router-link :to="{name: 'AdminTrash'}" class="ttr-material-button">
                                    <span class="ttr-label">Admin Trash</span>
                                </router-link>
		                	</li>
		                </ul>
		            </li>
					<li>
						<a href="#" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-email"></i></span>
		                	<span class="ttr-label">Events</span>
		                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
		                </a>
		                <ul>
		                	<li>
		                		<router-link :to="{name: 'EventList'}" class="ttr-material-button">
                                    <span class="ttr-label">Event List</span>
                                </router-link>
		                	</li>
							<li>
		                		<router-link :to="{name: 'CreateEvent'}" class="ttr-material-button">
                                    <span class="ttr-label">Create Event</span>
                                </router-link>
		                	</li>
		                </ul>
		            </li>
					<li>
						<a href="#" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-email"></i></span>
		                	<span class="ttr-label">Faqs</span>
		                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
		                </a>
		                <ul>
		                	<li>
		                		<router-link :to="{name: 'FaqList'}" class="ttr-material-button">
                                    <span class="ttr-label">Faqs</span>
                                </router-link>
		                	</li>
							<li>
		                		<router-link :to="{name: 'CreatedFaqList'}" class="ttr-material-button">
                                    <span class="ttr-label">Created Faqs</span>
                                </router-link>
		                	</li>
		                	<li>
		                		<router-link :to="{name: 'CreateFaq'}" class="ttr-material-button">
                                    <span class="ttr-label">Create Faq</span>
                                </router-link>
		                	</li>
		                </ul>
		            </li>
                    <li>
						<a href="#" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-email"></i></span>
		                	<span class="ttr-label">Pages</span>
		                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
		                </a>
		                <ul>
		                	<li>
		                		<router-link :to="{name: 'AdminAboutUsList'}" class="ttr-material-button">
                                    <span class="ttr-label">Admin About Us List</span>
                                </router-link>
		                	</li>
		                	<li>
		                		<router-link :to="{name: 'CreateAdminAboutUs'}" class="ttr-material-button">
                                    <span class="ttr-label">Create Admin About Us</span>
                                </router-link>
		                	</li>
							<li>
		                		<router-link :to="{name: 'AdminAboutHistoryList'}" class="ttr-material-button">
                                    <span class="ttr-label">Admin About History</span>
                                </router-link>
		                	</li>
		                </ul>
		            </li>
                    <li>
						<a href="#" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-email"></i></span>
		                	<span class="ttr-label">Emailing</span>
		                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
		                </a>
		                <ul>
		                	<li>
		                		<router-link :to="{name: 'ParentsBulkEmail'}" class="ttr-material-button">
                                    <span class="ttr-label">Parents Bulk Email</span>
                                </router-link>
		                	</li>
		                	<li>
		                		<router-link :to="{name: 'TeachersBulkEmail'}" class="ttr-material-button">
                                    <span class="ttr-label">Teachers Bulk Email</span>
                                </router-link>
		                	</li>
		                </ul>
		            </li>
		            <li class="ttr-seperate"></li>
				</ul>
				<!-- sidebar menu end -->
			</nav>
			<!-- sidebar menu end -->
		</div>
	</div>
	<!-- Left sidebar menu end -->

    </div>
</template>

<script>
export default {
    name: 'AdminSidebar'
}
</script>