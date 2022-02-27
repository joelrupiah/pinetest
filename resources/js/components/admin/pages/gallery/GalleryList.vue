<template>
    <div id="grade_list">
        <main class="ttr-wrapper">
              <div class="content">
    
                <div class="container">
                <h5 class="mb-1">Gallery Table</h5>
                <router-link :to="{name: 'CreateGallery'}">
                    <el-button type="primary" icon="el-icon-plus" size="mini" class="mb-2"> 
                        Create Gallery</el-button>
                </router-link>
                
                <div class="table-responsive">

                    <table class="table table-striped custom-table">
                    <thead>
                        <tr>
                        <th scope="col"><small class="d-block"><strong>#</strong></small></th>
                        <th scope="col"><small class="d-block"><strong>Grade Name</strong></small></th>
                        <th scope="col"><small class="d-block"><strong>Image</strong></small></th>
                        <th scope="col"><small class="d-block"><strong>Date Created</strong></small></th>
                        <th scope="col"><small class="d-block"><strong>Actions</strong></small></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr scope="row" v-for="(gallery, index) in galleries" :key="gallery.id">
                                <td>
                                    <small class="d-block">{{ index+1 }}</small>
                                </td>
                                <td>
                                    <small class="d-block">{{ gallery.grade.name }}</small>
                                </td>
                                <td>
                                    <small class="d-block">
                                        <img :src="fileLink(gallery.image)" alt="" style="width:40px;height:40px">
                                    </small>
                                </td>
                                <td>
                                    <small class="d-block">{{ gallery.created_at | time }}</small>
                                </td>
                                <td>
                                    <small class="d-block">
                                        <router-link :to="`/api/admin/edit-gallery/${gallery.id}`">
                                            <i class="el-icon-edit" style="color:green;cursor:pointer"></i>
                                        </router-link>
                                        <i class="el-icon-delete" style="color:red;cursor:pointer"></i>
                                    </small>
                                </td>
                        
                        </tr>
                        
                    </tbody>
                    </table>
                </div>

                </div>

            </div>
        </main>

    </div>
</template>

<script>
import Api from '../../../../apis/admin/Api'
export default {
    name: 'GalleryList',
    data(){
        return{
            galleries: [],
            errors: {}
        }
    },
    methods: {
        fileLink(name){
            return '/uploads/img/gallery/' + name
        },
        getAllGalleries: async function(){
            Api().get('/admin/gallery')
                .then(response => {
                    this.galleries = response.data.galleries
                })
        },
    },
    computed: {},
    created(){
        this.getAllGalleries()
    }
}
</script>