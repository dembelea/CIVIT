<template>
  <div>
    <h2 class="text-xl font-bold mb-4">Gestion des utilisateurs</h2>
    <ul class="space-y-2">
      <li v-for="user in users" :key="user.id" class="p-4 bg-white rounded shadow">
        {{ user.name }} – {{ user.email }}
      </li>
    </ul>
    <h1 class="text-2xl font-bold text-blue-600">TEST STYLE TAILWIND</h1>
    <div class="hidden">
  bg-red-500 bg-green-500 bg-yellow-500
  text-2xl text-blue-600 font-bold underline text-center
</div>

  </div>
</template>

<script setup>
defineProps({
  users: Array
})
</script>
