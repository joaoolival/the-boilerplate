<script setup lang="ts">
import WebLayout from '@/layouts/WebLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <WebLayout :solid="true">
        <Head title="Privacy Policy" />

        <div class="bg-white pt-24 pb-16">
            <div class="container mx-auto max-w-3xl px-6">
                <h1 class="mb-8 text-4xl font-bold text-black">
                    Privacy Policy
                </h1>

                <div class="prose max-w-none prose-slate">
                    <p class="text-lg text-gray-600">
                        Last updated: January 2026
                    </p>

                    <h2 class="mt-8 mb-4 text-2xl font-semibold text-black">
                        1. Information We Collect
                    </h2>
                    <p class="mb-4 text-gray-600">
                        We collect information you provide directly to us, such
                        as when you create an account, make a purchase, or
                        contact us for support. This may include your name,
                        email address, and any other information you choose to
                        provide.
                    </p>

                    <h2 class="mt-8 mb-4 text-2xl font-semibold text-black">
                        2. How We Use Your Information
                    </h2>
                    <p class="mb-4 text-gray-600">
                        We use the information we collect to provide, maintain,
                        and improve our services, to process transactions and
                        send you related information, and to communicate with
                        you about products, services, and events.
                    </p>

                    <h2 class="mt-8 mb-4 text-2xl font-semibold text-black">
                        3. Information Sharing
                    </h2>
                    <p class="mb-4 text-gray-600">
                        We do not share your personal information with third
                        parties except as described in this policy. We may share
                        information with vendors, consultants, and other service
                        providers who need access to such information to carry
                        out work on our behalf.
                    </p>

                    <h2 class="mt-8 mb-4 text-2xl font-semibold text-black">
                        4. Data Security
                    </h2>
                    <p class="mb-4 text-gray-600">
                        We take reasonable measures to help protect information
                        about you from loss, theft, misuse, unauthorized access,
                        disclosure, alteration, and destruction.
                    </p>

                    <h2 class="mt-8 mb-4 text-2xl font-semibold text-black">
                        5. Your Rights
                    </h2>
                    <p class="mb-4 text-gray-600">
                        You may access, update, or delete your account
                        information at any time by logging into your account. If
                        you wish to delete your account, please contact us, and
                        we will respond to your request within a reasonable
                        timeframe.
                    </p>

                    <h2 class="mt-8 mb-4 text-2xl font-semibold text-black">
                        6. Contact Us
                    </h2>
                    <p class="mb-4 text-gray-600">
                        If you have any questions about this Privacy Policy,
                        please contact us at privacy@example.com.
                    </p>
                </div>
            </div>
        </div>
    </WebLayout>
</template>
