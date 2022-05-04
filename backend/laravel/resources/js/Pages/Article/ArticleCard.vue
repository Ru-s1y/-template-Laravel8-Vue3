<template>
    <div class="article-card mr-2 mb-2 bg-white rounded-lg border shadow-md max-w-xs md:max-w-none overflow-hidden">
        <img :src="article.image_path">
        <div class="p-3">
            <div>
                <span v-if="article.created_at" class="text-sm text-primary">{{ article.created_at }} </span>
                <div>
                    <img class="mr-1 w-5 h-5 rounded inline-block" :src="article.user.profile_photo_url" :alt="article.user.name">
                    {{ article.user.name }}
                </div>
            </div>
            <h3 class="font-semibold text-tl leading-6 text-gray-700 my-2">
                {{ article.title }}
            </h3>
            <p class="paragraph-normal text-gray-600">
                {{ this.reduceString(article.summary, article.content) }}
            </p>
            <a class="mt-3 block" href="#" @click="selectArticle">READ More >></a>
        </div>
    </div>
</template>

<script>
import gsap from 'gsap';
export default {
    props: ["article"],
    methods: {
        reduceString( summary, content ) {
            if (summary == '' && content.length > 40) {
                return string.substr(0, 40) + '...';
            }
            return summary;
        },
        selectArticle() {
            this.$emit('setArticle', this.article);
        }
    },
    mounted() {
        gsap.fromTo(".article-card",
            { opacity: 0 },
            { opacity: 1}
        );
    }
}
</script>