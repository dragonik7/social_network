<template>
	<div class="flex flex-col justify-start rounded-lg bgShadow rounded-lg h-full py-8 px-4 w-[100%]">
		<ul id="ulList" class="flex flex-col gap-y-3 transition-[all .2s linear]">
			<router-link v-for="link in links" class="routerItem" :to="link.href">
				<div class="flex w-full items-center justify-between hover:bg-[#181924F7] rounded-lg py-2 px-4">
					<li id="news">
						{{ link.title }}
					</li>
					<span class="icon">{{ link.icon }}</span>
				</div>
			</router-link>
		</ul>
	</div>
</template>

<script>
export default {
	name: "LeftSidebarComponent",
	data() {
		return {
			onSwRSbar: Boolean,
			links: [
				{
					title: 'Новости',
					href: '/',
					icon: 'i',
				},
				{
					title: 'Друзья',
					href: '/friends',
					icon: 'i',
				},
				{
					title: 'Сообщений',
					href: '/messages',
					icon: 'i',
				},
				{
					title: 'Группы',
					href: 'groups',
					icon: 'i',
				},
				{
					title: 'Медиа',
					href: 'media',
					icon: 'i',
				},
			]
		}
	},
	methods: {
		watchSW() {
			let ulList = document.querySelectorAll('#ulList')[0];
			for (let i = 0; i < ulList.childNodes.length; i++) {
				this.isActive(ulList, i)
			}
		},
		isActive(ulList, i) {
			ulList.childNodes[i].addEventListener('click', () => {
				if (ulList.childNodes[i].href === 'http://localhost/') {
					this.onSwRSbar = true;
					this.switchRSbar()
				} else {
					this.onSwRSbar = false;
					this.switchRSbar()
				}
			});
		},
		switchRSbar() {
			this.$emit('switchRSbar', this.onSwRSbar);
		},
	},
	mounted() {
		this.watchSW();
	}
}
</script>

<style>
</style>



