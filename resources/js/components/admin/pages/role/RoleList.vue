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
                        <th scope="col"><small class="d-block"><strong>Role Name</strong></small></th>
                        <th scope="col"><small class="d-block"><strong>Permissions</strong></small></th>
                        <th scope="col"><small class="d-block"><strong>Date Created</strong></small></th>
                        <th scope="col"><small class="d-block"><strong>Actions</strong></small></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr scope="row" v-for="(role, index) in roles" :key="role.id">
                                <td>
                                    <small class="d-block">{{ index+1 }}</small>
                                </td>
                                <td>
                                    <small class="d-block">{{ role.name }}</small>
                                </td>
                                <td>
                                    <small class="d-block">
                                        <el-tag size="mini" v-for="permission in role.permissions" :key="permission.id">
                                            {{ permission.name }}
                                        </el-tag>
                                    </small>
                                </td>
                                <td>
                                    <small class="d-block">{{ role.created_at | time }}</small>
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
  <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Role Name</label>
    <input type="text" class="form-control" v-model="form.name" placeholder="Input Role Name">
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
    <el-button size="mini" @click="isModalVisible = false">Cancel</el-button>
    <el-button type="success" :loading="loading" size="mini" @click.prevent="createRole()">Create</el-button>
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
            }
        }
    },
    methods: {
        createModal(){
            this.editMode = false
            this.form.id = ''
            this.form.name = ''
            this.form.permissions = []
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
            this.loading = true
            Api().post('/admin/role', this.form)
                .then(() => {
                    this.getAllRoles()
                    this.loading = false
                    this.form.name = ''
                    this.form.permissions = []
                    this.isModalVisible = false
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