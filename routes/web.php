<?php

use App\Models\Concern;
use App\Models\Constituent;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Index');
});

Route::get('/app', function () {
    return Inertia::render('App/Start');
});

Route::get('/danke/{uuid}', function ($uuid) {
    return Inertia::render('App/ThankYou', [
        'concern' => Concern::where('uuid', $uuid)->first(),
        'constituent' => Concern::where('uuid', $uuid)->first()->constituent,
        'numberOfConcerns' => Concern::all()->count(),
        'numberOfConstituents' => Constituent::all()->count(),
    ]);
});
