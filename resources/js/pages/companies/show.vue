<!-- EmployeeCard.vue -->
<template>
    <AuthenticatedLayout>
    <div class="bg-white shadow-lg rounded-lg p-6 w-5/12 mx-auto my-8 transition-all hover:shadow-xl transform">

        <h3 class="text-2xl font-semibold text-gray-800">Company</h3>

        <div class="mt-4 text-gray-700">
            <p class="mb-2"><strong>Company Name:</strong> {{ company.name }}</p>
            <p class="mb-2"><strong>Location:</strong> {{ company.location }}</p>
            <p class="mb-2"><strong>Phone Number:</strong> {{ company.phone_number }}</p>
            <p class="mb-2"><strong>Founded Date:</strong> {{ new Date(company.founded_at).toLocaleDateString() }}</p>
            <p class="mb-2"><strong>Website:</strong> {{ company.website }}</p>
            <p class="mb-2"><strong>Registration Number:</strong> {{ company.registration_number }}</p>
            <p class="mb-2"><strong>Number of Employees:</strong> {{ company.number_of_employees }}</p>
            <p class="mb-2"><strong>Create At:</strong> {{ new Date(company.created_at).toLocaleDateString() }}</p>
            <p class="mb-2"><strong>Update At:</strong> {{ new Date(company.updated_at).toLocaleDateString() }}</p>
        </div>

          <div class="flex items-center justify-between">
            <h3 class="text-2xl font-semibold text-gray-800">Employee</h3>

        </div>
        <div class="mt-4 overflow-auto text-gray-700 border-b-4">
            <table class="w-auto whitespace-nowrap shadow">
                <thead>
                    <tr class="text-left font-bold">
                        <th class="pb-4 pt-6 px-6">ID</th>
                        <th class="pb-4 pt-6 px-6">Name</th>
                        <th class="pb-4 pt-6 px-6">Email</th>
                        <th class="pb-4 pt-6 px-6">Phone</th>
                        <th class="pb-4 pt-6 px-6">Position</th>
                        <th class="pb-4 pt-6 px-6">Hire Date</th>
                        <th class="pb-4 pt-6 px-6">Status</th>

                    </tr>
                </thead>
                <tbody>
                    <tr v-for="company in company.employees" :key="company.id" class="hover:bg-gray-100">
                        <td class="border-t px-6 py-4">{{ company.id }} </td>
                        <td class="border-t px-6 py-4">{{ company.name }} </td>
                        <td class="border-t px-6 py-4">{{ company.email }} </td>
                        <td class="border-t px-6 py-4">{{ company.phone }} </td>
                        <td class="border-t px-6 py-4">{{ company.position }} </td>
                        <td class="border-t px-6 py-4">{{ company.hire_date }} </td>
                        <td class="border-t px-6 py-4">{{ company.status }} </td>
                    </tr>

                </tbody>
            </table>

        </div>
    </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '../../layouts/AuthenticatedLayout.vue';

const props = defineProps({
    employee: Object,
    company: Object
});
console.log(props);

</script>

<style scoped>
/* Add any custom styles if necessary */
</style>
