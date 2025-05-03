<template>
    <div class="text-center m-8">
        <h1 class="text-xl mb-4">Que quieres hacer</h1>
        <button @click="CreateCaca" class="py-2 px-4 bg-gray-400 rounded-md">Crear Caca</button>
        <button @click="ListaCaca" class="ml-4 py-2 px-4 bg-gray-400 rounded-md">Ver lista de Cacas</button>
    </div>
</template>

<script setup>
import { router } from '@inertiajs/vue3';

function CreateCaca() {
    router.visit('/caca/create');
}

function ListaCaca() {
    router.visit('/caca');
}
</script>