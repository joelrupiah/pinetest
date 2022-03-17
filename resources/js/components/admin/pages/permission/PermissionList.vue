<template>
    <div id="admin_permission">
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">Permissions Table</h2>
              <p> All the listed permissions in school </p>
              <div class="row">
                <!-- Small table -->
                <!-- simple table -->
                <div class="col-md-12 my-4">
                  <div class="card shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <el-button type="primary" icon="el-icon-plus" size="mini" class="mb-2" 
                                @click.prevent="createModal"> Create Permission</el-button>
                            <p class="card-text d-flex justify-content-end">Search Input.</p>
                        </div>
                      <table class="table table-hover">
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
                            <td><small>{{ index+1 }}</small></td>
                            <td><small>{{ permission.name }}</small></td>
                            <td><small>{{ permission.created_at | time }}</small></td>
                            <td>
                                <small>
                                    <i class="fe fe-edit-2 fe-16" style="color:green;cursor:pointer"
                                        @click.prevent="editModal(permission)"></i>
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
  :title="form.id ? 'Edit Permission' : 'Create Permission'"
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
    v-show="!editMode" @click.prevent="createPermission()">{{ loading ? 'Creating Permission.....' : 'Create Permission' }}</el-button>
    <el-button type="success" size="mini" :loading="loading" 
    v-show="editMode" @click.prevent="updatePermission()">{{ loading ? 'Updating Permission.....' : 'Update Permission' }}</el-button>
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