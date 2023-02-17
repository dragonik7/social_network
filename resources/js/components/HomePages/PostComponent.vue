<template>
	<div class="container mx-auto">
		<HeaderComponent/>
	</div>
	<div class="flex container mx-auto mt-5">
		<div class="w-1/4 shadow-lg border-1">
			<sidebar-component/>
		</div>
		<div class="w-3/4 border-1">
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

import HeaderComponent from "./header/HeaderComponent.vue";
import SidebarComponent from "./sidebar/SidebarComponent.vue";
import ListPostsComponent from "./Post/ListPostsComponent.vue";

export default {
	name: "PostComponent",
	components: {SidebarComponent, HeaderComponent, ListPostsComponent}
}
</script>

<style scoped>

</style>
