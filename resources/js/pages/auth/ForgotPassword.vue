<template>
    <div>Request reset link form</div>
</template>

<script setup>
const route = useRoute();
const forgot = useForm({
	email: "",
});

const onSendRequest = () => {
	forgot.post(route("auth.forgot-password.store"), {
		onSuccess() {
			forgot.reset();
		},
	});
};
</script>