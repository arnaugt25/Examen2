<template>
    <div class="bg-gray-300 text-center text-black">
            Libro:
            <div>
                <table class="w-full border">
                    <tr>
                        <th class="p-2 text-left">ID</th>
                        <th class="p-2 text-left">name</th>
                        <th class="p-2 text-left">description</th>
                    </tr>
                    
                        <tr class="border-t">
                            <td class="p-2 text-left">{{ libros.id }}</td>
                            <td class="p-2 text-left">{{ libros.name }}</td>
                            <td class="p-2 text-left">{{ libros.description }}</td>
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
        libros: Object,
    });
    
    </script>