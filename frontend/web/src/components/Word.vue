<template>
    <div>
        <word-accent v-if="item" :item="item" :accents="accents"></word-accent>
    </div>
</template>

<script>
import axios from 'axios'
import WordAccent from './WordAccent.vue'

export default {
  name: 'Word',
  components: {
    WordAccent
  },
  data () {
    return {
      item: null,
      accents: []
    }
  },
  props: {
    id: String
  },
  mounted () {
    axios.all([
      axios.get('/api/words/' + this.id),
      axios.get('/api/word-accents/' + this.id)
    ])
      .then(axios.spread((respWord, respAccent) => {
        this.item = respWord.data
        this.accents = respAccent.data
      }))
  }
}
</script>

<style scoped>

</style>
