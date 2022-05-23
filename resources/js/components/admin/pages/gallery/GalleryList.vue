<template>
    <div id="gallery_list">
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">Galllery Table</h2>
              <p> All the listed galleries in school </p>
              <div class="row">
                <!-- Small table -->
                <!-- simple table -->
                <div class="col-md-12 my-4">
                  <div class="card shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <router-link :to="{name: 'CreateGallery'}">
                                <el-button type="primary" icon="el-icon-plus" size="mini" class="mb-2"> 
                                    Create Gallery</el-button>
                            </router-link>
                            <p class="card-text d-flex justify-content-end">Search Input.</p>
                        </div>
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Date Created</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(gallery, index) in galleries" :key="gallery.id">
                            <td><small>{{ index+1 }}</small></td>
                            <td><small>{{ gallery.category.name }}</small></td>
                            <td>
                                <small>
                                    <img :src="fileLink(gallery.image)" alt="" style="width:40px;height:40px">
                                </small>
                            </td>
                            <td><small>{{ gallery.created_at | time }}</small></td>
                            <td>
                                <small>
                                    <router-link :to="`/admin/edit-gallery/${gallery.id}`">
                                        <i class="fe fe-edit-2 fe-16" style="color:green;cursor:pointer"></i>
                                    </router-link>
                                    <i class="fe fe-trash-2 fe-16" style="color:red;cursor:pointer"
                                    @click.prevent="deleteGallery(gallery.id)" ></i>
                                </small>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <Page :total="pageInfo.total" size="small" :current="pageInfo.current_page" 
                            :page-size="parseInt(pageInfo.per_page)" v-if="pageInfo" @on-change="getAllGalleries" />
                    </div>
                  </div>
                </div> <!-- simple table -->
              </div> <!-- end section -->
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
      </main> <!-- main -->
    </div>
</template>

<script>
import Api from '../../../../apis/admin/Api'
export default {
    name: 'GalleryList',
    data(){
        return{
            total: 10,
            pageInfo: null,
            galleries: [],
            errors: {}
        }
    },
    methods: {
        fileLink(name){
            return '/uploads/img/gallery/' + name
        },
        getAllGalleries: async function(page = 1){
            Api().get(`/admin/gallery?page=${page}&total=${this.total}`)
                .then(response => {
                    this.galleries = response.data.galleries.data
                    this.pageInfo = response.data.galleries
                })
        },
        deleteGallery(id){
          Api().delete('/admin/delete-gallery/'+id)
            .then(() => {
              this.getAllGalleries()
            })
        }
    },
    computed: {},
    created(){
        this.getAllGalleries()
    }
}
</script>