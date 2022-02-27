import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

import { admin } from './modules/admin'
import { event } from './modules/event'

export const store = new Vuex.Store({
    modules: {
        admin : admin,
        event: event
    }
  })
