<template>
    <div class="container mx-auto p-4">
        <h1 class="text-xl font-bold mb-4">Crear Sport</h1>
        <div class="bg-white p-4 border rounded">
            <form @submit.prevent="submit">
                <div class="mb-3">
                    <label for="name" class="block mb-1">name:</label>
                    <input
                        type="text"
                        id="name"
                        v-model="form.name"
                        class="w-full border p-2 rounded"
                        required
                    />
                </div>

                <div class="mb-3">
                    <label for="description" class="block mb-1">Description:</label>
                    <input
                        type="text"
                        id="description"
                        v-model="form.description"
                        rows="3"
                        class="w-full border p-2 rounded"
                        required
                    ></input>
                </div>
                
                <div class="mb-3">
                    <label for="image" class="block mb-1">Imagen:</label>
                    <input
                        type="file"
                        id="image"
                        @input="handleImageChange"
                        class="w-full border p-2 rounded"
                        accept="image/*"
                    />
                    <div class="p-2 text-left">
                        <img v-if="previewImage" class="w-20" :src="previewImage" :alt="form.name">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="audio" class="block mb-1">Audio:</label>
                    <input
                        type="file"
                        id="audio"
                        @input="handleAudioChange"
                        class="w-full border p-2 rounded"
                        accept="audio/*"
                    />
                </div>

                <div class="flex justify-between mt-4">
                    <Link :href="route('caca.index')" class="bg-gray-300 px-3 py-1 rounded">
                        Cancelar
                    </Link>
                    <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import { defineProps , onMounted, ref } from 'vue';

const props = defineProps({
    caca: Array,
});

const previewImage = ref(null);
const previewAudio = ref(null);

const form = useForm({
    name: '',    
    description: '',
    image: null,
    audio: null,
});

const handleImageChange = (caca) => {
    const file = caca.target.files[0];
    form.image = file;
    
    if (file) {
        previewImage.value = URL.createObjectURL(file);
    }
};

const handleAudioChange = (caca) => {
    const file = caca.target.files[0];
    form.audio = file;
    
    if (file) {
        previewAudio.value = URL.createObjectURL(file);
    }
};

function submit() {
    form.post(route('caca.store'));
}
</script> 