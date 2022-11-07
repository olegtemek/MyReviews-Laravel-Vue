<template>
  <div
    class="main"
    :style="review ? { backgroundImage: `url(${review.image})` } : ''"
  >
    <div class="container main__wrapper">
      <TheMenu @changeLang="changeLang" />
      <router-view :key="$route.path"></router-view>
      <TheFooter />
    </div>
  </div>
</template>


<script setup>
import TheMenu from "@/views/components/TheMenu.vue";
import TheFooter from "@/views/components/TheFooter.vue";
import { computed, ref } from "@vue/runtime-core";
import { useRoute } from "vue-router";
import { useStore } from "vuex";
import { loadLanguageAsync, getActiveLanguage } from "laravel-vue-i18n";
import { provide } from "vue";
const current_lang = ref(getActiveLanguage());
const route = useRoute();
const store = useStore();
const review = computed(() => {
  if (route.path == "/") {
    return null;
  }
  return store.getters.getReview;
});

provide("lang", current_lang);

const changeLang = (lang) => {
  localStorage.setItem("lang", lang);
  loadLanguageAsync(lang);
  current_lang.value = lang;
};
</script>



<style lang="scss" scoped>
.main {
  background-image: url("@assets/bg.jpg");
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  width: 100%;
  min-height: 100vh;
  &::after {
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    background-color: $black;
    opacity: 0.6;
    top: 0;
    left: 0;
    z-index: 1;
  }
  &__wrapper {
    position: relative;
    z-index: 3;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }
}
</style>