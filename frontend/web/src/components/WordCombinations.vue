<template>
  <div>
    <div v-for="combination in combinations" :key="combination.id">
      <p>
        <span> {{ combination.combination }}</span>
        &nbsp;
        <span class="explanation">{{ combination.explanation }}</span>
      </p>
      <item-citations class="child" :citations="combination.combinationCitations"></item-citations>
    </div>
  </div>
</template>

<script>
import ItemCitations from './ItemCitations.vue'

export default {
  name: 'WordCombinations',
  components: {
    ItemCitations
  },
  props: {
    combinations: {
      type: Array,
      required: true
    }
  }
}
</script>

<style scoped>

.explanation {
  font-size: 80%;
  font-style: italic;
}

</style>
