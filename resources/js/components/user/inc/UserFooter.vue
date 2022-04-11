<template>
    <div id="user_footer">
<!-- start footer Area -->		
			<footer class="footer-area section-gap" style="padding:20px">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-12 text-center">
							<div class="single-footer-widget">
								<img src="/frontend/img/logo/changed.png" alt="PPinecrest Logo" width="180" height="180">								
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-12 text-center">
							<div class="single-footer-widget">
								<h4><strong>Quick links</strong></h4>
								<ul>
									<li><a style="color:white" href="/">Home</a></li>
									<li><a style="color:white" href="/about-us">About Us</a></li>
									<li><a style="color:white" href="/events">Events</a></li>
									<li><a style="color:white" href="/contact-us">Contact Us</a></li>
								</ul>								
							</div>
						</div>																		
						<div class="col-lg-4 col-md-6 col-sm-12 text-center">
							<div class="single-footer-widget">
								<h4><strong>Newsletter</strong></h4>
								<p>Stay update with our latest</p>
								<div class="" id="mc_embed_signup">
									 <form>
									  <div class="input-group">
									    <input type="text" class="form-control" name="email" placeholder="Enter Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email Address '" required="">
											
										<div class="input-group-btn">
									      <button class="btn btn-default" type="submit"
										  @click.prevent="subscribe">
									        <span class="lnr lnr-arrow-right"></span>
									      </button>    
									    </div>
									    	<div class="info">
												<p class="text-danger text-sm" v-if="errors.email">
													{{ errors.email[0] }}
												</p>
											</div>  
									  </div>
									</form> 
								</div>
							</div>
						</div>											
					</div>
					<div class="footer-bottom row align-items-center justify-content-between">
						<p class="footer-text m-0 col-lg-6 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
<!-- Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a> -->
							Copyright Pinecrest Academy. All rights reserved
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
						<div class="col-lg-6 col-sm-12 footer-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
						</div>
					</div>						
				</div>
			</footer>	
			<!-- End footer Area -->
    </div>
</template>

<script>
export default {
    name: 'UserFooter',
	data(){
		return {
			loading: false,
			form: {
				email: ''
			},
			errors: {}
		}
	},
	methods: {
		subscribe: async function(){
			axios.post('/subscribe-newsletter', this.form)
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