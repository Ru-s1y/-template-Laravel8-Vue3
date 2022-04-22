<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import ArticleCard from './ArticleCard.vue';
import ArticleBoard from './ArticleBoard.vue';
</script>


<template>
    <AppLayout title="Article">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div v-if="!selected.id" class="flex flex-wrap">
                    <div v-for="(article, index) in articles" :key="index" >
                        <article-card :article="article" v-on:setArticle="setArticle" />
                    </div>
                </div>
                <div v-else class="flex flex-wrap">
                    <article-board :selected="selected" v-on:setArticle="setArticle" />
                </div>
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
