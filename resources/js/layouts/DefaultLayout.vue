<template>
	<Head>
		<title>Application</title>
	</Head>
	<EvoHeader class="sticky top-0" />
	<main class="flex flex-col">
		<slot></slot>
	</main>
	<EvoFooter />
</template>

<script setup>
import { Head } from "@inertiajs/vue3";
</script>
