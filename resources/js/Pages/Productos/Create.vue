<template>
    <!-- Define el título de la página -->
    <Head title="Crear Producto" />
    
    <!-- Incluye la barra de navegación -->
    <Navbar />
    
    <!-- Contenedor principal -->
    <div class="container mx-auto p-4">
        <!-- Título de la página -->
        <h1 class="text-xl font-bold mb-4">Crear Producto</h1>
        
        <!-- Formulario en un contenedor con borde -->
        <div class="bg-white p-4 border rounded">
            <!-- Formulario con método para prevenir el envío normal -->
            <form @submit.prevent="submit">
                <!-- Campo para el nombre del producto -->
                <div class="mb-3">
                    <!-- Etiqueta del campo -->
                    <label for="nombre" class="block mb-1">Nombre:</label>
                    <!-- Input para el nombre -->
                    <input
                        type="text"
                        id="nombre"
                        v-model="form.nombre"
                        class="w-full border p-2 rounded"
                        required
                    />
                    <!-- Mensaje de error si existe -->
                    <div v-if="form.errors.nombre" class="text-red-500 text-sm">{{ form.errors.nombre }}</div>
                </div>

                <!-- Campo para la descripción -->
                <div class="mb-3">
                    <label for="descripcion" class="block mb-1">Descripción:</label>
                    <textarea
                        id="descripcion"
                        v-model="form.descripcion"
                        rows="3"
                        class="w-full border p-2 rounded"
                    ></textarea>
                </div>

                <!-- Campo para el precio -->
                <div class="mb-3">
                    <label for="precio" class="block mb-1">Precio:</label>
                    <input
                        type="number"
                        id="precio"
                        v-model="form.precio"
                        step="0.01"
                        min="0"
                        class="w-full border p-2 rounded"
                        required
                    />
                </div>

                <!-- Campo para el stock -->
                <div class="mb-3">
                    <label for="stock" class="block mb-1">Stock:</label>
                    <input
                        type="number"
                        id="stock"
                        v-model="form.stock"
                        min="0"
                        class="w-full border p-2 rounded"
                        required
                    />
                </div>

                <!-- Botones de acción -->
                <div class="flex justify-between mt-4">
                    <!-- Botón para cancelar y volver al listado -->
                    <Link :href="route('productos.index')" class="bg-gray-300 px-3 py-1 rounded">
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
import Navbar from '@/Components/Navbar.vue';

// Creamos un formulario con los campos necesarios
const form = useForm({
    nombre: '',      // Campo para el nombre del producto
    descripcion: '', // Campo para la descripción (opcional)
    precio: '',      // Campo para el precio del producto
    stock: 0,        // Campo para el stock inicial (predeterminado: 0)
});

// Función que se ejecuta al enviar el formulario
function submit() {
    // Enviamos los datos al servidor mediante una petición POST
    form.post(route('productos.store'));
}
</script> 