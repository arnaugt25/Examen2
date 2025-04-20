<template>
    <div class="bg-gray-300 text-center text-black">
            Category:
            <div>
                <table class="w-full border">
                    <tr>
                        <th class="p-2 text-left">ID</th>
                        <th class="p-2 text-left">name</th>
                        <th class="p-2 text-left">description</th>
                        <th class="p-2 text-left">category_id</th>
                        <th class="p-2 text-left">image</th>
                    </tr>
                    
                        <tr class="border-t">
                            <td class="p-2 text-left">{{ sport.id }}</td>
                            <td class="p-2 text-left">{{ sport.name }}</td>
                            <td class="p-2 text-left">{{ sport.description }}</td>
                            <td class="p-2 text-left">{{ sport.category.name }}</td>
                            <td class="p-2 text-left"><img class="w-20" :src="`/storage/${sport.image}`" :alt="sport.name"></td>

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
        sport: Object,
    });
    
    </script>