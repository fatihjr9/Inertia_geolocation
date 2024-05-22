<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    prod_susu:"",
    prod_sapi:"",
    lahan:"",
    pemilik:"",
})

defineProps({
    ternak: {
        type: Object,
        default: () => ({}),
    },
})

const submit = (id) => {
    form.put(`/admin/edit-peternakan/${id}`, form.data());
};
</script>

<template>
    <AppLayout title="Edit Peternakan">
        <template #header>
            <div class="flex flex-row items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Peternakan</h2>
                <Link :href="route('ternak-index')">Kembali</Link>
            </div>
        </template>
        
        <div class="w-8/12 mx-auto sm:px-6 lg:px-8 mt-6">
            <form @submit.prevent="submit(ternak.id)" class="p-4 bg-white rounded-lg shadow-md">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mb-4">
                    <div class="flex flex-col space-y-1">
                        <p>Produksi susu</p>
                        <input type="text" v-model="form.prod_susu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                    </div>
                    <div class="flex flex-col space-y-1">
                        <p>Produksi sapi betina</p>
                        <input type="text" v-model="form.prod_sapi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                    </div>
                    <div class="flex flex-col space-y-1">
                        <p>Pemilik</p>
                        <input type="text" v-model="form.pemilik" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                    </div>
                    <div class="flex flex-col space-y-1">
                        <p>Luas Lahan</p>
                        <input type="text" v-model="form.lahan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                    </div>
                </div>
                <button type="submit" class="w-full bg-green-500 text-green-100 py-2 rounded-lg">Simpan</button>
            </form>
        </div>
    </AppLayout>
</template>