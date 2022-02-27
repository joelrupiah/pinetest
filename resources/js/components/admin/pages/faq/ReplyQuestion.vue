<template>
    <div id="edit_created_faq">
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Question</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Question</li>
				</ul>
			</div>	
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Reply to Question</h4>
						</div>
						<div class="widget-inner">
							<div class="card-courses-list bookmarks-bx">
								<div class="card-courses-media">
									<img src="/backend/assets/images/black.jpg" alt=""/>
								</div>
								<div class="card-courses-full-dec">
									<div class="card-courses-title">
										<h4 class="m-b5">{{ askedQuestion.name }}</h4>
									</div>
									<div class="card-courses-list-bx">
										<ul class="card-courses-view">
											<li class="card-courses-categories">
												<h4>{{ askedQuestion.subject }}</h4>
											</li>
										</ul>
									</div>
									<div class="row card-courses-dec">
										<div class="col-md-12">
											<p v-html="askedQuestion.message"></p>	
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Your Profile Views Chart END-->
			</div>
		</div>


		<div class="container-fluid">
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Reply Question</h4>
						</div>
						<div class="widget-inner">
							<form class="edit-profile m-b30">
								<div class="row">
                                    <div class="form-group col-12">
										<label class="col-form-label">Reply Content</label>
										<div>
											<ckeditor :editor="editor" v-model="form.message" :config="editorConfig">
                                            </ckeditor>
										</div>
									</div>

									<div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>

									<div class="col-12">
                                        <el-button type="warning" :loading="loading" size="mini" 
                                            @click.prevent="replyQuestion()">{{ loading ? 'Submitting Response.....' : 'Submit Response' }}
                                        </el-button>
                                        <el-button type="danger" size="mini" 
                                            @click.prevent="clearData()">Clear Data
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
    name: 'ReplyQuestion',
    data(){
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
        getAdminQuestion: async function(){
            Api().get('/admin/get-asked-question/'+this.$route.params.id)
                .then((response) => {
                    this.askedQuestion = response.data.askedQuestion
                    this.form.id = response.data.askedQuestion.id
                })
        },
        replyQuestion: async function(){
            this.loading = true
            Api().post('/admin/reply-asked-question/'+this.$route.params.id, this.form)
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