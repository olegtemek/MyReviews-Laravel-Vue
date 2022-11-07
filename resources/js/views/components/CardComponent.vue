<template>
  <div v-if="props.title" class="home__wrapper-inner">
    <h1>{{ props.title }}</h1>
    <p v-if="props.text">
      {{ props.text }}
    </p>
    <ul v-else>
      <li v-for="(item, index) of props.list" :key="index">
        {{ item }}
      </li>
    </ul>
  </div>
</template>



<script setup>
const props = defineProps({
  title: [String],
  text: [String],
  list: [Array],
});
</script>

<style lang="scss" scoped>
.home__wrapper-inner {
  display: flex;
  align-items: center;
  flex-direction: column;
  justify-content: center;
  max-width: 800px;
  padding: 20px;
  background: rgba($white, 0.3);
  border-radius: $br;
  box-shadow: 0 4px 30px rgba($black, 0.1);
  backdrop-filter: blur($br);
  -webkit-backdrop-filter: blur($br);
  border: 1px solid rgba($white, 0.4);
  margin-top: 40px;
  @media (max-width: 800px) {
    margin-top: 20px;
  }
  @media (max-width: 400px) {
    padding: 10px;
  }

  h1 {
    font-size: 40px;
    font-weight: $fw-medium;
    padding-bottom: 20px;
    text-align: center;
    @media (max-width: 800px) {
      font-size: 24px;
    }
  }
  p {
    font-size: 18px;
    line-height: 120%;
    text-align: center;
    @media (max-width: 400px) {
      font-size: 16px;
    }
  }
  ul {
    width: 100%;
    display: flex;
    flex-direction: column;
    li {
      margin-bottom: 10px;
      &:last-child {
        margin-bottom: 0;
      }
    }
  }
}
</style>