<script setup lang="ts">
import { ref } from 'vue';

import Sidebar from '../components/Sidebar.vue';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div>
        <div class=" bg-white">


            <!-- Page Heading -->
            <header class="bg-white shadow " v-if="$slots.header">
                <div class="mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main class="bg-white ">
                    <div class="flex mx-auto gap-4 ">
                        <div class="w-[270px] min-w-[200px] sm:px-3 lg:px-4 shadow rounded-sm hidden md:block min-h-screen h-screen overflow-auto">
                            <Sidebar class="sticky top-6" />
                        </div>
                        <div class=' w-full'>
                            <slot />
                        </div>
                    </div>
            </main>
        </div>
    </div>
</template>

<style></style>
