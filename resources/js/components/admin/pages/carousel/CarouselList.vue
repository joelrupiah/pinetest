<template>
    <div id="carousel_list">
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">Carousel Table</h2>
              <p> All the listed carousel in school </p>
              <div class="row">
                <!-- Small table -->
                <!-- simple table -->
                <div class="col-md-12 my-4">
                  <div class="card shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <router-link :to="{name: 'CreateCarousel'}">
                                <el-button type="primary" icon="el-icon-plus" size="mini" class="mb-2"> 
                                    Create Carousel</el-button>
                            </router-link>
                            <p class="card-text d-flex justify-content-end">Search Input.</p>
                        </div>
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Carousel Title</th>
                            <th>Carousel Image</th>
                            <th>Date Created</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(carousel, index) in carousels" :key="carousel.id">
                            <td><small>{{ index+1 }}</small></td>
                            <td><small>{{ carousel.title }}</small></td>
                            <td>
                                <small>
                                    <img :src="fileLink(carousel.image)" alt="" style="width:40px;height:40px">
                                </small>
                            </td>
                            <td><small>{{ carousel.created_at | time }}</small></td>
                            <td>
                                <small>
                                    <router-link :to="`/api/admin/edit-carousel/${carousel.id}`">
                                        <i class="fe fe-edit-2 fe-16" style="color:green;cursor:pointer"></i>
                                    </router-link>
                                    <i class="fe fe-trash-2 fe-16" style="color:red;cursor:pointer"></i>
                                </small>
                            </td>
                          </tr>
                        </tbody>
                      </table>
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
    name: 'CarouselList',
    data(){
        return {
            carousels: []
        }
    },
    methods: {
        fileLink(name){
            return '/uploads/img/carousel/' + name
        },
        getAdminCarousels: async function(){
            Api().get('/admin/get-admin-carousels')
                .then((response) => {
                    this.carousels = response.data.carousels
                })
        }
    },
    computed: {},
    created() {
        this.getAdminCarousels()
    }
}
</script>