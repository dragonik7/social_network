import {defineStore} from "pinia";
import router from "../router/router";

const usePostStore = defineStore('post', {
	state: () => ({
		posts: Array,
		user: Array,
	}),
	getters: {
		getPosts() {
			if (this.posts) {
				return this.posts
			} else {
				console.log('Ошибка получения данных о постах, попробуйте еще раз')
			}
		},
		getUser() {
			if (this.user) {
				return this.user
			} else {
				console.log('Ошибка получения данных пользователя, попробуйте еще раз')
			}
		},

	},
	actions: {
		async fetchPosts() {
			const res = await axios.get('api/posts/list')
			this.posts = res.data.data
		},

		async fetchUser() {
			const res = await axios.get('/api/user')
			this.user = res.data.data
		},

		regUser(form) {
			axios.post('/api/user/register', form)
				.then(() => {
					router.push({name: 'login'})
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
		},
	},
})

// computed свойство для геттеров
export default usePostStore
