<template>
	<Head>
		<title>Application</title>
	</Head>
	<EvoHeader />
	<main class="flex flex-col mb-5">
		<slot></slot>
	</main>
	<EvoFooter />
</template>

<script setup>
import { Head } from "@inertiajs/vue3";
</script>
