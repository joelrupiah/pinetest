<template>
<div id="home">
    <notifications group="application" class="mt-3" />
    <!--Main Slider-->
    <home-slider></home-slider>
    <!--End Main Slider-->

    <!--Start about area-->
    <section class="about-area mt-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5">
                    <div class="about-image-box">
                        <div class="inner-box">
                            <img src="frontend/images/resources/pine-about.jpg" alt="School Image" />
                            <!-- <div class="overlay">
                      <div class="box">
                        <div
                          class="icon wow zoomIn"
                          data-wow-delay="300ms"
                          data-wow-duration="1500ms"
                        >
                          <img
                            src="frontend/images/icon/school-icon.png"
                            alt="School Icon"
                            style="width: 100px; height: 100px"
                          />
                        </div>
                      </div>
                    </div> -->
                        </div>
                        <div class="text-box">
                            <p>
                                Education is not preparation for life; education is life
                                itself.
                            </p>
                            <span style="color: green">John Dewey</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7" v-for="about in abouts" :key="about.id">
                    <div class="about-text">
                        <div class="sec-title">
                            <p class="title" style="color: green" v-html="about.heading"></p>
                        </div>
                        <div class="inner-content">
                            <div class="text">
                                <p v-html="about.description"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End about Area-->

    <!--Start Choice Area-->
    <section class="choose-us-area">
        <div class="sec-title text-center">
            <div class="title text-white">Why choose us</div>
            <p class="bottom-text text-white">
                We are enthusiastic and passionate about young learners, our values
                are dear to us.
            </p>
        </div>
        <div class="parallax-background" style="
              background-image: url(frontend/images/parallax-background/contact-details-bg.html);
            "></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="contact-details-content" style="background:transparent">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <vs-row vs-justify="center">
                                    <vs-col type="flex" vs-justify="center" vs-align="center">
                                        <vs-card actionable class="cardx">
                                            <div slot="media">
                                                <img src="/frontend/images/resources/choose-image-one.jpg">
                                            </div>
                                            <div>
                                                <p style="font-size:20px;font-weight:bold;color:royalblue;padding-bottom:1px;border-bottom:2px solid royalblue;width:50%;text-decoration:none">
                                                    Montessori ( 2 yrs to 4 yrs )
                                                </p>
                                                <span style="font-size:15px">
                                                    Montessori education is based on self directed activity, hands
                                                    on learning and collaborative play.
                                                    The children in a Montessori class make creative choices in
                                                    their learning while the highly trained
                                                    teachers offer appropriate activities to guide the process.
                                                    Children work in groups and individually to discover and explore
                                                    knowledge of the world and to develop their maximum potential.
                                                    Every material in a Montessori classroom supports an aspect of a
                                                    child development, creating a match between a child's natutal
                                                    interest and the available activities.
                                                    Children can learn through their own experiences and at their
                                                    own pace.
                                                    They can respond at any moment the natutal curiosities that
                                                    exist in all humans and build a solid foundation for life long
                                                    learning.
                                                </span>
                                            </div>
                                        </vs-card>
                                    </vs-col>
                                </vs-row>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <vs-row vs-justify="center">
                                    <vs-col type="flex" vs-justify="center" vs-align="center">
                                        <vs-card actionable class="cardx">
                                            <div slot="media">
                                                <img src="/frontend/images/resources/choose-image-one.jpg">
                                            </div>
                                            <div>
                                                <p style="font-size:20px;font-weight:bold;color:royalblue;padding-bottom:1px;border-bottom:2px solid royalblue;width:50%;text-decoration:none">
                                                    CBC ( PP2 to Grade 6 )</p>
                                                <span style="font-size:15px">
                                                    CBC focuses on the knowledge, skills and abilities of learners,
                                                    which allow for self-paced progress.
                                                    It provides learners with the support they need to succeed.
                                                    It also provides more specialized learning that allow one to
                                                    progress as the learners demonstrate mastery of the subject
                                                    matters.
                                                    It relies on the teachers for the development, articulation and
                                                    assessment of specific knowledge,
                                                    skills and abilities of which learners must demonstrate mastery.
                                                    In Competency Based Curriculum,
                                                    learners are assissted by their teachers to bring out their
                                                    various competencies.
                                                    In CBC, learners are not taught by their teachers in the
                                                    traditional sense, but are guided to self discovery.
                                                </span>
                                            </div>
                                        </vs-card>
                                    </vs-col>
                                </vs-row>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Choice Area-->

    <!--Start Application Area-->
    <home-application></home-application>
    <!--End Application Area-->

    <!--Start latest events area style2-->
    <!-- EVENTS FROM RESOURCES PATH -->
    <home-events></home-events>
    <!--End latest events area style2-->

    <!--Start Contact details Area-->
    <help-contact></help-contact>
    <!--End Contact details Area-->

    <!--Start home google map area-->
    <section class="home-google-map-area mb-1">
        <div class="container-fluid">
            <!-- <div class="sec-title text-center">
            <div class="title text-muted">Locate Us <span>Locate Us</span></div>
          </div> -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="google-map-box">
                        <div class="map-wrap" style="width: 100%; height: 680px" id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End home google map area-->

    <!--Start Gallery Area-->
    <section class="instagram-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <div class="instagram-title">
                        <div class="pattern-bg wow slideInLeft" data-wow-delay="100ms" data-wow-duration="1500ms">
                        </div>
                        <h3>School Activities.</h3>
                        <a class="btn-two" href="/gallery">View Gallery<span class="flaticon-next"></span></a>
                    </div>
                </div>
                <div class="col-xl-8">
                    <ul class="instagram-items clearfix">
                        <li v-for="gallery in allgalleries" :key="gallery.id">
                            <div class="img-holder">
                                <img :src="fileLink(gallery.image)" alt="Gallery Images" style="width:100%;height:230px;object-fit:cover" />
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--End Gallery Area-->



    <!-- Application Dialog -->

    <!-- End Application Dialog -->

