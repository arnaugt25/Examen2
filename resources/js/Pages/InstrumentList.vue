<template>
    <div>
        <div class="text-center m-4">
            <h1 class=" font-bold text-xl mb-2">Lista de Tipo de instrumento</h1>
            <button @click="CrearType" class="bg-gray-400 py-2 px-4 rounded-lg">Crear Tipo de instrumento</button>
        </div>
        <div class="px-48 sm:w-auto mb-4">
            <input type="text" v-model="search" placeholder="Buscar por nombre o categoria"
            class="w-full px-4 py-2 border border-black rounded-lg " />
        </div>
        <div class="px-48">
            <table class="w-full table-fixed">
                <tr class="bg-gray-400">
                    <th class="text-left border border-black p-2">Name</th>
                    <th class="text-left border border-black p-2">Description</th>
                    <th class="text-left border border-black p-2">Type</th>
                    <th class="text-left border border-black p-2">Image</th>
                    <th class="text-left border border-black p-2">Acciones</th>
                </tr>
                <tr v-for="instrument in filteredEvents" :key="instrument.id">
                    <td class="text-left border border-black p-2">{{ instrument.name }}</td>
                    <td class="text-left border border-black p-2">{{ instrument.description }}</td>
                    <td class="text-left border border-black p-2">{{ instrument.type.name }}</td>
                    <td class="text-left border border-black p-2"><img class="w-20" :src="`/storage/${instrument.image}`" :alt="instrument.name"></td>
                    <td class="text-left border border-black p-2">
                        <div class="flex gap-2">
                            <Link :href="route('instrument.show', instrument.id)" class="text-green-600">Ver</Link>
                            <Link :href="route('instrument.edit', instrument.id)" class="text-blue-600">Editar</Link>
                            <button @click="Delete(instrument.id)" class="text-red-600">Eliminar</button>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div v-if="props.instruments && props.instruments.length > 0" class="w-full max-w-4xl mx-auto mt-10">
        <div class="relative overflow-hidden rounded-xl shadow-lg"
             @mouseenter="stopAutoplay"
             @mouseleave="startAutoplay">
            <img
                :src="getImageUrl(props.instruments[currentIndex].image)"
                :alt="props.instruments[currentIndex].name"
                class="w-full h-64 object-cover transition-all duration-500"
            />

            <div class="absolute bottom-0 w-full bg-black bg-opacity-50 text-white p-4">
                <div class="text-center text-lg font-semibold">
                    {{ props.instruments[currentIndex].name }} - {{ props.instruments[currentIndex].category?.name || 'No Category' }}
                </div>
            </div>

            <button @click="prevImage"
                class="absolute top-1/2 left-2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white px-3 py-1 rounded-full hover:bg-opacity-75">
                ‹
            </button>

            <button @click="nextImage"
                class="absolute top-1/2 right-2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white px-3 py-1 rounded-full hover:bg-opacity-75">
                ›
            </button>
        </div>

        <div class="flex justify-center mt-4 space-x-2">
            <span
                v-for="(sport, index) in props.instruments"
                :key="sport.id"
                @click="goToImage(index)"
                class="w-3 h-3 rounded-full cursor-pointer transition-all duration-300"
                :class="{
                    'bg-gray-800': index === currentIndex,
                    'bg-gray-400': index !== currentIndex
                }"
            />
        </div>
    </div>
    </div>
</template>

<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import {ref,defineProps, computed, onMounted, onUnmounted} from 'vue';
import axios from 'axios';

const props = defineProps({
    instruments: Array
});

const instrument = ref(props.instruments);

function CrearType(){
    router.visit('/instrument/create')
}

// function Delete(id){
//     router.delete(route('instrument.destroy', id))
// }

function Delete(id) {
  router.delete(route('instrument.destroy', id), {
    preserveScroll: true,
    onSuccess: () => {
      instrument.value = instrument.value.filter(instrument => instrument.id !== id);
    }
  });
}

//Buscador
const search = ref('')
const filteredEvents = computed(() =>
  props.instruments.filter(instrument =>
  instrument.name.toLowerCase().includes(search.value.toLowerCase()) ||
    (instrument.type && instrument.type.name &&
    instrument.type.name.toLowerCase().includes(search.value.toLowerCase()))
  )
);

//Slider
const currentIndex = ref(0)
const autoplayInterval = ref(null)
const isPaused = ref(false)

const nextImage = () => {
    if (props.instruments.length > 0) {
        currentIndex.value = (currentIndex.value + 1) % props.instruments.length
    }
}

const prevImage = () => {
    if (props.instruments.length > 0) {
        currentIndex.value = (currentIndex.value - 1 + props.instruments.length) % props.instruments.length
    }
}

const goToImage = (index) => {
    if (props.instruments.length > 0) {
        currentIndex.value = index
    }
}

const getImageUrl = (imagePath) => {
    return `/storage/${imagePath}`;
}

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>