<template>
    <ul>
        <li class="text-lg font-semibold">目次</li>
        <li>{{ selected.title }}</li>
    </ul>
</template>

<script>
export default {
    props: ['selected']
}
</script>