<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import BgFortuneHallow from '../../../storage/app/public/img/bg-fortune-ninja.png';
import BgFortuneHallowMobile from '../../../storage/app/public/img/bg-fortune-ninja-mobile.png';
import BoxFortuneHallow from '../../../storage/app/public/img/box-horarios-ninja.png';
import BoxFortuneHallowMobile from '../../../storage/app/public/img/box-horarios-ninja-mobile.png';
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

function scrollToTop() {
  window.scrollTo(0, 0);
}

defineProps({ horarios: Array, porcentagem: Number });

const mobile = isMobile();
const ipad = isIpad();
const pc = isPc();

const fundo = `background-image: url(${BgFortuneHallow})`;
const fundoMobile = `background-image: url(${BgFortuneHallowMobile})`;
const box = `background-image: url(${BoxFortuneHallow})`;
const boxMobile = `background-image: url(${BoxFortuneHallowMobile})`;

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
  background-color: black;
}

.container {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  min-width: 100vw;
  height: 50vw;
  background-repeat: no-repeat;
  background-size: 100vw auto;
  background-position: start;
}

.containerMobile {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  width: 100vw;
  height: 178vw;
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
  height: 46%;
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
  margin: 0 auto;
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
  color: #49227D;
  border-radius: 5px;
  box-shadow: 0 3px;
  background: linear-gradient(180deg, rgba(253, 184, 39, 1) 0%, rgba(253, 226, 103, 1) 100%);
}

.botao {
  width: 40vw;
  text-align: center;
  font-family: 'Yanone Kaffeesatz', sans-serif;
  font-weight: bold;
  color: #49227D;
  border-radius: 5px;
  box-shadow: 0 3px;
  background: linear-gradient(180deg, rgba(253, 184, 39, 1) 0%, rgba(253, 226, 103, 1) 100%);
}

