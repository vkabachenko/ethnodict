<template>
  <div>
    <div v-for="folklor in folklors" :key="folklor.id">
        <p>
            <span> {{ folklor.fragment }}</span>
            <span class="name-folklore">{{ folklor.name_folklore }}</span>
            <span v-if="folklor.name_region">({{ folklor.name_region }})</span>
            <folklore-download :files="folklor.folkloreFiles"></folklore-download>
        </p>
    </div>
  </div>
</template>

<script>
import FolkloreDownload from './FolkloreDownload'

export default {
  name: 'WordFolklors',
  components: {
    FolkloreDownload
  },
  props: {
    folklors: {
      type: Array,
      required: true
    }
  }
}
</script>

<style scoped>

    .name-folklore {
        font-size: 80%;
        font-style: italic;
    }

</style>
