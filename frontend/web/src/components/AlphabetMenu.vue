<template>

  <div class="test">

    <select-category @input="createMenu"></select-category>

    <div class="alphabet__list">
      <span v-for="(letterList, letterValue) in menuList" :key="letterValue" class="alphabet-block__item">
        <letter-dropdown :item="letterValue" :list="letterList"></letter-dropdown>
      </span>
    </div>
  </div>

</template>

<script>
import SelectCategory from './SelectCategory'
import LetterDropdown from './LetterDropdown'

export default {
  name: 'AlphabetMenu',
  components: {
    SelectCategory,
    LetterDropdown
  },
  data () {
    return {
      menuList: {}
    }
  },
  methods: {
    createMenu (selectedCategoryId) {
      this.menuList = {}
      let items = selectedCategoryId
        ? this.$store.state.items.filter(item => Number(item.id_category) === Number(selectedCategoryId))
        : this.$store.state.items
      for (let item of items) {
        let letter = item.title[0]
        if (this.menuList[letter] === undefined) {
          this.menuList[letter] = [item]
        } else {
          this.menuList[letter].push(item)
        }
      }
    }
  },
  watch: {
    selectedCategory: (newf, oldf) => {
      this.createMenu()
    }
  },
  created () {
    this.createMenu()
  }
}
</script>

<style scoped>
.alphabet__list {
  width: 330px;
  padding: 30px 20px;
  margin-top: 30px;
  background: #ffffff;
  margin-left: 30px;
}

.alphabet-block__item {
  display: inline-block;
  margin-left: 10px;
  margin-top: 10px;
  /*position: relative;*/
}

</style>
