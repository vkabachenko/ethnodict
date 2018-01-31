<template>

<div v-if="files.length > 0" :class="{span: isSpan}">
    <dropdown :visible="visible" @clickout="visible = false">
        <span class="link" @click="visible = !visible">
            <slot></slot>
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
  name: 'ItemDownload',
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
    },
    isSpan: {
      type: Boolean,
      default: false
    }
  }
}
</script>

<style scoped>
    .menu-list {
        list-style-type: none;
    }
    .span {
      display: inline;
    }
</style>
