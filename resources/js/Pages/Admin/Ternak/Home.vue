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
const delTernak = (peternakan) => {
    form.delete(`/admin/peternakan/${peternakan}`);
}

</script>

<template>
    <AppLayout title="Peternakan">
        <template #header>
            <div class="flex flex-row items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Data Peternakan</h2>
                <Link :href="route('ternak-create')">Tambah</Link>
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
                                Kelurahan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Produksi susu
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Betina Produksi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Pemilik
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Luas Lahan (H)
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(p, index) in data" ::key="p.id" class="bg-white border-b">
                            <td class="px-6 py-4">
                                {{ index + 1 }}
                            </td>
                            <td class="px-6 py-4">
                                {{ p.kelurahan }}
                            </td>
                            <td class="px-6 py-4">
                                {{ p.prod_susu }}
                            </td>
                            <td class="px-6 py-4">
                                {{ p.prod_sapi }}
                            </td>
                            <td class="px-6 py-4">
                                {{ p.pemilik }}
                            </td>
                            <td class="px-6 py-4">
                                {{ p.lahan }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-row items-center gap-x-4">
                                    <button>Edit</button>
                                    <button @click="delTernak(p.id)">Delete</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>