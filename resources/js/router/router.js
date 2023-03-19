import {createRouter, createWebHistory} from "vue-router";

const routes = [
	{
		path: "/main_page",
		name: "home",
		component: () => import('../components/Pages/Main/MainPage.vue'),
		default: 'main_page',
		beforeEnter: (to, from, next) => {
			if (!localStorage.getItem('Bearer ')) {
				next('/login')
			} else next()
		},
		children: [
			{
				path: "/content",
				name: "content",
				component: () => import('../components/Pages/ContentComponent.vue'),
			},
			{
				path: "/friends",
				name: "friends",
				component: () => import('../components/Pages/PlugPage.vue'),
			},
			{
				path: "/messages",
				name: "messages",
				component: () => import('../components/Pages/MessagesPage.vue'),
			},
			{
				path: "/groups",
				name: "groups",
				component: () => import('../components/Pages/PlugPage.vue'),
			},
			{
				path: "/media",
				name: "media",
				component: () => import('../components/Pages/PlugPage.vue'),
			},
			{
				path: "/contact",
				name: "contact",
				component: () => import('../components/Pages/PlugPage.vue'),
			},
		]
	},
	{
		path: "/pages",
		name: "pages",
		component: () => import('../components/Pages/PlugPage.vue'),
	},
	{
		path: '/',
		name: 'guest',
		component: () => import('../components/Pages/Auth/GuestPage.vue')
	},

	{
		path: "/register",
		name: "register",
		component: () => import('../components/Pages/Auth/RegisterPage.vue'),
	},
	{
		path: "/login",
		name: "login",
		component: () => import('../components/Pages/Auth/LoginPage.vue'),
	},
	{
		path: "/:id/settings",
		name: "settings",
		component: () => import('../components/Pages/SettingsComponent.vue'),
	},
];


const router = createRouter({
	history: createWebHistory(),
	routes
});


export default router;
