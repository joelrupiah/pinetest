<template>
    <div id="application_list">
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="h3 mb-0 page-title">Applications</h2>
              <div class="row align-items-center my-4">
              </div> <!-- .row -->
              <div class="row items-align-center my-4  d-none d-lg-flex">
                <div class="col-md">
                  <ul class="nav nav-pills justify-content-start">
                    <li class="nav-item">
                     <a class="nav-link text-muted px-2">All <span class="badge badge-pill bg-white border text-muted ml-2">174</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-muted px-2">New/Applied <span class="badge badge-pill bg-white border text-muted ml-2">64</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-muted px-2">Assigned/Reviewing <span class="badge badge-pill bg-white border text-muted ml-2">48</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-muted px-2">Processing/Interviewing <span class="badge badge-pill bg-white border text-muted ml-2">52</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-muted px-2">Completed/Admitted <span class="badge badge-pill bg-white border text-muted ml-2">10</span></a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <!-- table -->
                  <table class="table table-borderless table-striped">
                    <thead>
                      <tr>
                        <th>SL</th>
                        <th>Parent's Name</th>
                        <th>Student's Name</th>
                        <th>Grade</th>
                        <th>Status</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(application, index) in applications" :key="application.id">
                        <td class="text-muted small">{{ index+1 }}</td>
                        <th scope="col">{{ application.parent_name }}</th>
                        <td class="small">{{ application.student_name }}</td>
                        <td class="small">{{ application.grade.name }}</td>
                        <td>
                          <span class="small text-muted">Completed</span>
                          <div class="progress mt-2" style="height: 3px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </td>
                        <td class="text-muted small">{{ application.created_at | time }}</td>
                        <td>
                            <router-link :to="`/api/admin/reply-email-application/${application.id}`">
                                <i class="fe fe-mail fe-16" style="color:green;cursor:pointer"></i>
                            </router-link>
                            <router-link :to="`/api/admin/show-application-details/${application.id}`">
                                <i class="fe fe-eye fe-16" style="color:black;cursor:pointer"></i>
                            </router-link>
                            <a>
                                <i class="fe fe-phone fe-16" style="color:blue;cursor:pointer"></i>
                            </a>
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
    name: 'ApplicationList',
    data(){
        return {
            applications: []
        }
    },
    methods:{
        getAllApplications: async function(){
            Api().get('/admin/get-all-applications')
                .then((response) => {
                    this.applications = response.data.applications
                })
                .catch((error) => {
                    if (error.response.status === 500) {
                        alert('server error please contact IT department')
                    }
                })
        }
    },
    computed:{},
    created(){
        this.getAllApplications()
    }
}
</script>