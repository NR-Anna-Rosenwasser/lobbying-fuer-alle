<script setup>
import { onMounted, ref } from 'vue';
import { Icon } from '@iconify/vue';
const shareText = `Hoi 👋
Ich habe gerade ein Anliegen bei der Kampagne "Lobbying für Alle" eingereicht. Es geht darum, dass in der Schweiz Anliegen, hinter denen viel Geld steckt, bevorzugt behandelt werden, während die Anliegen von normalen Menschen oft übersehen werden.
`
const url = ref("");
onMounted(() => {
    url.value = window.location.origin + '/';
});

</script>
<template>
    <div class="lfa-share-buttons grid md:grid-cols-2 gap-2 ">
        <a
            data-platform="whatsapp"
            target="_blank"
            :href="`https://api.whatsapp.com/send?text=${encodeURIComponent(shareText)}%0A${url}`"
            rel="noopener"
            style="--button-color: #25D366;"
            class="lfa-share-buttons__button"
        >
            <span>Auf WhatsApp teilen</span>
            <Icon icon="fa7-brands:whatsapp" />
        </a>
        <a
            data-platform="telegram"
            target="_blank"
            :href="`https://t.me/share/url?url=${encodeURIComponent(url)}&text=${encodeURIComponent(shareText)}`"
            rel="noopener"
            style="--button-color: #0088cc;"
            class="lfa-share-buttons__button"
        >
            <span>Auf Telegram teilen</span>
            <Icon icon="fa7-brands:telegram" />
        </a>
        <a
            data-platform="threads"
            target="_blank"
            :href="`https://www.threads.net/share?text=${encodeURIComponent(shareText)}%0A${url}`"
            rel="noopener"
            style="--button-color: #000000;"
            class="lfa-share-buttons__button"
        >
            <span>Auf Threads teilen</span>
            <Icon icon="fa7-brands:threads" />
        </a>
        <a
            data-platform="bluesky"
            target="_blank"
            :href="`https://bsky.app/intent/compose?text=${encodeURIComponent(shareText)}%0A${url}`"
            rel="noopener"
            style="--button-color: #1DA1F2;"
            class="lfa-share-buttons__button"
        >
            <span>Auf Bluesky teilen</span>
            <Icon icon="fa7-brands:bluesky" />
        </a>
        <a
            data-platform="facebook"
            target="_blank"
            :href="`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`"
            rel="noopener"
            style="--button-color: #3b5998;"
            class="lfa-share-buttons__button"
        >
            <span>Auf Facebook teilen</span>
            <Icon icon="fa7-brands:facebook" />
        </a>
        <a
            data-platform="email"
            target="_blank"
            :href="`mailto:?subject=${encodeURIComponent('Unterstütze die Kampagne „Lobbying für Alle“')}&body=${encodeURIComponent(shareText)}%0A${url}`"
            rel="noopener"
            class="lfa-share-buttons__button"
        >
            <span>Per E-Mail teilen</span>
            <Icon icon="fa7-solid:envelope" />
        </a>
    </div>
</template>
