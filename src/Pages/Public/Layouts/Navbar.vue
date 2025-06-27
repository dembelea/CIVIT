<template>
  <nav class="flex gap-4" role="navigation" aria-label="Menu principal">
    <Link
      v-for="item in items"
      :key="item.href"
      :href="item.href"
      class="text-gray-700 hover:text-blue-600 font-medium transition"
      :class="isActive(item.href) ? 'text-blue-700 font-semibold underline' : ''"
    >
      {{ item.label }}
    </Link>
  </nav>
</template>

<script setup>
import { usePage, Link } from '@inertiajs/inertia-vue3'

const page = usePage()

const items = [
  { label: 'Accueil', href: '/' },
  { label: 'Connexion', href: '/auth/login' },
]

function isActive(href) {
  const currentUrl = page.url.value || ''
  return currentUrl === href || currentUrl.startsWith(href + '/')
}
</script>
