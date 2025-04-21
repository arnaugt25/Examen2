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

    <div v-if="props.sports && props.sports.length > 0" class="w-full max-w-4xl mx-auto mt-10">
        <div class="relative overflow-hidden rounded-xl shadow-lg"
             @mouseenter="stopAutoplay"
             @mouseleave="startAutoplay">
            <img
                :src="getImageUrl(props.sports[currentIndex].image)"
                :alt="props.sports[currentIndex].name"
                class="w-full h-64 object-cover transition-all duration-500"
            />

            <div class="absolute bottom-0 w-full bg-black bg-opacity-50 text-white p-4">
                <div class="text-center text-lg font-semibold">
                    {{ props.sports[currentIndex].name }} - {{ props.sports[currentIndex].category.name }}
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
                v-for="(sport, index) in props.sports"
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
</template>


<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import { ref, onMounted, onUnmounted } from 'vue'

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

const currentIndex = ref(0)
const autoplayInterval = ref(null)
const isPaused = ref(false)

// const startAutoplay = () => {
//     if (!isPaused.value) {
//         autoplayInterval.value = setInterval(() => {
//             nextImage()
//         }, 3000)
//     }
// }

const stopAutoplay = () => {
    if (autoplayInterval.value) {
        clearInterval(autoplayInterval.value)
        autoplayInterval.value = null
    }
}

const nextImage = () => {
    if (props.sports.length > 0) {
        currentIndex.value = (currentIndex.value + 1) % props.sports.length
    }
}

const prevImage = () => {
    if (props.sports.length > 0) {
        currentIndex.value = (currentIndex.value - 1 + props.sports.length) % props.sports.length
    }
}

const goToImage = (index) => {
    if (props.sports.length > 0) {
        currentIndex.value = index
    }
}

onMounted(() => {
    startAutoplay()
})

onUnmounted(() => {
    stopAutoplay()
})

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