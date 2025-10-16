<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/create-entry', function (Request $request) {
    // Get submitted data
    $data = $request->all();
    // Write data to a JSON file
    $filePath = storage_path('app/public/entries.json');
    $entries = [];
    if (file_exists($filePath)) {
        $entries = json_decode(file_get_contents($filePath), true) ?? [];
    }
    $entries[] = $data;
    file_put_contents($filePath, json_encode($entries, JSON_PRETTY_PRINT));
    return response()->json(['status' => 'success', 'message' => 'Entry created successfully.']);
});
