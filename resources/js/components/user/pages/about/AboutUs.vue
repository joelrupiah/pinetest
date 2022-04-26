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
							<p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span> About Us</p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start feature Area -->
			<section class="feature-area pb-120">
				<div class="container">
					<div class="row">
						<div class="col-lg-4" v-for="(about, index) in abouts" :key="index">
							<div class="single-feature">
								<div class="title">
									<h4 v-html="about.headingOne"></h4>
								</div>
								<div class="desc-wrap">
									<p v-html="about.descriptionOne">
									</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4" v-for="(about, i) in abouts" :key="i">
							<div class="single-feature">
								<div class="title">
									<h4 v-html="about.headingTwo"></h4>
								</div>
								<div class="desc-wrap">
									<p v-html="about.descriptionTwo">
									</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4" v-for="abot in abouts" :key="abot.id">
							<div class="single-feature">
								<div class="title">
									<h4 v-html="abot.headingThree"></h4>
								</div>
								<div class="desc-wrap">
									<p v-html="abot.descriptionThree">
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
					<div class="row align-items-center" v-for="abt in abouts" :key="abt.id">
						<div class="col-lg-6 info-area-left">
							<!-- <img class="about-img-fluid" id="about-image" :src="fileLinkOne(abt.imageOne)" alt=""> -->
							<img class="img-fluid" id="about-image" src="/frontend/img/play.png" alt="" 
								style="max-width:100%;height:auto">
						</div>
						<div class="col-lg-6 info-area-right">
							<h1 v-html="abt.heading"></h1>
							<p v-html="abt.description"></p>
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
								<h1 class="mb-10">Goals to Achieve for success</h1>
								<!-- <p>Who are in extremely love with eco friendly system.</p> -->
							</div>
						</div>
					</div>							
                    <div class="row">
                        <div class="col-md-6 accordion-left">
							<div v-for="ab in abouts" :key="ab.id">
								<el-collapse v-model="activeNames">
									<el-collapse-item :title="ab.headingFour" name="1">
										<div v-html="ab.descriptionFour"></div>
									</el-collapse-item>
								</el-collapse>
								<el-collapse v-model="activeNames">
									<el-collapse-item :title="ab.headingFive" name="2">
										<div v-html="ab.descriptionFive"></div>
									</el-collapse-item>
								</el-collapse>
								<el-collapse v-model="activeNames">
									<el-collapse-item :title="ab.headingSix" name="3">
										<div v-html="ab.descriptionSix"></div>
									</el-collapse-item>
								</el-collapse>
								<el-collapse v-model="activeNames">
									<el-collapse-item :title="ab.headingSeven" name="4">
										<div v-html="ab.descriptionSeven"></div>
									</el-collapse-item>
								</el-collapse>
							</div>
                        </div>
                        <div class="col-md-6 video-right justify-content-center align-items-center d-flex relative"
						v-for="abu in abouts" :key="abu">
                        	<div class="overlay overlay-bg" style="background:url('/frontend/img/grad-about.jpg');background-size:cover;background-repeat: no-repeat;"></div>
							<a class="play-btn" :href="abu.video" target="_blank" >
								<img class="img-fluid mx-auto" src="/frontend/img/play.png" alt="">
							</a>
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
			activeNames: ['1'],
            abouts: [],
			faqs: []
        }
    },
    methods: {
		fileLinkOne(name){
        	return '/uploads/img/about/' + name
      	},
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