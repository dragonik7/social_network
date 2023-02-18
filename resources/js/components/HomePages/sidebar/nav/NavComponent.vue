<template>
	<div>
		<ul id="ul" class="grid gap-y-2">
			<li class="flex align-items-center justify-between hover:bg-[#181924F7] transition easy-in-out rounded-lg py-2 px-3">
				<a class="w-full" href="#">
					<p>Друзья</p>
					<i class=""></i>
				</a>
			</li>
			<div class="line mx-auto"></div>
			<li class="flex align-items-center justify-between hover:bg-[#181924F7] transition easy-in-out rounded-lg py-2 px-3">
				<a class="w-full" href="#">
					<p>Группы</p>
					<i class="bi bi-people"></i>
				</a>
			</li>
			<div class="line mx-auto"></div>
			<li class="flex align-items-center justify-between hover:bg-[#181924F7] transition easy-in-out rounded-lg py-2 px-3">
				<a class="w-full" href="#">
					<p>Медиа</p>
					<i class="bi bi-collection"></i>
				</a>
			</li>
			<div class="line mx-auto"></div>

			<li class="flex align-items-center justify-between hover:bg-[#181924F7] transition easy-in-out rounded-lg py-2 px-3">
				<a class="w-full" href="#">
					<p>Сообщения</p>
					<i class="bi bi-chat"></i>
				</a>
			</li>
			<div class="line mx-auto"></div>

			<li class="flex align-items-center justify-between hover:bg-[#181924F7] transition easy-in-out rounded-lg py-2 px-3">
				<a class="w-full" href="#">
					<p>Музыка</p>
					<i class="bi bi-music-note-beamed"></i>
				</a>
			</li>
			<div class="line mx-auto"></div>

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
