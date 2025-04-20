import './bootstrap';

import { createApp } from 'vue'
import TaskComponent from './components/TaskComponent.vue'

createApp({})
    .component('task-component', TaskComponent)
    .mount('#app')
