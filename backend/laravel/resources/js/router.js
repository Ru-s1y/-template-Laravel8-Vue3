import Router from 'vue-router';
import ExampleComponent from './components/ExampleComponent.vue';

export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: ExampleComponent
        },
    ]
});