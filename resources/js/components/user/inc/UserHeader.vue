<template>
    <div id="user_header">
		  <header id="header">
	  		<div class="header-top">
	  			<div class="container">
			  		<div class="row">
			  			<div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
			  				<ul>
								<li><a href="https://www.facebook.com/pinecrestjujasouth/?ref=page_internal" target="_blank"><i class="fa fa-facebook"></i></a></li>
			  				</ul>			
			  			</div>
			  			<div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding" v-for="sitesetting in sitesettings" :key="sitesetting.id">
			  				<a href="tel:+254 794 6697 92"><span class="lnr lnr-phone-handset"></span> <span class="text">{{ sitesetting.phone }}</span></a>
			  				<a href="mailto:info@pinecrestacademy.co.ke"><span class="lnr lnr-envelope"></span> <span class="text">
								{{ sitesetting.email }}</span></a>			
			  			</div>
			  		</div>			  					
	  			</div>
			</div>
		    <div class="container main-menu">
		    	<div class="row align-items-center justify-content-between d-flex">
			      <div id="logo">
			        <!-- <a href="index.html"><img src="/frontend/img/logo.png" alt="Pinecrest Logo" title="" /></a> -->
			        <a href="/" class="text-white font-bold"><img src="/frontend/img/logo/changed.png" alt="Pinecrest Logo" title="" 
						style="width:100px;height:100px" /></a>
			      </div>
			      <nav id="nav-menu-container">
			        <ul class="nav-menu">
			          <li><a href="/" style="color:green;font-weight:900">Home</a></li>
			          <li><a href="/about-us" style="color:green;font-weight:900">About</a></li>
			          <li><a href="/gallery" style="color:green;font-weight:900">Gallery</a></li>
			          <li><a href="/events" style="color:green;font-weight:900">Events</a></li>
			          <!-- <li><a href="/careers">Careers</a></li>
			          <li><a href="/faqs">Faqs</a></li> -->
			          <li><a href="/contact-us" style="color:green;font-weight:900">Contact</a></li>
			        </ul>
			      </nav><!-- #nav-menu-container -->		    		
		    	</div>
		    </div>
		  </header><!-- #header -->
    </div>
</template>

<script>
export default {
    name: 'UserHeader',
	data(){
		return {
			sitesettings: []
		}
	},
	methods: {
		getSiteSettings: async function(){
			axios.get('/get-site-settings')
				.then((response) => {
					this.sitesettings = response.data.sitesettings
				})
		},
	},
	computed: {},
	created(){
		this.getSiteSettings()
	}
}
</script>