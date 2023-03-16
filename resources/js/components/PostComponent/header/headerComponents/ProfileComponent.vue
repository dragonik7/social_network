<template>
	<div id="header-profile"
		 class="h-full flex items-center justify-center gap-1 cursor-pointer">
		<div id="img-profile" class="relative w-[50px] rounded-[50%]" @click="toggleDropdown">
			<img class="w-[50px] overflow-hidden rounded-[50%]"
				 src="https://pixelbox.ru/wp-content/uploads/2022/08/avatars-viber-pixelbox.ru-29.jpg" alt="">
		</div>

		<div class="relative flex flex-col align-items-center justify-center pt-2">
			<div>
				<i class="ri-arrow-down-s-line" id="arrow-down" @click="toggleDropdown"></i>
			</div>
			<Transition name="bounce" class="absolute top-[50px] left-[-50px]">
				<div v-if="showDropdown">
					<div
						class="bgDark border-2 border-gray-500/50 absolute w-[150px] rounded flex flex-col items-center justify-center gap-y-3 left-[-30px]">
						<router-link :to="{name:'home'}" class="btn w-full p-1 text-center bgDarkHover">
							Профиль
						</router-link>
						<router-link :to="{name:'register'}" class="btn w-full p-1 text-center bgDarkHover">
							Настройки
						</router-link>
						<router-link :to="{name:'login'}" @click.prevent="logout" class="btn w-full p-1 text-center bgDarkHover">
							Выйти
						</router-link>

					</div>
				</div>
			</Transition>

		</div>
	</div>

</template>


<script>
import {ref} from "vue";

export default {
	name: "ProfileComponent",
	setup() {
		const showDropdown = ref(false)

		function toggleDropdown() {
			showDropdown.value = !showDropdown.value
		}

		function logout() {
			localStorage.removeItem('Bearer ')
		}

		return {
			toggleDropdown, showDropdown, logout
		}
	},
}
</script>

<style scoped>
.btn:hover {
	outline: 1px solid black;
}

.bounce-enter-active {
	animation: bounce-in .2s;
}

.bounce-leave-active {
	animation: bounce-in .2s reverse;
}

@keyframes bounce-in {
	0% {
		transform: scale(0);
	}
	50% {
		transform: scale(1.25);
	}
	100% {
		transform: scale(1);
	}
}
</style>
