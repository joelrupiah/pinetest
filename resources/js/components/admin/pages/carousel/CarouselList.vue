<template>
    <div id="carousel_list">
        <main class="ttr-wrapper">
              <div class="content">
    
                <div class="container">
                <h5 class="mb-1">Carousels Table</h5>
                <router-link :to="{name: 'CreateCarousel'}">
                    <el-button type="primary" icon="el-icon-plus" size="mini" class="mb-2"> 
                        Create Carousels</el-button>
                </router-link>
                
                <div class="table-responsive">

                    <table class="table table-striped custom-table">
                    <thead>
                        <tr>
                        <th scope="col"><small class="d-block"><strong>#</strong></small></th>
                        <th scope="col"><small class="d-block"><strong>Carousel Title</strong></small></th>
                        <th scope="col"><small class="d-block"><strong>Carousel Image</strong></small></th>
                        <th scope="col"><small class="d-block"><strong>Date Asked</strong></small></th>
                        <th scope="col"><small class="d-block"><strong>Actions</strong></small></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr scope="row" v-for="(carousel, index) in carousels" :key="carousel.id">
                                <td>
                                    <small class="d-block">{{ index+1 }}</small>
                                </td>
                                <td>
                                    <small class="d-block">{{ carousel.title }}</small>
                                </td>
                                <td>
                                    <small class="d-block">
                                        <img :src="fileLink(carousel.image)" alt="" style="width:40px;height:40px">
                                    </small>
                                </td>
                                <td>
                                    <small class="d-block">{{ carousel.created_at | time }}</small>
                                </td>
                                <td>
                                    <small class="d-block">
                                        <router-link :to="`/api/admin/edit-carousel/${carousel.id}`">
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