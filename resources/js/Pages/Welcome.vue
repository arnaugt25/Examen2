<template>
    <div class="text-center">
        <h1 class="font-bold text-xl m-4">Que quieres hacer?</h1>
        <button @click="ListaHerramientas" class="py-2 px-4 bg-green-300 rounded-lg mr-4">Ver Lista Herramientas</button>
        <button @click="CrearHerramienta" class="py-2 px-4 bg-blue-300 rounded-lg ">Crear Herramienta</button>
    </div> 
</template>

<script setup>
import { router} from '@inertiajs/vue3';

function ListaHerramientas(){
    router.visit('/tool')
}

function CrearHerramienta(){
    router.visit('/tool/create')
}
</script>