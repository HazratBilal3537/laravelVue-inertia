<template>
    <Head title="Add Company" />

    <AuthenticatedLayout>
        <div class="my-5 max-w-2xl mx-auto bg-white p-6 shadow-md rounded-lg">
            <PrimaryLink href="/companies" class="max-w-xl ml-2">Back</PrimaryLink>
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">Update Company Form</h2>

            <form @submit.prevent="submit" class="space-y-4">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Company Name</label>
                    <input
                        id="name"
                        type="text"
                        v-model="form.name"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    />
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <!-- Location -->
                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                    <input
                        id="location"
                        type="text"
                        v-model="form.location"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    />
                    <InputError class="mt-2" :message="form.errors.location" />
                </div>

                <!-- Phone Number -->
                <div>
                    <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input
                        id="phone_number"
                        type="tel"
                        v-model="form.phone_number"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    />
                    <InputError class="mt-2" :message="form.errors.phone_number" />
                </div>

                <!-- Website -->
                <div>
                    <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
                    <input
                        id="website"
                        type="url"
                        v-model="form.website"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    />
                    <InputError class="mt-2" :message="form.errors.website" />
                </div>

                <!-- Registration Number -->
                <div>
                    <label for="registration_number" class="block text-sm font-medium text-gray-700">Registration Number</label>
                    <input
                        id="registration_number"
                        type="text"
                        v-model="form.registration_number"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    />
                    <InputError class="mt-2" :message="form.errors.registration_number" />
                </div>

                <!-- Founded At -->
                <div>
                    <label for="founded_at" class="block text-sm font-medium text-gray-700">Founded Date</label>
                    <input
                        id="founded_at"
                        type="date"
                        v-model="form.founded_at"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    />
                    <InputError class="mt-2" :message="form.errors.founded_at" />
                </div>

                <!-- Number of Employees -->
                <div>
                    <label for="number_of_employees" class="block text-sm font-medium text-gray-700">Number of Employees</label>
                    <input
                        id="number_of_employees"
                        type="number"
                        v-model="form.number_of_employees"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    />
                    <InputError class="mt-2" :message="form.errors.number_of_employees" />
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button
                        type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow-sm hover:bg-indigo-500 focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2"
                    >
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "./../../layouts/AuthenticatedLayout.vue";
import { useForm, Head, usePage } from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import PrimaryLink from "@/Components/PrimaryLink.vue";

const props=defineProps({
    company:Object
})
console.log('object',props);

// Form setup
const form = useForm({
    name: props.company.name,
    location: props.company.location,
    phone_number: props.company.phone_number,
    website: props.company.website,
    registration_number: props.company.registration_number,
    founded_at: props.company.founded_at,
    number_of_employees: props.company.number_of_employees,
});

// Submit function
const submit = () => {
console.log(form);

    form.put(route("companies.update",props.company.id));
};
</script>

<style scoped>
input,
textarea:focus {
    outline: none !important;
}
</style>
