<template>
<div>
  <label>Поиск
    <input class="awesomplete" ref="search" @keyup.enter="onEnter" @awesomplete-select="onSelect"/>
  </label>
</div>
</template>

<script>
import Awesomplete from 'awesomplete'
import 'awesomplete/awesomplete.css'

export default {
  name: 'Search',
  props: {
    items: {
      type: Array,
      required: true
    }
  },
  data () {
    return {
      api: null
    }
  },
  methods: {
    onEnter (event) {
      this.$emit('select', event.target.value)
    },
    onSelect (event) {
      this.$emit('select', event.text.value)
    }
  },
  mounted () {
    let list = this.items.map(item => item.title)
    this.api = new Awesomplete(this.$refs.search, {list: list})
  }
}
</script>

<style scoped>

</style>
