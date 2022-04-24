<template>
  <div class="page-loader" v-if="!isloaded">
    <div class="cube"></div>
    <div class="cube"></div>
    <div class="cube"></div>
    <div class="cube"></div>
  </div>
</template>

<script>
export default {
  name: "PageLoader",
  data(){
      return {
          isloaded: false
      }
  },
  mounted() {
      document.onreadystatechange = () => {
        if (document.readyState == "complete") { 
          this.isloaded = true;
        } 
      }
    },
};
</script>

<style lang="scss" scoped>
$colors: #023020, #4169e1, #FFF, #D4AF37;
  // -----------------------------------------------------
  .page-loader {
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background-color: #04091e;
    z-index: 999;
  }
  // -----------------------------------------------------
  .cube{
    width: 20px;
    height: 20px;
    margin-right: 10px;
    @for $i from 1 through length($colors) {
      &:nth-child(#{$i}) {
        background-color: nth($colors, $i);
      }
    }
    &:first-child {
      animation: left 1s infinite;
    }
    &:last-child {
      animation: right 1s infinite .5s;
    }
  }
  // -----------------------------------------------------
  @keyframes left {
    40% {
      transform: translateY(-60px);
    }
    50% {
      transform: translateY(0);      
    }
  }
  @keyframes right {
    40% {
      transform: translateY(60px);
    }
    50% {
      transform: translateY(0);
    }
  }
</style>