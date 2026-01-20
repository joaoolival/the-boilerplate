<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import { Menu, X } from 'lucide-vue-next';
import { computed, ref } from 'vue';

import AppLogo from '@/Components/AppLogo.vue';
import { Button } from '@/Components/ui/button';

const page = usePage();

// SSR-compatible active route detection using Inertia's usePage
const currentPath = computed(() => page.url.split('?')[0]);
const isHomeActive = computed(() => currentPath.value === '/');
const isBlogActive = computed(() => currentPath.value.startsWith('/blog'));

const user = computed(() => (page.props as any).auth?.user);

withDefaults(
    defineProps<{
        solid?: boolean;
    }>(),
    {
        solid: false,
    },
);

const isMobileMenuOpen = ref(false);

const closeMenu = () => {
    isMobileMenuOpen.value = false;
};
</script>

<template>
    <!-- Click outside to close menu -->
    <div
        v-if="isMobileMenuOpen"
        @click="closeMenu"
        class="fixed inset-0 z-40 bg-black/50 lg:hidden"
    ></div>

    <nav
        class="fixed top-0 right-0 left-0 z-50 bg-white shadow-sm transition-all duration-300"
        role="navigation"
        aria-label="Main navigation"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <!-- Logo (Left) -->
                <div class="flex flex-1 justify-start">
                    <Link
                        href="/"
                        class="flex items-center gap-2"
                        aria-label="Go to home"
                    >
                        <AppLogo :show-text="false" />
                    </Link>
                </div>

                <!-- Desktop Links (Center) -->
                <div class="hidden flex-1 justify-center lg:flex">
                    <div class="flex items-center gap-8">
                        <Link
                            href="/"
                            class="group relative py-1 text-sm font-medium transition-all duration-300"
                            :class="
                                isHomeActive
                                    ? 'text-black'
                                    : 'text-gray-500 hover:text-black'
                            "
                        >
                            Home
                            <span
                                class="absolute -bottom-1 left-0 h-0.5 bg-black transition-all duration-300"
                                :class="
                                    isHomeActive
                                        ? 'w-full'
                                        : 'w-0 group-hover:w-full'
                                "
                            ></span>
                        </Link>
                        <Link
                            href="/blog"
                            class="group relative py-1 text-sm font-medium transition-all duration-300"
                            :class="
                                isBlogActive
                                    ? 'text-black'
                                    : 'text-gray-500 hover:text-black'
                            "
                        >
                            Blog
                            <span
                                class="absolute -bottom-1 left-0 h-0.5 bg-black transition-all duration-300"
                                :class="
                                    isBlogActive
                                        ? 'w-full'
                                        : 'w-0 group-hover:w-full'
                                "
                            ></span>
                        </Link>
                    </div>
                </div>

                <!-- Auth Buttons (Right) -->
                <div class="hidden flex-1 justify-end lg:flex">
                    <div class="flex items-center gap-4">
                        <template v-if="user">
                            <Button
                                as-child
                                class="rounded-full bg-black text-white hover:bg-black/90"
                            >
                                <Link href="/dashboard">Go to App</Link>
                            </Button>
                        </template>
                        <template v-else>
                            <Link
                                href="/login"
                                class="text-sm font-medium text-gray-700 transition-colors hover:text-black"
                                >Log in</Link
                            >
                            <Button
                                as-child
                                class="rounded-full bg-black text-white hover:bg-black/90"
                            >
                                <Link href="/register">Register</Link>
                            </Button>
                        </template>
                    </div>
                </div>

                <!-- Mobile Toggle -->
                <div class="flex items-center lg:hidden">
                    <button
                        @click="isMobileMenuOpen = !isMobileMenuOpen"
                        class="p-2 text-gray-700 hover:text-black"
                    >
                        <X v-if="isMobileMenuOpen" class="h-6 w-6" />
                        <Menu v-else class="h-6 w-6" />
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <transition
            enter-active-class="transition duration-200 ease-out"
            enter-from-class="opacity-0 -translate-y-2"
            enter-to-class="opacity-100 translate-y-0"
            leave-active-class="transition duration-150 ease-in"
            leave-from-class="opacity-100 translate-y-0"
            leave-to-class="opacity-0 -translate-y-2"
        >
            <div
                v-if="isMobileMenuOpen"
                class="absolute inset-x-0 top-full border-t border-gray-100 bg-white shadow-lg lg:hidden"
            >
                <div class="flex flex-col space-y-4 p-6">
                    <Link
                        href="/"
                        class="flex items-center border-l-2 py-2 pl-4 text-base font-medium transition-all duration-300"
                        :class="
                            isHomeActive
                                ? 'border-black text-black'
                                : 'border-transparent text-gray-500 hover:text-black'
                        "
                    >
                        Home
                    </Link>
                    <Link
                        href="/blog"
                        class="flex items-center border-l-2 py-2 pl-4 text-base font-medium transition-all duration-300"
                        :class="
                            isBlogActive
                                ? 'border-black text-black'
                                : 'border-transparent text-gray-500 hover:text-black'
                        "
                    >
                        Blog
                    </Link>

                    <div
                        class="mt-4 flex flex-col gap-3 border-t border-gray-100 pt-4"
                    >
                        <template v-if="user">
                            <Button
                                as-child
                                class="w-full justify-center rounded-full bg-black text-white hover:bg-black/90"
                            >
                                <Link href="/dashboard">Go to App</Link>
                            </Button>
                        </template>
                        <template v-else>
                            <Link
                                href="/login"
                                class="text-base font-medium text-gray-700 transition-colors hover:text-black"
                                >Log in</Link
                            >
                            <Button
                                as-child
                                class="w-full justify-center rounded-full bg-black text-white hover:bg-black/90"
                            >
                                <Link href="/register">Register</Link>
                            </Button>
                        </template>
                    </div>
                </div>
            </div>
        </transition>
    </nav>
</template>
