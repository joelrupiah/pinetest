<template>
    <div id="role_list">
<div class="page-title">
                        <h3 class="breadcrumb-header">Roles List</h3>
                    </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                        <el-button type="primary" icon="el-icon-plus" size="mini" @click="createModal">
                                            Create Role</el-button>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table" style='table-layout:fixed'>
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
                                                    <th scope="row">{{ index+1 }}</th>
                                                    <td>{{ role.name }}</td>
                                                    <td>
                                                        <span v-for="permission in role.permissions" :key="permission.id">
                                                            <span class="label label-success">{{ permission.name }}</span>
                                                        </span>
                                                    </td>
                                                    <td>{{ role.created_at | time }}</td>
                                                    <td>Table cell</td>
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
                    this.form.name = ''
                    this.form.permissions = []
                    this.loading = false
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