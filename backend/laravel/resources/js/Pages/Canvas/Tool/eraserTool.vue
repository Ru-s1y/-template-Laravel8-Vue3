<template>
    <div>
        <input
            id="eraser-checked"
            type="checkbox"
            @change="$emit('switchEraser', $event.target.checked)">
        <label for="eraser-checked"> 消しゴム</label>
    </div>
</template>