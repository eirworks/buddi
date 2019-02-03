<template>
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">

                    <Articles></Articles>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Articles from "./Articles";
    export default {
        name: "Home",
        components: {Articles}
    }
</script>

<style scoped>

</style>