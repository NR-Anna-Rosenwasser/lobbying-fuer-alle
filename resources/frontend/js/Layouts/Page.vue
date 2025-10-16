<script setup>
import Header from '@/Components/Header.vue';
import { onMounted } from 'vue';

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
    <Header />
    <main>
        <slot />
    </main>
</template>

<style scoped>
main {
    padding-top: var(--header-size);
}
</style>
