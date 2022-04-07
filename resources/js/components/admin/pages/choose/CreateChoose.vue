<template>
    <div id="create_choose">
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">Create Choose Data</h2>
              <p class="text-muted mb-1">Form for creating choose content.</p>
              <div class="card shadow mb-4">
                <div class="card-header">
                  <strong class="card-title">Create Choose Content</strong>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <label for="select-grade">Title</label>
                        <el-input placeholder="Input Title" v-model="form.title"></el-input>
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
                            <img :src="form.image" alt="" style="width:40px;height:40px">
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
                            @click.prevent="createChoose()">{{ loading ? 'Creating choose data.....' : 'Create Choose' }}
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
      </main>
    </div>
</template>

<script>
import Api from '../../../../apis/admin/Api'
import ClassicEditor from '@ckeditor/ckeditor5-build-classic'
export default {
    name: 'CreateChoose',
    data(){
        return {
            loading: false,
            form: {
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
    methods: {
        loadImage(e){
            let file = e.target.files[0]
            let reader = new FileReader()

            reader.onload = e => {
                this.form.image = e.target.result
            }

            reader.readAsDataURL(file)
        },
        createChoose: async function(){
            this.loading = true
            Api().post('/admin/create-choose-data', this.form)
                .then(() => {
                    this.loading = false
                    this.form.title = '',
                    this.form.description = '',
                    this.form.image = ''
                })
                .catch((error) => {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors
                  }
                  this.loading = false
                })
        }
    },
    computed: {},
    created(){}
}
</script>