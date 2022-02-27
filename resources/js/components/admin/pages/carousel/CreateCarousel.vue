<template>
    <div id="create_carousel">
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

                                    <div class="form-group col-12">
										<label class="col-form-label">Main Description</label>
										<div>
											<ckeditor :editor="editor" v-model="form.description" :config="editorConfig">
                                            </ckeditor>
										</div>
									</div>

									<div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>

									<div class="col-12">
                                        <el-button type="warning" :loading="loading" size="mini" 
                                            @click.prevent="createCarousel()">{{ loading ? 'Creating carousel.....' : 'Create Carousel' }}
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
    name: 'CreateCarousel',
    data(){
        return {
            loading: false,
            form: {
                title: '',
                description: '',
                image: ''
            },
            editor: ClassicEditor,
            editorConfig: {
            }
        }
    },
    methods: {
        loadImage(e){
            let file = e.target.files[0]
            let reader = new FileReader()

            reader.onload = e => {
                this.form.image = e.target.result
            }

            reader.readAsDataURL(file)

        },
        createCarousel: async function(){
            this.loading = true
            Api().post('/admin/create-carousel', this.form)
                .then(() => {
                    this.loading = false
                })
                .catch((error) => {
                    this.loading = false
                })
        }
    },
    computed: {},
    created() {}
}
</script>