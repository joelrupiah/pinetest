<template>
    <div id="user_event">
			<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Events				
							</h1>	
							<p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="events.html"> Events</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
				
			<!-- Start events-list Area -->
			<section class="events-list-area section-gap event-page-lists">
				<div class="container">
					<h1 class="text-center text-muted mb-5" style="margin-top:-90px">School Events</h1>
					<div class="row align-items-center">
						<div class="col-lg-6 pb-30 text-center" v-if="events.length < 20">
							<h4 class="text-muted text-danger text-md">No Events for now</h4>
						</div>
						<div class="col-lg-6 pb-30" v-else v-for="event in events" :key="event.id">
							<div class="single-carusel row align-items-center">
								<div class="col-12 col-md-6 thumb">
									<img class="img-fluid" :src="fileLinkEvent(event.image)" alt="">
								</div>
								<div class="detials col-12 col-md-6">
									<p>{{ event.startdate | time }} -- {{ event.endate | time }}</p>
									<a :href="$router.resolve({name:'EventDetail', params: {eventSlug: event.slug}}).href">
										<h4 v-html="event.title"></h4>
									</a>
									<p v-html="event.description"></p>
								</div>
							</div>
						</div>																		
					</div>
				</div>	
			</section>
			<!-- End events-list Area -->
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