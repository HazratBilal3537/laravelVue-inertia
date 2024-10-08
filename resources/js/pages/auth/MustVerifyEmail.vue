<template>
	<div>
		<div class="prose prose-invert">
			<h1 class="uppercase">Email Verification Required</h1>
			<p>Before you can access the application, we need you to verify your email address.</p>
			<p>You should have received this email when you registered, but you can resend it using the link below.</p>
		</div>
		<div class="flex justify-end py-8">
			<button @click="onResendVerification">Resend Verification Email</button>
		</div>
	</div>
</template>

<script setup>
const route = useRoute();

const isLoading = ref(false);
const onResendVerification = () => {
	isLoading.value = true;
	router.post(
		route("verification.send"),
		{},
		{
			only: ["flash"],
			onFinish() {
				isLoading.value = false;
			},
		},
	);
};
</script>
