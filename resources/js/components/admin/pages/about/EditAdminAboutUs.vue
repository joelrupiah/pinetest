<template>
    <div id="edit_admin_about_us">
        <!-- {{ this.$route.params.id }} -->
                <div class="page-inner">
                    <div class="page-title">
                        <h3 class="breadcrumb-header">Pinecrest About Content</h3>
                    </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <div id="rootwizard">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#tab1" data-toggle="tab"><i class="fa fa-user m-r-xs"></i>Home Page</a></li>
                                            <li role="presentation"><a href="#tab2" data-toggle="tab"><i class="fa fa-truck m-r-xs"></i>Main About Page</a></li>
                                        </ul>
                                        <div class="progress progress-sm m-t-sm">
                                            <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                            </div>
                                        </div>
                                        <form id="wizardForm" enctype="multipart/form-data">
                                            <div class="tab-content">
                                                <div class="tab-pane active fade in" id="tab1">
                                                    <div class="row m-b-lg">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="heading">Heading</label>
                                                                    <input type="text" class="form-control" 
                                                                    v-model="form.heading" name="heading" id="heading" placeholder="Input Small Heading">
                                                                    <p class="text-danger text-sm" v-if="errors.heading">
                                                                        {{ errors.heading[0] }}
                                                                    </p>
                                                                </div>
                                                                <div class="form-group  col-md-6">
                                                                    <label for="smallText">Text</label>
                                                                    <input type="text" class="form-control col-md-6" 
                                                                    v-model="form.smallText" name="smallText" id="smallText" placeholder="Input Small Text" >
                                                                    <p class="text-danger text-sm" v-if="errors.smallText">
                                                                        {{ errors.smallText[0] }}
                                                                    </p>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label>Description</label>
                                                                    <ckeditor :editor="editor" v-model="form.smallDescription" :config="editorConfig">
                                                                    </ckeditor>
                                                                    <p class="text-danger text-sm" v-if="errors.smallDescription">
                                                                        {{ errors.smallDescription[0] }}
                                                                    </p>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="imageOne">Photo</label>

                                                                    <input type="file" class="form-control" 
                                                                    name="imageOne" id="imageOne" @change="loadImageOne($event)">

                                                                    <p class="text-danger text-sm" v-if="errors.imageOne">
                                                                        {{ errors.imageOne[0] }}
                                                                    </p>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Image One Preview</label>
                                                                    <img :src="fileLinkOne(form.imageOne)" class="form-control" alt="" style="width:100px;height:100px">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tab2">
                                                    <div class="row">
                                                        <div class="row m-b-lg">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="form-group col-md-12">
                                                                    <label>Description</label>
                                                                    <ckeditor :editor="editor" v-model="form.mainDescription" :config="editorConfig">
                                                                    </ckeditor>
                                                                    <p class="text-danger text-sm" v-if="errors.mainDescription">
                                                                        {{ errors.mainDescription[0] }}
                                                                    </p>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="imageTwo">Photo</label>

                                                                    <input type="file" class="form-control" 
                                                                    name="imageTwo" id="imageTwo" @change="loadImageTwo($event)">

                                                                    <p class="text-danger text-sm" v-if="errors.imageTwo">
                                                                        {{ errors.imageTwo[0] }}
                                                                    </p>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Image Two Preview</label>
                                                                    <img :src="fileLinkTwo(form.imageTwo)" class="form-control" alt="" style="width:100px;height:100px">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <ul class="pager wizard">
                                                    <li class="previous"><a href="#" class="btn btn-danger btn-xs"
                                                    @click.prevent="clear" >Clear Content</a></li>
                                                    <li class="next"><a href="#" class="btn btn-default btn-success btn-xs text-white"
                                                    @click.prevent="update" >Update Content</a></li>
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
    name: 'EditAdminAboutUs',
    data(){
        return {
            about: {},
            form: {
                id: '',
                heading: '',
                smallText: '',
                smallDescription: '',
                mainDescription: '',
                imageOne: '',
                imageTwo: ''
            },
            errors: {},
            editor: ClassicEditor,
            editorConfig: {
            }
        }
    },
    methods:{
        fileLinkOne(name){
            if (name != null && name.length < 256) {
                return '/uploads/img/about/' + name
            }else {
                return this.form.imageOne
            }
                
        },
        fileLinkTwo(name){
            if (name != null && name.length < 256) {
                return '/uploads/img/about/' + name
            }else {
                return this.form.imageTwo
            }
                
        },
        loadImageOne(e){
            let file = e.target.files[0]
            let reader = new FileReader()

            reader.onload = e => {
                this.form.imageOne = e.target.result
            }

            reader.readAsDataURL(file)
            
        },
        loadImageTwo(e){
            let file = e.target.files[0]
            let reader = new FileReader()

            reader.onload = e => {
                this.form.imageTwo = e.target.result
            }

            reader.readAsDataURL(file)

        },
        getAboutData: async function(){
            Api().get('/admin/get-about-data/'+this.$route.params.id)
                .then((response) => {
                    const this_ = this
                    this.form.id = response.data.about.id
                    this.form.heading = response.data.about.heading
                    this.form.smallText = response.data.about.smallText
                    this.form.smallDescription = response.data.about.smallDescription
                    this.form.mainDescription = response.data.about.mainDescription
                    this.form.imageOne = response.data.about.imageOne
                    this.form.imageTwo = response.data.about.imageTwo
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