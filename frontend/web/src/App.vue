<template>
  <div id="app">
    <div class="container">
      <h1> Header</h1>
    </div>

    <div class="container">
      <router-view/>
    </div>

  </div>
</template>

<script>
export default {
  name: 'App'
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  margin-top: 60px;
}
</style>
