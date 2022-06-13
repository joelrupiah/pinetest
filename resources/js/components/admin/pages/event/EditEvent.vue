<template>
    <div id="edit_event">
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">Edit Event</h2>
              <p class="text-muted mb-1">Form for creating event content.</p>
              <div class="card shadow mb-4">
                <div class="card-header">
                  <strong class="card-title">Create Event Content</strong>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <label for="title">Title</label>
                        <el-input placeholder="Input Event Title" id="title" v-model="form.title"></el-input>
                        <span class="help-block text-danger" v-if="errors.title"><small>{{ errors.title[0] }}</small></span>
                      </div>
                    </div> <!-- /.col -->
                    <div class="col-md-3">
                      <div class="form-group mb-3">
                        <label for="gallery-image">Select Image</label>
                        <input type="file" @change="loadImage($event)">
                        <span class="help-block text-danger" v-if="errors.image"><small>{{ errors.image[0] }}</small></span>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group mb-3">
                        <label for="gallery-image">Image Preview</label>
                        <div>
                            <img :src="fileLink(form.image)" alt="" style="width:40px;height:40px">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <label for="gallery-image">Start Date</label>
                        <el-date-picker
                            v-model="form.start_date"
                            type="date"
                            placeholder="Pick a day">
                        </el-date-picker>
                        <span class="help-block text-danger" v-if="errors.start_date"><small>{{ errors.start_date[0] }}</small></span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <label for="gallery-image">End Date</label>
                        <el-date-picker
                            v-model="form.end_date"
                            type="date"
                            placeholder="Pick a day">
                        </el-date-picker>
                        <span class="help-block text-danger" v-if="errors.end_date"><small>{{ errors.end_date[0] }}</small></span>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group mb-3">
                        <label for="gallery-image">Small Description</label>
                        <ckeditor :editor="editor" v-model="form.description" :config="editorConfig"></ckeditor>
                        <span class="help-block text-danger" v-if="errors.description"><small>{{ errors.description[0] }}</small></span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <label for="gallery-image">Start Time</label>
                        <el-time-select
                            v-model="form.start_time"
                            :picker-options="{
                                start: '08:30',
                                step: '00:15',
                                end: '18:30'
                            }"
                            placeholder="Select time">
                        </el-time-select>
                        <span class="help-block text-danger" v-if="errors.start_time"><small>{{ errors.start_time[0] }}</small></span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <label for="gallery-image">End Time</label>
                        <el-time-select
                            v-model="form.end_time"
                            :picker-options="{
                                start: '08:30',
                                step: '00:15',
                                end: '18:30'
                            }"
                            placeholder="Select time">
                        </el-time-select>
                        <span class="help-block text-danger" v-if="errors.end_time"><small>{{ errors.end_time[0] }}</small></span>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group mb-3">
                        <label for="gallery-image">Event Description</label>
                        <ckeditor :editor="editor" v-model="form.eventDescription" :config="editorConfig"></ckeditor>
                        <span class="help-block text-danger" v-if="errors.eventDescription"><small>{{ errors.eventDescription[0] }}</small></span>
                      </div>
                    </div>
                    <hr>
                    <div class="col-md-12">
                      <div class="form-group mb-3">
                        <h3>Venue</h3>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group mb-3">
                        <label for="gallery-image">Location</label>
                        <el-input placeholder="Input Event Location" id="title" v-model="form.location"></el-input>
                        <span class="help-block text-danger" v-if="errors.location"><small>{{ errors.location[0] }}</small></span>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group mb-3">
                        <label for="gallery-image">Street</label>
                        <el-input placeholder="Input Event Street" id="title" v-model="form.street"></el-input>
                        <span class="help-block text-danger" v-if="errors.street"><small>{{ errors.street[0] }}</small></span>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group mb-3">
                        <label for="gallery-image">City</label>
                        <el-input placeholder="Input Event City/Town" id="title" v-model="form.city"></el-input>
                        <span class="help-block text-danger" v-if="errors.city"><small>{{ errors.city[0] }}</small></span>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group mb-3">
                        <h3>Organiser</h3>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group mb-3">
                        <label for="gallery-image">School/Company</label>
                        <el-input placeholder="Input Event Organiser" id="title" v-model="form.host"></el-input>
                        <span class="help-block text-danger" v-if="errors.host"><small>{{ errors.host[0] }}</small></span>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group mb-3">
                        <el-button type="success" :loading="loading" size="mini" 
                            @click.prevent="updateEvent()">{{ loading ? 'Updating Event.....' : 'Update Event' }}
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
import ClassicEditor from '@ckeditor/ckeditor5-build-classic'
export default {
    name: 'EditEvent',
    data(){
        return {
            event: {},
            loading: false,
            form: {
                id: '',
                title: '',
                image: '',
                start_date: '',
                end_date: '',
                description: '',
                start_time: '',
                end_time: '',
                eventDescription: '',
                host: '',
                location: '',
                street: '',
                city: '',
            },
            errors: {},
            editor: ClassicEditor,
            editorConfig: {
            }
        }
    },
    methods:{
        fileLink(name){
            if (name != null && name.length < 256) {
                return '/uploads/img/event/' + name
            }else {
                return this.form.image
            }
                
        },
        loadImage(e){
            let file = e.target.files[0]
            let reader = new FileReader()

            reader.onload = e => {
                this.form.image = e.target.result
            }

            reader.readAsDataURL(file)
            
        },
        getEvent: async function(){
            Api().get('/admin/get-event/'+this.$route.params.id)
                .then(response => {
                    const this_ = this
                    this.form.id = response.data.event.id
                    this.form.title = response.data.event.title
                    this.form.image = response.data.event.image
                    this.form.start_date = response.data.event.start_date
                    this.form.end_date = response.data.event.end_date
                    this.form.description = response.data.event.description
                    this.form.start_time = response.data.event.start_time
                    this.form.end_time = response.data.event.end_time
                    this.form.eventDescription = response.data.event.eventDescription
                    this.form.host = response.data.event.host
                    this.form.location = response.data.event.location
                    this.form.street = response.data.event.street
                    this.form.city = response.data.event.city
                })
        },
        updateEvent: async function(){
            this.loading = true
            Api().post('/admin/edit-event/'+this.$route.params.id, this.form)
                .then(() => {
                    this.loading = false
                    this.errors = {}
                })
                .catch((error) => {
                    if (response.error.status === 422) {
                        this.errors = error.response.data.errors
                    }
                    this.loading = false
                })
        }
    },
    computed:{},
    mounted(){
        this.getEvent()
    }
}
</script>