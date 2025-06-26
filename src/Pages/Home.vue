<template>
  <div class="p-6 text-center">
    <h1 class="text-2xl font-bold">Home RHAO</h1>
    <p class="mt-2">{{ message }}</p>
  </div>
</template>

<script setup>
defineProps({ message: String });
import Layout from '../Layouts/Layout.vue'

// Spécifie le layout globalement via defineOptions (Vue 3.3+)
defineOptions({
  layout: Layout
})
</script>
