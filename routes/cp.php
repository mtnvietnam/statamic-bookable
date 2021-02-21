<?php
Route::namespace('\MTN\StatamicBookable\Http\Controllers')
    ->prefix('bookable/')
    ->name('bookable.')
    ->group(function () {
        Route::view('bookable', 'bookable::index')->name('index');
        Route::get('reports', 'ReportsController@index')->name('reports.index');
        Route::get('settings', 'SettingsController@index')->name('settings.index');
    });



