<template>
    <div id="admin_about_us_list">
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">About Table</h2>
              <p> All the listed about content </p>
              <div class="row">
                <!-- Small table -->
                <!-- simple table -->
                <div class="col-md-12 my-4">
                  <div class="card shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <router-link :to="{name: 'CreateAdminAboutUs'}">
                                <el-button type="primary" icon="el-icon-plus" size="mini" class="mb-2"> 
                                    Create About</el-button>
                            </router-link>
                            <p class="card-text d-flex justify-content-end">Search Input.</p>
                        </div>
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Date Created</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(about, index) in abouts" :key="about.id">
                            <td><small>{{ index+1 }}</small></td>
                            <td><small>{{ about.heading }}</small></td>
                            <td><small>{{ about.created_at | time }}</small></td>
                            <td>
                                <small>
                                    <router-link :to="`/admin/edit-admin-about-us/${about.id}`">
                                        <i class="fe fe-edit-2 fe-16" style="color:green;cursor:pointer"></i>
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
    name: 'AdminAboutUsList',
    data(){
        return {
            abouts: [],
			total: 10,
			pageInfo: null,
            search: ''
        }
    },
    methods: {
        searchAbout: async function(page = 1){
            Api().get(`/admin/search-about?page=${page}&total=${this.total}`, { params: {search: this.search} })
                .then(response => {
                    this.abouts = response.data.abouts
                })
        },
        getAllAboutData: async function(page = 1){
            Api().get(`/admin/get-all-admin-about-data?page=${page}&total=${this.total}`)
                .then((response) => {
                    this.abouts = response.data.abouts.data
					this.pageInfo = response.data.abouts
                })
        }
    },
    computed:{},
    created(){
        this.getAllAboutData()
    }
}
</script>