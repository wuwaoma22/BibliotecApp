<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link, useForm } from '@inertiajs/vue3';
import DangerButton from '@/Components/DangerButton.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Swal from 'Sweetalert2';



axios.get('/api/libros', { params: { categoria_id: 3 } })
    .then(response => {
        console.log(response.data); // Muestra los libros en la consola
        // Realiza cualquier otra acción necesaria con los libros recibidos
    })
    .catch(error => {
        console.error(error); // Muestra cualquier error en la consola
        // Maneja cualquier error que ocurra durante la solicitud
    });

</script>



<template>
    <div class="py-12">

<div class="bg-white grid v-screen place-items-center">
    <table class="table-auto border border-gray-400">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-4">Id</th>
                <th class="px-4 py-4">Nombre</th>
                <th class="px-4 py-4">Author</th>
                <th class="px-4 py-4">Fecha de publicacion</th>
                

            </tr>
        </thead>
        <tbody>
            <tr v-for="cat, i in libros" :key="cat.id">
                <td class="border border-gray-400 px-4 py-4">{{ i + 1 }}</td>
                <td class="border border-gray-400 px-4 py-4">{{ cat.title }}</td>
                <td class="border border-gray-400 px-4 py-4">{{ cat.author }}</td>
                <td class="border border-gray-400 px-4 py-4">{{ cat.publication_year }}</td>
            </tr>
        </tbody>

    </table>

</div>

</div>
</template>


