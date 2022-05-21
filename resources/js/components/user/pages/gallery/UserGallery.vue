<template>
    <div id="user_gallery">
    <!--Start breadcrumb area-->
    <section
      class="breadcrumb-area style2"
      style="
        background-image: linear-gradient(rgba(0, 0, 0, 0.9),rgba(0, 0, 0, 0.9)),url(/frontend/images/about-page.jpg);
        height: 380px;
        width: 100%;
        object-fit: cover;
      "
    >
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="inner-content-box clearfix">
              <div class="title-s2 text-center">
                <span>Pinecrest Academy</span>
                <h1>School Gallery Page</h1>
              </div>
              <div class="breadcrumb-menu float-left">
                <ul class="clearfix">
                  <li><a href="/">Home</a></li>
                  <li class="active">School Gallery</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End breadcrumb area-->
	        <!--Start Main project area style4-->
        <section class="main-project-area style4">
            <div class="container">
                <ul class="project-filter post-filter has-dynamic-filters-counter">
                    <li><span><h5 style="color:green"><u>Education</u></h5></span></li>
                </ul>
            </div>
			<div class="container-fluid main-project-style4">
                <div class="row filter-layout masonary-layout">
                    <!--Start single project item-->
                    <div class="row" v-if="educationGalleries < 5">
						<h5 class="text-center mb-4">No data</h5>
					</div>
                    <!--End single project item-->
                </div>
            </div>
            <div class="container-fluid main-project-style4">
                <div class="row filter-layout masonary-layout">
                    <!--Start single project item-->
                    <div class="col-6 col-md-3 col-lg-3 filter-item contem trad" v-for="educationGallery in educationGalleries" :key="educationGallery.id">
                        <div class="single-project-style7" v-if="educationGallery.category.name === 'Education'">
                            <div class="img-holder">
                                <img :src="fileLink(educationGallery.image)" alt="Educational Image"
								style="width:100%;height:230px;object-fit:cover">
                            </div>
                        </div>
						
                    </div>
					
                    <!--End single project item-->
                </div>
				<Page class="text-center" :total="educationPage.total" size="small" :current="educationPage.current_page" 
								:page-size="parseInt(educationPage.per_page)" v-if="educationPage" @on-change="getEducationCategories" />
            </div>
        </section>
        <!--End Main project area style4-->
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
			socialEventGalleries: [],
			infrastructureGalleries: [],
			total: 8,
			pageInfo: null,
			educationPage: null,
			sportPage: null,
			agriculturePage: null,
			socialEventPage: null,
			infrastructurePage: null,
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
		getSocialEventCategories: async function(page = 1){
			axios.get(`get-socialevents-gallery?page=${page}&total=${this.total}`)
				.then((response) => {
					this.socialEventGalleries = response.data.socialeventsGalleries.data
					this.socialEventPage = response.data.socialeventsGalleries
				})
		},
		getInfrastructureCategories: async function(page = 1){
			axios.get(`get-infrastructure-gallery?page=${page}&total=${this.total}`)
				.then((response) => {
					this.infrastructureGalleries = response.data.infrastructureGalleries.data
					this.infrastructurePage = response.data.infrastructureGalleries
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
		this.getSocialEventCategories()
		this.getInfrastructureCategories()
	}
}
</script>