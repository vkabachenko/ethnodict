<template>
  <a :href="filePath" :download="file.upload_file">
    {{ fileName }}
  </a>

</template>

<script>
export default {
  name: 'Download',
  props: {
    file: {
      type: Object,
      required: true
    }
  },
  computed: {
    fileName () {
      return this.file.description ? this.file.description : this.file.upload_file
    },
    filePath () {
      let path = '/upload/'
      let extension = this.file.upload_file.split('.').pop()
      return path + String(this.file.id) + '.' + extension
    }
  }
}
</script>

<style scoped>

</style>
