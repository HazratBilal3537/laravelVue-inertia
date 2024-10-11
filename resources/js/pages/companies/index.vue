<template>
    <AuthenticatedLayout>
    <div class="container  grow h-full justify-center">
        <div class="w-full ">
            <div class="bg-white rounded-md my-5 flex justify-end">
                <PrimaryLink href="companies/create" class="max-w-xl ml-2">Add Company</PrimaryLink>
            </div>
            <div class="">
                <!-- <input id="search"  @keyup="searchCompany" v-model="form.search" class="w-80 shadow p-2" type="text" placeholder="Search for name, email" /> -->
            </div>
            <table class="w-full whitespace-nowrap shadow">
                <thead>
                    <tr class="text-left font-bold">
                        <th class="pb-4 pt-6 px-6">ID</th>
                        <th class="pb-4 pt-6 px-6">Name</th>
                        <th class="pb-4 pt-6 px-6">location</th>
                        <th class="pb-4 pt-6 px-6">Phone</th>
                        <th class="pb-4 pt-6 px-6">website</th>
                        <th class="pb-4 pt-6 px-6">registration_number</th>
                        <!-- <th class="pb-4 pt-6 px-6">founded_at</th> -->
                        <!-- <th class="pb-4 pt-6 px-6">number_of_employees</th> -->
                        <th class="pb-4 pt-6 px-6">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="company in props.companies" :key="company.id" class="hover:bg-gray-100">
                        <td class="border-t px-6 py-4">{{ company.id }} </td>
                        <td class="border-t px-6 py-4">{{ company.name }} </td>
                        <td class="border-t px-6 py-4">{{ company.location }} </td>
                        <td class="border-t px-6 py-4">{{ company.phone_number }} </td>
                        <td class="border-t px-6 py-4">{{ company.website }} </td>
                        <td class="border-t px-6 py-4">{{ company.registration_number }} </td>
                        <!-- <td class="border-t px-6 py-4">{{ company.founded_at }} </td> -->
                        <!-- <td class="border-t px-6 py-4">{{ company.number_of_employees }} </td> -->
                        <td class="border-t px-6 py-4">
                            <PrimaryLink @click="showCompany(company.id)" class="ml-2">
                                View
                            </PrimaryLink>
                            <PrimaryLink @click="updateEmploye(company.id)" class="ml-2">
                                EDIT
                            </PrimaryLink>
                            <DangerButton @click="destroyCompany(company.id)" class="ml-2">
                                DELETE
                            </DangerButton>
                        </td>
                    </tr>
                    <tr v-if="props.companies?.length === 0">
                        <td class="px-6 py-4 border-t" colspan="5">No users found.</td>
                    </tr>
                </tbody>
            </table>
            <!-- <Pagination class="mt-7" :links="props.users.links" /> -->
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
    companies: Object,
    filters: Object
});
// const form =useForm({
//     'search':props.filters.search || '',
// })

const showCompany = (id) => {
    router.get(`/companies/${id}`);
}
const updateEmploye = (id) => {
    router.get(route('companies.edit', id));
}
// serach employe

let debounceTimeout = 0;
const searchCompany = () => {
  clearTimeout(debounceTimeout);
  router.get(route('employees.index'), { search: form .search }, { preserveState: true });

  debounceTimeout = setTimeout(() => {
  }, 500);
};
// delete employe
const destroyCompany = (id) => {
    if (confirm("Are you sure you want to delete this Company?")) {
        router.delete(route('companies.destroy', id), {
            onSuccess: () => {
                alert("Company deleted successfully.");
            },
            onError: (error) => {
                console.error(error);
                alert("An error occurred while deleting the Company.");
            },
        });
    }
};
</script>
