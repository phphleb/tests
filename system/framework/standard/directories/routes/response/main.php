<?php

Route::get('/test-controller-response/{type}')
    ->controller('App\Controllers\HTest0ResponseController@action<type>');
