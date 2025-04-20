<template>
    <div class="bg-gray-300 text-center text-black">
        Deportes:
        <div>
            <button @click="goToCreateList" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                Crear Deporte
            </button>
            <button @click="goToList" class="bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded">
                Ver Lista Deporte
            </button>
        </div>
    </div>
    <div class="bg-gray-300 text-center text-black">
        Categories:
        <div>
            <button @click="goToCreateListCategory" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                Crear Categoria
            </button>
            <button @click="goToListCategory" class="bg-green-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded mr-2">
                Ver Lista Categoria
            </button>
        </div>
    </div>
</template>


<script setup>
import { Head, Link, router } from '@inertiajs/vue3';

const props = defineProps({
    sports: Array,
});

const goToCreateList = () => {
    router.visit('/sport/create');
};

const goToList = () => {
    router.visit('/sport');
};

const goToCreateListCategory = () => {
    router.visit('/categories/create');
};
const goToListCategory = () => {
    router.visit('/categories');
};
</script>