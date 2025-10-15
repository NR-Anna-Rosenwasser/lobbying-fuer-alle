<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/test', function (Request $request) {
    // Get submitted data
    $data = $request->all();
    return response()->json(['received_data' => $data]);
});
