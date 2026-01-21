<script setup lang="ts">
import LinkedinIcon from '@/components/icons/LinkedinIcon.vue';

import {
    Dialog,
    DialogClose,
    DialogContent,
    DialogDescription,
    DialogTitle,
} from '@/components/ui/dialog';
import WebLayout from '@/layouts/WebLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import {
    ArrowLeft,
    Camera,
    Check,
    Link as LinkIcon,
    Maximize2,
    X,
} from 'lucide-vue-next';
import { computed, ref } from 'vue';
import {
    FacebookIcon,
    GitHubIcon,
    InstagramIcon,
    XIcon,
} from 'vue3-simple-icons';

import type { Post } from '@/types/models';

const props = defineProps<{
    post: Post | { data: Post };
}>();

// Get current URL from Ziggy (SSR-safe)
const page = usePage();
const currentUrl = computed(() => {
    // Ziggy provides the current location in page props
    return (page.props.ziggy as { location: string })?.location || '';
});

// Normalize post access - handle both wrapped and unwrapped resource formats
const postData = computed<Post>(() => {
    return 'data' in props.post ? props.post.data : props.post;
});

const formatDate = (dateString: string | null) => {
    if (!dateString) return null;
    return new Date(dateString).toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
    });
};

const readingTime = (content: string | null) => {
    if (!content) return '1 min read';
    const words = content.replace(/<[^>]*>/g, '').split(/\s+/).length;
    const minutes = Math.ceil(words / 200);
    return `${minutes} min read`;
};

const copied = ref(false);

const copyToClipboard = () => {
    navigator.clipboard.writeText(currentUrl.value).then(() => {
        copied.value = true;
        setTimeout(() => {
            copied.value = false;
        }, 2000);
    });
};

const shareUrl = (platform: string) => {
    const url = encodeURIComponent(currentUrl.value);
    const text = encodeURIComponent(postData.value.title);

    switch (platform) {
        case 'twitter':
            return `https://twitter.com/intent/tweet?url=${url}&text=${text}`;
        case 'linkedin':
            return `https://www.linkedin.com/sharing/share-offsite/?url=${url}`;
        case 'facebook':
            return `https://www.facebook.com/sharer/sharer.php?u=${url}`;
        default:
            return '#';
    }
};

const selectedImage = ref<string | null>(null);
const isGalleryOpen = ref(false);

const openGallery = (url: string) => {
    selectedImage.value = url;
    isGalleryOpen.value = true;
};
</script>

