<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/list', function () {
    return Storage::disk('private')->listContents("object-storage-dir");
});

Route::get('/read', function () {
    return Storage::disk('private')->get("object-storage-dir/test.txt");
});

Route::get('/write', function () {
    return Storage::disk('private')->put("object-storage-dir/test.txt", "Hello World: " . now());
});
