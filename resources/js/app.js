import './bootstrap';
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import '../css/app.css';
import { ZiggyVue } from 'ziggy-js';

// Import FontAwesome library and icon components
import { library } from '@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { faDollarSign, faCreditCard, faUsers, faHeartbeat } from '@fortawesome/free-solid-svg-icons';

// Add the icons to the library
library.add(faDollarSign, faCreditCard, faUsers, faHeartbeat);

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
    return pages[`./Pages/${name}.vue`];
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue)
      .component('FontAwesomeIcon', FontAwesomeIcon) 
      .mount(el);
  },
});
