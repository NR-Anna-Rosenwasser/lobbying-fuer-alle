<script setup>
import AppLogo from '@/Components/AppLogo.vue';
import { onMounted, ref } from 'vue';

const header = ref(null);

onMounted(() => {
    let headerSize = header.value.offsetHeight;
    document.documentElement.style.setProperty('--header-size', headerSize + 'px');

    window.addEventListener('resize', () => {
        let headerSize = header.value.offsetHeight;
        document.documentElement.style.setProperty('--header-size', headerSize + 'px');
    });
});

</script>

<template>
    <div class="absolute top-0 left-0 w-full" ref="header">
        <div class="lfa-container lfa-container__full">
            <header class="my-6 md:my-8 lg:my-10 flex justify-between items-center">
                <AppLogo />
            </header>
        </div>
    </div>
</template>
