<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import BgFortuneTiger from '../../../storage/app/public/img/bg-fortune-tiger.jpg';
import BgFortuneTigerMobile from '../../../storage/app/public/img/bg-fortune-tiger-mobile.jpg';
import BoxFortuneTiger from '../../../storage/app/public/img/box-horarios-tiger.png';
import BoxFortuneTigerMobile from '../../../storage/app/public/img/box-horarios-tiger-mobile.png';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

function isMobile() {
  if (screen.width <= 760) {
    return true;
  }
  return false;
}
function isPc() {
  if (!isIpad() && !isMobile()) {
    return true;
  }
  return false;
}
function isIpad() {
  if (screen.width > 760 && screen.width < 1000) {
    return true;
  }
  return false;
}

defineProps({ horarios: Array, porcentagem: Number });

const mobile = isMobile();
const ipad = isIpad();
const pc = isPc();

const fundo = `background-image: url(${BgFortuneTiger})`;
const fundoMobile = `background-image: url(${BgFortuneTigerMobile})`;
const box = `background-image: url(${BoxFortuneTiger})`;
const boxMobile = `background-image: url(${BoxFortuneTigerMobile})`;

const mostrarHorarioState = ref(false);
const carregando = ref(false);

function mostrarHorario() {
  carregando.value = true;
  setTimeout(() => {
    carregando.value = false;
    mostrarHorarioState.value = true;
  }, 3000);
}

</script>
<style>
@import url('https://fonts.cdnfonts.com/css/yanone-kaffeesatz');

body {
  margin: 0;
  padding: 0;
}

.container {
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
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  width: 100vw;
  height: 127vw;
  background-repeat: no-repeat;
  background-size: 100vw auto;
  background-position: start;
}

.containerIpad {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  width: 100vw;
  height: 127vw;
  background-repeat: no-repeat;
  background-size: 100vw auto;
  background-position: start;
}

