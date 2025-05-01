<script setup>
import { router } from '@inertiajs/vue3';
function WeightList(){
    router.visit('/weight')
}

</script>

<template>
    <div class="text-center">
        <h1 class="text-xl p-4">Ver lista de Pesas</h1>
        <button @click="WeightList" class="bg-green-500  py-2 px-4 rounded">Ir</button>
    </div>
</template>