// tailwind.config.js
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './src/**/*.{vue,js,ts}',
    './app/Views/**/*.php',
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter', 'ui-sans-serif', 'system-ui'],
      },
      colors: {
        primary: {
          DEFAULT: '#2563EB',
          dark: '#1E40AF',
        },
      },
    },
  },
  safelist: [
    'text-2xl',
    'text-xl',
    'text-blue-600',
    'font-bold',
    'underline',
    'bg-red-500',
    'bg-green-500',
    'bg-yellow-500',
    'text-center',
  ],
  plugins: [],
}
