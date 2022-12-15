<template>
<div id="home-events">
    <section class="latest-blog-area style2">
        <div class="container inner-content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="sec-title float-left" style="margin-bottom: -50px;margin-top: -50px">
                        <h4 style="color:royalblue;font-weight:bolder">News & Events</h4>
                    </div>
                    <!-- <div class="more-blog-button float-right">
                            <a class="btn-two" href="#!">More<span class="flaticon-next"></span></a>
                        </div> -->
                </div>
            </div>
            <div class="row" style="background-color:#FAF9F6;border-radius: 10px">

                <!--Start single blog post-->
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                    <div class="single-blog-post wow fadeInLeft" data-wow-delay="400ms" data-wow-duration="1500ms">
                        <div class="img-holder">
                            <img src="/frontend/images/act/transport.jpg" alt="Event Image" style="width:100%;height:230px;object-fit:cover">
                        </div>
                        <div class="text-holder">
                            <div class="post-date">
                                <h3>24 <span>Jan 2023</span></h3>
                            </div>
                            <div class="meta-box">
                                <ul class="meta-info">
                                    <li>In <a href="#">School Grounds</a></li>
                                </ul>
                            </div>
                            <h3 class="blog-title"><a>Opening day</a></h3>
                            <div class="text">
                                <p>
                                    We are opening on the 25th of January 2023. Admissions and inquiries are ongoing.
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
                            <img src="/frontend/images/act/grad.jpg" alt="Event Image" style="width:100%;height:230px;object-fit:cover">
                        </div>
                        <div class="text-holder">
                            <div class="post-date">
                                <h3>22 <span>Nov 2022</span></h3>
                            </div>
                            <div class="meta-box">
                                <ul class="meta-info">
                                    <li>In <a href="#">Graduation Hall</a></li>
                                </ul>
                            </div>
                            <h3 class="blog-title"><a>Graduation Ceremony</a></h3>
                            <div class="text">
                                <p>
                                    The graduation ceremony for our PP2 class will be held on the 22nd of November 2022.
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
                            <img src="/frontend/images/act/karate.jpg" alt="Event Image" style="width:100%;height:230px;object-fit:cover">
                        </div>
                        <div class="text-holder">
                            <div class="post-date">
                                <h3>29 <span>Oct 2022</span></h3>
                            </div>
                            <div class="meta-box">
                                <ul class="meta-info">
                                    <li>In <a href="#">Chania High School</a></li>
                                </ul>
                            </div>
                            <h3 class="blog-title"><a>Karate Competition</a></h3>
                            <div class="text">
                                <p>
                                    Congratulations on the participation in the 8th edition of Budo Children / Cadet and Junior Open Championship.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End single blog post-->

                <!--Start single blog post-->
                <!-- <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12" v-for="(event, index) in events" :key="index">
                        <div class="single-blog-post wow fadeInLeft" data-wow-delay="400ms" data-wow-duration="1500ms">
                            <div class="img-holder">
                                <img :src="fileLinkEvent(event.image)" alt="Event Image"
                                style="width:100%;height:230px;object-fit:cover">
                            </div>
                            <div class="text-holder">
                                <div class="post-date">
                                    <h3>{{ moment(event.start_date).format("DD") }} <span>{{ moment(event.start_date).format("MMM YYYY") }}</span></h3>
                                </div>
                                <div class="meta-box">
                                    <ul class="meta-info">
                                        <li>In <a href="#">{{event.location}}</a></li>
                                    </ul>
                                </div>
                                <h3 class="blog-title"><a>{{event.title}}</a></h3>
                                <div class="text">
                                    <p v-html="event.description"></p>
                                </div>
                            </div>
                        </div>
                    </div> -->
                <!--End single blog post-->

            </div>
        </div>
    </section>
</div>
</template>

<script>
import moment from 'moment'
export default {
    data() {
        return {
            moment: moment,
            events: [],
        }
    },
    methods: {
        fileLinkEvent(name) {
            return "/uploads/img/event/" + name;
        },
        getUserEvents: async function() {
            axios.get("/get-user-events").then((response) => {
                this.events = response.data.events;
            });
        },
    },
    mounted() {
        this.getUserEvents();
    }
}
</script>
