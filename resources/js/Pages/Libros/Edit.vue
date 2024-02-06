
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, useForm } from '@inertiajs/vue3';


const props = defineProps({
    categorias: {type: Object}
});


const form = useForm({
    name: props.categorias.name,
    description: props.categorias.description
});


</script>

<template>
    <Head title="Editar Categoria" />

    <AuthenticatedLayout>
        <template #header>
            Editar Categoria
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <form @submit.prevent="$event => form.patch(route('categoria.update', categorias))">
            <div>
                <InputLabel for="name" value="Nombre de la Categoria" />
                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div>
                <InputLabel for="description" value="Descripcion" />
                <TextInput id="description" type="text" class="mt-1 block w-full" v-model="form.description" required autofocus autocomplete="description" />
                <InputError class="mt-2" :message="form.errors.description" />
            </div>

            <PrimaryButton :disabled="form.processing">
                <i class="fa-solid fa-save"></i>Guardar

            </PrimaryButton>

        </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

