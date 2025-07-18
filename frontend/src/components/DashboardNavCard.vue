<template>
  <div class="dashboard-nav-card" @click="handleClick">
    <div class="dashboard-nav-card__image-wrapper">
      <img :src="imageUrl" :alt="title" class="dashboard-nav-card__image" />
    </div>
    <h3 class="dashboard-nav-card__title">{{ title }}</h3>
  </div>
</template>

<script setup>
import { defineEmits, defineProps } from 'vue'

const props = defineProps({
  title: { type: String, required: true },
  imageUrl: { type: String, required: true },
  to: { type: String, required: true }
})

const emit = defineEmits(['navigate'])

const handleClick = () => {
  emit('navigate', props.to)
}
</script>

<style lang="scss" scoped>
.dashboard-nav-card {
  background-color: #0f2c3f;
  border-radius: 12px;
  overflow: hidden;
  cursor: pointer;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
  text-align: center;
  display: flex;
  flex-direction: column;
  align-items: center;
  padding-bottom: 20px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);

  &:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
  }

  &__image-wrapper {
    width: 100%;
    height: 170px;
    overflow: hidden;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
  }

  &__image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
  }

  &__title {
    font-size: 1.15em;
    font-weight: 500;
    color: white;
    margin-top: 12px;
    padding: 0 10px;
  }
}
</style>
