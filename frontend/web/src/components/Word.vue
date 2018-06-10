<template>
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <tabs :options="{ useUrlFragment: false }" v-if="item">
          <tab name="Описание">
            <h2>
              <word-accent :item="item"></word-accent>
            </h2>
            <word-description :item="item"></word-description>
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
          <tab name="Этимология" :is-disabled="item.wordApiEtymologies.length === 0">
            <word-etymologies :sources="item.wordApiEtymologies"></word-etymologies>
          </tab>
        </tabs>
      </div>
      <div class="col-md-4">
        <alphabet-menu></alphabet-menu>
    </div>
  </div>
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
import WordEtymologies from './WordEtymologies.vue'
import AlphabetMenu from './AlphabetMenu.vue'
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
    WordEtymologies,
    AlphabetMenu,
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
      if (this.id) {
        axios.get(process.env.API_URL + 'words/' + this.id, {
          params: {
            expand: 'wordVariants,wordCitations,wordCombinations,wordApiFolklors,wordApiEtymologies,wordFiles'
          }
        })
          .then(response => {
            this.item = response.data
          })
      }
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
