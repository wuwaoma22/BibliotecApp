
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
    tipos: { type: Object },
    libros: { type: Object },
    localidades: { type: Object },
    disponibilidad: { type: Object }
});

console.log(props.libros)

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


                    <select v-model="form.libro_id" class="block mt-1 w-full rounded-md form-input focus:border-indigo-600" :value="modelValue"
                        @change="$event => $emit('update:modelValue', $event.target.value)" ref="input">
                        <option value=""> Seleccionar Libro</option>
                        <option v-for="op in libros" :key="op.i" :value="op.id">
                            {{ op.title }}
                        </option>
                    </select>

                    <select v-model="form.tipo_id" class="block mt-1 w-full rounded-md form-input focus:border-indigo-600" :value="modelValue"
                        @change="$event => $emit('update:modelValue', $event.target.value)" ref="input">
                        <option value=""> Seleccionar Tipo de Libro</option>
                        <option v-for="op in tipos" :key="op.i" :value="op.id">
                            {{ op.name }}
                        </option>
                    </select>
                    <select v-model="form.localidad_id" class="block mt-1 w-full rounded-md form-input focus:border-indigo-600" :value="modelValue"
                        @change="$event => $emit('update:modelValue', $event.target.value)" ref="input">
                        <option value=""> Seleccionar Localidad</option>
                        <option v-for="op in localidades" :key="op.i" :value="op.id">
                            
                            {{ op.name }}
                        </option>
                    </select>
                    <select v-model="form.disponibilidad_id" class="block mt-1 w-full rounded-md form-input focus:border-indigo-600" :value="modelValue"
                        @change="$event => $emit('update:modelValue', $event.target.value)" ref="input">
                        <option value=""> Seleccionar disponibilidad</option>
                        <option v-for="op in disponibilidad" :key="op.i" :value="op.id">
                            {{ op.name }}
                        </option>
                    </select>

                    <!--  <div>
                        <InputLabel>disponibilidad</InputLabel>
                        <select name="disponibilidad_id" class="mt-1 block w-3/4">
                            <option v-for="(item, key) in disponibilidad" :value="item.id">
                                {{ item.name }}
                            </option>
                        </select>
                    </div>

                    <div>
                        <InputLabel>disponibilidad</InputLabel>
                        <select name="disponibilidad_id" class="mt-1 block w-3/4">
                            <option v-for="(item, key) in disponibilidad" :value="item.id">
                                {{ item.name }}
                            </option>
                        </select>
                    </div>

                    <div>
                        <InputLabel>tipos</InputLabel>
                        <select for="tipo_id" name="tipo_id" class="mt-1 block w-3/4">
                            <option v-for="(item, key) in tipos" :value="item.id">
                                {{ item.name }}
                            </option>
                        </select>
                    </div>
                    <div>
                        <InputLabel>Localidad</InputLabel>
                        <select name="localidad_id" class="mt-1 block w-3/4">
                            <option v-for="(item, key) in localidades" :value="item.id">
                                {{ item.name }}
                            </option>
                        </select>
                    </div> -->

                    <PrimaryButton :disabled="form.processing">
                        <i class="fa-solid fa-save"></i>Guardar

                    </PrimaryButton>

                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

