<script setup>
import { Icon } from '@iconify/vue';
import { onMounted, ref } from 'vue'
import { router } from '@inertiajs/vue3';


const form$ = ref(null)
const formSteps$ = ref(null)

onMounted(() => {
    const savedData = localStorage.getItem('formData');
    const currentStep = localStorage.getItem('currentStep') || 'page0';
    if (savedData) {
        console.log
        form$.value.update(JSON.parse(savedData));
        formSteps$.value.goTo(currentStep)
    }
});

const handleNext = (next$) => {
    localStorage.setItem('formData', JSON.stringify(form$.value?.data || {}));
    localStorage.setItem('currentStep', next$.name);
};

const resetForm = () => {
    localStorage.removeItem('formData');
    localStorage.removeItem('currentStep');
    form$.value.reset();
    formSteps$.value.goTo('page0');
};

const handleSubmit = async (FormData, form$) => {

    // Get all form data
    const data = form$.data;
    // Cast all checkbox values to boolean
    for (const key in data) {
        if (typeof data[key] === 'string' && (data[key] === 'true' || data[key] === 'false')) {
            data[key] = data[key] === 'true';
        }
    }

    // console.log(JSON.stringify(data));

    fetch('/api/concerns', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    }).then(response => response.json())
      .then(data => {
            localStorage.removeItem('formData');
            localStorage.removeItem('currentStep');
            router.visit(`/danke/${data.data.concern.uuid}`);
      })
    };
</script>

