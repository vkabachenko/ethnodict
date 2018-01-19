<template>
  <h2>
      {{ wordWithAccents }}
  </h2>
</template>

<script>
export default {
  name: 'WordAccent',
  props: {
    item: {
      type: Object,
      required: true
    },
    accents: {
      type: Array,
      required: true
    }
  },
  computed: {
    wordWithAccents () {
      let word = this.item.title
      for (let accent of this.accents) {
        let pos = accent.accent_position + 1
        word = word.substr(0, pos) + '\u0301' + word.substr(pos)
      }
      return word
    }
  }
}
</script>

<style scoped>

</style>
