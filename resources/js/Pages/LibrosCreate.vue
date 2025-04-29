<template>
    <Head title="Crear Libro" />
    
    <div class="container mx-auto p-4">
        <h1 class="text-xl font-bold mb-4">Crear Libro</h1>
        
        <div class="bg-white p-4 border rounded">
            <form @submit.prevent="submit">
                <div class="mb-3">
                    <label for="name" class="block mb-1">name:</label>
                    <input
                        type="text"
                        id="name"
                        v-model="form.name"
                        class="w-full border p-2 rounded"
                        required
                    />
                </div>

                <!-- Campo para la descripcion -->
                <div class="mb-3">
                    <label for="description" class="block mb-1">Description:</label>
                    <input
                        type="text"
                        id="description"
                        v-model="form.description"
                        rows="3"
                        class="w-full border p-2 rounded"
                        required
                    ></input>
                </div>
                
                <div class="flex justify-between mt-4">
                    <Link :href="route('libros.index')" class="bg-gray-300 px-3 py-1 rounded">
                        Cancelar
                    </Link>
                    <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import { defineProps , onMounted, ref } from 'vue';

const props = defineProps({
    libros: Array,
});


const form = useForm({
    name: '',    
    description: '',
});

function submit() {
    form.post(route('libros.store'));
}
</script> 