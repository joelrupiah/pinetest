<template>
    <div id="admin_about_history">
<div class="page-title">
    <h3 class="breadcrumb-header">Admin History List</h3>
</div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <router-link :to="{name: 'CreateAboutHistory'}">
                                        <el-button type="primary" icon="el-icon-plus" size="mini">
                                            Create About History
                                        </el-button>
                                    </router-link>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Heading</th>
                                                    <th>Date Created</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(abouthistory, index) in abouthistories" :key="abouthistory.id">
                                                    <th scope="row">{{ index+1 }}</th>
                                                    <td>{{ abouthistory.heading }}</td>
                                                    <td>{{abouthistory.created_at | time  }}</td>
                                                    <td>
                                                        <div>
                                                            <router-link :to="`/api/admin/edit-about-history/${abouthistory.id}`">
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