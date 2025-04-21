<template>
    <div class="bg-gray-300 text-center text-black">
        Deportes:
        <button @click="goToCreateList" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                Crear Deporte
        </button>
        <div>
            <table class="w-full border">
                <tr>
                    <th class="p-2 text-left">ID</th>
                    <th class="p-2 text-left">name</th>
                    <th class="p-2 text-left">Description</th>
                    <th class="p-2 text-left">Category</th>
                    <th class="p-2 text-left">Acciones</th>
                </tr>
                
                    <tr class="border-t" v-for="sport in sports" :key="sport.id">
                        <td class="p-2 text-left">{{ sport.id }}</td>
                        <td class="p-2 text-left">{{ sport.name }}</td>
                        <td class="p-2 text-left">{{ sport.description }}</td>
                        <td class="p-2 text-left">{{ sport.category?.name || 'No Category' }}</td>
                        <td class="p-2 text-left"><img class="w-20" :src="`/storage/${sport.image}`" :alt="sport.name"></td>
                        <td class="p-2">
                            <div class="flex gap-2">
                                <Link :href="route('sport.show', sport.id)" class="text-blue-500">Ver</Link>
                                <Link :href="route('sport.edit', sport.id)" class="text-yellow-500">Editar</Link>
                                <button @click="deleteSport(sport.id)" class="text-red-500">Eliminar</button>
                            </div>
                        </td>
                    </tr>
                    <tr >
                        <td colspan="7" class="p-2 text-center"></td>
                    </tr>
            </table>
        </div>
    </div>
</template>


<script setup>
import { Head, Link, router } from '@inertiajs/vue3';

const props = defineProps({
    sports: Array,
});

function deleteSport(id){
    router.delete(route('sport.destroy', id))
}

function goToCreateList(){
    router.visit('/sport/create');
}
</script>