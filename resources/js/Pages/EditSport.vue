<template>

    <Head title="Crear Cateory" />

    <div class="container mx-auto p-4">
        <h1 class="text-xl font-bold mb-4">Editar Sport</h1>

        <div class="bg-white p-4 border rounded">
            <form @submit.prevent="submit">
                <div class="mb-3">
                    <label for="name" class="block mb-1">name:</label>
                    <input type="text" id="name" v-model="form.name" class="w-full border p-2 rounded" required />
                </div>

                <div class="mb-3">
                    <label for="description" class="block mb-1">description:</label>
                    <input type="text" id="description" v-model="form.description" class="w-full border p-2 rounded" required />
                </div>  

                <div class="mb-3">
                    <label for="category" class="block mb-1">Categoria:</label>
                    <select
                        id="category_id"
                        v-model="form.category_id"
                        class="w-full border p-2 rounded"
                        required
                    >
                        <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
                    </select>
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
                        <img v-else-if="sport.image" class="w-20" :src="`/storage/${sport.image}`" :alt="sport.name">
                    </div>
                </div>

                <div class="flex justify-between mt-4">
                    <Link :href="route('sport.index')" class="bg-gray-300 px-3 py-1 rounded">
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
import { defineProps, onMounted, ref } from 'vue';

const props = defineProps({
    sport: Object,
    categories: Array,
});

const previewImage = ref(null);

const form = useForm({
    name: '',
    description: '',
    category_id: '',
    image: '',
    _method: 'put',
});

const handleImageChange = (event) => {
    const file = event.target.files[0];
    form.image = file;
    
    if (file) {
        previewImage.value = URL.createObjectURL(file);
    }
};

onMounted(() => {
    if (props.sport) {
        form.name = props.sport.name;
        form.description = props.sport.description;
        form.category_id = props.sport.category_id;
        form.image = props.sport.image;
    }
});

function submit() {
    form.post(route('sport.update', props.sport.id));
}
</script>