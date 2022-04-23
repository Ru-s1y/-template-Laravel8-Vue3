<template>
    <div>
        <p class="text-lg font-semibold">人気ランキング</p>
        <div v-for="rank, index in rankings" :key="index">
            {{ index + 1 }}. {{ rank.tag }}
        </div>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            rankings: []
        }
    },
    methods: {
        getRankings() {
            this.rankings = [
                { tag: "HTML" },
                { tag: "CSS" },
                { tag: "JavaScript" },
                { tag: "PHP" },
                { tag: "Ruby" },
                { tag: "Python" },
                { tag: "Go" },
            ]
        }
    },
    mounted() {
        this.getRankings()
    }
}
</script>