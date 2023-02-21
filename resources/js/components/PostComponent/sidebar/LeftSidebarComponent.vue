<template>
	<div class="flex flex-col justify-between rounded-lg h-screen p-4">
		<div class="flex flex-col gap-y-10">
			<nav-component/>
		</div>

		<div class="flex justify-between align-items-center">
			<a id="settings" href="#"><i class="bi bi-gear"></i>Иконка</a>
			<a id="logout" href="#" class="py-2 px-5">Выйти</a>
		</div>
	</div>
</template>

<script>
import NavComponent from "./nav/NavComponent.vue";

export default {
	name: "LeftSidebarComponent",
	components: {NavComponent}
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
