<template>
    <div id="grade_list">
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">Fees Table</h2>
              <p> All the requested fees in school </p>
              <div class="row">
                <!-- Small table -->
                <!-- simple table -->
                <div class="col-md-12 my-4">
                  <div class="card shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <!-- <router-link :to="{name: 'CreateFaq'}">
                                <el-button type="primary" icon="el-icon-plus" size="mini" class="mb-2"> 
                                    Create Faq</el-button>
                            </router-link> -->
                            <p class="card-text d-flex justify-content-end">Search Input.</p>
                        </div>
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Client Email</th>
                            <th>Grades</th>
                            <th>Status</th>
                            <th>Date Asked</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(fee, index) in fees" :key="fee.id">
                            <td><small>{{ index+1 }}</small></td>
                            <td><small>{{ fee.email }}</small></td>
                            <!-- <td><small>{{ fee.grade_id[0] }}</small></td> -->
                            <td>
                                <span class="badge badge-success" v-for="grade in fee.grade_id" :key="grade">{{ grade }}</span>
                                <!-- <small>{{ grade }}</small> -->
                            </td>
                            <td>
                              <small>
                                <span :class="statusColor(fee.status)">
                                  {{ statusName(fee.status) }}
                                </span>
                              </small>
                            </td>
                            <td><small>{{ fee.created_at | time }}</small></td>
                            <td>
                                <small>
                                    <router-link :to="`/admin/edit-fee-request/${fee.id}`">
                                        <i class="fe fe-mail fe-16" style="color:green;cursor:pointer"></i>
                                    </router-link>
                                    <i class="fe fe-trash-2 fe-16" style="color:red;cursor:pointer"></i>
                                </small>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div> <!-- simple table -->
              </div> <!-- end section -->
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
      </main> <!-- main -->
    </div>
</template>

<script>
import Api from '../../../../apis/admin/Api'
export default {
    name: 'FeesList',
    data(){
        return{
            fees: [],
            errors: {}
        }
    },
    methods: {
      statusName: function(status){
          let data = { 0: "New", 1: "Complete", 2: "Rejected" }
          return data[status]
        },
        statusColor: function(status){
          let data = { 0: "badge badge-dark", 1: "badge badge-success", 2: "badge badge-danger" }
          return data[status]
        },
        getAllFees: async function(){
            Api().get('/admin/get-fee-requests')
                .then(response => {
                    this.fees = response.data.feesRequests
                })
        },
    },
    computed: {},
    created(){
        this.getAllFees()
    }
}
</script>