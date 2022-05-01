<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-center mb-2" v-for="(room, index) in rooms" :key="index">
                <div class="grid grid-cols-4 gap-4 items-center p-3 rounded-md canvas-list">
                    <p>{{ room.id }}. </p>
                    <p>{{ room.name }}</p>
                    <p>お部屋の概要が入る</p>
                    <div>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" @click="enterRoomButton(room)">Enter</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['rooms'],
    methods: {
        enterRoomButton( room ) {
            this.$emit('roomchanged', room);
        }
    }
}
</script>

<style scoped>
.canvas-list {
    /* border: 1px solid black; */
    background-color: white;
}
.canvas-list:last-child {
    margin-bottom: 0;
}
.enter-button {
    padding: .5rem;
    background-color: blue;
    color: white;
}
</style>