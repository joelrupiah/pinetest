<template>
    <div id="user_footer">
			<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4>Quick links</h4>
								<ul>
									<li><a href="#">Jobs</a></li>
									<li><a href="#">Brand Assets</a></li>
									<li><a href="#">Investor Relations</a></li>
									<li><a href="#">Terms of Service</a></li>
								</ul>								
							</div>
						</div>																	
						<div class="col-lg-6  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4>Newsletter</h4>
								<p>Stay update with our latest</p>
								<div class="" id="mc_embed_signup">
									 <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get">
									  <div class="input-group">
									    <input type="text" class="form-control" name="EMAIL" placeholder="Enter Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email Address '" required="">
											
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
Copyright Pinecrest Academy All rights reserved
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
						<div class="col-lg-6 col-sm-12 footer-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-youtube"></i></a>
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