<template>
    <div class="login-form">
        <img src="@/assets/images/always-fit-logo.png" alt="Always Fit Logo" class="login-form__logo">
        <h2 class="login-form__title">Login</h2>
        <p class="login-form__subtitle">Olá!</p>
        <p class="login-form__description">Este é o ambiente seguro de login da Always Fit ®</p>
        <p class="login-form__instruction">Para acessar, informe suas credenciais.</p>

        <form @submit.prevent="handleSubmit" class="login-form__form">
            <BaseInput
                id="email"
                label="E-mail"
                type="email"
                v-model="email"
                placeholder="Seu e-mail"
                :required="true"
                :errorMessage="emailError"
            />

            <BaseInput
                id="password"
                label="Senha"
                type="password"
                v-model="password"
                placeholder="Sua senha"
                :required="true"
                :errorMessage="passwordError"
            />

            <p v-if="authErrorMessage" class="login-form__api-error">{{ authErrorMessage }}</p>

            <BaseButton type="submit" :disabled="isLoading || !isFormValid">
                {{ isLoading ? 'Entrando...' : 'Logar' }}
            </BaseButton>
        </form>
    </div>
</template>

<script setup>
import { ref, computed, watch } from 'vue';
import { useStore } from 'vuex';
import { useRouter } from 'vue-router';

import BaseInput from '@/components/ui/BaseInput.vue';
import BaseButton from '@/components/ui/BaseButton.vue';

const store = useStore();
const router = useRouter();

const email = ref('');
const password = ref('');

const emailError = ref('');
const passwordError = ref('');

const authErrorMessage = computed(() => store.getters.authError);
const isLoading = computed(() => store.getters.isLoading);

const isFormValid = computed(() => {
    return email.value.trim() !== '' && password.value.trim() !== '' && !emailError.value && !passwordError.value;
});

const validateEmail = () => {
    if (email.value.trim() === '') {
        emailError.value = 'O e-mail é obrigatório.';
    } else if (!email.value.includes('@') || !email.value.includes('.')) {
        emailError.value = 'E-mail inválido.';
    } else {
        emailError.value = '';
    }
};

const validatePassword = () => {
    if (password.value.trim() === '') {
        passwordError.value = 'A senha é obrigatória.';
    } else if (password.value.length < 6) {
        passwordError.value = 'A senha deve ter no mínimo 6 caracteres.';
    } else {
        passwordError.value = '';
    }
};

watch(email, validateEmail);
watch(password, validatePassword);

const handleSubmit = async () => {
    validateEmail();
    validatePassword();

    if (!isFormValid.value) {
        console.warn('Formulário inválido, corrija os erros.');
        return;
    }

    const success = await store.dispatch('login', {
        email: email.value,
        password: password.value,
    });

    if (success) {
        router.push('/profile');
    }
};
</script>

<style lang="scss" scoped>
@import '@/assets/styles/global.scss';

.login-form {
    background-color: white;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    width: 100%;
    max-width: 420px; 
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;

    &__logo {
        max-width: 180px;
        margin-bottom: 25px;
    }

    &__title {
        font-size: 2.2em;
        font-weight: bold;
        margin-bottom: 10px;
        color: $primary-color;
    }

    &__subtitle {
        font-size: 1.1em;
        margin-bottom: 5px;
        color: $dark-grey;
    }

    &__description {
        font-size: 0.95em;
        color: $dark-grey;
        margin-bottom: 20px;
    }

    &__instruction {
        font-size: 1em;
        font-weight: bold;
        color: $primary-color;
        margin-bottom: 25px;
    }

    &__form {
        width: 100%;
        display: flex;
        flex-direction: column;

        .base-button {
            margin-top: 15px;
        }
    }

    &__api-error {
        color: #e74c3c;
        font-size: 0.9em;
        margin-top: -5px;
        margin-bottom: 15px;
        text-align: left;
    }
}
</style>