</div>
</template>

<script>
import HomeSlider from '../temp/HomeSlider.vue'
import HomeEvents from '../temp/HomeEvents.vue';
import HelpContact from '../temp/HelpContact.vue';
import HomeApplication from '../temp/HomeApplication.vue';
export default {
    components: {
        HomeSlider,
        HelpContact,
        HomeEvents,
        HomeApplication
    },
    name: "Home",
    data() {
        return {
            abouts: [],
            abouthistories: [],
            carousels: [],
            chooses: [],
            sitesettings: [],
            allgalleries: [],
            contactForm: {
                name: "",
                email: "",
                subject: "",
                message: "",
            },
        };
    },
    methods: {
        fileLink(name) {
            return '/uploads/img/gallery/' + name
        },
        fileLinkOne(name) {
            return "/uploads/img/about/" + name;
        },
        fileLinkFaq(name) {
            return "/uploads/img/faq/" + name;
        },
        fileLinkCarousel(name) {
            return "/uploads/img/carousel/" + name;
        },
        fileLinkChoose(name) {
            return "/uploads/img/choose/" + name;
        },
        getAllGalleries: async function() {
            axios.get('get-all-galleries')
                .then((response) => {
                    this.allgalleries = response.data.allgalleries
                })
        },
        getUserAbout: async function() {
            axios.get("/get-user-about").then((response) => {
                this.abouts = response.data.abouts;
            });
        },
        getUserCarousel: async function() {
            axios.get("/get-user-carousels").then((response) => {
                this.carousels = response.data.carousels;
            });
        },
        getAboutHistory: async function() {
            axios.get("/get-about-history").then((response) => {
                this.abouthistories = response.data.abouthistories;
            });
        },
        getUserChooses: async function() {
            axios.get("/get-user-chooses").then((response) => {
                this.chooses = response.data.chooses;
            });
        },
        getSiteSettings: async function() {
            axios.get("/get-site-settings").then((response) => {
                this.sitesettings = response.data.sitesettings;
            });
        },
        sendMessage: async function() {
            this.loading = true;
            axios
                .post("/send-message", this.contactForm)
                .then(() => {
                    (this.contactForm.name = ""),
                    (this.contactForm.email = ""),
                    (this.contactForm.subject = ""),
                    (this.contactForm.message = ""),
                    (this.errors = ""),
                    (this.loading = false),
                    this.$notify({
                        group: "contactus",
                        type: "success",
                        text: "Message Sent. We will get back to you",
                    });
                })
                .catch((error) => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors;
                    } else if (error.response.status === 500) {
                        this.$notify({
                            group: "contactus",
                            type: "error",
                            text: "Error occured please wait while we take a look",
                        });
                    } else if (error.response.status === 405) {
                        this.$notify({
                            group: "contactus",
                            type: "error",
                            text: "Error occured please wait while we take a look",
                        });
                    }
                    this.loading = false;
                });
        },
    },
    computed: {},
    created() {
        this.getAllGalleries();
        this.getUserAbout();
        this.getAboutHistory();
        this.getUserCarousel();
        this.getUserChooses();
        this.getSiteSettings();
    },
};
</script>

<style scoped>
.card1 {
    background-color: #023020;
    border-radius: 15px;
    height: auto;
    border: 2px solid #919ba9;
}

.first {
    color: #a4adb8;
}

.text1 {
    color: #fff;
    font-weight: 700;
}

.detail {
    color: #a4adb8;
}
</style>
