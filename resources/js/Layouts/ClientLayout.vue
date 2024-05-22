<script setup>
import { Head, Link } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
defineProps({
    canLogin: Boolean
});
</script>

<template>
    <Head title="Ternak Sapi Boyolali"/>
    <section>
        <div class="flex flex-row items-center justify-between py-4 border-b px-6 lg:px-20">
            <ApplicationMark class="block h-9 w-auto" />
            <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="text-indigo-500">Dashboard</Link>
            <Link v-else :href="route('login')" class="text-indigo-500 font-medium px-4 py-2 bg-indigo-50 rounded-lg">Masuk</Link>
        </div>
        <div class="px-6 lg:px-20 mt-8">
            <slot/>
        </div>
    </section>
</template>