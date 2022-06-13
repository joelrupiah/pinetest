<template>
    <div id="application_details">
      <main role="main" class="main-content">
        <notifications group="application" class="mt-3" />
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row align-items-center mb-4">
                <div class="col">
                  <h2 class="h5 page-title"><small class="text-muted text-uppercase">Application ID</small><br />#{{ applicationData.id }}</h2>
                </div>
              </div> <!-- .row -->
              <div class="row my-4">
                <div class="col-md-12">
                  <div class="card shadow mb-4">
                    <div class="card-header">
                      <strong class="card-title">{{ applicationData.student_name }}.</strong>
                      <span class="float-right">Track Code: {{ applicationData.track_code }}
                        <span :class="statusColor(applicationData.status)">
                          <span class="status">
                            {{ statusName(applicationData.status) }}
                          </span>
                        </span>
                      </span>
                    </div>
                    <div class="card-body">
                      <dl class="row align-items-center mb-0">
                        <dt class="col-sm-2 mb-3 text-muted">Student Name:</dt>
                        <dd class="col-sm-4 mb-3">
                          <strong>{{ applicationData.student_name }}</strong>
                        </dd>
                        <dt class="col-sm-2 mb-3 text-muted">Student Age:</dt>
                        <dd class="col-sm-4 mb-3">
                          <strong>{{ applicationData.student_age }} years</strong>
                        </dd>
                      </dl>
                      <dl class="row mb-0">
                        <dt class="col-sm-2 mb-3 text-muted">Grade Applied:</dt>
                        <dd class="col-sm-4 mb-3">{{ applicationData.grade }}</dd>
                        <dt class="col-sm-2 mb-3 text-muted">Date Applied:</dt>
                        <dd class="col-sm-4 mb-3">{{ applicationData.date_applied | time }}</dd>
                        <dt class="col-sm-2 mb-3 text-muted">Parent's Name:</dt>
                        <dd class="col-sm-4 mb-3">{{ applicationData.parent_name }}</dd>
                        <dt class="col-sm-2 mb-3 text-muted">Parent's Phone:</dt>
                        <dd class="col-sm-4 mb-3">{{ applicationData.parent_phone }}</dd>
                        <dt class="col-sm-2 mb-3 text-muted">Parent's Email:</dt>
                        <dd class="col-sm-4 mb-3">{{ applicationData.parent_email }}</dd>
                        <dt class="col-sm-12 mb-3 text-muted">Update Status:</dt>
                        <dd class="col-sm-12 ml-2 mb-3">
                          <input class="form-check-input" type="checkbox" value="0" 
                          v-model="form.status" id="newCheck">
                          <label class="form-check-label mr-5" for="newCheck"> New </label>
                          <input class="form-check-input" type="checkbox" value="1" 
                          v-model="form.status" id="reviewingCheck">
                          <label class="form-check-label mr-5" for="reviewingCheck"> Reviewing </label>
                          <input class="form-check-input" type="checkbox" value="2" 
                          v-model="form.status" id="processingCheck">
                          <label class="form-check-label mr-5" for="processingCheck"> Processing </label>
                          <input class="form-check-input" type="checkbox" value="3" 
                          v-model="form.status" id="comleteCheck">
                          <label class="form-check-label mr-5" for="comleteCheck"> Complete </label>
                          <input class="form-check-input" type="checkbox" value="4" 
                          v-model="form.status" id="rejectedCheck">
                          <label class="form-check-label mr-5" for="rejectedCheck"> Rejected </label>
                          <el-button type="success" size="mini" :loading="loading" 
                          @click.prevent="updateApplication()">
                          {{ loading ? 'Updating application.....' : 'Update Application' }}
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
import Api from '../../../../apis/admin/Api'
export default {
    name: 'ApplicationDetails',
    data(){
        return {
            loading: false,
            application:{},
            applicationData:{
              id: '',
              parent_name: '',
              parent_phone: '',
              parent_email: '',
              student_name: '',
              student_age: '',
              grade: '',
              status: '',
              date_applied: '',
              track_code: ''
            },
            form: {
              status: []
            }
        }
    },
    methods:{
        statusName: function(status){
          let data = { 0: "New", 1: "Reviewing", 2: "Processing", 3: "Complete", 4: "Rejected" }
          return data[status]
        },
        statusColor: function(status){
          let data = { 0: "badge badge-pill badge-dark text-white", 1: "badge badge-pill badge-warning text-white", 
          2: "badge badge-pill badge-info text-white", 3: "badge badge-pill badge-success text-white", 
          4: "badge badge-pill badge-danger text-white" }
          return data[status]
        },
        getApplication: async function(){
            Api().get('/admin/get-application/'+this.$route.params.id)
              .then((response) => {
                // this.application = response.data.application
                const _this = this
                this.applicationData.id = response.data.application.id
                this.applicationData.parent_name = response.data.application.parent_name
                this.applicationData.parent_phone = response.data.application.parent_phone
                this.applicationData.parent_email = response.data.application.parent_email
                this.applicationData.student_name = response.data.application.student_name
                this.applicationData.student_age = response.data.application.student_age
                this.applicationData.grade = response.data.application.grade.name
                this.applicationData.status = response.data.application.status
                this.applicationData.date_applied = response.data.application.created_at
                this.applicationData.track_code = response.data.application.track_code
              })
              .catch((error) => {})
        },
        updateApplication: async function(){
          this.loading = true
          Api().post('/admin/update-application/'+this.$route.params.id, this.form)
            .then(() => {
                this.getApplication()
                this.$notify({
                  group: 'application',
                  type: 'success',
                  title: 'Request complete',
                  text: 'Application updated successfully'
                });
                this.loading = false
                this.form.status = []
            })
        }
    },
    computed:{},
    created(){
      this.getApplication()
    }
}
</script>