<?php

use App\Http\Controllers\Frontend\FrontendController;

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::prefix('property')->group(function () {
    Route::get('/list', [FrontendController::class, 'properties'])->name('frontend.properties');
    Route::get('/type', [FrontendController::class, 'propertyType'])->name('frontend.properties-type');
    Route::get('/agent', [FrontendController::class, 'propertyAgent'])->name('frontend.properties-agent');
});
Route::get('/blog', [FrontendController::class, 'blog'])->name('frontend.blog');
Route::get('/about', [FrontendController::class, 'about'])->name('frontend.about');
Route::get('/contect', [FrontendController::class, 'contect'])->name('frontend.content');
Route::get('/polices', [FrontendController::class, 'polices'])->name('frontend.polices');
Route::get('/disclimer', [FrontendController::class, 'disclimer'])->name('frontend.disclimer');
Route::get('/term-and-condition', [FrontendController::class, 'termAndCondition'])->name('frontend.term-and-condition');
