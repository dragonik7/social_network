<template>
	<div class="bgDark textLight min-h-[100vh] h-100 overflow-hidden">
		<div class="bgShadow container mx-auto">
			<header-component :user="postStore.user"/>
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
					<right-sidebar-component/>
				</div>
			</Transition>
		</div>
	</div>

</template>

<script>
import PostComponent from "../../PostComponent/Post/PostComponent.vue";
import LeftSidebarComponent from "../../PostComponent/sidebar/LeftSidebarComponent.vue";
import RightSidebarComponent from "../../PostComponent/sidebar/RightSidebarComponent.vue";
import HeaderComponent from "../../PostComponent/header/HeaderComponent.vue";
import ContentComponent from "../ContentComponent.vue";
import {ref} from "vue";
import usePostStore from "../../../store/post";

export default {
	name: "mainPage",
	components: {ContentComponent, PostComponent, LeftSidebarComponent, RightSidebarComponent, HeaderComponent},
	setup() {
		const isNews = ref(true)
		let postStore = usePostStore()
		function WebSocketMessage() {
			Echo.channel('chat')
				.listen('MessageSentEvent', (data) => {
					data.push(MessageEvent)
				})
		}

		function isSwRSbar(onSwRSbar) {
			isNews.value = onSwRSbar.value
		}

		return {
			isNews, isSwRSbar, WebSocketMessage, postStore
		}
	},

	mounted() {
		this.WebSocketMessage();
		this.postStore.fetchUser();
	},

}
</script>

<style scoped>

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
</style>
