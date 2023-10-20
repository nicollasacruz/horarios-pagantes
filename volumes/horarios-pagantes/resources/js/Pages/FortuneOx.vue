<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import BgFortuneOx from '../../../storage/app/public/img/bg-fortune-ox.jpg';
import BgFortuneOxMobile from '../../../storage/app/public/img/bg-fortune-ox-mobile.jpg';
import BoxFortuneOx from '../../../storage/app/public/img/box-horarios-ox.png';
import BoxFortuneOxMobile from '../../../storage/app/public/img/box-horarios-ox-mobile.png';
import { Head } from '@inertiajs/vue3';

function isMobile() {
  if (screen.width <= 760) {
    return true;
  }
  else {
    return false;
  }
}

function isIpad() {
  if (screen.width > 760 && screen.width < 1000) {
    return true;
  }
  else {
    return false;
  }
}

defineProps({ horarios: Array, porcentagem: Number })

const mobile = isMobile();
const ipad = isIpad();
const fundo = `background-image: url(${BgFortuneOx})`;
const fundoMobile = `background-image: url(${BgFortuneOxMobile})`;
const box = `background-image: url(${BoxFortuneOx})`;
const boxMobile = `background-image: url(${BoxFortuneOxMobile})`;

</script>
<style>
@import url('https://fonts.cdnfonts.com/css/yanone-kaffeesatz');

body {
  margin: 0;
  padding: 0;
}

.container {
  /* min-height: 100vh !important; */
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  min-width: 100vw;
  height: 65vw;
  background-repeat: no-repeat;
  background-size: 100vw auto;
  background-position: start;
}

.containerMobile {
  /* min-height: 100vh !important; */
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  width: 100wv;
  max-height: 127vw;
  background-repeat: no-repeat;
  background-size: 100vw auto;
  background-position: start;
}

.containerIpad {
  /* min-height: 100vh !important; */
  width: 100wv;
  height: 970px;
  background-repeat: no-repeat;
  background-size: 100vw auto;
  background-position: start;
}

.sub-div {
  margin-top: -20px;
}

.sub-divIpad {
  margin-top: 50px;
}

.sub-div1 {
  height: 10vw;
  width: 100vw;
}

.sub-div1Mobile {
  height: 30vh;
  width: 100%;
}

.sub-div1Ipad {
  height: 54vh;
  width: 100%;
}

.sub-div2 {
  min-height: 48vh;
  width: 100vw;
  max-width: 1920px !important;
  background-size: 95vh auto;
  background-repeat: no-repeat;
  background-position: center;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: center;
}

.sub-div2Mobile {
  width: 100vw;
  height: 230px;
  margin: 0 auto;
  background-size: 320px;
  background-repeat: no-repeat;
  background-position: center;
  display: flex;
  justify-content: center;
  align-items: center;
}

.sub-div2Ipad {
  width: 100vw;
  height: 350px;
  margin: 0 auto;
  background-size: auto 350px;
  background-repeat: no-repeat;
  background-position: center;
  display: flex;
  justify-content: center;
  align-items: center;
}

/* Mr. Hallo-win: #49227D
Fortune Tiger: #AB161B
Fortune OX: #AB161B */

.horarios {
  width: 10vw;
  text-align: center;
  font-family: 'Yanone Kaffeesatz', sans-serif;
  font-weight: bold;
  font-size: 1.7rem;
  color: #AB161B;
  border-radius: 5px;
  box-shadow: 0 3px;
  /* background: rgb(253,184,39); */
  background: linear-gradient(180deg, rgba(253, 184, 39, 1) 0%, rgba(253, 226, 103, 1) 100%);
}

.horariosMobile {
  width: 16vw;
  text-align: center;
  font-family: 'Yanone Kaffeesatz', sans-serif;
  font-weight: bold;
  font-size: 0.7rem;
  color: #AB161B;
  border-radius: 3px;
  box-shadow: 0 3px;
  /* background: rgb(253,184,39); */
  background: linear-gradient(180deg, rgba(253, 184, 39, 1) 0%, rgba(253, 226, 103, 1) 100%);
}

.horariosIpad {
  width: 18vw;
  text-align: center;
  font-family: 'Yanone Kaffeesatz', sans-serif;
  font-weight: bold;
  font-size: 1.3rem;
  color: #AB161B;
  border-radius: 3px;
  box-shadow: 0 3px;
  /* background: rgb(253,184,39); */
  background: linear-gradient(180deg, rgba(253, 184, 39, 1) 0%, rgba(253, 226, 103, 1) 100%);
}

.iframe {
  margin: 0px auto;
  width: 95vw;
  min-height: 100vh;
  /* background: rgb(253,184,39); */
}

.iframeMobile {
  margin: 0px auto;
  width: 92vw;
  min-height: 100vh;
  /* background: rgb(253,184,39); */
}

.iframeIpad {
  margin: 0px auto;
  width: 92vw;
  min-height: 100vh;
  /* background: rgb(253,184,39); */
}
</style>

<template>
  <Head title="Fortune Ox" />

  <AuthenticatedLayout>
    <!-- <template #header> -->
    <!-- <h2 class="font-semibold text-xl text-white leading-tight">Fortune Ox</h2> -->
    <!-- </template> -->

    <div :class="mobile ? 'containerMobile' : ipad ? 'containerIpad' : 'container'"
      :style="mobile || ipad ? fundoMobile : fundo">
      <div :class="mobile ? 'sub-div1Mobile' : ipad ? 'sub-div1Ipad' : 'sub-div1'"></div>
      <div v-if="!mobile && !ipad" class="sub-div2" :style="box">
        <div class="w-[40%] h-6 bg-gray-200 rounded-full dark:bg-gray-700 absolute border border-2 border-black">
          <div class="h-6 bg-green-600 rounded-full dark:bg-green-500 text-center font-bold"
            style="width: {{porcentagem}}%">{{ porcentagem }}% de acertividade</div>
        </div>
        <div class="grid grid-cols-4 gap-3  z-50 max-w-4xl m-auto">
          <span class="horarios" v-for="(horario, index) in horarios" :key="index">
            {{ horario }}
          </span>
        </div>
      </div>

      <div v-if="ipad" class="sub-div2Ipad" :style="boxMobile">
        <div class="sub-divIpad grid grid-cols-4 gap-3 z-50 max-w-4xl m-auto">
          <span class="horariosIpad" v-for="(horario, index) in horarios" :key="index">
            {{ horario }}
          </span>
        </div>
      </div>

      <div v-if="mobile" class="sub-div2Mobile" :style="boxMobile">
        <div class="sub-div grid grid-cols-4 gap-1 ">
          <span class="horariosMobile" v-for="(horario, index) in horarios" :key="index">
            {{ horario }}
          </span>
        </div>
      </div>

    </div>
    <div class="bg-black">
      <iframe v-if="!mobile && !ipad" class="iframe"
        src="https://realsbet.com/casino/game/1970229?provider=MrSlotty&btag=CX-48560_421110" frameborder="0"></iframe>
      <iframe v-if="ipad" class="iframeMobile"
        src="https://m.realsbet.com/casino/game/1970229?provider=MrSlotty&btag=CX-48560_421110" frameborder="0"></iframe>
      <iframe v-if="mobile" class="iframeMobile"
        src="https://m.realsbet.com/casino/game/1970229?provider=MrSlotty&btag=CX-48560_421110" frameborder="0"></iframe>
    </div>
  </AuthenticatedLayout>
</template>
