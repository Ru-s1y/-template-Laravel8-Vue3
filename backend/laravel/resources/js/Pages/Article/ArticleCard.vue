<template>
    <div class="mr-2 mb-2 bg-white rounded-lg border shadow-md max-w-xs md:max-w-none overflow-hidden">
        <img :src="article.image_path">
        <div class="p-3">
            <span class="text-sm text-primary">{{ article.created_at ?? '' }} by {{ article.user.name }}</span>
            <img class="w-5 h-5 rounded" :src="article.user.profile_photo_url" :alt="article.user.name">
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
    }
}
</script>