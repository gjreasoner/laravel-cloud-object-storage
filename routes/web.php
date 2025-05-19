<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get("/", function () {
    return view('welcome', [
        'link' => Storage::disk('private')->url("object-storage-dir/test.txt"),
        'signed' => Storage::disk('private')->temporaryUrl("object-storage-dir/test.txt", now()->addMinutes(5)),
    ]);
});

Route::get('/list', function () {
    return [
        'files' => Storage::disk('private')->allFiles("object-storage-dir"),
    ];
});

Route::get('/read', function () {
    return Storage::disk('private')->get("object-storage-dir/test.txt");
});

Route::get('/write', function () {
    return Storage::disk('private')->put("object-storage-dir/test.txt", "Hello World: " . now());
});
