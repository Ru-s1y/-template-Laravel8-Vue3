<template>
    <div class="flex toolbox">
        <input
            type="color"
            @change="$emit('setColor', $event.target.value)">
    </div>
</template>

<script>
export default {}
</script>

<style scoped>
.toolbox {
    background-color: #fff;
    padding: 1em 2em;
    border-top: solid 1px #e5e7eb;
    justify-content: space-evenly;
}
</style>

