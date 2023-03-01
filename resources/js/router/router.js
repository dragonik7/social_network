import {createRouter, createWebHistory} from "vue-router";

const routes = [
	{
		path: "/",
		name: "home",
		component: () => import('../components/Pages/HomePage.vue'),
	},
	{
		path: "/shop",
		name: "shop",
		component: () => import('../components/Pages/PlugPage.vue'),
	},
	{
		path: "/features",
		name: "features",
		component: () => import('../components/Pages/PlugPage.vue'),
	},
	{
		path: "/blogs",
		name: "blogs",
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
