import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import axios from 'axios';
import bootstrap from './bootstrap.js';


createApp(App).use(router,axios, bootstrap).mount('#app')
