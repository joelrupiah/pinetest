<template>
    <div id="create_gallery">
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">Create Gallery</h2>
              <p class="text-muted mb-1">Form for creating gallery content.</p>
              <div class="card shadow mb-4">
                <div class="card-header">
                  <strong class="card-title">Create Gallery Content</strong>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <label for="select-category">Select Category</label>
                            <el-select v-model="form.category_id" placeholder="Select Category"
                                size="mini" style="width:100%" >
                                <el-option 
                                    v-for="category in categories"
                                    :value="category.id" 
                                    :label="category.name"
                                    :key="category.id">
                                    {{ category.name }}
                                </el-option>
                            </el-select>
                        <span class="help-block text-danger" v-if="errors.category_id"><small>{{ errors.category_id[0] }}</small></span>
                      </div>
                    </div> <!-- /.col -->
                    <div class="col-md-3">
                      <div class="form-group mb-3">
                        <label for="gallery-image">Select Image</label>
                        <input type="file" @change="loadImage($event)">
                        <span class="help-block text-danger" v-if="errors.image"><small>{{ errors.image[0] }}</small></span>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group mb-3">
                        <label for="gallery-image">Image Preview</label>
                        <div>
                            <img :src="form.image" alt="" style="width:40px;height:40px">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group mb-3">
                        <label for="gallery-image">Image Description</label>
                        <ckeditor :editor="editor" v-model="form.description" :config="editorConfig"></ckeditor>
                        <span class="help-block text-danger" v-if="errors.description"><small>{{ errors.description[0] }}</small></span>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group mb-3">
                        <el-button type="success" :loading="loading" size="mini" 
                            @click.prevent="createGallery()">{{ loading ? 'Creating.....' : 'Create Gallery' }}
                        </el-button>
                        <el-button type="danger" size="mini" @click.prevent="clearData()">Clear</el-button>
                      </div>
                    </div>
                  </div>
                </div>
              </div> <!-- / .card -->
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
      </main> <!-- main -->
    </div>
</template>

<script>
import Api from '../../../../apis/admin/Api'
import ClassicEditor from '@ckeditor/ckeditor5-build-classic'
export default {
    name: 'CreateGallery',
    data(){
        return{
            loading: false,
            categories: [],
            galleries: [],
            gallery: {},
            form: {
                category_id: '',
                image: '',
                description: ''
            },
            errors: {},
            editor: ClassicEditor,
            editorConfig: {
            }
        }
    },
    methods: {
        clearData(){
            this.form.category_id = ''
            this.form.image = ''
        },
        loadImage(e){
            let file = e.target.files[0]
            let reader = new FileReader()
            reader.onload = e => {
                this.form.image = e.target.result
            }
            reader.readAsDataURL(file)
        },
        getAllCategories: async function(){
            Api().get('/admin/get-admin-categories')
                .then(response => {
                    this.categories = response.data.categories
                })
        },
        createGallery: async function(){
            this.loading = true
            Api().post('/admin/gallery', this.form)
                .then(() => {
                    this.loading = false
                    this.clearData()
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors
                    }
                    this.loading = false
                })
        },
    },
    computed: {},
    created(){
        this.getAllCategories()
    }
}
</script>