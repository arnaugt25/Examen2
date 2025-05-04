<template>
    <div class="text-center text-2xl p-4">
        Bicicleta {{ tool.name }}
    </div>
    <div class="text-center pb-4">
        <button @click="ListBike" class="py-2 px-2 bg-blue-300 text-black rounded-lg border border-black">Volver</button>
    </div>
    <div class="px-48">
        <table class="w-full table-fixed border border-black">
            <tr class="bg-gray-400">
                <th class="text-left p-2 border border-black">Name</th>
                <th class="border border-black text-left p-2">Description</th>
            </tr>

            <tr>
                <td class="border border-black text-left p-2">{{ tool.name }}</td>
                <td class="border border-black text-left p-2">{{ tool.description }}</td>
            </tr>
        </table>
    </div>
</template>

<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import {ref,defineProps} from 'vue';
import axios from 'axios';

const props = defineProps({
    tool: Object
});

const tool = ref(props.tool);

function ListBike(){
    router.visit('/tool/')
}

</script>