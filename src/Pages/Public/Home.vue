<template>
  <div class="p-6 text-center">
    <h1 class="text-2xl font-bold">Home Page</h1>
    <p class="text-2xl mt-2">{{ message }}</p>
  </div>
</template>

<script setup>
defineProps({ message: String });
</script>
