
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import SelectInput from '@/Components/SelectInput.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import WarningButton from '@/Components/SecondaryButton.vue';
import Modal from '@/Components/Modal.vue';


const form = useForm({
    libro_id: '',
    localidad_id: '',
    tipo_id: '',
    disponibilidad_id: '',
});

const props = defineProps({
    tipos: {type: Object},
    libros: {type: Object},
    localidades: {type: Object},
    disponibilidad: {type: Object}
});

</script>

<template>
    <Head title="Crear Copia" />

    <AuthenticatedLayout>
        <template #header>
            Crear Copia
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <form @submit.prevent="$event => form.post(route('copias.store'))">

                    <div>
                       
                    </div>

                    <div>
                        <InputLabel for="name" value="Name" />
                        <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus
                            autocomplete="name" />
                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>

                    <div>
                        <InputLabel for="description" value="Description" />
                        <TextInput id="description" type="text" class="mt-1 block w-full" v-model="form.description"
                            required autofocus autocomplete="description" />
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

