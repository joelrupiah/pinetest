<template>
    <div id="create_admin_about_history">
                <div class="page-inner">
                    <div class="page-title">
                        <h3 class="breadcrumb-header">Create Pinecrest History</h3>
                    </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <div id="rootwizard">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#tab1" data-toggle="tab"><i class="fa fa-user m-r-xs"></i>Home Page</a></li>
                                        </ul>
                                        <div class="progress progress-sm m-t-sm">
                                            <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                            </div>
                                        </div>
                                        <form id="wizardForm">
                                            <div class="tab-content">
                                                <div class="tab-pane active fade in" id="tab1">
                                                    <div class="row m-b-lg">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="form-group col-md-3">
                                                                    <label for="heading">Heading</label>
                                                                    <input type="text" class="form-control" 
                                                                    v-model="form.heading" name="heading" id="heading" placeholder="Input Small Heading">
                                                                    <p class="text-danger text-sm" v-if="errors.heading">
                                                                        {{ errors.heading[0] }}
                                                                    </p>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label>Year</label>
                                                                    <el-date-picker
                                                                        v-model="form.year"
                                                                        type="year"
                                                                        placeholder="Pick a year">
                                                                    </el-date-picker>
                                                                    <p class="text-danger text-sm" v-if="errors.year">
                                                                        {{ errors.year[0] }}
                                                                    </p>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="headingYear">Heading Year</label>
                                                                    <input type="text" class="form-control" 
                                                                    v-model="form.headingYear" name="headingYear" id="headingYear" placeholder="Input Small Heading">
                                                                    <p class="text-danger text-sm" v-if="errors.headingYear">
                                                                        {{ errors.headingYear[0] }}
                                                                    </p>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label>First Description</label>
                                                                    <ckeditor :editor="editor" v-model="form.firstDescription" :config="editorConfig">
                                                                    </ckeditor>
                                                                    <p class="text-danger text-sm" v-if="errors.firstDescription">
                                                                        {{ errors.firstDescription[0] }}
                                                                    </p>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label>Last Description</label>
                                                                    <ckeditor :editor="editor" v-model="form.lastDescription" :config="editorConfig">
                                                                    </ckeditor>
                                                                    <p class="text-danger text-sm" v-if="errors.lastDescription">
                                                                        {{ errors.lastDescription[0] }}
                                                                    </p>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="image">Photo</label>
                                                                    <input type="file" class="form-control" name="image" id="image" 
                                                                    @change="loadImage($event)" placeholder="Pick an image" >
                                                                    <p class="text-danger text-sm" v-if="errors.image">
                                                                        {{ errors.image[0] }}
                                                                    </p>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Image Preview</label>
                                                                    <img :src="form.image" class="form-control" alt="" style="width:100px;height:100px">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="pager wizard">
                                                    <li class="previous">
                                                        <a href="#" class="btn btn-danger btn-xs"
                                                        @click.prevent="clear" >
                                                            Clear Content
                                                        </a>
                                                    </li>
                                                    <li class="next">
                                                        <a href="#" class="btn btn-default btn-success btn-xs text-white"
                                                        @click.prevent="createAboutHistory" >
                                                            Submit Content
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->

                </div><!-- /Page Inner -->
    </div>
</template>

<script>
import Api from '../../../../apis/admin/Api'
import ClassicEditor from '@ckeditor/ckeditor5-build-classic'
export default {
    name: 'CreateAdminAboutHistory',
    data(){
        return {
            form: {
                heading: '',
                year: '',
                headingYear: '',
                firstDescription: '',
                lastDescription: '',
                image: ''
            },
            errors: {},
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
        clear(){
            this.form.heading = '',
            this.form.year = '',
            this.form.headingYear = '',
            this.form.firstDescription = '',
            this.form.lastDescription = '',
            this.form.image = ''
        },
        createAboutHistory: async function(){
            Api().post('/admin/create-about-history', this.form)
                .then(() => {})
                .catch((error) => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors
                    }
                })
        }
    },
    computed: {},
    created(){}
}
</script>