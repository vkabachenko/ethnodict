<template>
    <div>
        <div>{{ item.description }}</div>
        <word-download :files="item.wordFiles"></word-download>
    </div>
</template>

<script>
import WordDownload from './WordDownload.vue'

export default {
  name: 'WordDescription',
  components: {
    WordDownload
  },
  props: {
    item: {
      type: Object,
      required: true
    }
  }
}
</script>

<style scoped>

</style>
