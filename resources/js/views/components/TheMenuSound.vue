<template>
  <div class="menu__sound" v-if="review">
    <button @click="soundToggle">
      <img :src="played_sound ? soundOn : soundOff" alt="" />
      <audio
        :src="review.sound"
        v-if="played_sound"
        autoplay
        loop="loop"
      ></audio>
    </button>
  </div>
</template>



<script setup>
import soundOff from "@assets/sound-off.svg";
import soundOn from "@assets/sound-on.svg";
import { computed, ref } from "@vue/runtime-core";
import { useRoute } from "vue-router";
import { useStore } from "vuex";
const route = useRoute();
const store = useStore();
//audio
const review = computed(() => {
  if (route.path == "/") {
    return null;
  }
  return store.getters.getReview;
});
const played_sound = ref(false);
const soundToggle = () => {
  played_sound.value = !played_sound.value;
};
</script>

<style lang="scss" scoped>
.menu__sound {
  position: absolute;
  top: 12px;
  right: 0;
  padding: 10px;
  background: rgba($white, 0.2);
  border-radius: $br;
  box-shadow: 0 4px 30px rgba($black, 0.1);
  -webkit-backdrop-filter: blur($br);
  backdrop-filter: blur($br);
  border: 1px solid rgba($white, 0.3);
}
</style>