<template>

<dropdown :visible="visible" @clickout="visible = false">
    <span class="link" @click="visible = !visible"> {{ item }}</span>
    <div slot="dropdown" class="dialog">
        <aside class="menu">
            <ul class="menu-list">
                <li v-for="value in list" :key="value.id" @click="visible = false">
                    <router-link :to="`/word/${value.id}`" class="drop__link">{{ value.title }}</router-link>
                </li>
            </ul>
        </aside>
    </div>
</dropdown>

</template>

<script>
import dropdown from 'vue-my-dropdown'

export default {
  name: 'LetterDropdown',
  components: {
    dropdown
  },
  data () {
    return {
      visible: false
    }
  },
  props: {
    item: String,
    list: Array
  }
}
</script>

<style scoped>

.link {
  cursor: pointer;
  display: block;
  text-decoration: none;
  height: 35px;
  width: 35px;
  background: #123762;
  color: white;
  font-size: 18px;
  text-align: center;
  line-height: 35px;
  border-radius: 50%;
}
.menu-list {
  list-style-type: none;
}

.dialog {
  background: #123762;
  padding: 20px;
  /*position: absolute;*/
  /*top: 100%;*/
  /*width: 180px;*/
  /*left: 50%;*/
  /*margin-left: -90px;*/
  /*color: #fff;*/
  height: 135px;
  overflow-y: scroll;
  text-align: left;
  /*display: none;*/
  /*z-index: 3;*/
  /*margin-top: 5px;*/
}

.drop__link {
  color: #ffffff;
  transition: all .4s;
}
</style>
