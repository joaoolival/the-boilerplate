<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ArrowUpRight } from 'lucide-vue-next';

import type { Author } from '@/types/models';

defineProps<{
    author: Author;
}>();
</script>

<template>
    <article
        class="group flex h-full flex-col overflow-hidden rounded-2xl bg-white shadow-md transition-all duration-300 hover:-translate-y-1 hover:shadow-xl"
    >
        <Link
            :href="`/blog/author/${author.slug}`"
            class="relative block p-6 text-center"
        >
            <!-- Avatar -->
            <div class="mb-4">
                <div
                    v-if="author.avatar"
                    class="mx-auto h-24 w-24 overflow-hidden rounded-full ring-4 ring-slate-100 transition-all group-hover:ring-slate-200"
                >
                    <img
                        :src="author.avatar.url"
                        :srcset="author.avatar.srcset"
                        :alt="`Photo of ${author.name}`"
                        sizes="96px"
                        width="96"
                        height="96"
                        class="h-full w-full object-cover"
                        loading="lazy"
                        decoding="async"
                    />
                </div>
                <div
                    v-else
                    class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-slate-800 text-3xl font-bold text-white ring-4 ring-slate-100 transition-all group-hover:ring-slate-200"
                >
                    {{ author.name.charAt(0).toUpperCase() }}
                </div>
            </div>

            <!-- Floating Arrow -->
            <div
                class="absolute top-4 right-4 flex h-10 w-10 items-center justify-center rounded-full bg-white/90 opacity-0 shadow-lg backdrop-blur-sm transition-all duration-300 group-hover:scale-110 group-hover:opacity-100"
            >
                <ArrowUpRight class="h-5 w-5 text-slate-600" />
            </div>
        </Link>

        <div class="flex flex-1 flex-col px-5 pb-5 text-center">
            <!-- Name -->
            <h2
                class="mb-1 text-xl font-bold text-slate-900 transition-colors duration-500 group-hover:text-slate-700"
            >
                {{ author.name }}
            </h2>

            <!-- Email -->
            <p class="mb-3 text-sm text-slate-500">{{ author.email }}</p>

            <!-- Bio -->
            <p
                v-if="author.bio"
                class="mb-4 line-clamp-2 text-sm font-light text-slate-500"
            >
                {{ author.bio }}
            </p>
        </div>
    </article>
</template>
