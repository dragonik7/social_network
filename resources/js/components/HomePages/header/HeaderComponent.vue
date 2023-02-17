<template>
	<div class="container py-5 px-20 shadow-lg rounded-lg flex align-items-center justify-between">
		<a href="#" class="w-[150px]"> <img src="../../../../assets/logo/logo.png" alt="logo"> </a>

		<div class="flex align-items-center justify-between gap-x-10">
			<div class="flex flex-col align-items-center justify-center">
				<div class="xl:w-50">
					<input
						type="text"
						class="form-control block w-full px-3 py-1 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
						id="exampleText0"
						placeholder="поиск.."/>
				</div>
			</div>
			<div id="header-profile" class="h-fit py-2 px-5 flex align-items-center justify-center gap-3 cursor-pointer">
				Профиль
				<i class="bi bi-caret-down"></i>
			</div>
		</div>
	</div>

</template>

<script>
export default {
	name: "HeaderComponent"
}
</script>

<style scoped>
#header-profile {
	border-radius: 5px;
	box-shadow: 0 0 5px 1px #958f8f;
	opacity: 80%;
}
</style>
