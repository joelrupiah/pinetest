<template>
    <div id="admin_permission">
        <main class="ttr-wrapper">
              <div class="content">
    
                <div class="container">
                <h5 class="mb-1">Permissions Table</h5>
                <el-button type="primary" icon="el-icon-plus" size="mini" class="mb-2" 
                    @click.prevent="createModal"> Create Permission</el-button>

                <div class="table-responsive">

                    <table class="table table-striped custom-table">
                    <thead>
                        <tr>
                        <th scope="col"><small class="d-block"><strong>#</strong></small></th>
                        <th scope="col"><small class="d-block"><strong>Permission Name</strong></small></th>
                        <th scope="col"><small class="d-block"><strong>Date Created</strong></small></th>
                        <th scope="col"><small class="d-block"><strong>Actions</strong></small></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr scope="row" v-for="(permission, index) in permissions" :key="permission.id">
                                <td>
                                    <small class="d-block">{{ index+1 }}</small>
                                </td>
                                <td>
                                    <small class="d-block">{{ permission.name }}</small>
                                </td>
                                <td>
                                    <small class="d-block">{{ permission.created_at | time }}</small>
                                </td>
                                <td>
                                    <small class="d-block">
                                        <i class="el-icon-edit" style="color:green;cursor:pointer"
                                        @click.prevent="editModal(permission)"></i>
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