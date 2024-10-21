<template>
    <AuthenticatedLayout>
    <div class="container grow h-full justify-center">
        <div class="w-full">
            <div class="rounded-md my-5 flex justify-end">
                <PrimaryLink href="vehicles/create" class="max-w-xl ml-2">Add Vehicle</PrimaryLink>
            </div>
            <div class="">
                <input id="search" @keyup="searchVehicles" v-model="form.search" class="w-80 shadow p-2" type="text" placeholder="Search for make, model, or year" />
            </div>
            <table class="w-full whitespace-nowrap shadow">
                <thead>
                    <tr class="text-left font-bold">
                        <th class="pb-4 pt-6 px-6">ID</th>
                        <th class="pb-4 pt-6 px-6">Make</th>
                        <th class="pb-4 pt-6 px-6">Model</th>
                        <th class="pb-4 pt-6 px-6">Year</th>
                        <th class="pb-4 pt-6 px-6">Status</th>
                        <th class="pb-4 pt-6 px-6">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr v-for="vehicle in props.vehicles.data" :key="vehicle.id" class="hover:bg-gray-100">
                        <td class="border-t px-6 py-4">{{ vehicle.id }}</td>
                        <td class="border-t px-6 py-4">{{ vehicle.make }}</td>
                        <td class="border-t px-6 py-4">{{ vehicle.model }}</td>
                        <td class="border-t px-6 py-4">{{ vehicle.year }}</td>
                        <td class="border-t px-6 py-4">{{ vehicle.status }}</td>
                        <td class="border-t px-6 py-4">
                            <PrimaryLink @click="showVehicle(vehicle.id)" class="ml-2">
                                View
                            </PrimaryLink>
                            <PrimaryLink @click="updateVehicle(vehicle.id)" class="ml-2">
                                EDIT
                            </PrimaryLink>
                            <DangerButton @click="destroyVehicle(vehicle.id)" class="ml-2">
                                DELETE
                            </DangerButton>
                        </td>
                    </tr> -->
                    <tr v-if="props.vehicles.data.length === 0">
                        <td class="px-6 py-4 border-t" colspan="5">No vehicles found.</td>
                    </tr>
                </tbody>
            </table>
            <!-- <Pagination class="mt-7" :links="props.vehicles.links" /> -->
        </div>
    </div>
</AuthenticatedLayout>
</template>

<script setup>
import axios from "axios";
import { router, useForm } from "@inertiajs/vue3";
import Pagination from "@/Components/Pagination.vue";
import DangerButton from "./../../components/DangerButton.vue"
import PrimaryLink from "./../../components/PrimaryLink.vue";
import AuthenticatedLayout from "../../layouts/AuthenticatedLayout.vue";
import { onMounted } from "vue";



</script>
