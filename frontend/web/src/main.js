import Vue from 'vue'
import App from './App'
import router from './router'
import store from './store'
import VueYandexMetrika from 'vue-yandex-metrika'
import 'bootstrap/dist/css/bootstrap.css'
import 'normalize.css/normalize.css'
import 'font-awesome/css/font-awesome.css'

Vue.config.productionTip = false
Vue.use(VueYandexMetrika, {
  id: process.env.YANDEX_METRICA_ID,
  router: router,
  env: process.env.NODE_ENV
})

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  store,
  render: h => h(App)
})
