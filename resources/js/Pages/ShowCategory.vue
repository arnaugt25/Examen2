<template>
<div class="bg-gray-300 text-center text-black">
        Category:
        <div>
            <table class="w-full border">
                <tr>
                    <th class="p-2 text-left">ID</th>
                    <th class="p-2 text-left">name</th>
                </tr>
                
                    <tr class="border-t">
                        <td class="p-2 text-left">{{ category.id }}</td>
                        <td class="p-2 text-left">{{ category.name }}</td>
                        <td class="p-2 text-left">
                            <!-- <div class="flex gap-2">
                                <Link :href="route()" class="text-blue-500">Ver</Link>
                                <Link :href="route()" class="text-yellow-500">Editar</Link>
                                <button @click="" class="text-red-500">Eliminar</button>
                            </div> -->
                        </td>
                    </tr>
                    <tr >
                        <td colspan="7" class="p-2 text-center"></td>
                    </tr>      
            </table>
        </div>
    </div>
</template>

<script setup>
import { Head, Link, router } from '@inertiajs/vue3';

const props = defineProps({
    category: Array,
});

</script>