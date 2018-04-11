<template>
  <div class="test">
    <form class="category-list">
      <select name="">
        <option value="">Все категории</option>
        <option value="">Постройки. Традиционное жилище</option>
        <option value="">Прядение. Ткачество. Домотканое полотно</option>
        <option value="">Традиционная одежда, обувь</option>
        <option value="">Традиционная пища</option>
      </select>
    </form>
    <div class="alphabet__list">
      <span v-for="(letterList, letterValue) in menuList" :key="letterValue" class="alphabet-block__item">
      <letter-dropdown :item="letterValue" :list="letterList"></letter-dropdown>
    </span>
    </div>
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

.category-list {
  width: 330px;
  margin-left: 30px;
  margin-top: 65px;
}

.category-list select {
  height: 50px;
  padding: 10px;
  display: block;
  width: 100%;
}

</style>
