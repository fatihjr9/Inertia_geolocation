<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';

defineProps({
    data: {
        type: Array,
            default: () => [],
    },
})
const form = useForm({});
const delKriteria = (peternakan) => {
    form.delete(`/admin/kriteria/${peternakan}`);
}
</script>

<template>
    <AppLayout title="Kriteria">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Data Kriteria
            </h2>
        </template>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
            <div class="relative overflow-x-auto">
                <h5 class="font-bold text-xl mb-4">Hasil Klustering</h5>
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
                                Cluster 1
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Cluster 2
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Cluster 3
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(p, index) in data" :key="p.id" class="bg-white border-b">
                            <td class="px-6 py-4">
                                {{ index + 1 }}
                            </td>
                            <td class="px-6 py-4">
                                {{ p.kelurahan }}
                            </td>
                            <td class="px-6 py-4"> 
                                {{ p.c1 }}
                            </td>
                            <td class="px-6 py-4">
                                {{ p.c2 }}
                            </td>
                            <td class="px-6 py-4">
                                {{ p.c3 }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-row items-center gap-x-4">
                                    <button>Edit</button>
                                    <button @click="delKriteria(p.id)">Delete</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>