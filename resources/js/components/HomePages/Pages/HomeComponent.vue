<template>
	<div class="container mx-auto">
		<header-component/>
	</div>
	<div class="flex container mx-auto mt-5">
		<div class="w-1/4 shadow-lg border-1">
			<!--			<router-view/>-->
			<sidebar-component/>
		</div>
		<div class="w-3/4 border-1">
			<div>
				<post-component/>
			</div>
			<div class="mt-3">
				<post-component/>
			</div>

			<div class="mt-3">
				<post-component/>
			</div>
		</div>
	</div>
</template>

<script>
import SidebarComponent from "../sidebar/SidebarComponent.vue";
import PostComponent from "../Post/ListPostsComponent.vue";
import HeaderComponent from "../header/HeaderComponent.vue";
export default {
	name: "HomeComponent",
	components: {PostComponent, SidebarComponent, HeaderComponent},
}
</script>

<style scoped>

</style>
