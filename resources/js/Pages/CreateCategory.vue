<template>
    <!-- Define el título de la página -->
    <Head title="Crear Cateory" />
    
    <!-- Contenedor principal -->
    <div class="container mx-auto p-4">
        <!-- Título de la página -->
        <h1 class="text-xl font-bold mb-4">Crear Categoria</h1>
        
        <!-- Formulario en un contenedor con borde -->
        <div class="bg-white p-4 border rounded">
            <!-- Formulario con método para prevenir el envío normal -->
            <form @submit.prevent="submit">
                <!-- Campo para el name del producto -->
                <div class="mb-3">
                    <!-- Etiqueta del campo -->
                    <label for="name" class="block mb-1">name:</label>
                    <!-- Input para el name -->
                    <input
                        type="text"
                        id="name"
                        v-model="form.name"
                        class="w-full border p-2 rounded"
                        required
                    />
                </div>

                <div class="flex justify-between mt-4">
                    <Link :href="route('categories.index')" class="bg-gray-300 px-3 py-1 rounded">
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
import { defineProps } from 'vue';

const props = defineProps({
    categories: Array,
});

const form = useForm({
    name: '',
});

function submit() {
    form.post(route('categories.store'));
}
</script> 