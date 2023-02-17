<template>
	<div class="flex justify-center">
		<div id="post-card" class="rounded-lg shadow-lg bg-white max-w-sm">
			<div class="p-6">
				<div class="flex align-items-center justify-between">
					<div class="flex align-items-center justify-center">
						<a id="post-link" href="#">
							<img id="post-ava" src="https://pixelbox.ru/wp-content/uploads/2021/04/cats-ava-steam-42.jpg" alt="">
						</a>
						<div class="flex flex-col align-items-center justify-center ml-3">
							<a href="#">Andrey Andreev</a>
							<p class="">3 минуты назад</p>
						</div>
					</div>

					<div>...</div>
				</div>
				<div class="mt-2 flex flex-col mt-5 w-[700px]">
					<div>
						<p id="post-description" class="text-gray-700 text-base mb-4">
							Описание
						</p>
					</div>
					<div class="flex justify-end gap-x-4">
						<button type="button"
								class="max-w-[15%] inline-block px-4 py-2.5 bg-red-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
							Отмена
						</button>

						<button type="button"
								class="max-w-[15%] inline-block px-4 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
							Отправить
						</button>
					</div>
				</div>

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
#post-card {
	min-width: 800px;
}

#post-description {
	border-radius: 10px;
	padding: 10px;
	min-height: 150px;
	box-shadow: 0 0 10px 1px #988282;
	box-shadow: 1px 1px 10px 1px #b59c9c inset;
}

#post-link {
	border-radius: 50%;
	width: 60px;
}

#post-ava {
	border-radius: 50%;
}
</style>
