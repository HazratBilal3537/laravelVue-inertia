<!-- EmployeeCard.vue -->
<template>
    <AuthenticatedLayout>
    <div class="bg-white shadow-lg rounded-lg p-6 w-5/12 mx-auto my-8 transition-all hover:shadow-xl transform">
        <div class="flex items-center justify-between">
            <h3 class="text-2xl font-semibold text-gray-800">Employee</h3>
            <span :class="{
                'text-green-600': employee.status === 'active',
                'text-red-600': employee.status === 'inactive'
            }" class="text-sm font-medium">
                {{ employee.status.charAt(0).toUpperCase() + employee.status.slice(1) }}
            </span>
        </div>
        <div class="mt-4 text-gray-700 border-b-4">
            <p class="mb-2"><strong>Name:</strong> {{ employee.name }}</p>
            <p class="mb-2"><strong>Email:</strong> {{ employee.email }}</p>
            <p class="mb-2"><strong>Phone:</strong> {{ employee.phone }}</p>
            <p class="mb-2"><strong>Position:</strong> {{ employee.position }}</p>
            <p class="mb-2"><strong>Hire Date:</strong> {{ new Date(employee.hire_date).toLocaleDateString() }}</p>
            <p class="mb-2"><strong>Address:</strong> {{ employee.address }}</p>
            <p class="mb-2"><strong>Create Date:</strong> {{ new Date(employee.created_at).toLocaleDateString() }}</p>
            <p class="mb-2"><strong>Update Date:</strong> {{ new Date(employee.updated_at).toLocaleDateString() }}</p>
        </div>
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
