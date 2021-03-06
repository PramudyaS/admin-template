<?php

use Larape\Admin_template\Http\Controllers as Larape;

Route::group(['as'=>'template_setting.','prefix'=>'template_setting','namespace'=>'Larape\Admin_template\Http\Controllers'],function(){
    Route::get('{id}','TemplateSettingController');
    Route::patch('update/{id}','TemplateSettingController@update')->name('update');
});

Route::resource('menu',Larape\MenuController::class);
Route::resource('sub_menu',Larape\SubMenuController::class);

?>
