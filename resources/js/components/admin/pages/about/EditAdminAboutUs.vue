<template>
    <div id="edit_admin_about_us">
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Edit About</h4>
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

                                    <div class="form-group col-6">
										<label class="col-form-label">Image</label>
										<div>
											<input class="form-control" type="file" value="Select Image"
                                            @change="loadImage($event)">
										</div>
									</div>

                                    <div class="form-group col-6">
										<label class="col-form-label">Image Preview</label>
										<div>
											<img :src="fileLink(form.image)" alt="" style="width:100px;height:100px">
										</div>
									</div>

									<div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>

									<div class="col-12">
										<button type="reset" class="btn" @click.prevent="update">
                                            Save changes</button>
										<button type="reset" class="btn-secondry">
                                            Cancel</button>
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
    name: 'EditAdminAboutUs',
    data(){
        return {
            about: {},
            form: {
                id: '',
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
                image: ''
            },
            errors: {},
            editor: ClassicEditor,
            editorConfig: {
            }
        }
    },
    methods:{
        fileLink(name){
            if (name != null && name.length < 256) {
                return '/uploads/img/about/' + name
            }else {
                return this.form.image
            }
                
        },
        loadImage(e){
            let file = e.target.files[0]
            let reader = new FileReader()

            reader.onload = e => {
                this.form.image = e.target.result
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
                    this.form.headerOne = response.data.about.headerOne
                    this.form.headerTwo = response.data.about.headerTwo
                    this.form.headerThree = response.data.about.headerThree
                    this.form.headerFour = response.data.about.headerFour
                    this.form.descriptionOne = response.data.about.descriptionOne
                    this.form.descriptionTwo = response.data.about.descriptionTwo
                    this.form.descriptionThree = response.data.about.descriptionThree
                    this.form.descriptionFour = response.data.about.descriptionFour
                    this.form.descriptionFive = response.data.about.descriptionFive
                    this.form.image = response.data.about.image
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