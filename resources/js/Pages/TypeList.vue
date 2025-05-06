<template>
    <div>
        <div class="text-center m-4">
            <h1 class=" font-bold text-xl mb-2">Lista de Tipo de instrumento</h1>
            <button @click="CrearType" class="bg-gray-400 py-2 px-4 rounded-lg">Crear Tipo de instrumento</button>
        </div>
        
        <div class="px-48">
            <table class="w-full table-fixed">
                <tr class="bg-gray-400">
                    <th class="text-left border border-black p-2">Name</th>
                    <th class="text-left border border-black p-2">Acciones</th>
                </tr>
                <tr v-for="type in types" :key="type.id">
                    <td class="text-left border border-black p-2">{{ type.name }}</td>
                    <td class="text-left border border-black p-2">
                        <div class="flex gap-2">
                            <Link :href="route('type.show', type.id)" class="text-green-600">Ver</Link>
                            <Link :href="route('type.edit', type.id)" class="text-blue-600">Editar</Link>
                            <button @click="Delete(type.id)" class="text-red-600">Eliminar</button>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</template>

<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import {ref,defineProps} from 'vue';
import axios from 'axios';

const props = defineProps({
    types: Array
});

const type = ref(props.types);

function CrearType(){
    router.visit('/type/create')
}

// function Delete(id){
//     router.delete(route('type.destroy', id))
// }

function Delete(id) {
  router.delete(route('type.destroy', id), {
    preserveScroll: true,
    onSuccess: () => {
        type.value = type.value.filter(type => type.id !== id);
    }
  });
}
</script>