<template>
    <div id="user_gallery">
			<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Gallery				
							</h1>	
							<p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="gallery.html"> Gallery</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
				
			<!-- Start gallery Area -->
			<section class="gallery-area section-gap">
				<div class="container">
					<h1 class="text-center text-muted mb-5" style="margin-top:-80px">School Gallery</h1>
					<div class="row">
						<div class="col-lg-3" v-for="gallery in galleries" :key="gallery.id">
							<a :href="fileLink(gallery.image)" class="img-gal">
								<div class="single-imgs relative">		
									<div class="overlay overlay-bg">
										<p class="text-white text-sm text-center font-weight-bold" v-html="gallery.description">
											</p>
									</div>
									<div class="relative">					
										<img class="img-fluid" :src="fileLink(gallery.image)" alt="">				
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>	
			</section>
			<!-- End gallery Area -->
    </div>
</template>

<script>
export default {
    name: 'UserGallery',
	data(){
		return {
			galleries: [],
			grades: [],
			total: 10,
			pageInfo: null
		}
	},
	methods: {
		fileLink(name){
			return '/uploads/img/gallery/' + name
		},
		getAllGalleries: async function(page = 1){
			// console.log(page)
			axios.get(`get-galleries?page=${page}&total=${this.total}`)
				.then((response) => {
					this.galleries = response.data.galleries.data
					this.pageInfo = response.data.galleries
				})
		},
		getAllGrades: async function(){
			axios.get('get-grades')
				.then((response) => {
					this.grades = response.data.grades
				})
		}
	},
	computed: {},
	created() {
		this.getAllGalleries()
		this.getAllGrades()
	}
}
</script>