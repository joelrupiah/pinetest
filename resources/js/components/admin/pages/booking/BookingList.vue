<template>
    <div id="booking-list">
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="h3 mb-0 page-title">Enquiries</h2>
                        <div class="row align-items-center my-4">
                        </div> <!-- .row -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- table -->
                                <table class="table table-borderless table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Date Sent</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(booking, index) in bookings" :key="booking.id">
                                            <td class="text-muted small">{{ index + 1 }}</td>
                                            <th scope="col">{{ booking.name }}</th>
                                            <td class="small">{{ booking.email }}</td>
                                            <td>
                                                <span :class="statusColor(booking.status)">
                                                    <span class="status">{{ statusName(booking.status) }}</span>
                                                </span>
                                            </td>
                                            <td class="text-muted small">{{ booking.created_at | time }}</td>
                                            <td>
                                                <router-link :to="`/admin/booking-details/${booking.id}`">
                                                    <i class="fe fe-eye fe-16" style="color:black;cursor:pointer"></i>
                                                </router-link>
                                            </td>
                                        </tr>

                                    </tbody>
                                    <tbody>
                                        <tr v-if="emptyBooking()">
                                            <td colspan="6">
                                                <p class="text-center text-danger">
                                                    No booking data
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <nav aria-label="Table Paging" class="my-3">
                                    <!-- <ul class="pagination justify-content-end mb-0">
                      <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                      <li class="page-item active"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul> -->
                                </nav>
                            </div> <!-- .col -->
                        </div> <!-- .row -->
                    </div> <!-- .col-12 -->
                </div> <!-- .row -->
            </div> <!-- .container-fluid -->
        </main> <!-- main -->
    </div>
</template>

<script>
import Api from '../../../../apis/admin/Api'
export default {
    name: 'BookingList',
    data() {
        return {
            bookings: [],
        }
    },
    methods: {
        emptyBooking(){
            return (this.bookings.length < 1)
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
        getAllBookings: async function () {
            await Api().get('/admin/get-all-bookings')
                .then((response) => {
                    this.bookings = response.data.bookings
                })
        }
    },
    mounted() {
        this.getAllBookings()
    }
}
</script>
