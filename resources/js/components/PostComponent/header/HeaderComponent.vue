<template>
	<div class="container py-5 px-20 rounded-lg flex align-items-center justify-between">
		<router-link :to="{name:'home'}" class="w-[150px]">
			<img src="../../../../assets/logo/logo.png" alt="logo">
		</router-link>

		<div class="flex align-items-center justify-between gap-x-10">
			<div class="flex flex-col align-items-center justify-center">
				<div class="xl:w-50">
					<input
						type="text"
						class="bgDark form-control block w-full px-3 py-1 text-base font-normal text-gray-700 border-none rounded transition ease-in-out m-0 focus:text-gray-400 focus:outline-none"
						id="exampleText0"
						placeholder="поиск.."/>
				</div>
			</div>

			<ProfileComponent/>


		</div>
	</div>

</template>

<script>
import usePostStore from "../../../store/post";
import ProfileComponent from "./headerComponents/ProfileComponent.vue";

export default {
	name: "HeaderComponent",
	components: {ProfileComponent},
	setup() {
		let postStore = usePostStore()

		return {
			postStore
		}
	},
	mounted() {
		this.postStore.fetchUser();
	}
}

</script>

<style scoped>

</style>
