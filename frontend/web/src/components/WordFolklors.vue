<template>
  <div>
    <div v-for="folklor in folklors" :key="folklor.id">
        <p>
            <span> {{ folklor.fragment }}</span>
            &nbsp;
            <span class="name-folklore">{{ folklor.name_folklore }}</span>
            &nbsp;
            <span v-if="folklor.name_region">({{ folklor.name_region }})</span>
        </p>
    </div>
  </div>
</template>

<script>
export default {
  name: 'WordFolklors',
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
