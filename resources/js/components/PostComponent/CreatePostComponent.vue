<template>
	<div class="flex align-items-center justify-center">
		<div class="bgShadow w-full w-100 flex items-center justify-between px-10 py-4 rounded-lg">
			<div class="flex gap-x-3 items-center justify-between">
				<img class="w-[50px] rounded-[50%]"
					 src="https://pixelbox.ru/wp-content/uploads/2022/08/avatars-viber-pixelbox.ru-29.jpg"
					 alt="">
				<input
					type="text"
					class="form-control block w-full px-3 py-1 text-base font-normal text-gray-700 bg-transparent focus:outline-none"
					id="exampleText0"
					placeholder="Что нового ?"/>
			</div>
			<div class="flex items-center justify-center">
				<ul class="flex items-center justify-center gap-3">
					<li>icon</li>
					<li>icon</li>
					<li>icon</li>
					<li>icon</li>
				</ul>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	name: "CreatePostComponent"
}
</script>

<style scoped>

</style>
