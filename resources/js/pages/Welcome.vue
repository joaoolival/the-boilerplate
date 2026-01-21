<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import {
    ArrowRight,
    Code2,
    Database,
    Globe,
    LayoutTemplate,
    Shield,
    Sparkles,
    Zap,
} from 'lucide-vue-next';

import LandingNav from '@/Components/LandingNav.vue';
import { Badge } from '@/Components/ui/badge';
import { Button } from '@/Components/ui/button';
import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
} from '@/Components/ui/card';
import WebLayout from '@/Layouts/WebLayout.vue';

defineProps<{
    canLogin?: boolean;
    canRegister?: boolean;
    laravelVersion?: string;
    phpVersion?: string;
}>();
</script>

<template>
    <WebLayout :laravel-version="laravelVersion" :php-version="phpVersion">
        <Head title="Welcome to Boilerplate" />

        <div class="relative min-h-screen bg-white">
            <LandingNav />

            <!-- Hero Section -->
            <section
                class="relative flex min-h-[calc(100vh-64px)] items-center justify-center overflow-hidden"
            >
                <!-- Subtle Grid Background -->
                <div
                    class="absolute inset-0 bg-[linear-gradient(to_right,#f0f0f0_1px,transparent_1px),linear-gradient(to_bottom,#f0f0f0_1px,transparent_1px)] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_0%,#000_70%,transparent_110%)] bg-[size:4rem_4rem]"
                ></div>

                <div
                    class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8"
                >
                    <div class="mx-auto max-w-4xl text-center">
                        <Badge
                            variant="outline"
                            class="mb-8 inline-flex items-center gap-2 rounded-full border-black/10 bg-black/5 px-4 py-2 text-sm font-medium text-black backdrop-blur-sm"
                        >
                            <Sparkles class="h-4 w-4" />
                            <span>Production-Ready Starter Kit</span>
                        </Badge>

                        <h1
                            class="mb-6 text-5xl font-bold tracking-tight text-black sm:text-6xl lg:text-7xl"
                        >
                            Ship your next
                            <br />
                            <span class="relative">
                                <span
                                    class="relative z-10 bg-gradient-to-r from-black via-gray-600 to-black bg-clip-text text-transparent"
                                    >big idea</span
                                >
                                <span
                                    class="absolute -inset-1 -skew-y-1 bg-black/5"
                                ></span>
                            </span>
                            faster.
                        </h1>

                        <p
                            class="mx-auto mb-10 max-w-2xl text-lg leading-relaxed text-gray-600 sm:text-xl"
                        >
                            A beautifully crafted boilerplate with Laravel, Vue
                            3, Tailwind CSS, and Shadcn UI. Everything you need
                            to launch your SaaS, blog, or portfolio — today.
                        </p>

                        <div
                            class="flex flex-col items-center justify-center gap-4 sm:flex-row"
                        >
                            <Button
                                size="lg"
                                class="group h-14 rounded-full bg-black px-10 text-base font-semibold text-white transition-all duration-300 hover:bg-black/90 hover:shadow-2xl hover:shadow-black/20"
                            >
                                Get Started
                                <ArrowRight
                                    class="ml-2 h-5 w-5 transition-transform group-hover:translate-x-1"
                                />
                            </Button>
                            <Button
                                size="lg"
                                variant="outline"
                                class="h-14 rounded-full border-2 border-black/20 px-10 text-base font-semibold text-black transition-all duration-300 hover:border-black hover:bg-black hover:text-white"
                            >
                                Documentation
                            </Button>
                        </div>

                        <div
                            class="mt-16 flex flex-wrap items-center justify-center gap-8 text-sm text-gray-500"
                        >
                            <div class="flex items-center gap-2">
                                <div
                                    class="h-2 w-2 rounded-full bg-green-500"
                                ></div>
                                <span>Production Ready</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div
                                    class="h-2 w-2 rounded-full bg-green-500"
                                ></div>
                                <span>Modern Stack</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div
                                    class="h-2 w-2 rounded-full bg-green-500"
                                ></div>
                                <span>Open Source</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gradient fade at bottom -->
                <div
                    class="pointer-events-none absolute right-0 bottom-0 left-0 h-32 bg-gradient-to-t from-white to-transparent"
                ></div>
            </section>

            <!-- Features Grid -->
            <section class="relative bg-white py-32">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="mx-auto mb-20 max-w-2xl text-center">
                        <h2
                            class="mb-4 text-4xl font-bold tracking-tight text-black sm:text-5xl"
                        >
                            Powerful Features
                        </h2>
                        <p class="text-lg text-gray-600">
                            Built with the best tools in the ecosystem to ensure
                            developer experience and performance.
                        </p>
                    </div>

                    <div
                        class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3"
                    >
                        <Card
                            class="group relative overflow-hidden border-0 bg-gray-50 transition-all duration-500 hover:bg-black hover:shadow-2xl"
                        >
                            <CardHeader class="relative z-10 pb-2">
                                <div
                                    class="mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-white shadow-sm transition-all duration-500 group-hover:bg-white/10"
                                >
                                    <Database
                                        class="h-7 w-7 text-black transition-colors duration-500 group-hover:text-white"
                                    />
                                </div>
                                <CardTitle
                                    class="text-xl font-bold text-black transition-colors duration-500 group-hover:text-white"
                                    >Laravel Backend</CardTitle
                                >
                            </CardHeader>
                            <CardContent class="relative z-10">
                                <CardDescription
                                    class="text-base text-gray-600 transition-colors duration-500 group-hover:text-gray-300"
                                >
                                    Robust API and backend logic powered by
                                    Laravel. Secure, scalable, and
                                    developer-friendly.
                                </CardDescription>
                            </CardContent>
                        </Card>

                        <Card
                            class="group relative overflow-hidden border-0 bg-gray-50 transition-all duration-500 hover:bg-black hover:shadow-2xl"
                        >
                            <CardHeader class="relative z-10 pb-2">
                                <div
                                    class="mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-white shadow-sm transition-all duration-500 group-hover:bg-white/10"
                                >
                                    <Code2
                                        class="h-7 w-7 text-black transition-colors duration-500 group-hover:text-white"
                                    />
                                </div>
                                <CardTitle
                                    class="text-xl font-bold text-black transition-colors duration-500 group-hover:text-white"
                                    >Vue 3 + Inertia</CardTitle
                                >
                            </CardHeader>
                            <CardContent class="relative z-10">
                                <CardDescription
                                    class="text-base text-gray-600 transition-colors duration-500 group-hover:text-gray-300"
                                >
                                    A monolithic SPA experience. Build modern
                                    UIs with Vue 3 while keeping the simplicity
                                    of server-side routing.
                                </CardDescription>
                            </CardContent>
                        </Card>

                        <Card
                            class="group relative overflow-hidden border-0 bg-gray-50 transition-all duration-500 hover:bg-black hover:shadow-2xl"
                        >
                            <CardHeader class="relative z-10 pb-2">
                                <div
                                    class="mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-white shadow-sm transition-all duration-500 group-hover:bg-white/10"
                                >
                                    <LayoutTemplate
                                        class="h-7 w-7 text-black transition-colors duration-500 group-hover:text-white"
                                    />
                                </div>
                                <CardTitle
                                    class="text-xl font-bold text-black transition-colors duration-500 group-hover:text-white"
                                    >Shadcn UI</CardTitle
                                >
                            </CardHeader>
                            <CardContent class="relative z-10">
                                <CardDescription
                                    class="text-base text-gray-600 transition-colors duration-500 group-hover:text-gray-300"
                                >
                                    Beautifully designed components built with
                                    Radix Vue and Tailwind CSS. Accessible and
                                    customizable.
                                </CardDescription>
                            </CardContent>
                        </Card>

                        <Card
                            class="group relative overflow-hidden border-0 bg-gray-50 transition-all duration-500 hover:bg-black hover:shadow-2xl"
                        >
                            <CardHeader class="relative z-10 pb-2">
                                <div
                                    class="mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-white shadow-sm transition-all duration-500 group-hover:bg-white/10"
                                >
                                    <Zap
                                        class="h-7 w-7 text-black transition-colors duration-500 group-hover:text-white"
                                    />
                                </div>
                                <CardTitle
                                    class="text-xl font-bold text-black transition-colors duration-500 group-hover:text-white"
                                    >Vite Powered</CardTitle
                                >
                            </CardHeader>
                            <CardContent class="relative z-10">
                                <CardDescription
                                    class="text-base text-gray-600 transition-colors duration-500 group-hover:text-gray-300"
                                >
                                    Lightning fast HMR and optimized production
                                    builds. Work at the speed of thought.
                                </CardDescription>
                            </CardContent>
                        </Card>

                        <Card
                            class="group relative overflow-hidden border-0 bg-gray-50 transition-all duration-500 hover:bg-black hover:shadow-2xl"
                        >
                            <CardHeader class="relative z-10 pb-2">
                                <div
                                    class="mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-white shadow-sm transition-all duration-500 group-hover:bg-white/10"
                                >
                                    <Shield
                                        class="h-7 w-7 text-black transition-colors duration-500 group-hover:text-white"
                                    />
                                </div>
                                <CardTitle
                                    class="text-xl font-bold text-black transition-colors duration-500 group-hover:text-white"
                                    >Authentication Ready</CardTitle
                                >
                            </CardHeader>
                            <CardContent class="relative z-10">
                                <CardDescription
                                    class="text-base text-gray-600 transition-colors duration-500 group-hover:text-gray-300"
                                >
                                    Comes with complete authentication flow
                                    including Login, Registration, Password
                                    Reset, and Email Verification.
                                </CardDescription>
                            </CardContent>
                        </Card>

                        <Card
                            class="group relative overflow-hidden border-0 bg-gray-50 transition-all duration-500 hover:bg-black hover:shadow-2xl"
                        >
                            <CardHeader class="relative z-10 pb-2">
                                <div
                                    class="mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-white shadow-sm transition-all duration-500 group-hover:bg-white/10"
                                >
                                    <Globe
                                        class="h-7 w-7 text-black transition-colors duration-500 group-hover:text-white"
                                    />
                                </div>
                                <CardTitle
                                    class="text-xl font-bold text-black transition-colors duration-500 group-hover:text-white"
                                    >SEO Friendly</CardTitle
                                >
                            </CardHeader>
                            <CardContent class="relative z-10">
                                <CardDescription
                                    class="text-base text-gray-600 transition-colors duration-500 group-hover:text-gray-300"
                                >
                                    Pre-configured for SEO with meta tags, Open
                                    Graph support, and sitemap generation
                                    capabilities.
                                </CardDescription>
                            </CardContent>
                        </Card>
                    </div>
                </div>
            </section>

            <!-- CTA Section -->
            <section class="relative overflow-hidden bg-black py-32">
                <!-- Geometric pattern -->
                <div
                    class="absolute inset-0 bg-[linear-gradient(to_right,#ffffff08_1px,transparent_1px),linear-gradient(to_bottom,#ffffff08_1px,transparent_1px)] bg-[size:4rem_4rem]"
                ></div>

                <div
                    class="relative z-10 mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8"
                >
                    <h2
                        class="mb-6 text-4xl font-bold tracking-tight text-white sm:text-5xl"
                    >
                        Start building today.
                    </h2>
                    <p class="mx-auto mb-10 max-w-xl text-lg text-gray-400">
                        Clone the repository, install dependencies, and you're
                        ready to go. No configuration headaches.
                    </p>
                    <div
                        class="flex flex-col items-center justify-center gap-4 sm:flex-row"
                    >
                        <Button
                            size="lg"
                            class="group h-14 rounded-full bg-white px-10 text-base font-semibold text-black transition-all duration-300 hover:bg-gray-100 hover:shadow-2xl"
                        >
                            Clone Repository
                            <ArrowRight
                                class="ml-2 h-5 w-5 transition-transform group-hover:translate-x-1"
                            />
                        </Button>
                    </div>
                </div>
            </section>
        </div>
    </WebLayout>
</template>
