<script setup>
import CreateRoomButton from '../Canvas/Menu/createRoomButton.vue';
</script>

<template>
    <div class="flex side-padding">
        <div class="flex-item">
            <div class="font-bold text-2xl">{{ currentRoom.name }}</div>
        </div>
        <div class="flex flex-row justify-end items-end right-box">
            <div class="flex-item">
                <CreateRoomButton v-on:roomChange="roomChange" />
            </div>
            <div class="flex-item">
                <select
                    v-model="selected"
                    @change="$emit('roomchanged', selected)"
                >
                    <option
                        v-for="(room, index) in rooms"
                        :key="index"
                        :value="room"
                    >
                        {{ room.name }}
                    </option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['rooms', 'currentRoom'],
    data: function() {
        return {
            selected: ''
        }
    },
    methods: {
        roomChange( room ) {
            this.selected = room;
            this.$emit('roomchanged', room);
        }
    },
    created() {
        this.selected = this.currentRoom;
    }
}
</script>

<style scoped>
.side-padding {
    padding: 0.5em 1em;
}
.flex-item {
    padding-left: 1em;
}
.right-box {
    margin-left: auto;
}
</style>
