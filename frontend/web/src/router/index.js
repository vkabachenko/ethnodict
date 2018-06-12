import Vue from 'vue'
import Router from 'vue-router'
import Meta from 'vue-meta'
import Main from '@/components/Main'
import Word from '@/components/Word.vue'
import Contacts from '@/components/Contacts.vue'

Vue.use(Router)
Vue.use(Meta)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      component: Main
    },
    {
      path: '/word/:id?',
      component: Word,
      props: true
    },
    {
      path: '/contacts',
      component: Contacts
    }
  ]
})
