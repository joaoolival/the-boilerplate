<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

import type { PaginatedCollection } from '@/types/pagination';

defineProps<{
    meta: PaginatedCollection<any>['meta'];
}>();
</script>

<template>
    <nav
        v-if="meta.last_page > 1"
        class="mt-12 flex flex-col items-center gap-4"
        aria-label="Pagination"
    >
        <div class="flex flex-wrap items-center justify-center gap-2">
            <template v-for="link in meta.links" :key="link.label">
                <Link
                    v-if="link.url"
                    :href="link.url"
                    class="relative inline-flex h-10 min-w-[2.5rem] items-center justify-center rounded-lg px-4 text-sm font-medium transition-all"
                    :class="[
                        link.active
                            ? 'bg-primary text-primary-foreground shadow-md'
                            : 'bg-background text-foreground ring-1 ring-border hover:bg-accent hover:text-accent-foreground',
                    ]"
                    :preserve-scroll="false"
                >
                    <span v-if="link.label.includes('Previous')">Previous</span>
                    <span v-else-if="link.label.includes('Next')">Next</span>
                    <span v-else v-html="link.label"></span>
                </Link>
                <span
                    v-else
                    class="relative inline-flex h-10 min-w-[2.5rem] items-center justify-center rounded-lg px-4 text-sm font-medium text-muted-foreground opacity-50 ring-1 ring-border"
                >
                    <span v-if="link.label.includes('Previous')">Previous</span>
                    <span v-else-if="link.label.includes('Next')">Next</span>
                    <span v-else v-html="link.label"></span>
                </span>
            </template>
        </div>
        <p class="text-xs text-slate-400">
            Showing {{ meta.from }} to {{ meta.to }} of {{ meta.total }} items
        </p>
    </nav>
</template>
