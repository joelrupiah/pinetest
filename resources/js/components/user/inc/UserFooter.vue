<template>
  <div id="user_footer">
    <!--Start footer area Style4-->
    <footer class="footer-area style4">
      <div class="container">
        <div class="row">
          <!--Start single footer widget-->
          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
            <div class="single-footer-widget marbtm50-s4">
              <div class="our-info-box">
                <div class="footer-logo text-center">
                  <a href="index-2.html">
                    <img
                      src="frontend/images/resources/changed.png"
                      alt="Pinecrest Logo"
                      width="200"
                      height="200"
                    />
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!--End single footer widget-->
          <!--Start single footer widget-->
          <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
            <div class="single-footer-widget s4">
              <div class="title-style2">
                <h3>Useful Links</h3>
              </div>
              <div class="usefull-links">
                <ul class="float-left">
                  <li><a href="/">Home</a></li>
                  <li><a href="/about-us">About Us</a></li>
                <li><a href="/gallery">Gallery</a></li>
                <!-- <li><a href="/events">Events</a></li> -->
                <li><a href="/contact-us">Contact Us</a></li>
                </ul>
              </div>
            </div>
          </div>
          <!--End single footer widget-->
          <!--Start single footer widget-->
          <div class="col-xl-4 col-lg-3 col-md-12 col-sm-12">
            <div class="single-footer-widget pdtop50-s4">
              <div class="title-style2">
                <h3>Subscribe Us</h3>
              </div>
              <div class="subscribe-box">
                <form class="subscribe-form" action="#">
                  <input type="email" name="email" placeholder="Your Email" v-model="form.email"/>
                  <p class="text-danger text-sm" v-if="errors.email">
										{{ errors.email[0] }}
									</p>
                  <button class="btn-one" type="submit" @click.prevent="subscribe">
                    Subscribe<span class="flaticon-next"></span>
                  </button>
                </form>
                <div class="text">
                  <p>
                    <span>*</span>Subscribe us and get latest news and updates
                  </p>
                </div>
              </div>
            </div>
          </div>
          <!--End single footer widget-->
        </div>
      </div>
    </footer>
    <!--End footer area style4-->

    <!--Start Footer Contact Info Area-->
    <section class="footer-contact-info-area">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <ul class="footer-contact-info clearfix">
              <li>
                <div class="single-footer-contact-info">
                  <div class="inner">
                    <div class="icon">
                      <span class="icon-global"></span>
                    </div>
                    <div class="text">
                      <p>
                        Juja, Kiambu County Kenya<br />
                        Juja South Estate
                      </p>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div class="single-footer-contact-info">
                  <div class="inner">
                    <div class="icon">
                      <span class="icon-support1"></span>
                    </div>
                    <div class="text">
                      <p>
                        <a href="tel:+254 794 6697 92" class="text-muted">
                          +254 794 6697 92</a
                        ><br />
                        <span>Mon - Friday:</span> 8.00am to 4.30pm
                      </p>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div class="single-footer-contact-info">
                  <div class="inner">
                    <div class="icon">
                      <span class="icon-shipping-and-delivery"></span>
                    </div>
                    <div class="text">
                      <p>
                        Send us a message<br />
                        <a
                          href="mailto:info@pinecrestacademy.co.ke"
                          class="text-muted"
                          >info@pinecrestacademy.co.ke</a
                        >
                      </p>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!--End Footer Contact Info Area-->

    <!--Start footer bottom area-->
    <section class="footer-bottom-area style3">
      <div class="container">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="copyright-text text-center">
              <p>
                <a> Copyright Pinecrest Academy 2022. All rights reserved </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End footer bottom area-->
  </div>
</template>

<script>
export default {
  name: "UserFooter",
  data() {
    return {
      loading: false,
      form: {
        email: "",
      },
      errors: {},
    };
  },
  methods: {
    subscribe: async function () {
      axios
        .post("/subscribe-newsletter", this.form)
        .then(() => {})
        .catch((error) => {
          if (error.response.status === 422) {
            this.errors = error.response.data.errors;
          }
        });
    },
  },
  computed: {},
  created() {},
};
</script>