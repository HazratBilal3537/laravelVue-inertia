<template>
	<div class="flex w-full h-full justify-center items-center text-center flex-col grow">
		<h1 class="text-4xl uppercase font-bold mb-8">{{ title }}</h1>
		<div>{{ description }}</div>
	</div>
</template>

<script setup>
defineOptions({
	layout: false,
});

const props = defineProps({
	status: { type: Number, required: true },
});

const title = computed(() => {
	return {
		503: "503: Service Unavailable",
		500: "500: Server Error",
		404: "404: Page Not Found",
		403: "403: Forbidden",
	}[props.status];
});

const description = computed(() => {
	return {
		503: "Sorry, we are doing some maintenance. Please check back soon.",
		500: "Whoops, something went wrong on our servers.",
		404: "Sorry, the page you are looking for could not be found.",
		403: "Sorry, you are forbidden from accessing this page.",
	}[props.status];
});
</script>