.sub-div2 {
  width: 100vw;
  height: 45%;
  max-width: 1920px !important;
  background-size: auto 100%;
  background-repeat: no-repeat;
  background-position: center;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.sub-div2Mobile {
  width: 100vw;
  height: 45%;
  background-size: auto 80%;
  background-repeat: no-repeat;
  background-position: center;
  display: flex;
  justify-content: center;
  align-items: center;
}

.sub-div2Ipad {
  width: 100vw;
  height: 45%;
  margin: 0 auto;
  background-size: auto 80%;
  background-repeat: no-repeat;
  background-position: center;
  display: flex;
  justify-content: center;
  align-items: center;
}

/* Mr. Hallo-win: #49227D
Fortune Tiger: #AB161B
Fortune OX: #AB161B */

.botaoPc {
  width: 30vw;
  text-align: center;
  font-family: 'Yanone Kaffeesatz', sans-serif;
  font-weight: bold;
  border-radius: 5px;
  box-shadow: 0 3px;
  color: #AB161B;
  background: linear-gradient(180deg, rgba(253, 184, 39, 1) 0%, rgba(253, 226, 103, 1) 100%);
}

.botao {
  width: 40vw;
  text-align: center;
  font-family: 'Yanone Kaffeesatz', sans-serif;
  font-weight: bold;
  border-radius: 5px;
  box-shadow: 0 3px;
  color: #AB161B;
  background: linear-gradient(180deg, rgba(253, 184, 39, 1) 0%, rgba(253, 226, 103, 1) 100%);
}

.horarios {
  width: 12vw;
  text-align: center;
  font-family: 'Yanone Kaffeesatz', sans-serif;
  font-weight: bold;
  font-size: 1.7rem;
  border-radius: 5px;
  box-shadow: 0 3px;
  color: #AB161B;
  background: linear-gradient(180deg, rgba(253, 184, 39, 1) 0%, rgba(253, 226, 103, 1) 100%);
}

.horariosMobile {
  width: 18vw;
  text-align: center;
  font-family: 'Yanone Kaffeesatz', sans-serif;
  font-weight: bold;
  font-size: 0.7rem;
  border-radius: 3px;
  box-shadow: 0 3px;
  /* background: rgb(253,184,39); */
  color: #AB161B;
  background: linear-gradient(180deg, rgba(253, 184, 39, 1) 0%, rgba(253, 226, 103, 1) 100%);
}

.horariosIpad {
  width: 18vw;
  text-align: center;
  font-family: 'Yanone Kaffeesatz', sans-serif;
  font-weight: bold;
  font-size: 1.3rem;
  border-radius: 3px;
  box-shadow: 0 3px;
  /* background: rgb(253,184,39); */
  color: #AB161B;
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
  min-height: 90vh;
  /* background: rgb(253,184,39); */
}

.iframeIpad {
  margin: 0px auto;
  width: 92vw;
  min-height: 90vh;
  /* background: rgb(253,184,39); */
}
</style>

<template>
  <Head title="Fortune Tiger" />

  <AuthenticatedLayout>
    <div :class="mobile ? 'containerMobile' : ipad ? 'containerIpad' : 'container'"
      :style="mobile || ipad ? fundoMobile : fundo">
      <div :class="mobile ? 'sub-div1Mobile' : ipad ? 'sub-div1Ipad' : 'sub-div1'"></div>

      <!--                PC                 -->
      <div v-if="pc" class="sub-div2 flex flex-col" :style="box">
        <div v-if="!mostrarHorarioState && !carregando"
          class="transition ease-in-out delay-200 hover:-translate-y-1 hover:scale-110 m-auto botaoPc text-4xl"><button
            type="button" @click="mostrarHorario">CARREGAR HORÁRIOS</button>
        </div>
        <div v-if="carregando" class="text-center my-auto">
          <div role="status" class="flex flex-col justify-center justify-items-center items-center">
            <svg aria-hidden="true"
              class="inline w-16 h-16 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-red-600"
              viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                fill="currentColor" />
              <path
                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                fill="currentFill" />
            </svg>
            <span class="sr-only">Loading...</span>
            <span class="font-bold text-3xl text-white">Conectando IA ao servidor da plataforma...</span>
          </div>
        </div>
        <div v-if="mostrarHorarioState" style="margin-top: 6%;">
          <div class="grid grid-cols-4 gap-2 max-w-4xl mx-auto">
            <span class="horarios" v-for="(horario, index) in horarios" :key="index">
              {{ horario }}
            </span>
          </div>
          <div class="w-[100%] mt-2 h-6 bg-gray-200 rounded-full dark:bg-gray-700 border border-2 border-black">
            <div class="h-6 bg-green-600 rounded-full dark:bg-green-500 text-center font-bold "
              style="width: {{porcentagem}}%">{{ porcentagem }}% DE ASSERTIVIDADE...</div>
          </div>
        </div>
      </div>
      <!--               IPAD                -->
      <div v-if="ipad" class="sub-div2Ipad flex flex-col" :style="boxMobile">
        <div v-if="!mostrarHorarioState && !carregando"
          class="transition ease-in-out delay-200 hover:-translate-y-1 hover:scale-110 m-auto botao text-3xl"><button
            type="button" @click="mostrarHorario">CARREGAR HORÁRIOS</button>
        </div>
        <div v-if="carregando" class="text-center my-auto">
          <div role="status" class="flex flex-col justify-center justify-items-center items-center">
            <svg aria-hidden="true"
              class="inline w-10 h-10 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-red-600"
              viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                fill="currentColor" />
              <path
                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                fill="currentFill" />
            </svg>
            <span class="sr-only">Loading...</span>
            <span class="font-bold text-xl text-white">Conectando IA ao servidor da plataforma...</span>
          </div>
        </div>
        <div v-if="mostrarHorarioState" style="margin-top: -7%;">
          <div class="grid grid-cols-4 gap-3 z-50 max-w-4xl m-auto">
            <span class="horariosIpad" v-for="(horario, index) in horarios" :key="index">
              {{ horario }}
            </span>
          </div>
          <div class="w-[100%] mt-2 h-5 bg-gray-200 rounded-full dark:bg-gray-700 border border-2 border-black">
            <div class="h-5 bg-green-600 rounded-full dark:bg-green-500 text-center font-bold"
              style="width: {{porcentagem}}%">{{ porcentagem }}% DE ASSERTIVIDADE...</div>
          </div>
        </div>
      </div>
      <!--              MOBILE               -->
      <div v-if="mobile" class="sub-div2Mobile flex flex-col" :style="boxMobile">
        <div v-if="carregando" class="text-center my-auto">
          <div role="status" class="flex flex-col justify-center justify-items-center items-center">
            <svg aria-hidden="true"
              class="inline w-10 h-10 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-red-600"
              viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                fill="currentColor" />
              <path
                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                fill="currentFill" />
            </svg>
            <span class="sr-only">Loading...</span>
            <span class="font-bold text-sm text-white">Conectando IA ao servidor da plataforma...</span>
          </div>
        </div>

        <div>
          <div v-if="mostrarHorarioState" class="grid grid-cols-4 gap-1" style="margin-top: -6%;">
            <span class="horariosMobile" v-for="(horario, index) in horarios" :key="index">
              {{ horario }}
            </span>
          </div>
          <div v-if="mostrarHorarioState"
            class="w-[100%] mt-2 h-3 bg-gray-200 rounded-full dark:bg-gray-700 border border-2 border-black">
            <div class="h-3 bg-green-600 rounded-full dark:bg-green-500 text-center font-bold text-xs"
              style="width: {{porcentagem}}%">{{ porcentagem }}% DE ASSERTIVIDADE...</div>
          </div>
        </div>

        <div v-if="!mostrarHorarioState && !carregando"
          class="transition ease-in-out delay-200 hover:-translate-y-1 hover:scale-110 m-auto botao text-xl botao"><button
            type="button" @click="mostrarHorario">CARREGAR HORÁRIOS</button>
        </div>
      </div>

    </div>

    <div class="bg-black">
      <iframe v-if="!mobile && !ipad" class="iframe"
        src="https://realsbet.com/casino/game/1970214?provider=MrSlotty&btag=CX-48560_421110" frameborder="0"></iframe>
      <iframe v-if="ipad" class="iframeMobile"
        src="https://m.realsbet.com/casino/game/1970214?provider=MrSlotty&btag=CX-48560_421110" frameborder="0"></iframe>
      <iframe v-if="mobile" class="iframeMobile"
        src="https://m.realsbet.com/casino/game/1970214?provider=MrSlotty&btag=CX-48560_421110" frameborder="0"></iframe>
    </div>
  </AuthenticatedLayout>
</template>
