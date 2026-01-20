<script setup lang="ts">
defineProps<{
    title: string;
    highlighted: string;
}>();
</script>

<template>
    <h1
        class="mb-4 text-4xl font-bold tracking-tight text-slate-900 sm:text-5xl lg:text-7xl"
    >
        {{ title }}
        <span class="relative whitespace-nowrap">
            <span class="text-slate-900">
                {{ highlighted }}
            </span>
            <svg
                class="absolute -bottom-2 left-0 h-3 w-full"
                viewBox="0 0 200 9"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M2.00025 7C52.7937 2.10373 151.714 -3.10276 197.689 4.35415"
                    stroke="url(#underline-gradient)"
                    stroke-width="3"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
                <defs>
                    <linearGradient
                        id="underline-gradient"
                        x1="0"
                        y1="0"
                        x2="200"
                        y2="0"
                        gradientUnits="userSpaceOnUse"
                    >
                        <stop stop-color="#0f172a" />
                        <stop offset="0.5" stop-color="#334155" />
                        <stop offset="1" stop-color="#64748b" />
                    </linearGradient>
                </defs>
            </svg>
        </span>
    </h1>
</template>
