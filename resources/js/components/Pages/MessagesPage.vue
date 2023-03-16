<template>
	<div id="messages" class="flex items-start justify-between rounded-lg h-[80vh]">
		<div class="w-2/5 w-[400px] flex flex-col items-center justify-center bgShadow rounded-lg p-3">
			<div class="flex justify-between items-center py-3 px-4 gap-x-3 w-full border-b-2 border-gray-500/40">
				<i class="ri-search-2-line"></i>
				<input type="search" placeholder="поиск" class="outline-none border-gray-500/10 py-0.5 px-3 text-gray-600 w-100 rounded">
				<i class="ri-add-line cursor-pointer transition-[2s] hover:text-[lightgreen] text-lg"></i>
			</div>

			<div class="flex items-start justify-around w-full py-4 px-3 border-b-2 border-gray-500/40">
				<div>
					<img src="" alt="a">
				</div>
				<div>
					<div class="text-light">Виктор Подволоцкий</div>
					<div class="text-sm text-gray-500">dsadsadsa...</div>
				</div>
				<div>12:25</div>
			</div>

			<div class="flex items-start justify-around w-full py-4 px-3 border-b-2 border-gray-500/40">
				<div>
					<img src="" alt="a">
				</div>
				<div>
					<div class="text-light">Виктор Подволочкий</div>
					<div class="text-sm text-gray-500">dsadsadsa...</div>
				</div>
				<div>12:25</div>
			</div>

			<div class="flex items-start justify-around w-full py-4 px-3 border-b-2 border-gray-500/40">
				<div>
					<img src="" alt="a">
				</div>
				<div>
					<div class="text-light">Виктор Подволочкий</div>
					<div class="text-sm text-gray-500">dsadsadsa...</div>
				</div>
				<div>12:25</div>
			</div>
		</div>

		<div class="w-3/5 w-full flex flex-col items-center justify-center h-[600px]">
			<div class="w-full bg-[#121924F7] h-100 h-full"></div>
			<div class="w-full w-100 flex items-center justify-center">
				<input type="text">
			</div>
		</div>
	</div>
</template>

<script>
import usePostStore from "../../store/post";

export default {
	name: "MessagesComponent",
	setup() {
		let postStore = usePostStore()
		let mes = {
			text: 'Helloo',
			recipient: 1,
			messageable_id: 1,
			messageable_type: postStore.user,
		}

		async function getMessages() {
			await axios.post('/api/messages', mes)
				.then(res => {
					mes = res.data.data
				});
		}

		return {
			getMessages, postStore
		}
	},
	mounted() {
		this.postStore.fetchUser();
		this.getMessages();
	},
}
</script>

<style scoped>

</style>
