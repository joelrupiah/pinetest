<template>
    <div id="create_gallery">
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">Create Faq</h2>
              <p class="text-muted mb-1">Form for creating faq content.</p>
              <div class="card shadow mb-4">
                <div class="card-header">
                  <strong class="card-title">Create Faq Content</strong>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <label>Faq Question</label>
                        <ckeditor :editor="editor" v-model="form.title" :config="editorConfig"></ckeditor>
                        <span class="help-block text-danger" v-if="errors.title"><small>{{ errors.title[0] }}</small></span>
                      </div>
                    </div> <!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <label>Faq Answer</label>
                        <ckeditor :editor="editor" v-model="form.description" :config="editorConfig"></ckeditor>
                        <span class="help-block text-danger" v-if="errors.description"><small>{{ errors.description[0] }}</small></span>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group mb-3">
                        <el-button type="warning" :loading="loading" size="mini" 
                            @click.prevent="createFaq()">{{ loading ? 'Creating faq.....' : 'Create Faq' }}
                        </el-button>
                        <el-button type="danger" :loading="loading" size="mini" 
                            @click.prevent="clearData()">{{ loading ? 'Clearing.....' : 'Clear Data' }}
                        </el-button>
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
    name: 'CreateFaq',
    data(){
        return{
            loading: false,
            form: {
                title: '',
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
        },
        createFaq: async function(){
            this.loading = true
            Api().post('/admin/create-faq', this.form)
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
    }
}
</script>