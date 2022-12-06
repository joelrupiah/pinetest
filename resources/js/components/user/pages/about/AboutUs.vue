<template>
  <div id="about_us">
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
              <div class="title-s2 text-center" style="vertical-align: middle;">
                <span style="color:royalblue;font-size: 25px;">Pinecrest Academy</span>
                <h4 style="color:white;font-size: 30px;">About Us</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End breadcrumb area-->

    <!--Start Video Image Holder Area-->
    <section class="video-image-holder-area mb-5 mt-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-6 col-lg-6 col-md-6" v-for="about in abouts" :key="about.id">
            <div class="video-holder-box">
              <div class="img-holder">
                <img :src="fileLinkOne(about.imageOne)" alt="About Image" 
                style="width: 100%; height: 650px; object-fit: cover" />
                <div class="icon-holder">
                  <div class="icon">
                    <div class="inner text-center">
                      <a class="html5lightbox wow zoomIn" data-wow-delay="300ms" data-wow-duration="1500ms"
                        :href="about.video" target="_blank">
                        <span class="flaticon-play-button"></span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6" v-for="abou in abouts" :key="abou.id">
            <div class="project-description-content">
              <div class="sec-title">
                <p style="font-size: 30px">Pinecrest History</p>
                <!-- <p v-html="abou.heading" style="font-size: 30px"></p> -->
              </div>
              <div class="inner-content">
                <p style="font-size:15px" 
                  v-html="abou.description"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End Video Image Gallery Area-->

    <!--Start Motto, Vision, Mission Area-->
    <section class="testimonial-area" style="margin-top:-200px">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="sec-title float-left">
              <!-- <h1 style="color: green"><u>Core</u></h1> -->
            </div>
          </div>
        </div>
        <div class="row">
          <!--Start Single Testimonial Item-->
          <div class="col-xl-4 col-lg-4">
            <div class="single-testimonial-item text-center">
              <div class="inner-content">
                <div class="client-info">
                  <h3>Vision</h3>
                </div>
                <div class="img-box">
                  <img src="frontend/images/resources/changed.jpg" alt="Logo Image" />
                </div>
                <div class="text-box">
                  <p style="font-size:15px">
                    To create and provide an atmosphere for learners to excel.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <!--End Single Testimonial Item-->
          <!--Start Single Testimonial Item-->
          <div class="col-xl-4 col-lg-4">
            <div class="single-testimonial-item text-center">
              <div class="inner-content">
                <div class="client-info">
                  <h3>Mission</h3>
                </div>
                <div class="img-box">
                  <img src="frontend/images/resources/changed.jpg" alt="Logo Image" />
                </div>
                <div class="text-box">
                  <p style="font-size:15px">
                    To provide every learner with an opportunity to achieve
                    their full potential academically, emotionally, physically
                    and socially within a healthy, safe and enjoyable school
                    environment.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <!--End Single Testimonial Item-->
          <!--Start Single Testimonial Item-->
          <div class="col-xl-4 col-lg-4">
            <div class="single-testimonial-item text-center">
              <div class="inner-content">
                <div class="client-info">
                  <h3>Motto</h3>
                </div>
                <div class="img-box">
                  <img src="frontend/images/resources/changed.jpg" alt="Logo Image" />
                </div>
                <div class="text-box">
                  <p style="font-size:15px">Learn, Adapt and Excel.</p>
                </div>
              </div>
            </div>
          </div>
          <!--End Single Testimonial Item-->
        </div>
      </div>
    </section>
    <!--End Motto, Vision, Mission Area-->

    <!--Start Working Process Area-->
    <section class="working-process-area" style="margin-top:-150px">
      <div class="container">
        <div class="sec-title text-center">
          <div class="title">Why Choose Us</div>
          <p style="font-size:20px">We are enthusiastic and passionate about young learners, our <strong style="color:black;font-size:20px">Values</strong>
            are dear to us.</p>
          <!-- <div class="title">Main Header <span>process</span></div> -->
        </div>
        <div class="row">
          <!--Start Single Working Process-->
          <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms" data-wow-duration="1500ms">
            <div class="single-working-process text-center">
              <div class="top-box"><span>01</span></div>
              <div class="inner">
                <h3>Respect</h3>
                <p style="font-size:15px">We treat everyone with respect and courtesy.</p>
                <div class="icon-holder">
                  <!-- <i class="fa-solid fa-face-saluting"></i> -->
                  <!-- <span class="icon-productive"></span> -->
                </div>
              </div>
            </div>
          </div>
          <!--End Single Working Process-->
          <!--Start Single Working Process-->
          <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
            <div class="single-working-process text-center">
              <div class="top-box"><span>02</span></div>
              <div class="inner">
                <h3>Integrity</h3>
                <p style="font-size:15px">We speak truthfully and act honestly.</p>
                <div class="icon-holder">
                  <!-- <span class="icon-document"></span> -->
                </div>
              </div>
            </div>
          </div>
          <!--End Single Working Process-->
          <!--Start Single Working Process-->
          <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1500ms">
            <div class="single-working-process text-center">
              <div class="top-box"><span>03</span></div>
              <div class="inner">
                <h3>Independence</h3>
                <p style="font-size:15px">We seek to be achievers and self-reliant.</p>
                <div class="icon-holder">
                  <!-- <span class="icon-kitchen"></span> -->
                </div>
              </div>
            </div>
          </div>
          <!--End Single Working Process-->
          <!--Start Single Working Process-->
          <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1500ms">
            <div class="single-working-process text-center">
              <div class="top-box"><span>04</span></div>
              <div class="inner">
                <h3>Creativity</h3>
                <p style="font-size:15px">We aim to be conveyors of new positive ideas.</p>
                <div class="icon-holder">
                  <!-- <span class="icon-kitchen"></span> -->
                </div>
              </div>
            </div>
          </div>
          <!--End Single Working Process-->
          <!--Start Single Working Process-->
          <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1500ms">
            <div class="single-working-process text-center">
              <div class="top-box"><span>05</span></div>
              <div class="inner">
                <h3>Collaboration</h3>
                <p style="font-size:15px">We seek to work with all to achieve excellence.</p>
                <div class="icon-holder">
                  <!-- <span class="icon-kitchen"></span> -->
                </div>
              </div>
            </div>
          </div>
          <!--End Single Working Process-->
          <!--Start Single Working Process-->
          <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1500ms">
            <div class="single-working-process text-center">
              <div class="top-box"><span>06</span></div>
              <div class="inner">
                <h3>Humility</h3>
                <p style="font-size:15px">We treat others as we would like them to treat us.</p>
                <div class="icon-holder">
                  <!-- <span class="icon-kitchen"></span> -->
                </div>
              </div>
            </div>
          </div>
          <!--End Single Working Process-->
        </div>
      </div>
    </section>
    <!--End Working Process Area-->

  </div>
</template>

<script>
export default {
  name: "AboutUs",
  data() {
    return {
      activeNames: ["1"],
      abouts: [],
      adminfaqs: [],
    };
  },
  methods: {
    fileLinkOne(name) {
      return "/uploads/img/about/" + name;
    },
    fileLinkTwo(name) {
      return "/uploads/img/about/" + name;
    },
    getUserAbout: async function () {
      axios.get("/get-user-about").then((response) => {
        this.abouts = response.data.abouts;
      });
    },
    getUserFaqs: async function () {
      axios.get("/get-admin-faqs").then((response) => {
        this.adminfaqs = response.data.adminfaqs;
      });
    },
  },
  computed: {},
  created() {
    this.getUserAbout();
    this.getUserFaqs();
  },
};
</script>