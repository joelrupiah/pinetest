<template>
    <div id="home">
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- Main Slider -->
        <div class="rev-slider">
			<div id="rev_slider_486_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="news-gallery36" data-source="gallery" style="margin:0px auto;background-color:#ffffff;padding:0px;margin-top:0px;margin-bottom:0px;">
				<!-- START REVOLUTION SLIDER 5.3.0.2 fullwidth mode -->
				<div id="rev_slider_486_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.3.0.2">
					<ul>	<!-- SLIDE  -->
						<li data-index="rs-100" 
						data-transition="parallaxvertical" 
						data-slotamount="default" 
						data-hideafterloop="0" 
						data-hideslideonmobile="off" 
						data-easein="default" 
						data-easeout="default" 
						data-masterspeed="default" 
						data-thumb="error-404.html" 
						data-rotate="0" 
						data-fstransition="fade" 
						data-fsmasterspeed="1500" 
						data-fsslotamount="7" 
						data-saveperformance="off" 
						data-title="A STUDY ON HAPPINESS" 
						data-param1="" data-param2="" 
						data-param3="" data-param4="" 
						data-param5="" data-param6="" 
						data-param7="" data-param8="" 
						data-param9="" data-param10="" 
						data-description="Science says that Women are generally happier"
						v-for="carousel in carousels" :key="carousel.id" >
							<!-- MAIN IMAGE -->
							<img :src="fileLinkCarousel(carousel.image)" alt="" 
								data-bgposition="center center" 
								data-bgfit="cover" 
								data-bgrepeat="no-repeat" 
								data-bgparallax="10" 
								class="rev-slidebg" 
								data-no-retina />
								
							<!-- LAYER NR. 1 -->
							<div class="tp-caption tp-shape tp-shapewrapper " 
								id="slide-100-layer-1" 
								data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
								data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
								data-width="full"
								data-height="full"
								data-whitespace="nowrap"
								data-type="shape" 
								data-basealign="slide" 
								data-responsive_offset="off" 
								data-responsive="off"
								data-frames='[{"from":"opacity:0;","speed":1,"to":"o:1;","delay":0,"ease":"Power4.easeOut"},{"delay":"wait","speed":1,"to":"opacity:0;","ease":"Power4.easeOut"}]'
								data-textAlign="['left','left','left','left']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"
								style="z-index: 5;background-color:rgba(2, 0, 11, 0.80);border-color:rgba(0, 0, 0, 0);border-width:0px;"> </div>	
							<!-- LAYER NR. 2 -->
							<div class="tp-caption Newspaper-Title   tp-resizeme" 
								id="slide-100-layer-2" 
								data-x="['center','center','center','center']" 
								data-hoffset="['0','0','0','0']" 
								data-y="['top','top','top','top']" 
								data-voffset="['250','250','250','240']" 
								data-fontsize="['50','50','50','30']"
								data-lineheight="['55','55','55','35']"
								data-width="full"
								data-height="none"
								data-whitespace="normal"
								data-type="text" 
								data-responsive_offset="on" 
								data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
								data-textAlign="['center','center','center','center']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[10,10,10,10]"
								data-paddingleft="[0,0,0,0]"
								style="z-index: 6; font-family:rubik; font-weight:700; text-align:center; white-space: normal;">
									{{ carousel.title }}
							</div>

							<!-- LAYER NR. 3 -->
							<div class="tp-caption Newspaper-Subtitle   tp-resizeme" 
								id="slide-100-layer-4" 
								data-x="['center','center','center','center']" 
								data-hoffset="['0','0','0','0']" 
								data-y="['top','top','top','top']" 
								data-voffset="['320','320','320','290']" 
								data-width="['800','800','700','420']"
								data-height="['100','100','100','120']"
								data-whitespace="unset"
								data-type="text" 
								data-responsive_offset="on"
								data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
								data-textAlign="['center','center','center','center']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"
								style="z-index: 7; text-transform:capitalize; white-space: unset; color:#fff; font-family:rubik; font-size:18px; line-height:28px; font-weight:400;"
								v-html="carousel.description" >
									 
							</div>
							<!-- LAYER NR. 4 -->
							<div class="tp-caption Newspaper-Button rev-btn " 
								id="slide-100-layer-5" 
								data-x="['center','center','center','center']" 
								data-hoffset="['90','80','75','90']" 
								data-y="['top','top','top','top']" 
								data-voffset="['400','400','400','420']" 
								data-width="none"
								data-height="none"
								data-whitespace="nowrap"
								data-type="button" 
								data-responsive_offset="on" 
								data-responsive="off"
								data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(0, 0, 0, 1.00);bg:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]'
								data-textAlign="['center','center','center','center']"
								data-paddingtop="[12,12,12,12]"
								data-paddingright="[30,35,35,15]"
								data-paddingbottom="[12,12,12,12]"
								data-paddingleft="[30,35,35,15]"
								style="z-index: 8; white-space: nowrap; outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer; background-color:var(--primary) !important; border:0; border-radius:30px; margin-right:5px;">READ MORE </div>
							<div class="tp-caption Newspaper-Button rev-btn" 
								id="slide-100-layer-6" 
								data-x="['center','center','center','center']" 
								data-hoffset="['-90','-80','-75','-90']" 
								data-y="['top','top','top','top']" 
								data-voffset="['400','400','400','420']" 
								data-width="none"
								data-height="none"
								data-whitespace="nowrap"
								data-type="button" 
								data-responsive_offset="on" 
								data-responsive="off"
								data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(0, 0, 0, 1.00);bg:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]'
								data-textAlign="['center','center','center','center']"
								data-paddingtop="[12,12,12,12]"
								data-paddingright="[30,35,35,15]"
								data-paddingbottom="[12,12,12,12]"
								data-paddingleft="[30,35,35,15]"
								style="z-index: 8; white-space: nowrap; outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer; border-radius:30px;">CONTACT US</div>
						</li>
						<!-- SLIDE  -->
					</ul>
				</div><!-- END REVOLUTION SLIDER -->  
			</div>  
		</div>  
        <!-- Main Slider -->
		<div class="content-block">
            
			<!-- Our Services -->
			<div class="section-area content-inner service-info-bx">
                <div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="service-bx">
								<div class="action-box">
									<img src="/frontend/assets/images/our-services/pic1.jpg" alt="">
								</div>
								<div class="info-bx text-center">
									<div class="feature-box-sm radius bg-white">
										<i class="fa fa-bank text-primary"></i>
									</div>
									<h4><a href="#">Best Industry Leaders</a></h4>
									<a href="#" class="btn radius-xl">View More</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="service-bx">
								<div class="action-box">
									<img src="/frontend/assets/images/our-services/pic2.jpg" alt="">
								</div>
								<div class="info-bx text-center">
									<div class="feature-box-sm radius bg-white">
										<i class="fa fa-book text-primary"></i>
									</div>
									<h4><a href="#">Learn Courses Online</a></h4>
									<a href="#" class="btn radius-xl">View More</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="service-bx m-b0">
								<div class="action-box">
									<img src="/frontend/assets/images/our-services/pic3.jpg" alt="">
								</div>
								<div class="info-bx text-center">
									<div class="feature-box-sm radius bg-white">
										<i class="fa fa-file-text-o text-primary"></i>
									</div>
									<h4><a href="#">Book Library & Store</a></h4>
									<a href="#" class="btn radius-xl">View More</a>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
            <!-- Our Services END -->
			
			<div class="section-area section-sp2">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center heading-bx">
							<h2 class="title-head m-b0">Upcoming <span>Events</span></h2>
							<p class="m-b0">Upcoming Education Events To Feed Brain. </p>
						</div>
					</div>
					<div class="row">
					<div class="upcoming-event-carousel owl-carousel owl-btn-center-lr owl-btn-1 col-12 p-lr0  m-b30">
						<div class="item" v-for="event in events" :key="event.id">
							<div class="event-bx">
								<div class="action-box">
									<img :src="fileLinkEvent(event.image)" alt="">
								</div>
								<div class="info-bx d-flex">
									<div class="event-info">
										<h4 class="event-title"><a :href="$router.resolve({name:'EventDetail', params: {eventSlug: event.slug}}).href">
											{{ event.title }}</a></h4>
										<ul class="media-post">
											<li><a :href="$router.resolve({name:'EventDetail', params: {eventSlug: event.slug}}).href">
												<i class="fa fa-clock-o"></i> {{ event.start_time }} - {{ event.end_time }}</a></li>
											<li><a :href="$router.resolve({name:'EventDetail', params: {eventSlug: event.slug}}).href">
												<i class="fa fa-map-marker"></i> {{ event.location }}</a></li>
										</ul>
										<p v-html="event.description"></p>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
					<div class="text-center">
						<a href="api/events" class="btn">View All Event</a>
					</div>
				</div>
			</div>
			
			<!-- Testimonials -->
			<div class="section-area section-sp2 bg-fix ovbl-dark" style="background-image:url(/frontend/assets/images/background/bg1.jpg);">
                <div class="container">
					<div class="row">
						<div class="col-md-12 text-white heading-bx left">
							<h2 class="title-head text-uppercase">what people <span>say</span></h2>
							<p>It is a long established fact that a reader will be distracted by the readable content of a page</p>
						</div>
					</div>
					<div class="testimonial-carousel owl-carousel owl-btn-1 col-12 p-lr0">
						<div class="item" v-for="faq in faqs" :key="faq.id">
							<div class="testimonial-bx">
								<div class="testimonial-thumb">
									<img :src="fileLinkFaq(faq.image)" alt="">
								</div>
								<div class="testimonial-info">
									<h5 class="name">{{ faq.name }}</h5>
									<p>-Art Director</p>
								</div>
								<div class="testimonial-content">
									<p v-html="faq.message"></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Testimonials END -->
			
			<!-- Recent News -->
			<div class="section-area section-sp2">
                <div class="container">
					<div class="row">
						<div class="col-md-12 heading-bx left">
							<h2 class="title-head">Recent <span>News</span></h2>
							<p>It is a long established fact that a reader will be distracted by the readable content of a page</p>
						</div>
					</div>
					<div class="recent-news-carousel owl-carousel owl-btn-1 col-12 p-lr0">
						<div class="item">
							<div class="recent-news">
								<div class="action-box">
									<img src="/frontend/assets/images/blog/latest-blog/pic1.jpg" alt="">
								</div>
								<div class="info-bx">
									<ul class="media-post">
										<li><a href="#"><i class="fa fa-calendar"></i>Jan 02 2019</a></li>
										<li><a href="#"><i class="fa fa-user"></i>By William</a></li>
									</ul>
									<h5 class="post-title"><a href="blog-details.html">This Story Behind Education Will Haunt You Forever.</a></h5>
									<p>Knowing that, you’ve optimised your pages countless amount of times, written tons.</p>
									<div class="post-extra">
										<a href="#" class="btn-link">READ MORE</a>
										<a href="#" class="comments-bx"><i class="fa fa-comments-o"></i>20 Comment</a>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="recent-news">
								<div class="action-box">
									<img src="/frontend/assets/images/blog/latest-blog/pic2.jpg" alt="">
								</div>
								<div class="info-bx">
									<ul class="media-post">
										<li><a href="#"><i class="fa fa-calendar"></i>Feb 05 2019</a></li>
										<li><a href="#"><i class="fa fa-user"></i>By John</a></li>
									</ul>
									<h5 class="post-title"><a href="blog-details.html">What Will Education Be Like In The Next 50 Years?</a></h5>
									<p>As desperate as you are right now, you have done everything you can on your.</p>
									<div class="post-extra">
										<a href="#" class="btn-link">READ MORE</a>
										<a href="#" class="comments-bx"><i class="fa fa-comments-o"></i>14 Comment</a>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="recent-news">
								<div class="action-box">
									<img src="/frontend/assets/images/blog/latest-blog/pic3.jpg" alt="">
								</div>
								<div class="info-bx">
									<ul class="media-post">
										<li><a href="#"><i class="fa fa-calendar"></i>April 14 2019</a></li>
										<li><a href="#"><i class="fa fa-user"></i>By George</a></li>
									</ul>
									<h5 class="post-title"><a href="blog-details.html">Master The Skills Of Education And Be.</a></h5>
									<p>You will see in the guide all my years of valuable experience together with.</p>
									<div class="post-extra">
										<a href="#" class="btn-link">READ MORE</a>
										<a href="#" class="comments-bx"><i class="fa fa-comments-o"></i>23 Comment</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Recent News End -->
			
        </div>
		<!-- contact area END -->
    </div>
    <!-- Content END-->
    </div>
</template>

<script>

export default {
    name: 'Home',
    data(){
        return {
            abouts: [],
            abouthistories: [],
			events: [],
			faqs: [],
			carousels: []
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
        getUserAbout: async function(){
            axios.get('/api/get-user-about')
                .then((response) => {
                    this.abouts = response.data.abouts
                })
        },
		getUserCarousel: async function(){
            axios.get('/api/get-user-carousels')
                .then((response) => {
                    this.carousels = response.data.carousels
                })
		},
		getUserFaqs: async function(){
            axios.get('/api/get-user-faqs')
                .then((response) => {
                    this.faqs = response.data.faqs
                })
        },
		getUserEvents: async function(){
            axios.get('/api/get-user-events')
                .then((response) => {
                    this.events = response.data.events
                })
        },
        getAboutHistory: async function(){
            axios.get('/api/get-about-history')
                .then((response) => {
                    this.abouthistories = response.data.abouthistories
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
    }
}
</script>