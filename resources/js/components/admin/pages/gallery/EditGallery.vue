<template>
    <div id="edit_gallery">
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">Update Gallery</h2>
              <p class="text-muted mb-1">Form for updating gallery content.</p>
              <div class="card shadow mb-4">
                <div class="card-header">
                  <strong class="card-title">Update Gallery Content</strong>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <label for="select-grade">Select Grade</label>
                            <el-select v-model="form.grade_id" placeholder="Select Grade"
                                size="mini" style="width:100%" >
                                <el-option 
                                    v-for="grade in grades"
                                    :value="grade.id" 
                                    :label="grade.name"
                                    :key="grade.id">
                                    {{ grade.name }}
                                </el-option>
                            </el-select>
                        <span class="help-block text-danger" v-if="errors.grade_id"><small>{{ errors.grade_id[0] }}</small></span>
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
                            <img :src="fileLink(form.image)" alt="" style="width:40px;height:40px">
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
                            @click.prevent="update()">{{ loading ? 'Updating.....' : 'Update Gallery' }}
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
    name: 'EditGallery',
    data(){
        return {
            about: {},
            grades: [],
            loading: false,
            form: {
                id: '',
                grade_id: '',
                image: '',
                description: ''
            },
            errors: {},
            editor: ClassicEditor,
            editorConfig: {
            }
        }
    },
    methods:{
        fileLink(name){
            if (name != null && name.length < 256) {
                return '/uploads/img/gallery/' + name
            }else {
                return this.form.image
            }
                
        },
        loadImage(e){
            let file = e.target.files[0]
            let reader = new FileReader()

            reader.onload = e => {
                this.form.image = e.target.result
            }

            reader.readAsDataURL(file)
            
        },
        getAllGrades: async function(){
            Api().get('/admin/grade')
                .then(response => {
                    this.grades = response.data.grades
                })
        },
        getGallery: async function(){
            Api().get('/admin/get-gallery/'+this.$route.params.id)
                .then(response => {
                    const this_ = this
                    this.form.id = response.data.gallery.id
                    this.form.grade_id = response.data.gallery.grade_id
                    this.form.image = response.data.gallery.image
                    this.form.description = response.data.gallery.description
                })
        },
        update: async function(){
            this.loading = true
            Api().post('/admin/edit-gallery/'+this.$route.params.id, this.form)
                .then(() => {
                    this.loading = false
                })
                .catch(error => {
                    this.loading = false
                })
        }
    },
    computed:{},
    mounted(){
        this.getGallery()
        this.getAllGrades()
    }
}
</script>