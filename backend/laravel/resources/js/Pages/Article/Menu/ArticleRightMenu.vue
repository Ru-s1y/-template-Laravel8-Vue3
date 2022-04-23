<script setup>
import ArticleRightIndex from './RightMenu/ArticleRightIndex.vue';
import ArticleRightDefault from './RightMenu/ArticleRightDefault.vue';
</script>

<template>
    <div class="mr-2 mb-2 bg-white rounded-lg border shadow-md max-w-xs md:max-w-none overflow-hidden">
        <div class="p-5">
            <div v-if="selected.id">
                <article-right-index :selected="selected" />
            </div>
            <div v-else>
                <article-right-default />
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['selected']
}
</script>

<style scoped>
li {
    list-style: none;
}
</style>