<template>
    <button
        :type="type"
        :disabled="disabled"
        class="base-button"
        :class="{'base-button--disabled': disabled}"
        @click="$emit('click')"
    >
        <slot></slot>
    </button>
</template>

<script setup>
import { defineProps, defineEmits } from 'vue';

defineProps({
    type: {
        type: String,
        default: 'button',
    },
    disabled: {
        type: Boolean,
        default: false,
    },
});

defineEmits(['click']);
</script>

<style lang="scss" scoped>
@import '@/assets/styles/global.scss';

.base-button {
    width: 100%;
    padding: 14px 20px;
    border: none;
    border-radius: 6px;
    font-size: 1.1em;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.2s ease-in-out, opacity 0.2s ease-in-out;
    background-color: $secondary-color; 
    color: white; 

    &:hover {
        background-color: darken($secondary-color, 10%);
    }

    &--disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }
}
</style>