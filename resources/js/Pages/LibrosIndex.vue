<template>
    <div class="bg-gray-300 text-center text-black">
        Libros:
        <button @click="goToCreateList" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                Crear Libro
        </button>
        <div>
            <table class="w-full border">
                <tr>
                    <th class="p-2 text-left">ID</th>
                    <th class="p-2 text-left">name</th>
                    <th class="p-2 text-left">Description</th>
                    <th class="p-2 text-left">Acciones</th>
                </tr>
                
                    <tr class="border-t" v-for="libro in libros" :key="libro.id">
                        <td class="p-2 text-left">{{ libro.id }}</td>
                        <td class="p-2 text-left">{{ libro.name }}</td>
                        <td class="p-2 text-left">{{ libro.description }}</td>
                        <td class="p-2">
                            <div class="flex gap-2">
                                <Link :href="route('libros.show', libro.id)" class="text-blue-500">Ver</Link>
                                <Link :href="route('libros.edit', libro.id)" class="text-yellow-500">Editar</Link>
                                <button @click="deleteLibros(libro.id)" class="text-red-500">Eliminar</button>
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
    libros: Array,
});

function deleteLibros(id){
    router.delete(route('libros.destroy', id))
    console.log('Eliminando libro con ID:', id);
}

function goToCreateList(){
    router.visit('/libros/create')
}
</script>