import './bootstrap';
import {createApp} from "vue";
import App from "./App.vue";
import router from "./router/router.js";
import store from "./store";


import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import {faYoutube} from '@fortawesome/free-brands-svg-icons'

library.add(faYoutube)

createApp(App)
	.component('font-awesome-icon', FontAwesomeIcon)
	.use(store)
	.use(router)
	.mount("#app");
