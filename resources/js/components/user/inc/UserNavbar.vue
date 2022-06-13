<template>
  <div id="user_navbar">
    <!--Start Main Header-->
    <header class="main-header header-style2 stricky">
      <div class="inner-container clearfix">
        <div class="logo-box-style2 float-left">
          <a href="/">
            <img
              src="frontend/images/resources/changed.png"
              alt="Pinecrest Logo"
              style="width: 50px; height: 50px"
            />
          </a>
        </div>
        <div class="main-menu-box float-right">
          <nav class="main-menu style2 clearfix">
            <div class="navbar-header clearfix">
              <button
                type="button"
                class="navbar-toggle"
                data-toggle="collapse"
                data-target=".navbar-collapse"
              >
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>

            <div class="navbar-collapse collapse clearfix">
              <ul class="navigation clearfix">
                <li><a href="/">Home</a></li>
                <li><a href="/about-us">About</a></li>
                <li><a href="/gallery">Gallery</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="/contact-us">Contact</a></li>
              </ul>
            </div>
          </nav>
          <div class="mainmenu-right style2">
            <div class="outer-search-box">
              <div class="seach-toggle"><i class="fa fa-search"></i></div>
              <ul class="search-box">
                <li>
                  <form method="post" action="#">
                    <div class="form-group">
                      <input
                        type="search"
                        name="search"
                        placeholder="Search Here"
                        required
                      />
                      <button type="submit">
                        <i class="fa fa-search"></i>
                      </button>
                    </div>
                  </form>
                </li>
              </ul>
            </div>
            <div class="button">
              <a class="btn-one" href="#" @click="feeModal = true"
                >Request Fees Structure<span class="flaticon-next"></span
              ></a>
            </div>
          </div>
        </div>
      </div>

<el-dialog
      title="Request for Fees"
      :visible.sync="feeModal"
      width="30%"
      center>
      <span>
        <Form label-position="top">
        <FormItem label="Input Email">
            <Input v-model="fees.email"></Input>
        </FormItem>
        <FormItem label="Select Grade">
            <div class="form-check form-check-inline" v-for="grade in grades" :key="grade.id">
              <input class="form-check-input" type="checkbox" :id="grade.id" :value="grade.name" v-model="fees.checked">
              <label class="form-check-label" :for="grade.id">{{ grade.name }}</label>
            </div>
        </FormItem>
    </Form>
      </span>
      <span slot="footer" class="dialog-footer">
        <el-button @click="feeModal = false" size="mini" style="background-color: red; color: white">
          Cancel
        </el-button>
        <el-button type="primary" @click="requestFees()" 
        size="mini" style="background-color: #023020; color: white"
        :loading="loading"
        >
        {{
          loading
            ? "Sending request....."
            : "Send request"
        }}
        </el-button>
      </span>
    </el-dialog>

    </header>
    <!--End Main Header-->
  </div>
</template>

<script>
export default {
  name: "UserNavbar",
  data(){
    return {
      loading: false,
      feeModal: false,
      grades: [],
      fees: {
        email: '',
        checked: []
      }
    }
  },
  methods: {
    getUserGrades: async function () {
      axios.get("/get-user-grades").then((response) => {
        this.grades = response.data.grades;
      });
    },
    requestFees: async function() {
      axios.post('request-fees', this.fees)
        .then(() =>{})
        .catch(() => {})
    }
  },
  created() {
    this.getUserGrades();
  }
};
</script>