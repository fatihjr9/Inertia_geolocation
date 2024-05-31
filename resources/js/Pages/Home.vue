<script setup>
import ClientLayout from '@/Layouts/ClientLayout.vue';
import Map from '@/Components/Map.vue';
defineProps({
    data: {
        type: Array,
            default: () => [],
    },
})
</script>

<template>
    <ClientLayout>
        <div class="rounded-xl ring-1 ring-slate-200 shadow-md hover:shadow-lg hover:duration-300 hover:transition-all">  
            <Map :wilayah="data"/>
        </div>
    </ClientLayout>
</template>