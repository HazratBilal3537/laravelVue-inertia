<template>
  <!-- <ResponsiveNavLink :href="route('employees')" :active="route().current('employees')">
      products
    </ResponsiveNavLink> -->
    <div class="py-6 space-y-2">
        <ResponsiveNavLink :href="route('employees.index')">
            Employees
        </ResponsiveNavLink>
        <ResponsiveNavLink :href="route('companies.index')">
            Companies
        </ResponsiveNavLink>

    </div>
</template>
<script setup>
import { route } from 'ziggy-js';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

</script>
