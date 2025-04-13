<template>
    <!-- Define el título de la página en el navegador -->
    <Head title="notes" />

    <!-- Incluye el componente de navegación -->
    <NavBar />

    <!-- Contenedor principal con margen y padding -->
    <div class="container mx-auto p-4">
        <!-- Cabecera con título y botón de agregar -->
        <div class="flex justify-between mb-4">
            <!-- Título de la página -->
            <h1 class="text-xl font-bold">notes</h1>
            
            <!-- Enlace para crear nuevo notes -->
            <Link :href="route('notes.create')" class="bg-blue-500 text-white p-2 rounded">
                Agregar
            </Link>
        </div>

        <!-- Mensaje de éxito que aparece cuando hay una operación exitosa -->
        <div v-if="$page.props.flash?.success" class="mb-4 p-2 bg-green-100 text-green-700 rounded">
            {{ $page.props.flash.success }}
        </div>

        <!-- Tabla simple para mostrar los notes -->
        <table class="w-full border">
            <!-- Encabezado de la tabla -->
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 text-left">ID</th>
                    <th class="p-2 text-left">Title</th>
                    <th class="p-2 text-left">Content</th>
                    <th class="p-2 text-left">is_favorited</th>
                    <th class="p-2 text-left">Acciones</th>
                </tr>
            </thead>
            <!-- Cuerpo de la tabla con los datos de notes -->
            <tbody>
                <!-- Ciclo que recorre cada notes en el array -->
                <tr v-for="notes in notes" :key="notes.id" class="border-t">
                    <!-- Celdas con información del notes -->
                    <td class="p-2">{{ notes.id }}</td>
                    <td class="p-2">{{ notes.title }}</td>
                    <td class="p-2">{{ notes.content }}</td>
                    <td class="p-2">{{ notes.is_favorited }}</td>
                    <!-- Celda con botones de acción -->
                    <td class="p-2">
                        <div class="flex gap-2">
                            <!-- Enlace para ver detalles del notes -->
                            <Link :href="route('notes.show', notes.id)" class="text-blue-500">Ver</Link>
                            <!-- Enlace para editar el notes -->
                            <Link :href="route('notes.edit', notes.id)" class="text-yellow-500">Editar</Link>
                            <!-- Botón para eliminar el notes -->
                            <button @click="eliminarnotes(notes.id)" class="text-red-500">Eliminar</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
// Importamos los componentes necesarios de Inertia
import { Head, Link, router } from '@inertiajs/vue3';
// Importamos el componente de navegación
import NavBar from '@/Components/NavBar.vue';

// Definimos las props que recibe este componente (datos de notes)
const props = defineProps({
    notes: Array // Array de notes que viene del controlador
});

// Función para eliminar un notes
function eliminarnotes(id) {
    // Confirmación antes de eliminar
    if (confirm('¿Estás seguro de eliminar este notes?')) {
        // Enviamos la petición DELETE al servidor con el ID del notes
        router.delete(route('notes.destroy', id));
    }
}
</script>