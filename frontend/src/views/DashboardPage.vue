<template>
  <div class="dashboard-page">
    <div class="dashboard-page__top-banner">
      <p>
        Havendo qualquer dúvida, entre em contato com nosso SAC
        <strong>(17) 9 9126-6117</strong>
      </p>
      <a
        href="https://wa.me/5517991266117"
        target="_blank"
        class="whatsapp-button"
      >
        SAC pelo whatsapp
      </a>
    </div>

    <TheHeader />
    <DashboardHeader />

    <main class="dashboard-page__content container">
      <section class="dashboard-page__navigation-section">
        <DashboardNavCard
          title="Treinos"
          imageUrl="/assets/images/dashboard-treinos.jpg"
          to="/trainings"
          @navigate="goToRoute"
        />
        <DashboardNavCard
          title="Plano nutricional"
          imageUrl="/images/dashboard-nutricao.png"
          to="/nutrition-plans"
          @navigate="goToRoute"
        />
        <DashboardNavCard
          title="Progresso"
          imageUrl="/images/dashboard-progresso.png"
          to="/progress"
          @navigate="goToRoute"
        />
      </section>

      <section class="dashboard-page__stats-section">
        <DashboardStatsCard
          title="Treinos concluídos / semana"
          :value="dashboardData.completedWorkouts"
        />
        <DashboardStatsCard
          title="Treinos disponíveis"
          :value="dashboardData.availableWorkouts"
        />
        <DashboardStatsCard
          title="Treinos restantes"
          :value="dashboardData.remainingWorkouts"
        />
      </section>
    </main>

    <TheFooter />
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRouter } from 'vue-router'
import TheHeader from '@/components/TheHeader.vue'
import TheFooter from '@/components/TheFooter.vue'
import DashboardHeader from '@/components/DashboardHeader.vue'
import DashboardNavCard from '@/components/DashboardNavCard.vue'
import DashboardStatsCard from '@/components/DashboardStatsCard.vue'
import apiClient from '@/plugins/axios'

const router = useRouter()

const dashboardData = ref({
  completedWorkouts: 0,
  availableWorkouts: 0,
  remainingWorkouts: 0
})

const goToRoute = (routePath) => {
  router.push(routePath)
}

const fetchDashboardData = async () => {
  try {
    const response = await apiClient.get('/progress')
    dashboardData.value = {
      completedWorkouts: response.data.completed_workouts_week || 0,
      availableWorkouts: response.data.available_workouts || 0,
      remainingWorkouts: response.data.remaining_workouts || 0
    }
  } catch (error) {
    console.error('Erro ao buscar dados da dashboard:', error.response?.data || error.message)
  }
}

onMounted(fetchDashboardData)
</script>

<style lang="scss" scoped>
.dashboard-page {
    display: flex;
    flex-direction: column;
    min-height: 100vh;

    &__top-banner {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #2c2c3a;
        color: white;
        padding: 10px 20px;
        font-size: 0.95em;
        position: sticky;
        top: 0;
        z-index: 1000;

        p {
            margin: 0;
        }

        .whatsapp-button {
            background-color: #25d366;
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;

            &:hover {
                background-color: #1ebe57;
            }
        }
    }

    &__content {
        flex-grow: 1;
        padding-top: 30px;
        padding-bottom: 40px;
    }

    &__navigation-section {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        margin-bottom: 40px;
    }

    &__stats-section {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
    }

    @media (max-width: 1024px) {
        &__navigation-section,
        &__stats-section {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        &__top-banner {
            flex-direction: column;
            gap: 10px;
            text-align: center;
        }

        &__navigation-section,
        &__stats-section {
            grid-template-columns: 1fr;
        }
    }
}
</style>
