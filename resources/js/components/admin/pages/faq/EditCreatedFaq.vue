<template>
    <div id="edit_created_faq">
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Create Faqs</h4>
						</div>
						<div class="widget-inner">
							<form class="edit-profile m-b30">
								<div class="row">
									<div class="col-12">
										<div class="ml-auto">
											<h3>1. Faq Page</h3>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Faq Question</label>
										<div>
											<ckeditor :editor="editor" v-model="form.title" :config="editorConfig">
                                            </ckeditor>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Faq Answer</label>
										<div>
											<ckeditor :editor="editor" v-model="form.description" :config="editorConfig">
                                            </ckeditor>
										</div>
									</div>

									<div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>

									<div class="col-12">
                                        <el-button type="warning" :loading="loading" size="mini" 
                                            @click.prevent="updateFaq()">{{ loading ? 'Updating faq.....' : 'Update Faq' }}
                                        </el-button>
                                        <el-button type="danger" :loading="loading" size="mini" 
                                            @click.prevent="clearData()">{{ loading ? 'Clearing.....' : 'Clear Data' }}
                                        </el-button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- Your Profile Views Chart END-->
			</div>
		</div>
	</main>
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