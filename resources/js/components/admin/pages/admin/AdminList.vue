<template>
    <div id="admin_list">

        <main class="ttr-wrapper">
              <div class="content">
    
                <div class="container">
                <h5 class="mb-1">Admins Table</h5>
                <el-button type="primary" icon="el-icon-plus" size="mini" class="mb-2" 
                    @click="createModal()"> Create Admin</el-button>

                <div class="table-responsive">

                    <table class="table table-striped custom-table">
                    <thead>
                        <tr>
                        <th scope="col"><small class="d-block"><strong>#</strong></small></th>
                        <th scope="col"><small class="d-block"><strong>Admin Name</strong></small></th>
                        <th scope="col"><small class="d-block"><strong>Role</strong></small></th>
                        <th scope="col"><small class="d-block"><strong>Date Created</strong></small></th>
                        <th scope="col"><small class="d-block"><strong>Actions</strong></small></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr scope="row" v-for="(admin, index) in admins" :key="admin.id">
                                <td>
                                    <small class="d-block">{{ index+1 }}</small>
                                </td>
                                <td>
                                    <small class="d-block">{{ admin.name }}</small>
                                </td>
                                <td>
                                    <small class="d-block">{{ admin.role }}</small>
                                </td>
                                <td>
                                    <small class="d-block">{{ admin.created_at | time }}</small>
                                </td>
                                <td>
                                    <small class="d-block">
                                        <i class="el-icon-edit" style="color:green;cursor:pointer"
                                        @click="editModal(admin)"></i>
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