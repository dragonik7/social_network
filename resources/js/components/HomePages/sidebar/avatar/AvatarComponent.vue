<template>
		<div class="card flex flex-col justify-between align-items-center">
			<div class="card-head mx-auto rounded-full">
				<img src="https://pixelbox.ru/wp-content/uploads/2022/08/avatars-viber-pixelbox.ru-29.jpg" alt="">
			</div>
			<div id="links" class="img-body flex gap-6 justify-center align-items-center py-1 mt-4">
				<a href="#"><i class="bi bi-bell-fill"></i></a>
				<a href="#"><i class="bi bi-chat-fill"></i></a>
				<a href="#"><i class="bi bi-people-fill"></i></a>
			</div>
		</div>
</template>

<script>
export default {
	name: "AvatarComponent"
}
</script>

<style scoped>
.card {
	height: 200px;
}
.card-head {
	overflow: hidden;
	height: 150px;
}

img {
	height: 100%;
}

#links {
	border-radius: 10px;
	box-shadow: 0 0 5px 1px #f0c5c5;

}

i {
	color: #931034;
	font-size: 20px;
}

</style>
