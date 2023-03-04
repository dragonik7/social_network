<template>
	<div class="flex align-items-center justify-center">
		<div class="bgShadow rounded-lg px-10 py-4">
			<div id="post-header" class="relative flex align-items-center justify-between mb-10">
				<div class="flex align-items-center justify-center gap-4">
					<a class="rounded-[50%] w-[60px]" href="#"> <img class="rounded-[50%]"
																	 src="https://pixelbox.ru/wp-content/uploads/2021/04/cats-ava-steam-42.jpg"
																	 alt=""> </a>
					<div class="flex flex-col align-items-center justify-center">
						<a class="hover:opacity-80 transition ease-in-out" href="#">{{ post.user.name }}</a>
						<p class="text-xs opacity-90">{{ post.created_at }}</p>
					</div>
				</div>
				<a id="post-more" href="#" class="flex p-2">
					<div class="flex gap-y-0.5 flex-col align-items-center justify-center">
						<div class="post-more"></div>
						<div class="post-more"></div>
						<div class="post-more"></div>
					</div>
				</a>
			</div>

			<div class="relative">
				<div class="flex items-center justify-center gap-2">
					<img class="w-[700px] h-[350px] rounded-lg" :src="post.images[0]" alt="post image">
				</div>
			</div>

			<div class="mt-2 flex flex-col align-items-center justify-center mt-5">
				<p id="post-description" class="relative text-base mb-4 pt-3">{{ post.text }}</p>
			</div>

			<div id="post-action" class="relative flex align-items-center justify-around text-sm  pt-3">
				<p>лайк Кто лайкнул</p>
				<p>Комментарии</p>
				<p>Просмотров</p>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	name: "PostComponent",
	props: {
		post: null,
	},
	data() {
		return {}
	},
	computed: {}
}
</script>

<style scoped>

#post-more:hover .post-more {
	background-color: black;
	transition: all .2s linear;
}

.post-more {
	transition: all .2s linear;
	content: '';
	background-color: #6f6c6c;
	border-radius: 50%;
	height: 5px;
	width: 5px;
}

#post-header:after {
	position: absolute;
	display: block;
	bottom: -15px;
	content: '';
	height: 1px;
	width: 100%;
	background-color: whitesmoke;
	opacity: .2;
}

#post-action:before {
	position: absolute;
	top: 10px;
	margin-top: -15px;
	display: block;
	content: '';
	height: 1px;
	width: 100%;
	background-color: whitesmoke;
	opacity: .2;
}

</style>
