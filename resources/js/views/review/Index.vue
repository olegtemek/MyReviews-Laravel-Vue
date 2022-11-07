<template>
  <div class="review" v-if="review">
    <div class="container">
      <div class="review__wrapper">
        <div class="review__info">
          <h1>{{ current_lang == "en" ? review.name : review.name_ru }}</h1>
          <p>
            {{
              current_lang == "en" ? review.description : review.description_ru
            }}
          </p>
        </div>
        <div class="review__video">
          <iframe
            :src="`https://www.youtube.com/embed/${review.video}`"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
          ></iframe>
        </div>
      </div>
    </div>
  </div>
  <LoadingComponent v-else />
</template>



<script setup>
import { computed, onMounted } from "@vue/runtime-core";
import { useRoute } from "vue-router";
import { useStore } from "vuex";
import { inject } from "vue";
const store = useStore();
const current_lang = inject("lang");
const route = useRoute();

onMounted(() => {
  store.dispatch("fetchReview", route.params.name);
});

const review = computed(() => {
  return store.getters.getReview;
});
</script>

<style lang="scss" scoped>
.review {
  padding-top: 40px;
  &__info {
    padding-top: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    h1 {
      font-size: 32px;
      font-weight: $fw-medium;
      padding-bottom: 20px;
    }
    p {
      max-width: 600px;
      font-size: 20px;
      line-height: 120%;
      text-align: center;
    }
  }
  &__video {
    padding-top: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
    iframe {
      width: 800px;
      height: 500px;
      border-radius: $br;
      @media (max-width: 940px) {
        width: 100%;
        height: 400px;
      }
      @media (max-width: 640px) {
        height: 300px;
      }
    }
  }
}
</style>