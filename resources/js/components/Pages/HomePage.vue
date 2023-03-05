<template>
	<div class="w-[800px] mx-auto">
		<create-post-component/>
		<div class="mt-5" v-for="post in posts">
			<post-component :post="post"/>
		</div>
	</div>
</template>

<script>
import PostComponent from "../PostComponent/Post/PostComponent.vue";
import CreatePostComponent from "../PostComponent/CreatePostComponent.vue";


export default {
	name: "HomeComponent",
	components: {PostComponent, CreatePostComponent},

	data() {
		return {
			posts: Array,
			show: true,
		}
	},

	methods: {
		getPosts() {
			axios.get('api/posts/list')
				.then(response => {
					this.posts = response.data.data
				})
		},
	},
	mounted() {
		this.getPosts()
	}
}
</script>

<style scoped>

</style>
