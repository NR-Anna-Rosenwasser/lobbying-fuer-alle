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
                            <h1 class="font-serif">Krankenkassen, Versicherungen, Immobilienkonzerne, Landwirtschaft... alle haben eine Lobby.</h1>
                            <div class="mt-2">
                                <h1 class="font-sans boxed-text">Du verdienst auch eine.</h1>
                            </div>
                        </div>
                        <div class="lfa-landing__lead__content mt-6">
                            <p>Lobby, das heisst: Gruppen, die ein spezifisches Interesse vertreten und dafür sorgen, dass es in der Politik Gehör findet.  Das gilt jedoch nicht für alle Anliegen gleich: Forderungen, hinter denen grosse Firmen oder Organisationen mit viel Geld stehen, finden bei vielen Politiker*innen mehr Gehör. Parlamentarer*innen erhalten dafür Geschenke oder nehmen bei Interessensvertretungen (oft bezahlte) Ämtli an. Die Anliegen all derjenigen Menschen oder Gruppen, die sich das nicht leisten können, bleiben je länger je mehr auf der Strecke. Wir finden: <b>Das ist nicht demokratisch.</b></p>
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
