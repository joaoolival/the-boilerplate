<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { Inbox } from 'lucide-vue-next';
import { computed } from 'vue';
import {
    FacebookIcon,
    GitHubIcon,
    InstagramIcon,
    XIcon,
} from 'vue3-simple-icons';

import BlogPostCard from '@/Components/blog/BlogPostCard.vue';
import LinkedinIcon from '@/Components/icons/LinkedinIcon.vue';
import Pagination from '@/Components/Pagination.vue';
import WebLayout from '@/Layouts/WebLayout.vue';
import type { PaginatedCollection } from '@/types/pagination';

import type { Author, Post } from '@/types/models';

const props = defineProps<{
    author: Author | { data: Author };
    posts: PaginatedCollection<Post>;
}>();

// Normalize author access - handle both wrapped and unwrapped resource formats
const authorData = computed<Author>(() => {
    return 'data' in props.author ? props.author.data : props.author;
});
</script>

<template>
    <WebLayout solid>
        <Head :title="`${authorData.name} - Authors | Boilerplate`">
            <!-- General SEO -->
            <meta
                name="description"
                :content="authorData.bio || ''"
                head-key="description"
            />

            <!-- Schema.org -->
            <meta
                itemprop="name"
                :content="authorData.name"
                head-key="schema:name"
            />
            <meta
                itemprop="description"
                :content="authorData.bio || ''"
                head-key="schema:description"
            />
            <meta
                v-if="authorData.avatar"
                itemprop="image"
                :content="authorData.avatar.url"
                head-key="schema:image"
            />

            <!-- Open Graph -->
            <meta property="og:type" content="profile" head-key="og:type" />
            <meta
                property="og:title"
                :content="authorData.name"
                head-key="og:title"
            />
            <meta
                property="og:description"
                :content="authorData.bio || ''"
                head-key="og:description"
            />
            <meta
                v-if="authorData.avatar"
                property="og:image"
                :content="authorData.avatar.url"
                head-key="og:image"
            />
            <meta
                property="og:url"
                :content="`https://boilerplate.com/blog/author/${authorData.slug}`"
                head-key="og:url"
            />
            <meta
                property="og:site_name"
                content="Boilerplate"
                head-key="og:site_name"
            />
            <meta property="og:locale" content="en_US" head-key="og:locale" />

            <!-- Twitter -->
            <meta
                name="twitter:card"
                content="summary"
                head-key="twitter:card"
            />
            <meta
                name="twitter:title"
                :content="authorData.name"
                head-key="twitter:title"
            />
            <meta
                name="twitter:description"
                :content="authorData.bio || ''"
                head-key="twitter:description"
            />
            <meta
                v-if="authorData.avatar"
                name="twitter:image"
                :content="authorData.avatar.url"
                head-key="twitter:image"
            />
        </Head>

        <!-- Hero Section with Author Profile -->
        <section class="relative overflow-hidden pt-28 pb-8">
            <!-- Decorative gradient orbs -->
            <div
                class="pointer-events-none absolute inset-0 -z-10 overflow-hidden"
            >
                <div
                    class="absolute -top-24 -left-24 h-80 w-80 rounded-full bg-slate-400/15 blur-3xl"
                />
                <div
                    class="absolute top-1/2 -right-24 h-64 w-64 rounded-full bg-emerald-400/10 blur-3xl"
                />
            </div>

            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <!-- Breadcrumb -->
                <nav
                    class="mb-6 flex items-center justify-center gap-2 text-sm"
                >
                    <Link
                        href="/blog"
                        class="text-slate-500 transition-colors hover:text-slate-900"
                        >Articles</Link
                    >
                    <span class="text-slate-300">/</span>
                    <Link
                        href="/blog/authors"
                        class="text-slate-500 transition-colors hover:text-slate-900"
                        >Authors</Link
                    >
                    <span class="text-slate-300">/</span>
                    <span class="font-medium text-slate-900">{{
                        authorData.name
                    }}</span>
                </nav>

                <!-- Compact Author Profile -->
                <div
                    class="mx-auto flex max-w-2xl flex-col items-center text-center"
                >
                    <!-- Small Avatar -->
                    <div class="mb-4">
                        <div
                            v-if="authorData.avatar"
                            class="h-20 w-20 overflow-hidden rounded-full shadow-lg ring-2 ring-white"
                        >
                            <img
                                :src="authorData.avatar.url"
                                :srcset="authorData.avatar.srcset"
                                :alt="`Photo of ${authorData.name}`"
                                sizes="80px"
                                width="80"
                                height="80"
                                class="h-full w-full object-cover"
                            />
                        </div>
                        <div
                            v-else
                            class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-slate-800 text-3xl font-bold text-white shadow-lg ring-2 ring-slate-100 ring-white group-hover:ring-slate-200"
                        >
                            {{ authorData.name.charAt(0).toUpperCase() }}
                        </div>
                    </div>

                    <!-- Name -->
                    <h1
                        class="mb-1 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl"
                    >
                        {{ authorData.name }}
                    </h1>

                    <!-- Email (subtle) -->
                    <p class="mb-3 text-sm text-slate-500">
                        {{ authorData.email }}
                    </p>

                    <!-- Bio (compact) -->
                    <p
                        v-if="authorData.bio"
                        class="mb-4 max-w-lg text-slate-600"
                    >
                        {{ authorData.bio }}
                    </p>

                    <!-- Social Links (compact) -->
                    <div class="flex items-center gap-2">
                        <a
                            v-if="authorData.twitter_handle"
                            :href="`https://twitter.com/${authorData.twitter_handle}`"
                            target="_blank"
                            rel="noopener"
                            class="rounded-lg p-2 text-slate-400 transition-colors hover:bg-slate-100 hover:text-slate-700"
                        >
                            <XIcon class="h-5 w-5" />
                        </a>
                        <a
                            v-if="authorData.github_handle"
                            :href="`https://github.com/${authorData.github_handle}`"
                            target="_blank"
                            rel="noopener"
                            class="rounded-lg p-2 text-slate-400 transition-colors hover:bg-slate-100 hover:text-slate-700"
                        >
                            <GitHubIcon class="h-5 w-5" />
                        </a>
                        <a
                            v-if="authorData.linkedin_handle"
                            :href="`https://linkedin.com/in/${authorData.linkedin_handle}`"
                            target="_blank"
                            rel="noopener"
                            class="rounded-lg p-2 text-slate-400 transition-colors hover:bg-slate-100 hover:text-slate-700"
                        >
                            <LinkedinIcon class="h-5 w-5" />
                        </a>
                        <a
                            v-if="authorData.instagram_handle"
                            :href="`https://instagram.com/${authorData.instagram_handle}`"
                            target="_blank"
                            rel="noopener"
                            class="rounded-lg p-2 text-slate-400 transition-colors hover:bg-slate-100 hover:text-slate-700"
                        >
                            <InstagramIcon class="h-5 w-5" />
                        </a>
                        <a
                            v-if="authorData.facebook_handle"
                            :href="`https://facebook.com/${authorData.facebook_handle}`"
                            target="_blank"
                            rel="noopener"
                            class="rounded-lg p-2 text-slate-400 transition-colors hover:bg-slate-100 hover:text-slate-700"
                        >
                            <FacebookIcon class="h-5 w-5" />
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Author's Posts -->
        <section class="pb-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <h2 class="mb-8 text-2xl font-bold text-slate-900">
                    Articles by {{ authorData.name }}
                </h2>

                <div
                    v-if="posts.data.length > 0"
                    class="grid gap-8 md:grid-cols-2 lg:grid-cols-3"
                >
                    <BlogPostCard
                        v-for="post in posts.data"
                        :key="post.id"
                        :post="post"
                        :show-author="false"
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
                        No articles yet
                    </h3>
                    <p class="mb-6 text-slate-600">
                        {{ authorData.name }} has not published any articles
                        yet.
                    </p>
                    <Link
                        href="/blog"
                        class="rounded-lg bg-gradient-to-r from-slate-600 to-slate-700 px-6 py-3 text-sm font-medium text-white transition-all hover:from-slate-700 hover:to-slate-800"
                    >
                        View all articles
                    </Link>
                </div>

                <!-- Pagination -->
                <Pagination :meta="posts.meta" />
            </div>
        </section>
    </WebLayout>
</template>
