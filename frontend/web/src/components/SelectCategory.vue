<template>

        <form class="category-list">
            <select name="" @change="$emit('input', $event.target.value)">
                <option value="">Все категории</option>
                <option v-for="option in $store.state.categories" :value="option.id" :key="option.id">
                    {{ option.name }}
                </option>
            </select>
        </form>

</template>

<script>

export default {
  name: 'SelectCategory'
}

</script>

<style scoped>

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
