<script setup lang="ts">
import BlogHeroTitle from '@/Components/blog/BlogHeroTitle.vue';
import CategoryCard from '@/Components/blog/CategoryCard.vue';
import Pagination from '@/Components/Pagination.vue';
import WebLayout from '@/Layouts/WebLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { Inbox } from 'lucide-vue-next';
import { computed } from 'vue';

import type { Category } from '@/types/models';
import type { PaginatedCollection } from '@/types/pagination';

const props = defineProps<{
    categories: Category[] | PaginatedCollection<Category>;
}>();

// Normalize to always get an array of categories
const categoriesList = computed<Category[]>(() => {
    return Array.isArray(props.categories)
        ? props.categories
        : props.categories.data;
});

// Check if we have pagination meta
const hasPagination = computed(() => {
    return (
        !Array.isArray(props.categories) &&
        'meta' in props.categories &&
        props.categories.meta.last_page > 1
    );
});

const paginationMeta = computed(() => {
    return !Array.isArray(props.categories) && 'meta' in props.categories
        ? props.categories.meta
        : null;
});
</script>

<template>
    <WebLayout solid>
        <Head>
            <title>Categorias | Boilerplate</title>
            <meta
                head-key="description"
                name="description"
                content="Explore as categorias dos nossos artigos do blog."
            />
        </Head>

        <div class="min-h-screen bg-white [color-scheme:light]">
            <!-- Hero Section -->
            <section class="relative overflow-hidden pt-32 pb-12">
                <!-- Decorative gradient orbs -->
                <div
                    class="pointer-events-none absolute inset-0 -z-10 overflow-hidden"
                >
                    <div
                        class="absolute -top-24 -left-24 h-96 w-96 rounded-full bg-slate-400/20 blur-3xl"
                    />
                    <div
                        class="absolute top-1/2 -right-24 h-72 w-72 rounded-full bg-emerald-400/10 blur-3xl"
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
                            <span class="font-medium text-slate-900"
                                >Categorias</span
                            >
                        </nav>

                        <!-- Title with gradient -->
                        <BlogHeroTitle
                            title="Explore as"
                            highlighted="Categorias"
                        />

                        <!-- Subtitle -->
                        <p
                            class="mx-auto max-w-lg text-lg font-light text-slate-600"
                        >
                            Artigos organizados por temas e áreas de interesse.
                        </p>
                    </div>
                </div>
            </section>

            <!-- Categories Grid -->
            <section class="pb-20">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div
                        v-if="categoriesList.length > 0"
                        class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3"
                    >
                        <CategoryCard
                            v-for="category in categoriesList"
                            :key="category.id"
                            :category="category"
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
                            Ainda não há categorias
                        </h3>
                        <p class="mb-6 text-slate-600">
                            As categorias aparecerão aqui em breve.
                        </p>
                        <Link
                            href="/blog"
                            class="rounded-lg bg-gradient-to-r from-slate-600 to-slate-700 px-6 py-3 text-sm font-medium text-white transition-all hover:from-slate-700 hover:to-slate-800"
                        >
                            Ver artigos
                        </Link>
                    </div>

                    <!-- Pagination (only if paginated) -->
                    <Pagination
                        v-if="hasPagination && paginationMeta"
                        :meta="paginationMeta"
                    />
                </div>
            </section>
        </div>
    </WebLayout>
</template>
