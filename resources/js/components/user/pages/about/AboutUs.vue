<template>
    <div id="about_us">
			<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								About Us				
							</h1>	
							<p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="about.html"> About Us</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start feature Area -->
			<section class="feature-area pb-120">
				<div class="container">
					<div class="row">
						<div class="col-lg-4">
							<div class="single-feature">
								<div class="title">
									<h4>Learn Online Courses</h4>
								</div>
								<div class="desc-wrap">
									<p>
										Usage of the Internet is becoming more common due to rapid advancement
										of technology.
									</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-feature">
								<div class="title">
									<h4>No.1 of universities</h4>
								</div>
								<div class="desc-wrap">
									<p>
										For many of us, our very first experience of learning about the celestial bodies begins when we saw our first.
									</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-feature">
								<div class="title">
									<h4>Huge Library</h4>
								</div>
								<div class="desc-wrap">
									<p>
										If you are a serious astronomy fanatic like a lot of us are, you can probably remember that one event.
									</p>
								</div>
							</div>
						</div>												
					</div>
				</div>	
			</section>
			<!-- End feature Area -->		

			<!-- Start info Area -->
			<section class="info-area pb-120">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-lg-6 no-padding info-area-left">
							<img class="img-fluid" src="/frontend/img/about-img.jpg" alt="">
						</div>
						<div class="col-lg-6 info-area-right">
							<h1>Who we are
							to Serave the nation</h1>
							<p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.</p>
							<br>
							<p>
								inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach. inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.
							</p>
						</div>
					</div>
				</div>	
			</section>
			<!-- End info Area -->	

			<!-- Start course-mission Area -->
			<section class="course-mission-area pb-120">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Goals to Achieve for the leadership</h1>
								<p>Who are in extremely love with eco friendly system.</p>
							</div>
						</div>
					</div>							
                    <div class="row">
                        <div class="col-md-6 accordion-left">

                            <!-- accordion 2 start-->
                            <dl class="accordion">
                                <dt>
                                    <a href="">Success</a>
                                </dt>
                                <dd>
                                    Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque mattis, leo quam aliquet diam, congue laoreet elit metus eget diam. Proin ac metus diam.
                                </dd>
                                <dt>
                                    <a href="">Info</a>
                                </dt>
                                <dd>
                                    Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. leo quam aliquet diam, congue laoreet elit metus eget diam.
                                </dd>
                                <dt>
                                    <a href="">Danger</a>
                                </dt>
                                <dd>
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. Proin ac metus diam.
                                </dd>
                                <dt>
                                    <a href="">Warning</a>
                                </dt>
                                <dd>
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. Proin ac metus diam.
                                </dd>                                    
                            </dl>
                            <!-- accordion 2 end-->
                        </div>
                        <div class="col-md-6 video-right justify-content-center align-items-center d-flex relative"
						v-for="about in abouts" :key="about.id">
                        	<div class="overlay overlay-bg"></div>
							<a class="play-btn" target="_blank" :href="about.video"><img class="img-fluid mx-auto" src="/frontend/img/play.png" alt=""></a>
                        </div>
                    </div>
				</div>	
			</section>
			<!-- End course-mission Area -->
					
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
            axios.get('/get-user-about')
                .then((response) => {
                    this.abouts = response.data.abouts
                })
        },
		getUserFaqs: async function(){
            axios.get('/get-user-faqs')
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