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
					<div class="col-md-4">
                      <div class="form-group mb-3">
                        <label for="select-grade">Heading One</label>
                        <el-input placeholder="Input Heading One" v-model="form.headingOne"></el-input>
                        <span class="help-block text-danger" v-if="errors.headingOne"><small>{{ errors.headingOne[0] }}</small></span>
                      </div>
                    </div>
					<div class="col-md-8">
                      <div class="form-group mb-3">
                        <label for="select-grade">Description One</label>
						<ckeditor :editor="editor" v-model="form.descriptionOne" :config="editorConfig"></ckeditor>
                        <span class="help-block text-danger" v-if="errors.descriptionOne"><small>{{ errors.descriptionOne[0] }}</small></span>
                      </div>
                    </div>
					<div class="col-md-4">
                      <div class="form-group mb-3">
                        <label for="select-grade">Heading Two</label>
                        <el-input placeholder="Input Heading Two" v-model="form.headingTwo"></el-input>
                        <span class="help-block text-danger" v-if="errors.headingTwo"><small>{{ errors.headingTwo[0] }}</small></span>
                      </div>
                    </div>
					<div class="col-md-8">
                      <div class="form-group mb-3">
                        <label for="select-grade">Description Two</label>
						<ckeditor :editor="editor" v-model="form.descriptionTwo" :config="editorConfig"></ckeditor>
                        <span class="help-block text-danger" v-if="errors.descriptionTwo"><small>{{ errors.descriptionTwo[0] }}</small></span>
                      </div>
                    </div>
					<div class="col-md-4">
                      <div class="form-group mb-3">
                        <label for="select-grade">Heading Three</label>
                        <el-input placeholder="Input Heading Three" v-model="form.headingThree"></el-input>
                        <span class="help-block text-danger" v-if="errors.headingThree"><small>{{ errors.headingThree[0] }}</small></span>
                      </div>
                    </div>
					<div class="col-md-8">
                      <div class="form-group mb-3">
                        <label for="select-grade">Description Three</label>
						<ckeditor :editor="editor" v-model="form.descriptionThree" :config="editorConfig"></ckeditor>
                        <span class="help-block text-danger" v-if="errors.descriptionThree"><small>{{ errors.descriptionThree[0] }}</small></span>
                      </div>
                    </div>
					<div class="col-md-4">
                      <div class="form-group mb-3">
                        <label for="select-grade">Heading Four</label>
                        <el-input placeholder="Input Heading Four" v-model="form.headingFour"></el-input>
                        <span class="help-block text-danger" v-if="errors.headingFour"><small>{{ errors.headingFour[0] }}</small></span>
                      </div>
                    </div>
					<div class="col-md-8">
                      <div class="form-group mb-3">
                        <label for="select-grade">Description Four</label>
						<ckeditor :editor="editor" v-model="form.descriptionFour" :config="editorConfig"></ckeditor>
                        <span class="help-block text-danger" v-if="errors.descriptionFour"><small>{{ errors.descriptionFour[0] }}</small></span>
                      </div>
                    </div>
					<div class="col-md-4">
                      <div class="form-group mb-3">
                        <label for="select-grade">Heading Five</label>
                        <el-input placeholder="Input Heading Five" v-model="form.headingFive"></el-input>
                        <span class="help-block text-danger" v-if="errors.headingFive"><small>{{ errors.headingFive[0] }}</small></span>
                      </div>
                    </div>
					<div class="col-md-8">
                      <div class="form-group mb-3">
                        <label for="select-grade">Description Five</label>
						<ckeditor :editor="editor" v-model="form.descriptionFive" :config="editorConfig"></ckeditor>
                        <span class="help-block text-danger" v-if="errors.descriptionFive"><small>{{ errors.descriptionFive[0] }}</small></span>
                      </div>
                    </div>
					<div class="col-md-4">
                      <div class="form-group mb-3">
                        <label for="select-grade">Heading Six</label>
                        <el-input placeholder="Input Heading Six" v-model="form.headingSix"></el-input>
                        <span class="help-block text-danger" v-if="errors.headingSix"><small>{{ errors.headingSix[0] }}</small></span>
                      </div>
                    </div>
					<div class="col-md-8">
                      <div class="form-group mb-3">
                        <label for="select-grade">Description Six</label>
						<ckeditor :editor="editor" v-model="form.descriptionSix" :config="editorConfig"></ckeditor>
                        <span class="help-block text-danger" v-if="errors.descriptionSix"><small>{{ errors.descriptionSix[0] }}</small></span>
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
                            @click.prevent="createCarousel()">{{ loading ? 'Creating carousel.....' : 'Create Carousel' }}
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
            form: {
                heading: '',
                description: '',
                headingOne: '',
				headingTwo: '',
				headingThree: '',
				headingFour: '',
				headingFive: '',
				headingSix: '',
				descriptionOne: '',
				descriptionTwo: '',
				descriptionThree: '',
				descriptionFour: '',
				descriptionFive: '',
				descriptionSix: '',
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
            this.form.heading = '',
            this.form.description = '',
            this.form.imageOne = '',
            this.form.imageTwo = ''
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
        submit: async function(){
            Api().post('/admin/create-about', this.form)
                .then(() => {
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