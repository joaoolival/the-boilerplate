<script setup lang="ts">
import WebLayout from '@/layouts/WebLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <WebLayout :solid="true">
        <Head title="Terms of Service" />

        <div class="bg-white pt-24 pb-16">
            <div class="container mx-auto max-w-3xl px-6">
                <h1 class="mb-8 text-4xl font-bold text-black">
                    Terms of Service
                </h1>

                <div class="prose max-w-none prose-slate">
                    <p class="text-lg text-gray-600">
                        Last updated: January 2026
                    </p>

                    <h2 class="mt-8 mb-4 text-2xl font-semibold text-black">
                        1. Acceptance of Terms
                    </h2>
                    <p class="mb-4 text-gray-600">
                        By accessing and using this website, you accept and
                        agree to be bound by the terms and provision of this
                        agreement. If you do not agree to abide by these terms,
                        please do not use this service.
                    </p>

                    <h2 class="mt-8 mb-4 text-2xl font-semibold text-black">
                        2. Use License
                    </h2>
                    <p class="mb-4 text-gray-600">
                        Permission is granted to temporarily download one copy
                        of the materials on this website for personal,
                        non-commercial transitory viewing only. This is the
                        grant of a license, not a transfer of title.
                    </p>

                    <h2 class="mt-8 mb-4 text-2xl font-semibold text-black">
                        3. Disclaimer
                    </h2>
                    <p class="mb-4 text-gray-600">
                        The materials on this website are provided on an 'as is'
                        basis. We make no warranties, expressed or implied, and
                        hereby disclaim and negate all other warranties
                        including, without limitation, implied warranties or
                        conditions of merchantability, fitness for a particular
                        purpose, or non-infringement of intellectual property.
                    </p>

                    <h2 class="mt-8 mb-4 text-2xl font-semibold text-black">
                        4. Limitations
                    </h2>
                    <p class="mb-4 text-gray-600">
                        In no event shall we or our suppliers be liable for any
                        damages arising out of the use or inability to use the
                        materials on this website.
                    </p>

                    <h2 class="mt-8 mb-4 text-2xl font-semibold text-black">
                        5. Revisions
                    </h2>
                    <p class="mb-4 text-gray-600">
                        We may revise these terms of service at any time without
                        notice. By using this website you are agreeing to be
                        bound by the then current version of these terms of
                        service.
                    </p>

                    <h2 class="mt-8 mb-4 text-2xl font-semibold text-black">
                        6. Contact Us
                    </h2>
                    <p class="mb-4 text-gray-600">
                        If you have any questions about these Terms, please
                        contact us at support@example.com.
                    </p>
                </div>
            </div>
        </div>
    </WebLayout>
</template>
