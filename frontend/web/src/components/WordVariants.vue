<template>
  <div>
    <div v-for="variantType in variantTypes" :key="variantType.id">
      <h3> {{ variantType.name }} </h3>
      <div v-for="variant in variants" :key="variant.id">
          <p v-if="variant.type.id === variantType.id">
              <a v-if="variant.variant.description > ''" :href="`/word/${variant.variant.id}`">
                  <word-accent :item="variant.variant"></word-accent>
              </a>
              <word-accent v-else :item="variant.variant"></word-accent>
            &nbsp;
            <span v-if="variant.comment > ''">
                ( {{ variant.comment }} )
            </span>
          </p>
      </div>
    </div>
  </div>
</template>

<script>
import WordAccent from './WordAccent.vue'

export default {
  name: 'WordVariants',
  components: {
    WordAccent
  },
  props: {
    variants: {
      type: Array,
      required: true
    }
  },
  computed: {
    variantTypes () {
      let list = []
      for (let variant of this.variants) {
        if (list.find(x => x.id === variant.type.id) === undefined) {
          list.push({id: variant.type.id, name: variant.type.name})
        }
      }
      return list
    }
  }
}
</script>

<style scoped>

</style>
