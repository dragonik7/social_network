<template>
	<div class="bgDark textLight">

		<router-view/>
	</div>
</template>

<style>
.bgDark {
	background-color: #181924F7;

}

.bgShadow {
	box-shadow: 0 0 15px 1px rgba(28, 27, 27, 1);
}

.bgDarkHover {
	background-color: #181924F7;
}

.textLight {
	color: #A49E9EFF;
}

@tailwind base;
@tailwind components;
@tailwind utilities;
</style>

<script setup>

</script>
