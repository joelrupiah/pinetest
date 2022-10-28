<template>
	<div id="create_gallery">
		<main role="main" class="main-content">
			<div class="container-fluid">
				<div class="row justify-content-center">
					<div class="col-12">
						<h2 class="page-title">Reply Message</h2>
						<p class="text-muted mb-1">Form for replying sent messages.</p>
						<div class="card shadow mb-4">
							<div class="card-header">
								<strong class="card-title">Reply Message</strong>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group mb-3">
											<label>Name</label>
											<el-input :placeholder="askedQuestion.name" disabled></el-input>
										</div>
									</div> <!-- /.col -->
									<div class="col-md-6">
										<div class="form-group mb-3">
											<label>Email</label>
											<el-input :placeholder="askedQuestion.email" disabled></el-input>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group mb-3">
											<label>Subject</label>
											<el-input type="textarea" :rows="2" :placeholder="askedQuestion.message"
												disabled>
											</el-input>
										</div>
									</div> <!-- /.col -->
									<div class="col-md-6">
										<div class="form-group mb-3">
											<label>Message</label>
											<el-input type="textarea" :rows="2" :placeholder="askedQuestion.subject"
												disabled>
											</el-input>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group mb-3">
											<label>Reply Content</label>
											<ckeditor :editor="editor" v-model="form.message" :config="editorConfig">
                                            </ckeditor>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group mb-3">
											<el-button type="warning" :loading="loading" size="mini"
												@click.prevent="replyQuestion()">{{ loading ? 'Submitting Response.....'
														: 'Submit Response'
												}}
											</el-button>
											<el-button type="danger" size="mini" @click.prevent="clearData()">Clear Data
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
	name: 'ReplyQuestion',
	data() {
		return {
			loading: false,
			askedQuestion: {},
			form: {
				id: '',
				message: ''
			},
			errors: {},
			editor: ClassicEditor,
			editorConfig: {
			}
		}
	},
	methods: {
		clearData(){
			this.form.id = '',
			this.form.message = ''
		},
		getAdminQuestion: async function () {
			Api().get('/admin/get-asked-question/' + this.$route.params.id)
				.then((response) => {
					this.askedQuestion = response.data.askedQuestion
					this.form.id = response.data.askedQuestion.id
				})
		},
		replyQuestion: async function () {
			this.loading = true
			Api().post('/admin/reply-asked-question/' + this.$route.params.id, this.form)
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
		this.getAdminQuestion()
	}
}
</script>