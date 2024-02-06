
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    description: ''
});

</script>

<template>
    <Head title="Crear Categoria" />

    <AuthenticatedLayout>
        <template #header>
            Crear Categoria
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <form @submit.prevent="$event => form.post(route('categorias.store'))">
            <div>
                <InputLabel for="name" value="Name" />
                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div>
                <InputLabel for="description" value="Description" />
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

