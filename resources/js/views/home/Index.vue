<template>
  <div class="home">
    <div class="home__wrapper">
      <CardComponent
        :title="$t('Hello')"
        :text="
          $t(
            'On this site, I wanted to implement multi lang on vue + laravel and decided to envision the idea of the site. My choice fell on a site with my reviews about movies, anime'
          )
        "
      />
      <CardComponent
        :title="$t('Technologies that i used')"
        :list="[
          'Laravel',
          'Vue 3 with composition api',
          'Vuex',
          'Vue-router',
          'Vue-use(onClickOutside)',
          'Laravel vue i18n',
          'AdminLTE for admin panel templates',
          'Laravel elfinder',
        ]"
      />
    </div>
  </div>
</template>



<script setup>
import CardComponent from "@/views/components/CardComponent.vue";
</script>

<style lang="scss" scoped>
.home {
  padding-top: 80px;
  .container {
    height: 100%;
  }
  &__wrapper {
    height: 100%;
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
    @media (max-width: 800px) {
      margin-top: 40px;
    }
  }
}
</style>