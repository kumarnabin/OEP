<?php

Route::group(
    ['middleware' => ['web', 'auth','checkRole'], 'prefix' => 'admin'], function()
{
    Route::resource('teachers', 'Globali\Teacher\TeacherController');
    
});