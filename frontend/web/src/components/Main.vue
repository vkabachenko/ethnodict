<template>
  <div>
    <search v-if="items.length > 0" :items="items" @select="onSelect"></search>
  </div>
</template>

<script>
import axios from 'axios'
import Search from './Search.vue'
import alertifyjs from 'alertifyjs'
import 'alertifyjs/build/css/alertify.css'

export default {
  name: 'Main',
  components: {
    Search
  },
  data () {
    return {
      items: []
    }
  },
  methods: {
    onSelect (text) {
      let id = this.items.reduce((prev, curr) => curr.title === text ? curr.id : prev, 0)
      if (!id) {
        alertifyjs.alert('Ошибка', 'Слово не найдено')
      } else {
        this.$router.push('/word/' + id)
      }
    }
  },
  mounted () {
    axios.get('/api/words')
      .then(response => {
        this.items = response.data
      })
  }
}
</script>
