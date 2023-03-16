<template>
	<div class="bgDark flex items-center justify-center h-[100vh]">
		<div class="w-350 bg-white flex flex-col border-[1px] rounded-lg">
			<div class="flex items-center justify-center text-center border-b-2">
				<router-link :to="{name: 'login'}" class="w-3/6 hover:w-4/5 w-full text-center py-3 hover:bg-gray-500/20 cursor-pointer transition-[2s] transition-linear">
					Вход
				</router-link>
				<router-link :to="{name: 'register'}"
							 class="w-3/6 hover:w-4/5 w-full text-center py-3 hover:bg-gray-500/20 cursor-pointer transition-[2s] transition-linear">
					Регистрация
				</router-link>
			</div>
			<div class="flex flex-col items-center justify-center gap-y-5 p-5 rounded-lg">


				<div class="flex flex-col gap-y-1">
					<label for="name">Login</label>
					<input class="inp bg-[#D9D4D4D1] px-4 py-2 rounded-lg" type="text" name="name" v-model="form.name"
						   placeholder="login">
				</div>

				<div class="flex flex-col gap-y-1">
					<label for="email">Email</label>
					<input class="inp bg-[#D9D4D4D1] px-4 py-2 rounded-lg" type="text" name="email" v-model="form.email"
						   placeholder="email">
				</div>

				<div class="flex flex-col gap-y-1">
					<label for="password">Password</label>
					<input class="inp bg-[#D9D4D4D1] px-4 py-2 rounded-lg" type="text" name="password"
						   v-model="form.password"
						   placeholder="password">
				</div>
				<div class="flex flex-col gap-y-1">
					<label for="password_confirmation">Password</label>
					<input class="inp bg-[#D9D4D4D1] px-4 py-2 rounded-lg" type="text" name="password_confirmation"
						   v-model="form.password_confirmation"
						   placeholder="password comfired">
				</div>

				<div class="flex flex-col gap-y-1">
					<label for="phone_number">Telephone</label>
					<input class="inp bg-[#D9D4D4D1] px-4 py-2 rounded-lg" type="text" name="phone_number"
						   v-model="form.phone_number"
						   placeholder="+7 9281234567">
				</div>

				<div class="flex flex-col gap-y-1">
					<label for="avatar">Choose your photo</label>
					<input class="inp bg-[#D9D4D4D1] px-4 py-2 rounded-lg" type="file" name="avatar"
						   @change="form.avatar"
						   placeholder="image">
				</div>

				<div class="w-100 mt-5">
					<button type="button" @click.prevent="postStore.regUser(form)"
							class="bg-white hover:bg-gray-100 py-1 px-5 border border-gray-400 rounded shadow">
						Отправить
					</button>
				</div>

				<div class="flex items-center justify-center w-full mt-2">
					<p class="w-1/2 text-right">
						Уже есть аккаунт?
					</p>
					<router-link :to="{name: 'login'}" class="w-1/2 text-sm cursor-pointer text-center text-blue-500">Войти</router-link>

				</div>
			</div>

		</div>
	</div>
</template>

<script>

import usePostStore from "../../../store/post";

export default {
	name: "RegisterPage",

	setup() {
		let postStore = usePostStore()

		let form = {
			name: null,
			email: null,
			password: null,
			password_confirmation: null,
			phone_number: null,
			avatar: null,
		}
		return {
			form, postStore
		}
	},
}
</script>

<style scoped>
.inp {
	outline: none;
	box-shadow: 0 0 4px 1px #807777 inset;
}
</style>
