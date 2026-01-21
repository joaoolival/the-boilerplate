<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { ArrowRight, Inbox } from 'lucide-vue-next';

import BlogHeroTitle from '@/components/blog/BlogHeroTitle.vue';
import BlogPostCard from '@/components/blog/BlogPostCard.vue';
import FeaturedPostCard from '@/components/blog/FeaturedPostCard.vue';
import Pagination from '@/components/Pagination.vue';
import SectionBadge from '@/components/SectionBadge.vue';
import WebLayout from '@/layouts/WebLayout.vue';
import type { PaginatedCollection } from '@/types/pagination';

import type { Post } from '@/types/models';

defineProps<{
    posts: PaginatedCollection<Post>;
}>();
</script>

<template>
    <WebLayout solid>
        <Head>
            <title>Articles | Boilerplate</title>
            <meta
                head-key="description"
                name="description"
                content="Articles and tips are shared on this blog."
            />
        </Head>

        <div class="min-h-screen bg-slate-50 [color-scheme:light]">
            <!-- Hero Section - Clean & Compact -->
            <section class="relative overflow-hidden pt-28 pb-12 lg:pt-32">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="text-center">
                        <!-- Badge -->
                        <div class="mb-5 flex justify-center">
                            <SectionBadge text="Articles" />
                        </div>

                        <!-- Title -->
                        <BlogHeroTitle
                            title="Latest news from the"
                            highlighted="blog"
                        />

                        <p
                            class="mx-auto max-w-xl text-base font-light text-slate-500 sm:text-lg"
                        >
                            Discover the articles in the blog.
                        </p>
                    </div>
                </div>
            </section>

            <!-- Main Content -->
            <section class="pb-20">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <!-- Featured Post - Compact Card -->
                    <div v-if="posts.data.length > 0" class="mb-12">
                        <FeaturedPostCard :post="posts.data[0]" />
                    </div>

                    <!-- Posts Grid -->
                    <div v-if="posts.data.length > 1">
                        <h2 class="mb-6 text-lg font-semibold text-slate-800">
                            More Articles
                        </h2>
                        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                            <BlogPostCard
                                v-for="post in posts.data.slice(1)"
                                :key="post.id"
                                :post="post"
                            />
                        </div>
                    </div>

                    <!-- Empty State -->
                    <div
                        v-if="posts.data.length === 0"
                        class="flex flex-col items-center justify-center rounded-2xl border-2 border-dashed border-slate-200 bg-white p-12 text-center"
                    >
                        <div
                            class="mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-slate-100"
                        >
                            <Inbox class="h-8 w-8 text-slate-500" />
                        </div>
                        <h3 class="mb-1 text-lg font-semibold text-slate-900">
                            No articles yet
                        </h3>
                        <p class="mb-5 text-sm text-slate-500">
                            We are preparing amazing content. Come back soon!
                        </p>
                        <Link
                            href="/"
                            class="inline-flex items-center gap-2 rounded-full bg-black px-5 py-2.5 text-sm font-semibold text-white shadow-md transition-all hover:bg-slate-800"
                        >
                            Back to home
                            <ArrowRight class="h-4 w-4" />
                        </Link>
                    </div>

                    <!-- Pagination -->
                    <Pagination :meta="posts.meta" />
                </div>
            </section>
        </div>
    </WebLayout>
</template>
