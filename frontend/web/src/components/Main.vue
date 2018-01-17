<template>
  <div>
    <search v-if="items.length > 0" :items="items" @select="onSelect"></search>
  </div>
</template>

<script>
import axios from 'axios'
import Search from './Search.vue'

export default {
  name: 'Main',
  components: {
    Search
  },
  data () {
    return {
      items: [],
      id: 0
    }
  },
  methods: {
    onSelect (text) {
      this.id = this.items.reduce((prev, curr) => curr.title === text ? curr.id : prev, 0)
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
