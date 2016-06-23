<?php

Route::get('/', function () {
    return view('index');
});

Route::localizedGroup(function () {
    Route::get('register/step-1', 'RegisterController@stepOne')->name('register.step-one');
    Route::post('register/step-1', 'RegisterController@stepOnePost')->name('register.step-one.post');

    Route::get('register/step-2', 'RegisterController@stepTwo')->name('register.step-two');
    Route::post('register/step-2', 'RegisterController@stepTwoPost')->name('register.step-two.post');

    Route::get('register/step-3', 'RegisterController@stepThree')->name('register.step-three');
    Route::post('register/step-3', 'RegisterController@stepThreePost')->name('register.step-three.post');

    Route::get('register/completed', 'RegisterController@completed')->name('register.completed');
});
