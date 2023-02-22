<template>
	<div>
		<ul class="flex flex-col gap-y-3">
			<li class="flex align-items-center justify-between hover:bg-[#181924F7] transition easy-in-out rounded-lg py-2 px-4">
				Друзья <span>i</span>
			</li>

			<li class="flex align-items-center justify-between hover:bg-[#181924F7] transition easy-in-out rounded-lg py-2 px-4">
				Сообщения <span>i</span>
			</li>

			<li class="flex align-items-center justify-between hover:bg-[#181924F7] transition easy-in-out rounded-lg py-2 px-4">
				Группы <span>i</span>
			</li>
			<li class="flex align-items-center justify-between hover:bg-[#181924F7] transition easy-in-out rounded-lg py-2 px-4">
				Медиа <span>i</span>
			</li>


			<li class="flex align-items-center justify-between hover:bg-[#181924F7] transition easy-in-out rounded-lg py-2 px-4">
				Музыка <span>i</span>
			</li>
		</ul>
	</div>
</template>

<script>

export default {
	name: "NavComponent",
}
</script>

<style scoped>

a {
	display: flex;
	justify-content: space-between;
	align-items: center;
}

.line {
	height: 1px;
	width: 100%;
	background: linear-gradient(to right, white 1px, black);
	transition: .2s all linear;
}


</style>
