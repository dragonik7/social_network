<template>
	<div class="flex flex-col justify-start rounded-lg bgShadow h-full py-8 px-4 w-[100%]">
		<ul id="ulList" class="flex flex-col gap-y-3">
			<router-link class="routerItem" :to="{name: 'content'}">
				<div class="flex w-full items-center justify-between hover:bg-[#181924F7] rounded-lg py-2 px-4">
					<li id="news">
						Новости
					</li>
					<i class="ri-article-line"></i>
				</div>
			</router-link>

			<router-link class="routerItem" :to="{name: 'friends'}">
				<div class="flex w-full items-center justify-between hover:bg-[#181924F7] rounded-lg py-2 px-4">
					<li id="news">
						Друзья
					</li>
					<i class="ri-user-line"></i>
				</div>
			</router-link>

			<router-link class="routerItem" :to="{name: 'messages'}">
				<div class="flex w-full items-center justify-between hover:bg-[#181924F7] rounded-lg py-2 px-4">
					<li id="news">
						Сообщения
					</li>
					<i class="ri-chat-3-line"></i>
				</div>
			</router-link>

<!--			<router-link class="routerItem" :to="{name: 'groups'}">-->
<!--				<div class="flex w-full items-center justify-between hover:bg-[#181924F7] rounded-lg py-2 px-4">-->
<!--					<li id="news">-->
<!--						Группы-->
<!--					</li>-->
<!--					<i class="ri-group-line"></i>-->
<!--				</div>-->
<!--			</router-link>-->

<!--			<router-link class="routerItem" :to="{name: 'media'}">-->
<!--				<div class="flex w-full items-center justify-between hover:bg-[#181924F7] rounded-lg py-2 px-4">-->
<!--					<li id="news">-->
<!--						Медиа-->
<!--					</li>-->
<!--					<i class="ri-camera-2-line"></i>-->
<!--				</div>-->
<!--			</router-link>-->
		</ul>
	</div>
</template>

<script>
import {ref} from "vue";

export default {
	name: "LeftSidebarComponent",
	setup(_, {emit}) {
		const onSwRSbar = ref(false)

		function watchSW() {
			let ulList = document.querySelectorAll('#ulList')[0];
			ulList.childNodes.forEach(function (el) {
				isActive(el)
			});
		}

		function isActive(el) {
			el.addEventListener('click', function () {
				if (el.href === 'http://localhost/content') {
					onSwRSbar.value = true;
					emit("switchRSbar", onSwRSbar);
				} else {
					onSwRSbar.value = false;
					emit("switchRSbar", onSwRSbar);
				}
			});
		}

		return {
			watchSW
		}
	},
	mounted() {
		this.watchSW();
	}
}
</script>

<style>
</style>



