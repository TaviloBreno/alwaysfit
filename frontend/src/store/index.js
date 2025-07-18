import { createStore } from "vuex";
import apiClient from "@/plugins/axios"; 

const store = createStore({
  state() {
    return {
      token: localStorage.getItem("authToken") || null, 
      user: JSON.parse(localStorage.getItem("authUser")) || null, 
      authError: null,
      isLoading: false,
    };
  },
  mutations: {
    setToken(state, token) {
      state.token = token;
      if (token) {
        localStorage.setItem("authToken", token);
      } else {
        localStorage.removeItem("authToken");
      }
    },
    setUser(state, user) {
      state.user = user;
      if (user) {
        localStorage.setItem("authUser", JSON.stringify(user));
      } else {
        localStorage.removeItem("authUser");
      }
    },
    setAuthError(state, error) {
      state.authError = error;
    },
    setLoading(state, status) {
      state.isLoading = status;
    },
    clearAuthData(state) {
      state.token = null;
      state.user = null;
      localStorage.removeItem("authToken");
      localStorage.removeItem("authUser");
    },
  },
  actions: {
    async login({ commit }, credentials) {
      commit("setLoading", true);
      commit("setAuthError", null); 
      try {
        const response = await apiClient.post("/login", credentials);
        const { token, user } = response.data;
        commit("setToken", token);
        commit("setUser", user);

        apiClient.defaults.headers.common["Authorization"] = `Bearer ${token}`;

        return true; 
      } catch (error) {
        console.error("Login failed:", error.response?.data || error.message);
        commit(
          "setAuthError",
          error.response?.data?.message ||
            "Falha ao fazer login. Verifique suas credenciais."
        );
        commit("setToken", null);
        commit("setUser", null);
        return false; 
      } finally {
        commit("setLoading", false);
      }
    },
    async logout({ commit }) {
      commit("setLoading", true);
      try {
        await apiClient.post("/logout");
      } catch (error) {
        console.error("Logout failed:", error.response?.data || error.message);
      } finally {
        commit("clearAuthData");
        apiClient.defaults.headers.common["Authorization"] = undefined; 
        commit("setLoading", false);
      }
    },
    
    initializeAuth({ state }) {
      if (state.token) {
        apiClient.defaults.headers.common[
          "Authorization"
        ] = `Bearer ${state.token}`;
      }
    },
  },
  getters: {
    isAuthenticated(state) {
      return !!state.token;
    },
    currentUser(state) {
      return state.user;
    },
    authError(state) {
      return state.authError;
    },
    isLoading(state) {
      return state.isLoading;
    },
  },
});

export default store;
