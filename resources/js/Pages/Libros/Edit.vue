
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, useForm } from '@inertiajs/vue3';


const props = defineProps({
    libros: {type: Object},
    categorias: {type: Object},
});


const form = useForm({
    title: props.libros.title,
    author: props.libros.author,
    publication_year: props.libros.publication_year,
    category_id: props.libros.category_id
});


</script>

<template>
    <Head title="Editar Libro" />

    <AuthenticatedLayout>
        <template #header>
            Editar Libro
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <form @submit.prevent="$event => form.put(route('libros.update', libros))">
                    <div>
                        <InputLabel for="title" value="title" />
                        <TextInput id="title" type="text" class="mt-1 block w-full" v-model="form.title" required autofocus
                             />
                        <InputError class="mt-2" :message="form.errors.title" />
                    </div>

                    <div>
                        <InputLabel for="author" value="author" />
                        <TextInput id="author" type="text" class="mt-1 block w-full" v-model="form.author" required
                            autofocus  />
                        <InputError class="mt-2" :message="form.errors.author" />
                    </div>

                    <div>
                        <InputLabel for="publication_year" value="publication_year" />
                        <TextInput id="publication_year" type="date" class="mt-1 block w-full"
                            v-model="form.publication_year" required autofocus  />
                        <InputError class="mt-2" :message="form.errors.publication_year" />
                    </div>

                    <div>
                        <select v-model="form.category_id"
                        class="block mt-1 w-full rounded-md form-input focus:border-indigo-600" :value="form.category_id"
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
    </AuthenticatedLayout>
</template>

