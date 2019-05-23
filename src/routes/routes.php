<?php

Route::group(['namespace' => 'Vendor\Package\Controllers', 'prefix' => 'package', 'middleware' => []], function(){
    Route::resource('/', 'PackageController');
});