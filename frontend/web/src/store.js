import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    items: []
  },
  mutations: {
    loadItems (state, newItems) {
      state.items = newItems
    }
  }
})

export default store
