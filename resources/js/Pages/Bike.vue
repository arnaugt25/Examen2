<template>
    <div class="text-center text-2xl p-4">
        Lista de Bicicletas
    </div>
    <div class="text-center pb-4">
        <button @click="CreateBike" class="py-2 px-2 bg-blue-300 text-black rounded-lg border border-black">Crear Bicicleta</button>
    </div>
    <div class="px-48">
        <table class="w-full table-fixed border border-black">
            <tr class="bg-gray-400">
                <th class="text-left p-2 border border-black">Name</th>
                <th class="border border-black text-left p-2">Description</th>
                <th class="border border-black text-left p-2">Image</th>
                <th class="border border-black text-left p-2">Acciones</th>
            </tr>

            <tr v-for="bike in bike" :key="bike.id">
                <td class="border border-black text-left p-2">{{ bike.name }}</td>
                <td class="border border-black text-left p-2">{{ bike.description }}</td>
                <td class="border border-black text-left p-2"><img class="w-20" :src="`/storage/${bike.image}`" :alt="bike.name"></td>
                <td>
                    <div class="flex gap-2">
                        <Link :href="route('bike.show',(bike.id))" class="text-green-500">Ver</Link>
                        <Link :href="route('bike.edit',(bike.id))" class="text-blue-500">Editar</Link>
                        <button @click="deleteBike(bike.id)" class="text-red-500">Eliminar</button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</template>

<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import {ref,defineProps} from 'vue';
import axios from 'axios';

const props = defineProps({
    bike : Array
});

const bike = ref(props.bike);

function deleteBike(id) {
  router.delete(route('bike.destroy', id), {
    onSuccess: () => {
      bike.value = bike.value.filter(bike => bike.id !== id);
    }
  });
}

function CreateBike(){
    router.visit('/bike/create')
}

</script>