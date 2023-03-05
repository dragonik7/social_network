<template>
	<div class="bgDark textLight min-h-[100vh] h-100 overflow-hidden">
		<div class="bgShadow container mx-auto">
			<header-component/>
		</div>
		<div class="flex container mx-auto mt-5">
			<div class="w-1/5">
				<left-sidebar-component @switchRSbar="isSwRSbar"/>
			</div>

			<div class="flex flex-col align-items-center justify-between relative w-3/5">
				<router-view/>
			</div>

			<Transition v-show="isNews" id="rSidebar" name="rSbar">
				<div class="w-1/5 w-100 bgShadow h-[100vh]">
					<right-sidebar-component ref="a"/>
				</div>
			</Transition>

		</div>
	</div>

</template>

<script>

import LeftSidebarComponent from "./components/PostComponent/sidebar/LeftSidebarComponent.vue";
import RightSidebarComponent from "./components/PostComponent/sidebar/RightSidebarComponent.vue";
import HeaderComponent from "./components/PostComponent/header/HeaderComponent.vue";
import {ref} from "vue";

export default {
	components: {LeftSidebarComponent, RightSidebarComponent, HeaderComponent},
	setup() {
		const isNews = ref(true)

		function isSwRSbar(onSwRSbar) {
			isNews.value = onSwRSbar.value
		}

		return {
			isNews, isSwRSbar
		}
	},
}
</script>

<style>
.bgDark {
	background-color: #181924F7;

}

.bgShadow {
	box-shadow: 0 0 15px 1px rgba(28, 27, 27, 1);
}

.bgDarkHover {
	background-color: #181924F7;
}

.textLight {
	color: #A49E9EFF;
}

.rSbar-enter-active,
.rSbar-leave-active {
	transition: all .1s linear;
}

.rSbar-enter-from,
.rSbar-leave-to {
	transform: scale(0);
	transform: translateX(500px);
}

.rSbar-enter-to,
.rSbar-leave-from {
	transform:translateX(0px) scale(1);
	transform:translateX(0px);
}
@tailwind base;
@tailwind components;
@tailwind utilities;
</style>


