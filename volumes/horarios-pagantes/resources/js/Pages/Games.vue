<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import Background from '../../../storage/app/public/img/Background.png';
import horariosPagantes from '../../../storage/app/public/img/horarios-pagantes.png';
import FortuneTiger from '../../../storage/app/public/img/tiger.png';
import FortuneOx from '../../../storage/app/public/img/OX.png';
import HallowWin from '../../../storage/app/public/img/MrHallowin.png';
import Ninja from '../../../storage/app/public/img/ninja.png';
import PagandoAgora from '../../../storage/app/public/img/pagando-agora.png';

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

function padTo2Digits(num) {
  return num.toString().padStart(2, '0');
}

const { ninja, hallow, fortuneOx, tiger } = defineProps(['ninja', 'hallow', 'fortuneOx', 'tiger']);
// defineProps({ ninja: Array, hallow: Array, ox: Array, tiger: Array });

const now = new Date();

var pagarTiger = false;1
var pagarHallow = false;
var pagarOx = false;
var pagarNinja = false;

var horaAtual = `${padTo2Digits(now.getHours())}:${padTo2Digits(now.getMinutes())}`;
tiger.forEach(hora => {
	if(horaAtual === hora) {
		pagarTiger = true;
	}
});

hallow.forEach(hora => {
	if(horaAtual === hora) {
		pagarHallow = true;
	}
});

fortuneOx.forEach(hora => {
	if(horaAtual === hora) {
		pagarOx = true;
	}
});

ninja.forEach(hora => {
	if(horaAtual === hora) {
		pagarNinja = true;
	}
});

console.log(pagarTiger, 'pagarTiger');
console.log(pagarHallow, 'pagarHallow');
console.log(pagarOx, 'pagarOx');
console.log(pagarNinja, 'pagarNinja');
console.log(ninja, hallow, fortuneOx, tiger, 'pagar')

function shuffleArray(arr) {
	// Loop em todos os elementos
	for (let i = arr.length - 1; i > 0; i--) {
		// Escolhendo elemento aleatório
		const j = Math.floor(Math.random() * (i + 1));
		// Reposicionando elemento
		[arr[i], arr[j]] = [arr[j], arr[i]];
	}
	// Retornando array com aleatoriedade
	return arr;
}

const backgroundStyle = `background-image: url(${Background}); background-size: 100vw auto;`;
let lista = ['ox', 'tiger', 'hallow', 'ninja'];
lista = shuffleArray(lista);
let pagando = lista[0];
const mobile = isMobile();
const ipad = isIpad();

var mostrarHorarioState = false;

</script>

<style>
.container {
	min-width: 100%;
	min-height: 100vh;
	display: flex;
	flex-direction: column;
	justify-content: start;
	align-items: center;
	margin: 0 auto;
}

.box {
	display: flex;
	justify-content: center;
	align-items: center;
	border-radius: 15px 0 15px 0;
	box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);
}

.boxMobile {
	justify-content: center;
	align-items: center;
	border-radius: 15px 0 15px 0;
	box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);
}

.jogos:hover {
	transition: transform 0.2s;
	transform: scale(1.05);
}
</style>


<template>
	<Head title="Games" />

	<AuthenticatedLayout>
		<div class="py-12 container" :style="backgroundStyle">
			<div class="mb-10 flex justify-center align-items-center"><img class="max-w-xs" :src="horariosPagantes" alt="">
			</div>

			<span v-if="ipad || mobile" class="box bg-yellow-300 p-2 font-bold text-center mx-auto text-2xl mx-2">DESCUBRA OS
				HORÁRIOS PAGANTES DOS
				PRINCIPAIS JOGOS</span>

			<span v-if="!ipad && !mobile" class="box bg-yellow-300 p-2 font-bold text-center mx-auto text-3xl mx-2">DESCUBRA OS
				HORÁRIOS PAGANTES DOS
				PRINCIPAIS JOGOS</span>

			<span class="flex justify-center align-items-center p-2 text-xl text-center text-white mx-auto">Selecione um dos
				jogos abaixo para descobrir os
				horários pagantes
			</span>
			<!--            PC            -->
			<div v-if="!mobile && !ipad" class="box max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="px-2 jogos relative">
					<Link :href="route('fortune-tiger')">
					<img class="" :src="FortuneTiger" alt="Fortune Tiger">
					</Link>
					<img v-if="pagarTiger" class="absolute top-5 start-0 h-20" :src="PagandoAgora" alt="Fortune Tiger">
				</div>
				<div class="px-2 jogos relative">
					<Link :href="route('fortune-ox')">
					<img class="px-2 jogos" :src="FortuneOx" alt="Fortune Tiger">
					</Link>
					<img v-if="pagarOx" class="absolute top-5 start-0 h-20" :src="PagandoAgora" alt="Fortune Tiger">
				</div>
				<div class="px-2 jogos relative">
					<Link :href="route('hallow-win')">
					<img class="px-2 jogos" :src="HallowWin" alt="Fortune Tiger">
					</Link>
					<img v-if="pagarHallow" class="absolute top-5 start-0 h-20" :src="PagandoAgora" alt="Fortune Tiger">
				</div>
				<div class="px-2 jogos relative">
					<Link :href="route('ninja-crash')">
					<img class="px-2 jogos" :src="Ninja" alt="Ninja Crash">
					</Link>
					<img v-if="pagarNinja" class="absolute top-5 start-0 h-20" :src="PagandoAgora" alt="Ninja Crash">
				</div>
			</div>
			<!--            MOBILE            -->
			<div v-if="mobile || ipad" class="boxMobile max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="px-2 jogos relative">
					<Link :href="route('fortune-tiger')">
						<img class="" :src="FortuneTiger" alt="Fortune Tiger">
					</Link>
					<img v-if="pagando == 'tiger'" class="absolute top-5 start-0 h-20" :src="PagandoAgora" alt="Fortune Tiger">
				</div>
				<div class="px-2 jogos relative">
					<Link :href="route('fortune-ox')">
					<img class="px-2 jogos" :src="FortuneOx" alt="Fortune Tiger">
					</Link>
					<img v-if="pagando == 'ox'" class="absolute top-5 start-0 h-20" :src="PagandoAgora" alt="Fortune Tiger">
				</div>
				<div class="px-2 jogos relative">
					<Link :href="route('hallow-win')">
					<img class="px-2 jogos" :src="HallowWin" alt="Fortune Tiger">
					</Link>
					<img v-if="pagando == 'hallow'" class="absolute top-5 start-0 h-20" :src="PagandoAgora" alt="Fortune Tiger">
				</div>
				<div class="px-2 jogos relative">
					<Link :href="route('ninja-crash')">
					<img class="px-2 jogos" :src="Ninja" alt="Ninja Crash">
					</Link>
					<img v-if="pagando == 'ninja'" class="absolute top-5 start-0 h-20" :src="PagandoAgora" alt="Ninja Crash">
				</div>
			</div>
		</div>
	</AuthenticatedLayout>
</template>
