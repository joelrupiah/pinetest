<template>
  <div id="user_header">
    <!-- Start Top Bar style2 -->
    <section class="top-bar-style2">
      <div class="top-style2 clearfix">
        <div class="top-style2-left">
          <!-- <p style="color:royalblue"><span class="icon-music"></span>Contact Us</p> -->
          <!-- <p style="color:gold">Reach Us On</p> -->
          <ul>
            <li>
              <p style="color:gold">Reach Us On</p>
            </li>
            <li>
              <span class="fa fa-phone mr-1" style="color:royalblue"></span>
              <a href="tel:+254 794 6697 92" class="text-white">+254 794 6697 92</a>
            </li>
            <li>
              <span class="fa fa-envelope mr-1" style="color:royalblue"></span>
              <a href="mailto:info@pinecrest-academy.com" class="text-white">info@pinecrest-academy.com</a>
            </li>
            <li class="text-white">Mon - Fri: 8am to 4.30pm</li>
          </ul>
        </div>
        <div class="top-style2-right">
          <ul class="topbar-social-links">
            <li>
              <a href="https://www.facebook.com/pinecrestjujasouth/?ref=page_internal" target="_blank">
                <i class="fa fa-facebook" aria-hidden="true" style="color:#4267B2"></i>
              </a>
            </li>
            <li>
              <a href="https://www.youtube.com/@pinecrestacademy3555" target="_blank">
                <i class="fa fa-youtube" aria-hidden="true" style="color:#FF0000"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </section>
    <!-- End Top Bar style2 -->
  </div>
</template>

<script>
export default {
  name: "UserHeader",
  data() {
    return {
      sitesettings: [],
    };
  },
  methods: {
    getSiteSettings: async function () {
      axios.get("/get-site-settings").then((response) => {
        this.sitesettings = response.data.sitesettings;
      });
    },
  },
  computed: {},
  created() {
    this.getSiteSettings();
  },
};
</script>