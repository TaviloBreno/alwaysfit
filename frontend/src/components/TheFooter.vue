<template>
    <footer class="the-footer">
        <div class="the-footer__content container">
            <div class="the-footer__section the-footer__section--logo">
                <img src="@/assets/images/always-fit-footer-logo.png" alt="Always Fit Logo" class="the-footer__logo">
            </div>

            <div class="the-footer__section">
                <h3>ALWAYS FIT ®</h3>
                <p>Saúde Longevidade e Autoestima</p>
            </div>

            <div class="the-footer__section">
                <h3>Contato:</h3>
                <p>CEO: (17) 9.9103-6117</p>
                <p>Vendas: (17) 9.9126-6117 (WhatsApp)</p>
            </div>

            <div class="the-footer__section">
                <h3>Endereço:</h3>
                <p>Rodovia Fernão Dias, 937</p>
                <p>Complemento: S/N, Galpão 3</p>
                <p>DocaLog G500 Módulo 5</p>
                <p>CEP: 37640-000</p>
                <p>Extrema, MG</p>
                <p>30.417.094/0001-60</p>
            </div>

            <div class="the-footer__section the-footer__section--policy">
                <h3>POLÍTICA</h3>
                <ul>
                    <li><a href="#" class="the-footer__link">Quem Somos</a></li>
                    <li><a href="#" class="the-footer__link">Política de Segurança</a></li>
                    <li><a href="#" class="the-footer__link">Política de Privacidade</a></li>
                    <li><a href="#" class="the-footer__link">Política de Entrega</a></li>
                    <li><a href="#" class="the-footer__link">Política de Cookies</a></li>
                    <li><a href="#" class="the-footer__link">Política de Devolução</a></li>
                </ul>
            </div>
        </div>
        <div class="the-footer__copyright">
            <p>&copy; 2025 Always Fit</p>
        </div>
    </footer>
</template>

<script setup>
</script>

<style lang="scss" scoped>
@import '@/assets/styles/global.scss';

.the-footer {
    background-color: $secondary-color;
    color: white;
    padding-top: 40px;
    margin-top: auto;

    &__content {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); 
        gap: 30px;
        padding-bottom: 40px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    &__section {
        h3 {
            font-size: 1.1em;
            margin-bottom: 15px;
            color: lighten($secondary-color, 30%);
        }

        p {
            font-size: 0.9em;
            line-height: 1.6;
            margin-bottom: 5px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 8px;
        }
    }

    &__section--logo {
        display: flex;
        align-items: center;
    }

    &__logo {
        max-width: 150px;
        height: auto;
    }

    &__link {
        color: white;
        text-decoration: none;
        font-size: 0.9em;
        transition: color 0.2s ease-in-out;

        &:hover {
            color: $accent-color;
        }
    }

    &__copyright {
        text-align: center;
        padding: 20px;
        font-size: 0.85em;
        color: rgba(255, 255, 255, 0.7);
    }

    @media (max-width: 768px) {
        &__content {
            grid-template-columns: 1fr;
            text-align: center;
        }
        &__section--logo {
            justify-content: center;
        }
    }
}
</style>