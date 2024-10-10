<template>

    <Head title="add employees" />

    <AuthenticatedLayout>
        <div class="my-5 max-w-2xl mx-auto bg-white p-6 shadow-md rounded-lg">
            <PrimaryLink href="/employees" class="max-w-xl ml-2"
                >back</PrimaryLink
              >
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">Employee Form</h2>

            <form @submit.prevent="submit" class="space-y-4">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>

                    <input id="name" type="text" v-model="form.name"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
              <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" v-model="form.email"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
              <InputError class="mt-2" :message="form.errors.email" />

                </div>

                <!-- Phone -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                    <input id="phone" type="tel" v-model="form.phone"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
              <InputError class="mt-2" :message="form.errors.phone" />

                </div>

                <!-- Position -->
                <div>
                    <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
                    <input id="position" type="text" v-model="form.position"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
              <InputError class="mt-2" :message="form.errors.position" />

                </div>

                <!-- Hire Date -->
                <div>
                    <label for="hire_date" class="block text-sm font-medium text-gray-700">Hire Date</label>
                    <input id="hire_date" type="date" v-model="form.hire_date"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
              <InputError class="mt-2" :message="form.errors.hire_date" />

                </div>

                <!-- Address -->
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <textarea id="address" v-model="form.address" rows="3"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
              <InputError class="mt-2" :message="form.errors.address" />

                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="status" v-model="form.status"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow-sm hover:bg-indigo-500 focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
<script setup >
import AuthenticatedLayout from "./../../layouts/AuthenticatedLayout.vue";
import DangerButton from "@/components/DangerButton.vue"
// import DangerButton from "./../../components/DangerButton.vue"
import TextArea from "@/Components/TextArea.vue";
import { useForm, Head, usePage } from "@inertiajs/vue3";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryLink from "@/Components/PrimaryLink.vue";
import InputError from "@/Components/InputError.vue";
const props=defineProps({
    employee: {
      type: Object,
      required: true,
    },
  });
const form = useForm({
    name: props.employee.name,
    email: props.employee.email,
    phone: props.employee.phone,
    position: props.employee.position,
    hire_date: props.employee.hire_date,
    address: props.employee.address,
    status: props.employee.status,
});

const submit = () => {
    form.put(route("employees.update",props.employee.id));
};

</script>

<style scoped>
input,textarea:focus{
    outline:none !important;
}
</style>
