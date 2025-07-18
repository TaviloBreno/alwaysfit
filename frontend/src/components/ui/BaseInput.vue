<template>
    <div class="base-input">
        <label v-if="label" :for="id" class="base-input__label">{{ label }}</label>
        <input
            :id="id"
            :type="type"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            :placeholder="placeholder"
            :required="required"
            class="base-input__field"
        />
        <p v-if="errorMessage" class="base-input__error">{{ errorMessage }}</p>
    </div>
</template>

<script setup>
import { defineProps, defineEmits } from 'vue';

defineProps({
    id: {
        type: String,
        required: true,
    },
    label: {
        type: String,
        default: '',
    },
    type: {
        type: String,
        default: 'text',
    },
    modelValue: { // Prop para v-model
        type: String,
        default: '',
    },
    placeholder: {
        type: String,
        default: '',
    },
    required: {
        type: Boolean,
        default: false,
    },
    errorMessage: {
        type: String,
        default: '',
    },
});

defineEmits(['update:modelValue']);
</script>

<style lang="scss" scoped>
@import '@/assets/styles/global.scss'; // Importa variáveis globais

.base-input {
    margin-bottom: 15px; // Espaçamento entre inputs

    &__label {
        display: block;
        font-size: 0.9em;
        color: $dark-grey;
        margin-bottom: 5px;
    }

    &__field {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid $border-color;
        border-radius: 6px;
        font-size: 1em;
        outline: none;
        transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;

        &:focus {
            border-color: $accent-color;
            box-shadow: 0 0 0 3px rgba($accent-color, 0.2);
        }

        &::placeholder {
            color: $medium-grey;
        }
    }

    &__error {
        color: #e74c3c; // Vermelho para erro
        font-size: 0.85em;
        margin-top: 5px;
    }
}
</style>