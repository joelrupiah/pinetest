<template>
<div id="user_navbar">
    <!--Start Main Header-->
    <header class="main-header header-style2 stricky">
        <div class="inner-container clearfix">
            <div class="logo-box-style2 float-left">
                <a href="/">

                    <img src="frontend/images/resources/changed.png" alt="Pinecrest Logo" style="width: 50px; height: 50px" />
                    <strong class="text-dark font-weight-bolder" style="font-size:20px">
                        <span style="color:black">Pinecrest Academy</span>
                        <!-- <span>Learn Adapt Excel</span>  -->
                        <br />
                    </strong>

                </a>
            </div>
            <div class="main-menu-box float-right">
                <nav class="main-menu style2 clearfix">
                    <div class="navbar-header clearfix">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse clearfix">
                        <ul class="navigation clearfix">
                            <li><a href="/">Home</a></li>
                            <li><a href="/about-us">About</a></li>
                            <li class="dropdown"><a href="#!">Pages</a>
                                <ul>
                                    <li><a href="/activites-and-facilities">Facilities & Activities</a></li>
                                    <li><a href="/enquiry-and-admission">Enquiries and Admission</a></li>
                                </ul>
                            </li>
                            <li><a href="/gallery">Gallery</a></li>
                            <!-- <li><a href="#">Events</a></li> -->
                            <li><a href="/contact-us">Contact</a></li>
                        </ul>
                    </div>
                </nav>
                <div class="mainmenu-right style2">
                    <div class="outer-search-box">
                        <!-- <div class="seach-toggle"><i class="fa fa-search"></i></div>
                        <ul class="search-box">
                            <li>
                                <form method="post" action="#">
                                    <div class="form-group">
                                        <input type="search" name="search" placeholder="Search Here" required>
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                </form>
                            </li>
                        </ul> -->
                    </div>
                    <!-- <div class="cart-box">
              <a href="shoping-cart.html"><span class="icon-bag"><span class="number">0</span></span></a>
            </div> -->
                    <div class="button">
                        <a style="background-color:royalblue;color:gold" class="btn-one" href="#request-admission">Request for
                            admission<span class="flaticon-next"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--End Main Header-->
</div>
</template>

<script>
export default {
    name: "UserNavbar",
    data() {
        return {
            loading: false,
            grades: [],
        };
    },
    methods: {
        getUserGrades: async function() {
            axios.get("/get-user-grades").then((response) => {
                this.grades = response.data.grades;
            });
        },
    },
    created() {
        this.getUserGrades();
    },
};
</script>

<style scoped>
.fa-facebook {
    background: #3b5998;
    color: white;
}
</style>
