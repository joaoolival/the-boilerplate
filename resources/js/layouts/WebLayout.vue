<script setup lang="ts">
import LandingFooter from '@/components/LandingFooter.vue';
import LandingNav from '@/components/LandingNav.vue';
import SeoHead from '@/components/SeoHead.vue';

withDefaults(
    defineProps<{
        solid?: boolean;
        laravelVersion?: string;
        phpVersion?: string;
    }>(),
    {
        solid: false,
    },
);
</script>

<template>
    <SeoHead />
    <div class="flex min-h-screen flex-col bg-white [color-scheme:light]">
        <LandingNav :solid="solid" />
        <main class="flex-1 pt-16">
            <slot />
        </main>
        <LandingFooter
            :laravel-version="laravelVersion"
            :php-version="phpVersion"
        />
    </div>
</template>
