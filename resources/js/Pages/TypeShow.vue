<template>
    <div>
        <div class="text-center m-4">
            <h1 class=" font-bold text-xl mb-2">Instrumento {{ type.name }}</h1>
        </div>
        
        <div class="px-48">
            <table class="w-full table-fixed">
                <tr class="bg-gray-400">
                    <th class="text-left border border-black p-2">Name</th>
                    <th class="text-left border border-black p-2">Acciones</th>
                </tr>
                <tr>
                    <td class="text-left border border-black p-2">{{ type.name }}</td>
                    <td class="text-left border border-black p-2">
                        <div class="flex gap-2">
                            <Link :href="route('type.show', type.id)">Ver</Link>
                            <Link :href="route('type.edit', type.id)">Editar</Link>
                            <button @click="Delete(type.id)">Eliminar</button>
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
    type: Array
});

const type = ref(props.type);

function CrearType(){
    router.visit('/type/create')
}

function Delete(id){
    router.delete(route('type.destroy', id))
}
</script>