<template>
  <div class="max-w-md mx-auto p-6 bg-white shadow rounded">
    <h1 class="text-xl font-bold mb-4">Créer un compte</h1>
    <form @submit.prevent="submit">
      <div class="mb-4">
        <label class="block mb-1">Nom</label>
        <input type="text" v-model="form.name" class="input w-full" />
        <p v-if="form.errors.name" class="text-sm text-red-600 mt-1">{{ form.errors.name }}</p>
      </div>

      <div class="mb-4">
        <label class="block mb-1">Email</label>
        <input type="email" v-model="form.email" class="input w-full" />
        <p v-if="form.errors.email" class="text-sm text-red-600 mt-1">{{ form.errors.email }}</p>
      </div>

      <div class="mb-4">
        <label class="block mb-1">Mot de passe</label>
        <input type="password" v-model="form.password" class="input w-full" />
        <p v-if="form.errors.password" class="text-sm text-red-600 mt-1">{{ form.errors.password }}</p>
      </div>

      <button type="submit" class="btn-primary w-full">S'inscrire</button>
    </form>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3'

const form = useForm({
  name: '',
  email: '',
  password: '',
})

function submit() {
  form.post('/auth/register')
}
</script>
