import './bootstrap';
import { createApp } from 'vue';
import ProviderList from './components/ProviderList.vue';

createApp(ProviderList).mount('#app');

//not working
// const app = createApp({});
// app.component('provider-list', ProviderList);
// app.mount('#app');

//createApp(ProviderList).mount('#app');
