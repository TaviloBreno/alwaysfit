<template>
    <header class="the-header">
        <div class="the-header__content">
            <span class="the-header__contact">Havendo qualquer dúvida, entre em contato com nosso SAC</span>
            <a href="https://wa.me/5517991266117" target="_blank" class="the-header__whatsapp-button">
                <span class="material-icons-outlined">whatsapp</span>
                SAC pelo whatsapp
            </a>
        </div>
    </header>
</template>

<script setup>
</script>

<style lang="scss" scoped>
@import '@/assets/styles/global.scss';

.the-header {
    background-color: $secondary-color;
    color: white;
    padding: 10px 0;
    font-size: 0.9em;
    position: fixed; 
    width: 100%;
    top: 0;
    left: 0;
    z-index: 1000; 

    &__content {
        @extend .container;
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 20px;
    }

    &__contact {
        margin-right: auto;
    }

    &__whatsapp-button {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background-color: $accent-color;
        color: white;
        padding: 8px 15px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        transition: background-color 0.2s ease-in-out;

        &:hover {
            background-color: darken($accent-color, 10%);
        }

        .material-icons-outlined {
            font-size: 1.1em;
        }
    }
}
</style>