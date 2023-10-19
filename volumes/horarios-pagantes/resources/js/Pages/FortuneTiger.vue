<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import BgFortuneTiger from '../../../storage/app/public/img/bg-fortune-tiger.jpg';
import BgFortuneTigerMobile from '../../../storage/app/public/img/bg-fortune-tiger-mobile.jpg';
import BoxFortuneTiger from '../../../storage/app/public/img/box-horarios-tiger.png';
import BoxFortuneTigerMobile from '../../../storage/app/public/img/box-horarios-tiger-mobile.png';
import { Head } from '@inertiajs/vue3';

function formatTime(time) {
  const hours = time.getHours().toString().padStart(2, '0');
  const minutes = time.getMinutes().toString().padStart(2, '0');
  return `${hours}:${minutes}`;
}

function addHours(date, hours) {
  date.setHours(date.getHours() + hours);

  return date;
}

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

if (!localStorage.getItem('horarios-tiger')) {
  const now = new Date();
  const nextHour = new Date(now);
  nextHour.setHours(nextHour.getHours() + 1);
  nextHour.setMinutes(0);
  nextHour.setSeconds(0);

  const horarios = [];

  while (horarios.length < 20) {
    const randomMinutes = Math.floor(Math.random() * 60);
    let hour = new Date();
    let randomTime = new Date();
    randomTime.setMinutes(randomMinutes);
    randomTime.setSeconds(0);

    if (horarios.length > 10) {
      randomTime.setHours(hour.getHours() + 1);
    }
    if (!horarios.includes(formatTime(randomTime))) {
      horarios.push(formatTime(randomTime));
    }
  }

  horarios.sort(); // Ordenar os horários em ordem crescente

  localStorage.setItem('horarios-tiger', JSON.stringify(horarios));
} else {
  // Se existir, verifique se a hora atual é maior que a hora do último valor
  const horarios = JSON.parse(localStorage.getItem('horarios-tiger'));
  const lastTime = new Date(horarios[horarios.length - 1]);
  const now = new Date();

  if (now.getHours() > lastTime.getHours()) {
    // Se a hora atual for maior, gere novos valores seguindo a mesma lógica
    const nextHour = new Date(now);
    nextHour.setHours(nextHour.getHours() + 1);
    nextHour.setMinutes(0);
    nextHour.setSeconds(0);

    while (horarios.length < 20) {
      const randomMinutes = Math.floor(Math.random() * 60);
      let hour = new Date();
      let randomTime = new Date();

      if (horarios.length > 10) {
        randomTime.setHours(hour.getHours() + 1);
      }
      randomTime.setMinutes(randomMinutes);
      randomTime.setSeconds(0);

      if (randomTime <= nextHour && !horarios.includes(formatTime(randomTime))) {
        horarios.push(formatTime(randomTime));
      }
    }

    horarios.sort(); // Ordenar os horários em ordem crescente

    localStorage.setItem('horarios-tiger', JSON.stringify(horarios));
  }
}

const horarios = JSON.parse(localStorage.getItem('horarios-tiger'));
const mobile = isMobile();
const ipad = isIpad();
const fundo = `background-image: url(${BgFortuneTiger})`;
const fundoMobile = `background-image: url(${BgFortuneTigerMobile})`;
const box = `background-image: url(${BoxFortuneTiger})`;
const boxMobile = `background-image: url(${BoxFortuneTigerMobile})`;

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
  width: 100wv;
  max-height: 455px;
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
  width: 100%;
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
  padding: 0px 0 0px 0 ;
  min-height: 48vh;
  width: 100vw;
  max-width: 1920px !important;
  background-size: 95vh auto;
  background-repeat: no-repeat;
  background-position: center;
  display: flex;
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
  <Head title="Fortune Tiger" />

  <AuthenticatedLayout>
    <!-- <template #header> -->
    <!-- <h2 class="font-semibold text-xl text-white leading-tight">Fortune Tiger</h2> -->
    <!-- </template> -->

    <div :class="mobile ? 'containerMobile' : ipad ? 'containerIpad' : 'container'"
      :style="mobile || ipad ? fundoMobile : fundo">
      <div :class="mobile ? 'sub-div1Mobile' : ipad ? 'sub-div1Ipad' : 'sub-div1'"></div>
      <div v-if="!mobile && !ipad" class="sub-div2" :style="box">
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
      <iframe v-if="!mobile && !ipad" class="iframe" src="https://realsbet.com/casino/game/1970214?provider=MrSlotty"
        frameborder="0"></iframe>
      <iframe v-if="ipad" class="iframeMobile" src="https://m.realsbet.com/casino/game/1970214?provider=MrSlotty"
        frameborder="0"></iframe>
      <iframe v-if="mobile" class="iframeMobile" src="https://m.realsbet.com/casino/game/1970214?provider=MrSlotty"
        frameborder="0"></iframe>
    </div>
  </AuthenticatedLayout>
</template>
