<template>
    <Navbar/>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="text-center m-4">
            <h1 class="font-bold text-xl mb-2">Instrument {{ instrument.name }}</h1>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full table-fixed">
                <thead>
                    <tr class="bg-gray-400">
                        <th class="text-left border border-black p-2">Name</th>
                        <th class="text-left border border-black p-2">Description</th>
                        <th class="text-left border border-black p-2">Type</th>
                        <th class="text-left border border-black p-2">Image</th>
                        <th class="text-left border border-black p-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-left border border-black p-2">{{ instrument.name }}</td>
                        <td class="text-left border border-black p-2">{{ instrument.description }}</td>
                        <td class="text-left border border-black p-2">{{ instrument.type.name }}</td>
                        <td class="text-left border border-black p-2"><img class="w-20" :src="`/storage/${instrument.image}`" :alt="instrument.name"></td>
                        <td class="text-left border border-black p-2">
                            <div class="flex gap-2">
                                <Link :href="route('instrument.show', instrument.id)" class="text-green-600">Ver</Link>
                                <Link :href="route('instrument.edit', instrument.id)" class="text-blue-600">Editar</Link>
                                <button @click="Delete(instrument.id)" class="text-red-600">Eliminar</button>
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
    instrument: Object 
});

const instrument = ref(props.instrument);

function CrearType(){
    router.visit('/instrument/create')
}

function Delete(id){
    router.delete(route('instrument.destroy', id))
}
</script>