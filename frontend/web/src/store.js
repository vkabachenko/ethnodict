import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    items: [],
    categories: []
  },
  mutations: {
    loadItems (state, newItems) {
      state.items = newItems
    },
    loadCategories (state, newCategories) {
      state.categories = newCategories
    }
  }
})

export default store
