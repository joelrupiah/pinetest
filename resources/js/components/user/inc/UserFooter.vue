<template>
    <div id="user_footer">
	<!-- Footer ==== -->
    <footer>
        <div class="footer-top">
			<div class="pt-exebar">
				<div class="container">
					<div class="d-flex align-items-stretch">
						<div class="pt-logo mr-auto">
							<a href="/api"><img src="" alt="PineCrest Logo"/></a>
						</div>
						<div class="pt-social-link">
							<ul class="list-inline m-a0">
								<li><a href="#" class="btn-link"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" class="btn-link"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" class="btn-link"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#" class="btn-link"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
						<div class="pt-btn-join">
							<a href="#" class="btn ">Join Now</a>
						</div>
					</div>
				</div>
			</div>
            <div class="container">
                <div class="row">
					<div class="col-lg-4 col-md-12 col-sm-12 footer-col-4">
                        <div class="widget">
                            <h5 class="footer-title">Sign Up For A Newsletter</h5>
							<p class="text-capitalize m-b20">Weekly Breaking news analysis and cutting edge advices on job searching.</p>
                            <div class="subscribe-form m-b20">
								<form class="subscription-form" action="http://educhamp.themetrades.com/demo/assets/script/mailchamp.php" method="post">
									<div class="ajax-message"></div>
									<div class="input-group">
										<input name="email" required="required"  class="form-control" 
										v-model="form.email" placeholder="Your Email Address" type="email">
										<span class="input-group-btn">
											<button name="submit" value="Submit" type="submit" @click.prevent="subscribe" class="btn">
												<i class="fa fa-arrow-right"></i></button>
										</span> 
										
									</div>
									<span class="text-danger text-sm" v-if="errors.email">
											{{ errors.email[0] }}
										</span>
								</form>
							</div>
                        </div>
                    </div>
					<div class="col-12 col-lg-5 col-md-7 col-sm-12">
						<div class="row">
							<div class="col-4 col-lg-4 col-md-4 col-sm-4">
								<div class="widget footer_widget">
									<h5 class="footer-title">Company</h5>
									<ul>
										<li><a href="/api">Home</a></li>
										<li><a href="/api/about-us">About</a></li>
										<li><a href="/api/about-us/history">History</a></li>
										<li><a href="/api/faqs">FAQs</a></li>
										<li><a href="/api/contact-us">Contact</a></li>
									</ul>
								</div>
							</div>
							<div class="col-4 col-lg-4 col-md-4 col-sm-4">
								<div class="widget footer_widget">
									<h5 class="footer-title">Get In Touch</h5>
									<ul>
										<li><a href="http://educhamp.themetrades.com/admin/index.html">Dashboard</a></li>
										<li><a href="blog-classic-grid.html">Blog</a></li>
										<li><a href="portfolio.html">Portfolio</a></li>
										<li><a href="event.html">Event</a></li>
									</ul>
								</div>
							</div>
							<div class="col-4 col-lg-4 col-md-4 col-sm-4">
								<div class="widget footer_widget">
									<h5 class="footer-title">Courses</h5>
									<ul>
										<li><a href="courses.html">Courses</a></li>
										<li><a href="courses-details.html">Details</a></li>
										<li><a href="membership.html">Membership</a></li>
										<li><a href="profile.html">Profile</a></li>
									</ul>
								</div>
							</div>
						</div>
                    </div>
					<div class="col-12 col-lg-3 col-md-5 col-sm-12 footer-col-4">
                        <div class="widget widget_gallery gallery-grid-4">
                            <h5 class="footer-title">Our Gallery</h5>
                            <ul class="magnific-image">
								<li><a href="/frontend/assets/images/gallery/pic1.jpg" class="magnific-anchor"><img src="/frontend/assets/images/gallery/pic1.jpg" alt=""></a></li>
								<li><a href="/frontend/assets/images/gallery/pic2.jpg" class="magnific-anchor"><img src="/frontend/assets/images/gallery/pic2.jpg" alt=""></a></li>
								<li><a href="/frontend/assets/images/gallery/pic3.jpg" class="magnific-anchor"><img src="/frontend/assets/images/gallery/pic3.jpg" alt=""></a></li>
								<li><a href="/frontend/assets/images/gallery/pic4.jpg" class="magnific-anchor"><img src="/frontend/assets/images/gallery/pic4.jpg" alt=""></a></li>
								<li><a href="/frontend/assets/images/gallery/pic5.jpg" class="magnific-anchor"><img src="/frontend/assets/images/gallery/pic5.jpg" alt=""></a></li>
								<li><a href="/frontend/assets/images/gallery/pic6.jpg" class="magnific-anchor"><img src="/frontend/assets/images/gallery/pic6.jpg" alt=""></a></li>
								<li><a href="/frontend/assets/images/gallery/pic7.jpg" class="magnific-anchor"><img src="/frontend/assets/images/gallery/pic7.jpg" alt=""></a></li>
								<li><a href="/frontend/assets/images/gallery/pic8.jpg" class="magnific-anchor"><img src="/frontend/assets/images/gallery/pic8.jpg" alt=""></a></li>
							</ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center"> <a target="_blank" href="https://www.templateshub.net">Templates Hub</a></div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer END ==== -->
    </div>
</template>

<script>
export default {
    name: 'UserFooter',
	data(){
		return {
			form: {
				email: ''
			},
			errors: {}
		}
	},
	methods: {
		subscribe: async function(){
			axios.post('/api/subscribe-newsletter', this.form)
				.then(() => {})
				.catch((error) => {
					if (error.response.status === 422) {
						this.errors = error.response.data.errors
					}
				})
		}
	},
	computed: {},
	created() {}
}
</script>