<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CanvasContainer from './canvasContainer.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Canvas
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="canvas-area">
                        <canvas-container />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>
.canvas-area {
    padding: 5rem;
    background-color: gray;
}
</style>