<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link, useForm } from '@inertiajs/vue3';
import DangerButton from '@/Components/DangerButton.vue';
import Swal from 'Sweetalert2';

const props = defineProps({
    categorias: { type: Object }
});

const form = useForm({
    id: ''
});

const deleteCategoria = (id, name) => {
    const alerta = Swal.mixin({
        buttonStyling: true
    });
    alerta.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            form.delete(route('categorias.destroy', id));
        }
    });


}

</script>



<template>
    <Head title="Categorias" />

    <AuthenticatedLayout>
        <template #header>
            Categorias
        </template>

        <div class="py-12">
            <div class="bg-white grid v-scree place-items-center">
                <div class="mt-3 mb-3 flex">
                    <Link :href="route('categorias.create')"
                        :class="'px-4 py-2 bg-gray-800 text-white border rounded-md font-semibold text-xs'">
                    <i class="fa-solid fa-plus-circle"></i>
                    Añadir Nueva Categoria
                    </Link>
                </div>
            </div>

            <div class="bg-white grid v-screen place-items-center">
                <table class="table-auto border border-gray-400">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-4">Id</th>
                            <th class="px-4 py-4">Nombre</th>
                            <th class="px-4 py-4">Descripción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="cat, i in categorias" :key="cat.id">
                            <td class="border border-gray-400 px-4 py-4">{{ i + 1 }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ cat.name }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ cat.description }}</td>
                            <td class="border border-gray-400 px-4 py-4">
                                <Link :href="route('categorias.edit', cat)"
                                    :class="'px-4 py-2 bg-yellow-400 text-white border rounded-md font-semibold text-xs'">
                                <i class="fa-solid fa-edit"></i>
                                </Link>

                            </td>
                            <td class="border border-gray-400 px-4 py-4">
                                <DangerButton @click="deleteCategoria(cat.id, cat.name)">
                                    <i class="fa-solid fa-trash"></i>
                                </DangerButton>

                            </td>
                        </tr>
                    </tbody>

                </table>

            </div>

        </div>
    </AuthenticatedLayout>
</template>


