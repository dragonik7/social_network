<template>
	<div class="w-[800px] mx-auto">
		<create-post-component/>
		<div class="mt-5" v-for="post in postStore.posts">
			<post-component :post="post"/>
		</div>
	</div>
</template>

<script>
import PostComponent from "../PostComponent/Post/PostComponent.vue";
import CreatePostComponent from "../PostComponent/CreatePostComponent.vue";
import usePostStore from "../../store/post";

export default {
	name: "ContentComponent",
	components: {PostComponent, CreatePostComponent},
	setup() {
		let postStore = usePostStore()
		return {
			postStore
		}
	},
	mounted() {
		this.postStore.fetchPosts();
	}
}
</script>

<style scoped>

</style>
