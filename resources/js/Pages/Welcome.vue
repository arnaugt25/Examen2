<script setup>
import { Head, Link } from '@inertiajs/vue3';
import NavBar from '@/Components/NavBar.vue';
</script>

<template>
    <!-- Define el título de la página -->
    <Head title="Inicio" />
    
    <!-- Incluye la barra de navegación -->
    <NavBar />
    
    <!-- Contenedor principal -->
    <div class="container mx-auto p-4">
        <!-- Tarjeta central con contenido -->
        <div class="bg-white p-6 rounded border mt-4">
            <!-- Título principal -->
            <h1 class="text-2xl font-bold text-center mb-6">Sistema de Gestión de Libros</h1>
            
            <!-- Contenedor de los botones principales -->
            <div class="flex justify-center gap-4">
                <!-- Botón para ver productos -->
                <Link :href="route('Libros.index')" class="bg-blue-500 text-white px-4 py-2 rounded">
                    Ver Libros
                </Link>
                
                <!-- Botón para crear un producto nuevo -->
                <Link :href="route('Libros.create')" class="bg-green-500 text-white px-4 py-2 rounded">
                    Crear Libros
                </Link>
            </div>
        </div>
    </div>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
</style>