<template>
    <div id="contact_us">
			<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
          	<notifications group="contactus" class="mt-3" />
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Contact Us				
							</h1>	
							<p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href=""> Contact Us</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->				  

			<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap">
				<div class="container">
					<div class="row">
						<div class="map-wrap" style="width:100%; height: 445px;" id="map"></div>
						<div class="col-lg-4 d-flex flex-column address-wrap" v-for="sitesetting in sitesettings" :key="sitesetting.id">
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-home"></span>
								</div>
								<div class="contact-details">
									<h5>{{ sitesetting.town }}</h5>
									<p>
										{{ sitesetting.address }}
									</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-phone-handset"></span>
								</div>
								<div class="contact-details">
									<h5>{{ sitesetting.phone }}</h5>
									<p>Mon to Fri 8am to 5pm</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-envelope"></span>
								</div>
								<div class="contact-details">
									<h5>{{ sitesetting.email }}</h5>
									<p>Send us a message</p>
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
			<!-- End contact-page Area -->
    </div>
</template>

<script>
export default {
    name: 'ContactUs',
	data(){
		return {
			sitesettings: [],
			loading: false,
			form: {
				name: '',
				email: '',
				subject: '',
				message: ''
			},
			errors: {},
		}
	},
	methods: {
		getSiteSettings: async function(){
			axios.get('/get-site-settings')
				.then((response) => {
					this.sitesettings = response.data.sitesettings
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
	computed: {},
	mounted() {
		this.getSiteSettings()
	}
}
</script>