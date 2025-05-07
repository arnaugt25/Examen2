<template>
    <Navbar/>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="text-center m-4">
            <h1 class="font-bold text-xl mb-2">Instrumento {{ type.name }}</h1>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full table-fixed">
                <thead>
                    <tr class="bg-gray-400">
                        <th class="text-left border border-black p-2">Name</th>
                        <th class="text-left border border-black p-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-left border border-black p-2">{{ type.name }}</td>
                        <td class="text-left border border-black p-2">
                            <div class="flex gap-2">
                                <Link :href="route('type.show', type.id)" class="text-green-600">Ver</Link>
                                <Link :href="route('type.edit', type.id)" class="text-blue-600">Editar</Link>
                                <button @click="Delete(type.id)" class="text-red-600">Eliminar</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import { ref, defineProps } from 'vue';
import axios from 'axios';
import Navbar from '@/Components/Navbar.vue';

const props = defineProps({
    type: Object
});

const type = ref(props.type);

function CrearType(){
    router.visit('/type/create')
}

function Delete(id){
    router.delete(route('type.destroy', id))
}
</script>