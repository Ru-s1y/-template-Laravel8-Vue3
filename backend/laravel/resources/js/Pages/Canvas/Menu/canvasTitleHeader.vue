<template>
    <div class="flex flex-nowrap my-2 mx-5 items-center">
        <div class="text-gray-600 text-xl">
            <h1>{{ selected.name }}</h1>
        </div>
        <div class="ml-auto">
            <a href="#" @click="backRoomSelect()">&lt;&lt;退室する</a>
        </div>
    </div>
</template>

<script>
export default {
    props: ['selected'],
    methods: {
        backRoomSelect() {
            this.$emit('roomchanged', {});
        }
    }
}
</script>
