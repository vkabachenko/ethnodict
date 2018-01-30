<template>
<div>
    <span v-for="(letterList, letterValue) in menuList" :key="letterValue">
      <letter-dropdown :item="letterValue" :list="letterList"></letter-dropdown>
    </span>
</div>
</template>

<script>
import LetterDropdown from './LetterDropdown'

export default {
  name: 'AlphabetMenu',
  components: {
    LetterDropdown
  },
  data () {
    return {
      menuList: {}
    }
  },
  methods: {
    createMenu () {
      for (let item of this.$store.state.items) {
        let letter = item.title[0]
        if (this.menuList[letter] === undefined) {
          this.menuList[letter] = [item]
        } else {
          this.menuList[letter].push(item)
        }
      }
    }
  },
  created () {
    this.createMenu()
  }
}
</script>

<style scoped>

</style>
