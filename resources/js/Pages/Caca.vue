<template>
    <div class="text-center m-4">
        <h1 class="text-xl mb-2">Lista de Caca</h1>
        <button @click="WelcomeRedirect" class="py-2 px-4 bg-gray-400 rounded-md mr-4">Inicio</button>
        <button @click="CreateCaca" class="py-2 px-4 bg-gray-400 rounded-md">Crear Caca</button>
    </div>

    <div class="px-48">
        <table class="w-full table-fixed border border-black">
            <thead class="bg-gray-400">
                <tr>
                    <th class="text-left p-2 border border-black">Name</th>
                    <th class="text-left p-2 border border-black">Description</th>
                    <th class="text-left p-2 border border-black">image</th>
                    <th class="text-left p-2 border border-black">audio</th>
                    <th class="text-left p-2 border border-black">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="caca in cacas" :key="caca.id">
                    <td class="text-left p-2 border border-black">{{ caca.name}}</td>
                    <td class="text-left p-2 border border-black">{{ caca.description }}</td>
                    <td class="p-2 text-left border border-black"><img class="w-20" :src="`/storage/${caca.image}`" :alt="caca.name"></td>
                    <td class="text-left border border-black"><audio :src="`/storage/${caca.audio}`" controls></audio></td>
                    <td>
                        <div class="flex gap-2">
                            <Link :href="route('caca.show', caca.id)" class="ml-2 text-green-500 font-bold">Ver</Link>
                            <Link :href="route('caca.edit', caca.id)" class="text-blue-500 font-bold">Editar</Link>
                            <button @click="deleteCaca(caca.id)" class="text-red-500 fotn-bold">Eliminar</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import {ref,defineProps} from 'vue';
import axios from 'axios';

const props = defineProps({
    cacas: Array,
});

const cacas = ref(props.cacas);

function deleteCaca(id) {
  axios.post(`/caca/${id}`, {
    _method: 'DELETE'
  }).then(() => {
    cacas.value = cacas.value.filter(caca => caca.id !== id);
  });
}

function CreateCaca() {
    router.visit('/caca/create');
}

function WelcomeRedirect() {
    router.visit('/');
}
</script>