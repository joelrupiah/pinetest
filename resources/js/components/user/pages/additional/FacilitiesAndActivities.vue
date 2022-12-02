<template>
    <div id="facilities-and-activities">
        <!--Start breadcrumb area-->
        <section class="breadcrumb-area style2" style="
        background-image: linear-gradient(rgba(0, 0, 0, 0.9),rgba(0, 0, 0, 0.9)),url(frontend/images/about-page.jpg);
        height: 230px;
        width: 100%;
        object-fit: cover;
      ">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="inner-content-box clearfix">
                            <div class="title-s2 text-center">
                                <span style="color:royalblue">Pinecrest Academy</span>
                                <h1>Facilities and Activities</h1>
                            </div>
                            <div class="breadcrumb-menu float-left" style="margin-top:-50px">
                                <ul class="clearfix">
                                    <li><a href="/">Home</a></li>
                                    <li class="active">Facilities and Activities</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End breadcrumb area-->
        <!--Start latest blog area-->
        <section class="latest-blog-area">
            <div class="container inner-content">
                <div class="sec-title text-center">
                    <div class="title">Activities</div>
                    <p>At Pinecrest Academy ..............................</p>
                </div>
                <div class="row">
                    <!--Start single blog post-->
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                        <div class="single-blog-post wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="img-holder">
                                <img src="/frontend/images/karate.jpg" alt="Karate Image"
                                    style="width: 100%; height: 250px; object-fit: cover">
                            </div>
                            <div class="text-holder">
                                <h3 class="blog-title"><a href="blog-single.html">Karate</a></h3>
                                <div class="text">
                                    <p>
                                        The karate tradition helps to enhance the practitioners with attributes
                                        such as sincerity, kindness, honour and honesty. These attributes, wisdom,
                                        understanding and peaceful strength they promote, are some of karate's
                                        greatest
                                        benefits. Karate practice strengthens the mind, develops composure and
                                        self-confidence
                                        of the practitioners.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single blog post-->
                    <!--Start single blog post-->
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                        <div class="single-blog-post wow fadeInLeft" data-wow-delay="400ms" data-wow-duration="1500ms">
                            <div class="img-holder">
                                <img src="/frontend/images/scouting.jpg" alt="Scouting Image"
                                    style="width: 100%; height: 250px; object-fit: cover">
                            </div>
                            <div class="text-holder">

                                <h3 class="blog-title"><a href="blog-single.html">Scouting</a></h3>
                                <div class="text">
                                    <p>
                                        Scouting helps young people to develop academic skills, build
                                        self-confidence,
                                        and promotes/enhances ethics and leadership skills while developing
                                        character
                                        and good citizenship. A fundamental tenet of the scouting movement is to
                                        mould
                                        a good citizen who respects God, Country, Parents, Scouters, the Community
                                        they live
                                        in and the Society at large
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single blog post-->
                    <!--Start single blog post-->
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                        <div class="single-blog-post wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="img-holder">
                                <img src="/frontend/images/skating.jpg" alt="Skating Image"
                                    style="width: 100%; height: 250px; object-fit: cover">
                            </div>
                            <div class="text-holder">
                                <h3 class="blog-title"><a href="blog-single.html">Skating</a></h3>
                                <div class="text">
                                    <p>
                                        Skating is a sport that is gaining a lot of popularity among young people
                                        especially in schools. It is an excellent sporting activity that exercises
                                        every muscle in the body. It also builds up the legs and abdominal muscles.
                                        Skating
                                        improves balance and coordination while encouraging children to be active
                                        both physically
                                        and mentally. Skating also helps to build self-esteem for the participants..
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single blog post-->
                </div>
            </div>
        </section>
        <!--End latest blog area-->

        <!--Start Forms area-->
        <section class="appointment-area" id="request-admission" style="
        background-image: linear-gradient(rgba(0, 0, 0, 0.9),rgba(0, 0, 0, 0.9)),url(frontend/images/slides/tution-block.jpg);
        width: 100%;
        object-fit: cover;
      ">
            <div class="container" style="margin-top:-80px">
                <div class="sec-title with-text max-width text-center wow fadeInDown" data-wow-delay="100ms"
                    data-wow-duration="1200ms">
                    <div class="title clr-white" style="color: royalblue">Book a Tour</div>
                    <p class="bottom-text text-white">
                        If you are interested in touring our school, please fill in the form below to submit your
                        details.
                    </p>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="appointment-box wow slideInRight" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="title-box">
                                <!-- <h2 class="text-center" style="color: royalblue">Book a tour</h2> -->
                                <!-- <span>Leave your information here and get reply from our expert in 24 hours, don’t hesitate to ask.</span> -->
                            </div>
                            <div class="appointment">
                                <form class="appointment-form">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="single-box">
                                                <small class="text-danger text-sm" v-if="errors.full_name">
                                                    {{ errors.full_name[0] }}
                                                </small>
                                                <el-input placeholder="Full Name (required)" size="mini"
                                                    v-model="enquiryform.full_name">
                                                </el-input>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="single-box">
                                                <small class="text-danger text-sm" v-if="errors.email">
                                                    {{ errors.email[0] }}
                                                </small>
                                                <el-input placeholder="Email (required)" size="mini"
                                                    v-model="enquiryform.email">
                                                </el-input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="single-box">
                                                <small class="text-danger text-sm" v-if="errors.phone_number">
                                                    {{ errors.phone_number[0] }}
                                                </small>
                                                <el-input placeholder="Mobile Number (required)" size="mini"
                                                    v-model="enquiryform.phone_number">
                                                </el-input>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="single-box">
                                                <small class="text-danger text-sm" v-if="errors.date">
                                                    {{ errors.date[0] }}
                                                </small>
                                                <el-input placeholder="Date for the tour (required)" size="mini"
                                                    v-model="enquiryform.date">
                                                </el-input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="single-box">
                                                <small class="text-danger text-sm" v-if="errors.message">
                                                    {{ errors.message[0] }}
                                                </small>
                                                <el-input type="textarea" :autosize="{ minRows: 4, maxRows: 8 }"
                                                    placeholder="Where did you hear about us (required)" size="mini"
                                                    v-model="enquiryform.message">
                                                </el-input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="single-box">
                                                <el-button size="mini"
                                                    style="background-color:royalblue;color:gold;font-weight:bold"
                                                    @click.prevent="sendEnquiry()">
                                                    Send an enquiry
                                                </el-button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Forms area-->

    </div>
</template>

<script>
export default {
    name: 'FacilitiesAndActivities',
    data() {
        return {
            loading: false,
            enquiryform: {
                full_name: '',
                email: '',
                phone_number: '',
                date: '',
                subject: '',
                message: ''
            },
            errors: {},
        }
    },
    methods: {
        sendEnquiry: async function () {
            console.log(this.enquiryform)
        },
    },
}
</script>
