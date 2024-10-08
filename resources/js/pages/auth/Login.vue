<template>
    <div>Login Form</div>
</template>

<script setup>
const route = useRoute();
const login = useForm({
	email: "",
	password: "",
	remember: false,
});

const onLogin = () => {
	login.post(route("auth.login.store"), {
		onSuccess() {
			console.log("Done");
		},
	});
};
</script>