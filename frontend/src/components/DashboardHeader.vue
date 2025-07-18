<template>
    <header class="dashboard-header">
        <div class="dashboard-header__content container">
            <div class="dashboard-header__left">
                <img src="@/assets/images/always-fit-logo.png" alt="AlwaysFit Logo" class="dashboard-header__logo">
                <h1 class="dashboard-header__title">Dashboard</h1>
            </div>
            <div class="dashboard-header__right">
                <p class="dashboard-header__greeting">Olá, <span>{{ userName }}</span> Seja bem-vindo!</p>
                <BaseButton @click="handleLogout" class="dashboard-header__logout-button">
                    Sair
                </BaseButton>
            </div>
        </div>
    </header>
</template>

<script setup>
import { computed } from 'vue';
import { useStore } from 'vuex';
import { useRouter } from 'vue-router';
import BaseButton from '@/components/ui/BaseButton.vue';

const store = useStore();
const router = useRouter();

const userName = computed(() => store.getters.currentUser?.name || 'Usuário');

const handleLogout = async () => {
    await store.dispatch('logout');
    router.push('/'); 
};
</script>

<style lang="scss" scoped>

.dashboard-header {
    background-color: white;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    padding: 20px 0;
    margin-bottom: 30px; 

    &__content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap; 
        gap: 20px; 
    }

    &__left {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    &__logo {
        max-width: 150px; 
        height: auto;
    }

    &__title {
        font-size: 2em;
        font-weight: bold;
        color: $primary-color;
        margin: 0; 
    }

    &__right {
        display: flex;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    &__greeting {
        font-size: 1.1em;
        color: $primary-color;
        margin: 0;
        span {
            font-weight: bold;
        }
    }

    &__logout-button {
        width: auto;
        padding: 8px 15px;
        font-size: 0.9em;
        background-color: $secondary-color; 
        color: white;

        &:hover {
            background-color: darken($secondary-color, 10%);
        }
    }

    @media (max-width: 768px) {
        &__content {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        &__left, &__right {
            flex-direction: column;
            gap: 10px;
        }
        &__logout-button {
            width: 100%; 
            max-width: 150px; 
        }
    }
}
</style>