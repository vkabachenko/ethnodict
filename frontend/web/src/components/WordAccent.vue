<template>
  <span>
      {{ wordWithAccents }}
  </span>
</template>

<script>
export default {
  name: 'WordAccent',
  props: {
    item: {
      type: Object,
      required: true
    }
  },
  computed: {
    wordWithAccents () {
      let word = this.item.title
      for (let accent of this.item.wordAccents) {
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
