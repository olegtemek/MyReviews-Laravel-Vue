<template>
  <div class="loading">
    <div class="loading__item"></div>
  </div>
</template>

<script>
export default {
  name: "LoadingComponent",
};
</script>
<style lang="scss" scoped>
.loading {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: $black;
  opacity: 0.8;
  z-index: 10;
  &__item {
    position: relative;
    z-index: 99;
    width: 80px;
    height: 80px;
    border-radius: 50%;
    border: 2px solid rgb(134, 134, 134);
    border-bottom-color: $white;
    animation: spin 1.5s linear infinite;
  }
  @keyframes spin {
    from {
      transform: rotate(0);
    }
    to {
      transform: rotate(360deg);
    }
  }
}
</style>