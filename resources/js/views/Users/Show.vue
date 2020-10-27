<template>
    <div>
        <div class="w-100 h-64 overflow-hidden">
            <img src="https://images.pexels.com/photos/2788430/pexels-photo-2788430.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="User Background Image" class="object-cover w-full">
        </div>
    </div>
</template>

<script>
    export default {
        name: "Show",

        data: () => {
            return {
                user: null,
                loading: true
            }
        },

        mounted() {

            axios.get('/api/users/' + this.$route.params.userId)
                .then(res => {
                    this.user = res.data;
                    this.loading = false;
                })
                .catch(error => {
                    console.log('Unable to fetch the user from the server');

                })
                .finally(() => {
                    this.loading = false;
                });


            axios.get('/api/posts/' + this.$route.params.userId)
                .then(res => {
                    this.posts = res.data;
                    this.loading = false;
                })
                .catch(error => {
                    console.log('Unable to fetch posts');
                    this.loading = false;
                });

        }
    }
</script>

<style scoped>

</style>
