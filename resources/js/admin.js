import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import layout from './admin/layout.vue'

InertiaProgress.init()


createInertiaApp({
  resolve: name => { 
    const page = require(`./admin/pages/${name}`).default
    page.layout = page.layout || layout
    return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },
})
 