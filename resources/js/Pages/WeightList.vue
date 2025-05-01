<template>
    <div class="text-center p-8">
        <h1 class="text-3xl mb-4">Lista de Pesas</h1>
        <button @click="CreateWeights()" class="bg-blue-200 py-2 px-4 rounded">Crear</button>
    </div>
    <div class="px-48">
        <table class="w-full table-fixed border border-black">
            <thead class="bg-gray-400">
                <tr>
                    <th class="p-2 text-left border border-black">Peso</th>
                    <th class="p-2 text-left border border-black">Descripcion</th>
                    <th class="p-2 text-left border border-black">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="weight in weights" :key="weight.id">
                    <td class="p-1 text-left border border-black">{{ weight.weight }}</td>
                    <td class="p-1 text-left border border-black">{{ weight.description }}</td>
                    <td class="p-2">
                        <div class="flex gap-2">
                            <Link :href="route('weight.show', weight.id)" class="text-blue-500">Ver</Link>
                            <Link :href="route('weight.edit', weight.id)" class="text-yellow-500">Editar</Link>
                            <button @click="deleteWeights(weight.id)" class="text-red-500">Eliminar</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import { ref, defineProps } from 'vue';
import axios from 'axios';

const props = defineProps({
    weights: Array,
});

const weights = ref(props.weights);

function deleteWeights(id) {
  axios.post(`/weight/${id}`, {
    _method: 'DELETE'
  }).then(() => {
    weights.value = weights.value.filter(weight => weight.id !== id);
  });
}

function CreateWeights(id) {
    router.visit('weight/create')
}
</script>