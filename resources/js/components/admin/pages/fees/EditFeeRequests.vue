<template>
    <div id="application_details">
      <main role="main" class="main-content">
        <notifications group="application" class="mt-3" />
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row align-items-center mb-4">
                <div class="col">
                  <h2 class="h5 page-title"><small class="text-muted text-uppercase">Fee Request ID</small><br />#{{ feeRequestData.id }}</h2>
                </div>
              </div> <!-- .row -->
              <div class="row my-4">
                <div class="col-md-12">
                  <div class="card shadow mb-4">
                    <div class="card-header">
                      <strong class="card-title">{{ feeRequestData.email }}.</strong>
                      <span class="float-right">
                        <span :class="statusColor(feeRequestData.status)">
                          <span class="status">
                            {{ statusName(feeRequestData.status) }}
                          </span>
                        </span>
                      </span>
                    </div>
                    <div class="card-body">
                      <dl class="row mb-0">
                        <dt class="col-sm-12 mb-3 text-muted">Grades Fee Requested:</dt>
                        <dd class="col-sm-12 ml-2 mb-3">
                          <span class="badge badge-success" v-for="grade in feeRequestData.grade_id" 
                          :key="grade">{{ grade }}</span>
                        </dd>
                        <dt class="col-sm-12 mb-3 text-muted">Update Status:</dt>
                        <dd class="col-sm-12 ml-2 mb-3">
                          <input class="form-check-input" type="checkbox" value="0" 
                          v-model="form.status" id="newCheck">
                          <label class="form-check-label mr-5" for="newCheck"> New </label>
                          <!-- <input class="form-check-input" type="checkbox" value="1" 
                          v-model="form.status" id="reviewingCheck">
                          <label class="form-check-label mr-5" for="reviewingCheck"> Complete </label> -->
                          <input class="form-check-input" type="checkbox" value="2" 
                          v-model="form.status" id="processingCheck">
                          <label class="form-check-label mr-5" for="processingCheck"> Rejected </label>
                          <el-button type="success" size="mini" :loading="loading" 
                          @click.prevent="updateApplication()">
                          {{ loading ? 'Updating request.....' : 'Update request' }}
                          </el-button>
                        </dd>
                      </dl>
                      <dl class="row mb-0 mt-5">
                        <dt class="col-sm-12 mb-3 text-muted">Send Fees Structure</dt>
                        <dd class="col-sm-12 ml-2 mb-3">
                          <span class="badge badge-success" v-for="grade in feeRequestData.grade_id" 
                          :key="grade">{{ grade }}</span>
                        </dd>
                        <dt class="col-sm-12 mb-3 text-muted">Update Status:</dt>
                        <dd class="col-md-4 ml-2 mb-3">
                          <input class="form-check-input" type="file" @change="loadLittlePinesPdf($event)"/>
                        </dd>
                        <dd class="col-md-4 ml-2 mb-3">
                            <input class="form-check-input" type="file" />
                        </dd>
                        <dd class="col-md-4 ml-2 mb-3 mt-3">
                            <input class="form-check-input" type="file" />
                        </dd>
                        <dd class="col-md-4 ml-2 mb-3 mt-3">
                            <input class="form-check-input" type="file" />
                        </dd>
                        <dd class="col-md-4 ml-2 mb-3 mt-3">
                          <input class="form-check-input" type="file" />
                        </dd>
                        <dd class="col-md-4 ml-2 mb-3 mt-3">
                            <input class="form-check-input" type="file" />
                        </dd>
                        <dd class="col-md-4 ml-2 mb-3 mt-3">
                            <input class="form-check-input" type="file" />
                        </dd>
                        <dd class="col-md-4 ml-2 mb-3 mt-3">
                            <input class="form-check-input" type="file" />
                        </dd>
                        <dd class="col-md-4 ml-2 mb-3 mt-3">
                            <input class="form-check-input" type="file" />
                        </dd>
                        <dd class="col-md-4 ml-2 mb-3 mt-3">
                            <input class="form-check-input" type="file" />
                        </dd>
                        <el-button type="success" class="mt-5" size="mini" :loading="loading" 
                          @click.prevent="sendFeeRequest()">
                          {{ loading ? 'Sending email.....' : 'Send email' }}
                          </el-button>
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
import Api from '../../../../apis/admin/Api'
export default {
    name: 'ApplicationDetails',
    data(){
        return {
            loading: false,
            application:{},
            feeRequestData:{
              id: '',
              email: '',
              grade_id: '',
              status: '',
              littlePinesPdf: ''
              
            },
            // sendRequestData: {
            //     id: '',
            //     email: '',
            //     grade_id: '',
            //     status: '',
            //     littlePinesPdf: ''
            // },
            form: {
              status: []
            }
        }
    },
    methods:{
        loadLittlePinesPdf(e){
            let file = e.target.files[0]
            let reader = new FileReader()
            reader.onload = e => {
                this.feeRequestData.littlePinesPdf = e.target.result
            }
            reader.readAsDataURL(file)
        },
        statusName: function(status){
          let data = { 0: "New", 1: "Complete", 2: "Rejected" }
          return data[status]
        },
        statusColor: function(status){
          let data = { 0: "badge badge-dark", 1: "badge badge-success", 2: "badge badge-danger" }
          return data[status]
        },
        getFeeRequest: async function(){
            Api().get('/admin/get-fee-request/'+this.$route.params.id)
              .then((response) => {
                // this.application = response.data.application
                const _this = this
                this.feeRequestData.id = response.data.fee.id
                this.feeRequestData.email = response.data.fee.email
                this.feeRequestData.grade_id = response.data.fee.grade_id
                this.feeRequestData.status = response.data.fee.status
              })
              .catch((error) => {})
        },
        sendFeeRequest: async function(){
            this.loading = true
            // console.log(this.feeRequestData)
            Api().post('/admin/send-fee-request-email/'+this.$route.params.id, this.feeRequestData)
                .then(() => {
                    this.$notify({
                    group: 'application',
                    type: 'success',
                    title: 'Request complete',
                    text: 'Email sent successfully'
                    });
                    this.loading = false
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        // this.errors = error.response.data.errors
                    }
                    this.loading = false
                })
                .catch(error => {
                    if (error.response.status === 500) {
                        // this.errors = error.response.data.errors
                    }
                    this.loading = false
                })
        },
        // updateApplication: async function(){
        //   this.loading = true
        //   Api().post('/admin/update-application/'+this.$route.params.id, this.form)
        //     .then(() => {
        //         this.getApplication()
        //         this.$notify({
        //           group: 'application',
        //           type: 'success',
        //           title: 'Request complete',
        //           text: 'Application updated successfully'
        //         });
        //         this.loading = false
        //         this.form.status = []
        //     })
        // }
    },
    computed:{},
    created(){
      this.getFeeRequest()
    }
}
</script>