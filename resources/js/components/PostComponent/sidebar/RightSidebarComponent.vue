<template>
	<div class="rounded-lg h-full py-8 px-2">
		<ul class="flex flex-col gap-y-3">
			<li class="flex align-items-center justify-between hover:bg-[#181924F7] transition easy-in-out rounded-lg py-2 px-8">
				Настроить <span>i</span>
			</li>
			<p class="mx-auto opacity-60">Показывать</p>
			<li class="flex align-items-center justify-between hover:bg-[#181924F7] transition easy-in-out rounded-lg py-2 px-4">
				Только фотографии <span>i</span>
			</li>
			<li class="flex align-items-center justify-between hover:bg-[#181924F7] transition easy-in-out rounded-lg py-2 px-4">
				Только видео <span>i</span>
			</li>
			<p class="mx-auto opacity-60">Ваши</p>
			<li class="flex align-items-center justify-between hover:bg-[#181924F7] transition easy-in-out rounded-lg py-2 px-4">
				Реакции <span>i</span>
			</li>
			<li class="flex align-items-center justify-between hover:bg-[#181924F7] transition easy-in-out rounded-lg py-2 px-4">
				Комментарии <span>i</span>
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
