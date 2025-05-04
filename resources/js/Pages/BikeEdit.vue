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
                    <label for="image" class="block mb-1">Imagen:</label>
                    <input
                        type="file"
                        id="image"
                        @input="handleImageChange"
                        class="w-full border p-2 rounded"
                        accept="image/*"
                    />
                </div>

                <div class="flex justify-between mt-4">
                    <Link :href="route('bike.index')" class="bg-gray-300 px-3 py-1 rounded">
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
    bike: Object,
});
 
const previewImage = ref(null);

const form = useForm({
    name: '',
    description: '',
    image: null,
    _method: 'put',
});

const handleImageChange = (bike) => {
    const file = bike.target.files[0];
    form.image = file;
    
    if (file) {
        previewImage.value = URL.createObjectURL(file);
    }
};

onMounted(() => {
    if (props.bike) {
        form.name = props.bike.name;
        form.description = props.bike.description;
        form.image = props.bike.image;
    }
});

function submit() {
    form.post(route('bike.update', props.bike.id));
}
</script>