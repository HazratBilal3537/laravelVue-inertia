<!-- EmployeeCard.vue -->
<template>
    <div class="bg-white shadow-md rounded-lg p-6 max-w-md mx-auto my-4">
      <h3 class="text-xl font-bold mb-2">{{ employee.name }}</h3>

      <p><strong>Email:</strong> {{ employee.email }}</p>
      <p><strong>Phone:</strong> {{ employee.phone }}</p>
      <p><strong>Position:</strong> {{ employee.position }}</p>
      <p><strong>Hire Date:</strong> {{ new Date(employee.hire_date).toLocaleDateString() }}</p>
      <p><strong>Address:</strong> {{ employee.address }}</p>
      <p><strong>Status:</strong>
        <span
          :class="{
            'text-green-600': employee.status === 'active',
            'text-red-600': employee.status === 'inactive'
          }"
        >
          <!-- {{ employee.status.charAt(0).toUpperCase() + employee.status.slice(1) }} -->
        </span>{{ employee.status }}
      </p>
    </div>
  </template>

  <script setup>
  defineProps({
    employee: {
      type: Object,
      required: true,
    },
  });
  </script>

  <style scoped>
  /* Add any custom styles if necessary */
  </style>
