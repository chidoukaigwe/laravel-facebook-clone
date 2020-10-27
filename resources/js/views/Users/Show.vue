<template>
    <div class="flex flex-col items-center">
        <div class="relative mb-8">

            <div class="w-100 h-64 overflow-hidden z-10">
                <img src="https://images.pexels.com/photos/2788430/pexels-photo-2788430.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="User Background Image" class="object-cover w-full">
            </div>

            <div class="absolute flex items-center bottom-0 left-0 -mb-8 ml-12 z-20">
                <div class="w-32">
                    <img src="https://chido-designs.co.uk/images/main/Chido.jpg" alt="User Profile Image" class="object-cover w-32 h-32 border-4 border-gray-200 rounded-full shadow-lg">
                </div>
                <p class="text-2xl ml-4 text-gray-100">{{user.data.attributes.name}}</p>
            </div>
        </div>
         <p v-if="postLoading">Loading posts...</p>
        <!-- We are passing down/through the :post to the Post.vue component-->
        <Post v-else v-for="post in posts.data" :key="post.data.post_id" :post="post"/>

        <p v-if="!postLoading && posts.data.length < 1">No posts found. Get Started!</p>

    </div>
</template>

<script>

    import Post from '../../components/Post';

    export default {
        name: "Show",

        components: {
            Post,
        },

        data: () => {
            return {
                user: null,
                posts: null,
                userLoading: true,
                postLoading: true

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
                    this.userLoading = false;
                });


            axios.get('/api/users/' + this.$route.params.userId + '/posts')
                .then(res => {
                    this.posts = res.data;
                })
                .catch(error => {
                    console.log('Unable to fetch posts');
                })
                .finally(() => {
                    this.postLoading = false;
                });

        }
    }
</script>

<style scoped>

</style>
