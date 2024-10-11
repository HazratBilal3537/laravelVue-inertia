<template>
    <AuthenticatedLayout>
    <div class="container  grow h-full justify-center">
        <div class="w-full ">
            <div class="bg-white rounded-md my-5 flex justify-end">
                <PrimaryLink href="employees/create" class="max-w-xl ml-2">Add User</PrimaryLink>
            </div>
            <div class="">
                <input id="search"  @keyup="searchEmployees" v-model="form.search" class="w-80 shadow p-2" type="text" placeholder="Search for name, email" />
            </div>
            <table class="w-full whitespace-nowrap shadow">
                <thead>
                    <tr class="text-left font-bold">
                        <th class="pb-4 pt-6 px-6">ID</th>
                        <th class="pb-4 pt-6 px-6">Name</th>
                        <th class="pb-4 pt-6 px-6">Email</th>
                        <th class="pb-4 pt-6 px-6">Phone</th>
                        <th class="pb-4 pt-6 px-6">Position</th>
                        <th class="pb-4 pt-6 px-6">Hire Date</th>
                        <th class="pb-4 pt-6 px-6">Status</th>
                        <th class="pb-4 pt-6 px-6">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in props.users.data" :key="user.id" class="hover:bg-gray-100">
                        <td class="border-t px-6 py-4">{{ user.id }} </td>
                        <td class="border-t px-6 py-4">{{ user.name }} </td>
                        <td class="border-t px-6 py-4">{{ user.email }} </td>
                        <td class="border-t px-6 py-4">{{ user.phone }} </td>
                        <td class="border-t px-6 py-4">{{ user.position }} </td>
                        <td class="border-t px-6 py-4">{{ user.hire_date }} </td>
                        <td class="border-t px-6 py-4">{{ user.status }} </td>
                        <td class="border-t px-6 py-4">
                            <PrimaryLink @click="showEmploye(user.id)" class="ml-2">
                                View
                            </PrimaryLink>
                            <PrimaryLink @click="updateEmploye(user.id)" class="ml-2">
                                EDIT
                            </PrimaryLink>
                            <DangerButton @click="destroyEmploye(user.id)" class="ml-2">
                                DELETE
                            </DangerButton>
                        </td>
                    </tr>
                    <tr v-if="props.users.data.length === 0">
                        <td class="px-6 py-4 border-t" colspan="5">No users found.</td>
                    </tr>
                </tbody>
            </table>
            <Pagination class="mt-7" :links="props.users.links" />
        </div>
    </div>
</AuthenticatedLayout>
</template>

<script setup>
import { Head, router, useForm } from "@inertiajs/vue3";
import Pagination from "@/Components/Pagination.vue";
import DangerButton from "./../../components/DangerButton.vue"
import PrimaryLink from "./../../components/PrimaryLink.vue"
import { route } from "ziggy-js";
import AuthenticatedLayout from "../../layouts/AuthenticatedLayout.vue";

const props = defineProps({
    users: Object,
    filters: Object,
    companies:Object
});
console.log('props',props);

const form =useForm({
    'search':props.filters.search || '',
})

const showEmploye = (id) => {
    router.get(`/employees/${id}`);
}
const updateEmploye = (id) => {
    router.get(route('employees.edit', id));
}
// serach employe

let debounceTimeout = 0;
const searchEmployees = () => {
  clearTimeout(debounceTimeout);
  router.get(route('employees.index'), { search: form .search }, { preserveState: true });

  debounceTimeout = setTimeout(() => {
  }, 500);
};
// delete employe
const destroyEmploye = (id) => {
    if (confirm("Are you sure you want to delete this employee?")) {
        router.delete(route('employees.destroy', id), {
            onSuccess: () => {
                alert("Employee deleted successfully.");
            },
            onError: (error) => {
                console.error(error);
                alert("An error occurred while deleting the employee.");
            },
        });
    }
};
</script>
