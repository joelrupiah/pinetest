import Axios from "axios"
import Api from '../../../apis/admin/Api'

export const grade = {
    namespaced: true,
    state: {
    },
    getters: {
        
    },
    actions: {
        deleteGrade(payload){
            Api().delete(`/admin/grade/${payload}`)
                .then(() => {
                })
        }
    },
    mutations: {
    }
}
