<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CanvasContainer from './canvasContainer.vue';
import ToolContainer from './toolContainer.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <tool-container v-bind:color="setting.color" v-on:setColor="setColor" />
        <canvas-container :setting="setting" />
    </AppLayout>
</template>

<script>
export default {
    data: function () {
        return {
            setting: {
                color: '#000',
                lineWidth: 3
            }
        }
    },
    methods: {
        setColor( color ) {
            this.setting.color = color;
        }
    }
}
</script>