.horarios {
  width: 10vw;
  text-align: center;
  font-family: 'Yanone Kaffeesatz', sans-serif;
  font-weight: bold;
  font-size: 1.7rem;
  border-radius: 5px;
  box-shadow: 0 3px;
  /* background: rgb(253,184,39); */
  color: #49227D;
  background: linear-gradient(360deg, #8ff1dc 0%, #24f3b2 100%);
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
  color: #49227D;
  background: linear-gradient(360deg, #8ff1dc 0%, #24f3b2 100%);
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
  color: #49227D;
  background: linear-gradient(360deg, #8ff1dc 0%, #24f3b2 100%);
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
  max-height: 100vh;
  /* background: rgb(253,184,39); */
}

.iframeIpad {
  margin: 0px auto;
  width: 92vw;
  min-height: 90vh;
  max-height: 100vh;
  /* background: rgb(253,184,39); */
}
</style>

<template>
  <Head title="Mr. Hallow-Win" />

  <AuthenticatedLayout>
    <div :class="mobile ? 'containerMobile' : ipad ? 'containerIpad' : 'container'"
      :style="mobile || ipad ? fundoMobile : fundo">
      <div :class="mobile ? 'sub-div1Mobile' : ipad ? 'sub-div1Ipad' : 'sub-div1'"></div>
      <!--                PC                 -->
      <div v-if="pc" class="sub-div2 flex flex-col" :style="box">
        <div v-if="carregando" class="text-center my-auto">
          <div role="status" class="flex flex-col justify-center justify-items-center items-center">
            <svg aria-hidden="true"
              class="inline w-16 h-16 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-purple-600"
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

        <div v-if="mostrarHorarioState" style="margin-top: 3%;">
          <div class="grid grid-cols-4 gap-3 max-w-4xl m-auto">
            <span class="horarios" v-for="(horario, index) in horarios" :key="index">
              {{ horario }}
            </span>
          </div>
          <div class="w-[100%] mt-2 h-6 bg-gray-200 rounded-full dark:bg-gray-700 border border-2 border-black">
            <div class="h-6 bg-green-600 rounded-full dark:bg-green-500 text-center font-bold "
              style="width: {{porcentagem}}%">{{ porcentagem }}% DE ASSERTIVIDADE...</div>
          </div>
        </div>

        <div v-if="!mostrarHorarioState && !carregando"
          class="transition ease-in-out delay-200 hover:-translate-y-1 hover:scale-110 m-auto botaoPc text-4xl"><button
            type="button" @click="mostrarHorario">CARREGAR HORÁRIOS</button>
        </div>
      </div>
      <!--               IPAD                -->
      <div v-if="ipad" class="sub-div2Ipad flex flex-col" :style="boxMobile">
        <div v-if="carregando" class="text-center my-auto">
          <div role="status" class="flex flex-col justify-center justify-items-center items-center">
            <svg aria-hidden="true"
              class="inline w-10 h-10 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-purple-600"
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

        <div>
          <div v-if="mostrarHorarioState" class="grid grid-cols-4 gap-3 z-50 max-w-4xl m-auto">
            <span class="horariosIpad" v-for="(horario, index) in horarios" :key="index">
              {{ horario }}
            </span>
          </div>
          <div v-if="mostrarHorarioState"
            class="w-[100%] mt-2 h-5 bg-gray-200 rounded-full dark:bg-gray-700 border border-2 border-black">
            <div class="h-5 bg-green-600 rounded-full dark:bg-green-500 text-center font-bold"
              style="width: {{porcentagem}}%">{{ porcentagem }}% DE ASSERTIVIDADE...</div>
          </div>
        </div>

        <div v-if="!mostrarHorarioState && !carregando"
          class="transition ease-in-out delay-200 hover:-translate-y-1 hover:scale-110 m-auto botao text-3xl"><button
            type="button" @click="mostrarHorario">CARREGAR HORÁRIOS</button>
        </div>
      </div>
      <!--              MOBILE               -->
      <div v-if="mobile" class="sub-div2Mobile flex flex-col" :style="boxMobile">
        <div v-if="carregando" class="text-center my-auto">
          <div role="status" class="flex flex-col justify-center justify-items-center items-center">
            <svg aria-hidden="true"
              class="inline w-10 h-10 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-purple-600"
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
          <div v-if="mostrarHorarioState" class="grid grid-cols-4 gap-1 ">
            <span class="horariosMobile" v-for="(horario, index) in horarios" :key="index">
              {{ horario }}
            </span>
          </div>
          <div v-if="mostrarHorarioState"
            class="w-[100%] mt-2 h-4 bg-gray-200 rounded-full dark:bg-gray-700 border border-2 border-black">
            <div class="h-4 bg-green-600 rounded-full dark:bg-green-500 text-center font-bold text-xs"
              style="width: {{porcentagem}}%">{{ porcentagem }}% DE ASSERTIVIDADE...</div>
          </div>
        </div>


        <div v-if="!mostrarHorarioState && !carregando"
          class="transition ease-in-out delay-200 hover:-translate-y-1 hover:scale-110 m-auto botao text-xl botao"><button
            type="button" @click="mostrarHorario">CARREGAR HORÁRIOS</button>
        </div>
      </div>
    </div>

    <div class="bg-black relative">
      <iframe v-if="!mobile && !ipad && mostrarHorarioState" class="iframe"
        src="https://betfly7.com/casino/pgsoft/35" frameborder="0"></iframe>
      <iframe v-if="ipad && mostrarHorarioState" class="iframeMobile"
        src="https://betfly7.com/casino/pgsoft/35" frameborder="0"></iframe>
      <iframe v-if="mobile && mostrarHorarioState" class="iframeMobile"
        src="https://betfly7.com/casino/pgsoft/35" frameborder="0"></iframe>
      <div class="absolute bottom-4 right-4 z-50" @click="scrollToTop()">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-14 h-14 fill-white">
          <path fill-rule="evenodd"
            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm.53 5.47a.75.75 0 00-1.06 0l-3 3a.75.75 0 101.06 1.06l1.72-1.72v5.69a.75.75 0 001.5 0v-5.69l1.72 1.72a.75.75 0 101.06-1.06l-3-3z"
            clip-rule="evenodd" />
        </svg>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
