// vite.config.js
import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import path from 'path'

export default defineConfig(({ mode }) => {
  const isProduction = mode === 'production'

  return {
    plugins: [vue()],

    base: isProduction ? '/build/' : '/',

    publicDir: false,

    build: {
      outDir: 'public/build',
      emptyOutDir: true,
      manifest: true,
      rollupOptions: {
        input: './src/main.js',
      },
    },

    resolve: {
      alias: {
        '@': path.resolve(__dirname, 'src'),
        '@components': path.resolve(__dirname, 'src/Components'),
        '@layouts': path.resolve(__dirname, 'src/Layouts'),
        '@pages': path.resolve(__dirname, 'src/Pages'),
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
      watch: {
        ignored: ['**/writable/debugbar/**'],
      },
    },
  }
})
