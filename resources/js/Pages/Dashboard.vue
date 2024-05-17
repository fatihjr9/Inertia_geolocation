<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
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
                    <div class="p-2 bg-white shadow-md rounded-md"></div>
                    <div class="p-2 bg-white shadow-md rounded-md"></div>
                    <div class="p-2 bg-white shadow-md rounded-md"></div>
                    <div class="p-2 bg-white shadow-md rounded-md"></div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
