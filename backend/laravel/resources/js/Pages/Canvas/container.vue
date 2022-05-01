<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CanvasContainer from './canvasContainer.vue';
import ToolContainer from './toolContainer.vue';
import CanvasRoomSelection from './canvasRoomSelection.vue';
import CanvasLists from './canvasLists.vue';
import CanvasTitleHeader from './Menu/canvasTitleHeader.vue';
import CreateRoomButton from './Menu/createRoomButton.vue';
</script>

<template>
    <AppLayout title="Canvas">
        <div v-if="!currentRoom.id">
            <div class="pt-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <create-room-button
                        v-on:roomchanged="setRoom( $event )" />
                </div>
            </div>
            <canvas-lists
                :rooms="canvasRooms"
                v-on:roomchanged="setRoom( $event )"
            />
        </div>
        <div v-else>
            <canvas-title-header
                :selected="currentRoom"
                v-on:roomchanged="setRoom( $event )" />
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
        </div>
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
            })
            .catch(error => {
                console.log(error);
            })
        },
        setRoom( room ) {
            this.getRooms(); ///新規作成後の情報を取得したいため
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
