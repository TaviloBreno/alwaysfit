import { createRouter, createWebHistory } from "vue-router";
import LoginPage from "@/views/LoginPage.vue";
import store from "@/store";
import ProfilePage from "@/views/ProfilePage.vue";
import DashboardPage from "@/views/DashboardPage.vue";

const routes = [
  {
    path: "/",
    name: "Login",
    component: LoginPage,
    meta: { requiresAuth: false },
  },
  {
    path: "/dashboard",
    name: "Dashboard",
    component: DashboardPage,
    meta: { requiresAuth: true },
  },
  {
    path: '/trainings',
    name: 'Trainings',
    component: ProfilePage,
    meta: { requiresAuth: true },
  },
  {
    path: '/nutrition-plans',
    name: 'NutritionPlans',
    component: ProfilePage,
    meta: { requiresAuth: true },
  },
  {
    path: '/progress',
    name: 'Progress',
    component: ProfilePage,
    meta: { requiresAuth: true },
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach((to, from, next) => {
  if (to.meta.requiresAuth && !store.getters.isAuthenticated) {
    next({ name: "Login" });
  } else if (to.name === "Login" && store.getters.isAuthenticated) {
    next({ name: "Dashboard" });
  } else {
    next();
  }
});

export default router;
