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
              <a href="mailto:info@pinecrest-academy.com" class="text-muted"
                >info@pinecrest-academy.com</a
              >
            </li>
            <li>Mon - Fri: 8am to 4.30pm</li>
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