<template>
    <div id="create_site_settings">
      <main role="main" class="main-content">
          <notifications group="sitesettings" class="mt-3" />
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">Create Setting</h2>
              <p class="text-muted mb-1">Form for creating site settings.</p>
              <div class="card shadow mb-4">
                <div class="card-header">
                  <strong class="card-title">Create Site Setting Content</strong>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <label for="site-email">Site Email e.g <small>info@pinecrestacademy.co.ke</small></label>
                            <Input v-model="form.site_email" id="site-email" placeholder="Input email..." style="width: 100%" />
                        <div>
                            <span class="help-block text-danger" v-if="errors.site_email"><small>{{ errors.site_email[0] }}</small></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <label for="select-grade">Site Phone e.g <small>+254700000000</small></label>
                            <Input v-model="form.site_phone" placeholder="Input phone..." style="width: 100%" />
                        <div>
                            <span class="help-block text-danger" v-if="errors.site_phone"><small>{{ errors.site_phone[0] }}</small></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <label for="select-grade">City/Town e.g <small>Juja, Nairobi Kenya</small></label>
                            <Input v-model="form.site_town" placeholder="Input city/town..." style="width: 100%" />
                        <div>
                            <span class="help-block text-danger" v-if="errors.site_town"><small>{{ errors.site_town[0] }}</small></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <label for="select-grade">Site Address e.g <small>Juja South Estate</small></label>
                            <Input v-model="form.site_address" placeholder="Input Address..." style="width: 100%" />
                        <div>
                            <span class="help-block text-danger" v-if="errors.site_address"><small>{{ errors.site_address[0] }}</small></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <label for="select-grade">Opening Time</label>
                            <el-time-select v-model="form.opening_time"
                                :picker-options="{
                                    start: '07:00',
                                    step: '00:15',
                                    end: '18:30'
                                }"
                                style="width: 100%"
                                placeholder="Select opening time">
                            </el-time-select>
                        <div>
                            <span class="help-block text-danger" v-if="errors.opening_time"><small>{{ errors.opening_time[0] }}</small></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <label for="select-grade">Opening Date</label>
                            <el-time-select v-model="form.closing_time"
                                :picker-options="{
                                    start: '07:00',
                                    step: '00:15',
                                    end: '18:30'
                                }"
                                style="width: 100%"
                                placeholder="Select closing time">
                            </el-time-select>
                        <div>
                            <span class="help-block text-danger" v-if="errors.closing_time"><small>{{ errors.closing_time[0] }}</small></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group mb-3">
                        <el-button type="success" :loading="loading" size="mini" 
                            @click.prevent="createSiteSetting()">{{ loading ? 'Creating settings.....' : 'Create Site Settings' }}
                        </el-button>
                        <el-button type="danger" size="mini" @click.prevent="clearData()">Clear</el-button>
                      </div>
                    </div>
                  </div>
                </div>
              </div> <!-- / .card -->
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
      </main> <!-- main -->
    </div>
</template>

<script>
import Api from '../../../../apis/admin/Api'
export default {
    name: 'CreateSiteSetting',
    data(){
        return {
            loading: false,
            form: {
                site_email: '',
                site_phone: '',
                site_town: '',
                site_address: '',
                opening_time: '',
                closing_time: ''
            },
            errors: {}
        }
    },
    methods: {
        createSiteSetting: async function(){
            this.loading = true
            Api().post('/admin/create-site-setting', this.form)
                .then(() => {
                    this.loading = false
                    this.errors = {}
                    this.$notify({
                        group: 'sitesettings',
                        type: 'success',
                        title: 'Request complete',
                        text: 'Setting Created Successfully'
                    });
                })
                .catch((error) => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors
                    }
                    this.loading = false
                })
        }
    },
    computed: {},
    created(){}
}
</script>