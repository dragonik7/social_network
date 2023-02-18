<template>
	<div class="flex align-items-center justify-center">
		<div id="post-component" class="rounded-lg px-10">
			<div class="py-4 mx-auto w-[700px]">
				<div class="flex align-items-center justify-between">
					<div class="flex align-items-center justify-center gap-4">
						<a class="rounded-[50%] w-[60px]" href="#">
							<img class="rounded-[50%]" src="https://pixelbox.ru/wp-content/uploads/2021/04/cats-ava-steam-42.jpg" alt="">
						</a>
						<div class="flex flex-col align-items-center justify-center">
							<a class="hover:opacity-80 transition ease-in-out" href="#">Andrey Andreev</a>
							<p class="text-xs opacity-90">3 минуты назад</p>
						</div>
					</div>
					<a id="post-more" href="#" class="flex p-2">
						<div class="flex gap-y-0.5 flex-col align-items-center justify-center">
							<div class="dot"></div>
							<div class="dot"></div>
							<div class="dot"></div>
						</div>
					</a>
				</div>

				<div class="mt-2 flex flex-col align-items-center justify-center mt-5">
					<p id="post-description" class="text-base mb-4 border-t-[1.5px] pt-3">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquid aperiam beatae commodi
						consequatur, cum debitis deleniti dolore dolores eius eligendi expedita fugit incidunt iure modi
						odit officiis omnis praesentium provident quam quibusdam recusandae reiciendis rem repudiandae
						sed tempore ullam unde ut vel veniam vero vitae voluptas voluptatibus. Reiciendis, sit.
					</p>
				</div>

				<div class="flex align-items-center justify-around text-sm opacity-90 border-t-[1.5px] pt-3">
					<p>лайк Кто лайкнул</p>
					<p>Комментарии</p>
					<p>Просмотров</p>
				</div>

			</div>
		</div>
	</div>
</template>

<script>
export default {
	name: "PostComponent"
}
</script>

<style scoped>
#post-component {
	box-shadow: 0 0 10px 1px rgba(28, 27, 27, 0.96);
}
#post-more:hover .dot {
	background-color: black;
	transition: all .2s linear;
}

.dot {
	transition: all .2s linear;
	content: '';
	background-color: #6f6c6c;
	border-radius: 50%;
	height: 5px;
	width: 5px;
}
</style>
