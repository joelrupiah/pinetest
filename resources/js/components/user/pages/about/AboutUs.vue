<template>
    <div id="about_us">
        <!--Start breadcrumb area-->
        <section class="breadcrumb-area style2" style="background-image: url(/frontend/images/resources/breadcrumb-bg-2.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="inner-content-box clearfix">
                            <div class="title-s2 text-center">
                                <span>Pinecrest Academy</span>
                                <h1>About Us</h1>
                            </div>
                            <div class="breadcrumb-menu float-left">
                                <ul class="clearfix">
                                    <li><a href="/api">Home</a></li>
                                    <li class="active">About Us</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End breadcrumb area-->

        <!--Start blog single area-->
        <section id="blog-area" class="blog-single-area mt-5">
            <div class="container">
                <div class="row" v-for="about in abouts" :key="about.id">
                    <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12">
                        <div class="blog-post">
                            
                            <div class="single-blog-post">
                                <div class="main-image-box">
                                    <img 
                                    :src="fileLinkTwo(about.imageTwo)" alt="Awesome Image">
                                </div>
                                <div class="top-text-box">
                                    <p v-html="about.mainDescription">
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!--Start sidebar Wrapper-->
                    <div class="col-xl-3 col-lg-4 col-md-7 col-sm-12">
                        <div class="sidebar-wrapper">
                            <!--Start single sidebar-->
                            <div class="single-sidebar categories-box">
                                <div class="sidebar-title">
                                    <div class="title">Quick Links</div>
                                </div>
                                <ul class="categories clearfix">
                                    <li><a href="/api/about-us/history">Pinecrest History</a></li>
                                </ul>
                            </div>
                            <!--End single sidebar-->
                        </div>
                    </div>
                    <!--End Sidebar Wrapper-->


                </div>
            </div>

        </section>
        <!--End blog single area-->
    </div>
</template>

<script>
export default {
    name: 'AboutUs',
    data(){
        return {
            abouts: []
        }
    },
    methods: {
        fileLinkTwo(name){
        	return '/uploads/img/about/' + name
      	},
        getUserAbout: async function(){
            axios.get('/api/get-user-about')
                .then((response) => {
                    this.abouts = response.data.abouts
                })
        }
    },
    computed: {},
    created(){
        this.getUserAbout()
    }
}
</script>