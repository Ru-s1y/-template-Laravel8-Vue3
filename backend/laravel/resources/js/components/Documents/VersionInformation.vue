<template>
    <div>
        <table class="table-fixed text-gray-600">
            <thead>
                <tr>
                    <th>使用技術</th>
                    <th>バージョン</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Laravel</td>
                    <td>v{{ laravelVersion }} (PHP v{{ phpVersion }})</td>
                </tr>
                <tr>
                    <td>Vue.js</td>
                    <td>v3.2.31</td>
                </tr>
                <tr>
                    <td>MySQL</td>
                    <td>v8.0</td>
                </tr>
                <tr>
                    <td>Nginx</td>
                    <td>v1.21.6</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: ['laravelVersion', 'phpVersion']
}
</script>

<style scoped>
td, th {
    padding: .2rem .5rem;
}
</style>