<template>
    <div>
        <Vueform
            :display-errors="false"
            method="POST"
            :endpoint="handleSubmit"
            ref="form$"
            validate-on="step"
            :float-placeholders="false"
            size="md"
            add-class="vf-lobbying-fur-alle"
        >
            <template #empty>
            <FormSteps
            @next="handleNext"
            ref="formSteps$"
            >
                <FormStep
                name="page0"
                label="Start"
                :elements="[
                    'h1_1',
                    'p_5',
                ]"
                :buttons="{
                    previous: false,
                }"
                :labels="{
                    next: 'Los 👉',
                }"
                />
                <FormStep
                name="page1"
                label="Über dich"
                :elements="[
                    'h1_2',
                    'p',
                    'constituentFname',
                    'constituentLname',
                    'constituentEmail',
                    'constituentPhone',
                    'constituentPronouns',
                ]"
                :buttons="{
                    previous: false,
                }"
                :labels="{
                    next: 'Weiter',
                }"
                />
                <FormStep
                name="page2"
                label="Dein Anliegen"
                :elements="[
                    'h1_3',
                    'p_1',
                    'concernTitle',
                    'concernDescription',
                ]"
                :buttons="{
                    previous: false,
                }"
                :labels="{
                    next: 'Weiter',
                }"
                />
                <FormStep
                name="page3"
                label="Geschichte"
                :elements="[
                    'h1_4',
                    'p_2',
                    'concernParlchChecked',
                    'concernPastConcerns',
                    'concernPastConcernsTimespan',
                    'concernPastConcernsDetails',
                ]"
                :buttons="{
                    previous: false,
                }"
                :labels="{
                    next: 'Weiter',
                }"
                />
                <FormStep
                name="page4"
                label="Weitere Infos"
                :elements="[
                    'h1_5',
                    'p_3',
                    'concernExperts',
                    'concernFurtherInformation',
                ]"
                :buttons="{
                    previous: false,
                }"
                :labels="{
                    next: 'Weiter',
                }"
                />
                <FormStep
                name="page5"
                label="Abschluss"
                :elements="[
                    'h1',
                    'p_4',
                ]"
                :buttons="{
                    previous: false,
                }"
                :labels="{
                    next: 'Abschicken',
                }"
                />
            </FormSteps>

            <FormElements>
                <StaticElement
                name="h1_2"
                tag="h1"
                content="Zuerst zu dir"
                />
                <StaticElement
                name="p"
                tag="p"
                content="<div>Mit dem Absenden dieses Formulars akzeptierst du <a href='https://annarosenwasser.ch/datenschutz'>die Datenschutzbestimmungen.</a></div>"
                />
                <TextElement
                name="constituentFname"
                label="Wie lautet dein Vorname?"
                :rules="[
                    'required',
                ]"
                :columns="{
                    lg: {
                    container: 6,
                    },
                }"
                field-name="Vorname"
                />
                <TextElement
                name="constituentLname"
                label="Und dein Nachname?"
                :rules="[
                    'required',
                ]"
                :columns="{
                    lg: {
                    container: 6,
                    },
                }"
                field-name="Nachname"
                />
                <TextElement
                name="constituentEmail"
                input-type="email"
                :rules="[
                    'nullable',
                    'required',
                    'email',
                ]"
                label="Deine E-Mail Adresse"
                field-name="E-Mail Adresse"
                />
                <PhoneElement
                name="constituentPhone"
                label="Deine Telefonummer"
                :allow-incomplete="true"
                :unmask="true"
                default="+41"
                :columns="{
                    lg: {
                    container: 6,
                    },
                }"
                info="Optional"
                />
                <TextElement
                name="constituentPronouns"
                label="Wie lauten deine Pronomen?"
                placeholder="optional"
                :columns="{
                    lg: {
                    container: 6,
                    },
                }"
                />
                <StaticElement
                name="h1_3"
                tag="h1"
                content="Danke, {constituentFname}!"
                :expressions="true"
                />
                <StaticElement
                name="p_1"
                tag="p"
                content="<div>Beschreibe uns hier bitte dein Anliegen so präzise wie möglich.</div>"
                :expressions="true"
                />
                <TextElement
                name="concernTitle"
                label="Gib deinem Anliegen bitte einen Kurznamen."
                description="So können wir dein Anliegen einfacher identifizieren."
                :rules="[
                    'required',
                    'max:60',
                ]"
                field-name="Kurzname"
                />
                <EditorElement
                name="concernDescription"
                label="Worum's gehts?"
                placeholder="Ich möchte, dass..."
                :hide-tools="[
                    'attach',
                    'heading',
                    'quote',
                    'code',
                ]"
                :rules="[
                    'required',
                    'min:200',
                    'max:2000',
                ]"
                description="min. 200 Zeichen, max. 2'000"
                field-name="Beschreibung"
                />
                <StaticElement
                name="h1_4"
                tag="h1"
                content="Gab es schon mal was dazu?"
                />
                <StaticElement
                name="p_2"
                tag="p"
                content="<div>Es gibt Anliegen, die regelmässig von Parlamentarier*innen gefordert werden. Vielleicht wurde dein Anliegen bereits von einem anderen Parlamentsmitglied aufgenommen. <a href='https://www.parlament.ch/de/ratsbetrieb/suche-curia-vista'>Bitte prüfe die Datenbank des Parlaments möglichst genau</a>, um herauszufinden, ob dein Anliegen bereits in der Vergangenheit bearbeitet wurde.</div>"
                />
                <CheckboxElement
                name="concernParlchChecked"
                text="Hast du überprüft, ob es in der Vergangenheit schon mal ein Geschäft zu deinem Anliegen gegeben hat?"
                default="true"
                :rules="[
                    'accepted',
                ]"
                field-name="parl.ch Datenbank-check"
                />
                <CheckboxElement
                name="concernPastConcerns"
                text="Hat es in der Vergangenheit bereits Geschäfte zu deinem Anliegen gegeben?"
                field-name="Vergangene Geschäfte"
                />
                <CheckboxElement
                name="concernPastConcernsTimespan"
                text="Sind diese Geschäfte schon lange genug her, damit deine Forderung wieder aktuell ist?"
                description="Es gibt keine «Regel», wie lange es dauern sollte. Stell dir die Frage: «Hat sich in der Zwischenzeit etwas verändert, damit das Anliegen dieses Mal bessere Chancen hat?»"
                :conditions="[
                    [
                    'concernPastConcerns',
                    '==',
                    true,
                    ],
                ]"
                :rules="[
                    'accepted',
                ]"
                field-name="Zeit seit letztem Geschäft"
                />
                <TextareaElement
                name="concernPastConcernsDetails"
                label="Welche Geschäfte behandeln dein Anliegen?"
                description="Nenn uns am besten die Nummern der Geschäfte, welche dein Anliegen in der Vergangenheit behandelt haben."
                :rules="[
                    'required',
                ]"
                field-name="Details zu früheren Geschäften"
                :conditions="[
                    [
                    'concernPastConcerns',
                    '==',
                    true,
                    ],
                ]"
                />
                <StaticElement
                name="h1_5"
                tag="h1"
                content="Hast du weitere Infos?"
                />
                <StaticElement
                name="p_3"
                tag="p"
                content="<div>Vorstösse zu schreiben, braucht viel Recherche. Kannst du uns hier noch weitere Infos zu deinem Anliegen nennen?</div>"
                />
                <TextareaElement
                name="concernExperts"
                label="Kennst du Expert*innen, Organisationen oder sonstige Menschen, welche mehr über dein Anliegen wissen?"
                description="Du darfst natürlich auch dich selbst nennen 😉 Sag uns in diesem Fall doch bitte, welche Expertise du mitbringst."
                placeholder="optional"
                :floating="false"
                field-name="Expert*innen"
                />
                <TextareaElement
                name="concernFurtherInformation"
                label="Hast du Quellen für weitere Informationen?"
                placeholder="optional"
                :floating="false"
                description="Egal ob Bücher, Links, Podcasts, Dokumentarfilme... Hier kannst du einfach alles zu deinem Thema reinhauen."
                field-name="Quellen"
                />
                <StaticElement
                name="h1"
                tag="h1"
                content="Du bist krass, {constituentFname}!"
                :expressions="true"
                />
                <StaticElement
                name="p_4"
                tag="p"
                content="<div>Hast du alles ready? Bist du zufrieden mit den Informationen, die du eingetragen hast? Wenn ja: Dann schick jetzt das Formular ab.</div>"
                />
                <StaticElement
                name="h1_1"
                tag="h1"
                content="Bevor wir anfangen 🤔"
                align="left"
                />
                <StaticElement
                name="p_5"
                tag="p"
                content="<div><strong>1. Diese Kampagne wird von Anna Rosenwasser und ihrem Mitarbeiterbüsi betrieben</strong> – was du hier rein schreibst, sehen wir beide.<br> <br><strong>2. Auch wenn wir uns das alles gut überlegt haben, können wir nicht garantieren, dass nichts schief läuft.</strong> Wir haben absolut keinen Plan<em> </em>wie viele Anliegen an uns herangetragen werden. Deshalb können wir dir nicht garantieren, dass wir dein Anliegen aufnehmen werden. Das soll aber auf keinen Fall heissen, dass dein Anliegen nicht wichtig ist oder wir es nicht für wichtig halten. Sei bitte nicht enttäuscht 💜<br><br><strong>3. Nimm dir Zeit und füll das Formular bitte sauber aus.</strong> Du kannst den Browser auch schliessen und später zurückkehren, nach jedem Schritt werden deine Angaben auf deinem Gerät gespeichert.<br><br>Wenn du Fragen hast, <a href='mailto:anna@rosenwasser.ch'>schreib uns ungeniert eine E-Mail!</a></div>"
                align="left"
                />
            </FormElements>

            <FormStepsControls />
            </template>
        </Vueform>
    </div>
    <div class="lfa-form__reset text-accent flex items-center justify-end opacity-80 mt-6 cursor-pointer select-none" @click="resetForm">
        <Icon icon="material-symbols:device-reset" />
        <span class="ml-2">neu beginnen</span>
    </div>
