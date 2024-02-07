<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link, useForm } from '@inertiajs/vue3';
import DangerButton from '@/Components/DangerButton.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Swal from 'Sweetalert2';



const props = defineProps({
    libros: { type: Object }
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
const rentarLibro = (id, name) => {
    const alerta = Swal.mixin({
        buttonStyling: true
    });

    console.log(id);
    alerta.fire({
        title: "Esta seguro que desea rentar un libro?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "si"
    }).then((result) => {
        if (result.isConfirmed) {
            axios.post('/api/libros/rentar/'+id)
                .then(response => {
                    console.log(response.data.message); 
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Your work has been saved",
                        showConfirmButton: false,
                        timer: 1500
                    });// Muestra el mensaje de éxito en la consola
                    // Realiza cualquier otra acción necesaria después de rentar el libro
                })
                .catch(error => {
                    console.error(error); // Muestra cualquier error en la consola
                    // Maneja cualquier error que ocurra durante la solicitud
                });
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
                    <Link :href="route('libros.create')"
                        :class="'px-4 py-2 bg-gray-800 text-white border rounded-md font-semibold text-xs'">
                    <i class="fa-solid fa-plus-circle"></i>
                    Añadir Nuevo Libro
                    </Link>
                </div>
            </div>

            <div class="bg-white grid v-screen place-items-center">
                <table class="table-auto border border-gray-400">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-4">Id</th>
                            <th class="px-4 py-4">Nombre</th>
                            <th class="px-4 py-4">Author</th>
                            <th class="px-4 py-4">Fecha de publicacion</th>
                            <th class="px-4 py-4">editar</th>
                            <th class="px-4 py-4">eliminar</th>
                            <th class="px-4 py-4">Rentar Libro</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="cat, i in libros" :key="cat.id">
                            <td class="border border-gray-400 px-4 py-4">{{ i + 1 }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ cat.title }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ cat.author }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ cat.publication_year }}</td>
                            <td class="border border-gray-400 px-4 py-4">
                                <Link :href="route('categorias.edit', cat)"
                                    :class="'px-4 py-2 bg-yellow-400 text-white border rounded-md font-semibold text-xs'">
                                <i class="fa-solid fa-edit"></i>
                                </Link>

                            </td>
                            <td class="border border-gray-400 px-4 py-4">
                                <DangerButton @click="deleteCategoria(cat.id, cat.title)">
                                    <i class="fa-solid fa-trash"></i>
                                </DangerButton>

                            </td>
                            <td class="border border-gray-400 px-4 py-4">
                                <PrimaryButton @click="rentarLibro(cat.id)">
                                    <i class="fa-solid fa-check"></i>
                                </PrimaryButton>

                            </td>
                        </tr>
                    </tbody>

                </table>

            </div>

        </div>
    </AuthenticatedLayout>
</template>


