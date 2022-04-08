<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CanvasContainer from './canvasContainer.vue';
import ToolContainer from './toolContainer.vue';
import CanvasRoomSelection from './canvasRoomSelection.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <div>
            <canvas-room-selection
                v-if="currentRoom.id"
                :rooms="canvasRooms"
                :currentRoom="currentRoom"
                v-on:roomchanged="setRoom( $event )"
            />
        </div>
        <tool-container
            v-bind:color="setting.color"
            v-on:setColor="setColor"
            v-on:setLineWidth="setLineWidth"
            v-on:switchEraser="switchEraser" />
        <canvas-container
            :setting="setting"
            :roomId="currentRoom.id"
            ref="canvas" />
    </AppLayout>
</template>

<script>
export default {
    data: function () {
        return {
            setting: {
                color: '#000',
                lineWidth: '3',
                eraser: false
            },
            canvasRooms: [],
            currentRoom: [],
            history: []
        }
    },
    watch: {
        currentRoom( val, oldVal ) {
            if ( oldVal.id ) {
                this.disconnect( oldVal );
            }
            this.connect();
        }
    },
    methods: {
        connect() {
            if ( !this.currentRoom.id ) return;
            let vm = this;
            this.$refs.canvas.getHistory();
            window.Echo.private( "canvas." + this.currentRoom.id )
            .listen('.canvas.new', e => {
                vm.$refs.canvas.getHistory();
            });
        },
        disconnect( room ) {
            window.Echo.leave("canvas." + room.id );
        },
        getRooms() {
            axios.get('/canvas/rooms')
            .then(response => {
                this.canvasRooms = response.data;
                this.currentRoom = response.data[0];
            })
            .catch(error => {
                console.log(error);
            })
        },
        setRoom( room ) {
            this.currentRoom = room;
        },
        setColor( color ) {
            this.setting.color = color;
        },
        setLineWidth( width ) {
            this.setting.lineWidth = width;
        },
        switchEraser( checked ) {
            this.setting.eraser = checked;
        },
    },
    created() {
        this.getRooms();
    }
}
</script>
