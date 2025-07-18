<template>
    <div class="profile-page">
        <TheHeader />
        <main class="profile-page__main container">
            <h1>Bem-vindo, {{ currentUser?.name || 'Usuário' }}!</h1>
            <p>Seu e-mail: {{ currentUser?.email }}</p>
            <BaseButton @click="handleLogout" :disabled="isLoadingLogout">
                {{ isLoadingLogout ? 'Saindo...' : 'Sair' }}
            </BaseButton>
            </main>
        <TheFooter />
    </div>
</template>

<script setup>
import { computed } from 'vue';
import { useStore } from 'vuex';
import { useRouter } from 'vue-router';
import TheHeader from '@/components/TheHeader.vue';
import TheFooter from '@/components/TheFooter.vue';
import BaseButton from '@/components/ui/BaseButton.vue';

const store = useStore();
const router = useRouter();

const currentUser = computed(() => store.getters.currentUser);
const isLoadingLogout = computed(() => store.getters.isLoading);

const handleLogout = async () => {
    await store.dispatch('logout');
    router.push('/');
};
</script>

<style lang="scss" scoped>
@import '@/assets/styles/global.scss';

.profile-page {
    display: flex;
    flex-direction: column;
    min-height: 100vh;

    &__main {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 20px;
        margin-top: 70px;
        margin-bottom: 20px;
        text-align: center;

        h1 {
            margin-bottom: 15px;
            color: $primary-color;
        }

        p {
            margin-bottom: 25px;
            color: $dark-grey;
        }

        .base-button {
            max-width: 200px;
        }
    }
}
</style>