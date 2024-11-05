<script setup>
defineProps({
    title: String
});
import FrontendLayout from '@/Layouts/FrontendLayout.vue';
import {Head} from '@inertiajs/vue3'
</script>

<template lang="">
     <FrontendLayout>
        <Head title="Contact Page"/>
        <h1>This is {{ title }}</h1>
     </FrontendLayout>
</template>

