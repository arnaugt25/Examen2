<template>
    <div class="text-center">
        <h1 class="text-2xl m-8 underline">Que quieres hacer?</h1>
        <button @click="ListBike" class="mr-4 bg-gray-400 px-4 py-2 rounded font-bold">Ver Lista Bicicletas</button>
        <button @click="CreateBike" class="bg-gray-400 px-4 py-2 rounded font-bold">Crear Nueva Bicicleta</button>
    </div>
</template>

<script setup>
import { router } from '@inertiajs/vue3';

function ListBike(){
    router.visit('/bike')
}

function CreateBike(){
    router.visit('/bike/create')
}
</script>