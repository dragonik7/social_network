import {createRouter, createWebHistory} from "vue-router";

const routes = [
	{
		path: "/",
		name: "home",
		component: () => import('../components/HomePages/Pages/HomeComponent.vue'),
	},
	{
		path: "/shop",
		name: "shop",
		component: () => import('../components/PlugComponent.vue'),
	},
	{
		path: "/features",
		name: "features",
		component: () => import('../components/PlugComponent.vue'),
	},
	{
		path: "/blogs",
		name: "blogs",
		component: () => import('../components/PlugComponent.vue'),
	},
	{
		path: "/pages",
		name: "pages",
		component: () => import('../components/PlugComponent.vue'),
	},
	{
		path: "/contact",
		name: "contact",
		component: () => import('../components/PlugComponent.vue'),
	}
];

const router = createRouter({
	history: createWebHistory(import.meta.env.BASE_URL),
	routes,
});

export default router;
