<template>
<div>
  <form action="" class="hero__search">
    <input class="awesomplete search-input" ref="search" @keypress.enter.prevent="onEnter" @awesomplete-select="onSelect" placeholder="НАЙТИ СЛОВО">
    <button class="hero-submit" @click.prevent="onClick">
      <i class="fa fa-search" aria-hidden="true"></i>
    </button>
  </form>
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
    },
    onClick (event) {
      this.$emit('select', this.$refs.search.value)
    }
  },
  mounted () {
    let list = this.items.map(item => item.title)
    this.api = new Awesomplete(this.$refs.search, {list: list})
  }
}
</script>

<style scoped>
.hero__search {
  display: inline-block;
  width: 1000px;
  margin-top: 140px;
  margin-bottom: 12px;
  background: rgba(255, 255, 255, 0.30);
  height: 311px;
  position: relative;
}

.hero__search .search-input {
  width: 950px;
  height: 84px;
  padding: 20px;
  font-size: 20px;
  border: 3px solid #9a2027;
  margin-top: 134px;
  display: inline;
}
.hero__search .hero-submit {
  height: 83px;
  position: absolute;
  top: 135px;
  background: #9a2027;
  color: #fff;
  right: 24px;
  width: 102px;
  border: none;
  cursor: pointer;
}
.hero-submit .fa-search {
  font-size: 60px;
}
</style>
