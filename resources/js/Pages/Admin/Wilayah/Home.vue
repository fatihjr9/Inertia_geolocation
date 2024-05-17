<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link, useForm } from '@inertiajs/vue3';

defineProps({
    data: {
        type: Array,
            default: () => [],
    },
})

const form = useForm({});
const delWilayah = (wilayah) => {
    form.delete(`/admin/wilayah/${wilayah}`);
}

</script>

<template>
    <AppLayout title="Wilayah">
        <template #header>
            <div class="flex flex-row items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Data Wilayah</h2>
                <Link :href="route('wilayah-create')">Tambah</Link>
            </div>
        </template>
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto mt-10">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Longitude
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kelurahan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="p in data" ::key="p.id" class="bg-white border-b">
                            <td class="px-6 py-4">
                                1
                            </td>
                            <td class="px-6 py-4">
                                {{ p.longitude }}
                            </td>
                            <td class="px-6 py-4">
                                {{ p.kelurahan }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-row items-center gap-x-4">
                                    <button>Edit</button>
                                    <button @click="delWilayah(p.id)">Delete</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>