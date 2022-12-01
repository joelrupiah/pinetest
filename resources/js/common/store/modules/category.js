import Axios from "axios"
import Api from '../../../apis/admin/Api'

export const category = {
    namespaced: true,
    state: {
    },
    getters: {
        
    },
    actions: {
        deleteCategory(payload){
            Api().delete(`/admin/delete-category/${payload}`)
                .then(() => {
                })
        }
    },
    mutations: {
    }
}
