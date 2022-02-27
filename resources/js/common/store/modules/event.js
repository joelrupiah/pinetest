import Axios from "axios"
import Api from '../../../apis/admin/Api'

export const event = {
    namespaced: true,
    state: {
        eventdetail: {}
    },
    getters: {
        getEventDetail(state){
            return state.eventdetail
        },
    },
    actions: {
        getEventDetail(context, payload){
            Axios.get(`/api/get-event-detail/${payload}`)
                .then(response => {
                    context.commit('eventDetail', response.data.eventdetail)
                })
        },
    },
    mutations: {
        eventDetail(state, payload){
            return state.eventdetail = payload
        },
    }
}
