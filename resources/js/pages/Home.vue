<template>
	<div class="container text-center grow items-center flex flex-col h-full justify-center">
        <div>
            <div class="bg-white rounded-md shadow overflow-x-auto">
                <PrimaryLink href="createuser" class="max-w-xl ml-2"
                >Add User</PrimaryLink
              >
            </div>
                <table class="w-full whitespace-nowrap">
                  <thead>
                    <tr class="text-left font-bold">
                      <th class="pb-4 pt-6 px-6">ID</th>
                      <th class="pb-4 pt-6 px-6">Name</th>
                      <th class="pb-4 pt-6 px-6">advertiser_name</th>
                      <th class="pb-4 pt-6 px-6">offer_url</th>
                      <th class="pb-4 pt-6 px-6">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                        v-for="user in props.users" :key="user.id"
                      class="hover:bg-gray-100"
                    >
                      <td class="border-t px-6 py-4">{{user.id}} </td>
                      <td class="border-t px-6 py-4">{{user.name}} </td>
                      <td class="border-t px-6 py-4">{{user.photo}} </td>
                      <td class="border-t px-6 py-4">{{user.cover_photo}} </td>
                      <!-- Assuming 'user' is related to user -->
                      <td class="border-t px-6 py-4">
                        <PrimaryLink

                          class="ml-2"
                        >
                          EDIT
                        </PrimaryLink>
                        <DangerButton @click="deleteuser" class="ml-2">
                          DELETE
                        </DangerButton>
                      </td>
                    </tr>
                    <!-- <tr v-if="props.users.data.length === 0">
                      <td class="px-6 py-4 border-t" colspan="5">No users found.</td>
                    </tr> -->
                  </tbody>
                </table>
              </div>
        </div>

</template>

<script setup>
import { Head, useForm } from "@inertiajs/vue3";
// import Pagination from "./../Components/Pagination.vue";
import DangerButton from "./../components/DangerButton.vue"
import PrimaryLink from "./../components/PrimaryLink.vue"

const props = defineProps({
    users: {
    required: true,
    type: Object ,
  },
  message: String,
  filters: Object,
});


</script>
