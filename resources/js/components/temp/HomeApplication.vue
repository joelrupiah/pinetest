<template>
    <div id="home-application">
        <section class="appointment-area" id="request-admission">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="map-content-box">
                            <div class="sec-title">
                                <div class="title mb-2" style="color: royalblue">
                                    Get quality education
                                </div>
                                <!-- <h2 class="text-white mb-2">Curriculum</h2> -->
                                <p class="mb-4" style="color:white;font-size: larger;">
                                    <!-- For Kindergarten, we use the highly effective and
                                    internationally acclaimed Montessori method of teaching before
                                    ushering in the CBC (Competency Based Curriculum) Kenyan
                                    Curriculum. We have highly qualified teachers for both
                                    programmes. -->
                                    <!-- Pinecrest Academy is an institution whose ethos and practise is based upon Christian
                                    teachings.
                                    We seek to provide an environment that is positive, stimulating and focused on
                                    academic excellence accompanied with high moral characteristics and values.
                                    We aim to provide a private school education that enhances the learners competencies
                                    which will enable them compete effectively in today's and tomorrow's ever changing
                                    world. -->
                                    Pinecrest Academy is a private school located within Juja South Estate in Juja.
                                    The school aims to set a standard of educational excellence and is an institution
                                    whose ethos and practice is based upon Christian teachings.
                                </p>
                                <p class="mb-4" style="color:white;font-size: larger;">
                                    We aim to provide a private school education that will be acknowledged for effective
                                    teaching and encouragement or personal excellence.
                                </p>

                                <p style="color:white;font-size: larger;">
                                    We consider it a priviledge to share in your child's educational journey
                                    and we look forward to working together with you to provide an environment 
                                    that is positive, stimulating and focused on academic excellence accompanied
                                    with high moral characteristics.
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="appointment-box wow slideInRight" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="title-box">
                                <h2>Request for admission</h2>
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
                                                <el-input placeholder="Parent's Name (required)" size="mini"
                                                    v-model="form.parent_name">
                                                </el-input>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="single-box">
                                                <small class="text-danger text-sm" v-if="errors.parent_phone">
                                                    {{ errors.parent_phone[0] }}
                                                </small>
                                                <el-input placeholder="Parent's Phone (required)" size="mini"
                                                    v-model="form.parent_phone">
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
                                                <el-input placeholder="Parent's Email (optional)" size="mini"
                                                    v-model="form.parent_email">
                                                </el-input>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="single-box">
                                                <small class="text-danger text-sm" v-if="errors.student_name">
                                                    {{ errors.student_name[0] }}
                                                </small>
                                                <el-input placeholder="Student's Name (required)" size="mini"
                                                    v-model="form.student_name">
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
                                                <el-input placeholder="Student's Age (required)" size="mini"
                                                    v-model="form.student_age">
                                                </el-input>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="single-box">
                                                <small class="text-danger text-sm" v-if="errors.grade_id">
                                                    {{ errors.grade_id[0] }}
                                                </small>
                                                <el-select v-model="form.grade_id" placeholder="Choose Grade (required)"
                                                    size="mini" style="width: 100%">
                                                    <el-option v-for="grade in grades" :value="grade.id"
                                                        :label="grade.name" :key="grade.id">
                                                        {{ grade.name }}
                                                    </el-option>
                                                </el-select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="single-box">
                                                <el-button :loading="loading" size="mini"
                                                    style="background-color:royalblue;color:gold;font-weight:bold"
                                                    @click.prevent="submitApplication()">{{
                                                            loading
                                                                ? "Submitting Application....."
                                                                : "Submit Application"
                                                    }}
                                                </el-button>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="single-box">
                                                <el-button size="mini" style="background-color:royalblue;color:gold;font-weight:bold"
                                                    @click="checkStatusDialog = true">
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
        <!-- Start Status Dialog -->
        <el-dialog title="Check Status" :visible.sync="checkStatusDialog" width="auto" center>
            <span>
                <el-input placeholder="Please input code" v-model="statusCheck.code"></el-input>
            </span>
            <span :class="statusColor(statusData.status)">
                <span class="status">
                    {{ statusName(statusData.status) }}
                </span>
            </span>
            <span slot="footer" class="dialog-footer">
                <el-button size="mini" style="background-color: red; color: white" @click="checkStatusDialog = false">
                    Cancel
                </el-button>
                <el-button size="mini" style="background-color: #023020; color: white"
                    @click.prevent="getApplicationStatus()">
                    Check Status
                </el-button>
            </span>
        </el-dialog>
        <!-- End Status Dialog -->
    </div>
</template>

<script>
export default {
    name: 'HomeApplication',
    data() {
        return {
            show: false,
            checkStatusDialog: false,
            loading: false,
            grades: [],
            form: {
                grade_id: "",
                parent_name: "",
                parent_phone: "",
                parent_email: "",
                student_name: "",
                student_age: "",
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
        statusName: function (status) {
            let data = {
                0: "New",
                1: "Reviewing",
                2: "Processing",
                3: "Complete",
                4: "Rejected"
            }
            return data[status]
        },
        statusColor: function (status) {
            let data = {
                0: "badge badge-dark",
                1: "badge badge-warning",
                2: "badge badge-info",
                3: "badge badge-success",
                4: "badge badge-danger"
            }
            return data[status]
        },
        getUserGrades: async function () {
            axios.get("/get-user-grades").then((response) => {
                this.grades = response.data.grades;
            });
        },
        getApplicationStatus: async function () {
            axios.post("/track-application", this.statusCheck)
                .then((response) => {
                    this.statusData.status = response.data.trackedApplication.status
                })
        },
        submitApplication: async function () {
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
    },
    created() {
        this.getUserGrades();
    },
}
</script>
