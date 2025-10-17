<script setup>
import Page from '@/Layouts/Page.vue';
import ShareButtons from '@/Components/ShareButtons.vue';
import { defineProps } from 'vue';
defineProps({
    constituent: Object,
    concern: Object,
    numberOfConcerns: Number,
    numberOfConstituents: Number,
});

</script>

<template>
    <Page>
        <div class="lfa-container">
            <div class="mb-6">
                <h1 class="boxed-text text-[1.5rem] md:text-[2rem] font-sans">Danke für dein Engagement, {{ constituent.fname }}!</h1>
            </div>
            <p>Wir haben dein Anliegen erhalten und werden es so schnell wie möglich prüfen. Wenn du in deinem Umfeld weitere Personen kennst, die ebenfalls ein Anliegen haben, leite ihnen diese Kampagne weiter:</p>
            <div class="mt-4">
                <ShareButtons />
            </div>
        </div>
    </Page>
</template>
