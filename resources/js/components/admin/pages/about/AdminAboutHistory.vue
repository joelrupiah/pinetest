<template>
    <div id="admin_about_history">
                <div class="page-inner">
                    <div class="page-title">
                        <h3 class="breadcrumb-header">Pinecrest History</h3>
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
                                                                    <label for="exampleInputName">Heading</label>
                                                                    <input type="text" class="form-control" 
                                                                    v-model="form.heading" name="exampleInputName" id="exampleInputName" placeholder="Input Small Heading">
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="exampleInputName">Year</label>
                                                                    <input type="text" class="form-control" 
                                                                    v-model="form.heading" name="exampleInputName" id="exampleInputName" placeholder="Input Small Heading">
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="exampleInputName">Heading Year</label>
                                                                    <input type="text" class="form-control" 
                                                                    v-model="form.headingYear" name="exampleInputName" id="exampleInputName" placeholder="Input Small Heading">
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="exampleInputEmail">First Description</label>
                                                                    <ckeditor :editor="editor" v-model="form.smallDescription" :config="editorConfig">
                                                                    </ckeditor>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="exampleInputEmail">Last Description</label>
                                                                    <ckeditor :editor="editor" v-model="form.mainDescription" :config="editorConfig">
                                                                    </ckeditor>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="exampleInputPassword1">Photo</label>
                                                                    <input type="password" class="form-control" name="exampleInputPassword1" id="exampleInputPassword1" placeholder="Password" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="pager wizard">
                                                    <li class="previous"><a href="#" class="btn btn-danger btn-xs">Clear Content</a></li>
                                                    <li class="next"><a href="#" class="btn btn-default btn-success btn-xs text-white">Submit Content</a></li>
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
    name: 'AdminAboutHistory',
    data(){
        return {
            form: {

            },
            editor: ClassicEditor,
            editorConfig: {
            }
        }
    }
}
</script>