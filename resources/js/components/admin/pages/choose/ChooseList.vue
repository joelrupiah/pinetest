<template>
    <div id="choose_list">
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">Choose Data Table</h2>
              <p> All the listed choose data in school </p>
              <div class="row">
                <!-- Small table -->
                <!-- simple table -->
                <div class="col-md-12 my-4">
                  <div class="card shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <router-link :to="{name: 'CreateChoose'}">
                                <el-button type="primary" icon="el-icon-plus" size="mini" class="mb-2"> 
                                    Create Choose Data</el-button>
                            </router-link>
                            <p class="card-text d-flex justify-content-end">Search Input.</p>
                        </div>
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Date Created</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(choose, index) in chooses" :key="choose.id">
                            <td><small>{{ index+1 }}</small></td>
                            <td><small>{{ choose.title }}</small></td>
                            <td>
                                <small>
                                    <img :src="fileLink(choose.image)" alt="" style="width:40px;height:40px">
                                </small>
                            </td>
                            <td><small>{{ choose.description }}</small></td>
                            <td><small>{{ choose.created_at | time }}</small></td>
                            <td>
                                <small>
                                    <router-link :to="`/api/admin/edit-choose/${choose.id}`">
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
      </main>
    </div>
</template>

<script>
import Api from '../../../../apis/admin/Api'
export default {
    name: 'ChooseList',
    data(){
        return {
            chooses: []
        }
    },
    methods: {
      fileLink(name){
        return '/uploads/img/choose/' + name
      },
      getChooses: async function(){
          Api().get('/admin/get-admin-chooses')
              .then((response) => {
                  this.chooses = response.data.chooses
              })
      }
    },
    computed: {},
    created(){
        this.getChooses()
    }
}
</script>