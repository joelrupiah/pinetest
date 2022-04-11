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
							<p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span>Gallery</p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
				
			<!-- Start gallery Area -->
			<section class="gallery-area section-gap">
				<div class="container">
					<h1 class="text-center text-muted mb-5" style="margin-top:-80px">School Gallery</h1>
					<!-- <h4 class="font-weight-bold" v-for="category in categories" :key="category.id">{{ category.name }}</h4> -->
					
					<div v-if="educationGalleries < 1"></div>

					<div class="mb-5" v-else>
						<h4 class="font-weight-bold text-center mb-3"><u>Education</u></h4>
						<div class="row" v-if="educationGalleries < 1">
							<h1 class="text-center">No data</h1>
						</div>
						<div class="row" v-else>
							<div class="col-lg-3" v-for="educationGallery in educationGalleries" :key="educationGallery.id">
								<div v-if="educationGallery.category.name === 'Education'">
									<a :href="fileLink(educationGallery.image)" target="_blank" class="img-gal">
										<div class="single-imgs relative">		
											<div class="relative">					
												<img class="img-fluid" :src="fileLink(educationGallery.image)" alt="">				
											</div>
										</div>
									</a>
									</div>
							</div>
						</div>
						<Page class="text-center" :total="educationPage.total" size="small" :current="educationPage.current_page" 
								:page-size="parseInt(educationPage.per_page)" v-if="educationPage" @on-change="getEducationCategories" />
					</div>

					<div class="mb-5">
						<h4 class="font-weight-bold text-center mb-3"><u>Sports</u></h4>
						<div class="row">
							<div class="col-lg-3" v-for="sportGallery in sportGalleries" :key="sportGallery.id">
								<div v-if="sportGallery.category.name === 'Sports'">
									<a :href="fileLink(sportGallery.image)" target="_blank" class="img-gal">
										<div class="single-imgs relative">		
											<div class="relative">					
												<img class="img-fluid" :src="fileLink(sportGallery.image)" alt="">				
											</div>
										</div>
									</a>
									</div>
							</div>
						</div>
						<Page class="text-center" :total="sportPage.total" size="small" :current="sportPage.current_page" 
								:page-size="parseInt(sportPage.per_page)" v-if="sportPage" @on-change="getSportCategories" />
					</div>

					<div class="mb-5">
						<h4 class="font-weight-bold text-center">Agriculture</h4>
						<div class="row">
							<div class="col-lg-3" v-for="agricultureGallery in agricultureGalleries" :key="agricultureGallery.id">
								<div v-if="agricultureGallery.category.name === 'Agriculture'">
									<a :href="fileLink(agricultureGallery.image)" target="_blank" class="img-gal">
										<div class="single-imgs relative">		
											<div class="relative">					
												<img class="img-fluid" :src="fileLink(agricultureGallery.image)" alt="">				
											</div>
										</div>
									</a>
									</div>
							</div>
						</div>
						<Page class="text-center" :total="agriculturePage.total" size="small" :current="agriculturePage.current_page" 
								:page-size="parseInt(agriculturePage.per_page)" v-if="agriculturePage" @on-change="getAgricultureCategories" />
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
			categories: [],
			educationGalleries: [],
			sportGalleries: [],
			agricultureGalleries: [],
			total: 8,
			pageInfo: null,
			educationPage: null,
			sportPage: null,
			agriculturePage: null
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
		getEducationCategories: async function(page = 1){
			axios.get(`get-education-gallery?page=${page}&total=${this.total}`)
				.then((response) => {
					this.educationGalleries = response.data.educationGalleries.data
					this.educationPage = response.data.educationGalleries
				})
		},
		getSportCategories: async function(page = 1){
			axios.get(`get-sport-gallery?page=${page}&total=${this.total}`)
				.then((response) => {
					this.sportGalleries = response.data.sportGalleries.data
					this.sportPage = response.data.sportGalleries
				})
		},
		getAgricultureCategories: async function(page = 1){
			axios.get(`get-agriculture-gallery?page=${page}&total=${this.total}`)
				.then((response) => {
					this.agricultureGalleries = response.data.agricultureGalleries.data
					this.agriculturePage = response.data.agricultureGalleries
				})
		},
		getAllCategories: async function(){
			axios.get('get-user-categories')
				.then((response) => {
					this.categories = response.data.categories
				})
		}
	},
	computed: {},
	created() {
		this.getAllGalleries()
		this.getAllCategories()
		this.getSportCategories()
		this.getAgricultureCategories()
		this.getEducationCategories()
	}
}
</script>