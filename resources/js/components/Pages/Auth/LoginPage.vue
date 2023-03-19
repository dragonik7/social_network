<template>
	<div class="bgDark flex flex-col items-center justify-center h-[100vh]">
		<div class="w-350 bg-white flex flex-col border-[1px] rounded-lg">
			<div class="flex items-center text-center border-b-2">
				<router-link :to="{name: 'login'}"
							 class="w-2/4 hover:w-3/5 w-full text-center py-3 hover:bg-gray-500/20 cursor-pointer transition-[2s] transition-linear">
					Вход
				</router-link>
				<router-link :to="{name: 'register'}"
							 class="w-2/4 hover:w-3/5 w-full text-center py-3 hover:bg-gray-500/20 cursor-pointer transition-[2s] transition-linear">
					Регистрация
				</router-link>
			</div>
			<div class="flex flex-col items-center justify-center gap-y-5 p-5 rounded-lg">

				<div class="flex flex-col gap-y-1">
					<label for="email">Email</label>
					<input v-model="formLogin.email" class="inp bg-[#D9D4D4D1] px-4 py-2 rounded-lg" name="email"
						   placeholder="email"
						   type="text">
				</div>

				<div class="flex flex-col gap-y-1">
					<label for="password">Password</label>
					<input v-model="formLogin.password" class="inp bg-[#D9D4D4D1] px-4 py-2 rounded-lg"
						   name="password"
						   placeholder="password"
						   type="password">
				</div>

				<div class="w-full text-right text-sm cursor-pointer text-blue-500">
					Забыли пароль?
				</div>

				<div>
					<button class="bg-white hover:bg-gray-100 py-1 px-5 border border-gray-300 rounded shadow"
							type="button"
							@click.prevent="login">
						Отправить
					</button>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import router from "../../../router/router";
import setTokenLocal from "../../../Utils/setTokenLocal";
import {ref} from "vue";

export default {
	name: "LoginPage",
	setup() {
		let formLogin = {
			email: null,
			password: null,
		}
		const user = ref(Array);

		async function login() {
			await axios.post('/api/user/login', formLogin)
				.then(res => {
					let userToken = res.data.data.token
					setTokenLocal(userToken)
					user.value = res.data.data.user
					router.push({name: 'home'})

				})
				.catch(error => {
					if (error.response) {
						console.log(error.response.data);
						console.log(error.response.status);
						console.log(error.response.headers);
					} else if (error.request) {
						console.log(error.request);
					} else {
						console.log('Error', error.message);
					}
					console.log(error.config);
				});
		}

		return {
			formLogin, login
		}
	},
}
</script>

<style scoped>

</style>
