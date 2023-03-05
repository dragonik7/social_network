<template>
	<div id="messages" class="flex items-center justify-around h-[90vh]">
		<div class="w-1/4 flex flex-col items-center justify-start bgShadow h-full">
			<input type="search" class="w-100" placeholder="Поиск пользователя..">
			<div class="w-full w-100">
				<p>Беседы</p>
				<div class="flex items-center py-2 px-4">
					<img src="" alt="ava">
					<div>
						<p>name</p>
						<p>message</p>
					</div>
				</div>
			</div>
		</div>
		<div class="w-2/4 border">
			chat

		</div>
	</div>
</template>

<script>
export default {
	name: "MessagesComponent",
	data() {
		return {}
	},

	methods: {},
}
</script>

<style scoped>

</style>
