<template>
    <div id="admin_about_us">
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">Create About Content</h2>
              <p class="text-muted mb-1">Form for creating about content.</p>
              <div class="card shadow mb-4">
                <div class="card-header">
                  <strong class="card-title">Create About Content</strong>
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
                            <img :src="form.imageOne" alt="" style="width:40px;height:40px">
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
                            <img :src="form.imageTwo" alt="" style="width:40px;height:40px">
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
                            @click.prevent="createAbout()">{{ loading ? 'Creating about data.....' : 'Create About Data' }}
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
                heading: '',
                description: '',
                headingOne: '',
                headingTwo: '',
                headingThree: '',
                headingFour: '',
                headingFive: '',
                headingSix: '',
                headingSeven: '',
                descriptionOne: '',
                descriptionTwo: '',
                descriptionThree: '',
                descriptionFour: '',
                descriptionFive: '',
                descriptionSix: '',
                descriptionSeven: '',
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
            this.headingOne = '',
            this.headingTwo = '',
            this.headingThree = '',
            this.headingFour = '',
            this.headingFive = '',
            this.headingSix = '',
            this.headingSeven = '',
            this.descriptionOne = '',
            this.descriptionTwo = '',
            this.descriptionThree = '',
            this.descriptionFour = '',
            this.descriptionFive = '',
            this.descriptionSix = '',
            this.descriptionSeven = '',
            this.imageOne = '',
            this.imageTwo = '',
				    this.video = ''
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
        createAbout: async function(){
          this.loading = true
            Api().post('/admin/create-about', this.form)
                .then(() => {
                  this.loading = false
                  this.clear()
                })
                .catch((error) => {
                    if(error.response.status === 422){
                        this.errors = error.response.data.errors
                    }
                })
        }
    }
}
</script>