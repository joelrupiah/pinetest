<template>
    <div id="admin_permission">
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">Roles Table</h2>
              <p> All the listed roles in school </p>
              <div class="row">
                <!-- Small table -->
                <!-- simple table -->
                <div class="col-md-12 my-4">
                  <div class="card shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <el-button type="primary" icon="el-icon-plus" size="mini" class="mb-2" 
                                @click.prevent="createModal"> Create Role</el-button>
                            <p class="card-text d-flex justify-content-end">Search Input.</p>
                        </div>
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Role Name</th>
                            <th>Permissions</th>
                            <th>Date Created</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(role, index) in roles" :key="role.id">
                            <td><small>{{ index+1 }}</small></td>
                            <td><small>{{ role.name }}</small></td>
                            <td>
                                <small>
                                    <el-tag size="mini" v-for="permission in role.permissions" :key="permission.id">
                                        {{ permission.name }}
                                    </el-tag>
                                </small>
                            </td>
                            <td><small>{{ role.created_at | time }}</small></td>
                            <td>
                                <small>
                                    <i class="fe fe-edit-2 fe-16" style="color:green;cursor:pointer"
                                        @click.prevent="editModal(role)"></i>
                                    <i class="fe fe-trash-2 fe-16" style="color:red;cursor:pointer"></i>
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
  :title="form.id ? 'Edit Role' : 'Create Role'"
  :visible.sync="isModalVisible"
  width="30%"
  >
  <form>
  <div class="form-group">
    <label for="roleName">Role Name</label>
    <el-input placeholder="Input Role Name" id="roleName" v-model="form.name"></el-input>
    <small class="text-danger text-sm" v-if="errors.name">{{ errors.name[0] }}</small>
  </div>
  <div class="row" style="margin-left:20px">
      <div class="col-md-12">
          <div class="checkbox">
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
    v-show="!editMode" @click.prevent="createRole()">{{ loading ? 'Creating Role.....' : 'Create Role' }}</el-button>
    <el-button type="success" :loading="loading" size="mini" 
    v-show="editMode" @click.prevent="updateRole()">{{ loading ? 'Updating Role....' : 'Update Role' }}</el-button>
  </span>

  </form>
</el-dialog>

    </div>
</template>

<script>
import Api from '../../../../apis/admin/Api'
export default {
    name: 'RoleList',
    data(){
        return {
            loading: false,
            editMode: false,
            isModalVisible: false,
            roles: [],
            role: {},
            permissions: [],
            form: {
                id: '',
                name: '',
                permissions: []
            },
            errors: {}
        }
    },
    methods: {
        clearData(){
            this.form.id = '',
            this.form.name = '',
            this.form.permissions = []
        },
        createModal(){
            this.editMode = false
            this.form.id = ''
            this.form.name = ''
            this.form.permissions = []
            this.isModalVisible = true
        },
        editModal(role){
            this.editMode = true,
            this.form.id = role.id,
            this.form.name = role.name,
            this.form.permissions = role.rolePermissions,
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
        createRole: async function(){
            this.editMode = false
            this.loading = true
            Api().post('/admin/role', this.form)
                .then(() => {
                    this.getAllRoles()
                    this.loading = false
                    this.form.name = ''
                    this.form.permissions = []
                    this.isModalVisible = false
                    this.editMode = false
                })
                .catch((error) => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors
                    }
                    this.loading = false
                    this.editMode = false
                })
        },
        updateRole: async function(){
            this.editMode = false
            this.loading = true
            Api().post(`/admin/edit-role/${this.form.id}`, this.form)
                .then(() => {
                    this.getAllRoles()
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
        }
    },
    computed:{},
    mounted(){
        this.getAllPermissions()
        this.getAllRoles()
    }
    
}
</script>