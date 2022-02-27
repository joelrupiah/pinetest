<template>
    <div id="user_gallery">
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-dark" style="background-image:url(/frontend/assets/images/banner/banner1.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Gallery</h1>
				 </div>
            </div>
        </div>
		<!-- Breadcrumb row -->
		<div class="breadcrumb-row">
			<div class="container">
				<ul class="list-inline">
					<li><a href="#">Home</a></li>
					<li>Portfolio</li>
				</ul>
			</div>
		</div>
		<!-- Breadcrumb row END -->
        <!-- contact area -->
        <div class="content-block">
			<!-- Portfolio  -->
			<div class="section-area section-sp1 gallery-bx">
				<div class="container">
					<div class="feature-filters clearfix center m-b40">
						<ul class="filters" data-toggle="buttons">
							<li class="btn active" v-for="grade in grades" :key="grade.id">
								<input type="radio">
								<a href="#"><span>{{ grade.name }}</span></a> 
							</li>
						</ul>
					</div>
					<div class="clearfix">
						<ul id="masonry" class="ttr-gallery-listing magnific-image row">
							<li class="action-card col-lg-3 col-md-4 col-sm-6" v-for="gallery in galleries" :key="gallery.id">
								<div class="ttr-box portfolio-bx">
									<div class="ttr-media media-ov2 media-effect">
										<a href="javascript:void(0);">
											<img :src="fileLink(gallery.image)" alt="Photo"> 
										</a>
										<div class="ov-box">
											<div class="overlay-icon align-m"> 
												<a :href="fileLink(gallery.image)" class="magnific-anchor" title="Pinecrest">
													<i class="ti-search"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
        </div>
		<!-- contact area END -->
    </div>
    <!-- Content END-->
    </div>
</template>

<script>
export default {
    name: 'UserGallery',
	data(){
		return {
			galleries: [],
			grades: []
		}
	},
	methods: {
		fileLink(name){
			return '/uploads/img/gallery/' + name
		},
		getAllGalleries: async function(){
			axios.get('get-galleries')
				.then((response) => {
					this.galleries = response.data.galleries
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