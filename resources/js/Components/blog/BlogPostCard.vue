<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ArrowUpRight, Clock, FileText } from 'lucide-vue-next';

import type { Post } from '@/types/models';

withDefaults(
    defineProps<{
        post: Post;
        showAuthor?: boolean;
    }>(),
    {
        showAuthor: true,
    },
);

const formatDate = (dateString: string | null) => {
    if (!dateString) return null;
    return new Date(dateString).toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
    });
};

const readingTime = (content: string | null) => {
    if (!content) return '1 min';
    const words = content.replace(/<[^>]*>/g, '').split(/\s+/).length;
    const minutes = Math.ceil(words / 200);
    return `${minutes} min`;
};
</script>

<template>
    <article
        class="group flex h-full flex-col overflow-hidden rounded-2xl bg-white shadow-md transition-all duration-300 hover:-translate-y-1 hover:shadow-xl"
    >
        <Link :href="`/blog/${post.slug}`" class="relative block">
            <div class="aspect-video overflow-hidden bg-slate-100">
                <img
                    v-if="post.banner_image"
                    :src="post.banner_image.url"
                    :srcset="post.banner_image.srcset"
                    :alt="`Banner for ${post.title}`"
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
                    <FileText class="h-12 w-12 text-slate-300" />
                </div>
            </div>
            <!-- Floating Read Button on Image -->
            <div
                class="absolute right-4 bottom-4 flex h-10 w-10 items-center justify-center rounded-full bg-white/90 opacity-0 shadow-lg backdrop-blur-sm transition-all duration-300 group-hover:scale-110 group-hover:opacity-100"
            >
                <ArrowUpRight class="h-5 w-5 text-slate-600" />
            </div>
        </Link>

        <div class="flex flex-1 flex-col p-5">
            <!-- Meta: Category, Date, Reading Time -->
            <div class="mb-3 flex flex-wrap items-center gap-2 text-xs">
                <Link
                    v-if="post.category"
                    :href="`/blog/category/${post.category.slug}`"
                    class="rounded-full bg-slate-100 px-3 py-1 font-medium text-slate-700 transition-colors hover:bg-slate-200"
                    @click.stop
                >
                    {{ post.category.name }}
                </Link>
                <span
                    v-else
                    class="rounded-full bg-slate-100 px-3 py-1 font-medium text-slate-600"
                >
                    Uncategorized
                </span>
                <span v-if="post.published_at" class="text-slate-400">
                    {{ formatDate(post.published_at) }}
                </span>
                <span class="flex items-center gap-1 text-slate-400">
                    <Clock class="h-3 w-3" />
                    {{ readingTime(post.content) }}
                </span>
            </div>

            <!-- Title with Arrow on Hover -->
            <Link :href="`/blog/${post.slug}`" class="block">
                <h3
                    class="mb-2 flex items-start gap-2 text-lg font-bold text-slate-900 transition-colors duration-500 group-hover:text-slate-700"
                >
                    <span class="line-clamp-2">{{ post.title }}</span>
                </h3>
            </Link>

            <!-- Excerpt -->
            <p
                v-if="post.excerpt"
                class="mb-4 line-clamp-2 text-sm font-light text-slate-500"
            >
                {{ post.excerpt }}
            </p>

            <!-- Author - Always at bottom -->
            <Link
                v-if="showAuthor && post.author"
                :href="`/blog/author/${post.author.slug}`"
                class="group/author mt-auto flex items-center gap-3 pt-2"
            >
                <div
                    v-if="post.author.avatar"
                    class="h-8 w-8 overflow-hidden rounded-full transition-transform group-hover/author:scale-105"
                >
                    <img
                        :src="post.author.avatar.url"
                        :alt="post.author.name"
                        class="h-full w-full object-cover"
                    />
                </div>
                <div
                    v-else
                    class="flex h-8 w-8 items-center justify-center rounded-full bg-slate-200 text-sm font-semibold text-slate-600 transition-transform group-hover/author:scale-105"
                >
                    {{ post.author.name.charAt(0).toUpperCase() }}
                </div>
                <span
                    class="text-sm font-medium text-slate-700 transition-colors group-hover/author:text-slate-900"
                >
                    {{ post.author.name }}
                </span>
            </Link>
        </div>
    </article>
</template>
