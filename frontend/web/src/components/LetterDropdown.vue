<template>

<dropdown :visible="visible" @clickout="visible = false">
    <span class="link" @click="visible = !visible"> {{ item }}</span>
    <div slot="dropdown" class="dialog">
        <aside class="menu">
            <ul class="menu-list">
                <li v-for="value in list" :key="value.id">
                    <router-link :to="`/word/${value.id}`">{{ value.title }}</router-link>
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
}
.menu-list {
  list-style-type: none;
}

</style>
