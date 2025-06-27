import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import './style.css'

const pages = import.meta.glob('./Pages/**/*.vue')

createInertiaApp({
  resolve: async name => {
    const path = `./Pages/${name}.vue`
    const page = await pages[path]()
    const component = page.default

    // Layout auto basé sur le rôle/dossier
    if (!component.layout) {
      const role = name.split('/')[0]
      try {
        const layout = await import(`./Pages/${role}/Layouts/Layout.vue`)
        component.layout = layout.default
      } catch (e) {
        console.warn(`Aucun layout trouvé pour ${role}, page ${name}`)
      }
    }

    return component
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },
})
