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
            Api().delete(`/admin/category/${payload}`)
                .then(() => {
                })
        }
    },
    mutations: {
    }
}
