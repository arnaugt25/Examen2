<template>
    <!-- Barra de navegación principal -->
    <nav class="bg-white border-b">
        <!-- Contenedor del contenido de la barra -->
        <div class="container mx-auto px-4">
            <!-- Contenedor flexible para alinear elementos -->
            <div class="flex justify-between h-16">
                <!-- Logo o título de la aplicación -->
                <div class="flex items-center">
                    <a href="/" class="text-blue-600 font-bold">Sistema de Productos</a>
                </div>
                
                <!-- Enlaces de navegación para pantallas grandes -->
                <div class="hidden sm:flex items-center space-x-4">
                    <a href="/" class="text-gray-500 hover:text-blue-500">Inicio</a>
                    <a href="/productos" class="text-gray-500 hover:text-blue-500">Productos</a>
                </div>
                
                <!-- Botón del menú para pantallas pequeñas -->
                <div class="sm:hidden flex items-center">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-500">
                        Menú
                    </button>
                </div>
            </div>
            
            <!-- Menú móvil (solo visible cuando mobileMenuOpen es true) -->
            <div v-if="mobileMenuOpen" class="sm:hidden pb-3">
                <a href="/" class="block py-2 text-gray-500">Inicio</a>
                <a href="/productos" class="block py-2 text-gray-500">Productos</a>
            </div>
        </div>
    </nav>
</template>

<script setup>
// Importamos ref de Vue para crear variables reactivas
import { ref } from 'vue';

// Variable reactiva para controlar si el menú móvil está abierto o cerrado
const mobileMenuOpen = ref(false);
</script> 