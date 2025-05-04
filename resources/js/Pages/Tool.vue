<template>
    <div>
        <div class="text-center m-4">
            <h1 class=" font-bold text-xl mb-2">Lista de Herramientas</h1>
            <button @click="CrearHerramienta" class="bg-gray-400 py-2 px-4 rounded-lg">Crear Herramientas</button>
        </div>
        
        <div class="px-48">
            <table class="w-full table-fixed">
                <tr class="bg-gray-400">
                    <th class="text-left border border-black p-2">Name</th>
                    <th class="text-left border border-black p-2">Description</th>
                    <th class="text-left border border-black p-2">Acciones</th>
                </tr>
                <tr v-for="tool in tools" :key="tool.id">
                    <td class="text-left border border-black p-2">{{ tool.name }}</td>
                    <td class="text-left border border-black p-2">{{ tool.description }}</td>
                    <td class="text-left border border-black p-2">
                        <div class="flex gap-2">
                            <Link :href="route('tool.show', tool.id)">Ver</Link>
                            <Link :href="route('tool.edit', tool.id)">Editar</Link>
                            <button @click="Delete(tool.id)">Eliminar</button>
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
    tools: Array
});

const tool = ref(props.tools);

function CrearHerramienta(){
    router.visit('/tool/create')
}

function Delete(id){
    router.delete(route('tool.destroy', id))
}
</script>