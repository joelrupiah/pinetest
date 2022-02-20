<template>
    <div id="admin_about_us_list">
<div class="page-title">
    <h3 class="breadcrumb-header">Admin List</h3>
</div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <router-link :to="{name: 'CreateAdminAboutUs'}">
                                        <el-button type="primary" icon="el-icon-plus" size="mini">
                                            Create About Data
                                        </el-button>
                                    </router-link>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table">
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
                                                    <th scope="row">{{ index+1 }}</th>
                                                    <td>{{ about.heading }}</td>
                                                    <td>{{about.created_at | time  }}</td>
                                                    <td>
                                                        <div>
                                                            <router-link :to="`/api/admin/edit-admin-about-us/${about.id}`">
                                                                <button class="btn btn-xs btn-warning">
                                                                    Edit
                                                                </button>
                                                            </router-link>
                                                            <button class="btn btn-xs btn-danger">Delete</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div><!-- Row -->
                </div>
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