<template>
    <div id="admin_about_us">
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">Edit About Content</h2>
              <p class="text-muted mb-1">Form for editing about content.</p>
              <div class="card shadow mb-4">
                <div class="card-header">
                  <strong class="card-title">Edit About Content</strong>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group mb-3">
                        <label for="select-grade">Heading</label>
                        <el-input placeholder="Input Heading" v-model="form.heading"></el-input>
                        <span class="help-block text-danger" v-if="errors.heading"><small>{{ errors.heading[0] }}</small></span>
                      </div>
                    </div>
					<div class="col-md-8">
                      <div class="form-group mb-3">
                        <label for="select-grade">Description</label>
						<ckeditor :editor="editor" v-model="form.description" :config="editorConfig"></ckeditor>
                        <span class="help-block text-danger" v-if="errors.description"><small>{{ errors.description[0] }}</small></span>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group mb-3">
                        <label>Select Image One</label>
                        <input type="file" @change="loadImageOne($event)">
                        <span class="help-block text-danger" v-if="errors.imageOne"><small>{{ errors.imageOne[0] }}</small></span>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group mb-3">
                        <label>Image Preview</label>
                        <div>
                            <img :src="fileLinkOne(form.imageOne)" alt="" style="width:100px;height:100px">
                        </div>
                      </div>
                    </div>
					<div class="col-md-3">
                      <div class="form-group mb-3">
                        <label>Select Image Two</label>
                        <input type="file" @change="loadImageTwo($event)">
                        <span class="help-block text-danger" v-if="errors.imageTwo"><small>{{ errors.imageTwo[0] }}</small></span>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group mb-3">
                        <label>Image Preview</label>
                        <div>
                            <img :src="fileLinkTwo(form.imageTwo)" alt="" style="width:100px;height:100px">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group mb-3">
                        <label>Video Link</label>
                        <el-input placeholder="Input Video Link" v-model="form.video"></el-input>
                        <span class="help-block text-danger" v-if="errors.video"><small>{{ errors.video[0] }}</small></span>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group mb-3">
                        <el-button type="warning" :loading="loading" size="mini" 
                            @click.prevent="update()">{{ loading ? 'Updating about data.....' : 'Update About Data' }}
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
    name: 'CreateAdminAboutUs',
    data(){
        return {
          loading: false,
            form: {
                id: '',
                heading: '',
                description: '',
                imageOne: '',
                imageTwo: '',
				video: ''
            },
            errors: {},
            editor: ClassicEditor,
            editorConfig: {
            }
        }
    },
    methods: {
        clear(){
            this.heading = '',
            this.description = '',
            this.imageOne = '',
            this.imageTwo = '',
				    this.video = ''
        },
        fileLinkOne(name){
            if (name != null && name.length < 256) {
                return '/uploads/img/about/' + name
            }else {
                return this.form.imageOne
            }
                
        },
        fileLinkTwo(name){
            if (name != null && name.length < 256) {
                return '/uploads/img/about/' + name
            }else {
                return this.form.imageTwo
            }
                
        },
        loadImageOne(e){
            let file = e.target.files[0]
            let reader = new FileReader()

            reader.onload = e => {
                this.form.imageOne = e.target.result
            }

            reader.readAsDataURL(file)
        },
		    loadImageTwo(e){
            let file = e.target.files[0]
            let reader = new FileReader()

            reader.onload = e => {
                this.form.imageTwo = e.target.result
            }

            reader.readAsDataURL(file)
        },
        getAboutData: async function(){
            Api().get('/admin/get-about-data/'+this.$route.params.id)
                .then((response) => {
                    const this_ = this
                    this.form.id = response.data.about.id
                    this.form.heading = response.data.about.heading
                    this.form.description = response.data.about.description
                    this.form.imageOne = response.data.about.imageOne
                    this.form.imageTwo = response.data.about.imageTwo
                    this.form.video = response.data.about.video
                })
        },
        update: async function(){
            Api().post('/admin/update-about-us/'+this.$route.params.id, this.form)
                .then(() => {})
                .catch(error => {})
        }
    },
    computed:{},
    mounted(){
        this.getAboutData()
    }
}
</script>