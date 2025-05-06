<template>
    <div class="bg-gray-300 text-center text-black">
        Deportes:
        <div>
            <button @click="goToCreateList" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                Crear Instrumento
            </button>
            <button @click="goToList" class="bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded">
                Ver Lista Instrumento
            </button>
        </div>
    </div>
    <div class="bg-gray-300 text-center text-black">
        Categories:
        <div>
            <button @click="goToCreateListCategory" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                Crear type
            </button>
            <button @click="goToListCategory" class="bg-green-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded mr-2">
                Ver Lista Type
            </button>
        </div>
    </div>
</template>


<script setup>
import { router } from '@inertiajs/vue3';

const goToCreateList = () => {
    router.visit('/instrument/create');
};

const goToList = () => {
    router.visit('/instrument');
};

const goToCreateListCategory = () => {
    router.visit('/type/create');
};
const goToListCategory = () => {
    router.visit('/type');
};
</script>