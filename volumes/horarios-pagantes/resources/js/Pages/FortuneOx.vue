<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

function formatTime(time) {
  const hours = time.getHours().toString().padStart(2, '0');
  const minutes = time.getMinutes().toString().padStart(2, '0');
  return `⏰ ${hours}:${minutes} 🦇`;
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

if (!localStorage.getItem('horarios-ox')) {
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

  localStorage.setItem('horarios-ox', JSON.stringify(horarios));
} else {
  // Se existir, verifique se a hora atual é maior que a hora do último valor
  const horarios = JSON.parse(localStorage.getItem('horarios-ox'));
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

    localStorage.setItem('horarios-ox', JSON.stringify(horarios));
  }
}

const horarios = JSON.parse(localStorage.getItem('horarios-ox'));
const mobile = isMobile();

</script>

<template>
  <Head title="Fortune OX" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-white leading-tight">Fortune OX</h2>
    </template>

    <div class="bg-gray-800">
      <div class="mx-5 py-6 px-5 bg-fuchsia-900 rounded-lg border-4 border-purple-400">
        <h3 class="my-3 text-2xl font-semibold text-center text-white">Horários:</h3>
        <div v-if="!mobile" class="grid grid-cols-4 gap-3">
          <span class="text-center text-xl text-white font-bold h-10 w-25 bg-fuchsia-900 rounded-lg border-4 border-purple-400"
            v-for="(horario, index) in horarios" :key="index">
            {{ horario }}
          </span>
        </div>

        <div v-if="mobile" class="grid grid-cols-2 gap-3">
          <span class="text-center text-xl text-white font-bold h-10 w-25 bg-fuchsia-900 rounded-lg border-4 border-purple-400"
            v-for="(horario, index) in horarios" :key="index">
            {{ horario }}
          </span>
        </div>
      </div>

      <iframe v-if="mobile" class="h-screen m-auto" src="https://m.realsbet.com/casino/game/1970229?provider=MrSlotty"
        frameborder="0"></iframe>
      <iframe v-if="!mobile" class="px-5 py-5 h-screen w-full" src="https://realsbet.com/casino/game/1970229?provider=MrSlotty"
        frameborder="0"></iframe>
    </div>
  </AuthenticatedLayout>
</template>
