<template>
  <section class="p-6">
    <h2 class="text-2xl font-bold mb-4 text-gray-800">Tableau de bord</h2>
    <p class="text-gray-600">Bienvenue dans l’espace administration. Voici les statistiques clés de la plateforme.</p>

    <!-- Exemples de composants de statistiques -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-6">
      <StatCard label="Utilisateurs" value="120" icon="👤" />
      <StatCard label="Offres actives" value="34" icon="📢" />
      <StatCard label="Candidatures" value="210" icon="📄" />
      <StatCard label="Entreprises" value="18" icon="🏢" />
    </div>
  </section>
</template>

<script setup>
import StatCard from './Components/StatCard.vue' // Ex. : dans Pages/Admin/Components
</script>
