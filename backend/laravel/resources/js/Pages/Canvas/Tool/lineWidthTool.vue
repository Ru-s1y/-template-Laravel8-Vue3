<template>
    <div>
        <input
            id="lineWidth"
            type="range"
            value="3"
            min="1"
            max="5"
            @change="$emit('setLineWidth', $event.target.value)">
        <label for="lineWidth"> 線幅</label>
    </div>
</template>