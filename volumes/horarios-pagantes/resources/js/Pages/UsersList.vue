<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import Background from '../../../storage/app/public/img/Background.png';
import horariosPagantes from '../../../storage/app/public/img/horarios-pagantes.png';

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

defineProps({ users: Array });
const backgroundStyle = `background-image: url(${Background}); background-size: 100vw auto;`;

</script>

<style></style>


<template>
	<Head title="Usuários" />

	<AuthenticatedLayout>
		<div class="py-12 min-h-screen px-10" :style="backgroundStyle">
			<div class="mb-10 mx-10 flex justify-center align-items-center"><img class="max-w-xs" :src="horariosPagantes"
					alt="">
			</div>


			<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
				<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
					<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
						<tr>
							<th scope="col" class="px-6 py-3">
								Nome
							</th>
							<th scope="col" class="px-6 py-3">
								Email
							</th>
							<th scope="col" class="px-6 py-3">
								Telefone
							</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="user in users" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
							<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
								{{ user.name }}
							</th>
							<td class="px-6 py-4">
								{{ user.email }}
							</td>
							<td class="px-6 py-4">
								{{ user.contact }}
							</td>
						</tr>
					</tbody>
				</table>
			</div>



		</div>


	</AuthenticatedLayout>
</template>
