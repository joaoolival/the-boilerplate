<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import {
    ArrowUpRight,
    BookOpen,
    Calendar,
    Clock,
    Sparkles,
} from 'lucide-vue-next';

import type { Post } from '@/types/models';

withDefaults(
    defineProps<{
        post: Post;
    }>(),
    {},
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
        class="group relative block overflow-hidden rounded-2xl bg-white shadow-lg transition-all duration-300 hover:-translate-y-1 hover:shadow-xl"
    >
        <div class="grid md:grid-cols-2">
            <!-- Image -->
            <div
                class="relative aspect-[4/3] overflow-hidden bg-slate-100 md:aspect-auto md:h-full"
            >
                <img
                    v-if="post.banner_image"
                    :src="post.banner_image.url"
                    :srcset="post.banner_image.srcset"
                    :alt="post.title"
                    sizes="(max-width: 768px) 100vw, 50vw"
                    class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                    loading="eager"
                />
                <div
                    v-else
                    class="flex h-full min-h-[240px] w-full items-center justify-center bg-gradient-to-br from-slate-100 to-slate-200"
                >
                    <BookOpen class="h-16 w-16 text-slate-400" />
                </div>
                <!-- Featured Badge -->
                <div class="absolute top-4 left-4">
                    <span
                        class="inline-flex items-center gap-1.5 rounded-full bg-black px-3 py-1 text-xs font-semibold text-white shadow-lg"
                    >
                        <Sparkles class="h-3 w-3" />
                        Featured
                    </span>
                </div>

                <!-- Floating Read Button on Image -->
                <div
                    class="absolute right-4 bottom-4 flex h-10 w-10 items-center justify-center rounded-full bg-white/90 opacity-0 shadow-lg backdrop-blur-sm transition-all duration-300 group-hover:scale-110 group-hover:opacity-100"
                >
                    <ArrowUpRight class="h-5 w-5 text-slate-600" />
                </div>
            </div>

            <!-- Content -->
            <div class="flex flex-col justify-center p-6 md:p-8">
                <!-- Meta -->
                <div
                    class="mb-3 flex flex-wrap items-center gap-3 text-xs text-slate-500"
                >
                    <span
                        v-if="post.category"
                        class="rounded-full bg-slate-100 px-2.5 py-1 font-medium text-slate-700 transition-colors hover:bg-slate-200"
                    >
                        {{ post.category.name }}
                    </span>
                    <span
                        v-if="post.published_at"
                        class="flex items-center gap-1"
                    >
                        <Calendar class="h-3.5 w-3.5" />
                        {{ formatDate(post.published_at) }}
                    </span>
                    <span class="flex items-center gap-1">
                        <Clock class="h-3.5 w-3.5" />
                        {{ readingTime(post.content) }}
                    </span>
                </div>

                <!-- Title -->
                <h2
                    class="mb-2 text-xl font-bold text-slate-900 transition-colors duration-500 group-hover:text-slate-700 sm:text-2xl"
                >
                    <Link :href="`/blog/${post.slug}`">
                        <span
                            class="absolute inset-0"
                            aria-hidden="true"
                        ></span>
                        {{ post.title }}
                    </Link>
                </h2>

                <!-- Excerpt -->
                <p
                    v-if="post.excerpt"
                    class="mb-4 line-clamp-2 text-sm font-light text-slate-500"
                >
                    {{ post.excerpt }}
                </p>

                <!-- Author & CTA -->
                <div class="mt-auto flex items-center justify-between">
                    <Link
                        v-if="post.author"
                        :href="`/blog/author/${post.author.slug}`"
                        class="group/author relative z-10 flex items-center gap-2.5"
                    >
                        <div
                            v-if="post.author.avatar"
                            class="h-8 w-8 overflow-hidden rounded-full ring-2 ring-white transition-transform group-hover/author:scale-105"
                        >
                            <img
                                :src="post.author.avatar.url"
                                :alt="post.author.name"
                                class="h-full w-full object-cover"
                            />
                        </div>
                        <div
                            v-else
                            class="flex h-8 w-8 items-center justify-center rounded-full bg-slate-200 text-xs font-bold text-slate-600 transition-transform group-hover/author:scale-105"
                        >
                            {{ post.author.name?.charAt(0).toUpperCase() }}
                        </div>
                        <span
                            class="text-sm font-medium text-slate-700 transition-colors group-hover/author:text-slate-900"
                            >{{ post.author.name }}</span
                        >
                    </Link>
                </div>
            </div>
        </div>
    </article>
</template>
