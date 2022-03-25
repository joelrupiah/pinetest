<template>
    <div id="admin_login">
    <div class="wrapper vh-100" style="overflow:hidden">
      <notifications group="login" class="mt-3" />
      <div class="row align-items-center h-100">
        <form class="col-lg-3 col-md-4 col-10 mx-auto text-center">
          <el-card style="width:400px" :body-style="{ padding: '0px' }">
            <img src="/backend/assets/images/changed.png" alt="" width="140" height="140">
            <div style="padding: 14px;">
              <h1 class="h6 mb-3">Admin Sign in</h1>
              <div class="bottom clearfix">
                  <div class="form-group">
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <Input v-model="form.email" placeholder="Input email..." style="width: 300px" />
                    <div>
                      <small class="text-danger text-sm" v-if="errors.email">
                        {{ errors.email[0] }}
                      </small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <Input v-model="form.password" type="password" password placeholder="Input password..." style="width: 300px" />
                    <div>
                      <small class="text-danger text-sm" v-if="errors.password">
                        {{ errors.password[0] }}
                      </small>
                    </div>
                  </div>
                  <el-button type="success" :loading="loading" size="mini" 
                    @click.prevent="login()">{{ loading ? 'Submittiing details.....' : 'Let me in' }}
                  </el-button>
                  <p class="mt-1 mb-3 text-muted">© 2020</p>
              </div>
            </div>
          </el-card>
        </form>
      </div>
    </div>
    </div>
</template>


<script>
import Admin from '../../../../apis/admin/Admin'
export default {
    name: 'AdminLogin',
    data(){
        return{
          loading: false,
            form: {
                email: "",
                password: "",
            },
            errors: {}
        }
    },
    methods:{
        login(){
          this.loading = true
        Admin.login(this.form)
          .then(response => {
            this.$store.commit('admin/LOGIN', true)
            localStorage.setItem("token", response.data)
            this.$notify({
              group: 'login',
              type: 'success',
              title: 'Request complete',
              text: 'Login successfull. Redirecting........'
            });
            this.errors = {}
            this.loading = false
                    setTimeout(function(){
                      window.location.href = '/admin'
                    }, 1000)
          })
          .catch(error =>{
            if (error.response.status === 422) {
              this.errors = error.response.data.errors
            }
            else if (error.response.status === 500) {
              this.$notify({
                group: 'grade',
                type: 'error',
                title: 'Request failed',
                text: 'Please contact IT Admin'
              });
            }
            this.loading = false
          })
      }
    },
    created(){},
    computed:{}
}
</script>