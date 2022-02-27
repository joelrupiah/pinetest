<template>
    <div id="user_faq">
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-dark" style="background-image:url(/frontend/assets/images/banner/banner1.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Frequently Asked Questions</h1>
				 </div>
            </div>
        </div>
		<!-- Breadcrumb row -->
		<div class="breadcrumb-row">
			<div class="container">
				<ul class="list-inline">
					<li><a href="#">Home</a></li>
					<li>Faqs 1</li>
				</ul>
			</div>
		</div>
		<!-- Breadcrumb row END -->
        <!-- contact area -->
        <div class="content-block">
            <!-- Your Faq -->
            <div class="section-area section-sp1">
                <div class="container">
					<div class="row">
						<div class="col-lg-8 col-md-12">
							<div class="heading-bx left">
								<h2 class="m-b10 title-head">Asked <span> Questions</span></h2>
							</div>
							<p class="m-b10">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.</p>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.</p>
							<div class="ttr-accordion m-b30 faq-bx" id="accordion1">
								<div class="panel">

									<el-collapse accordion v-for="adminfaq in adminfaqs" :key="adminfaq.id">
										<el-collapse-item name="1">
											<template slot="title">
												<p style="margin-top:50px" v-html="adminfaq.title"></p>
											</template>
											<div v-html="adminfaq.description"></div>
										</el-collapse-item>
									</el-collapse>

								</div>
							</div>
							<p class="m-b10">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.</p>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.</p>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 m-b30">
									<div class="feature-container">
										<div class="feature-md text-white m-b20">
											<a href="#" class="icon-cell"><img src="/frontend/assets/images/icon/icon1.png" alt=""></a> 
										</div>
										<div class="icon-content">
											<h5 class="ttr-tilte">Our Philosophy</h5>
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing.</p>
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 m-b30">
									<div class="feature-container">
										<div class="feature-md text-white m-b20">
											<a href="#" class="icon-cell"><img src="/frontend/assets/images/icon/icon2.png" alt=""></a> 
										</div>
										<div class="icon-content">
											<h5 class="ttr-tilte">Kingster's Principle</h5>
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing.</p>
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 m-b30">
									<div class="feature-container">
										<div class="feature-md text-white m-b20">
											<a href="#" class="icon-cell"><img src="/frontend/assets/images/icon/icon3.png" alt=""></a> 
										</div>
										<div class="icon-content">
											<h5 class="ttr-tilte">Key Of Success</h5>
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing.</p>
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 m-b30">
									<div class="feature-container">
										<div class="feature-md text-white m-b20">
											<a href="#" class="icon-cell"><img src="/frontend/assets/images/icon/icon4.png" alt=""></a> 
										</div>
										<div class="icon-content">
											<h5 class="ttr-tilte">Our Philosophy</h5>
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12">
							<form class="contact-bx dzForm" action="http://educhamp.themetrades.com/demo/script/contact.php">
							<div class="dzFormMsg"></div>
								<div class="heading-bx left">
									<h2 class="title-head">Get In <span>Touch</span></h2>
									<p>It is a long established fact that a reader will be distracted by the readable content of a page</p>
								</div>
								<div class="row placeani">
									<div class="col-lg-6 ">
										<div class="form-group">
											<div class="input-group">
												<label>Your Name</label>
												<input name="dzName" type="text" 
												v-model="form.name" required class="form-control">
												<p class="text-danger text-sm" v-if="errors.name">
													<small>{{ errors.name[0] }}</small>
												</p>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<div class="input-group"> 
												<label>Your Email Address</label>
												<input name="dzEmail" type="email" class="form-control" 
												v-model="form.email" required >
												<p class="text-danger text-sm" v-if="errors.email">
													<small>{{ errors.email[0] }}</small>
												</p>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<div class="input-group">
												<label>Your Phone</label>
												<input name="dzOther[Phone]" type="text" 
												v-model="form.phone" required class="form-control">
												<p class="text-danger text-sm" v-if="errors.phone">
													<small>{{ errors.phone[0] }}</small>
												</p>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<div class="input-group">
												<label>Subject</label>
												<input name="dzOther[Subject]" type="text" required 
												v-model="form.subject" class="form-control">
												<p class="text-danger text-sm" v-if="errors.subject">
													<small>{{ errors.subject[0] }}</small>
												</p>
											</div>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="form-group">
											<div class="input-group">
												<label>Type Message</label>
												<textarea name="dzMessage" rows="4" class="form-control" 
												v-model="form.message" required ></textarea>
												<p class="text-danger text-sm" v-if="errors.message">
													<small>{{ errors.message[0] }}</small>
												</p>
											</div>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="form-group">
											<div class="input-group">
												<div class="g-recaptcha" data-sitekey="6LefsVUUAAAAADBPsLZzsNnETChealv6PYGzv3ZN" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
												<input class="form-control d-none" style="display:none;" data-recaptcha="true" required data-error="Please complete the Captcha">
											</div>
										</div>
									</div>
									<div class="col-lg-12">
										<el-button type="warning" :loading="loading" size="mini" 
                                            @click.prevent="submitQuestion()">{{ loading ? 'Submitting Question.....' : 'Ask a question' }}
                                        </el-button>
										<el-button type="danger" :loading="loading" size="mini" 
                                            @click.prevent="clearData()">{{ loading ? 'Clearing.....' : 'Clear Data' }}
                                        </el-button>
									</div>
								</div>
							</form>
						</div>
					</div>
					
                </div>
            </div>
            <!-- Your Faq End -->
        </div>
		<!-- contact area END -->
    </div>
    <!-- Content END-->
    </div>
</template>

<script>
export default {
    name: 'UserFaq',
	data(){
		return {
			loading: false,
			adminfaqs: [],
			form: {
				name: '',
				email: '',
				phone: '',
				subject: '',
				message: ''
			},
			errors: {}
		}
	},
	methods: {
		clearData(){
			this.form.name = '',
			this.form.email = '',
			this.form.phone = '',
			this.form.subject = '',
			this.form.message = ''
		},
		getAdminFaqs: async function(){
			axios.get('get-admin-faqs')
				.then((response) => {
					this.adminfaqs = response.data.adminfaqs
				})
		},
		submitQuestion: async function(){
			this.loading = true
			axios.post('send-question', this.form)
				.then(() => {
					this.loading = false
				})
				.catch(error => {
					if (error.response.status === 422) {
                        this.errors = error.response.data.errors
						this.loading = false
                    }
				})
		}
	},
	computed: {},
	created() {
		this.getAdminFaqs()
	}
}
</script>