<script setup>
import ArticleLeftRating from "./LeftMenu/ArticleLeftRating.vue";
import ArticleLeftFilter from "./LeftMenu/ArticleLeftFilter.vue";
</script>

<template>
    <div class="mr-2 mb-2 bg-white rounded-lg border shadow-md max-w-xs md:max-w-none overflow-hidden">
        <div class="p-5">
            <article-left-filter
                class="mb-3"
                :parameter="parameter"
                v-on:setParameter="setParameter"
            />
            <article-left-rating class="mb-3" />
        </div>
    </div>
</template>

<script>
export default {
    props: ['parameter'],
    methods: {
        setParameter( param ) {
            this.$emit('setParameter', param);
        }
    }
}
</script>


<style scoped>
li {
    list-style: none;
}
</style>