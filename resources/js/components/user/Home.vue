<template>
    <div id="home">

		<notifications group="home" class="mt-3" />
			<!-- start banner Area -->
			<section class="banner-area relative" id="home">
				<div class="overlay overlay-bg"></div>	
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-between">
						<div class="banner-content col-lg-9 col-md-12">
							<h1 class="text-uppercase">
								We Ensure better education
								for a better future			
							</h1>
							<p class="pt-10 pb-10">
								In the history of modern astronomy, there is probably no one greater leap forward than the building and launch of the space telescope known as the Hubble.
							</p>
							<a href="/about-us" class="primary-btn text-uppercase">Learn More</a>
						</div>										
					</div>
				</div>					
			</section>
			<!-- End banner Area -->

			<!-- Start feature Area -->
			<section class="feature-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-4">
							<div class="single-feature">
								<div class="title" style="background-color:#D4AF37">
									<h4>Vision</h4>
								</div>
								<div class="desc-wrap">
									<p>
										To create and provide an atmosphere for learners to excel.
									</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-feature">
								<div class="title" style="background-color:#D4AF37">
									<h4>Mission</h4>
								</div>
								<div class="desc-wrap">
									<p>
										To provide every learner with an opportunity to achieve their full potential academically, emotionally, physically and socially within a healthy, safe and enjoyable school environment.
									</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-feature">
								<div class="title" style="background-color:#D4AF37">
									<h4>Motto</h4>
								</div>
								<div class="desc-wrap">
									<p>
										Learn, Adapt and Excel
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</section>
			<!-- End feature Area -->
					
			<!-- Start popular-course Area -->
			<section class="top-category-widget-area pt-90 pb-90">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Why Choose Us</h1>
								<p>There is a moment in the life of any aspiring.</p>
							</div>
						</div>
					</div>						
					<div class="row">		
						<div class="col-lg-4 mb-1" v-for="choose in chooses" :key="choose.id">
							<div class="single-cat-widget">
								<div class="content relative">
									<div class="overlay overlay-bg"></div>
								    <a href="#" target="_blank">
								      <div class="thumb">
								  		 <img class="content-image img-fluid d-block mx-auto" :src="fileLinkChoose(choose.image)" alt="">
								  	  </div>
								      <div class="content-details">
								        <h4 class="content-title mx-auto text-uppercase">{{ choose.title }}</h4>
								        <span></span>
								        <p v-html="choose.description"></p>
								      </div>
								    </a>
								</div>
							</div>
						</div>												
					</div>
				</div>	
			</section>
			<!-- End popular-course Area -->
			
			<!-- Start curriculum Area -->
			<section class="search-course-area relative mb-5">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row justify-content-between align-items-center">
						<div class="col-lg-6 col-md-6 search-course-left section-gap">
							<h1 class="text-white">
								Curriculum
							</h1>
							<p class="text-white font-weight-bold">
								inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.
								inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.
								inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.
								inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.
								inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.
								inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.
								inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.
							</p>
						</div>
						<div class="col-lg-4 col-md-6 search-course-right section-gap">
							<form class="form-wrap" action="#">
								<div class="row details-content">
									<div class="col single-detials">
										<a href="#"><h4>Expert Teachers</h4></a>		
										<p class="text-white">
											Usage of the Internet is becoming more common due to rapid advancement of technology and power.
										</p>						
									</div>
									<div class="col single-detials">
										<a href="#"><h4>Resources</h4></a>		
										<p class="text-white">
											Usage of the Internet is becoming more common due to rapid advancement of technology and power.
										</p>						
									</div>	
									<div class="col single-detials">
										<a href="#"><h4>Expert Teachers</h4></a>		
										<p class="text-white">
											Usage of the Internet is becoming more common due to rapid advancement of technology and power.
										</p>						
									</div>
									<div class="col single-detials">
										<a href="#"><h4>Resources</h4></a>		
										<p class="text-white">
											Usage of the Internet is becoming more common due to rapid advancement of technology and power.
										</p>						
									</div>							
								</div>
							</form>
						</div>
					</div>
				</div>	
			</section>
			<!-- End curriculum Area -->

			<!-- Start search-course Area -->
			<section class="search-course-area relative mt-5" style="background:url(/frontend/img/children.jpg) center;background-size:cover">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row justify-content-between align-items-center">
						<div class="col-lg-6 col-md-6 search-course-left">
							<h1 class="text-white">
								Get quality education
							</h1>
							<p>
								inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.
							</p>
							<div class="row details-content">
								<div class="col single-detials">
									<span class="lnr lnr-graduation-hat"></span>
									<a href="#"><h4>Expert Teachers</h4></a>		
									<p>
										Usage of the Internet is becoming more common due to rapid advancement of technology and power.
									</p>						
								</div>
								<div class="col single-detials">
									<span class="lnr lnr-license"></span>
									<a href="#"><h4>Resources</h4></a>		
									<p>
										Usage of the Internet is becoming more common due to rapid advancement of technology and power.
									</p>						
								</div>								
							</div>
						</div>
						<div class="col-lg-4 col-md-6 search-course-right section-gap">
							<form class="form-wrap" action="#">
								<h4 class="text-white pb-20 text-center mb-30">Request for admission</h4>
								<div class="mb-1">
									<el-input placeholder="Parent's Name (required)" size="mini" v-model="form.parent_name"></el-input>	
									<small class="text-danger text-sm" v-if="errors.parent_name">
										{{ errors.parent_name[0] }}
									</small>
								</div>	
								<div class="mb-1">
									<el-input placeholder="Parent's Phone (required)" size="mini" v-model="form.parent_phone"></el-input>	
									<small class="text-danger text-sm" v-if="errors.parent_phone">
										{{ errors.parent_phone[0] }}
									</small>
								</div>	
								<div class="mb-1">
									<el-input placeholder="Parent's Email (optional)" size="mini" v-model="form.parent_email"></el-input>	
									<small class="text-danger text-sm" v-if="errors.parent_email">
										{{ errors.parent_email[0] }}
									</small>
								</div>
								<div class="mb-1">
									<el-input placeholder="Student's Name (required)" size="mini" v-model="form.student_name"></el-input>	
									<small class="text-danger text-sm" v-if="errors.student_name">
										{{ errors.student_name[0] }}
									</small>
								</div>
								<div class="mb-1">
									<el-input placeholder="Student's Age (required)" size="mini" v-model="form.student_age"></el-input>	
									<small class="text-danger text-sm" v-if="errors.student_age">
										{{ errors.student_age[0] }}
									</small>
								</div>
								<div class="form-select mb-3" id="service-select">
									<el-select v-model="form.grade_id" placeholder="Choose Grade (required)"
										size="mini" style="width:100%" >
										<el-option 
											v-for="grade in grades"
											:value="grade.id" 
											:label="grade.name"
											:key="grade.id">
											{{ grade.name }}
										</el-option>
									</el-select>
									<small class="text-danger text-sm" v-if="errors.grade_id">
										{{ errors.grade_id[0] }}
									</small>
								</div>									
								<el-button :loading="loading" size="mini" style="background-color:royalblue;color:white"
									@click.prevent="submitApplication()">{{ loading ? 'Submitting Application.....' : 'Submit Application' }}
								</el-button>
							</form>
						</div>
					</div>
				</div>	
			</section>
			<!-- End search-course Area -->

			<!-- Start events Area -->
			<section class="blog-area section-gap" id="blog">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">School Events</h1>
							</div>
						</div>
					</div>					
					<div class="row">
						<div class="col-lg-3 col-md-6 single-blog" v-if="events.length < 0">
							<h2 class="text-muted text-danger text-md">
								No Events found
							</h2>
						</div>
						<div class="col-lg-3 col-md-6 single-blog mb-2" v-else v-for="event in events" :key="event.id">
							<div class="thumb">
								<img class="img-fluid" :src="fileLinkEvent(event.image)" alt="Event Image">								
							</div>
							<p class="meta">{{ event.startdate | time }} -- {{ event.endate | time }}</p>
							<a :href="$router.resolve({name:'EventDetail', params: {eventSlug: event.slug}}).href">
								<h5 v-html="event.title"></h5>
							</a>
							<p v-html="event.description"></p>
							<a :href="$router.resolve({name:'EventDetail', params: {eventSlug: event.slug}}).href" 
							class="details-btn d-flex justify-content-center align-items-center">
								<span class="details">Details</span><span class="lnr lnr-arrow-right"></span></a>		
						</div>					
					</div>
				</div>	
			</section>
			<!-- End blog Area -->	
			
			<!-- Start cta-one Area -->
			<section class="cta-one-area relative section-gap">
				<div class="container">
					<div class="overlay overlay-bg"></div>
					<div class="row justify-content-center">
						<div class="wrap">
							<h1 class="text-white">Become part of our team</h1>
							<p>
								There is a moment in the life of any aspiring astronomer that it is time to buy that first telescope. It’s exciting to think about setting up your own viewing station whether that is on the deck.
							</p>
							<a class="primary-btn wh" href="" @click.prevent="applyForAJob">Apply for an opening</a>								
						</div>					
					</div>
				</div>	
			</section>
			<!-- End cta-one Area -->
		
			<!-- Start review Area -->
			<!-- <section class="review-area section-gap relative">
				<div class="overlay overlay-bg"></div>
				<div class="container">	
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Reviews</h1>
								<p>If you are a serious astronomy fanatic like a lot of us</p>
							</div>
						</div>
					</div>				
					<div class="row">
						<div class="active-review-carusel">
							<div class="single-review item">
								<div class="title justify-content-start d-flex">
									<h4>Fannie Rowe</h4>
										<p class="ml-3">Parent</p>
								</div>
								<p>
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
								</p>
							</div>
							<div class="single-review item">
								<div class="title justify-content-start d-flex">
									<h4>Hulda Sutton</h4>
										<p class="ml-3">Parent</p>
								</div>
								<p>
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
								</p>
							</div>
							<div class="single-review item">
								<div class="title justify-content-start d-flex">
									<h4>Fannie Rowe</h4>
										<p class="ml-3">Parent</p>
								</div>
								<p>
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
								</p>
							</div>
							<div class="single-review item">
								<div class="title justify-content-start d-flex">
									<h4>Hulda Sutton</h4>
										<p class="ml-3">Parent</p>
								</div>
								<p>
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
								</p>
							</div>	
							<div class="single-review item">
								<div class="title justify-content-start d-flex">
									<h4>Fannie Rowe</h4>
										<p class="ml-3">Parent</p>
								</div>
								<p>
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
								</p>
							</div>
							<div class="single-review item">
								<div class="title justify-content-start d-flex">
									<h4>Hulda Sutton</h4>
										<p class="ml-3">Parent</p>
								</div>
								<p>
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
								</p>
							</div>
							<div class="single-review item">
								<img src="/frontend/img/r1.png" alt="">
								<div class="title justify-content-start d-flex">
									<h4>Fannie Rowe</h4>
										<p class="ml-3">Parent</p>
								</div>
								<p>
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
								</p>
							</div>
							<div class="single-review item">
								<div class="title justify-content-start d-flex">
									<h4>Hulda Sutton</h4>
										<p class="ml-3">Parent</p>
								</div>
								<p>
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
								</p>
							</div>																												
						</div>
					</div>
				</div>	
			</section> -->
			<!-- End review Area -->

			<section class="contact-page-area section-gap">
				<div class="container">
					<div class="menu-content pb-70">
							<div class="title text-center">
								<h1 class="mb-10">Contact Us</h1>
								<p>Send us a message</p>
							</div>
						</div>
					<div class="row">
						<div class="col-lg-4 d-flex flex-column address-wrap">
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-home"></span>
								</div>
								<div class="contact-details">
									<h5>Binghamton, New York</h5>
									<p>
										4343 Hinkle Deegan Lake Road
									</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-phone-handset"></span>
								</div>
								<div class="contact-details">
									<h5>00 (958) 9865 562</h5>
									<p>Mon to Fri 9am to 6 pm</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-envelope"></span>
								</div>
								<div class="contact-details">
									<h5>support@colorlib.com</h5>
									<p>Send us your query anytime!</p>
								</div>
							</div>														
						</div>
						<div class="col-lg-8">
							<form class="form-area contact-form text-right" id="myForm" action="mail.php" method="post">
								<div class="row">	
									<div class="col-lg-6 form-group">
										<input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" 
											onblur="this.placeholder = 'Enter your name'" 
											class="common-input mb-2 form-control" required="" 
											v-model="form.name" type="text">
										<p class="text-danger text-sm mb-2" v-if="errors.name">
											{{ errors.name[0] }}
										</p>
										<input name="email" placeholder="Enter email address" 
											pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" 
											onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" 
											class="common-input mb-2 form-control" required="" 
											v-model="form.email" type="email">
										<p class="text-danger text-sm mb-2" v-if="errors.email">
											{{ errors.email[0] }}
										</p>
										<input name="subject" placeholder="Enter subject" onfocus="this.placeholder = ''" 
											onblur="this.placeholder = 'Enter subject'" class="common-input mb-2 form-control" 
											required="" v-model="form.subject" type="text">
										<p class="text-danger text-sm mb-2" v-if="errors.subject">
											{{ errors.subject[0] }}
										</p>
									</div>
									<div class="col-lg-6 form-group">
										<textarea class="common-textarea form-control" name="message" 
											placeholder="Enter Messege" onfocus="this.placeholder = ''" 
											onblur="this.placeholder = 'Enter Messege'" required=""
											v-model="form.message" ></textarea>			
										<p class="text-danger text-sm" v-if="errors.message">
											{{ errors.message[0] }}
										</p>
									</div>
									<div class="col-lg-12">
										<div class="alert-msg" style="text-align: left;"></div>
										<el-button type="success" :loading="loading" size="mini" 
											@click.prevent="sendMessage()">{{ loading ? 'Sending message.....' : 'Send message' }}
										</el-button>
										<!-- <button class="genric-btn primary" style="float: right;"
										@click.prevent="sendMessage">Send Message</button>											 -->
									</div>
								</div>
							</form>	
						</div>
					</div>
				</div>	
			</section>
			
    </div>
