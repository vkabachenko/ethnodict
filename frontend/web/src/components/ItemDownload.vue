<template>

<div v-if="files.length > 0" :class="{span: isSpan}">
    <dropdown :visible="visible" @clickout="visible = false">
        <span class="link" @click="visible = !visible">
            <slot></slot>
        </span>
        <div slot="dropdown" class="dialog">
            <ul class="menu-list-dropdown">
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

<style>
    .btn-success.btn-success {
      margin-top: 30px;
      background: #123762;
      padding: 12px 25px;
      border-radius: 50px;
      border: none;
    }

    .menu-list-dropdown {
        list-style-type: none;
        background: #123762;
        padding: 20px;
        margin-top: 60px;
        margin-left: -166px;
        height: 135px;
        overflow-y: scroll;
        text-align: left;
    }

    .menu-list-dropdown li *{
      color: #ffffff;
    }
    .span {
      display: inline;
    }
</style>
