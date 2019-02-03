<template>
    <div>
        <div class="card my-1">
            <div class="card-body">
                <input type="text" name="q" v-model="search" @keyup.enter="searchArticle()" placeholder="Search an article" class="form-control">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SearchArticle",
        data() {
            return {
                search: ""
            }
        },
        methods: {
            searchArticle() {}
        }
    }
</script>

<style scoped>

</style>