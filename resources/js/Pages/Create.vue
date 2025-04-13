<template>
    <!-- Define el título de la página -->
    <Head title="Crear Producto" />
    
    <!-- Incluye la barra de navegación -->
    <NavBar />
    
    <!-- Contenedor principal -->
    <div class="container mx-auto p-4">
        <!-- Título de la página -->
        <h1 class="text-xl font-bold mb-4">Crear Producto</h1>
        
        <!-- Formulario en un contenedor con borde -->
        <div class="bg-white p-4 border rounded">
            <!-- Formulario con método para prevenir el envío normal -->
            <form @submit.prevent="submit">
                <!-- Campo para el title del producto -->
                <div class="mb-3">
                    <!-- Etiqueta del campo -->
                    <label for="title" class="block mb-1">title:</label>
                    <!-- Input para el title -->
                    <input
                        type="text"
                        id="title"
                        v-model="form.title"
                        class="w-full border p-2 rounded"
                        required
                    />
                    <!-- Mensaje de error si existe -->
                    <div v-if="form.errors.title" class="text-red-500 text-sm">{{ form.errors.title }}</div>
                </div>

                <!-- Campo para la content -->
                <div class="mb-3">
                    <label for="content" class="block mb-1">content:</label>
                    <input
                        type="text"
                        id="content"
                        v-model="form.content"
                        rows="3"
                        class="w-full border p-2 rounded"
                        required
                    ></input>
                </div>

                <div class="mb-3">
                    <label for="is_favorited" class="block mb-1">is_favorited:</label>
                    <input
                        type="checkbox"
                        id="is_favorited"
                        v-model="form.is_favorited"
                        class="mr-2"
                    />
                    <span>{{ form.is_favorited ? 'Si' : 'No' }}</span>
                </div>


                <!-- Botones de acción -->
                <div class="flex justify-between mt-4">
                    <!-- Botón para cancelar y volver al listado -->
                    <Link :href="route('notes.index')" class="bg-gray-300 px-3 py-1 rounded">
                        Cancelar
                    </Link>
                    <!-- Botón para guardar el formulario -->
                    <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
// Importamos los componentes y funciones necesarias de Inertia
import { Head, Link, useForm } from '@inertiajs/vue3';
// Importamos el componente de navegación
import NavBar from '@/Components/NavBar.vue';

// Creamos un formulario con los campos necesarios
const form = useForm({
    title: '',      // Campo para el title del producto
    content: '', // Campo para la descripción (opcional)
    is_favorited: 0,    // Campo para el stock inicial (predeterminado: 0)
});

// Función que se ejecuta al enviar el formulario
function submit() {
    // Enviamos los datos al servidor mediante una petición POST
    form.post(route('notes.store'));
}
</script> 