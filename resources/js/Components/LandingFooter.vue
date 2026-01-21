<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { Github, Twitter } from 'lucide-vue-next';

defineProps<{
    laravelVersion?: string;
    phpVersion?: string;
}>();
</script>

<template>
    <footer class="border-t border-slate-200 bg-white py-12 text-slate-600">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 gap-12 md:grid-cols-4">
                <div class="col-span-1 md:col-span-2">
                    <div
                        class="mb-4 flex items-center gap-2 text-xl font-bold text-black"
                    >
                        <span>The Boilerplate</span>
                    </div>
                    <p class="mb-6 max-w-sm text-slate-500">
                        The perfect starting point for your next big idea.
                        Crafted with care and attention to detail.
                    </p>
                    <div class="flex gap-4">
                        <a
                            href="#"
                            class="text-slate-400 transition-colors hover:text-black"
                        >
                            <Github class="h-5 w-5" />
                        </a>
                        <a
                            href="#"
                            class="text-slate-400 transition-colors hover:text-black"
                        >
                            <Twitter class="h-5 w-5" />
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="mb-4 font-bold text-black">Product</h3>
                    <ul class="space-y-3">
                        <li>
                            <a
                                href="#"
                                class="transition-colors hover:text-black"
                                >Features</a
                            >
                        </li>
                        <li>
                            <a
                                href="#"
                                class="transition-colors hover:text-black"
                                >Documentation</a
                            >
                        </li>
                        <li>
                            <a
                                href="#"
                                class="transition-colors hover:text-black"
                                >Changelog</a
                            >
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="mb-4 font-bold text-black">Legal</h3>
                    <ul class="space-y-3">
                        <li>
                            <Link
                                href="/privacy"
                                class="transition-colors hover:text-black"
                                >Privacy Policy</Link
                            >
                        </li>
                        <li>
                            <Link
                                href="/terms"
                                class="transition-colors hover:text-black"
                                >Terms of Service</Link
                            >
                        </li>
                        <li>
                            <Link
                                href="/cookies"
                                class="transition-colors hover:text-black"
                                >Cookie Policy</Link
                            >
                        </li>
                    </ul>
                </div>
            </div>

            <div
                class="mt-12 flex flex-col items-center justify-between border-t border-slate-100 pt-8 text-sm text-slate-500 md:flex-row"
            >
                <p>
                    &copy; {{ new Date().getFullYear() }} The Boilerplate. All
                    rights reserved.
                </p>
                <p v-if="laravelVersion && phpVersion" class="mt-2 md:mt-0">
                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </p>
            </div>
        </div>
    </footer>
</template>
