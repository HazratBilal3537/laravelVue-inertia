<template>
	<Head>
		<title>Application</title>
	</Head>
	<EvoHeader />
	<main class="flex flex-col">
		<slot></slot>
	</main>
	<EvoFooter />
</template>

<script setup>
import { Head } from "@inertiajs/vue3";
</script>
