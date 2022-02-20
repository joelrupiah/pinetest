<template>
    <div id="about_history">
        <!--Start breadcrumb area-->
        <section class="breadcrumb-area style2" style="background-image: url(/frontend/images/resources/breadcrumb-bg-2.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="inner-content-box clearfix">
                            <div class="title-s2 text-center">
                                <span>Pinecrest Academy</span>
                                <h1>History</h1>
                            </div>
                            <div class="breadcrumb-menu float-left">
                                <ul class="clearfix">
                                    <li><a href="/api">Home</a></li>
                                    <li class="active">History</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End breadcrumb area-->

        <!--Start Company Overview Area-->
        <section class="company-overview-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="intro-box clearfix">
                            <div class="sec-title">
                                <p>Company Overview</p>
                                <div class="title">Modern & Luxury<br> <span>Interior Designers in USA</span></div>
                            </div>
                            <div class="text">
                                <p>We feel that interior design is one of the most important investments you will ever make. Whether your needs are Residential or Commercial Interior Design or Model Home Merchandising, our commitment to your project.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="history-content-box clearfix">
                            <div class="history-carousel owl-carousel owl-theme">
                                <!--Start Single History Content-->
                                <div class="single-history-content">
                                    <div class="img-box">
                                        <div class="inner">
                                            <img src="/frontend/images/resources/history-1.jpg" alt="Awesome Image">
                                        </div>
                                    </div>
                                    <div class="text-box">
                                        <div class="inner">
                                            <div class="date">
                                                <h3>1983</h3>
                                            </div>
                                            <div class="title">
                                                <h3>Crystalo Was Founded by<br> Chris Miller in USA.</h3>
                                            </div>
                                            <div class="text">
                                                <p>Indignation and dislike men who are so beguiled and demoralized by the charms pleasure of the moment, so blinded by desire, that they cannot foresee shrinking from toil and pain.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End Single History Content-->
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!--End Company Overview Area-->

    </div>
</template>

<script>
export default {
    name: 'AboutHistory',
    data(){
        return {
            abouthistories: []
        }
    },
    methods: {
        fileLink(name){
        	return '/uploads/img/about-history/' + name
      	},
        getAboutHistory(){
            axios.get('/api/get-about-history')
                .then((response) => {
                    this.abouthistories = response.data.abouthistories
                })
        }
    },
    computed: {},
    mounted(){
        this.getAboutHistory()
    }
}
</script>