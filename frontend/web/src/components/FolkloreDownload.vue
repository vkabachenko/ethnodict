<template>

<span v-if="files.length > 0">
    <dropdown :visible="visible" @clickout="visible = false">
        <span class="link" @click="visible = !visible">
            <span class="glyphicon glyphicon-download"></span>
        </span>
        <div slot="dropdown" class="dialog">
            <ul class="menu-list">
                <li v-for="file in files" :key="file.id" @click="visible = false">
                    <download :file="file"></download>
                </li>
            </ul>
        </div>
    </dropdown>
</span>

</template>

<script>
import dropdown from 'vue-my-dropdown'
import Download from './Download.vue'

export default {
  name: 'FolkloreDownload',
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
