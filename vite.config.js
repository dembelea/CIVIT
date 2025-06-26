import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import path from 'path'

export default defineConfig(({ mode }) => {
  const isProduction = mode === 'production';

  return {
    plugins: [vue()],

    // En dev : base "/", en prod : assets seront chargés depuis /build/
    base: mode === 'production' ? '/build/' : '/',

    // Pas de dossier public utilisé (empêche conflit avec outDir)
    publicDir: false,

    build: {
      outDir: 'public/build',       // Output pour la prod
      emptyOutDir: true,
      manifest: true,               // Nécessaire pour vite('main.js') PHP
      rollupOptions: {
        input: './src/main.js',     // Point d'entrée principal
      },
    },

    resolve: {
      alias: {
        '@': path.resolve(__dirname, 'src'), // ex: @/Pages/Home.vue
      },
    },

    server: {
      host: 'localhost',
      port: 5173,
      strictPort: true,
      origin: 'http://localhost:5173',
      cors: {
        origin: 'http://localhost:8080',
        credentials: true,
      },
      // Optionnel : proxy vers CI4 backend pour API/ajax (pas nécessaire ici)
      // proxy: {
      //   '/api': 'http://localhost:8080',
      // },
      
      watch: {
        ignored: ['**/writable/debugbar/**'],
      },
    },

  };
});
