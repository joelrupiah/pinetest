<template>
    <div id="grade_list">
        <main class="ttr-wrapper">
              <div class="content">
    
                <div class="container">
                <h5 class="mb-1">Faqs Table</h5>
                <router-link :to="{name: 'CreateFaq'}">
                    <el-button type="primary" icon="el-icon-plus" size="mini" class="mb-2"> 
                        Create Faq</el-button>
                </router-link>
                
                <div class="table-responsive">

                    <table class="table table-striped custom-table">
                    <thead>
                        <tr>
                        <th scope="col"><small class="d-block"><strong>#</strong></small></th>
                        <th scope="col"><small class="d-block"><strong>Client Name</strong></small></th>
                        <th scope="col"><small class="d-block"><strong>Subject</strong></small></th>
                        <th scope="col"><small class="d-block"><strong>Date Asked</strong></small></th>
                        <th scope="col"><small class="d-block"><strong>Actions</strong></small></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr scope="row" v-for="(faq, index) in faqs" :key="faq.id">
                                <td>
                                    <small class="d-block">{{ index+1 }}</small>
                                </td>
                                <td>
                                    <small class="d-block">{{ faq.name }}</small>
                                </td>
                                <td>
                                    <small class="d-block">{{ faq.subject }}</small>
                                </td>
                                <td>
                                    <small class="d-block">{{ faq.created_at | time }}</small>
                                </td>
                                <td>
                                    <small class="d-block">
                                        <router-link :to="`/api/admin/reply-question/${faq.id}`">
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
    name: 'FaqList',
    data(){
        return{
            faqs: [],
            errors: {}
        }
    },
    methods: {
        getAllFaqs: async function(){
            Api().get('/admin/get-faqs')
                .then(response => {
                    this.faqs = response.data.faqs
                })
        },
    },
    computed: {},
    created(){
        this.getAllFaqs()
    }
}
</script>