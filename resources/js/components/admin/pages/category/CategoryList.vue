<template>
    <div id="category_list">
      <main role="main" class="main-content">
        <notifications group="category" class="mt-3" />
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">Category Table</h2>
              <p> All the listed categories in school </p>
              <div class="row">
                <!-- Small table -->
                <!-- simple table -->
                <div class="col-md-12 my-4">
                  <div class="card shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <el-button type="primary" icon="el-icon-plus" size="mini" class="mb-2" 
                                @click.prevent="createModal"> Create Category</el-button>
                            <p class="card-text d-flex justify-content-end">Search Input.</p>
                        </div>
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Date Created</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="category in categories" :key="category.id">
                            <td><small>{{ category.id }}</small></td>
                            <td><small>{{ category.name }}</small></td>
                            <td><small>{{ category.created_at | time }}</small></td>
                            <td>
                                <small>
                                    <i class="fe fe-edit-2 fe-16" style="color:green;cursor:pointer"
                                        @click.prevent="editModal(category)"></i>
                                    <i class="fe fe-trash-2 fe-16" style="color:red;cursor:pointer"
                                    data-toggle="modal" data-target="#delete-modal"
                                       @click.prevent="deleteModal(category)"></i>
                                </small>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                          <Page :total="pageInfo.total" size="small" :current="pageInfo.current_page" 
                            :page-size="parseInt(pageInfo.per_page)" v-if="pageInfo" @on-change="getAllCategories" />
                    </div>
                  </div>
                </div> <!-- simple table -->
              </div> <!-- end section -->
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
      </main> <!-- main -->

<el-dialog
  :title="form.id ? 'Edit Category' : 'Create Category'"
  :visible.sync="isModalVisible"
  width="30%"
  >
  <el-input placeholder="Input Category Name" v-model="form.name"></el-input>
  <span class="text-danger text-sm" v-if="errors.name">
      {{ errors.name[0] }}
  </span>
  <span slot="footer" class="dialog-footer">
    <el-button size="mini" @click="isModalVisible = false">Cancel</el-button>
    <el-button type="success" size="mini" :loading="loading" 
    v-show="!editMode" @click.prevent="createCategory()">
    {{ loading ? 'Submitting category data.....' : 'Submit' }}
    </el-button>
    <el-button type="success" size="mini" :loading="loading" 
    v-show="editMode" @click.prevent="updateCategory()">
    {{ loading ? 'Updating category data.....' : 'Update Category' }}
    </el-button>
  </span>
</el-dialog>

<div class="modal fade" tabindex="-1" id="delete-modal" role="dialog" 
  aria-labelledby="mySmallModalLabel" aria-hidden="true" v-show="toggleDeleteModal">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <p class="text-muted text-danger">You are about to delete <strong>{{ category.name }}.</strong> 
         This process will not be reversed after completion</p>
         <div class="d-flex justify-content-between">
            <el-button type="default" size="mini" data-bs-dismiss="modal"
            :loading="loading" @click.prevent="closeDeleteModal()">Cancel</el-button>
            <el-button type="danger" size="mini" data-bs-dismiss="modal"
            :loading="loading" @click.prevent="deleteCategory()">
              {{ loading ? 'Deleting category data.....' : 'Delete Category' }}
            </el-button>
         </div>
      </div>
    </div>
  </div>
</div>

    </div>
</template>

<script>
import Api from '../../../../apis/admin/Api'
export default {
    name: 'CategoryList',
    data(){
        return{
            total: 6,
            pageInfo: null,
            editMode: false,
            isModalVisible: false,
            toggleDeleteModal: false,
            loading: false,
            categories: [],
            category: {},
            form: {
                id: '',
                name: ''
            },
            errors: []
        }
    },
    methods: {
        closeDeleteModal(){
          this.category = '',
          this.toggleDeleteModal = false
        },
        clearData(){
            this.form.name = ''
        },
        createModal(){
            this.editMode = false,
            this.form.id = '',
            this.form.name = '',
            this.isModalVisible = true
        },
        editModal(category){
            this.editMode = true,
            this.form.id = category.id,
            this.form.name = category.name,
            this.isModalVisible = true
        },
        deleteModal(category){
          this.category = category
          this.toggleDeleteModal = true
        },
        getAllCategories: async function(page = 1){
            Api().get(`/admin/category?page=${page}&total=${this.total}`)
                .then(response => {
                    this.categories = response.data.categories.data
                    this.pageInfo = response.data.categories
                })
        },
        createCategory: async function(){
            this.loading = true
            Api().post('/admin/create-category', this.form)
                .then(() => {
                    this.$notify({
                      group: 'category',
                      type: 'success',
                      title: 'Request complete',
                      text: 'Category created successfully'
                    });
                    this.getAllCategories()
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
        updateCategory: async function(){
            this.loading = true
            Api().post(`/admin/update-category/${this.form.id}`, this.form)
                .then(() => {
                    this.$notify({
                      group: 'category',
                      type: 'success',
                      title: 'Request complete',
                      text: 'Category updated successfully'
                    });
                    this.getAllCategories()
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

        },
        deleteCategory: async function(){
          this.loading = true
          await this.$store.dispatch('category/deleteCategory', this.category.id)
          this.loading = false
          this.$notify({
            group: 'category',
            type: 'success',
            title: 'Request complete',
            text: 'Category deleted successfully'
          });
          this.getAllCategories()
          this.closeDeleteModal()
        }
    },
    computed: {},
    mounted(){
        this.getAllCategories()
    }
}
</script>