<script setup lang="ts">
import { Rocket, Sparkles } from 'lucide-vue-next';
import { computed, type Component } from 'vue';

const props = withDefaults(
    defineProps<{
        icon?: 'Sparkles' | 'Rocket';
        text?: string;
    }>(),
    {
        icon: 'Sparkles',
    },
);

const iconMap: Record<string, Component> = {
    Sparkles,
    Rocket,
};

const IconComponent = computed(() => {
    return iconMap[props.icon] || Sparkles;
});
</script>

<template>
    <div class="inline-flex w-fit items-center gap-2 rounded-full border border-gray-200 bg-gray-50 px-3 py-1">
        <component :is="IconComponent" :size="16" :fill="'currentColor'" class="text-primary-600 mt-0.5" />

        <span class="px-1 text-sm font-medium text-gray-700">{{ text || $slots.default?.()[0]?.children }}</span>
    </div>
</template>
