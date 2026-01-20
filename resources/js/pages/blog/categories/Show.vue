<script setup lang="ts">
import BlogPostCard from '@/Components/blog/BlogPostCard.vue';
import Pagination from '@/Components/Pagination.vue';
import WebLayout from '@/Layouts/WebLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { Inbox } from 'lucide-vue-next';
import { computed } from 'vue';

import type { Category, Post } from '@/types/models';
import type { PaginatedCollection } from '@/types/pagination';

const props = defineProps<{
    category: Category | { data: Category };
    posts: PaginatedCollection<Post>;
}>();

// Normalize category access - handle both wrapped and unwrapped resource formats
const categoryData = computed<Category>(() => {
    return 'data' in props.category ? props.category.data : props.category;
});
</script>

<template>
    <WebLayout solid>
        <Head
            :title="`${categoryData.seo_title || categoryData.name} - Categorias | Boilerplate`"
        >
            <!-- General SEO -->
            <meta
                name="description"
                :content="
                    categoryData.seo_description ||
                    categoryData.description ||
                    ''
                "
                head-key="description"
            />

            <!-- Schema.org -->
            <meta
                itemprop="name"
                :content="categoryData.seo_title || categoryData.name"
                head-key="schema:name"
            />
            <meta
                itemprop="description"
                :content="
                    categoryData.seo_description ||
                    categoryData.description ||
                    ''
                "
                head-key="schema:description"
            />
            <meta
                v-if="categoryData.banner_image"
                itemprop="image"
                :content="categoryData.banner_image.url"
                head-key="schema:image"
            />

            <!-- Open Graph -->
            <meta property="og:type" content="website" head-key="og:type" />
            <meta
                property="og:title"
                :content="categoryData.seo_title || categoryData.name"
                head-key="og:title"
            />
            <meta
                property="og:description"
                :content="
                    categoryData.seo_description ||
                    categoryData.description ||
                    ''
                "
                head-key="og:description"
            />
            <meta
                v-if="categoryData.banner_image"
                property="og:image"
                :content="categoryData.banner_image.url"
                head-key="og:image"
            />
            <meta
                property="og:url"
                :content="`https://boilerplate.com/blog/category/${categoryData.slug}`"
                head-key="og:url"
            />
            <meta
                property="og:site_name"
                content="Boilerplate"
                head-key="og:site_name"
            />
            <meta property="og:locale" content="pt_PT" head-key="og:locale" />

            <!-- Twitter -->
            <meta
                name="twitter:card"
                content="summary_large_image"
                head-key="twitter:card"
            />
            <meta
                name="twitter:title"
                :content="categoryData.seo_title || categoryData.name"
                head-key="twitter:title"
            />
            <meta
                name="twitter:description"
                :content="
                    categoryData.seo_description ||
                    categoryData.description ||
                    ''
                "
                head-key="twitter:description"
            />
            <meta
                v-if="categoryData.banner_image"
                name="twitter:image"
                :content="categoryData.banner_image.url"
                head-key="twitter:image"
            />
        </Head>

        <!-- Hero Section with Category Banner -->
        <section class="relative overflow-hidden pt-28 pb-8">
            <!-- Background Image -->
            <div
                v-if="categoryData.banner_image"
                class="absolute inset-0 -z-10"
            >
                <img
                    :src="categoryData.banner_image.url"
                    :srcset="categoryData.banner_image.srcset"
                    :alt="categoryData.name"
                    class="h-full w-full object-cover opacity-15"
                />
                <div
                    class="absolute inset-0 bg-gradient-to-b from-white/90 to-white"
                />
            </div>
            <div
                v-else
                class="pointer-events-none absolute inset-0 -z-10 overflow-hidden"
            >
                <div
                    class="absolute -top-24 -left-24 h-80 w-80 rounded-full bg-slate-400/15 blur-3xl"
                />
                <div
                    class="absolute top-1/2 -right-24 h-64 w-64 rounded-full bg-slate-400/10 blur-3xl"
                />
            </div>

            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-2xl text-center">
                    <!-- Breadcrumb -->
                    <nav
                        class="mb-6 flex items-center justify-center gap-2 text-sm"
                    >
                        <Link
                            href="/blog"
                            class="text-slate-500 transition-colors hover:text-slate-900"
                            >Artigos</Link
                        >
                        <span class="text-slate-300">/</span>
                        <Link
                            href="/blog/categories"
                            class="text-slate-500 transition-colors hover:text-slate-900"
                            >Categorias</Link
                        >
                        <span class="text-slate-300">/</span>
                        <span class="font-medium text-slate-900">{{
                            categoryData.name
                        }}</span>
                    </nav>

                    <!-- Category Name -->
                    <h1
                        class="mb-3 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl"
                    >
                        {{ categoryData.name }}
                    </h1>

                    <!-- Description (compact) -->
                    <p
                        v-if="categoryData.description"
                        class="mx-auto max-w-lg text-slate-600"
                    >
                        {{ categoryData.description }}
                    </p>
                </div>
            </div>
        </section>

        <!-- Posts Grid -->
        <section class="pb-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div
                    v-if="posts.data.length > 0"
                    class="grid gap-8 md:grid-cols-2 lg:grid-cols-3"
                >
                    <BlogPostCard
                        v-for="post in posts.data"
                        :key="post.id"
                        :post="post"
                    />
                </div>

                <!-- Empty State -->
                <div
                    v-else
                    class="flex flex-col items-center justify-center rounded-2xl border-2 border-dashed border-slate-200 py-20"
                >
                    <div
                        class="mb-4 flex h-24 w-24 items-center justify-center rounded-full bg-slate-50 ring-1 ring-slate-200"
                    >
                        <Inbox class="h-12 w-12 text-slate-400" />
                    </div>
                    <h3 class="mb-2 text-xl font-semibold text-slate-900">
                        Ainda não há artigos
                    </h3>
                    <p class="mb-6 text-slate-600">
                        Ainda não há artigos publicados nesta categoria.
                    </p>
                    <Link
                        href="/blog"
                        class="rounded-lg bg-gradient-to-r from-slate-600 to-slate-700 px-6 py-3 text-sm font-medium text-white transition-all hover:from-slate-700 hover:to-slate-800"
                    >
                        Ver todos os artigos
                    </Link>
                </div>

                <!-- Pagination -->
                <Pagination :meta="posts.meta" />
            </div>
        </section>
    </WebLayout>
</template>
