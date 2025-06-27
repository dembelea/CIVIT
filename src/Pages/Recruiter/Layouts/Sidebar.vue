<template>
  <nav class="flex gap-4 bg-white shadow px-6 py-3">
    <Link
      v-for="item in items"
      :key="item.href"
      :href="item.href"
      class="text-gray-700 hover:text-blue-600 font-medium"
      :class="{ 'text-blue-700 font-semibold underline': isActive(item.href) }"
    >
      {{ item.label }}
    </Link>
  </nav>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/inertia-vue3'

const page = usePage()

const items = [
  { label: 'Dashboard', href: '/workspace' },
  { label: 'Mes offres', href: '/workspace/offers' },
  { label: 'Candidatures', href: '/workspace/applications' },
  { label: 'Team', href: '/workspace/team' },
  { label: 'Réglages', href: '/workspace/settings' },
]

function isActive(href) {
  const currentUrl = page.value?.url || ''
  return currentUrl.startsWith(href)
}
</script>