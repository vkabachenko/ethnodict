<template>
<div>
  <div v-for="citation in citations" :key="citation.id">
    <p>
      <span> {{ citation.fragment }}</span>
      &nbsp;
      <span>( {{ citation.name_region }} )</span>
    </p>
  </div>
</div>
</template>

<script>
export default {
  name: 'WordCitations',
  props: {
    citations: {
      type: Array,
      required: true
    }
  }
}
</script>

<style scoped>

</style>
