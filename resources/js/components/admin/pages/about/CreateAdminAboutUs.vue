<template>
    <div id="admin_about_us">
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Create About</h4>
						</div>
						<div class="widget-inner">
							<form class="edit-profile m-b30">
								<div class="row">
									<div class="col-12">
										<div class="ml-auto">
											<h3>1. About Page</h3>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Heading</label>
										<div>
											<input class="form-control" v-model="form.heading" type="text" value="Input header">
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Description</label>
										<div>
                                            <ckeditor :editor="editor" v-model="form.description" :config="editorConfig">
                                            </ckeditor>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Header One</label>
										<div>
											<input class="form-control" v-model="form.headerOne" type="text" value="Input Header One">
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Header Two.</label>
										<div>
											<input class="form-control" v-model="form.headerTwo" type="text" value="Input Header Two">
										</div>
									</div>
                                    <div class="form-group col-6">
										<label class="col-form-label">Header Three.</label>
										<div>
											<input class="form-control" v-model="form.headerThree" type="text" value="Input Header Three">
										</div>
									</div>
                                    <div class="form-group col-6">
										<label class="col-form-label">Header Four.</label>
										<div>
											<input class="form-control" v-model="form.headerFour" type="text" value="Input Header Four">
										</div>
									</div>

                                    <div class="form-group col-6">
										<label class="col-form-label">First Description.</label>
										<div>
                                            <ckeditor :editor="editor" v-model="form.descriptionOne" :config="editorConfig">
                                            </ckeditor>
										</div>
									</div>
                                    <div class="form-group col-6">
										<label class="col-form-label">Second Description.</label>
										<div>
                                            <ckeditor :editor="editor" v-model="form.descriptionTwo" :config="editorConfig">
                                            </ckeditor>
										</div>
									</div>
                                    <div class="form-group col-6">
										<label class="col-form-label">Third Description.</label>
										<div>
                                            <ckeditor :editor="editor" v-model="form.descriptionThree" :config="editorConfig">
                                            </ckeditor>
										</div>
									</div>
                                    <div class="form-group col-6">
										<label class="col-form-label">Fourth Description.</label>
										<div>
                                            <ckeditor :editor="editor" v-model="form.descriptionFour" :config="editorConfig">
                                            </ckeditor>
										</div>
									</div>

                                    <div class="col-12">
										<div class="ml-auto">
											<h3>2. Our Story</h3>
										</div>
									</div>

                                    <div class="form-group col-12">
										<label class="col-form-label">Description</label>
										<div>
                                            <ckeditor :editor="editor" v-model="form.descriptionFive" :config="editorConfig">
                                            </ckeditor>
										</div>
									</div>

                                    <div class="form-group col-3">
										<label class="col-form-label">Image</label>
										<div>
											<input class="form-control" type="file" value="Select Image"
                                            @change="loadImage($event)">
										</div>
									</div>

                                    <div class="form-group col-3">
										<label class="col-form-label">Image Preview</label>
										<div>
											<img :src="form.image" alt="">
										</div>
									</div>

									<div class="form-group col-6">
										<label class="col-form-label">Input Video Link</label>
											<div>
												<input class="form-control" type="text"
												v-model="form.video" placeholder="Input video link">
											</div>
									</div>

									<div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>

									<div class="col-12">
										<el-button type="warning" size="mini"
										@click.prevent="submit" >Create</el-button>
										<el-button type="secondary" size="mini"
										@click.prevent="clear" >Clear</el-button>
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
    name: 'CreateAdminAboutUs',
    data(){
        return {
            form: {
                heading: '',
                description: '',
                headerOne: '',
                headerTwo: '',
                headerThree: '',
                headerFour: '',
                descriptionOne: '',
                descriptionTwo: '',
                descriptionThree: '',
                descriptionFour: '',
                descriptionFive: '',
                image: '',
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
            this.form.headerOne = '',
            this.form.headerTwo = '',
            this.form.headerThree = '',
            this.form.headerFour = '',
            this.form.descriptionOne = '',
            this.form.descriptionTwo = '',
            this.form.descriptionThree = '',
            this.form.descriptionFour = '',
            this.form.descriptionFive = '',
            this.form.image = ''
        },
        loadImage(e){
            let file = e.target.files[0]
            let reader = new FileReader()

            reader.onload = e => {
                this.form.image = e.target.result
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