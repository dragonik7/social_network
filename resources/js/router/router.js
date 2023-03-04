import {createRouter, createWebHistory} from "vue-router";

const routes = [
	{
		path: "/",
		name: "home",
		component: () => import('../components/Pages/HomePage.vue'),
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
		path: "/pages",
		name: "pages",
		component: () => import('../components/Pages/PlugPage.vue'),
	},
	{
		path: "/contact",
		name: "contact",
		component: () => import('../components/Pages/PlugPage.vue'),
	}
];

const router = createRouter({
	history: createWebHistory(),
	routes,
});

export default router;
