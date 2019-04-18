<?php

use Illuminate\Support\Facades\Route;

use \Mpanius\NovaEditorJs\Http\Controllers\EditorJsImageUploadController;

Route::post('upload/file', EditorJsImageUploadController::class . '@file')->name('editor-js-upload-image-by-file');
Route::post('upload/url', EditorJsImageUploadController::class . '@url')->name('editor-js-upload-image-by-url');
