<template>
    <div>
        <div class="text-lg font-semibold">検索</div>
        <div class="input-box">
            <label for="title">キーワード検索</label>
            <input type="text" name="title" placeholder="キーワードを入力" class="w-full">
        </div>
        <div class="input-box">
            <label for="tagList">タグ検索</label>
            <select name="tagList rounded-md" v-model="select.tag">
                <option v-for="tag, index in tags" :key=index v-bind="tag.id">
                    {{ tag.name }}
                </option>
            </select>
        </div>
        <div class="input-box">
            <div>
                <label for="type-created">作成日時：</label>
                <input type="radio" name="type-created" v-model="select.type" value="created">
            </div>
            <div>
                <label for="type-updated">更新日時：</label>
                <input type="radio" name="type-updated" v-model="select.type" value="updated">
            </div>
            <div>
                <label for="type-favorite">いいね数：</label>
                <input type="radio" name="type-favorite" v-model="select.type" value="favorite">
            </div>
        </div>
        <div class="input-box">
            <div>
                <label for="sort-asc">昇順：</label>
                <input type="radio" name="sort-asc" v-model="select.sort" value="asc">
            </div>
            <div>
                <label for="sort-desc">降順：</label>
                <input type="radio" name="sort-desc" v-model="select.sort" value="desc">
            </div>
        </div>
    </div>
</template>

<script>
const tagList = [
    { id: 0, name: "HTML" },
    { id: 1, name: "CSS" },
    { id: 2, name: "JavaScript" },
    { id: 3, name: "PHP" },
    { id: 4, name: "Python" },
    { id: 5, name: "Go" },
    { id: 6, name: "Ruby" },
    { id: 7, name: "MySql" },
];
export default {
    data: function () {
        return {
            select: {
                title: '',
                tag: '',
                type: '',
                sort: ''
            },
            tags: []
        }
    },
    methods: {
        getTags() {
            this.tags = tagList
        },
    },
    mounted() {
        this.getTags()
    }
}
</script>

<style scoped>
.input-box {
    margin-bottom: 0.5rem;
}
.input-bot:last-child {
    margin-bottom: 0;
}
</style>