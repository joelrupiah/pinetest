<template>
    <div id="edit_gallery">
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Create Gallery</h4>
						</div>
						<div class="widget-inner">
							<form class="edit-profile m-b30">
								<div class="row">
									<div class="col-12">
										<div class="ml-auto">
											<h3>1. Home Page</h3>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Select Grade</label>
										<div>
											<el-select v-model="form.grade_id" placeholder="Select Grade"
                                                    size="mini" style="width:100%" >
                                                    <el-option 
                                                        v-for="grade in grades"
                                                        :value="grade.id" 
                                                        :label="grade.name"
                                                        :key="grade.id">
                                                        {{ grade.name }}
                                                    </el-option>
                                            </el-select>
										</div>
									</div>
                                    <div class="form-group col-3">
										<label class="col-form-label">Select Image</label>
										<div>
											<input type="file" @change="loadImage($event)">
										</div>
									</div>
                                    <div class="form-group col-3">
										<label class="col-form-label">Image Preview</label>
										<div>
											<img :src="fileLink(form.image)" alt="">
										</div>
									</div>

                                    <div class="form-group col-12">
                                        <label class="col-form-label">Image Description</label>
                                        <div>
											<ckeditor :editor="editor" v-model="form.description" :config="editorConfig">
                                            </ckeditor>
                                        </div>
                                    </div>

									<div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
									
									<div class="col-12">
                                        <el-button type="success" :loading="loading" size="mini" 
                                            @click.prevent="update()">{{ loading ? 'Updating.....' : 'Update Gallery' }}
                                        </el-button>
                                        <el-button type="danger" size="mini" @click.prevent="clearData()">Clear</el-button>
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
    name: 'EditGallery',
    data(){
        return {
            about: {},
            grades: [],
            loading: false,
            form: {
                id: '',
                grade_id: '',
                image: '',
                description: ''
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
                return '/uploads/img/gallery/' + name
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
        getAllGrades: async function(){
            Api().get('/admin/grade')
                .then(response => {
                    this.grades = response.data.grades
                })
        },
        getGallery: async function(){
            Api().get('/admin/get-gallery/'+this.$route.params.id)
                .then(response => {
                    const this_ = this
                    this.form.id = response.data.gallery.id
                    this.form.grade_id = response.data.gallery.grade_id
                    this.form.image = response.data.gallery.image
                    this.form.description = response.data.gallery.description
                })
        },
        update: async function(){
            Api().post('/admin/edit-gallery/'+this.$route.params.id, this.form)
                .then(() => {
                    this.loading = false
                })
                .catch(error => {})
        }
    },
    computed:{},
    mounted(){
        this.getGallery()
        this.getAllGrades()
    }
}
</script>