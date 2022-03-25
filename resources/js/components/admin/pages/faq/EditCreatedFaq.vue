<template>
    <div id="edit_created_faq">
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">Update Created Faq</h2>
              <p class="text-muted mb-1">Form for updating created faq content.</p>
              <div class="card shadow mb-4">
                <div class="card-header">
                  <strong class="card-title">Update Created Faq Content</strong>
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
                            @click.prevent="updateFaq()">{{ loading ? 'Updating faq.....' : 'Update Faq' }}
                        </el-button>
                        <el-button type="danger" size="mini" 
                            @click.prevent="clearData()">Clear Data
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
    name: 'EditCreatedFaq',
    data(){
        return {
            loading: false,
            adminfaq: {},
            form: {
                id: '',
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
        getAdminFaq: async function(){
            Api().get('/admin/get-admin-faq/'+this.$route.params.id)
                .then((response) => {
                    const this_ = this
                    this.form.id = response.data.adminfaq.id
                    this.form.title = response.data.adminfaq.title
                    this.form.description = response.data.adminfaq.description
                })
        },
        updateFaq: async function(){
            this.loading = true
            Api().post('/admin/update-admin-faq/'+this.$route.params.id, this.form)
                .then(() => {
                    this.loading = false
                })
                .catch(error => {
                    this.loading = false
                })
        }
    },
    computed: {},
    created() {
        this.getAdminFaq()
    }
}
</script>