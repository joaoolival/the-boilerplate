<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ArrowUpRight, FolderOpen } from 'lucide-vue-next';

import type { Category } from '@/types/models';

defineProps<{
    category: Category;
}>();
</script>

<template>
    <article
        class="group flex h-full flex-col overflow-hidden rounded-2xl bg-white shadow-md transition-all duration-300 hover:-translate-y-1 hover:shadow-xl"
    >
        <Link :href="`/blog/category/${category.slug}`" class="relative block">
            <!-- Banner Image -->
            <div class="aspect-video overflow-hidden bg-slate-100">
                <img
                    v-if="category.banner_image"
                    :src="category.banner_image.url"
                    :srcset="category.banner_image.srcset"
                    :alt="category.name"
                    sizes="(max-width: 640px) 100vw, (max-width: 1024px) 50vw, 33vw"
                    width="400"
                    height="225"
                    class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                    loading="lazy"
                    decoding="async"
                />
                <div
                    v-else
                    class="flex h-full w-full items-center justify-center bg-gradient-to-br from-slate-100 to-slate-200"
                >
                    <FolderOpen class="h-12 w-12 text-slate-300" />
                </div>
            </div>

            <!-- Floating Arrow -->
            <div
                class="absolute right-4 bottom-4 flex h-10 w-10 items-center justify-center rounded-full bg-white/90 opacity-0 shadow-lg backdrop-blur-sm transition-all duration-300 group-hover:scale-110 group-hover:opacity-100"
            >
                <ArrowUpRight class="h-5 w-5 text-slate-600" />
            </div>
        </Link>

        <div class="flex flex-1 flex-col p-5">
            <!-- Name -->
            <Link :href="`/blog/category/${category.slug}`">
                <h2
                    class="mb-2 text-lg font-bold text-slate-900 transition-colors duration-500 group-hover:text-slate-700"
                >
                    {{ category.name }}
                </h2>
            </Link>

            <!-- Description -->
            <p
                v-if="category.description"
                class="mb-4 line-clamp-2 text-sm font-light text-slate-500"
            >
                {{ category.description }}
            </p>

            <!-- Posts Count - Always at bottom -->
            <!-- Posts Count Removed as requested -->
        </div>
    </article>
</template>
