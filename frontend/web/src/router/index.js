import Vue from 'vue'
import Router from 'vue-router'
import Main from '@/components/Main'
import Word from '@/components/Word.vue'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      component: Main
    },
    {
      path: '/word/:id',
      component: Word,
      props: true
    }
  ]
})
