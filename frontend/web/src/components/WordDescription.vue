<template>
    <div>
        <div>{{ item.description }}</div>
        <item-download :files="item.wordFiles">
            <button class="btn btn-success">Приложения</button>
        </item-download>
    </div>
</template>

<script>
import ItemDownload from './ItemDownload.vue'

export default {
  name: 'WordDescription',
  components: {
    ItemDownload
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
