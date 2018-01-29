<template>
<div>
    <p>
      {{ description }}
      <br/>
        <span class="literary">{{ literature }}</span>
    </p>
    <item-citations class="child" :citations="citations"></item-citations>
</div>
</template>

<script>
import ItemCitations from './ItemCitations.vue'
export default {
  name: 'WordEtymologies',
  components: {
    ItemCitations
  },
  props: {
    sources: {
      type: Array,
      required: true
    }
  },
  computed: {
    citations () {
      let list = []
      for (let source of this.sources) {
        list = list.concat(source.etymologyCitations)
      }
      return list
    },
    description () {
      let text = ''
      for (let source of this.sources) {
        let currentDescription = String(source.description)
        if (currentDescription !== text) {
          text += currentDescription
        }
      }
      return text
    },
    literature () {
      let list = []
      for (let source of this.sources) {
        if (source.text_source) {
          list.push([source.text_source + ' ' + source.source_addition])
        }
      }
      return list.join('; ')
    }
  }
}
</script>

<style scoped>

.literary {
    font-size: 80%;
    font-style: italic;
}

</style>
