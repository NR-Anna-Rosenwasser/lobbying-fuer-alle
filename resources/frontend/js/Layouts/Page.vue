<script setup>
import Header from '@/Components/Header.vue';
import { onMounted } from 'vue';
import { Head } from '@inertiajs/vue3';

onMounted(() => {
    let vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);
    window.addEventListener('resize', () => {
        let vh = window.innerHeight * 0.01;
        document.documentElement.style.setProperty('--vh', `${vh}px`);
    });

});

</script>

<template>
    <Head>
        <title>Lobbying für alle – damit auch dein Anliegen gehört wird</title>
        <meta name="description" content="In der Schweiz finden Anliegen mit mehr Geld auch mehr Gehör. Damit auch dein Anliegen gehört wird, haben wir die Kampagne «Lobbying für alle» ins Leben gerufen." />
        <meta property="og:title" content="Lobbying für alle – damit auch dein Anliegen gehört wird" />
        <meta property="og:description" content="In der Schweiz finden Anliegen mit mehr Geld auch mehr Gehör. Damit auch dein Anliegen gehört wird, haben wir die Kampagne «Lobbying für alle» ins Leben gerufen." />
        <meta property="og:image" content="/images/og.png" />
        <meta property="og:image:alt" content="Lobbying für alle – damit auch dein Anliegen gehört wird" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="https://lobby.annarosenwasser.ch" />
        <meta name="twitter:card" content="summary_large_image">
        <meta property="twitter:domain" content="lobby.annarosenwasser.ch">
        <meta property="twitter:url" content="https://lobby.annarosenwasser.ch">
        <meta name="twitter:title" content="Lobbying für alle – damit auch dein Anliegen gehört wird">
        <meta name="twitter:description" content="In der Schweiz finden Anliegen mit mehr Geld auch mehr Gehör. Damit auch dein Anliegen gehört wird, haben wir die Kampagne «Lobbying für alle» ins Leben gerufen.">
        <meta name="twitter:image" content="/images/og.png">
        <link rel="icon" type="image/png" href="/images/favicon/favicon-96x96.png" sizes="96x96" />
        <link rel="icon" type="image/svg+xml" href="/images/favicon/favicon.svg" />
        <link rel="shortcut icon" href="/images/favicon/favicon.ico" />
        <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-touch-icon.png" />
        <meta name="apple-mobile-web-app-title" content="Lobby für alle" />
        <link rel="manifest" href="/images/favicon/site.webmanifest" />
    </Head>
    <Header />
    <main class="pb-6 md:pb-8 lg:pb-10">
        <slot />
    </main>
</template>

<style scoped>
main {
    padding-top: var(--header-size);
}
</style>
