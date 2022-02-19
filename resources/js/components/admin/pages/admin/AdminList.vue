<template>
    <div id="admin_list">
<div class="page-title">
    <h3 class="breadcrumb-header">Admin List</h3>
</div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <el-button type="primary" icon="el-icon-plus" size="mini"
                                    @click="createModal()">Create Admin</el-button>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Role</th>
                                                    <th>Date Created</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(admin, index) in admins" :key="admin.id">
                                                    <th scope="row">{{ index+1 }}</th>
                                                    <td>{{ admin.name }}</td>
                                                    <td>{{ admin.role }}</td>
                                                    <td>{{ admin.created_at | time }}</td>
                                                    <td>
                                                        <div>
                                                            <button class="btn btn-xs btn-warning"
                                                            @click="editModal(admin)" >Edit</button>
                                                            <button class="btn btn-xs btn-danger"
                                                            @click.prevent="deleteAdmin(admin.id)">Delete</button>
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
  :title="form.id ? 'Edit Admin' : 'Create Admin'"
  :visible.sync="isModalVisible"
  width="50%"
  >
  <form>
  <div class="form-group">
    <label for="name">Admin Name</label>
    <input type="text" class="form-control" id="name" v-model="form.name" placeholder="Input Admin Name">
  </div>
  <div class="form-group">
    <label for="email">Admin Email</label>
    <input type="email" class="form-control" id="email" v-model="form.email" placeholder="Input Admin Email">
  </div>
  <div class="form-group">
      <label for="password">Password</label>
      <el-input v-model="form.password" size="mini" id="password" autocomplete="off" show-password></el-input>
  </div>
  <div class="form-group">
      <el-select v-model="form.role" placeholder="Select Role" size="mini">
        <el-option
        v-for="role in roles"
        :key="role.id"
        :label="role.name"
        :value="role.id">
        </el-option>
    </el-select>
  </div>
  <div class="row" style="margin-left:20px">
      <div class="col-md-12">
          <div class="form-group checkbox">
            <label class="ml-5" v-for="permission in permissions" :key="permission.id">
            <input type="checkbox" v-model="form.permissions" :value="permission.name"> {{ permission.name }}
            </label>
        </div>
      </div>
  </div>
  
  <span slot="footer" class="dialog-footer">
    <el-button type="danger" size="mini" @click.prevent="clearData()">Clear</el-button>
    <el-button type="primary" size="mini" @click.prevent="closeModal()">Close</el-button>
    <el-button type="success" :loading="loading" size="mini" 
    v-show="!editMode" @click.prevent="createAdmin()">{{ loading ? 'Creating.....' : 'Create' }}</el-button>
    <el-button type="success" :loading="loading" size="mini" 
    v-show="editMode" @click.prevent="updateAdmin()">{{ loading ? 'Updating....' : 'Update' }}</el-button>
  </span>

  </form>
</el-dialog>

    </div>
</template>

<script>
import Api from '../../../../apis/admin/Api'
export default {
    name: 'AdminList',
    data(){
        return {
            isModalVisible: false,
            editMode: false,
            loading: false,
            admin: {},
            admins: [],
            permissions: [],
            roles: [],
            form:{
                id: '',
                name: '',
                email: '',
                password: '',
                permissions: [],
                role: 1
            },
            errors: []
        }
    },
    methods:{
        closeModal(){
            this.editMode = false
            this.form.id = ''
            this.form.name = ''
            this.form.email = ''
            this.form.password = ''
            this.form.permissions = []
            this.form.role = ''
            this.isModalVisible = false
        },
        clearData(){
            this.form.id = ''
            this.form.name = ''
            this.form.email = ''
            this.form.password = ''
            this.form.permissions = []
            this.form.role = ''
        },
        createModal(){
            this.editMode = false
            this.form.id = ''
            this.form.name = ''
            this.form.email = ''
            this.form.password = ''
            this.form.permissions = []
            this.form.role = ''
            this.isModalVisible = true
        },
        editModal(admin){
            this.editMode = true
            this.form.id = admin.id
            this.form.name = admin.name
            this.form.email = admin.email
            this.form.permissions = admin.adminPermissions
            this.form.role = admin.role
            this.isModalVisible = true
        },
        getAllPermissions: async function(){
            Api().get('/admin/permission')
                .then(response => {
                    this.permissions = response.data.permissions
                })
        },
        getAllRoles: async function(){
            Api().get('/admin/role')
                .then(response => {
                    this.roles = response.data.roles
                })
        },
        getAllAdmins: async function(){
            Api().get('/admin/all-admins')
                .then(response => {
                    this.admins = response.data.admins
                })
        },
        createAdmin: async function(){
            this.editMode = false
            this.loading = true
            Api().post('/admin/create-admin', this.form)
                .then(() => {
                    this.getAllAdmins()
                    this.loading = false
                    this.isModalVisible = false
                    this.editMode = false
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors
                    }
                    if (error.response.status === 500) {
                        this.errors = error.response.data.errors
                    }
                    this.loading = false
                    this.editMode = false
                })
        },
        updateAdmin: async function(){
            this.editMode = false
            this.loading = true
            Api().post(`/admin/edit-admin/${this.form.id}`, this.form)
                .then(() => {
                    this.getAllAdmins()
                    this.loading = false
                    this.isModalVisible = false
                    this.editMode = false
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors
                    }
                    if (error.response.status === 500) {
                        this.errors = error.response.data.errors
                    }
                    this.loading = false
                    this.editMode = false
                })
        },
        deleteAdmin(id){
            Api().delete('/admin/delete-admin/'+id)
                .then(() => {
                    this.getAllAdmins()
                })
            }
    },
    computed:{},
    mounted(){

        Echo.join(`chat`)
            .here((admins) => {
                //
            })
            .joining((admin) => {
                console.log(admin.name);
            })
            .leaving((admin) => {
                console.log(admin.name);
            })
            .error((error) => {
                console.error(error);
            });

        this.getAllRoles()
        this.getAllPermissions()
        this.getAllAdmins()
    }
}
</script>