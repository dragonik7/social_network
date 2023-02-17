<template>
	<div>
		<ul id="ul" class="grid gap-y-2 p-4">
			<li>
				<a href="#">
					<p>Друзья</p>
					<i class="bi bi-person-circle"></i> </a>
			</li>
			<div class="line mx-auto"></div>
			<li>
				<a href="#">
					<p>Группы</p>
					<i class="bi bi-people"></i> </a>
			</li>
			<div class="line mx-auto"></div>
			<li>
				<a href="#">
					<p>Медиа</p>
					<i class="bi bi-collection"></i> </a>
			</li>
			<div class="line mx-auto"></div>

			<li>
				<a href="#">
					<p>Сообщения</p>
					<i class="bi bi-chat"></i> </a>
			</li>
			<div class="line mx-auto"></div>

			<li>
				<a href="#">
					<p>Музыка</p>
					<i class="bi bi-music-note-beamed"></i> </a>
			</li>
			<div class="line mx-auto"></div>

		</ul>
	</div>
</template>

<script>
export default {
	name: "NavComponent"
}
</script>

<style scoped>

a {
	display: flex;
	justify-content: space-between;
	align-items: center;
	padding: 0 7px 0 7px;
}

.line {
	height: 1px;
	width: 100%;
	background: linear-gradient(to right, white 1px, black);
	transition: .2s all linear;
}

ul {
	border-radius: 15px;
	box-shadow: 0 0 5px 1px #f0c5c5;
}

</style>
