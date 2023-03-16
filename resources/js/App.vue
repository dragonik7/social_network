<template>
	<router-view/>
</template>

<script>

import {defineComponent} from "vue";
import MainPage from "./components/Pages/Main/MainPage.vue";

export default defineComponent({
	components: {MainPage},
})
</script>

<style>
.bgDark {
	background-color: #181924F7;

}

.bgShadow {
	box-shadow: 0 0 15px 1px rgba(28, 27, 27, 1);
}

.bgDarkHover:hover {
	background-color: #181924F7;
}

.textLight {
	color: #A49E9EFF;
}

@tailwind base;
@tailwind components;
@tailwind utilities;
</style>


