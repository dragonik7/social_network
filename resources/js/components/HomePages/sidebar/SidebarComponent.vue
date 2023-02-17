<template>
	<div class="flex flex-col justify-between h-screen py-4 px-14">
		<div>
			<div><AvatarComponent/></div>
			<div class="mt-7"><nav-component/></div>
		</div>

		<div class="flex justify-between align-items-center">
			<a id="settings" href="#"><i class="bi bi-gear"></i></a>
			<a id="logout" href="#" class="py-2 px-5">Выйти</a>
		</div>
	</div>
</template>

<script>
import NavComponent from "./nav/NavComponent.vue";
import Avatar from "./avatar/AvatarComponent.vue";
import AvatarComponent from "./avatar/AvatarComponent.vue";

export default {
	name: "SidebarComponent",
	components: {AvatarComponent, NavComponent}
}
</script>

<style scoped>
#logout {
	border-radius: 10px;
		box-shadow: 0 0 5px 1px #5d5b5b;
	transition: .4s all linear;
}
#logout:active {
	box-shadow: 0 0 10px 1px #4a4747 inset;
	transition: .4s all linear;
}
</style>
