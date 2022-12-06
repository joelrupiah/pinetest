<template>
<div id="enquiry-and-admission">
    <!--Start breadcrumb area-->
    <section class="breadcrumb-area style2" style="
        background-image: linear-gradient(rgba(0, 0, 0, 0.9),rgba(0, 0, 0, 0.9)),url(frontend/images/about-page.JPG);
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
                <h4 style="color:white;font-size: 30px;">Enquiries and Admissions</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End breadcrumb area-->

    <!--Start Single Service Area-->
    <section class="single-service-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-12 col-sm-12">
                    <div class="single-service-sidebar">
                        <div class="sidebar-contact-box text-center">
                            <div class="inner-content">
                                <div class="">
                                    <span class="fa fa-headphones" style="color:royalblue;font-size: 100px;"></span>
                                </div>
                                <h4 class="text-white">Apply &<br> Start your journey today</h4>
                                <div class="bottom-box">
                                    <h2><a href="tel:+254 794 6697 92" class="text-white">+254 794 6697 92</a></h2>
                                    <span><a href="mailto:info@pinecrest-academy.com" class="text-white">info@pinecrest-academy.com</a></span>
                                </div>
                                <div class="button">
                                    <a class="btn-one wow slideInUp" data-wow-delay="0ms" data-wow-duration="1500ms" href="#send-an-inquiry" style="background-color:royalblue;color:gold">
                                        Send an Enquiry
                                        <span class="flaticon-next"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--Start Single sidebar-->
                        <div class="how-work-box">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="how-works-content">
                                        <h2>Application Process</h2>
                                        <ul>
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-tick"></span>
                                                </div>
                                                <div class="text">
                                                    <span style="color:royalblue">Stage 1</span>
                                                    <h3>Online Application</h3>
                                                    <p>Send an online application through the provided form.</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-tick"></span>
                                                </div>
                                                <div class="text">
                                                    <span style="color:royalblue">Stage 2</span>
                                                    <h3>Application Review</h3>
                                                    <p>The administration will review the application and provide an update.</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-tick" style="color:royalblue"></span>
                                                </div>
                                                <div class="text">
                                                    <span style="color:royalblue">Stage 3</span>
                                                    <h3>Interview Invite</h3>
                                                    <p>After successful consideration, you and the child will be invited to the school
                                                        for further interview and school tour.</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-tick"></span>
                                                </div>
                                                <div class="text">
                                                    <span style="color:royalblue">Stage 4</span>
                                                    <h3>Acceptance and Admission</h3>
                                                    <p>If the interview is successful, you will be sent an admission form which you will
                                                        fill an produce it during the admission day.</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Single sidebar-->
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7 col-md-12 col-sm-12">
                    <div class="single-service-top">
                        <div class="video-holder-box">
                            <div class="img-holder">
                                <img src="frontend/images/about-page.JPG" alt="About Image" style="width: 100%; height: 650; object-fit: cover" />
                                <div class="icon-holder">
                                    <div class="icon">
                                        <div class="inner text-center">
                                            <a class="html5lightbox play-button" href="https://www.youtube.com/watch?v=dNdhCMEv09M">
                                                <span class="flaticon-play-button"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="single-service-image-box">
                                <img src="frontend/images/about-page.jpg" alt="Image" style="height:350px">
                            </div> -->
                        <div class="text">
                            <!-- <p style="font-size: 25px;font-weight: bold;color:lightgreen;padding-bottom:1px;border-bottom:2px solid lightgreen;width:25%;text-decoration:none">
                                Pinecrest Academy
                            </p>
                            <div class="inner">
                                <p>Pinecrest Academy is a private school located within Juja South Estate in Juja. The school aims to set a
                                    standard of educational excellence and is an institution whose ethos and practice is based upon Christian
                                    teachings.
                                    We aim to provide a private school education that will be acknowledged for effective teaching and
                                    encouragement of personal excellence.
                                    We consider it a privilege to share in your child’s educational journey and we look forward to working
                                    together with you to provide an environment that is positive, stimulating and focussed on academic
                                    excellence accompanied with high moral characteristics.</p>
                            </div> -->
                        </div>
                    </div>

                    <div class="additional-information-box">
                        <div class="title">
                            <h2>Frequently Asked Questions</h2>
                        </div>
                        <div class="inner-content">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="additional-info-content-box">
                                        <div class="accordion-box">
                                            <!--Start single accordion box-->
                                            <div class="accordion accordion-block" v-for="(adminfaq, index) in adminfaqs" :key="index">
                                                <div class="accord-btn">
                                                    <h4 v-html="adminfaq.title"></h4>
                                                </div>
                                                <div class="accord-content">
                                                    <p v-html="adminfaq.description"></p>
                                                </div>
                                            </div>
                                            <!--End single accordion box-->
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <!--End Single Service Area-->

    <!--Start Forms area-->
    <section class="appointment-area" id="request-admission" style="
        background-image: linear-gradient(rgba(0, 0, 0, 0.9),rgba(0, 0, 0, 0.9)),url(frontend/images/slides/tution-block.jpg);
        width: 100%;
        object-fit: cover;
        margin-top: -100px
      ">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="appointment-box wow slideInRight" data-wow-delay="300ms" data-wow-duration="1500ms">
                        <div class="title-box">
                            <h2 class="text-center" style="color: royalblue">Send an enquiry</h2>
                            <!-- <span>Leave your information here and get reply from our expert in 24 hours, don’t hesitate to ask.</span> -->
                        </div>
                        <div class="appointment">
                            <form class="appointment-form" style="padding-bottom: 22px;">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="single-box">
                                            <small class="text-danger text-sm" v-if="errors.full_name">
                                                {{ errors.full_name[0] }}
                                            </small>
                                            <el-input placeholder="Full Name (required)" size="mini" v-model="enquiryform.full_name">
                                            </el-input>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="single-box">
                                            <small class="text-danger text-sm" v-if="errors.email">
                                                {{ errors.email[0] }}
                                            </small>
                                            <el-input placeholder="Email (required)" size="mini" v-model="enquiryform.email">
                                            </el-input>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="single-box">
                                            <small class="text-danger text-sm" v-if="errors.message">
                                                {{ errors.message[0] }}
                                            </small>
                                            <el-input type="textarea" :autosize="{ minRows: 6, maxRows: 10}" placeholder="Message (required)" size="mini" v-model="enquiryform.message">
                                            </el-input>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="single-box">
                                            <el-button size="mini" style="background-color:royalblue;color:gold;font-weight:bold" @click.prevent="sendEnquiry()">
                                                Send an enquiry
                                            </el-button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="appointment-box wow slideInRight" data-wow-delay="300ms" data-wow-duration="1500ms">
                        <div class="title-box">
                            <h2 class="text-center" style="color: royalblue">Request for admission</h2>
                            <!-- <span>Leave your information here and get reply from our expert in 24 hours, don’t hesitate to ask.</span> -->
                        </div>
                        <div class="appointment">
                            <form class="appointment-form">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="single-box">
                                            <small class="text-danger text-sm" v-if="errors.parent_name">
                                                {{ errors.parent_name[0] }}
                                            </small>
                                            <el-input placeholder="Parent's Name (required)" size="mini" v-model="form.parent_name">
                                            </el-input>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="single-box">
                                            <small class="text-danger text-sm" v-if="errors.parent_phone">
                                                {{ errors.parent_phone[0] }}
                                            </small>
                                            <el-input placeholder="Parent's Phone (required)" size="mini" v-model="form.parent_phone">
                                            </el-input>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="single-box">
                                            <small class="text-danger text-sm" v-if="errors.parent_email">
                                                {{ errors.parent_email[0] }}
                                            </small>
                                            <el-input placeholder="Parent's Email (optional)" size="mini" v-model="form.parent_email">
                                            </el-input>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="single-box">
                                            <small class="text-danger text-sm" v-if="errors.student_name">
                                                {{ errors.student_name[0] }}
                                            </small>
                                            <el-input placeholder="Student's Name (required)" size="mini" v-model="form.student_name">
                                            </el-input>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="single-box">
                                            <small class="text-danger text-sm" v-if="errors.student_age">
                                                {{ errors.student_age[0] }}
                                            </small>
                                            <el-input placeholder="Student's Age (required)" size="mini" v-model="form.student_age">
                                            </el-input>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="single-box">
                                            <small class="text-danger text-sm" v-if="errors.grade_id">
                                                {{ errors.grade_id[0] }}
                                            </small>
                                            <el-select v-model="form.grade_id" placeholder="Choose Grade (required)" size="mini" style="width: 100%">
                                                <el-option v-for="grade in grades" :value="grade.id" :label="grade.name" :key="grade.id">
                                                    {{ grade.name }}
                                                </el-option>
                                            </el-select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="single-box">
                                            <el-button :loading="loading" size="mini" style="background-color:royalblue;color:gold;font-weight:bold" @click.prevent="submitApplication()">{{
                                                        loading
                                                            ? "Submitting Application....."
                                                            : "Submit Application"
                                                }}
                                            </el-button>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="single-box">
                                            <el-button size="mini" style="background-color:royalblue;color:gold;font-weight:bold" @click="checkStatusDialog = true">
                                                Check Status
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
    </section>
    <!--End Forms area-->

