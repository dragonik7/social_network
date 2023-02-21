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

import HeaderComponent from "../HomePages/header/HeaderComponent.vue";
import SidebarComponent from "../HomePages/sidebar/LeftSidebarComponent.vue";
import ListPostsComponent from "../HomePages/Post/ListPostsComponent.vue";

export default {
	name: "PostComponent",
	components: {SidebarComponent, HeaderComponent, ListPostsComponent}
}
</script>

<style scoped>

</style>
