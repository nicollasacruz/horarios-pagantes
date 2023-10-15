<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Background from '../../../storage/app/public/img/Background.png';
import horariosPagantes from '../../../storage/app/public/img/horarios-pagantes.png';
import FortuneTiger from '../../../storage/app/public/img/tiger.png';
import FortuneOx from '../../../storage/app/public/img/OX.png';
import HallowWin from '../../../storage/app/public/img/MrHallowin.png';

const backgroundStyle = `background-image: url(${Background})`;

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
        transition: transform 0.2s;
    }

    .box:hover {
        transform: scale(1.05);
    }
</style>


<template>
    <Head title="Games" />

    <AuthenticatedLayout>
        <div class="py-12 min-h-screen min-w-screen container" :style="backgroundStyle">
            <div class="mb-10 box"><img class="max-w-xs" :src="horariosPagantes" alt=""></div>
            <span class="box bg-yellow-300 p-2 text-3xl font-bold text-center mx-auto">DESCUBRA OS HORÁRIOS PAGANTES DOS PRINCIPAIS JOGOS</span>
            <span class="box p-2 text-2xl text-center text-white mx-auto">Selecione um dos jogos abaixo para descobrir os horários pagantes</span>
            <div class="box max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="my-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900"><a href="games/fortune-tiger"></a>Fortune Tiger</div>
                </div>

                <div class="my-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">Fortune OX</div>
                </div>

                <div class="my-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">Mr. Hallow-Win!</div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
