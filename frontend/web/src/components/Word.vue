<template>
    <div v-if="item" >
        <h2>
          <word-accent :item="item"></word-accent>
        </h2>
        <tabs :options="{ useUrlFragment: false }">
          <tab name="Описание">
            <word-description :description="item.description"></word-description>
          </tab>
          <tab name="Варианты" :is-disabled="item.wordVariants.length === 0">
            <word-variants :variants="item.wordVariants"></word-variants>
          </tab>
          <tab name="Цитаты" :is-disabled="item.wordCitations.length === 0">
            <item-citations :citations="item.wordCitations"></item-citations>
          </tab>
          <tab name="Сочетания" :is-disabled="item.wordCombinations.length === 0">
            <word-combinations :combinations="item.wordCombinations"></word-combinations>
          </tab>
          <tab name="Фольклор" :is-disabled="item.wordApiFolklors.length === 0">
              <word-folklors :folklors="item.wordApiFolklors"></word-folklors>
          </tab>
          <tab name="Этимология">
            Этимология
          </tab>
        </tabs>
    </div>
</template>

<script>
import axios from 'axios'
import WordAccent from './WordAccent.vue'
import WordDescription from './WordDescription.vue'
import WordVariants from './WordVariants.vue'
import ItemCitations from './ItemCitations.vue'
import WordCombinations from './WordCombinations.vue'
import WordFolklors from './WordFolklors.vue'
import {Tabs, Tab} from 'vue-tabs-component'
import 'vue-tabs-component/docs/resources/tabs-component.css'

export default {
  name: 'Word',
  components: {
    WordAccent,
    WordDescription,
    WordVariants,
    ItemCitations,
    WordCombinations,
    WordFolklors,
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
  methods: {
    fetchData () {
      axios.get('/api/words/' + this.id, {
        params: {
          expand: 'wordVariants,wordCitations,wordCombinations,wordApiFolklors'
        }
      })
        .then(response => {
          this.item = response.data
        })
    }
  },
  watch: {
    '$route': 'fetchData'
  },
  created () {
    this.fetchData()
  }
}
</script>

<style scoped>

</style>
