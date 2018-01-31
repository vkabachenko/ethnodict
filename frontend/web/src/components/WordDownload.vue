<template>

<div v-if="files.length > 0">
    <dropdown :visible="visible" @clickout="visible = false">
        <span class="link" @click="visible = !visible">
            <button class="btn btn-success">Приложения</button>
        </span>
        <div slot="dropdown" class="dialog">
            <ul class="menu-list">
                <li v-for="file in files" :key="file.id" @click="visible = false">
                    <download :file="file"></download>
                </li>
            </ul>
        </div>
    </dropdown>
</div>

</template>

<script>
import dropdown from 'vue-my-dropdown'
import Download from './Download.vue'

export default {
  name: 'WordDownload',
  components: {
    dropdown,
    Download
  },
  data () {
    return {
      visible: false
    }
  },
  props: {
    files: {
      type: Array,
      required: true
    }
  }
}
</script>

<style scoped>
    .menu-list {
        list-style-type: none;
    }
</style>
