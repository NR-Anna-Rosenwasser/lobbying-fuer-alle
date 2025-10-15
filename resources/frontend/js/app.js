import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import "../css/app.css"
import Vueform from '@vueform/vueform'
import vueformConfig from './../../../vueform.config.js'

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        return pages[`./Pages/${name}.vue`]
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(Vueform, vueformConfig)
            .mount(el)
    },
})
