import { createApp } from "vue";
import  store  from "./store/store";
import App from "./App.vue";
import router from "./router";
import Notifications from '@kyvg/vue3-notification';
import VueCookies from 'vue3-cookies';


import '@/assets/styles/style.scss'


createApp(App).use(store).use(router).use(Notifications).use(VueCookies).mount('#app');


