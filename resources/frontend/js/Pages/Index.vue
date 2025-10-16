<script setup>
import Page from '../Layouts/Page.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <Page>
        <div class="lfa-container">
            <div class="w-full">
                <div class="lfa-landing">
                    <div class="lfa-landing__lead">
                        <div class="lfa-landing__lead__title text-[1.5rem] md:text-[2rem]">
                            <h1 class="font-serif">Krankenkassen, Versicherungen, Immokonzerne, Industriefirmen, Landwirtschaftsbetriebe... alle haben sie eine Lobby.</h1>
                            <div class="mt-2">
                                <h1 class="font-sans boxed-text">Nur wir Menschen haben keine.</h1>
                            </div>
                        </div>
                        <div class="lfa-landing__lead__content mt-6">
                            <p>Die Macht der sogenannten “Partikularinteressen” in den Parlamenten der ganzen Schweiz ist riesig. Dies gilt jedoch nicht für alle Anliegen gleich: Forderungen, hinter denen grosse Firmen oder Organisationen mit viel Geld stehen, finden bei Politiker*innen mehr Gehör. Lobbyist*innen erhalten Zugang zur Wandelhalle in Bern, Parlamentarer*innen erhalten Geschenke oder nehmen Ämtli an bei Interessensvertretungen. Die Anliegen all derjenigen Menschen oder Gruppen, die sich das nicht leisten können, bleiben je länger je mehr auf der Strecke. <b>Das ist einer Demokratie nicht würdig.</b></p>
                            <p>Auf die Wintersession 2026 starten wir einen Versuch: Hast du ein Anliegen, das dich beschäftigt? Ist dir ein Problem aufgefallen, dem zu wenig Beachtung geschenkt wird? Oder willst du etwas ändern, das dich stört? <b>Dann füll dieses Formular aus!</b></p>
                            <div class="lfa-landing__lead__content__button flex justify-end mt-6">
                                <Link href="/app" class="lfa-button text-2xl">Ich bin dabei!</Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Page>
</template>
