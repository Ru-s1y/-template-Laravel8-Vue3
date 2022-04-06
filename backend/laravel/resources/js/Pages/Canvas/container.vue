<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CanvasContainer from './canvasContainer.vue';
import ToolContainer from './toolContainer.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <tool-container
            v-bind:color="setting.color"
            v-on:setColor="setColor"
            v-on:setLineWidth="setLineWidth"
            v-on:switchEraser="switchEraser" />
        <canvas-container
            :setting="setting" />
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
            }
        }
    },
    methods: {
        setColor( color ) {
            this.setting.color = color;
        },
        setLineWidth( width ) {
            this.setting.lineWidth = width;
        },
        switchEraser( checked ) {
            this.setting.eraser = checked;
        }
    }
}
</script>
