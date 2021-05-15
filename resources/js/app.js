require('./bootstrap');

import { createApp, h } from 'vue';
import { App, plugin } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import VueTheMask from 'vue-the-mask'

InertiaProgress.init()

const el = document.getElementById('app')

createApp({
  render: () => h(App, {
    initialPage: JSON.parse(el.dataset.page),
    resolveComponent: name => require(`./Pages/${name}`).default,
  })
})
    .use(plugin, VueTheMask)
    .mixin({ methods: {route: window.route }})
    .mount(el)

