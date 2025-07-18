import { createRouter, createWebHistory } from "vue-router";
import LoginPage from "@/views/LoginPage.vue";
import store from "@/store";
import ProfilePage from "@/views/ProfilePage.vue";

const routes = [
  {
    path: "/",
    name: "Login",
    component: LoginPage,
    meta: { requiresAuth: false },
  },
  {
    path: "/profile",
    name: "Profile",
    component: ProfilePage,
    meta: { requiresAuth: true },
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach((to, from, next) => {
  if (to.meta.requiresAuth && !store.getters.isAuthenticated) {
    next({ name: "Login" });
  } else if (to.name === "Login" && store.getters.isAuthenticated) {
    next({ name: "Profile" });
  } else {
    next();
  }
});

export default router;
