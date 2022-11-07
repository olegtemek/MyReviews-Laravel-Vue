<template>
  <div class="menu">
    <div class="container">
      <div class="menu__wrapper" ref="menuTarget">
        <div class="menu__top">
          <div
            class="menu__button"
            :class="close ? 'close' : ''"
            @click="toggleMenu"
          >
            <div class="burger">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <button>{{ $t("Menu") }}</button>
          </div>
          <div class="menu__language">
            <button
              @click="choseLang('en')"
              :class="current_lang == 'en' ? 'active' : ''"
            >
              <img src="@assets/eng.svg" alt="" />
            </button>
            <button
              @click="choseLang('ru')"
              :class="current_lang == 'ru' ? 'active' : ''"
            >
              <img src="@assets/ru.svg" alt="" />
            </button>
          </div>
        </div>
        <Transition name="menu">
          <TheMenuList v-if="close" />
        </Transition>
      </div>

      <TheMenuSound />
    </div>
  </div>
</template>

<script setup>
import TheMenuSound from "@/views/components/TheMenuSound.vue";
import TheMenuList from "@/views/components/TheMenuList.vue";
import { ref } from "@vue/reactivity";
import { onClickOutside } from "@vueuse/core";
import { inject } from "vue";
const current_lang = inject("lang");
const close = ref(false);
const emit = defineEmits(["changeLang"]);

const menuTarget = ref(null);
onClickOutside(menuTarget, (event) => {
  if (close.value) {
    close.value = false;
  }
});

const toggleMenu = () => {
  close.value = !close.value;
};
const choseLang = (lang) => {
  emit("changeLang", lang);
};
</script>



<style lang="scss" scoped>
.menu {
  padding-top: 60px;
  .container {
    position: relative;
    z-index: 999;
  }
  &__wrapper {
    left: 0;
    top: 0;
    position: absolute;
    width: 260px;
    height: auto;
    padding: 10px;
    background: rgba($white, 0.3);
    border-radius: $br;
    box-shadow: 0 4px 30px rgba($black, 0.1);
    backdrop-filter: blur($br);
    -webkit-backdrop-filter: blur($br);
    border: 1px solid rgba($white, 0.4);
    transition: $tr;
    z-index: 9999;
    @media (max-width: 414px) {
      width: 140px;
    }
  }

  &__top {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 10px;

    @media (max-width: 414px) {
      flex-direction: column;
      align-items: flex-start;
    }
  }
  &__language {
    display: flex;
    align-items: center;
    justify-content: center;
    @media (max-width: 414px) {
      padding-top: 20px;
    }

    button {
      margin-left: 10px;
      transition: $tr;
      &.active {
        box-shadow: 0 0 4px $white;
      }
      @media (max-width: 414px) {
        width: 40px;
        height: 30px;
        &:first-child {
          margin-left: 0;
        }
      }
      img {
        object-fit: cover;
        width: 100%;
        height: 100%;
      }
    }
  }
  &__button {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    cursor: pointer;
    &.close {
      .burger {
        span {
          transform: translate(-50%, -50%);
          top: 50% !important;
          left: 50% !important;
          &:first-child {
            transform: translate(-50%, -50%) rotate(45deg);
          }
          &:nth-child(2) {
            opacity: 0;
          }
          &:last-child {
            transform: translate(-50%, -50%) rotate(-45deg);
          }
        }
      }
    }

    .burger {
      cursor: pointer;
      width: 14px;
      height: 14px;
      padding: 10px;
      background-color: $white;
      position: relative;
      border-radius: $br;
      span {
        transition: $tr;
        position: absolute;
        background-color: $black;
        width: 60%;
        height: 2px;
        left: 50%;
        transform: translate(-50%, 0%);
        &:first-child {
          top: 10px;
        }
        &:nth-child(2) {
          top: 16px;
        }
        &:last-child {
          top: 22px;
        }
      }
    }

    > button {
      margin-left: 10px;
      font-size: 24px;
      text-transform: uppercase;
    }
  }
}
</style>