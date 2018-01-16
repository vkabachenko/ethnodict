<template>
  <div>
    <ul>
      <li v-for="item in items" :key="item.id">
        {{ item.title }}
      </li>
    </ul>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'Main',
  data: () => ({
    items: []
  }),
  methods: {
    loadData () {
      axios.get('/api/words')
        .then(response => {
          this.items = response.data
        })
    }
  },
  mounted () {
    this.loadData()
  }
}
</script>
