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
                <!-- Campo para el titulo del producto -->
                <div class="mb-3">
                    <!-- Etiqueta del campo -->
                    <label for="titulo" class="block mb-1">titulo:</label>
                    <!-- Input para el titulo -->
                    <input
                        type="text"
                        id="titulo"
                        v-model="form.titulo"
                        class="w-full border p-2 rounded"
                        required
                    />
                    <!-- Mensaje de error si existe -->
                    <div v-if="form.errors.titulo" class="text-red-500 text-sm">{{ form.errors.titulo }}</div>
                </div>

                <!-- Campo para la autor -->
                <div class="mb-3">
                    <label for="autor" class="block mb-1">Autor:</label>
                    <input
                        type="text"
                        id="autor"
                        v-model="form.autor"
                        rows="3"
                        class="w-full border p-2 rounded"
                        required
                    ></input>
                </div>

                <!-- Campo para el año -->
                <div class="mb-3">
                    <label for="precio" class="block mb-1">Año de Creacion:</label>
                    <input
                        type="date"
                        id="año"
                        v-model="form.año"
                        step="0.01"
                        min="0"
                        class="w-full border p-2 rounded"
                        required
                    />
                </div>

                <!-- Campo para el genero -->
                <div class="mb-3">
                    <label for="genero" class="block mb-1">Genero:</label>
                    <input
                        type="text"
                        id="genero"
                        v-model="form.genero"
                        min="0"
                        class="w-full border p-2 rounded"
                        required
                    />
                </div>

                <div class="mb-3">
                    <label for="Disponibilidad" class="block mb-1">Disponibilidad:</label>
                    <input
                        type="checkbox"
                        id="Disponibilidad"
                        v-model="form.Disponibilidad"
                        class="mr-2"
                    />
                    <span>{{ form.Disponibilidad ? 'Disponible' : 'No disponible' }}</span>
                </div>


                <!-- Botones de acción -->
                <div class="flex justify-between mt-4">
                    <!-- Botón para cancelar y volver al listado -->
                    <Link :href="route('Libros.index')" class="bg-gray-300 px-3 py-1 rounded">
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
    titulo: '',      // Campo para el titulo del producto
    autor: '', // Campo para la descripción (opcional)
    año: '',      // Campo para el precio del producto
    genero: '',
    Disponibilidad: 0,    // Campo para el stock inicial (predeterminado: 0)
});

// Función que se ejecuta al enviar el formulario
function submit() {
    // Enviamos los datos al servidor mediante una petición POST
    form.post(route('Libros.store'));
}
</script> 