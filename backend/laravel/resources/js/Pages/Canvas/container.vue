<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CanvasContainer from './canvasContainer.vue';
import ToolContainer from './toolContainer.vue';
import CanvasRoomSelection from './canvasRoomSelection.vue';
</script>

<template>
    <AppLayout title="Canvas">
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
            v-if="currentRoom.id"
            :setting="setting"
            :roomId="currentRoom.id"
            :history="history"
            v-on:setHistory="setHistory"
            v-on:pushHistory="pushHistory"
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
        },
        history() {
            this.$refs.canvas.drawHistory();
        }
    },
    methods: {
        connect() {
            if ( !this.currentRoom.id ) return;
            let vm = this;
            this.getHistory();
            window.Echo.private( "canvas." + this.currentRoom.id )
            .listen('.canvas.new', e => {
                vm.pushHistory( e.stash );
                vm.$refs.canvas.drawHistory(); // watchで変更が検知できてないため記載
            });
        },
        disconnect( room ) {
            window.Echo.leave("canvas." + room.id );
        },
        getRooms() {
            axios.get('/canvas/rooms')
            .then(response => {
                this.canvasRooms = response.data;
                if (!this.currentRoom.id) {
                    this.currentRoom = response.data[0];
                }
            })
            .catch(error => {
                console.log(error);
            })
        },
        setRoom( room ) {
            this.getRooms()
            this.currentRoom = room;
        },
        getHistory() {
            if (this.roomId === undefined) return;
            axios.get('/canvas/room/' + this.roomId + '/history')
            .then(response => {
                this.setHistory( response.data );
            }).catch(error => {
                console.log(error);
            })
        },
        setHistory( history ) {
            this.history = history;
        },
        pushHistory( stash ) {
            this.history.push( stash );
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
