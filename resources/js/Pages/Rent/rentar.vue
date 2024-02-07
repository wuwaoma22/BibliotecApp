
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    title: '',
    author: '',
    publication_year: '',
    category_id: ''
});

const props = defineProps({
    categorias: { type: Object }
});


axios.post('/api/libros/rentar', { libro_id: libroId })
    .then(response => {
        console.log(response.data.message); // Muestra el mensaje de éxito en la consola
        // Realiza cualquier otra acción necesaria después de rentar el libro
    })
    .catch(error => {
        console.error(error); // Muestra cualquier error en la consola
        // Maneja cualquier error que ocurra durante la solicitud
    });

</script>

<template>

    <AuthenticatedLayout>


        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <form @submit.prevent="$event => form.post(route('libros.store'))">
                    <div>
                        <InputLabel for="title" value="title" />
                        <TextInput id="title" type="text" class="mt-1 block w-full" v-model="form.title" required autofocus
                            autocomplete="title" />
                        <InputError class="mt-2" :message="form.errors.title" />
                    </div>

                    <div>
                        <InputLabel for="author" value="author" />
                        <TextInput id="author" type="text" class="mt-1 block w-full" v-model="form.author" required
                            autofocus autocomplete="author" />
                        <InputError class="mt-2" :message="form.errors.author" />
                    </div>

                    <div>
                        <InputLabel for="publication_year" value="publication_year" />
                        <TextInput id="publication_year" type="date" class="mt-1 block w-full"
                            v-model="form.publication_year" required autofocus autocomplete="publication_year" />
                        <InputError class="mt-2" :message="form.errors.publication_year" />
                    </div>

                    <div>
                        <select v-model="form.category_id"
                        class="block mt-1 w-full rounded-md form-input focus:border-indigo-600" :value="modelValue"
                        @change="$event => $emit('update:modelValue', $event.target.value)" ref="input">
                        <option value=""> Seleccionar Categoria</option>
                        <option v-for="op in categorias" :key="op.i" :value="op.id">
                            {{ op.name }}
                        </option>
                    </select>
                    </div>

                    <PrimaryButton :disabled="form.processing">
                        <i class="fa-solid fa-save"></i>Guardar

                    </PrimaryButton>

                </form>
            </div>
        </div>
    </AuthenticatedLayout></template>



