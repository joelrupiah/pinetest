<template>
    <div id="admin_list">

      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">Admins Table</h2>
              <p> All the listed admins in school </p>
              <div class="row">
                <!-- Small table -->
                <!-- simple table -->
                <div class="col-md-12 my-4">
                  <div class="card shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <el-button type="primary" icon="el-icon-plus" size="mini" class="mb-2" 
                                @click.prevent="createModal"> Create Admin</el-button>
                            <p class="card-text d-flex justify-content-end">Search Input.</p>
                        </div>
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Admin Name</th>
                            <th>Role</th>
                            <th>Date Created</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(admin, index) in admins" :key="admin.id">
                            <td><small>{{ index+1 }}</small></td>
                            <td><small>{{ admin.name }}</small></td>
                            <td><small>{{ admin.role }}</small></td>
                            <td><small>{{ admin.created_at | time }}</small></td>
                            <td>
                                <small>
                                    <i class="fe fe-edit-2 fe-16" style="color:green;cursor:pointer"
                                        @click.prevent="editModal(admin)"></i>
                                    <i class="fe fe-trash-2 fe-16" style="color:red;cursor:pointer"
                                        @click.prevent="deleteAdmin(admin.id)"></i>
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

<el-dialog
  :title="form.id ? 'Edit Admin' : 'Create Admin'"
  :visible.sync="isModalVisible"
  width="50%"
  >
  <form>
  <div class="form-group">
    <label for="name">Admin Name</label>
    <input type="text" class="form-control" id="name" v-model="form.name" placeholder="Input Admin Name">
    <small class="text-danger text-sm" v-if="errors.name">{{ errors.name[0] }}</small>
  </div>
  <div class="form-group">
    <label for="email">Admin Email</label>
    <input type="email" class="form-control" id="email" v-model="form.email" placeholder="Input Admin Email">
    <small class="text-danger text-sm" v-if="errors.email">{{ errors.email[0] }}</small>
  </div>
  <div class="form-group">
      <label for="password">Password</label>
      <el-input v-model="form.password" size="mini" id="password" autocomplete="off" show-password></el-input>
      <small class="text-danger text-sm" v-if="errors.password">{{ errors.password[0] }}</small>
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
    <small class="text-danger text-sm" v-if="errors.role">{{ errors.role[0] }}</small>
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
    v-show="!editMode" @click.prevent="createAdmin()">{{ loading ? 'Creating Admin.....' : 'Create Admin' }}</el-button>
    <el-button type="success" :loading="loading" size="mini" 
    v-show="editMode" @click.prevent="updateAdmin()">{{ loading ? 'Updating Admin....' : 'Update Admin' }}</el-button>
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
            errors: {}
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
        this.getAllRoles()
        this.getAllPermissions()
        this.getAllAdmins()
    }
}
</script>