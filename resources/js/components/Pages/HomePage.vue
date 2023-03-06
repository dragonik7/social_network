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
import {ref} from "vue";


export default {
	name: "HomeComponent",
	components: {PostComponent, CreatePostComponent},

	setup() {
		const posts = ref(Array);
		function getPosts() {
			axios.get('api/posts/list')
				.then(response => {
					this.posts = response.data.data
				})
		}
		return {
			posts, getPosts
		}
	},
	mounted() {
		this.getPosts()
	}
}
</script>

<style scoped>

</style>
