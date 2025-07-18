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

            <BaseButton type="submit" :disabled="isSubmitting || !isFormValid">
                {{ isSubmitting ? 'Entrando...' : 'Logar' }}
            </BaseButton>
        </form>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import BaseInput from '@/components/ui/BaseInput.vue';
import BaseButton from '@/components/ui/BaseButton.vue';

// Estado do formulário
const email = ref('');
const password = ref('');
const isSubmitting = ref(false);

const emailError = ref('');
const passwordError = ref('');

const isFormValid = computed(() => {
    return email.value.trim() !== '' && password.value.trim() !== '' && !emailError.value && !passwordError.value;
});

const validateEmail = () => {
    if (!email.value.includes('@') || !email.value.includes('.')) {
        emailError.value = 'E-mail inválido.';
    } else {
        emailError.value = '';
    }
};


watch(email, validateEmail); 
watch(password, (newVal) => {
    if (newVal.length < 6 && newVal.length > 0) {
        passwordError.value = 'A senha deve ter no mínimo 6 caracteres.';
    } else {
        passwordError.value = '';
    }
});


const handleSubmit = async () => {
    validateEmail(); 
    if (password.value.length < 6) { // Valida a senha antes de enviar
         passwordError.value = 'A senha deve ter no mínimo 6 caracteres.';
    }

    if (!isFormValid.value) {
        console.warn('Formulário inválido, corrija os erros.');
        return;
    }

    isSubmitting.value = true;
    try {
        console.log('Tentando logar com:', { email: email.value, password: password.value });
        await new Promise(resolve => setTimeout(resolve, 1500)); // Simula requisição
        console.log('Login bem-sucedido!');
    } catch (error) {
        console.error('Erro no login:', error);
    } finally {
        isSubmitting.value = false;
    }
};


import { watch } from 'vue';
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
}
</style>