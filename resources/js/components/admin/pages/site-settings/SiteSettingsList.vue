<template>
    <div id="site_settings_list">
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">Site Settings Table</h2>
              <p> All the listed site settings </p>
              <div class="row">
                <!-- Small table -->
                <!-- simple table -->
                <div class="col-md-12 my-4">
                  <div class="card shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <router-link :to="{name: 'CreateSiteSetting'}">
                                <el-button type="primary" icon="el-icon-plus" size="mini" class="mb-2"> 
                                    Create Setting</el-button>
                            </router-link>
                            <p class="card-text d-flex justify-content-end">Search Input.</p>
                        </div>
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Date Created</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="sitesetting in sitesettings" :key="sitesetting.id">
                            <td><small>{{ sitesetting.id }}</small></td>
                            <td><small>{{ sitesetting.created_at | time }}</small></td>
                            <td>
                                <small>
                                    <router-link :to="`/admin/edit-site-setting/${sitesetting.id}`">
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
    name: 'SiteSettingsList',
    data(){
        return {
            sitesettings: []
        }
    },
    methods: {
        getSiteSettings: async function(){
            Api().get('/admin/get-site-settings')
                .then((response) => {
                    this.sitesettings = response.data.sitesettings
                })
        }
    },
    computed: {},
    created(){
        this.getSiteSettings()
    }
}
</script>