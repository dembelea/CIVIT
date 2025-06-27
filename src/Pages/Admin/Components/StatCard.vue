<template>
  <div class="bg-white rounded-xl shadow p-4 flex items-center gap-4">
    <div class="text-3xl">{{ icon }}</div>
    <div>
      <p class="text-sm text-gray-500">{{ label }}</p>
      <p class="text-xl font-semibold text-gray-800">{{ value }}</p>
    </div>
  </div>
</template>

<script setup>
defineProps({
  label: String,
  value: [String, Number],
  icon: String,
})
</script>
