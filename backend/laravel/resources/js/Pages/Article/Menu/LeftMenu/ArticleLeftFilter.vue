<template>
    <div>
        <div class="text-lg font-semibold">検索</div>
        <div class="input-box">
            <label for="title">キーワード検索</label>
            <input type="text" name="keywords" placeholder="キーワードを入力" class="w-full" v-model="inputs.keywords">
        </div>
        <div class="input-box">
            <label for="tagList">タグ検索</label>
            <select name="tagList rounded-md" v-model="inputs.tag">
                <option value="">全て</option>
                <option v-for="tag, index in tags" :key=index v-bind="tag.id">
                    {{ tag.name }}
                </option>
            </select>
        </div>
        <div class="input-box">
            <div>
                <label for="type-created">作成日時：</label>
                <input type="radio" name="type-created" v-model="inputs.type" value="created">
            </div>
            <div>
                <label for="type-updated">更新日時：</label>
                <input type="radio" name="type-updated" v-model="inputs.type" value="updated">
            </div>
            <div>
                <label for="type-favorite">いいね数：</label>
                <input type="radio" name="type-favorite" v-model="inputs.type" value="favorite">
            </div>
        </div>
        <div class="input-box">
            <div>
                <label for="sort-asc">昇順：</label>
                <input type="radio" name="sort-asc" v-model="inputs.sort" value="asc">
            </div>
            <div>
                <label for="sort-desc">降順：</label>
                <input type="radio" name="sort-desc" v-model="inputs.sort" value="desc">
            </div>
        </div>

        <div>
            <button class="m-1 py-1 px-2 bg-sky-700 hover:bg-sky-500 text-white rounded-md" @click="submitSearch">検索</button>
        </div>
    </div>
</template>

<script>
export default {
    props: ['parameter'],
    data: function () {
        return {
            inputs: {
                keywords: '',
                tag: '',
                type: '',
                sort: ''
            },
            tags: []
        }
    },
    methods: {
        getTags() {
            axios.get('/api/tag')
            .then(response => {
                this.tags = response.data;
            })
            .catch(error => {
                console.log(error);
            });
        },
        submitSearch() {
            this.$emit('setParameter', this.inputs);
        }
    },
    mounted() {
        this.getTags();
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