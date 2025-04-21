<template>
    <!-- Define el título de la página -->
    <Head title="Crear Sport" />
    
    <!-- Contenedor principal -->
    <div class="container mx-auto p-4">
        <!-- Título de la página -->
        <h1 class="text-xl font-bold mb-4">Crear Sport</h1>
        
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

                <!-- Campo para el genero -->
                <div class="mb-3">
                    <label for="category" class="block mb-1">Categoria:</label>
                    <select
                        id="category_id"
                        v-model="form.category_id"
                        required
                    >
                    <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
                    </select>
                </div>

                
                <div class="mb-3">
                    <label for="image" class="block mb-1">Imagen:</label>
                    <input
                        type="file"
                        id="image"
                        @input="handleImageChange"
                        class="w-full border p-2 rounded"
                        accept="image/*"
                    />
                    <div class="p-2 text-left">
                        <img v-if="previewImage" class="w-20" :src="previewImage" :alt="form.name">
                    </div>

                </div>

                <div class="flex justify-between mt-4">
                    <Link :href="route('sport.index')" class="bg-gray-300 px-3 py-1 rounded">
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
    categories: Array,
});

const previewImage = ref(null);


const form = useForm({
    name: '',    
    description: '',
    category_id: '',
    image: '',
});

const handleImageChange = (event) => {
    const file = event.target.files[0];
    form.image = file;
    
    if (file) {
        previewImage.value = URL.createObjectURL(file);
    }
};

function submit() {
    form.post(route('sport.store'));
}
</script> 