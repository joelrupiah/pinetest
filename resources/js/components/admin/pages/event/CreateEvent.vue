<template>
    <div id="create_event">
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
											<h3>1. Event Data</h3>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Title</label>
										<div>
											<input class="form-control" type="text"
                                            v-model="form.title" >
										</div>
									</div>
									<div class="form-group col-3">
										<label class="col-form-label">Image</label>
										<div>
											<input class="form-control" type="file"
                                            @change="loadImage($event)" >
										</div>
									</div>
                                    <div class="form-group col-3">
										<label class="col-form-label">Image Preview</label>
										<div>
											<img :src="form.image" alt="">
										</div>
									</div>

                                    <div class="form-group col-6">
										<label class="col-form-label">Start Date</label>
										<div>
											<el-date-picker
                                                v-model="form.start_date"
                                                type="date"
                                                placeholder="Pick a day">
                                            </el-date-picker>
										</div>
									</div>
                                    <div class="form-group col-6">
										<label class="col-form-label">End Date</label>
										<div>
											<el-date-picker
                                                v-model="form.end_date"
                                                type="date"
                                                placeholder="Pick a day">
                                            </el-date-picker>
										</div>
									</div>

                                    <div class="form-group col-12">
										<label class="col-form-label">Main Description</label>
										<div>
											<ckeditor :editor="editor" v-model="form.description" :config="editorConfig">
                                            </ckeditor>
										</div>
									</div>

                                    <div class="form-group col-6">
										<label class="col-form-label">Start Time</label>
										<div>
											<el-time-select
                                                v-model="form.start_time"
                                                :picker-options="{
                                                    start: '08:30',
                                                    step: '00:15',
                                                    end: '18:30'
                                                }"
                                                placeholder="Select time">
                                            </el-time-select>
										</div>
									</div>
                                    <div class="form-group col-6">
										<label class="col-form-label">End Time</label>
										<div>
											<el-time-select
                                                v-model="form.end_time"
                                                :picker-options="{
                                                    start: '08:30',
                                                    step: '00:15',
                                                    end: '18:30'
                                                }"
                                                placeholder="Select time">
                                            </el-time-select>
										</div>
									</div>

                                    <div class="form-group col-12">
										<label class="col-form-label">Event Description</label>
										<div>
											<ckeditor :editor="editor" v-model="form.eventDescription" :config="editorConfig">
                                            </ckeditor>
										</div>
									</div>

                                    <div class="form-group col-12">
										<label class="col-form-label">Event Content</label>
										<div>
											<ckeditor :editor="editor" v-model="form.eventContent" :config="editorConfig">
                                            </ckeditor>
										</div>
									</div>

                                    <div class="form-group col-6">
										<label class="col-form-label">Topics</label>
										<div>
											<input class="form-control" type="text"
                                            v-model="form.topics" >
										</div>
									</div>
                                    <div class="form-group col-6">
										<label class="col-form-label">Host</label>
										<div>
											<input class="form-control" type="text"
                                            v-model="form.host" >
										</div>
									</div>

                                    <div class="form-group col-6">
										<label class="col-form-label">Location</label>
										<div>
											<input class="form-control" type="text"
                                            v-model="form.location" >
										</div>
									</div>
                                    <div class="form-group col-6">
										<label class="col-form-label">Students</label>
										<div>
											<input class="form-control" type="text"
                                            v-model="form.students" >
										</div>
									</div>
                                    <div class="form-group col-6">
										<label class="col-form-label">Assessments</label>
										<div>
											<input class="form-control" type="text"
                                            v-model="form.assessments" >
										</div>
									</div>

									<div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>

									<div class="col-12">
                                        <el-button type="warning" :loading="loading" size="mini" 
                                            @click.prevent="createEvent()">{{ loading ? 'Creating event.....' : 'Create Event' }}
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
    name: 'CreateEvent',
    data(){
        return{
            loading: false,
            form: {
                title: '',
                image: '',
                start_date: '',
                end_date: '',
                description: '',
                start_time: '',
                end_time: '',
                eventDescription: '',
                eventContent: '',
                topics: '',
                host: '',
                location: '',
                students: '',
                assessments: ''

            },
            errors: {},
            editor: ClassicEditor,
            editorConfig: {
            }
        }
    },
    methods: {
        clearData(){
            this.form.title = '',
                this.form.image = '',
                this.form.start_date = '',
                this.form.end_date = '',
                this.form.description = '',
                this.form.start_time = '',
                this.form.end_time = '',
                this.form.eventDescription ='',
                this.form.eventContent ='',
                this.form.topics = '',
                this.form.host ='',
                this.form.location = '',
                this.form.students = '',
                this.form.assessments = ''
        },
        loadImage(e){
            let file = e.target.files[0]
            let reader = new FileReader()

            reader.onload = e => {
                this.form.image = e.target.result
            }

            reader.readAsDataURL(file)
        },
        createEvent: async function(){
            this.loading = true
            Api().post('/admin/create-event', this.form)
                .then(() => {
                    this.loading = false
                    // this.clearData()
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