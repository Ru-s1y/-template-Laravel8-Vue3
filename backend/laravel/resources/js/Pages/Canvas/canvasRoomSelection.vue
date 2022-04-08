<template>
    <div class="grid grid-clos-2 side-padding">
        <div>
            <select
                v-model="selected"
                @change="$emit('roomchanged', selected)"
                class="float-right"
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
</style>
