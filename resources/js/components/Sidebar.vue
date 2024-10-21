<template>
    <div class="pt-2 pb-3 space-y-1 w-44">
        <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
            <ion-icon name="bar-chart-outline"></ion-icon>
            Dashboard
        </ResponsiveNavLink>
        <!-- v-if="$page.props.auth.user.role === 'superadmin'" -->
        <ResponsiveNavLink :href="route('companies.index')" :active="route().current('companies.index')">
            <ion-icon name="people-outline"></ion-icon>
            companies
        </ResponsiveNavLink>
        <ResponsiveNavLink :href="route('employees.index')" :active="route().current('employees.index')">
            <div class="flex items-center">
                <ion-icon name="volume-high-outline" class="text-lg pe-1"></ion-icon>
                <div>employees</div>
            </div>
        </ResponsiveNavLink>
        <ResponsiveNavLink :href="route('vehicals.index')" :active="route().current('vehicals.index')">
            <div class="flex items-center">
                <ion-icon name="volume-high-outline" class="text-lg pe-1"></ion-icon>
                <div>vehicals</div>
            </div>
        </ResponsiveNavLink>

    </div>
</template>
<script setup>
import { ref } from "vue";
import ResponsiveNavLink from "./ResponsiveNavLink.vue";
import { usePage } from "@inertiajs/vue3";
const page = usePage();
const isDropdownOpen = ref(false);

const toggleDropdown = () => {
    isDropdownOpen.value = !isDropdownOpen.value;
};
</script>

<style></style>
