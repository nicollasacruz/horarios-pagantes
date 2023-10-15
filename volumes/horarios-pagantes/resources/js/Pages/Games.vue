<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import Background from '../../../storage/app/public/img/Background.png';
import horariosPagantes from '../../../storage/app/public/img/horarios-pagantes.png';
import FortuneTiger from '../../../storage/app/public/img/tiger.png';
import FortuneOx from '../../../storage/app/public/img/OX.png';
import HallowWin from '../../../storage/app/public/img/MrHallowin.png';
import PagandoAgora from '../../../storage/app/public/img/pagando-agora.png';

const backgroundStyle = `background-image: url(${Background})`;
let pagando = 'ox';
</script>
<style>
.container {
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

.jogos:hover {
    transition: transform 0.2s;
    transform: scale(1.05);
}
</style>


<template>
    <Head title="Games" />

    <AuthenticatedLayout>
        <div class="py-12 min-h-screen min-w-screen container" :style="backgroundStyle">
            <div class="mb-10 box"><img class="max-w-xs" :src="horariosPagantes" alt=""></div>
            <span class="box bg-yellow-300 p-2 text-3xl font-bold text-center mx-auto">DESCUBRA OS HORÁRIOS PAGANTES DOS
                PRINCIPAIS JOGOS</span>
            <span class="box p-2 text-2xl text-center text-white mx-auto">Selecione um dos jogos abaixo para descobrir os
                horários pagantes</span>
            <div class="box max-w-7xl mx-auto sm:px-6 lg:px-8">
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
            </div>
        </div>
    </AuthenticatedLayout>
</template>
