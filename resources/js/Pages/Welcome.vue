

<template>
    <div class="container mx-auto">
        <h1 class="text-4xl font-bold text-center mt-10">Lista de Libros</h1>
        <div class="flex justify-center mt-10">
            <button @click="goToBookList" class="bg-blue-500 text-white px-4 py-2 rounded">Lista</button>
        </div>
    </div>

</template>

<script setup>
import { router } from '@inertiajs/vue3';

function goToBookList() {
    router.visit('/libros');
}
</script>