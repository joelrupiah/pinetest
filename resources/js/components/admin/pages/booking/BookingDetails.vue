<template>
    <div id="booking-details">
        <main role="main" class="main-content">
            <notifications group="application" class="mt-3" />
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="row align-items-center mb-4">
                            <div class="col">
                                <h2 class="h5 page-title"><small class="text-muted text-uppercase">Booking</small><br />
                                </h2>
                            </div>
                        </div> <!-- .row -->
                        <div class="row my-4">
                            <div class="col-md-12">
                                <div class="card shadow mb-4">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                            <strong class="card-title">Booking Content</strong>
                                            <strong class="card-title">Status:
                                                <span :class="statusColor(bookingDetail.status)">
                                                    <span class="status">
                                                        {{ statusName(bookingDetail.status) }}
                                                    </span>
                                                </span>
                                            </strong>
                                        </div>

                                    </div>
                                    <div class="card-body">
                                        <dl class="row align-items-center mb-0">
                                            <dt class="col-sm-2 mb-3 text-muted">Name:</dt>
                                            <dd class="col-sm-4 mb-3">
                                                <strong>{{ bookingDetail.name }}</strong>
                                            </dd>
                                            <dt class="col-sm-2 mb-3 text-muted">Email:</dt>
                                            <dd class="col-sm-4 mb-3">
                                                <strong>{{ bookingDetail.email }}</strong>
                                            </dd>
                                            <dt class="col-sm-2 mb-3 text-muted">Mobile:</dt>
                                            <dd class="col-sm-4 mb-3">
                                                <strong>{{ bookingDetail.phone }}</strong>
                                            </dd>
                                        </dl>
                                        <dl class="row mb-0">
                                            <dt class="col-sm-2 mb-3 text-muted">Children Ages:</dt>
                                            <dd class="col-sm-4 mb-3">{{ bookingDetail.ages }}</dd>
                                            <dt class="col-sm-2 mb-3 text-muted">Date Booked:</dt>
                                            <dd class="col-sm-4 mb-3">{{ bookingDetail.date | time }}</dd>
                                            <dt class="col-sm-2 mb-3 text-muted">Physical Address:</dt>
                                            <dd class="col-sm-4 mb-3">{{ bookingDetail.address }}</dd>

                                            <template v-if="bookingDetail.heard">
                                                <dt class="col-sm-2 mb-3 text-muted">Heard:</dt>
                                                <dd class="col-sm-4 mb-3">{{ heardData(bookingDetail.heard) }}</dd>
                                            </template>

                                            <template v-if="bookingDetail.other">
                                                <dt class="col-sm-2 mb-3 text-muted">Other Heard:</dt>
                                                <dd class="col-sm-4 mb-3">{{ bookingDetail.other }}</dd>
                                            </template>

                                            <dt class="col-sm-2 mb-3 text-muted">Time to address:</dt>
                                            <dd class="col-sm-4 mb-3">
                                                <el-time-select v-model="form.time" :picker-options="{
                                                    start: '08:30',
                                                    step: '00:15',
                                                    end: '18:30'
                                                }" placeholder="Select time">
                                                </el-time-select>
                                            </dd>

                                            <dt class="col-sm-12 mb-3 text-muted">Update Status:</dt>
                                            <dd class="col-sm-12 ml-2 mb-3">
                                                <input class="form-check-input" type="checkbox" value="0"
                                                    v-model="form.status" id="newCheck">
                                                <label class="form-check-label mr-5" for="newCheck"> New </label>
                                                <input class="form-check-input" type="checkbox" value="1"
                                                    v-model="form.status" id="reviewingCheck">
                                                <label class="form-check-label mr-5" for="reviewingCheck"> Reviewing
                                                </label>
                                                <input class="form-check-input" type="checkbox" value="2"
                                                    v-model="form.status" id="comleteCheck">
                                                <label class="form-check-label mr-5" for="comleteCheck"> Complete
                                                </label>
                                                <input class="form-check-input" type="checkbox" value="3"
                                                    v-model="form.status" id="rejectedCheck">
                                                <label class="form-check-label mr-5" for="rejectedCheck"> Rejected
                                                </label>
                                                <el-button type="success" size="mini" :loading="loading"
                                                    @click.prevent="updateBooking()">
                                                    {{ loading ? 'Sending Email.....' : 'Update Booking' }}
                                                </el-button>
                                            </dd>
                                        </dl>
                                    </div> <!-- .card-body -->
                                </div> <!-- .card -->
                            </div> <!-- .col-md -->
                        </div> <!-- .col-md -->
                    </div>
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </main>
    </div>
</template>

<script>
import Api from '../../../../apis/admin/Api';
export default {
    data() {
        return {
            loading: false,
            bookingDetail: {},
            form: {
                time: '',
                status: []
            }
        }
    },
    methods: {
        heardData: function (heard) {
            let data = {
                0: "Facebook", 1: "Youtube", 2: "Twitter",
                3: "Broncures/Fliers", 4: "Word of mouth"
            }
            return data[heard]
        },
        statusName: function (status) {
            let data = { 0: "New", 1: "Reviewing", 2: "Complete", 3: "Rejected" }
            return data[status]
        },
        statusColor: function (status) {
            let data = {
                0: "badge badge-pill badge-dark text-white", 1: "badge badge-pill badge-warning text-white",
                2: "badge badge-pill badge-success text-white", 3: "badge badge-pill badge-danger text-white"
            }
            return data[status]
        },
        getBookingDetail: async function () {
            Api().get('/admin/get-booking-detail/' + this.$route.params.id)
                .then((response) => {
                    this.bookingDetail = response.data.booking
                })
        },
        updateBooking: async function () {
            this.loading = true
            Api().post('/admin/update-booking/' + this.$route.params.id, this.form)
                .then(() => {
                    this.loading = false
                })
        }
    },
    mounted() {
        this.getBookingDetail()
    }
}
</script>