<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
import Background from '../../../storage/app/public/img/Background.png';

const backgroundStyle = `background-image: url(${Background})`;
</script>

<style>
    .slot {
        background-color: #141414;
    }
</style>

<template>
    <div class="min-h-screen px-2 flex flex-col sm:justify-center items-center pt-6 sm:pt-0"
        :style="backgroundStyle"    
    >
        <div>
            <Link href="/">
                <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
            </Link>
        </div>

        <div
        class="w-full sm:max-w-md mt-6 px-6 py-4 slot shadow-md overflow-hidden sm:rounded-lg"
        >
            <slot />
        </div>
    </div>
</template>
