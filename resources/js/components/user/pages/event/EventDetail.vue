<template>
    <div id="event_list">
			<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								{{ eventdetail.title }} Details			
							</h1>	
							<p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="event-details.html"> Event Details</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
				
			<!-- Start event-details Area -->
			<section class="event-details-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 event-details-left">
							<div class="main-img">
								<img class="img-fluid" :src="fileLink(eventdetail.image)" alt="Event Image">
							</div>
							<div class="details-content">
								<a href="#">
									<h4>Designing Effective Slider images</h4>
								</a>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.									
								</p>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolorema gna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commo doconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.									
								</p>
							</div>
							<div class="social-nav row no-gutters">
								<div class="col-lg-6 col-md-6 ">
									<ul class="focials">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
										<li><a href="#"><i class="fa fa-behance"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-lg-4 event-details-right">
							<div class="single-event-details">
								<h4>Details</h4>
								<ul class="mt-10">
									<li class="justify-content-between d-flex">
										<span>Start date</span>
										<span>{{ eventdetail.startdate | time }}</span>
									</li>
									<li class="justify-content-between d-flex">
										<span>End date</span>
										<span>{{ eventdetail.enddate | time }}</span>
									</li>														
								</ul>
							</div>
							<div class="single-event-details">
								<h4>Venue</h4>
								<ul class="mt-10">
									<li class="justify-content-between d-flex">
										<span>Place</span>
										<span>Main Hallroom</span>
									</li>
									<li class="justify-content-between d-flex">
										<span>Street</span>
										<span>Bullevard Street</span>
									</li>
									<li class="justify-content-between d-flex">
										<span>City</span>
										<span>Santa Monica</span>
									</li>														
								</ul>
							</div>
							<div class="single-event-details">
								<h4>Organiser</h4>
								<ul class="mt-10">
									<li class="justify-content-between d-flex">
										<span>Company</span>
										<span>Colorlib</span>
									</li>
									<li class="justify-content-between d-flex">
										<span>Street</span>
										<span>Bullevard Street</span>
									</li>
									<li class="justify-content-between d-flex">
										<span>City</span>
										<span>Santa Monica</span>
									</li>														
								</ul>
							</div>														
						</div>
					</div>
				</div>	
			</section>
			<!-- End event-details Area -->
    </div>
</template>

<script>
export default {
    name: 'EventDetail',
    data(){
        return {
        }
    },
    methods: {
		fileLink(name){
			return '/uploads/img/event/' + name
		},
		getEventDetails(){
			this.$store.dispatch('event/getEventDetail', this.$route.params.eventSlug)
		}
	},
    computed: {
		eventdetail(){
			return this.$store.getters['event/getEventDetail']
		}
	},
    created() {
		this.getEventDetails()
	}
}
</script>