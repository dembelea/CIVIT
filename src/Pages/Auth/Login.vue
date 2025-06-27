<template>
  <div class="max-w-md mx-auto mt-20 p-6 bg-white rounded shadow">
    <h1 class="text-2xl text-center font-bold mb-6">Connexion</h1>

    <form @submit.prevent="submit">
      <div class="mb-4">
        <label class="block mb-1">Email</label>
        <input v-model="form.email" type="email" class="input w-full" />
        <p v-if="form.errors.email" class="text-red-600 text-sm mt-1">{{ form.errors.email }}</p>
      </div>

      <div class="mb-4">
        <label class="block mb-1">Mot de passe</label>
        <input v-model="form.password" type="password" class="input w-full" />
        <p v-if="form.errors.password" class="text-red-600 text-sm mt-1">{{ form.errors.password }}</p>
      </div>

      <button type="submit" class="btn-primary w-full">Se connecter</button>
      <p v-if="form.errors.label" class="text-red-600 text-sm mt-1">{{ form.errors.label }}</p>
    </form>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3'

// Initialisation du formulaire avec useForm (gère erreurs, validation, etc.)
const form = useForm({
  email: '',
  password: ''
})

function submit() {
  form.post('/auth/login')
}
</script>
