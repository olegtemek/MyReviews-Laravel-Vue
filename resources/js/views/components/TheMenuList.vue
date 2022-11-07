<template>
  <div class="menu__list">
    <router-link class="menu__list-item" to="/">{{ $t("Home") }}</router-link>
    <router-link
      class="menu__list-item"
      :to="`/${name.slug}`"
      v-for="(name, index) of names"
      :key="index"
      >{{ current_lang == "en" ? name.name : name.name_ru }}</router-link
    >
  </div>
</template>



<script setup>
import { computed, inject, onMounted } from "@vue/runtime-core";
import { useStore } from "vuex";
const store = useStore();
const current_lang = inject("lang");
onMounted(() => {
  store.dispatch("fetchNames");
});

const names = computed(() => {
  return store.getters.getNames;
});
</script>

<style lang="scss" scoped>
.menu__list {
  transform-origin: top;
  transition: transform $tr;
  overflow: hidden;
  padding: 10px 0;
  display: flex;
  flex-direction: column;

  &-item {
    font-size: 18px;
    margin-bottom: 10px;
    padding: 10px 20px;
    border: 1px solid transparent;
    transition: $tr;
    border-radius: $br;
    &.router-link-active {
      border: 1px solid $white;
    }
  }
}
.menu-enter-active,
.menu-leave-active {
  transform: scaleY(0);
}
.menu-enter,
.menu-leave-to {
  transform: scaleY(0);
}
</style>