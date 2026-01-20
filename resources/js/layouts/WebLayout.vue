<script setup lang="ts">
import LandingNav from '@/Components/LandingNav.vue';
import SeoHead from '@/Components/SeoHead.vue';

withDefaults(
    defineProps<{
        solid?: boolean;
    }>(),
    {
        solid: false,
    },
);
</script>

<template>
    <SeoHead />
    <div class="min-h-screen bg-white [color-scheme:light]">
        <LandingNav :solid="solid" />
        <slot />
    </div>
</template>
