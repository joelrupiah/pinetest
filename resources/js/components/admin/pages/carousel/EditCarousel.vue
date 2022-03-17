<template>
    <div id="edit_carousel">
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">Update Carousel</h2>
              <p class="text-muted mb-1">Form for updating carousel content.</p>
              <div class="card shadow mb-4">
                <div class="card-header">
                  <strong class="card-title">Update Carousel Content</strong>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <label for="select-grade">Carousel Title</label>
                        <el-input placeholder="Input Carousel Title" v-model="form.title"></el-input>
                        <span class="help-block text-danger" v-if="errors.title"><small>{{ errors.title[0] }}</small></span>
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
                        <label for="gallery-image">Main Description</label>
                        <ckeditor :editor="editor" v-model="form.description" :config="editorConfig"></ckeditor>
                        <span class="help-block text-danger" v-if="errors.description"><small>{{ errors.description[0] }}</small></span>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group mb-3">
                        <el-button type="warning" :loading="loading" size="mini" 
                            @click.prevent="updateCarousel()">{{ loading ? 'Updating carousel.....' : 'Update Carousel' }}
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
    name: 'EditCarousel',
    data(){
        return {
            carousel: {},
            loading: false,
            form: {
                id: '',
                title: '',
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
                return '/uploads/img/carousel/' + name
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
        getCarousel: async function(){
            Api().get('/admin/get-carousel/'+this.$route.params.id)
                .then(response => {
                    const this_ = this
                    this.form.id = response.data.carousel.id
                    this.form.title = response.data.carousel.title
                    this.form.image = response.data.carousel.image
                    this.form.description = response.data.carousel.description
                })
        },
        updateCarousel: async function(){
            this.loading = true
            Api().post('/admin/edit-carousel/'+this.$route.params.id, this.form)
                .then(() => {
                    this.loading = false
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors
                    }
                    this.loading = false
                })
        }
    },
    computed:{},
    mounted(){
        this.getCarousel()
    }
}
</script>