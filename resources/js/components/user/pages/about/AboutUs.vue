<template>
    <div id="about_us">
    <!-- Inner Content Box ==== -->
    <div class="page-content bg-white">
        <!-- Page Heading Box ==== -->
        <div class="page-banner ovbl-dark" style="background-image:url(/frontend/assets/images/banner/banner3.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">About Us</h1>
				 </div>
            </div>
        </div>
		<div class="breadcrumb-row">
			<div class="container">
				<ul class="list-inline">
					<li><a href="/api">Home</a></li>
					<li>About Us</li>
				</ul>
			</div>
		</div>
		<!-- Page Heading Box END ==== -->
        <!-- Page Content Box ==== -->
		<div class="content-block">
            <!-- About Us ==== -->
			<div class="section-area section-sp1">
                <div class="container">
					 <div class="row" v-for="about in abouts" :key="about.id">
						 <div class="col-lg-6 m-b30">
							<h2 class="title-head "><br/> <span class="text-primary" v-html="about.heading"></span></h2>
							<p v-html="about.description"></p>
						 </div>
						 <div class="col-lg-6">
							 <div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 m-b30">
									<div class="feature-container">
										<div class="feature-md text-white m-b20">
											<a href="#" class="icon-cell"><img src="/frontend/assets/images/icon/icon1.png" alt=""/></a> 
										</div>
										<div class="icon-content">
											<h5 class="ttr-tilte">{{ about.headerOne }}</h5>
											<p v-html="about.descriptionOne"></p>
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 m-b30">
									<div class="feature-container">
										<div class="feature-md text-white m-b20">
											<a href="#" class="icon-cell"><img src="/frontend/assets/images/icon/icon2.png" alt=""/></a> 
										</div>
										<div class="icon-content">
											<h5 class="ttr-tilte">{{ about.headerTwo }}</h5>
											<p v-html="about.descriptionTwo"></p>
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 m-b30">
									<div class="feature-container">
										<div class="feature-md text-white m-b20">
											<a href="#" class="icon-cell"><img src="/frontend/assets/images/icon/icon3.png" alt=""/></a> 
										</div>
										<div class="icon-content">
											<h5 class="ttr-tilte">{{ about.headerThree }}</h5>
											<p v-html="about.descriptionThree"></p>
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 m-b30">
									<div class="feature-container">
										<div class="feature-md text-white m-b20">
											<a href="#" class="icon-cell"><img src="/frontend/assets/images/icon/icon4.png" alt=""/></a> 
										</div>
										<div class="icon-content">
											<h5 class="ttr-tilte">{{ about.headerFour }}</h5>
											<p v-html="about.descriptionFour"></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
			<!-- About Us END ==== -->
			<!-- Why Choose ==== -->
			<div class="section-area bg-gray section-sp2 choose-bx">
				<div class="container">
					<div class="row">
						<div class="col-md-12 heading-bx text-center">
							<h2 class="title-head text-uppercase m-b0">Why Choose <span> Our Institution</span></h2>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
						</div>
					</div>
					<div class="row choose-bx-in">
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="service-bx">
								<div class="action-box">
									<img src="/frontend/assets/images/our-services/pic1.jpg" alt="">
								</div>
								<div class="info-bx text-center">
									<div class="feature-box-sm radius bg-white">
										<i class="fa fa-bank text-primary"></i>
									</div>
									<h4><a href="#">Best Industry Leaders</a></h4>
									<a href="#" class="btn radius-xl">View More</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="service-bx">
								<div class="action-box">
									<img src="/frontend/assets/images/our-services/pic2.jpg" alt="">
								</div>
								<div class="info-bx text-center">
									<div class="feature-box-sm radius bg-white">
										<i class="fa fa-book text-primary"></i>
									</div>
									<h4><a href="#">Learn Courses Online</a></h4>
									<a href="#" class="btn radius-xl">View More</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="service-bx m-b0">
								<div class="action-box">
									<img src="/frontend/assets/images/our-services/pic3.jpg" alt="">
								</div>
								<div class="info-bx text-center">
									<div class="feature-box-sm radius bg-white">
										<i class="fa fa-file-text-o text-primary"></i>
									</div>
									<h4><a href="#">Book Library & Store</a></h4>
									<a href="#" class="btn radius-xl">View More</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Why Choose END ==== -->

			<!-- Our Story ==== -->
			<div class="section-area bg-gray section-sp1 our-story">
				<div class="container">
					<div class="row align-items-center d-flex" v-for="about in abouts" :key="about.id">
						<div class="col-lg-5 col-md-12 heading-bx">
							<h2 class="m-b10">Our Story</h2>
							<h5 class="fw4">It is a long established fact that a reade.</h5>
							<p v-html="about.descriptionFive"></p>
						</div>
						<div class="col-lg-7 col-md-12 heading-bx p-lr">
							<!-- <div class="video-box">
								<video width="700" height="400" controls>
									<source src="/frontend/assets/videos/movie-2.mp4" type="video/mp4">
									Your browser does not support the video tag.
								</video>
							</div> -->
							<div class="video-bx">
								<img src="/frontend/assets/images/about/pic1.jpg" alt=""/>
								<a :href="about.video" class="popup-youtube video" target="_blank"><i class="fa fa-play"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Our Story END ==== -->
			<!-- Testimonials ==== -->
			<div class="section-area section-sp2">
				<div class="container">
					<div class="row">
						<div class="col-md-12 heading-bx left">
							<h2 class="title-head text-uppercase">what people <span>say</span></h2>
							<p>It is a long established fact that a reader will be distracted by the readable content of a page</p>
						</div>
					</div>
					<div class="testimonial-carousel owl-carousel owl-btn-1 col-12 p-lr0">
						<div class="item" v-for="faq in faqs" :key="faq.id">
							<div class="testimonial-bx">
								<div class="testimonial-thumb">
									<img src="/frontend/assets/images/testimonials/pic1.jpg" alt="">
								</div>
								<div class="testimonial-info">
									<h5 class="name">{{ faq.name }}</h5>
									<p>-Art Director</p>
								</div>
								<div class="testimonial-content">
									<p v-html="faq.message"></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Testimonials END ==== -->
        </div>
		<!-- Page Content Box END ==== -->
    </div>
	<!-- Page Content Box END ==== -->
    </div>
</template>

<script>
export default {
    name: 'AboutUs',
    data(){
        return {
            abouts: [],
			faqs: []
        }
    },
    methods: {
        fileLinkTwo(name){
        	return '/uploads/img/about/' + name
      	},
        getUserAbout: async function(){
            axios.get('/api/get-user-about')
                .then((response) => {
                    this.abouts = response.data.abouts
                })
        },
		getUserFaqs: async function(){
            axios.get('/api/get-user-faqs')
                .then((response) => {
                    this.faqs = response.data.faqs
                })
        },
    },
    computed: {},
    created(){
        this.getUserAbout()
		this.getUserFaqs()
    }
}
</script>