<template>
  <footer class="footer">
    <div class="footer__wrapper">
      <a href="https://github.com/olegtemek">{{ $t("Github") }}</a>
      <a href="https://portfolio.olegtemek.kz">{{ $t("My portfolio") }}</a>
    </div>
  </footer>
</template>

<style lang="scss" scoped>
.footer {
  padding: 40px 0;
  &__wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    > a {
      margin-right: 40px;
      font-size: 24px;
      color: $white;
      font-weight: $fw-medium;
      @media (max-width: 400px) {
        font-size: 18px;
        margin-right: 20px;
      }
      &:last-child {
        margin-right: 0;
      }
    }
  }
}
</style>