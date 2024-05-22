<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({
    wilayah: {
        type: Number,
            default: () => [],
    },
    c1: {
        type: Number,
            default: () => [],
    },
    c2: {
        type: Number,
        default: 0,
    },
    c3: {
        type: Number,
        default: 0,
    },
})

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="p-4 bg-white shadow-md rounded-md">
                        <h5 class="text-2xl font-bold">{{ wilayah }}</h5>
                        <p class="text-gray-400">Jumlah Wilayah</p>
                    </div>
                    <div class="p-4 bg-white shadow-md rounded-md">
                        <h5 class="text-2xl font-bold">{{ c1 }}</h5>
                        <p class="text-gray-400">Jumlah Wilayah Cluster 1</p>
                    </div>
                    <div class="p-4 bg-white shadow-md rounded-md">
                        <h5 class="text-2xl font-bold">{{ c2 }}</h5>
                        <p class="text-gray-400">Jumlah Wilayah Cluster 2</p>
                    </div>
                    <div class="p-4 bg-white shadow-md rounded-md">
                        <h5 class="text-2xl font-bold">{{ c3 }}</h5>
                        <p class="text-gray-400">Jumlah Wilayah Cluster 3</p>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
