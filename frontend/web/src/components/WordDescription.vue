<template>
    <div>
        {{ description }}
    </div>
</template>

<script>
export default {
  name: 'WordDescription',
  props: {
    description: {
      type: String,
      required: true
    }
  }
}
</script>

<style scoped>

</style>
