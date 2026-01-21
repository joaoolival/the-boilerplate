<script setup lang="ts">
withDefaults(
    defineProps<{
        size?: 'sm' | 'md' | 'lg';
        showText?: boolean;
    }>(),
    {
        size: 'md',
        showText: true,
    },
);

const sizeClasses = {
    sm: 'h-8',
    md: 'h-10 sm:h-12',
    lg: 'h-14',
};
</script>

<template>
    <div class="flex items-center gap-2">
        <img
            src="/images/logo_bg_dark.svg"
            alt="The Boilerplate"
            :class="sizeClasses[size]"
            class="w-auto"
        />
        <span
            v-if="showText"
            class="truncate text-sm leading-tight font-semibold"
        >
            The Boilerplate
        </span>
    </div>
</template>
