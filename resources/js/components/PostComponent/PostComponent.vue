<template>
	<div class="flex container mx-auto">
		<div>
			<div>
				<list-posts-component/>
			</div>
			<div class="mt-3">
				<list-posts-component/>
			</div>

			<div class="mt-3">
				<list-posts-component/>
			</div>
		</div>
	</div>
</template>

<script>

import HeaderComponent from "../PostComponent/header/HeaderComponent.vue";
import SidebarComponent from "../PostComponent/sidebar/LeftSidebarComponent.vue";
import ListPostsComponent from "../PostComponent/Post/ListPostsComponent.vue";

export default {
	name: "PostComponent",
	components: {SidebarComponent, HeaderComponent, ListPostsComponent}
}
</script>

<style scoped>

</style>
