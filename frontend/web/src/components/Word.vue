<template>
    <div v-if="item" >
        <h2>
          <word-accent :item="item"></word-accent>
        </h2>
        <tabs>
          <tab name="Описание">
            <word-description :description="item.description"></word-description>
          </tab>
          <tab name="Варианты" :is-disabled="item.wordVariants.length === 0">
            <word-variants :variants="item.wordVariants"></word-variants>
          </tab>
          <tab name="Цитаты" :is-disabled="item.wordCitation.length === 0">
            <word-citations :citations="item.wordCitation"></word-citations>
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
import WordVariants from './WordVariants.vue'
import WordCitations from './WordCitations.vue'
import {Tabs, Tab} from 'vue-tabs-component'
import 'vue-tabs-component/docs/resources/tabs-component.css'

export default {
  name: 'Word',
  components: {
    WordAccent,
    WordDescription,
    WordVariants,
    WordCitations,
    Tabs,
    Tab
  },
  data () {
    return {
      item: null
    }
  },
  props: {
    id: String
  },
  mounted () {
    axios.get('/api/words/' + this.id, {
      params: {
        expand: 'wordVariants,wordCitation'
      }
    })
      .then(response => {
        this.item = response.data
      })
  }
}
</script>

<style scoped>

</style>
