<template>
    <div v-if="item" >
        <word-accent :item="item" :accents="accents"></word-accent>
        <tabs>
          <tab name="Описание">
            <word-description :description="item.description"></word-description>
          </tab>
          <tab name="Варианты">
            Варианты
          </tab>
          <tab name="Цитаты">
            Цитаты
          </tab>
          <tab name="Сочетания">
            Сочетания
          </tab>
          <tab name="Фольклор">
            Фольклор
          </tab>
          <tab name="Этимология">
            Этимология
          </tab>
          <tab name="Файлы">
            Файлы
          </tab>
        </tabs>
    </div>
</template>

<script>
import axios from 'axios'
import WordAccent from './WordAccent.vue'
import WordDescription from './WordDescription.vue'
import {Tabs, Tab} from 'vue-tabs-component'
import 'vue-tabs-component/docs/resources/tabs-component.css'

export default {
  name: 'Word',
  components: {
    WordAccent,
    WordDescription,
    Tabs,
    Tab
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
