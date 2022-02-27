<template>
    <div id="admin_about_us_list">
        <main class="ttr-wrapper">
              <div class="content">
    
                <div class="container">
                <h5 class="mb-1">Admins Table</h5>
                <router-link :to="{name: 'CreateAdminAboutUs'}">
                    <el-button type="primary" icon="el-icon-plus" size="mini" class="mb-2"> 
                        Create About Content</el-button>
                </router-link>

                <div class="table-responsive">

                    <table class="table table-striped custom-table">
                    <thead>
                        <tr>
                        <th scope="col"><small class="d-block"><strong>#</strong></small></th>
                        <th scope="col"><small class="d-block"><strong>Name</strong></small></th>
                        <th scope="col"><small class="d-block"><strong>Date Created</strong></small></th>
                        <th scope="col"><small class="d-block"><strong>Actions</strong></small></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr scope="row" v-for="(about, index) in abouts" :key="about.id">
                                <td>
                                    <small class="d-block">{{ index+1 }}</small>
                                </td>
                                <td>
                                    <small class="d-block">{{ about.heading }}</small>
                                </td>
                                <td>
                                    <small class="d-block">{{about.created_at | time  }}</small>
                                </td>
                                <td>
                                    <small class="d-block">
                                        <router-link :to="`/api/admin/edit-admin-about-us/${about.id}`">
                                            <i class="el-icon-edit" style="color:green;cursor:pointer"></i>
                                        </router-link>
                                        <i class="el-icon-delete" style="color:red;cursor:pointer"
                                        @click.prevent="deleteAdmin(admin.id)"></i>
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
    name: 'AdminAboutUsList',
    data(){
        return {
            abouts: []
        }
    },
    methods: {
        getAllAboutData: async function(){
            Api().get('/admin/get-all-admin-about-data')
                .then((response) => {
                    this.abouts = response.data.abouts
                })
        }
    },
    computed:{},
    created(){
        this.getAllAboutData()
    }
}
</script>