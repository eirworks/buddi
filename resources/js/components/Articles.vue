<template>
    <div>
        <search-article></search-article>

        <div class="card my-2">
            <div class="card-body">
                <div class="text-muted category">Category</div>
                <div class="article-title"><router-link to="/">Title</router-link></div>
            </div>
        </div>
    </div>
</template>

<script>
    import SearchArticle from "./SearchArticle";
    export default {
        name: "Articles",
        components: {SearchArticle},
        data() {
            return {
                search_query: "",
                articles: [],
            }
        },
        methods: {
            apiGetArticles() {
                axios.get('/articles', {
                    params: {
                        q: this.search_query,
                    }
                })
                    .then(function (data) {

                    })
            }
        }
    }
</script>

<style scoped>
    .category {
        text-transform: uppercase;
        font-size: .75rem;
    }
    .article-title {
        font-size: 1.3rem;
    }
</style>