</template>

<style>
.vf-lobbying-fur-alle *,
.vf-lobbying-fur-alle *:before,
.vf-lobbying-fur-alle *:after,
.vf-lobbying-fur-alle:root {
  --vf-primary: var(--color-accent);
  --vf-primary-darker: var(--color-accent-darker);
  --vf-danger: #ef4444;
  --vf-danger-lighter: #fee2e2;
  --vf-success: #10b981;
  --vf-success-lighter: #d1fae5;
  --vf-gray-50: #f9fafb;
  --vf-gray-100: #f3f4f6;
  --vf-gray-200: #e5e7eb;
  --vf-gray-300: #d1d5db;
  --vf-gray-400: #9ca3af;
  --vf-gray-500: #6b7280;
  --vf-gray-600: #4b5563;
  --vf-gray-700: #374151;
  --vf-gray-800: #1f2937;
  --vf-gray-900: #111827;
  --vf-dark-50: #EFEFEF;
  --vf-dark-100: #DCDCDC;
  --vf-dark-200: #BDBDBD;
  --vf-dark-300: #A0A0A0;
  --vf-dark-400: #848484;
  --vf-dark-500: #737373;
  --vf-dark-600: #393939;
  --vf-dark-700: #323232;
  --vf-dark-800: #262626;
  --vf-dark-900: #191919;
  --vf-ring-width: 2px;
  --vf-ring-color: #0506DD66;
  --vf-link-color: var(--vf-primary);
  --vf-link-decoration: inherit;
  --vf-font-size: 18px;
  --vf-font-size-sm: 18px;
  --vf-font-size-lg: 16px;
  --vf-font-size-small: 0.875rem;
  --vf-font-size-small-sm: 0.8125rem;
  --vf-font-size-small-lg: 0.875rem;
  --vf-font-size-h1: 2.125rem;
  --vf-font-size-h1-sm: 2.125rem;
  --vf-font-size-h1-lg: 2.125rem;
  --vf-font-size-h2: 1.875rem;
  --vf-font-size-h2-sm: 1.875rem;
  --vf-font-size-h2-lg: 1.875rem;
  --vf-font-size-h3: 1.5rem;
  --vf-font-size-h3-sm: 1.5rem;
  --vf-font-size-h3-lg: 1.5rem;
  --vf-font-size-h4: 1.25rem;
  --vf-font-size-h4-sm: 1.25rem;
  --vf-font-size-h4-lg: 1.25rem;
  --vf-font-size-h1-mobile: 1.5rem;
  --vf-font-size-h1-mobile-sm: 1.5rem;
  --vf-font-size-h1-mobile-lg: 1.5rem;
  --vf-font-size-h2-mobile: 1.25rem;
  --vf-font-size-h2-mobile-sm: 1.25rem;
  --vf-font-size-h2-mobile-lg: 1.25rem;
  --vf-font-size-h3-mobile: 1.125rem;
  --vf-font-size-h3-mobile-sm: 1.125rem;
  --vf-font-size-h3-mobile-lg: 1.125rem;
  --vf-font-size-h4-mobile: 1rem;
  --vf-font-size-h4-mobile-sm: 1rem;
  --vf-font-size-h4-mobile-lg: 1rem;
  --vf-font-size-blockquote: 1rem;
  --vf-font-size-blockquote-sm: 0.875rem;
  --vf-font-size-blockquote-lg: 1rem;
  --vf-line-height: 27px;
  --vf-line-height-sm: 20px;
  --vf-line-height-lg: 2px;
  --vf-line-height-small: 1.25rem;
  --vf-line-height-small-sm: 1.125rem;
  --vf-line-height-small-lg: 1.25rem;
  --vf-line-height-headings: 1.2;
  --vf-line-height-headings-sm: 1.2;
  --vf-line-height-headings-lg: 1.2;
  --vf-line-height-blockquote: 1.5rem;
  --vf-line-height-blockquote-sm: 1.25rem;
  --vf-line-height-blockquote-lg: 1.5rem;
  --vf-letter-spacing: 0px;
  --vf-letter-spacing-sm: 0px;
  --vf-letter-spacing-lg: 0px;
  --vf-letter-spacing-small: 0px;
  --vf-letter-spacing-small-sm: 0px;
  --vf-letter-spacing-small-lg: 0px;
  --vf-letter-spacing-headings: 0px;
  --vf-letter-spacing-headings-sm: 0px;
  --vf-letter-spacing-headings-lg: 0px;
  --vf-letter-spacing-blockquote: 0px;
  --vf-letter-spacing-blockquote-sm: 0px;
  --vf-letter-spacing-blockquote-lg: 0px;
  --vf-gutter: 1rem;
  --vf-gutter-sm: 0.5rem;
  --vf-gutter-lg: 27px;
  --vf-min-height-input: 2.375rem;
  --vf-min-height-input-sm: 2.125rem;
  --vf-min-height-input-lg: 2.875rem;
  --vf-py-input: 0.375rem;
  --vf-py-input-sm: 6px;
  --vf-py-input-lg: 0.625rem;
  --vf-px-input: 0.75rem;
  --vf-px-input-sm: 0.5rem;
  --vf-px-input-lg: 0.875rem;
  --vf-py-btn: 0.375rem;
  --vf-py-btn-sm: 0.375rem;
  --vf-py-btn-lg: 0.625rem;
  --vf-px-btn: 0.875rem;
  --vf-px-btn-sm: 0.75rem;
  --vf-px-btn-lg: 1.25rem;
  --vf-py-btn-small: 0.25rem;
  --vf-py-btn-small-sm: 0.25rem;
  --vf-py-btn-small-lg: 0.375rem;
  --vf-px-btn-small: 0.625rem;
  --vf-px-btn-small-sm: 0.625rem;
  --vf-px-btn-small-lg: 0.75rem;
  --vf-py-group-tabs: 0.375rem;
  --vf-py-group-tabs-sm: 0.375rem;
  --vf-py-group-tabs-lg: 0.625rem;
  --vf-px-group-tabs: 0.75rem;
  --vf-px-group-tabs-sm: 0.5rem;
  --vf-px-group-tabs-lg: 0.875rem;
  --vf-py-group-blocks: 0.75rem;
  --vf-py-group-blocks-sm: 0.625rem;
  --vf-py-group-blocks-lg: 0.875rem;
  --vf-px-group-blocks: 1rem;
  --vf-px-group-blocks-sm: 1rem;
  --vf-px-group-blocks-lg: 1rem;
  --vf-py-tag: 0px;
  --vf-py-tag-sm: 0px;
  --vf-py-tag-lg: 0px;
  --vf-px-tag: 0.4375rem;
  --vf-px-tag-sm: 0.4375rem;
  --vf-px-tag-lg: 0.4375rem;
  --vf-py-slider-tooltip: 0.125rem;
  --vf-py-slider-tooltip-sm: 0.0625rem;
  --vf-py-slider-tooltip-lg: 0.1875rem;
  --vf-px-slider-tooltip: 0.375rem;
  --vf-px-slider-tooltip-sm: 0.3125rem;
  --vf-px-slider-tooltip-lg: 0.5rem;
  --vf-py-blockquote: 0.25rem;
  --vf-py-blockquote-sm: 0.25rem;
  --vf-py-blockquote-lg: 0.25rem;
  --vf-px-blockquote: 0.75rem;
  --vf-px-blockquote-sm: 0.75rem;
  --vf-px-blockquote-lg: 0.75rem;
  --vf-py-hr: 0.25rem;
  --vf-space-addon: 0px;
  --vf-space-addon-sm: 0px;
  --vf-space-addon-lg: 0px;
  --vf-space-checkbox: 0.375rem;
  --vf-space-checkbox-sm: 0.375rem;
  --vf-space-checkbox-lg: 0.375rem;
  --vf-space-tags: 0.1875rem;
  --vf-space-tags-sm: 0.1875rem;
  --vf-space-tags-lg: 0.1875rem;
  --vf-space-static-tag-1: 1rem;
  --vf-space-static-tag-2: 2rem;
  --vf-space-static-tag-3: 3rem;
  --vf-floating-top: 0rem;
  --vf-floating-top-sm: 0rem;
  --vf-floating-top-lg: 0.6875rem;
  --vf-bg-input: var(--color-rose);
  --vf-bg-input-hover: #ffffff;
  --vf-bg-input-focus: #ffffff;
  --vf-bg-input-danger: var(--color-rose);
  --vf-bg-input-success: var(--color-rose);
  --vf-bg-checkbox: var(--color-rose);
  --vf-bg-checkbox-hover: var(--color-rose);
  --vf-bg-checkbox-focus: var(--color-rose);
  --vf-bg-checkbox-danger: var(--color-rose);
  --vf-bg-checkbox-success: var(--color-rose);
  --vf-bg-disabled: var(--vf-gray-200);
  --vf-bg-selected: #0506DD0d;
  --vf-bg-passive: var(--vf-gray-300);
  --vf-bg-icon: var(--vf-gray-500);
  --vf-bg-danger: var(--vf-danger-lighter);
  --vf-bg-success: var(--vf-success-lighter);
  --vf-bg-tag: var(--vf-primary);
  --vf-bg-slider-handle: var(--vf-primary);
  --vf-bg-toggle-handle: var(--color-rose);
  --vf-bg-date-head: var(--vf-gray-100);
  --vf-bg-addon: #ffffff00;
  --vf-bg-btn: var(--vf-primary);
  --vf-bg-btn-danger: var(--vf-danger);
  --vf-bg-btn-secondary: var(--vf-gray-200);
  --vf-bg-table-header: var(--vf-gray-100);
  --vf-color-input: var(--vf-gray-800);
  --vf-color-input-hover: var(--vf-gray-800);
  --vf-color-input-focus: var(--vf-gray-800);
  --vf-color-input-danger: var(--vf-gray-800);
  --vf-color-input-success: var(--vf-gray-800);
  --vf-color-disabled: var(--vf-gray-400);
  --vf-color-placeholder: var(--vf-gray-300);
  --vf-color-passive: var(--vf-gray-700);
  --vf-color-muted: var(--vf-gray-500);
  --vf-color-floating: var(--vf-gray-500);
  --vf-color-floating-focus: var(--vf-gray-500);
  --vf-color-floating-success: var(--vf-gray-500);
  --vf-color-floating-danger: var(--vf-gray-500);
  --vf-color-danger: var(--vf-danger);
  --vf-color-success: var(--vf-success);
  --vf-color-tag: var(--vf-color-on-primary);
  --vf-color-addon: var(--vf-gray-800);
  --vf-color-date-head: var(--vf-gray-700);
  --vf-color-btn: var(--vf-color-on-primary);
  --vf-color-btn-danger: #ffffff;
  --vf-color-btn-secondary: var(--vf-gray-700);
  --vf-color-table-header: var(--vf-gray-800);
  --vf-border-color-input: var(--vf-primary);
  --vf-border-color-input-hover: var(--vf-gray-300);
  --vf-border-color-input-focus: var(--vf-primary);
  --vf-border-color-input-danger: var(--vf-gray-300);
  --vf-border-color-input-success: var(--vf-gray-300);
  --vf-border-color-checkbox: var(--vf-gray-300);
  --vf-border-color-checkbox-focus: var(--vf-primary);
  --vf-border-color-checkbox-hover: var(--vf-gray-300);
  --vf-border-color-checkbox-danger: var(--vf-gray-300);
  --vf-border-color-checkbox-success: var(--vf-gray-300);
  --vf-border-color-checked: var(--vf-primary);
  --vf-border-color-passive: var(--vf-gray-300);
  --vf-border-color-slider-tooltip: var(--vf-primary);
  --vf-border-color-tag: var(--vf-primary);
  --vf-border-color-btn: var(--vf-primary);
  --vf-border-color-btn-danger: var(--vf-danger);
  --vf-border-color-btn-secondary: var(--vf-gray-200);
  --vf-border-color-blockquote: var(--vf-gray-300);
  --vf-border-color-hr: var(--vf-gray-300);
  --vf-border-color-signature-hr: var(--vf-gray-300);
  --vf-border-color-table: var(--vf-gray-300);
  --vf-border-width-input-t: 1px;
  --vf-border-width-input-r: 1px;
  --vf-border-width-input-b: 1px;
  --vf-border-width-input-l: 1px;
  --vf-border-width-radio-t: 1px;
  --vf-border-width-radio-r: 1px;
  --vf-border-width-radio-b: 1px;
  --vf-border-width-radio-l: 1px;
  --vf-border-width-checkbox-t: 1px;
  --vf-border-width-checkbox-r: 1px;
  --vf-border-width-checkbox-b: 1px;
  --vf-border-width-checkbox-l: 1px;
  --vf-border-width-dropdown: 1px;
  --vf-border-width-btn: 1px;
  --vf-border-width-toggle: 0.125rem;
  --vf-border-width-tag: 1px;
  --vf-border-width-blockquote: 3px;
  --vf-border-width-table: 1px;
  --vf-shadow-input: 0px 0px 0px 0px rgba(0,0,0,0);
  --vf-shadow-input-hover: 0px 0px 0px 0px rgba(0,0,0,0);
  --vf-shadow-input-focus: 0px 0px 0px 0px rgba(0,0,0,0);
  --vf-shadow-handles: 0px 0px 0px 0px rgba(0,0,0,0);
  --vf-shadow-handles-hover: 0px 0px 0px 0px rgba(0,0,0,0);
  --vf-shadow-handles-focus: 0px 0px 0px 0px rgba(0,0,0,0);
  --vf-shadow-btn: 0px 0px 0px 0px rgba(0,0,0,0);
  --vf-shadow-dropdown: 0px 0px 0px 0px rgba(0,0,0,0);
  --vf-radius-input: 0.25rem;
  --vf-radius-input-sm: 0.25rem;
  --vf-radius-input-lg: 0.25rem;
  --vf-radius-btn: 0.25rem;
  --vf-radius-btn-sm: 0.25rem;
  --vf-radius-btn-lg: 0.25rem;
  --vf-radius-small: 4px;
  --vf-radius-small-sm: 4px;
  --vf-radius-small-lg: 4px;
  --vf-radius-large: 0.25rem;
  --vf-radius-large-sm: 0.25rem;
  --vf-radius-large-lg: 0.25rem;
  --vf-radius-tag: 0.25rem;
  --vf-radius-tag-sm: 0.25rem;
  --vf-radius-tag-lg: 0.25rem;
  --vf-radius-checkbox: 0.25rem;
  --vf-radius-checkbox-sm: 0.25rem;
  --vf-radius-checkbox-lg: 0.25rem;
  --vf-radius-slider: 0.25rem;
  --vf-radius-slider-sm: 0.25rem;
  --vf-radius-slider-lg: 0.25rem;
  --vf-radius-image: 0.25rem;
  --vf-radius-image-sm: 0.25rem;
  --vf-radius-image-lg: 0.25rem;
  --vf-radius-gallery: 0.25rem;
  --vf-radius-gallery-sm: 0.25rem;
  --vf-radius-gallery-lg: 0.25rem;
  --vf-checkbox-size: 1rem;
  --vf-checkbox-size-sm: 0.875rem;
  --vf-checkbox-size-lg: 1rem;
  --vf-gallery-size: 6rem;
  --vf-gallery-size-sm: 5rem;
  --vf-gallery-size-lg: 7rem;
  --vf-toggle-width: 3rem;
  --vf-toggle-width-sm: 2.75rem;
  --vf-toggle-width-lg: 3rem;
  --vf-toggle-height: 1.25rem;
  --vf-toggle-height-sm: 1rem;
  --vf-toggle-height-lg: 1.25rem;
  --vf-slider-height: 0.375rem;
  --vf-slider-height-sm: 0.3125rem;
  --vf-slider-height-lg: 0.5rem;
  --vf-slider-height-vertical: 20rem;
  --vf-slider-height-vertical-sm: 20rem;
  --vf-slider-height-vertical-lg: 20rem;
  --vf-slider-handle-size: 1rem;
  --vf-slider-handle-size-sm: 0.875rem;
  --vf-slider-handle-size-lg: 1.25rem;
  --vf-slider-tooltip-distance: 0.5rem;
  --vf-slider-tooltip-distance-sm: 0.375rem;
  --vf-slider-tooltip-distance-lg: 0.5rem;
  --vf-slider-tooltip-arrow-size: 0.3125rem;
  --vf-slider-tooltip-arrow-size-sm: 0.3125rem;
  --vf-slider-tooltip-arrow-size-lg: 0.3125rem;
  --vf-color-on-primary: #FEEBFD;
  --vf-size: sm;
}
</style>
