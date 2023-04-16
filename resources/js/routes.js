import { createWebHistory, createRouter } from "vue-router";

import Books from './components/Books.vue';
import ShowBook from './components/ShowBook.vue';

 
const routes = [
    {
        name: 'books',
        path: '/',
        component: Books
    },
    {
        path: '/books/:bookId',
        name: 'book',
        component:ShowBook,
    }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});


export default router;