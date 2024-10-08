<template>
    <div>Reset password form with readonly email input</div>
</template>

<script setup>
const route = useRoute();
const reset = useForm({
	token: usePage().props.token,
	email: usePage().props.email,
	password: "",
	password_confirmation: "",
});

const onResetPassword = () => {
	reset.post(route("auth.reset-password.store"), {
		onSuccess() {
			reset.reset();
		},
	});
};
</script>