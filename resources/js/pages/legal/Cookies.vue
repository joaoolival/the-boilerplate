<script setup lang="ts">
import WebLayout from '@/Layouts/WebLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <WebLayout :solid="true">
        <Head title="Cookie Policy" />

        <div class="bg-white pt-24 pb-16">
            <div class="container mx-auto max-w-3xl px-6">
                <h1 class="mb-8 text-4xl font-bold text-black">
                    Cookie Policy
                </h1>

                <div class="prose max-w-none prose-slate">
                    <p class="text-lg text-gray-600">
                        Last updated: January 2026
                    </p>

                    <h2 class="mt-8 mb-4 text-2xl font-semibold text-black">
                        1. What Are Cookies
                    </h2>
                    <p class="mb-4 text-gray-600">
                        Cookies are small pieces of text sent to your web
                        browser by a website you visit. A cookie file is stored
                        in your web browser and allows the service or a
                        third-party to recognize you and make your next visit
                        easier and the service more useful to you.
                    </p>

                    <h2 class="mt-8 mb-4 text-2xl font-semibold text-black">
                        2. How We Use Cookies
                    </h2>
                    <p class="mb-4 text-gray-600">
                        When you use and access our service, we may place a
                        number of cookie files in your web browser. We use
                        cookies for the following purposes: to enable certain
                        functions of the service, to provide analytics, and to
                        store your preferences.
                    </p>

                    <h2 class="mt-8 mb-4 text-2xl font-semibold text-black">
                        3. Types of Cookies We Use
                    </h2>
                    <p class="mb-4 text-gray-600">
                        <strong>Essential cookies:</strong> These cookies are
                        required for the basic operation of our website.<br />
                        <strong>Analytics cookies:</strong> These cookies help
                        us understand how visitors interact with our website.<br />
                        <strong>Preference cookies:</strong> These cookies
                        enable a website to remember your preferences.
                    </p>

                    <h2 class="mt-8 mb-4 text-2xl font-semibold text-black">
                        4. Managing Cookies
                    </h2>
                    <p class="mb-4 text-gray-600">
                        Most web browsers allow you to control cookies through
                        their settings preferences. However, if you limit the
                        ability of websites to set cookies, you may worsen your
                        overall user experience, since it will no longer be
                        personalized to you.
                    </p>

                    <h2 class="mt-8 mb-4 text-2xl font-semibold text-black">
                        5. Third-Party Cookies
                    </h2>
                    <p class="mb-4 text-gray-600">
                        In addition to our own cookies, we may also use various
                        third-party cookies to report usage statistics of the
                        service, deliver advertisements, and so on.
                    </p>

                    <h2 class="mt-8 mb-4 text-2xl font-semibold text-black">
                        6. Contact Us
                    </h2>
                    <p class="mb-4 text-gray-600">
                        If you have any questions about our Cookie Policy,
                        please contact us at support@example.com.
                    </p>
                </div>
            </div>
        </div>
    </WebLayout>
</template>
