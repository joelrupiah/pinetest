<template>
    <div id="created_faq_list">
        <main class="ttr-wrapper">
              <div class="content">
    
                <div class="container">
                <h5 class="mb-1">Faqs Table</h5>
                <router-link :to="{name: 'CreateFaq'}">
                    <el-button type="primary" icon="el-icon-plus" size="mini" class="mb-2"> 
                        Create Faq</el-button>
                </router-link>
                
                <div class="table-responsive">

                    <table class="table table-striped custom-table">
                    <thead>
                        <tr>
                        <th scope="col"><small class="d-block"><strong>#</strong></small></th>
                        <th scope="col"><small class="d-block"><strong>Faq Title</strong></small></th>
                        <th scope="col"><small class="d-block"><strong>Date Created</strong></small></th>
                        <th scope="col"><small class="d-block"><strong>Actions</strong></small></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr scope="row" v-for="(adminfaq, index) in adminfaqs" :key="adminfaq.id">
                                <td>
                                    <small class="d-block">{{ index+1 }}</small>
                                </td>
                                <td>
                                    <small class="d-block" v-html="adminfaq.title"></small>
                                </td>
                                <td>
                                    <small class="d-block">{{ adminfaq.created_at | time }}</small>
                                </td>
                                <td>
                                    <small class="d-block">
                                        <router-link :to="`/api/admin/edit-created-faq/${adminfaq.id}`">
                                            <i class="el-icon-edit" style="color:green;cursor:pointer"></i>
                                        </router-link>
                                        <i class="el-icon-delete" style="color:red;cursor:pointer"></i>
                                    </small>
                                </td>
                        
                        </tr>
                        
                    </tbody>
                    </table>
                </div>

                </div>

            </div>
        </main>
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