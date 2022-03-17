<template>
    <div id="admin_event">
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">Events Table</h2>
              <p> All the listed events in school </p>
              <div class="row">
                <!-- Small table -->
                <!-- simple table -->
                <div class="col-md-12 my-4">
                  <div class="card shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <router-link :to="{name: 'CreateEvent'}">
                                <el-button type="primary" icon="el-icon-plus" size="mini" class="mb-2"> 
                                    Create Event</el-button>
                            </router-link>
                            <p class="card-text d-flex justify-content-end">Search Input.</p>
                        </div>
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Event Title</th>
                            <th>Image</th>
                            <th>Date Created</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(event, index) in events" :key="event.id">
                            <td><small>{{ index+1 }}</small></td>
                            <td><small>{{ event.title }}</small></td>
                            <td>
                                <small>
                                    <img :src="fileLink(event.image)" alt="" style="width:40px;height:40px">
                                </small>
                            </td>
                            <td><small>{{ event.created_at | time }}</small></td>
                            <td>
                                <small>
                                    <router-link :to="`/api/admin/edit-event/${event.id}`">
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
    name: 'EventList',
    data(){
        return {
            events: []
        }
    },
    methods: {
        fileLink(name){
            return '/uploads/img/event/' + name
        },
        getAdminEvents: async function(){
            Api().get('/admin/get-admin-events')
                .then((response) => {
                    this.events = response.data.events
                })
        }
    },
    computed: {},
    created() {
        this.getAdminEvents()
    }
}
</script>