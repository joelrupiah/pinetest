<template>
    <div id="create_gallery">
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
											<img :src="form.image" alt="">
										</div>
									</div>

									<div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
									
									<div class="col-12">
                                        <el-button type="success" :loading="loading" size="mini" 
                                            @click.prevent="createGallery()">{{ loading ? 'Creating.....' : 'Create Gallery' }}
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
export default {
    name: 'CreateGallery',
    data(){
        return{
            loading: false,
            grades: [],
            galleries: [],
            gallery: {},
            form: {
                grade_id: '',
                image: ''
            },
            errors: {}
        }
    },
    methods: {
        clearData(){
            this.form.grade_id = ''
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
        getAllGrades: async function(){
            Api().get('/admin/grade')
                .then(response => {
                    this.grades = response.data.grades
                })
        },
        createGallery: async function(){
            this.loading = true
            Api().post('/admin/gallery', this.form)
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
        this.getAllGrades()
    }
}
</script>