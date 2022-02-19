<template>
    <div id="permission_list">
<div class="page-title">
                        <h3 class="breadcrumb-header">Permssions List</h3>
                    </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <a href="/api/admin/create-permission">
                                        <el-button type="primary" icon="el-icon-plus" size="mini" @click.prevent="createModal">
                                            Create Permission</el-button>
                                    </a>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Permission Name</th>
                                                    <th>Date Created</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(permission, index) in permissions" :key="permission.id">
                                                    <th scope="row">{{ index+1 }}</th>
                                                    <td>{{ permission.name }}</td>
                                                    <td>{{ permission.created_at | time }}</td>
                                                    <td>
                                                        <div class="d-flex justify-content-between">
                                                            <i style="color:green;cursor:pointer" class="el-icon-edit"
                                                            @click.prevent="editModal(permission)"></i>
                                                            <i style="color:red" class="el-icon-delete"></i>
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
<el-dialog
  :title="form.id ? 'Edit Role' : 'Create Role'"
  :visible.sync="isModalVisible"
  width="30%"
  >
  <el-input placeholder="Input Permission Name" v-model="form.name"></el-input>
  <span class="text-danger text-sm" v-if="errors.name">
      {{ errors.name[0] }}
  </span>
  <span slot="footer" class="dialog-footer">
    <el-button size="mini" @click="isModalVisible = false">Cancel</el-button>
    <el-button type="success" size="mini" :loading="loading" 
    v-show="!editMode" @click.prevent="createPermission()">Submit</el-button>
    <el-button type="success" size="mini" :loading="loading" 
    v-show="editMode" @click.prevent="updatePermission()">Update</el-button>
  </span>
</el-dialog>
    </div>
</template>

<script>
import Api from '../../../../apis/admin/Api'
export default {
    name: 'PermissionList',
    data(){
        return{
            editMode: false,
            isModalVisible: false,
            loading: false,
            permissions: [],
            permission: {},
            form: {
                id: '',
                name: ''
            },
            errors: []
        }
    },
    methods: {
        clearData(){
            this.form.name = ''
        },
        createModal(){
            this.editMode = false,
            this.form.id = '',
            this.form.name = '',
            this.isModalVisible = true
        },
        editModal(permission){
            this.editMode = true,
            this.form.id = permission.id,
            this.form.name = permission.name,
            this.isModalVisible = true
        },
        getAllPermissions: async function(){
            Api().get('/admin/permission')
                .then(response => {
                    this.permissions = response.data.permissions
                })
        },
        createPermission: async function(){
            this.loading = true
            Api().post('/admin/permission', this.form)
                .then(() => {
                    this.getAllPermissions()
                    this.editMode = false
                    this.loading = false
                    this.clearData()
                    this.isModalVisible = false
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors
                    }
                    this.loading = false
                })
        },
        updatePermission: async function(){
            this.loading = true
            Api().post(`/admin/edit-permission/${this.form.id}`, this.form)
                .then(() => {
                    this.getAllPermissions()
                    this.editMode = false
                    this.loading = false
                    this.clearData()
                    this.isModalVisible = false
                })
                .catch(error => {
                    if (error.response.status === 500) {
                        this.errors = error.response.data.errors
                    }
                    this.loading = false
                })

        }
    },
    computed: {},
    mounted(){
        this.getAllPermissions()
    }
}
</script>