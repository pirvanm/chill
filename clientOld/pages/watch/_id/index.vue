<template>
    <div>
      <div class="lds-facebook"><div></div><div></div><div></div></div>
    </div>
</template>

<script>
export default {
    mounted() {
        this.gotoWatch();
    },
    methods: {
        gotoWatch() {
            this.$router.push(`/watch?v=${this.$route.params.id}`);
        },
        toggleSidebar() {
            const sidebar = document.querySelector(".sidebar");
            sidebar.classList.toggle('shown')
        },
    
    }
};
</script>

<style>

.lds-facebook {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
   position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
.lds-facebook div {
  display: inline-block;
  position: absolute;
  left: 8px;
  width: 16px;
  background: #fcf;
  animation: lds-facebook 1.2s cubic-bezier(0, 0.5, 0.5, 1) infinite;
}
.lds-facebook div:nth-child(1) {
  left: 8px;
  animation-delay: -0.24s;
}
.lds-facebook div:nth-child(2) {
  left: 32px;
  animation-delay: -0.12s;
}
.lds-facebook div:nth-child(3) {
  left: 56px;
  animation-delay: 0;
}
@keyframes lds-facebook {
  0% {
    top: 8px;
    height: 64px;
  }
  50%, 100% {
    top: 24px;
    height: 32px;
  }
}

</style>
