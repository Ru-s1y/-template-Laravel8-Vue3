<script setup>
import CreateRoomButton from '../Canvas/Menu/createRoomButton.vue';
</script>

<template>
    <div class="flex flex-row justify-end items-end side-padding ">
        <div class="flex-item">
            <CreateRoomButton />
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
</template>

<script>
export default {
    props: ['rooms', 'currentRoom'],
    data: function() {
        return {
            selected: ''
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
</style>
