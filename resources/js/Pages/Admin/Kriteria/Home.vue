<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
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
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4">
                                1
                            </td>
                            <td class="px-6 py-4">
                                Laptop
                            </td>
                            <td class="px-6 py-4">
                                $2999
                            </td>
                            <td class="px-6 py-4">
                                $2999
                            </td>
                            <td class="px-6 py-4">
                                $2999
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-row items-center gap-x-4">
                                    <button>Edit</button>
                                    <button>Delete</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>