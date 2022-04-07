<template>
    <div>
        <input
            id="color"
            type="color"
            @change="$emit('setColor', $event.target.value)">
        <label for="color"> 線色</label>
    </div>
</template>