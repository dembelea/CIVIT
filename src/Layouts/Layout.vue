<template>
  <div class="min-h-screen bg-gray-100 text-gray-800">
    <nav class="bg-white p-4 shadow">
      <div class="container mx-auto flex justify-between">
        <span class="font-bold">CI4 App</span>
        <div class="space-x-4">
          <a href="/" class="text-blue-600 hover:underline">Home</a>
        </div>
      </div>
    </nav>
    <main class="p-4">
      <slot />
    </main>
  </div>
</template>
