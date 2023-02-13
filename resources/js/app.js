import './bootstrap';
import {createApp} from "vue";
import App from "./App.vue";
import router from "./router/router.js";
import store from "./store";

console.log()

createApp(App)
	.use(store)
	.use(router)
	.mount("#app");
