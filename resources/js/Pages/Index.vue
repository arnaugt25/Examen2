<template>
    <!-- Define el título de la página en el navegador -->
    <Head title="Libros" />

    <!-- Incluye el componente de navegación -->
    <NavBar />

    <!-- Contenedor principal con margen y padding -->
    <div class="container mx-auto p-4">
        <!-- Cabecera con título y botón de agregar -->
        <div class="flex justify-between mb-4">
            <!-- Título de la página -->
            <h1 class="text-xl font-bold">Libros</h1>
            
            <!-- Enlace para crear nuevo Libros -->
            <Link :href="route('Libros.create')" class="bg-blue-500 text-white p-2 rounded">
                Agregar
            </Link>
        </div>

        <!-- Mensaje de éxito que aparece cuando hay una operación exitosa -->
        <div v-if="$page.props.flash?.success" class="mb-4 p-2 bg-green-100 text-green-700 rounded">
            {{ $page.props.flash.success }}
        </div>

        <!-- Tabla simple para mostrar los Libros -->
        <table class="w-full border">
            <!-- Encabezado de la tabla -->
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 text-left">ID</th>
                    <th class="p-2 text-left">Título</th>
                    <th class="p-2 text-left">Autor</th>
                    <th class="p-2 text-left">Año</th>
                    <th class="p-2 text-left">Género</th>
                    <th class="p-2 text-left">Disponibilidad</th>
                    <th class="p-2 text-left">Acciones</th>                
                </tr>
            </thead>
            <!-- Cuerpo de la tabla con los datos de Libros -->
            <tbody>
                <!-- Ciclo que recorre cada libro en el array -->
                <tr v-for="libro in Libros" :key="libro.id" class="border-t">
                    <!-- Celdas con información del libro -->
                    <td class="p-2">{{ libro.id }}</td>
                    <td class="p-2">{{ libro.titulo }}</td>
                    <td class="p-2">{{ libro.autor }}</td>
                    <td class="p-2">{{ libro.año }}</td>
                    <td class="p-2">{{ libro.genero }}</td>
                    <td class="p-2">{{ libro.Disponibilidad ? 'Disponible' : 'No disponible' }}</td>
                    <!-- Celda con botones de acción -->
                    <td class="p-2">
                        <div class="flex gap-2">
                            <!-- Enlace para ver detalles del libro -->
                            <Link :href="route('Libros.show', libro.id)" class="text-blue-500">Ver</Link>
                            <!-- Enlace para editar el libro -->
                            <Link :href="route('Libros.edit', libro.id)" class="text-yellow-500">Editar</Link>
                            <!-- Botón para eliminar el libro -->
                            <button @click="eliminarLibro(libro.id)" class="text-red-500">Eliminar</button>
                        </div>
                    </td>
                </tr>
                <!-- Mensaje que aparece cuando no hay libros -->
                <tr v-if="Libros.length === 0">
                    <td colspan="7" class="p-2 text-center">No hay libros disponibles</td>
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

// Definimos las props que recibe este componente (datos de Libros)
const props = defineProps({
    Libros: Array // Array de Libros que viene del controlador
});

// Función para eliminar un libro
function eliminarLibro(id) {
    // Confirmación antes de eliminar
    if (confirm('¿Estás seguro de eliminar este libro?')) {
        // Enviamos la petición DELETE al servidor con el ID del libro
        router.delete(route('Libros.destroy', id));
    }
}
</script>