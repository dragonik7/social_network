<template>
	<div class="bgShadow container mx-auto">
		<header-component/>
	</div>
	<div class="flex container mx-auto mt-5">

		<div class="bgShadow w-1/5 py-4">
			<left-sidebar-component/>
		</div>

		<div class="flex flex-col align-items-center justify-between w-3/5">

			<create-post-component/>


			<div class="mt-5">
				<post-component/>
			</div>
			<div class="mt-5">
				<post-component/>
			</div>
			<div class="mt-5">
				<post-component/>
			</div>

		</div>

		<div class="bgShadow w-1/5 rounded-lg h-100 w-100 py-8 px-2">
			<right-sidebar-component/>
		</div>

	</div>
</template>

<script>
import SidebarComponent from "../PostComponent/sidebar/LeftSidebarComponent.vue";
import PostComponent from "../PostComponent/Post/ListPostsComponent.vue";
import HeaderComponent from "../PostComponent/header/HeaderComponent.vue";
import RightSidebarComponent from "../PostComponent/sidebar/RightSidebarComponent.vue";
import LeftSidebarComponent from "../PostComponent/sidebar/LeftSidebarComponent.vue";
import CreatePostComponent from "../PostComponent/CreatePostComponent.vue";

export default {
	name: "HomeComponent",
	components: {CreatePostComponent, LeftSidebarComponent, RightSidebarComponent, PostComponent, HeaderComponent},
}
</script>

<style scoped>



</style>
