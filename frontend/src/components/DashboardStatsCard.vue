<template>
  <div class="dashboard-stats-card">
    <h4 class="dashboard-stats-card__title">{{ title }}</h4>
    <p class="dashboard-stats-card__value">{{ value }}</p>
  </div>
</template>

<script setup>
import { defineProps } from 'vue';

defineProps({
  title: {
    type: String,
    required: true
  },
  value: {
    type: [String, Number],
    required: true
  }
})
</script>

<style lang="scss" scoped>
.dashboard-stats-card {
  background-color: white;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
  padding: 24px 20px;
  text-align: center;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;

  &__title {
    font-size: 0.95em;
    color: $dark-grey;
    margin-bottom: 10px;
    font-weight: 500;
    line-height: 1.4;
    text-transform: none;
  }

  &__value {
    font-size: 2.5em;
    font-weight: bold;
    color: $primary-color;
    line-height: 1.1;
  }
}
</style>
