<template>
    <div class="login-page">
        <TheHeader />
        <main class="login-page__main">
            <LoginForm />
        </main>
        <TheFooter />
    </div>
</template>

<script setup>
import TheHeader from '@/components/TheHeader.vue';
import TheFooter from '@/components/TheFooter.vue';
import LoginForm from '@/components/LoginForm.vue';
</script>

<style lang="scss" scoped>
@import '@/assets/styles/global.scss';

.login-page {
    display: flex;
    flex-direction: column;
    min-height: 100vh; 

    &__main {
        flex-grow: 1; 
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        margin-top: 70px;
        margin-bottom: 20px;
    }
}
</style>