<?php

Route::group(['prefix'  =>  'admin'], function () {

    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
    Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');

    Route::group(['middleware'  =>  ['auth:admin']], function () {
        Route::get('/', function () {
            return view('admin.index');
        })->name('admin.dashboard');

        Route::get('/settings', 'Admin\SettingController@index')->name('admin.settings');
        Route::post('/settings', 'Admin\SettingController@update')->name('admin.settings.update');
    
        Route::group(['prefix'  =>   'categories'], function() {

            Route::get('/', 'Admin\CategoryController@index')->name('admin.categories.index');
            Route::get('/create', 'Admin\CategoryController@create')->name('admin.categories.create');
            Route::post('/store', 'Admin\CategoryController@store')->name('admin.categories.store');
            Route::get('/{id}/edit', 'Admin\CategoryController@edit')->name('admin.categories.edit');
            Route::post('/update', 'Admin\CategoryController@update')->name('admin.categories.update');
            Route::get('/{id}/delete', 'Admin\CategoryController@delete')->name('admin.categories.delete');
        
        });

        Route::group(['prefix'  =>   'attributes'], function() {

            Route::get('/', 'Admin\AttributeController@index')->name('admin.attributes.index');
            Route::get('/create', 'Admin\AttributeController@create')->name('admin.attributes.create');
            Route::post('/store', 'Admin\AttributeController@store')->name('admin.attributes.store');
            Route::get('/{id}/edit', 'Admin\AttributeController@edit')->name('admin.attributes.edit');
            Route::post('/update', 'Admin\AttributeController@update')->name('admin.attributes.update');
            Route::get('/{id}/delete', 'Admin\AttributeController@delete')->name('admin.attributes.delete');

            
            Route::post('/get-values', 'Admin\AttributeValueController@getValues');
            Route::post('/add-values', 'Admin\AttributeValueController@addValues');
            Route::post('/update-values', 'Admin\AttributeValueController@updateValues');
            Route::post('/delete-values', 'Admin\AttributeValueController@deleteValues');
        });

        Route::group(['prefix'  =>   'brands'], function() {

            Route::get('/', 'Admin\BrandController@index')->name('admin.brands.index');
            Route::get('/create', 'Admin\BrandController@create')->name('admin.brands.create');
            Route::post('/store', 'Admin\BrandController@store')->name('admin.brands.store');
            Route::get('/{id}/edit', 'Admin\BrandController@edit')->name('admin.brands.edit');
            Route::post('/update', 'Admin\BrandController@update')->name('admin.brands.update');
            Route::get('/{id}/delete', 'Admin\BrandController@delete')->name('admin.brands.delete');
        
        });

        Route::group(['prefix'  =>   'banners'], function() {

            Route::get('/', 'Admin\BannerController@index')->name('admin.banners.index');
            Route::get('/create', 'Admin\BannerController@create')->name('admin.banners.create');
            Route::post('/store', 'Admin\BannerController@store')->name('admin.banners.store');
            Route::get('/{id}/edit', 'Admin\BannerController@edit')->name('admin.banners.edit');
            Route::post('/update', 'Admin\BannerController@update')->name('admin.banners.update');
            Route::get('/{id}/delete', 'Admin\BannerController@delete')->name('admin.banners.delete');
        
        });
        Route::group(['prefix'  =>   'pages'], function() {

            Route::get('/', 'Admin\PageController@index')->name('admin.pages.index');
            Route::get('/create', 'Admin\PageController@create')->name('admin.pages.create');
            Route::post('/store', 'Admin\PageController@store')->name('admin.pages.store');
            Route::get('/{id}/edit', 'Admin\PageController@edit')->name('admin. pages.edit');
            Route::post('/update', 'Admin\PageController@update')->name('admin.pages.update');
            Route::get('/{id}/delete', 'Admin\PageController@delete')->name('admin.pages.delete');
        
        });

        Route::group(['prefix'  =>   'menus'], function() {

            Route::get('/', 'Admin\MenuController@index')->name('admin.menus.index');
            Route::get('/create', 'Admin\MenuController@create')->name('admin.menus.create');
            Route::post('/store', 'Admin\MenuController@store')->name('admin.menus.store');
            Route::get('/{id}/edit', 'Admin\MenuController@edit')->name('admin.menus.edit');
            Route::post('/update', 'Admin\MenuController@update')->name('admin.menus.update');
            Route::get('/{id}/delete', 'Admin\MenuController@delete')->name('admin.menus.delete');
        
        });

        Route::group(['prefix' => 'products'], function () {

            Route::get('/', 'Admin\ProductController@index')->name('admin.products.index');
            Route::get('/create', 'Admin\ProductController@create')->name('admin.products.create');
            Route::post('/store', 'Admin\ProductController@store')->name('admin.products.store');
            Route::get('/edit/{id}', 'Admin\ProductController@edit')->name('admin.products.edit');
            Route::post('/update', 'Admin\ProductController@update')->name('admin.products.update');
 
            Route::post('images/upload', 'Admin\ProductImageController@upload')->name('admin.products.images.upload');
            Route::get('images/{id}/delete', 'Admin\ProductImageController@delete')->name('admin.products.images.delete');
 
            Route::get('attributes/load', 'Admin\ProductAttributeController@loadAttributes');
            Route::post('attributes', 'Admin\ProductAttributeController@productAttributes');
            Route::post('attributes/values', 'Admin\ProductAttributeController@loadValues');
            Route::post('attributes/add', 'Admin\ProductAttributeController@addAttribute');
            Route::post('attributes/delete', 'Admin\ProductAttributeController@deleteAttribute');
        });

        
        Route::group(['prefix' => 'orders'], function () {
            Route::get('/', 'Admin\OrderController@index')->name('admin.orders.index');
            Route::get('/{order}/show', 'Admin\OrderController@show')->name('admin.orders.show');
            Route::get('/{order}/edit', 'Admin\OrderController@edit')->name('admin.orders.edit');
            Route::post('/update', 'Admin\OrderController@update')->name('admin.orders.update');
        });

    });
});

