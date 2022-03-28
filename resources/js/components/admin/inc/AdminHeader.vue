<template>
    <div id="admin_header">
      <nav class="topnav navbar navbar-light">
        <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
          <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>
        <form class="form-inline mr-auto searchform text-muted">
          <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search" placeholder="Type something..." aria-label="Search">
        </form>
        <ul class="nav">
          <li class="nav-item">
            <p class="nav-link text-muted my-2">Joel Jeremiah Rupiah</p>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="avatar avatar-sm mt-2">
                <img src="/backend/assets/avatars/dummy.jpg" alt="Admin Avatar" class="avatar-img rounded-circle">
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <router-link :to="{name: 'AdminProfile'}" class="dropdown-item">Profile</router-link>
              <!-- <a class="dropdown-item" href="/admin/admin-profile">Profile</a> -->
              <!-- <a class="dropdown-item" href="/">Settings</a> -->
              <router-link :to="{ name: 'SiteSettingsList' }" class="dropdown-item">Settings</router-link>
              <a class="dropdown-item" href="#" @click.prevent="logout">Logout</a>
            </div>
          </li>
        </ul>
      </nav>
    </div>
</template>

<script>
import Admin from '../../../apis/admin/Admin'
export default {
    name: 'AdminHeader',
    data(){
        return {}
    },
    methods: {
        logout(){
        Admin.logout()
          .then(() => {
            localStorage.removeItem("token")
            this.$store.commit('admin/LOGIN', false)
                    let self = this
                    setTimeout(function(){
                      window.location.href = '/admin/admin-login'
                    }, 1000)
          })
      },
        getAuthAdmin(){
            Admin.auth().then(response =>{
                this.$store.commit('admin/AUTH_ADMIN', response.data)
            })
        }
    },
    computed:{
        admin(){
            return this.$store.getters['admin/AUTH_ADMIN']
        }
    },
    created(){
        this.getAuthAdmin()
        
        

    }
}
</script>