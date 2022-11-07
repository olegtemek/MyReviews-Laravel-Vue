import './bootstrap';
import App from '@/views/App.vue'
import { createApp } from 'vue';
import router from '@/router/router.js'
import store from '@/store/index.js'
import { i18nVue } from 'laravel-vue-i18n'
import loading from '@/views/components/LoadingComponent.vue'

const app = createApp(App)

app.component(loading.name, loading)

app
  .use(i18nVue, {
    lang: localStorage.getItem('lang') ? localStorage.getItem('lang') : 'en',
    resolve: (lang) => import(`@lang/${lang}.json`)
  })
  .use(store)
  .use(router)
  .mount('#app')