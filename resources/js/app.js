import './bootstrap';
import { createApp } from "vue";
import { createPinia } from 'pinia'
import App from "./App.vue";
import router from "./router/router.js";
import './Utils/axios'
import 'remixicon/fonts/remixicon.css'

import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'
const pinia = createPinia()

createApp(App)
	.component('font-awesome-icon', FontAwesomeIcon)
	.use(router)
	.use(pinia)
	.mount("#app");
