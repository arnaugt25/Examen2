<template>
    <div class="text-center p-8">
        <h1 class="text-3xl mb-4">Vista de la pesa de {{ weight.weight }}</h1>
    </div>
    <div class="px-48">
        <table class="w-full table-fixed border border-black">
            <thead class="bg-gray-400">
                <tr>
                    <th class="p-2 text-left border border-black">Id</th>
                    <th class="p-2 text-left border border-black">Peso</th>
                    <th class="p-2 text-left border border-black">Descripcion</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="p-1 text-left border border-black">{{ weight.id }}</td>
                    <td class="p-1 text-left border border-black">{{ weight.weight }}</td>
                    <td class="p-1 text-left border border-black">{{ weight.description }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    weight: Array,
});
</script>