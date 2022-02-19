import Api from './Api'

export default {
    login(form){
        return Api().post('/admin/login', form)
    },

    logout(){
        return Api().post('/admin/logout')
    },

    auth(){
        return Api().get('/admin/user')
    }
        
}