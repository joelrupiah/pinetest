<template>
    <div id="admin_about_history">

        <main class="ttr-wrapper">
              <div class="content">
    
                <div class="container">
                <h5 class="mb-1">Admins Table</h5>
                <router-link :to="{name: 'CreateAboutHistory'}">
                    <el-button type="primary" icon="el-icon-plus" size="mini" class="mb-2"> 
                        Create About History</el-button>
                </router-link>
                <div class="table-responsive">

                    <table class="table table-striped custom-table">
                    <thead>
                        <tr>
                        <th scope="col"><small class="d-block"><strong>#</strong></small></th>
                        <th scope="col"><small class="d-block"><strong>Heading</strong></small></th>
                        <th scope="col"><small class="d-block"><strong>Date Created</strong></small></th>
                        <th scope="col"><small class="d-block"><strong>Actions</strong></small></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr scope="row" v-for="(abouthistory, index) in abouthistories" :key="abouthistory.id">
                                <td>
                                    <small class="d-block">{{ index+1 }}</small>
                                </td>
                                <td>
                                    <small class="d-block">{{ abouthistory.heading }}</small>
                                </td>
                                <td>
                                    <small class="d-block">{{abouthistory.created_at | time  }}</small>
                                </td>
                                <td>
                                    <small class="d-block">
                                        <router-link :to="`/api/admin/edit-about-history/${abouthistory.id}`">
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
    name: 'AdminAboutHistoryList',
    data(){
        return {
            abouthistories: []
        }
    },
    methods: {
        getAdminAboutHistory: async function(){
            Api().get('/admin/get-admin-about-history')
                .then((response) => {
                    this.abouthistories = response.data.abouthistories
                })
        }
    },
    computed: {},
    created(){
        this.getAdminAboutHistory()
    }
}
</script>