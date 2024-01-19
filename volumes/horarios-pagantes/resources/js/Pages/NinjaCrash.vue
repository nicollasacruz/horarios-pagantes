<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import BgDino from "../../../storage/app/public/img/bg-web.jpg";
import BgDinoMobile from "../../../storage/app/public/img/bg-web.jpg";
import DinoLogo from "../../../storage/app/public/img/logo.svg";
import { Head, useForm, usePage } from "@inertiajs/vue3";
import { ref } from "vue";

const { horarios, porcentagem } = defineProps(["horarios", "porcentagem"]);

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

function numeroAleatorio() {
  // Gera um número aleatório entre 13 e 16 (dividindo por 50)
  let numeroAleatorio = Math.floor(Math.random() * (17 - 13)) + 13;

  // Multiplica o número gerado por 50 para obter um múltiplo de 50
  let numeroFinal = numeroAleatorio * 50;

  return numeroFinal;
}

// Exemplo de uso
console.log(numeroAleatorio()); // Saída: Um número aleatório entre 650 e 800, divisível por 50

function getLocalNumbers(horarios) {
  let lastHour = window.localStorage.getItem("lastHour");
  let multipliers = JSON.parse(window.localStorage.getItem("multipliers"));

  if (
    multipliers?.length === 20 &&
    lastHour &&
    parseInt(lastHour.slice(0, 2)) >= new Date().getHours()
  ) {
    return multipliers;
  }

  let multipliersArray = [];

  for (let index = 0; index < 20; index++) {
    let num = numeroAleatorio();
    multipliersArray.push(num);
  }

  window.localStorage.setItem("lastHour", horarios[19]);
  window.localStorage.setItem("multipliers", JSON.stringify(multipliersArray));
  multipliers = window.localStorage.getItem("multipliers");

  return JSON.parse(multipliers);
}

const mobile = isMobile();
const ipad = isIpad();
const pc = isPc();

const fundo = `background-image: url(${BgDino})`;
const fundoMobile = `background-image: url(${BgDinoMobile})`;

const mostrarHorarioState = ref(false);
const carregando = ref(false);

function mostrarHorario() {
  carregando.value = true;
  setTimeout(() => {
    carregando.value = false;
    mostrarHorarioState.value = true;
  }, 3000);
}
const cortes = getLocalNumbers(horarios);
</script>
<style>
@import url("https://fonts.cdnfonts.com/css/yanone-kaffeesatz");

body {
  margin: 0;
  padding: 0;
  background-color: black;
}

.botaoPc {
  width: 30vw;
  text-align: center;
  font-family: "Yanone Kaffeesatz", sans-serif;
  font-weight: bold;
  color: #49227d;
  border-radius: 5px;
  box-shadow: 0 3px;
  background: linear-gradient(
    180deg,
    rgba(253, 184, 39, 1) 0%,
    rgba(253, 226, 103, 1) 100%
  );
}

.horarios {
  width: 10vw;
  text-align: center;
  font-family: "Yanone Kaffeesatz", sans-serif;
  font-weight: bold;
  font-size: 1.7rem;
  border-radius: 5px;
  box-shadow: 0 3px;
  /* background: rgb(253,184,39); */
  color: #fff;
  background: linear-gradient(360deg, #a4061b 0%, #820516 100%);
}

.iframe {
  margin: 0px auto;
  width: 95vw;
  min-height: 100dvh;
  /* background: rgb(253,184,39); */
}
</style>

<template>
  <Head title="DinoCash" />

  <AuthenticatedLayout>
    <div
      class="h-[100dvh] w-[100%] lg:max-w-[100%] flex"
      :style="{
        backgroundImage: `url('${mobile || ipad ? BgDinoMobile : BgDino}')`,
        backgroundSize: mobile || ipad ? 'auto 100%' : '100% auto',
        backgroundPosition: 'center',
        backgroundRepeat: 'no-repeat',
      }"
    >
      <div class="flex flex-col items-center justify-center mx-auto">
        <img
          class="w-[55vw] xl:w-[20vw] mb-[-25px] z-10"
          :src="DinoLogo"
          alt="logo dino"
        />

        <div
          v-if="mostrarHorarioState"
          class="flex justify-center items-center w-[95vw] md:w-[85vw] xl:w-[50vw] py-6 border-2 border-[#34b382] rounded-lg bg-gradient-to-tr from-[#3ca87f] to-[#2a8864]"
        >
          <div>
            <div class="grid grid-cols-4 gap-2 max-w-4xl m-auto">
              <span
                class="font-bold text-[11px] md:text-xl xl:text-2xl p-1 sm:px-2 md:px-4 xl:p-3 bg-[#19382C] rounded-md border-2 border-[#3ca87f]"
                v-for="(horario, index) in horarios"
                :key="index"
              >
                <span class="text-white"> {{ horario }} | </span>
                <span class="text-[#51e403]"> {{ cortes[index] }}M </span>
              </span>
            </div>
          </div>
        </div>

        <div
          v-if="!mostrarHorarioState && !carregando"
          class="transition ease-in-out delay-200 hover:-translate-y-1 hover:scale-110 m-auto text-2xl p-2 border-2 border-[#34b382] rounded-md bg-gradient-to-tr from-[#3ca87f] to-[#2a8864] text-white text-center font-bold md:text-2xl xl:text-2xl"
        >
          <button type="button" @click="mostrarHorario">
            CARREGAR HORÁRIOS
          </button>
        </div>

        <div v-if="carregando" class="text-center my-auto">
          <div
            role="status"
            class="flex flex-col justify-center justify-items-center items-center"
          >
            <svg
              aria-hidden="true"
              class="inline w-16 h-16 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-purple-600"
              viewBox="0 0 100 101"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                fill="currentColor"
              />
              <path
                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                fill="currentFill"
              />
            </svg>
            <span class="sr-only">Loading...</span>
            <span class="font-bold text-2xl md:text-3xl text-white"
              >Conectando IA ao servidor da plataforma...</span
            >
          </div>
        </div>
        <div v-if="mostrarHorarioState"
          class="w-[100%] mt-2 h-6 bg-gray-200 rounded-full dark:bg-gray-700 border-2 border-black"
        >
          <div
            class="p-1 border-2 border-[#34b382] rounded-sm bg-gradient-to-tr from-[#3ca87f] to-[#2a8864] text-white text-center font-bold md:text-2xl xl:text-2xl"
          >
            HORÁRIOS E METRAGEM PAGANTES
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
