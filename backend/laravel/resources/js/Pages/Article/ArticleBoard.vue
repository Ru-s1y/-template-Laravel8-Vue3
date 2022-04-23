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
            <h1>{{ selected.title }}</h1>
            <p>{{ selected.content }}</p>
            <p>
                {{ selected.created_at ? 'created_at' + selected.created_at : '' }}
                by {{ selected.user.name }}
            </p>
        </div>
    </div>
</template>

<script>
import gsap from 'gsap';
export default {
    props: ['selected'],
    methods: {
        unsetSelected() {
            this.$emit("setArticle", {});
        }
    },
    mounted() {
        gsap.fromTo(".article-board",
            { opacity: 0 },
            { opacity: 1 }
        )
    }
}
</script>
