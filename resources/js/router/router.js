import { createRouter, createWebHistory } from 'vue-router'
const routes = [
  {
    path: '/',
    component: () => import('@/views/home/Index.vue'),
    name: 'home.index'
  },
  {
    path: '/:name',
    component: () => import('@/views/review/Index.vue'),
    name: 'review.index'
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router