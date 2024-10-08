<script setup lang="ts">
import { ref } from 'vue';
import ApplicationLogo from './../Components/ApplicationLogo.vue';
// import Dropdown from './../Components/Dropdown.vue';
import DropdownLink from './../Components/DropdownLink.vue';
import NavLink from './../Components/NavLink.vue';
import ResponsiveNavLink from './../Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div>
        <div class=" bg-white">


            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main class="bg-white ">
                    <div class="flex mx-auto gap-4">
                        <!-- <div class="w-[270px] min-w-[200px] sm:px-3 lg:px-4 shadow rounded-sm hidden md:block h-screen">
                            <Sidebar />
                        </div> -->
                        <div class='bg-[#f0f1f786] w-full'>
                            <slot />
                        </div>
                    </div>
            </main>
        </div>
    </div>
</template>

<style></style>
