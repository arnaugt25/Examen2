<template>
    <div class="m-8">
        <h1>Eventos</h1>
        <table class="p-4">
            <tr>
                <th>Name:</th>
                <th>Description</th>
                <th>image</th>
                <th>Acciones</th>
            </tr>
            <tr v-for="event in events" :key="event.id">
                <td>{{ event.name }}</td>
                <td>{{ event.description}}</td>
                <td>
                    <img class="w-20" :src="`/storage/${event.image}`" :alt="event.name">                
                </td>

                <td>
                    <Link :href="route('events.show', event.id)" class="text-blue-500">Ver</Link>
                    <!-- Enlace para editar el producto -->
                    <Link :href="route('events.edit', event.id)" class="text-yellow-500">Editar</Link>
                    <!-- Botón para eliminar el producto -->
                    <button @click="eliminarEvento(event.id)" class="text-red-500">Eliminar</button>
                </td>
            </tr> 
        </table>
        
    </div>
</template>

<script setup>
import { Head, Link, router } from '@inertiajs/vue3';

const props = defineProps({
    events:Array,
});
// Función para eliminar un producto
function eliminarEvento(id) {
    router.delete(route('events.destroy', id));
}

console.log(props.events);
</script>