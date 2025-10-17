<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
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
    @vite('resources/frontend/js/app.js')
    @inertiaHead
  </head>
  <body>
    @inertia
  </body>
</html>
