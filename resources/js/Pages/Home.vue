<script setup>
import ClientLayout from '@/Layouts/ClientLayout.vue';
import Map from '@/Components/Map.vue';
</script>

<template>
    <ClientLayout>
        <div class="rounded-xl ring-1 ring-slate-200 shadow-md hover:shadow-lg hover:duration-300 hover:transition-all">  
            <Map/>
        </div>
        <div class="grid grid-cols-1 gap-4 mt-10">
            <h5 class="text-3xl bold">Ternak Sapi di Boyolali</h5>
        </div>
    </ClientLayout>
</template>