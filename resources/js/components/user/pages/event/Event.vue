<template>
    <div id="user_event">
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-dark" style="background-image:url(/frontend/assets/images/banner/banner2.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Events</h1>
				 </div>
            </div>
        </div>
		<!-- Breadcrumb row -->
		<div class="breadcrumb-row">
			<div class="container">
				<ul class="list-inline">
					<li><a href="#">Home</a></li>
					<li>Events</li>
				</ul>
			</div>
		</div>
		<!-- Breadcrumb row END -->
        <!-- contact area -->
        <div class="content-block">
			<!-- Portfolio  -->
			<div class="section-area section-sp1 gallery-bx">
				<div class="container">
					<div class="feature-filters clearfix center m-b40">
						<h1>Events</h1>
					</div>
					<div class="clearfix">
						<ul id="masonry" class="ttr-gallery-listing magnific-image row">
							<li class="action-card col-lg-4 col-md-4 col-sm-12 happening"
                            v-for="event in events" :key="event.id" >
								<div class="event-bx m-b30">
									<div class="action-box">
										<img :src="fileLinkEvent(event.image)" alt="">
									</div>
									<div class="info-bx d-flex">
										<div class="event-info">
											<h4 class="event-title">
                                                <a :href="$router.resolve({name:'EventDetail', params: {eventSlug: event.slug}}).href">
                                                    {{ event.title }}</a></h4>
											<ul class="media-post">
												<li><a :href="$router.resolve({name:'EventDetail', params: {eventSlug: event.slug}}).href">
                                                    <i class="fa fa-clock-o"></i> {{ event.start_time }} -  {{ event.end_time }}</a></li>
												<li><a :href="$router.resolve({name:'EventDetail', params: {eventSlug: event.slug}}).href">
                                                    <i class="fa fa-map-marker"></i> {{ event.location }}</a></li>
											</ul>
											<p v-html="event.description"></p>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
        </div>
		<!-- contact area END -->
    </div>
    </div>
</template>

<script>
export default {
    name: 'Event',
    data(){
        return {
            events: []
        }
    },
    methods: {
        fileLinkEvent(name){
        	return '/uploads/img/event/' + name
      	},
        getUserEvents: async function(){
            axios.get('/api/get-user-events')
                .then((response) => {
                    this.events = response.data.events
                })
        },
    },
    computed: {},
    created() {
        this.getUserEvents()
    }
}
</script>