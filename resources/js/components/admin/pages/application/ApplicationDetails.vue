<template>
    <div id="application_details">
      <main role="main" class="main-content">
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
                      <span class="float-right"><i class="fe fe-flag mr-2"></i><span class="badge badge-pill badge-success text-white">{{ applicationData.status }}</span></span>
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
                        <dt class="col-sm-2 mb-3 text-muted">Update Status:</dt>
                        <dd class="col-sm-4 mb-3"></dd>
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
              date_applied: ''
            }
        }
    },
    methods:{
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
              })
              .catch((error) => {})
        }
    },
    computed:{},
    created(){
      this.getApplication()
    }
}
</script>