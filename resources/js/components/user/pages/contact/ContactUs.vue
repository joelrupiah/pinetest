<template>
  <div id="contact_us">
    <notifications group="contactus" class="mt-3" />
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
                <span style="color:royalblue">Pinecrest Academy</span>
                <h1>Contact Us</h1>
              </div>
              <div class="breadcrumb-menu float-left" style="margin-top:-50px">
                <ul class="clearfix">
                  <li><a href="/">Home</a></li>
                  <li class="active">Contact Us</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End breadcrumb area-->

    <!--Start Contact details Area-->
    <section class="contact-details-area mb-5" style="margin-top:-50px">
      <div class="sec-title text-center">
        <p>Contact Details</p>
        <div class="title text-muted">How Can We <span>Help You?</span></div>
      </div>
      <div
        class="parallax-background"
        style="
          background-image: url(frontend/images/parallax-background/contact-details-bg.html);
        "
      ></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="contact-details-content">
              <div class="row">
                <div
                  class="col-xl-6 col-lg-6"
                  v-for="sitesetting in sitesettings"
                  :key="sitesetting.id"
                >
                  <div
                    class="content-info-box"
                    style="
                      background-image: url(frontend/images/parallax-background/contact-info-box-bg.jpg);
                    "
                  >
                    <div class="inner-content">
                      <div class="inner">
                        <div
                          class="single-info-box wow fadeInDown"
                          data-wow-delay="100ms"
                          data-wow-duration="1200ms"
                        >
                          <div class="icon">
                            <span class="fa fa-map-marker"></span>
                          </div>
                          <div class="text">
                            <h3>Visit Our Office</h3>
                            <p>
                              {{ sitesetting.town }}, {{ sitesetting.address }}
                            </p>
                          </div>
                        </div>
                        <div
                          class="single-info-box white-bg wow fadeInUp"
                          data-wow-delay="100ms"
                          data-wow-duration="1200ms"
                        >
                          <div class="icon">
                            <span class="fa fa-phone"></span>
                          </div>
                          <div class="text">
                            <h3>Call us on</h3>
                            <p>
                              {{ sitesetting.phone }}
                            </p>
                            <p>Mon to Fri 8am to 4.30pm</p>
                          </div>
                        </div>
                        <div
                          class="single-info-box wow fadeInUp"
                          data-wow-delay="100ms"
                          data-wow-duration="1200ms"
                          style="background-color: #27282c"
                        >
                          <div class="icon">
                            <span class="fa fa-envelope"></span>
                          </div>
                          <div class="text">
                            <h3>Email us at</h3>
                            <p>
                              {{ sitesetting.email }}
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                  <div class="contact-details-form-box">
                    <div class="title-box">
                      <h2>
                        Send Us a<br />
                        Message
                      </h2>
                    </div>
                    <div class="contact-details-box">
                      <form class="contact-details-form">
                        <div class="row">
                          <div class="col-xl-6">
                            <div class="single-box">
                              <p
                                class="text-danger text-sm mb-2"
                                v-if="errors.name"
                              >
                                {{ errors.name[0] }}
                              </p>
                              <input
                                type="text"
                                name="form_name"
                                value=""
                                placeholder="Enter Your Name"
                                required=""
                                v-model="form.name"
                              />
                            </div>
                          </div>
                          <div class="col-xl-6">
                            <div class="single-box">
                              <p
                                class="text-danger text-sm mb-2"
                                v-if="errors.email"
                              >
                                {{ errors.email[0] }}
                              </p>
                              <input
                                type="email"
                                name="form_email"
                                value=""
                                placeholder="Enter Your Email"
                                required=""
                                v-model="form.email"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xl-12">
                            <div class="single-box">
                              <p
                                class="text-danger text-sm mb-2"
                                v-if="errors.subject"
                              >
                                {{ errors.subject[0] }}
                              </p>
                              <input
                                type="text"
                                name="form_subject"
                                value=""
                                placeholder="Enter Subject"
                                required=""
                                data-width="100%"
                                v-model="form.subject"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xl-12">
                            <div class="single-box">
                              <p
                                class="text-danger text-sm"
                                v-if="errors.message"
                              >
                                {{ errors.message[0] }}
                              </p>
                              <textarea
                                name="form_request"
                                placeholder="Enter Message"
                                required=""
                                v-model="form.message"
                              ></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xl-12">
                            <div class="single-box">
                              <el-button
                                type="success"
                                :loading="loading"
                                style="padding: 5px 30px"
                                @click.prevent="sendMessage()"
                                >{{
                                  loading
                                    ? "Sending message....."
                                    : "Send message"
                                }}
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
          </div>
        </div>
      </div>
    </section>
    <!--End Contact details Area-->

    <!--Start home google map area-->
    <section class="home-google-map-area mt-5 mb-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-12">
            <div class="google-map-box">
              <div
                class="map-wrap"
                style="width: 100%; height: 445px"
                id="map"
              ></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End home google map area-->
  </div>
</template>

<script>
export default {
  name: "ContactUs",
  data() {
    return {
      sitesettings: [],
      loading: false,
      form: {
        name: "",
        email: "",
        subject: "",
        message: "",
      },
      errors: {},
    };
  },
  methods: {
    getSiteSettings: async function () {
      axios.get("/get-site-settings").then((response) => {
        this.sitesettings = response.data.sitesettings;
      });
    },
    sendMessage: async function () {
      this.loading = true;
      axios
        .post("/send-message", this.form)
        .then(() => {
          (this.form.name = ""),
            (this.form.email = ""),
            (this.form.subject = ""),
            (this.form.message = ""),
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
  mounted() {
    this.getSiteSettings();
  },
};
</script>