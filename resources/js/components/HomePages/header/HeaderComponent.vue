<template>
	<div class="container py-5 px-20 rounded-lg flex align-items-center justify-between">
		<a href="#" class="w-[150px]"> <img src="../../../../assets/logo/logo.png" alt="logo"> </a>

		<div class="flex align-items-center justify-between gap-x-10">
			<div class="flex flex-col align-items-center justify-center">
				<div class="xl:w-50">
					<input
						type="text"
						class="bgDarkHover form-control block w-full px-3 py-1 text-base font-normal text-gray-700 border-none rounded transition ease-in-out m-0 focus:text-gray-400 focus:outline-none"
						id="exampleText0"
						placeholder="поиск.."/>
				</div>
			</div>
			<div id="header-profile"
				 class="h-full flex items-center justify-center gap-1 cursor-pointer">
				<div id="img-profile" class="relative w-[50px] rounded-[50%]">
					<img class="w-[50px] overflow-hidden rounded-[50%]"
						  src="https://pixelbox.ru/wp-content/uploads/2022/08/avatars-viber-pixelbox.ru-29.jpg" alt="">
				</div>


				<div class="relative flex flex-col align-items-center justify-center pt-2">
					<div id="arrow-down"></div>
				</div>
			</div>
		</div>
	</div>

</template>

<script>
export default {
	name: "HeaderComponent",
}


</script>

<style scoped>

#img-profile {
	outline: white;

}

#img-profile:before {
	position: absolute;
	content: '';
	top: -4px;
	right: -4px;
	bottom: -4px;
	left: -4px;
	border-top: 2px solid white;
	border-right: 2px solid white;
	border-radius: 50%;
	transition: all .1s linear;
	opacity: 0;
}
#img-profile:after {
	position: absolute;
	content: '';
	top: -4px;
	right: -4px;
	bottom: -4px;
	left: -4px;
	border-bottom: 2px solid white;
	border-left: 2px solid white;
	border-radius: 50%;
	transition: all .1s linear;
	opacity: 0;

}

#img-profile:hover:before,
#img-profile:hover:after {
	transform: rotate(180deg);
	border-radius: 100%;
	opacity: .5;
}

#arrow-down:after,
#arrow-down:before {
	content: '';
	position: absolute;
	top: 50%;
	right: -12px;
	transform: translateY(-50%);
	rotate: 45deg;
	width: 8px;
	height: 8px;
	border-right: 1px solid white;
	border-bottom: 1px solid white;
	animation: arrow 3s linear infinite;
}

@keyframes arrow {
	0% {
		transform: translate(-2px, -2px);
		opacity: 0;
	}
	50% {
		transform: translate(2px, 2px);
		opacity: 1;
	}

	100% {
		transform: translate(-2px, -2px);
		opacity: 0;
	}
}

</style>
