<template>
    <div id="admin_event">
        <main class="ttr-wrapper">
              <div class="content">
    
                <div class="container">
                <h5 class="mb-1">Events Table</h5>
                <router-link :to="{name: 'CreateEvent'}">
                    <el-button type="primary" icon="el-icon-plus" size="mini" class="mb-2"> 
                        Create Events</el-button>
                </router-link>
                
                <div class="table-responsive">

                    <table class="table table-striped custom-table">
                    <thead>
                        <tr>
                        <th scope="col"><small class="d-block"><strong>#</strong></small></th>
                        <th scope="col"><small class="d-block"><strong>Event Title</strong></small></th>
                        <th scope="col"><small class="d-block"><strong>Date Asked</strong></small></th>
                        <th scope="col"><small class="d-block"><strong>Actions</strong></small></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr scope="row" v-for="(event, index) in events" :key="event.id">
                                <td>
                                    <small class="d-block">{{ index+1 }}</small>
                                </td>
                                <td>
                                    <small class="d-block">{{ event.title }}</small>
                                </td>
                                <td>
                                    <small class="d-block">{{ event.created_at | time }}</small>
                                </td>
                                <td>
                                    <small class="d-block">
                                        <router-link :to="`/api/admin/edit-event/${event.id}`">
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
    name: 'EventList',
    data(){
        return {
            events: []
        }
    },
    methods: {
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