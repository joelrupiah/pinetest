<template>
  <div id="enquiry-list">
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
                    <tr v-for="(enquiry, index) in enquiries" :key="enquiry.id">
                      <td class="text-muted small">{{ index + 1 }}</td>
                      <th scope="col">{{ enquiry.name }}</th>
                      <td class="small">{{ enquiry.email }}</td>
                      <td>
                        <span :class="statusColor(enquiry.status)">
                          <span class="status">{{ statusName(enquiry.status) }}</span>
                        </span>
                      </td>
                      <td class="text-muted small">{{ enquiry.created_at | time }}</td>
                      <td>
                        <router-link :to="`/admin/enquiry-details/${enquiry.id}`">
                          <i class="fe fe-eye fe-16" style="color:black;cursor:pointer"></i>
                        </router-link>
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
  name: 'EnquiryList',
  data() {
    return {
      enquiries: []
    }
  },
  methods: {
    statusName: function (status) {
      let data = { 0: "New", 1: "Complete" }
      return data[status]
    },
    statusColor: function (status) {
      let data = { 0: "badge badge-pill badge-dark", 1: "badge badge-pill bg-success" }
      return data[status]
    },
    getAllEnquiries: async function () {
      Api().get('/admin/get-all-enquiries')
        .then((response) => {
          this.enquiries = response.data.enquiries
        })
    }
  },
  mounted() {
    this.getAllEnquiries()
  }
}
</script>