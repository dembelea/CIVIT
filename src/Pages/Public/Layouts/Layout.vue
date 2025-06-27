<template>
  <div class="min-h-screen bg-gray-100 flex flex-col">
    <Header />
    <main class="flex-1 p-6">
      <slot />
    </main>
  </div>
</template>

<script setup>
  import Header from './Header.vue'
</script>