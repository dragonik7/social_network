<template>
	<div class="rounded-lg h-full py-8 px-2">
		<ul class="flex flex-col gap-y-3">
			<li class="flex cursor-pointer align-items-center justify-between hover:bg-[#181924F7] transition easy-in-out rounded-lg py-2 px-8">
				Настроить
				<i class="ri-equalizer-line"></i>
			</li>
			<p class="mx-auto opacity-60">Показывать</p>
			<li class="flex cursor-pointer align-items-center justify-between hover:bg-[#181924F7] transition easy-in-out rounded-lg py-2 px-4">
				Только фотографии
				<i class="ri-image-line"></i>
			</li>
			<p class="mx-auto opacity-60">Ваши</p>
			<li class="flex cursor-pointer align-items-center justify-between hover:bg-[#181924F7] transition easy-in-out rounded-lg py-2 px-4">
				Реакции
				<i class="ri-heart-line"></i>
			</li>
			<li class="flex cursor-pointer align-items-center justify-between hover:bg-[#181924F7] transition easy-in-out rounded-lg py-2 px-4">
				Комментарии
				<i class="ri-message-2-line"></i>
			</li>
		</ul>
	</div>
</template>

<script>
export default {
	name: "RightSidebarComponent",
}
</script>

<style scoped>

</style>
