<template>
    <Navbar/>
    <div class="bg-gray-300 text-center text-black">
        <h1 class="font-bold text-xl mb-2">Bienvenido</h1>
        <div>
            <button @click="showInstruments = true" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                Mostrar Instrumentos
            </button>
            <button @click="showInstruments = false" class="bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded">
                Mostrar Tipos
            </button>
        </div>
    </div>
    <div class="bg-gray-300 text-center text-black" v-if="showInstruments">
        <InstrumentList :instruments="instruments" />
    </div>
    <div class="bg-gray-300 text-center text-black" v-else>
        <TypeList :types="types" />
    </div>
</template>

<script setup>
import { ref, defineProps } from 'vue';
import { router } from '@inertiajs/vue3';
import Navbar from '@/Components/Navbar.vue';
import InstrumentList from '@/Pages/InstrumentList.vue';
import TypeList from '@/Pages/TypeList.vue';

const props = defineProps({
    instruments: Array,
    types: Array,
});

const showInstruments = ref(true);

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