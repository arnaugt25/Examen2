<template>
    <Head title="Editar Libro" />

    <GuestLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Libro</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div class="mb-4">
                                <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
                                <input
                                    type="text"
                                    id="titulo"
                                    v-model="form.titulo"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    required
                                />
                                <div v-if="form.errors.titulo" class="text-red-500 text-sm mt-1">{{ form.errors.titulo }}</div>
                            </div>

                            <div class="mb-4">
                                <label for="autor" class="block text-sm font-medium text-gray-700">Autor</label>
                                <input
                                    type="text"
                                    id="autor"
                                    v-model="form.autor"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    required
                                />
                                <div v-if="form.errors.autor" class="text-red-500 text-sm mt-1">{{ form.errors.autor }}</div>
                            </div>

                            <div class="mb-4">
                                <label for="año" class="block text-sm font-medium text-gray-700">Año</label>
                                <input
                                    type="date"
                                    id="año"
                                    v-model="form.año"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    required
                                />
                                <div v-if="form.errors.año" class="text-red-500 text-sm mt-1">{{ form.errors.año }}</div>
                            </div>

                            <div class="mb-4">
                                <label for="genero" class="block text-sm font-medium text-gray-700">Género</label>
                                <input
                                    type="text"
                                    id="genero"
                                    v-model="form.genero"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    required
                                />
                                <div v-if="form.errors.genero" class="text-red-500 text-sm mt-1">{{ form.errors.genero }}</div>
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Disponibilidad</label>
                                <div class="mt-2">
                                    <label class="inline-flex items-center">
                                        <input 
                                            type="checkbox" 
                                            v-model="form.Disponibilidad"
                                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                        />
                                        <span class="ml-2">{{ form.Disponibilidad ? 'Disponible' : 'No disponible' }}</span>
                                    </label>
                                </div>
                                <div v-if="form.errors.Disponibilidad" class="text-red-500 text-sm mt-1">{{ form.errors.Disponibilidad }}</div>
                            </div>

                            <div class="flex items-center justify-between mt-6">
                                <Link
                                    :href="route('Libros.index')"
                                    class="px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2 transition ease-in-out duration-150"
                                >
                                    Cancelar
                                </Link>
                                <button
                                    type="submit"
                                    :disabled="form.processing"
                                    class="px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                >
                                    Actualizar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';

const props = defineProps({
    Libros: Object,
});

const form = useForm({
    titulo: props.Libros.titulo,
    autor: props.Libros.autor,
    año: props.Libros.año,
    genero: props.Libros.genero,
    Disponibilidad: props.Libros.Disponibilidad
});

function submit() {
    form.put(route('Libros.update', props.Libros.id));
}
</script> 