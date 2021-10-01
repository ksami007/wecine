<template>
  <div class="custom-loader"><div></div><div></div><div></div></div>
</template>

<script>
export default {

}
</script>

<style scoped>
    .custom-loader {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
    }
    .custom-loader div {
        display: inline-block;
        position: absolute;
        left: 8px;
        width: 16px;
        background: #dee2e6;
        animation: custom-loader 1.2s cubic-bezier(0, 0.5, 0.5, 1) infinite;
    }
    .custom-loader div:nth-child(1) {
        left: 8px;
        animation-delay: -0.24s;
    }
    .custom-loader div:nth-child(2) {
        left: 32px;
        animation-delay: -0.12s;
    }
    .custom-loader div:nth-child(3) {
        left: 56px;
        animation-delay: 0;
    }
    @keyframes custom-loader {
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