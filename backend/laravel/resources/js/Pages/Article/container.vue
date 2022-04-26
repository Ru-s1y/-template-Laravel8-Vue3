<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import ArticleCard from './ArticleCard.vue';
import ArticleBoard from './ArticleBoard.vue';
import ArticleLeftMenu from './Menu/ArticleLeftMenu.vue';
import ArticleRightMenu from './Menu/ArticleRightMenu.vue';
</script>


<template>
    <AppLayout title="Article">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">
                <article-left-menu class="w-1/5" />

                <div v-if="!selected.id" class="w-2/3">
                    <div v-for="(article, index) in articles" :key="index" >
                        <article-card :article="article" v-on:setArticle="setArticle" />
                    </div>
                    <div class="flex flex-nowrap justify-center">
                        <span>&lt;&lt;</span>
                        <span> - </span>
                        <span>1</span>
                        <span>2</span>
                        <span>3</span>
                        <span>4</span>
                        <span> - </span>
                        <span>&gt;&gt;</span>
                    </div>
                </div>

                <div v-else class="w-3/5 flex flex-wrap">
                    <article-board :selected="selected" v-on:setArticle="setArticle" />
                </div>

                <article-right-menu :selected="selected" class="w-1/5" />
            </div>
        </div>
    </AppLayout>
</template>

<script>
export default {
    data: function () {
        return {
            selected: {},
            articles: []
        }
    },
    methods: {
        getArticles() {
            axios.get('/article/index')
            .then(response => {
                this.articles = response.data;
            })
            .catch(error => {
                console.log(error);
            });
        },
        setArticle( selected ) {
            this.selected = selected;
        }
    },
    mounted() {
        this.getArticles();
    }
}
</script>
