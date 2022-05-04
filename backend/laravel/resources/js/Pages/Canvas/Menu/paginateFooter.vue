<template>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-nowrap justify-center">
            <div v-for="(link, index) in links" :key="index">
                <a class="page-no p-1 mr-1" href="#" @click="setPage(link.label)">{{ link.label }}</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['links'],
    methods: {
        setPage( page ) {
            this.$emit('pagechanged', page);
        }
    }
}
</script>