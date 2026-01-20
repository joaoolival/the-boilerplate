<script setup lang="ts">
import { Link, router, usePage } from '@inertiajs/vue3';
import { useWindowScroll } from '@vueuse/core';
import { Menu, X } from 'lucide-vue-next';
import { computed, onMounted, ref } from 'vue';

import { Button } from '@/components/ui/button';

const page = usePage();
const isBlogRoute = computed(() => page.url.startsWith('/blog'));
const user = computed(() => (page.props as any).auth?.user);

const props = withDefaults(
    defineProps<{
        solid?: boolean;
    }>(),
    {
        solid: false,
    },
);

const { y } = useWindowScroll();
const isMobileMenuOpen = ref(false);
const isHomePage = ref(false);

onMounted(() => {
    isHomePage.value = window.location.pathname === '/';
});

const isScrolled = computed(() => y.value > 50);

const navClasses = computed(() => {
    if (props.solid) {
        return 'bg-primary-950 shadow-sm py-4';
    }
    if (isMobileMenuOpen.value) {
        return 'bg-primary-950 shadow-sm py-4';
    }
    return isScrolled.value
        ? 'bg-primary-950/90 backdrop-blur-md shadow-sm py-4'
        : 'bg-transparent py-6';
});

const closeMenu = () => {
    isMobileMenuOpen.value = false;
};

const handleNavClick = (hash: string): void => {
    isMobileMenuOpen.value = false;

    if (isHomePage.value) {
        const el = document.querySelector(hash) as HTMLElement | null;
        if (!el) return;
        el.scrollIntoView({ behavior: 'smooth', block: 'start' });
        if (history.pushState) {
            history.pushState(null, '', hash);
        } else {
            window.location.hash = hash.replace('#', '');
        }
    } else {
        router.visit('/' + hash);
    }
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
        class="fixed top-0 right-0 left-0 z-50 bg-white py-4 shadow-sm transition-all duration-300"
        role="navigation"
        aria-label="Navegação principal"
    >
        <div
            class="mx-auto flex max-w-7xl items-center justify-between px-6 sm:px-8 lg:px-12"
        >
            <!-- Logo -->
            <Link
                href="/"
                class="flex items-center gap-2"
                aria-label="Ir para o início"
            >
                <img
                    src="/images/logo_bg_dark.svg"
                    alt="Boilerplate"
                    class="h-10 w-auto sm:h-12"
                />
            </Link>

            <!-- Desktop Links -->
            <div class="hidden items-center gap-6 lg:flex">
                <Link
                    href="/"
                    class="text-sm font-medium text-gray-700 transition-colors hover:text-black"
                    :class="{ 'font-semibold text-black': !isBlogRoute }"
                >
                    Início
                </Link>
                <Link
                    href="/blog"
                    class="text-sm font-medium text-gray-700 transition-colors hover:text-black"
                    :class="{ 'font-semibold text-black': isBlogRoute }"
                >
                    Blog
                </Link>
            </div>

            <!-- Auth Buttons (Desktop) -->
            <div class="hidden items-center gap-4 lg:flex">
                <template v-if="user">
                    <Button
                        as-child
                        class="rounded-full bg-black text-white hover:bg-black/90"
                    >
                        <Link href="/dashboard">Ir para a App</Link>
                    </Button>
                </template>
                <template v-else>
                    <Link
                        href="/login"
                        class="text-sm font-medium text-gray-700 transition-colors hover:text-black"
                        >Entrar</Link
                    >
                    <Button
                        as-child
                        class="rounded-full bg-black text-white hover:bg-black/90"
                    >
                        <Link href="/register">Registar</Link>
                    </Button>
                </template>
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
                        class="text-base font-medium text-gray-700 transition-colors hover:text-black"
                        :class="{ 'font-semibold text-black': !isBlogRoute }"
                    >
                        Início
                    </Link>
                    <Link
                        href="/blog"
                        class="text-base font-medium text-gray-700 transition-colors hover:text-black"
                        :class="{ 'font-semibold text-black': isBlogRoute }"
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
                                <Link href="/dashboard">Ir para a App</Link>
                            </Button>
                        </template>
                        <template v-else>
                            <Link
                                href="/login"
                                class="text-base font-medium text-gray-700 transition-colors hover:text-black"
                                >Entrar</Link
                            >
                            <Button
                                as-child
                                class="w-full justify-center rounded-full bg-black text-white hover:bg-black/90"
                            >
                                <Link href="/register">Registar</Link>
                            </Button>
                        </template>
                    </div>
                </div>
            </div>
        </transition>
    </nav>
</template>
