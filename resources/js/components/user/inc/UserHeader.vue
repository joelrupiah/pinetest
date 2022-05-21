<template>
  <div id="user_header">
    <!-- Start Top Bar style2 -->
    <section class="top-bar-style2">
      <div class="top-style2 clearfix">
        <div class="top-style2-left">
          <p><span class="icon-music"></span>Contact Us</p>
          <ul>
            <li>
              <a href="tel:+254 794 6697 92" class="text-muted"
                >+254 794 6697 92</a
              >
            </li>
            <li>
              <a href="mailto:info@pinecrestacademy.co.ke" class="text-muted"
                >info@pinecrestacademy.co.ke</a
              >
            </li>
            <li>Mon - Fri: 8am to 5pm</li>
          </ul>
        </div>
        <div class="top-style2-right">
          <ul class="topbar-social-links">
            <li>
              <a
                href="https://www.facebook.com/pinecrestjujasouth/?ref=page_internal"
                target="_blank"
              >
                <i class="fa fa-facebook" aria-hidden="true"></i>
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