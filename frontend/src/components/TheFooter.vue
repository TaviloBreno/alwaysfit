<template>
  <footer class="the-footer">
    <div class="container the-footer__grid">
      <div class="the-footer__logo-area">
        <img src="@/assets/images/always-fit-footer-logo.png" alt="Always Fit Logo" class="the-footer__logo" />
      </div>

      <div class="the-footer__info">
        <h3 class="the-footer__heading">ALWAYS FIT ®</h3>
        <p>Saúde Longevidade e Autoestima</p>

        <h3 class="the-footer__heading mt">Contato:</h3>
        <p>0800 454 5103</p>
        <p>17 99126-6117 (Whatsapp)</p>

        <h3 class="the-footer__heading mt">Endereço:</h3>
        <p>Rodovia Fernão Dias, 937</p>
        <p>Complemento: BW Diase -</p>
        <p>DocaLog G500 Módulo 5</p>
        <p>CEP: 37646-202</p>
        <p>Extrema - MG</p>
        <p>30.417.094/0001-60</p>
      </div>

      <div class="the-footer__policy">
        <h3 class="the-footer__heading">POLÍTICA</h3>
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
// Sem lógica JS
</script>

<style lang="scss" scoped>
@import '@/assets/styles/global.scss';

.the-footer {
  background-color: $secondary-color;
  color: white;
  padding-top: 40px;

  &__grid {
    display: grid;
    grid-template-columns: 1fr 2fr 1fr;
    gap: 30px;
    padding-bottom: 40px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    align-items: start;
  }

  &__logo-area {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  &__logo {
    max-width: 120px;
    height: auto;
  }

  &__info,
  &__policy {
    font-size: 0.9em;
    line-height: 1.6;

    h3.the-footer__heading {
      font-size: 1.1em;
      margin-bottom: 10px;
      color: lighten($secondary-color, 30%);
    }

    .mt {
      margin-top: 20px;
    }

    ul {
      list-style: none;
      padding: 0;
      margin-top: 10px;
    }

    li {
      margin-bottom: 8px;
    }

    .the-footer__link {
      color: white;
      text-decoration: none;
      transition: color 0.2s ease-in-out;

      &:hover {
        color: $accent-color;
      }
    }
  }

  &__copyright {
    text-align: center;
    padding: 20px;
    font-size: 0.85em;
    color: rgba(255, 255, 255, 0.7);
  }

  @media (max-width: 768px) {
    &__grid {
      grid-template-columns: 1fr;
      text-align: center;
    }

    &__logo-area {
      justify-content: center;
      margin-bottom: 20px;
    }

    &__policy ul {
      padding: 0;
    }
  }
}
</style>