</template>

<script>

export default {
    name: 'Home',
    data(){
        return {
			loading: false,
            abouts: [],
            abouthistories: [],
			events: [],
			faqs: [],
			carousels: [],
			grades: [],
			chooses: [],
			form:{
				grade_id: '',
				parent_name: '',
				parent_phone: '',
				parent_email: '',
				student_name: '',
				student_age: ''
			},
			contactForm: {
				name: '',
				email: '',
				subject: '',
				message: ''
			},
			errors: {}
        }
    },
    methods: {
        fileLinkOne(name){
        	return '/uploads/img/about/' + name
      	},
		fileLinkEvent(name){
        	return '/uploads/img/event/' + name
      	},
		fileLinkFaq(name){
        	return '/uploads/img/faq/' + name
      	},
		fileLinkCarousel(name){
        	return '/uploads/img/carousel/' + name
      	},
		fileLinkChoose(name){
			return '/uploads/img/choose/' + name
		},
        getUserAbout: async function(){
            axios.get('/get-user-about')
                .then((response) => {
                    this.abouts = response.data.abouts
                })
        },
		getUserCarousel: async function(){
            axios.get('/get-user-carousels')
                .then((response) => {
                    this.carousels = response.data.carousels
                })
		},
		getUserFaqs: async function(){
            axios.get('/get-user-faqs')
                .then((response) => {
                    this.faqs = response.data.faqs
                })
        },
		getUserEvents: async function(){
            axios.get('/get-user-events')
                .then((response) => {
                    this.events = response.data.events
                })
        },
        getAboutHistory: async function(){
            axios.get('/get-about-history')
                .then((response) => {
                    this.abouthistories = response.data.abouthistories
                })
        },
		getUserGrades: async function(){
			axios.get('/get-user-grades')
				.then((response) => {
					this.grades = response.data.grades
				})
		},
		getUserChooses: async function(){
			axios.get('/get-user-chooses')
				.then((response) => {
					this.chooses = response.data.chooses
				})
		},
		applyForAJob: async function(){
			this.$notify({
            	group: 'home',
                type: 'info',
                title: 'No positions for now',
                text: 'Please keep checking for any job posting'
            });
		},
		submitApplication: async function(){
			this.loading = true
			axios.post('/submit-application', this.form)
				.then(() => {
					this.$notify({
						group: 'home',
						type: 'success',
						title: 'Application submited',
						text: "We'll get back to you"
					});
					this.form.grade_id = '',
					this.form.parent_name = '',
					this.form.parent_phone = '',
					this.form.parent_email = '',
					this.form.student_name = '',
					this.form.student_age = '',
					this.loading = false
					this.errors = {}
				})
				.catch(error => {
					if (error.response.status === 422) {
						this.errors = error.response.data.errors
					}
					else if(error.response.status === 500) {
						this.$notify({
							group: 'home',
							type: 'danger',
							title: 'Application failed',
							text: "Please contact support for advice. Thank you"
						});
					}
					else if(error.response.status === 405) {
						this.$notify({
							group: 'home',
							type: 'danger',
							title: 'Application failed',
							text: "Please contact  support for advice. Thank you"
						});
					}
					this.loading = false
				})
		},
		sendMessage: async function(){
			this.loading = true
			axios.post('/send-message', this.form)
				.then(() => {
					this.form.name = '',
					this.form.email = '',
					this.form.subject = '',
					this.form.message = '',
					this.errors = '',
					this.loading = false,
					this.$notify({
                        group: 'contactus',
                        type: 'success',
                        text: 'Message Sent. We will get back to you'
                    });
				})
				.catch((error) => {
					if (error.response.status === 422) {
						this.errors = error.response.data.errors
					}
					else if (error.response.status === 500) {
						this.$notify({
							group: 'contactus',
							type: 'error',
							text: 'Error occured please wait while we take a look'
                    	});
					}
					else if(error.response.status === 405) {
						this.$notify({
							group: 'contactus',
							type: 'error',
							text: 'Error occured please wait while we take a look'
                    	});
					}
					this.loading = false
				})
		}
    },
    computed:{},
    created(){
        this.getUserAbout()
        this.getAboutHistory()
		this.getUserEvents()
		this.getUserFaqs()
		this.getUserCarousel()
		this.getUserGrades()
		this.getUserChooses()
    }
}
</script>