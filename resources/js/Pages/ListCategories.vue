<template>
    <div class="bg-gray-300 text-center text-black">
        Deportes:
            <table class="w-full border">
                <tr>
                    <th class="p-2 text-left">ID</th>
                    <th class="p-2 text-left">Name</th>
                    <th class="p-2 text-left">Acciones</th>               
                </tr>
                    <tr class="border-t" v-for="category in categories" :key="category.id">
                        <td class="p-2 text-left "> {{ category.id }}</td>
                        <td class="p-2 text-left">{{ category.name }}</td>
                        
                        <td class="p-2 text-left">
                            <div class="flex gap-2">
                                <Link :href="route('categories.show', category.id)" class="text-blue-500">Ver</Link>
                                <Link :href="route('categories.edit', category.id)" class="text-yellow-500">Editar</Link>
                                <button @click="deleteCategory(category.id)" class="text-red-500">Eliminar</button>
                            </div>
                        </td>
                    </tr>
                    <tr >
                        <td colspan="7" class="p-2 text-center"></td>
                    </tr>          
            </table>
    </div>
</template>


<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import { defineProps } from 'vue';

const props = defineProps({
    categories: Array,
});

function deleteCategory(id){
    router.delete(route('categories.destroy', id));
}
</script>