</div>
</template>

<script>
export default {
    name: 'EnquiryAndAdmission',
    data() {
        return {
            show: false,
            checkStatusDialog: false,
            loading: false,
            grades: [],
            adminfaqs: [],
            form: {
                grade_id: "",
                parent_name: "",
                parent_phone: "",
                parent_email: "",
                student_name: "",
                student_age: "",
            },
            enquiryform: {
                full_name: '',
                email: '',
                subject: '',
                message: ''
            },
            statusCheck: {
                code: ''
            },
            statusData: {
                status: ""
            },
            errors: {},
        }
    },
    methods: {
        statusName: function(status) {
            let data = {
                0: "New",
                1: "Reviewing",
                2: "Processing",
                3: "Complete",
                4: "Rejected"
            }
            return data[status]
        },
        statusColor: function(status) {
            let data = {
                0: "badge badge-dark",
                1: "badge badge-warning",
                2: "badge badge-info",
                3: "badge badge-success",
                4: "badge badge-danger"
            }
            return data[status]
        },
        getUserGrades: async function() {
            axios.get("/get-user-grades").then((response) => {
                this.grades = response.data.grades;
            });
        },
        getUserFaqs: async function() {
            axios.get("/get-admin-faqs").then((response) => {
                this.adminfaqs = response.data.adminfaqs;
            });
        },
        getApplicationStatus: async function() {
            axios.post("/track-application", this.statusCheck)
                .then((response) => {
                    this.statusData.status = response.data.trackedApplication.status
                })
        },
        submitApplication: async function() {
            this.loading = true;
            axios
                .post("/submit-application", this.form)
                .then(() => {
                    this.$notify({
                        group: 'application',
                        type: 'success',
                        title: 'Request complete',
                        text: 'Application successful'
                    });
                    (this.form.grade_id = ""),
                    (this.form.parent_name = ""),
                    (this.form.parent_phone = ""),
                    (this.form.parent_email = ""),
                    (this.form.student_name = ""),
                    (this.form.student_age = ""),
                    (this.loading = false);
                    this.errors = {};
                })
                .catch((error) => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors;
                        this.$notify({
                            group: 'application',
                            type: 'danger',
                            title: 'Enter details required',
                            text: 'Please contact support for advice. Thank you'
                        });
                    } else if (error.response.status === 500) {
                        this.$notify({
                            group: 'application',
                            type: 'danger',
                            title: 'Application failed',
                            text: 'Please contact support for advice. Thank you'
                        });
                    } else if (error.response.status === 405) {
                        this.$notify({
                            group: "application",
                            type: "danger",
                            title: "Application failed",
                            text: "Please contact  support for advice. Thank you",
                        });
                    }
                    this.loading = false;
                });
        },
        sendEnquiry: async function() {
            console.log(this.enquiryform)
        },
    },
    created() {
        this.getUserGrades();
    },
    created() {
        this.getUserFaqs();
    },
}
</script>
