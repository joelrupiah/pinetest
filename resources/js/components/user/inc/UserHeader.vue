<template>
    <div id="user_header">
		  <header id="header">
	  		<div class="header-top">
	  			<div class="container">
			  		<div class="row">
			  			<div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
			  				<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-behance"></i></a></li>
			  				</ul>			
			  			</div>
			  			<div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
			  				<a href="tel:+254 715 7332 57"><span class="lnr lnr-phone-handset"></span> <span class="text">+254715733257</span></a>
			  				<a href="mailto:info@pinecrestacademy.co.ke"><span class="lnr lnr-envelope"></span> <span class="text">
								info@pinecrestacademy.co.ke</span></a>			
			  			</div>
			  		</div>			  					
	  			</div>
			</div>
		    <div class="container main-menu">
		    	<div class="row align-items-center justify-content-between d-flex">
			      <div id="logo">
			        <!-- <a href="index.html"><img src="/frontend/img/logo.png" alt="Pinecrest Logo" title="" /></a> -->
			        <a href="index.html"><img src="" alt="Pinecrest Logo" title="" /></a>
			      </div>
			      <nav id="nav-menu-container">
			        <ul class="nav-menu">
			          <li><a href="/api">Home</a></li>
			          <li><a href="/api/about-us">About</a></li>
			          <li><a href="/api/gallery">Gallery</a></li>
			          <li><a href="/api/events">Events</a></li>
			          <li><a href="/api/careers">Careers</a></li>
			          <li><a href="/api/faqs">Faqs</a></li>
			          <li><a href="/api/contact-us">Contact</a></li>
			        </ul>
			      </nav><!-- #nav-menu-container -->		    		
		    	</div>
		    </div>
		  </header><!-- #header -->
    </div>
</template>

<script>
export default {
    name: 'UserHeader'
}
</script>