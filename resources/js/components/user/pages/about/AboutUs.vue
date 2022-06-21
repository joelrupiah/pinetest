<template>
  <div id="about_us">
    <!--Start breadcrumb area-->
    <section
      class="breadcrumb-area style2"
      style="
        background-image: linear-gradient(rgba(0, 0, 0, 0.9),rgba(0, 0, 0, 0.9)),url(frontend/images/about-page.jpg);
        height: 230px;
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
                <h1>About Us</h1>
              </div>
              <div class="breadcrumb-menu float-left" style="margin-top:-50px">
                <ul class="clearfix">
                  <li><a href="/">Home</a></li>
                  <li class="active">About Us</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End breadcrumb area-->
    <!--Start Motto, Vision, Mission Area-->
    <section class="testimonial-area" style="margin-top:-150px">
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
                  <img
                    src="frontend/images/resources/changed.jpg"
                    alt="Logo Image"
                  />
                </div>
                <div class="text-box">
                  <p>
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
                  <img
                    src="frontend/images/resources/changed.jpg"
                    alt="Logo Image"
                  />
                </div>
                <div class="text-box">
                  <p>
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
                  <img
                    src="frontend/images/resources/changed.jpg"
                    alt="Logo Image"
                  />
                </div>
                <div class="text-box">
                  <p>Learn, Adapt and Excel.</p>
                </div>
              </div>
            </div>
          </div>
          <!--End Single Testimonial Item-->
        </div>
      </div>
    </section>
    <!--End Motto, Vision, Mission Area-->
    <!--Start Video Image Holder Area-->
    <section class="video-image-holder-area mb-5">
      <div class="container-fluid">
        <div class="row">
          <div
            class="col-xl-6 col-lg-6 col-md-6"
            v-for="about in abouts"
            :key="about.id"
          >
            <div class="video-holder-box">
              <div class="img-holder">
                <img
                  :src="fileLinkOne(about.imageOne)"
                  alt="About Image"
                  style="width: 100%; height: 650; object-fit: cover"
                />
                <div class="icon-holder">
                  <div class="icon">
                    <div class="inner text-center">
                      <a
                        class="html5lightbox wow zoomIn"
                        data-wow-delay="300ms"
                        data-wow-duration="1500ms"
                        :href="about.video"
                        target="_blank"
                      >
                        <span class="flaticon-play-button"></span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div
            class="col-xl-6 col-lg-6 col-md-6"
            v-for="abou in abouts"
            :key="abou.id"
          >
            <div class="project-description-content">
              <div class="sec-title">
                <p v-html="abou.heading"></p>
                <div class="title">About Us</div>
              </div>
              <div class="inner-content">
                <p v-html="abou.description"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End Video Image Gallery Area-->
    <!--Start Video Image Holder Area-->
    <section class="video-image-holder-area mb-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-6 col-lg-6 col-md-6" v-for="abo in abouts" :key="abo.id">
            <div class="video-holder-box">
              <div class="img-holder">
                <div class="faq-content-box">
                  <div class="inner-content">
                    <!-- <pre><p v-html="abo.curriculum"></p></pre> -->
                    <p v-html="abo.curriculum"></p><br>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6" v-for="ab in abouts" :key="ab.id">
            <div class="single-project-image-gallery">
              <img
                :src="fileLinkTwo(ab.imageTwo)"
                alt="About Image"
                style="width: 100%; height: 650; object-fit: cover;"
              />
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End Video Image Gallery Area-->
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