<script setup>
import { library } from '@fortawesome/fontawesome-svg-core';
import { faXmark } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

library.add(
    faXmark
);
</script>

<template>
    <div class="article-board mr-2 mb-2 bg-white rounded-lg border shadow-md max-w-xs md:max-w-none overflow-hidden w-full">
        <div class="p-5">
            <div class="text-right">
                <FontAwesomeIcon icon="xmark" @click="unsetSelected()" class="w-8 h-8 text-gray-500 hover:text-gray-300" />
            </div>
            <h1 class="mb-2 text-xl title-border">{{ article.title }}</h1>
            <div class="flex mt-2">
                <div v-for="(tag, index) in article.tags" :key="index" class="tag-card">
                    <p class="py-1 px-2 text-white bg-sky-700 rounded-md text-sm">
                        {{ tag.name }}
                    </p>
                </div>
            </div>
            <p class="my-8">{{ article.content }}</p>
            <div class="flex">
                <!-- articleにするとバグる。取得が間に合ってない？ -->
                <img :src="selected.user.profile_photo_url" class="mr-1 w-5 h-5 rounded inline-block">
                <span>{{ selected.user.name }}</span>
            </div>
            <p>{{ article.created_at ? 'created_at' + article.created_at : '' }}</p>
        </div>
    </div>
</template>

<script>
import gsap from 'gsap';
export default {
    props: ['selected'],
    data: function () {
        return {
            article: ''
        }
    },
    methods: {
        getArticle() {
            axios.get('/article/' + this.selected.id)
            .then(response => {
                this.article = response.data[0];
            }).catch(error => {
                console.log(error);
            });
        },
        unsetSelected() {
            this.$emit("setArticle", {});
        }
    },
    mounted() {
        this.getArticle();
        gsap.fromTo(".article-board",
            { opacity: 0 },
            { opacity: 1 }
        )
    }
}
</script>

<style scoped>
.title-border {
    border-bottom: solid 0.5px lightgray;
}
.tag-card {
    margin-right: 0.5rem;
}
.tag-card:last-child {
    margin-right: 0;
}
</style>