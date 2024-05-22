<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    latitude:"",
    longitude:"",
})

defineProps({
    wilayah: {
        type: Object,
        default: () => ({}),
    },
})

const submit = (id) => {
    form.put(`/admin/edit-wilayah/${id}`, form.data());
};
</script>

<template>
    <AppLayout title="Tambah Wilayah">
        <template #header>
            <div class="flex flex-row items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Wilayah</h2>
                <Link :href="route('wilayah-index')">Kembali</Link>
            </div>
        </template>
        
        <div class="w-96 mx-auto sm:px-6 lg:px-8 mt-6">
            <form @submit.prevent="submit(wilayah.id)" class="p-4 bg-white rounded-lg shadow-md space-y-2">
                <div class="flex flex-col space-y-1">
                    <p>Latitude</p>
                    <input type="text" v-model="form.latitude" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <div class="flex flex-col space-y-1">
                    <p>Longitude</p>
                    <input type="text" v-model="form.longitude" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <button type="submit" class="w-full bg-green-500 text-green-100 py-2 rounded-lg">Tambahkan</button>
            </form>
        </div>
    </AppLayout>
</template>