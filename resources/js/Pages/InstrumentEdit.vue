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
                    <label for="type" class="block mb-1">Categoria:</label>
                    <select
                        id="type_id"
                        v-model="form.type_id"
                        class="w-full border p-2 rounded"
                        required
                    >
                        <option v-for="type in types" :key="type.id" :value="type.id">{{ type.name }}</option>
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
                        <img v-else-if="instrument.image" class="w-20" :src="`/storage/${instrument.image}`" :alt="instrument.name">
                    </div>
                </div>

                <div class="flex justify-between mt-4">
                    <Link :href="route('instrument.index')" class="bg-gray-300 px-3 py-1 rounded">
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
    instrument: Object,
    types: Array
});
 
const previewImage = ref(null);

const form = useForm({
    name: '',
    description:'',
    type_id: '',
    image: '',
    _method: 'put',
});

const handleImageChange = (instrument) => {
    const file = instrument.target.files[0];
    form.image = file;
    
    if (file) {
        previewImage.value = URL.createObjectURL(file);
    }
};

onMounted(() => {
    if (props.instrument) {
        form.name = props.instrument.name;
        form.description = props.instrument.description;
        form.type_id = props.instrument.type_id;
        form.image = props.instrument.image;

    }
});

function submit() {
    form.post(route('instrument.update', props.instrument.id));
}
</script>