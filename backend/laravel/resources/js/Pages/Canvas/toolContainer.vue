<script setup>
import ColorTool from './Tool/colorTool.vue';
import LineWidthTool from './Tool/lineWidthTool.vue';
import EraserTool from './Tool/eraserTool.vue';
</script>


<template>
    <div class="flex toolbox">
        <color-tool v-on:setColor="setColor" />
        <line-width-tool v-on:setLineWidth="setLineWidth" />
        <eraser-tool v-on:switchEraser="switchEraser" />
    </div>
</template>

<script>
export default {
    methods: {
        setColor( color ) {
            this.$emit('setColor', color);
        },
        setLineWidth( lineWidth ) {
            this.$emit('setLineWidth', lineWidth);
        },
        switchEraser( checked ) {
            this.$emit('switchEraser', checked);
        }
    }
}
</script>


<style scoped>
.toolbox {
    background-color: #fff;
    padding: 1em 2em;
    border-top: solid 1px #e5e7eb;
    justify-content: space-evenly;
}
</style>