<template>
    <WebLayout solid>
        <Head :title="`${postData.title} | Boilerplate`">
            <!-- General SEO -->
            <meta
                name="description"
                :content="postData.excerpt || ''"
                head-key="description"
            />

            <!-- Schema.org -->
            <meta
                itemprop="name"
                :content="postData.title"
                head-key="schema:name"
            />
            <meta
                itemprop="description"
                :content="postData.excerpt || ''"
                head-key="schema:description"
            />
            <meta
                v-if="postData.banner_image"
                itemprop="image"
                :content="postData.banner_image.url"
                head-key="schema:image"
            />

            <!-- Open Graph / Facebook / WhatsApp -->
            <meta property="og:type" content="article" head-key="og:type" />
            <meta
                property="og:title"
                :content="postData.title"
                head-key="og:title"
            />
            <meta
                property="og:description"
                :content="postData.excerpt || ''"
                head-key="og:description"
            />
            <meta
                v-if="postData.banner_image"
                property="og:image"
                :content="postData.banner_image.url"
                head-key="og:image"
            />
            <meta
                property="og:url"
                :content="`https://boilerplate.com/blog/${postData.slug}`"
                head-key="og:url"
            />
            <meta
                property="og:site_name"
                content="Boilerplate"
                head-key="og:site_name"
            />
            <meta property="og:locale" content="en_US" head-key="og:locale" />
            <meta
                v-if="postData.published_at"
                property="article:published_time"
                :content="postData.published_at"
                head-key="article:published_time"
            />
            <meta
                v-if="postData.author"
                property="article:author"
                :content="postData.author.name"
                head-key="article:author"
            />

            <!-- Twitter -->
            <meta
                name="twitter:card"
                content="summary_large_image"
                head-key="twitter:card"
            />
            <meta
                name="twitter:title"
                :content="postData.title"
                head-key="twitter:title"
            />
            <meta
                name="twitter:description"
                :content="postData.excerpt || ''"
                head-key="twitter:description"
            />
            <meta
                v-if="postData.banner_image"
                name="twitter:image"
                :content="postData.banner_image.url"
                head-key="twitter:image"
            />
        </Head>

        <article class="relative">
            <!-- Full Width Hero Banner -->
            <div class="relative h-[70vh] min-h-[500px] w-full overflow-hidden">
                <!-- Background Image or Pattern -->
                <div v-if="postData.banner_image" class="absolute inset-0">
                    <img
                        :src="postData.banner_image.url"
                        :srcset="postData.banner_image.srcset"
                        :alt="`Banner for ${postData.title}`"
                        sizes="100vw"
                        class="h-full w-full object-cover"
                        loading="eager"
                        decoding="async"
                    />
                    <!-- Overlay Gradient -->
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-gray-900/50 to-gray-900/30"
                    />
                </div>
                <!-- Fallback Pattern if no image -->
                <div v-else class="absolute inset-0 bg-slate-900">
                    <div
                        class="absolute inset-0 bg-[linear-gradient(to_right,rgba(255,255,255,0.05)_1px,transparent_1px),linear-gradient(to_bottom,rgba(255,255,255,0.05)_1px,transparent_1px)] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_0%,#000_70%,transparent_110%)] bg-[size:4rem_4rem]"
                    />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/50 to-transparent"
                    />
                </div>

                <!-- Hero Content -->
                <div class="absolute inset-0 flex items-end pt-32 pb-16">
                    <div
                        class="mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8"
                    >
                        <!-- Breadcrumb -->
                        <nav
                            class="mb-6 flex items-center justify-center gap-2 text-sm text-white/80"
                        >
                            <Link
                                href="/blog"
                                class="transition-colors hover:text-white"
                                >Articles</Link
                            >
                            <span class="text-white/40">/</span>
                            <Link
                                v-if="postData.category"
                                :href="`/blog/category/${postData.category.slug}`"
                                class="transition-colors hover:text-white"
                            >
                                {{ postData.category.name }}
                            </Link>
                        </nav>

                        <!-- Title -->
                        <h1
                            class="mb-6 text-4xl leading-tight font-bold tracking-tight text-white drop-shadow-sm sm:text-5xl lg:text-6xl"
                        >
                            {{ postData.title }}
                        </h1>

                        <!-- Meta -->
                        <div
                            class="flex flex-wrap items-center justify-center gap-6 text-white/90"
                        >
                            <!-- Author -->
                            <!-- Author -->
                            <div
                                v-if="postData.author"
                                class="flex items-center gap-3"
                            >
                                <Link
                                    :href="`/blog/author/${postData.author.slug}`"
                                    class="group flex items-center gap-3"
                                >
                                    <div
                                        class="h-10 w-10 overflow-hidden rounded-full ring-2 ring-white/20 transition-all group-hover:ring-white/40"
                                    >
                                        <img
                                            v-if="postData.author.avatar"
                                            :src="postData.author.avatar.url"
                                            :alt="postData.author.name"
                                            class="h-full w-full object-cover"
                                        />
                                        <div
                                            v-else
                                            class="flex h-full w-full items-center justify-center bg-white/10 text-xs font-bold"
                                        >
                                            {{ postData.author.name.charAt(0) }}
                                        </div>
                                    </div>
                                    <div class="text-left">
                                        <div
                                            class="font-medium transition-colors group-hover:text-white"
                                        >
                                            {{ postData.author.name }}
                                        </div>
                                        <div class="text-xs text-white/60">
                                            Author
                                        </div>
                                    </div>
                                </Link>
                            </div>

                            <!-- Divider -->
                            <div
                                class="hidden h-8 w-px bg-white/20 sm:block"
                            ></div>

                            <!-- Date & Time -->
                            <div class="flex items-center gap-6 text-sm">
                                <span v-if="postData.published_at">
                                    {{ formatDate(postData.published_at) }}
                                </span>
                                <span class="flex items-center gap-2">
                                    <span
                                        class="h-1 w-1 rounded-full bg-white/60"
                                    ></span>
                                    {{ readingTime(postData.content) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Container -->
            <div class="mx-auto max-w-3xl px-4 pt-16 sm:px-6 lg:px-8">
                <!-- Excerpt (Lead) -->
                <!-- Excerpt (Lead) -->
                <div
                    v-if="postData.excerpt"
                    class="mx-auto max-w-2xl py-8 text-center"
                >
                    <p
                        class="text-xl leading-relaxed font-light text-slate-600 italic"
                    >
                        "{{ postData.excerpt }}"
                    </p>
                </div>

                <!-- Article Content -->
                <div class="py-12 lg:py-16">
                    <div
                        class="mx-auto prose prose-lg max-w-none prose-slate prose-headings:font-bold prose-headings:tracking-tight prose-p:leading-relaxed prose-a:font-semibold prose-a:text-slate-600 prose-a:no-underline hover:prose-a:underline prose-blockquote:rounded-lg prose-blockquote:border-l-4 prose-blockquote:border-slate-500 prose-blockquote:bg-slate-50 prose-blockquote:px-6 prose-blockquote:py-4 prose-blockquote:font-medium prose-blockquote:italic prose-code:rounded prose-code:bg-slate-100 prose-code:px-1.5 prose-code:py-0.5 prose-code:text-sm prose-code:font-medium prose-code:before:content-none prose-code:after:content-none prose-pre:border prose-pre:border-slate-200 prose-pre:bg-slate-50 prose-img:rounded-2xl prose-img:shadow-lg"
                        v-html="postData.content"
                    />
                </div>

                <!-- Share Section -->
                <section class="border-t border-slate-100 py-12">
                    <!-- Share Row -->
                    <div
                        class="mb-12 flex flex-col items-center justify-between gap-6 sm:flex-row"
                    >
                        <div class="flex items-center gap-4">
                            <span class="font-semibold text-slate-900"
                                >Share article:</span
                            >
                            <div class="flex items-center gap-2">
                                <a
                                    :href="shareUrl('twitter')"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="rounded-lg p-2 text-slate-400 transition-colors hover:bg-slate-100 hover:text-slate-700"
                                    aria-label="Share on X"
                                >
                                    <XIcon class="h-5 w-5" />
                                </a>
                                <a
                                    :href="shareUrl('linkedin')"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="rounded-lg p-2 text-slate-400 transition-colors hover:bg-slate-100 hover:text-slate-700"
                                    aria-label="Share on LinkedIn"
                                >
                                    <LinkedinIcon class="h-5 w-5" />
                                </a>
                                <a
                                    :href="shareUrl('facebook')"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="rounded-lg p-2 text-slate-400 transition-colors hover:bg-slate-100 hover:text-slate-700"
                                    aria-label="Share on Facebook"
                                >
                                    <FacebookIcon class="h-5 w-5" />
                                </a>
                                <button
                                    @click="copyToClipboard"
                                    class="group relative rounded-lg p-2 text-slate-400 transition-colors hover:bg-slate-100 hover:text-slate-700"
                                    aria-label="Copy link"
                                >
                                    <Check
                                        v-if="copied"
                                        class="h-5 w-5 text-green-600"
                                    />
                                    <LinkIcon v-else class="h-5 w-5" />
                                    <span
                                        v-if="copied"
                                        class="absolute -top-8 left-1/2 -translate-x-1/2 rounded bg-slate-900 px-2 py-1 text-xs text-white"
                                    >
                                        Copied!
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Author Card -->
                    <div
                        v-if="postData.author"
                        class="rounded-3xl bg-slate-50 p-8 md:p-12"
                    >
                        <div
                            class="flex flex-col items-start gap-8 md:flex-row"
                        >
                            <!-- Avatar -->
                            <Link
                                :href="`/blog/author/${postData.author.slug}`"
                                class="group flex-shrink-0"
                            >
                                <div
                                    class="h-24 w-24 overflow-hidden rounded-full shadow-sm ring-4 ring-white transition-transform group-hover:scale-105"
                                >
                                    <img
                                        v-if="postData.author.avatar"
                                        :src="postData.author.avatar.url"
                                        :alt="postData.author.name"
                                        class="h-full w-full object-cover"
                                    />
                                    <div
                                        v-else
                                        class="flex h-full w-full items-center justify-center bg-white text-2xl font-bold text-slate-400"
                                    >
                                        {{ postData.author.name.charAt(0) }}
                                    </div>
                                </div>
                            </Link>

                            <!-- Info -->
                            <div class="flex-1 space-y-4">
                                <div>
                                    <div class="mb-1 flex items-center gap-3">
                                        <Link
                                            :href="`/blog/author/${postData.author.slug}`"
                                            class="text-2xl font-bold text-slate-900 transition-colors hover:text-slate-600"
                                        >
                                            {{ postData.author.name }}
                                        </Link>
                                    </div>
                                    <div
                                        class="text-sm font-medium text-slate-500"
                                    >
                                        Author
                                    </div>
                                </div>

                                <p
                                    v-if="postData.author.bio"
                                    class="max-w-2xl leading-relaxed text-slate-600"
                                >
                                    {{ postData.author.bio }}
                                </p>

                                <!-- Author Socials -->
                                <div class="flex items-center gap-2 pt-2">
                                    <a
                                        v-if="postData.author.twitter_handle"
                                        :href="`https://twitter.com/${postData.author.twitter_handle}`"
                                        target="_blank"
                                        class="rounded-lg p-2 text-slate-400 transition-colors hover:bg-white hover:text-slate-700 hover:shadow-sm"
                                    >
                                        <XIcon class="h-5 w-5" />
                                    </a>
                                    <a
                                        v-if="postData.author.github_handle"
                                        :href="`https://github.com/${postData.author.github_handle}`"
                                        target="_blank"
                                        class="rounded-lg p-2 text-slate-400 transition-colors hover:bg-white hover:text-slate-700 hover:shadow-sm"
                                    >
                                        <GitHubIcon class="h-5 w-5" />
                                    </a>
                                    <a
                                        v-if="postData.author.linkedin_handle"
                                        :href="`https://linkedin.com/in/${postData.author.linkedin_handle}`"
                                        target="_blank"
                                        class="rounded-lg p-2 text-slate-400 transition-colors hover:bg-white hover:text-slate-700 hover:shadow-sm"
                                    >
                                        <LinkedinIcon class="h-5 w-5" />
                                    </a>
                                    <a
                                        v-if="postData.author.instagram_handle"
                                        :href="`https://instagram.com/${postData.author.instagram_handle}`"
                                        target="_blank"
                                        class="rounded-lg p-2 text-slate-400 transition-colors hover:bg-white hover:text-slate-700 hover:shadow-sm"
                                    >
                                        <InstagramIcon class="h-5 w-5" />
                                    </a>
                                    <a
                                        v-if="postData.author.facebook_handle"
                                        :href="`https://facebook.com/${postData.author.facebook_handle}`"
                                        target="_blank"
                                        class="rounded-lg p-2 text-slate-400 transition-colors hover:bg-white hover:text-slate-700 hover:shadow-sm"
                                    >
                                        <FacebookIcon class="h-5 w-5" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Gallery -->
                <section v-if="postData.gallery?.length > 0" class="pb-12">
                    <h2
                        class="mb-6 flex items-center gap-2 text-2xl font-bold text-slate-900"
                    >
                        <span
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-gradient-to-br from-slate-500 to-slate-600 text-white"
                        >
                            <Camera class="h-4 w-4" />
                        </span>
                        Gallery
                        <span class="ml-2 text-sm font-normal text-slate-500">
                            ({{ postData.gallery.length }}
                            {{
                                postData.gallery.length === 1
                                    ? 'image'
                                    : 'images'
                            }})
                        </span>
                    </h2>

                    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        <div
                            v-for="image in postData.gallery"
                            :key="image.id"
                            class="group relative cursor-pointer overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm transition-all hover:shadow-md"
                            @click="openGallery(image.url)"
                        >
                            <img
                                :src="image.url"
                                :srcset="image.srcset"
                                :alt="`Gallery image of ${postData.title}`"
                                sizes="(max-width: 640px) 100vw, (max-width: 1024px) 50vw, 33vw"
                                width="400"
                                height="300"
                                class="aspect-[4/3] h-auto w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                loading="lazy"
                                decoding="async"
                            />
                            <!-- Overlay -->
                            <div
                                class="absolute inset-0 flex items-center justify-center bg-black/0 transition-colors duration-300 group-hover:bg-black/20"
                            >
                                <Maximize2
                                    class="h-8 w-8 text-white opacity-0 transition-opacity duration-300 group-hover:opacity-100"
                                />
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Back Link -->
                <div class="pb-20">
                    <Link
                        href="/blog"
                        class="group inline-flex h-10 items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 text-sm font-medium text-slate-600 transition-all hover:border-slate-400 hover:text-slate-900"
                    >
                        <ArrowLeft
                            class="h-4 w-4 transition-transform group-hover:-translate-x-1"
                        />
                        <span>Back to articles</span>
                    </Link>
                </div>
            </div>
        </article>

        <Dialog v-model:open="isGalleryOpen">
            <DialogContent
                :show-close-button="false"
                class="w-auto max-w-fit min-w-0 border-none bg-transparent p-0 shadow-none sm:max-w-none"
            >
                <DialogTitle class="sr-only">Image Gallery</DialogTitle>
                <DialogDescription class="sr-only">
                    Expanded view of the gallery image
                </DialogDescription>
                <div
                    class="relative flex items-center justify-center bg-transparent"
                >
                    <DialogClose
                        class="absolute top-4 right-4 z-50 rounded-full bg-black/50 p-2 text-white/80 backdrop-blur-sm transition-all hover:bg-black/70 hover:text-white hover:shadow-lg focus:ring-2 focus:ring-white/40 focus:outline-none"
                    >
                        <X class="h-6 w-6" />
                        <span class="sr-only">Close</span>
                    </DialogClose>
                    <img
                        v-if="selectedImage"
                        :src="selectedImage"
                        :alt="`Gallery image of ${postData.title}`"
                        class="h-auto max-h-[90vh] w-auto max-w-[95vw] object-contain shadow-2xl"
                    />
                </div>
            </DialogContent>
        </Dialog>
    </WebLayout>
</template>
