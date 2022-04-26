<script setup>
    import TitleLogo from '../components/TitleLogoWrapper.vue';
</script>

<template>
    <div class="welcome-container">
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <TitleLogo />
            自分の最近の活動やこれからの実装について
        </div>

        <div v-for="task, index in tasks" :key="index">
            <div class="mb-3 p-6 sm:px-20 bg-white border-b border-gray-200">
                ● {{ task }}
            </div>
        </div>
    </div>
</template>

<script>
import gsap from "gsap";
export default {
    data: function () {
        return {
            tasks: [
                "記事一覧ページの改修",
                "GSAPの導入",
                "記事のCRUD",
                "記事ページの作成",
                "キャンバスページの新規部屋作成機能実装",
            ]
        }
    },
    mounted() {
        gsap.fromTo(".welcome-container",
            { opacity: 0 },
            { opacity: 1 }
        )
    }
}
</script>

