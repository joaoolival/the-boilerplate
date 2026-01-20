<script setup lang="ts">
import { Head, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();

const props = withDefaults(
    defineProps<{
        title?: string;
        description?: string;
        image?: string;
        type?: string;
    }>(),
    {
        title: '',
        description: '',
        image: '',
        type: 'website',
    },
);

const appName = computed(() => (page.props as any).appName || 'Boilerplate');
const pageTitle = computed(() =>
    props.title ? `${props.title} | ${appName.value}` : appName.value,
);
const pageDescription = computed(
    () => props.description || 'Aplicação Laravel',
);
const pageImage = computed(() => props.image || '/images/og-image.jpg');
const currentUrl = computed(() => (page.props as any).ziggy?.url || '');
</script>

<template>
    <Head>
        <title>{{ pageTitle }}</title>
        <meta name="description" :content="pageDescription" />

        <!-- Open Graph -->
        <meta property="og:title" :content="pageTitle" />
        <meta property="og:description" :content="pageDescription" />
        <meta property="og:image" :content="pageImage" />
        <meta property="og:type" :content="type" />
        <meta property="og:url" :content="currentUrl" />

        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:title" :content="pageTitle" />
        <meta name="twitter:description" :content="pageDescription" />
        <meta name="twitter:image" :content="pageImage" />
    </Head>
</template>
