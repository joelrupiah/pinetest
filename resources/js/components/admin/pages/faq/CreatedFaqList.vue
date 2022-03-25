<template>
    <div id="created_faq_list">
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">Created Faq Table</h2>
              <p> All the listed created faq in school </p>
              <div class="row">
                <!-- Small table -->
                <!-- simple table -->
                <div class="col-md-12 my-4">
                  <div class="card shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <router-link :to="{name: 'CreateFaq'}">
                                <el-button type="primary" icon="el-icon-plus" size="mini" class="mb-2"> 
                                    Create Faq</el-button>
                            </router-link>
                            <p class="card-text d-flex justify-content-end">Search Input.</p>
                        </div>
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Created Faq Title</th>
                            <th>Date Created</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(adminfaq, index) in adminfaqs" :key="adminfaq.id">
                            <td><small>{{ index+1 }}</small></td>
                            <td><small class="d-block" v-html="adminfaq.title"></small></td>
                            <td><small>{{ adminfaq.created_at | time }}</small></td>
                            <td>
                                <small>
                                    <router-link :to="`/admin/edit-created-faq/${adminfaq.id}`">
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
    name: 'CreatedFaqList',
    data(){
        return {
            adminfaqs: []
        }
    },
    methods: {
        getAllAdminFaqs: async function(){
            Api().get('/admin/get-all-admin-faqs')
                .then((response) => {
                    this.adminfaqs = response.data.adminfaqs
                })
        }
    },
    computed: {},
    created() {
        this.getAllAdminFaqs()
    }
}
</script>