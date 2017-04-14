<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('/', [
    'uses' => 'PagesController@getMain',
    'as' => 'pages.main'
]);

Route::get('/pizza', [
    'uses' => 'ProductController@getPizza',
    'as' => 'product.index'
]);

Route::get('/sides', [
    'uses' => 'ProductController@getSides',
    'as' => 'sides.index'
]);

Route::get('/drinks', [
    'uses' => 'ProductController@getDrinks',
    'as' => 'drinks.index'
]);

Route::get('/desserts', [
    'uses' => 'ProductController@getDesserts',
    'as' => 'desserts.index'
]);

Route::get('/about', [
    'uses' => 'PagesController@getAbout',
    'as' => 'about.index'
]);

Route::get('/contact', [
    'uses' => 'PagesController@getContact',
    'as' => 'contact.index'
]);



Route::get('/401', [
    'uses' => 'BaseController@getError401',
    'as' => 'pages.401'
]);

Route::get('/staff', [
    'uses' => 'StaffController@getIndex',
    'as' => 'staff',
    'middleware' => 'roles',
    'roles' => ['Manager', 'Pizzaiolo']
]);

Route::get('/staff/pizzaiolo', [
    'uses' => 'StaffController@getPizzaioloPage',
    'as' => 'pizzaiolo',
    'middleware' => 'roles',
    'roles' => ['Manager', 'Pizzaiolo']
]);

Route::get('/staff/pizzaiolo/generate-article', [
    'uses' => 'StaffController@getGenerateArticle',
    'as' => 'pizzaiolo.article',
    'middleware' => 'roles',
    'roles' => ['Pizzaiolo']
]);

Route::get('/staff/products', [
    'uses' => 'StaffController@getCurrentProducts',
    'as' => 'staff.current-products',
    'middleware' => 'roles',
    'roles' => ['Manager']
]);

Route::get('/staff/manager', [
    'uses' => 'StaffController@getManagerPage',
    'as' => 'manager',
    'middleware' => 'roles',
    'roles' => ['Manager']
]);

Route::get('/staff/orders/new', [
    'uses' => 'StaffController@getNewOrders',
    'as' => 'staff.orders.new',
    'middleware' => 'roles',
    'roles' => ['Manager']
]);

Route::get('/staff/products/list/filter', [
    'uses' => 'CurrentProductsController@getFilterProducts',
    'as' => 'staff.products.list.filter',
    'middleware' => 'roles',
    'roles' => ['Manager']
]);

Route::post('/staff/manager/assign-roles', [
    'uses' => 'StaffController@postManagerAssignRoles',
    'as' => 'manager.assign',
    'middleware' => 'roles',
    'roles' => ['Manager']
]);

Route::get('/staff/products/create', [
    'uses' => 'CurrentProductsController@getCreateProduct',
    'as' => 'staff.products.create',
    'middleware' => 'roles',
    'roles' => ['Manager']
]);

Route::post('/staff/products/create', [
    'uses' => 'CurrentProductsController@postCreateProduct',
    'as' => 'staff.products.create',
    'middleware' => 'roles',
    'roles' => ['Manager']
]);

Route::get('/staff/products/edit', [
    'uses' => 'CurrentProductsController@getEditProduct',
    'as' => 'staff.products.edit',
    'middleware' => 'roles',
    'roles' => ['Manager']
]);

Route::post('/staff/products/edit', [
    'uses' => 'CurrentProductsController@postEditProduct',
    'as' => 'staff.products.edit',
    'middleware' => 'roles',
    'roles' => ['Manager']
]);

Route::post('/staff/products/delete', [
    'uses' => 'CurrentProductsController@postDeleteProduct',
    'as' => 'staff.products.delete',
    'middleware' => 'roles',
    'roles' => ['Manager']
]);

Route::get('/staff/products/edit/product', [
    'uses' => 'CurrentProductsController@getEditProductItem',
    'as' => 'staff.products.edit.product',
    'middleware' => 'roles',
    'roles' => ['Manager']
]);

Route::post('/staff/products/edit/product', [
    'uses' => 'CurrentProductsController@postEditProductItem',
    'as' => 'staff.products.edit.product',
    'middleware' => 'roles',
    'roles' => ['Manager']
]);

Route::get('/add-to-cart/{id}', [
    'uses' => 'ProductController@getAddToCart',
    'as' => 'product.addToCart',
]);

Route::post('/order_complete', [
    'uses' => 'StaffController@getMarkOrderComplete',
    'as' => 'order_complete'
]);

Route::get('/reduce/{id}', [
    'uses' => 'ProductController@getReduceByOne',
    'as' => 'product.reduceByOne'
]);

Route::get('/increase/{id}', [
    'uses' => 'ProductController@getIncreaseByOne',
    'as' => 'product.increaseByOne'
]);

Route::get('/remove/{id}', [
    'uses' => 'ProductController@getRemoveItem',
    'as' => 'product.remove'
]);

Route::get('/shopping-cart', [
    'uses' => 'ProductController@getCart',
    'as' => 'product.shoppingCart'
]);

Route::get('/checkout', [
    'uses' => 'ProductController@getCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);

Route::post('/checkout', [
    'uses' => 'ProductController@postCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);

Route::group(['prefix' => 'user'], function(){
    Route::group(['middleware' => 'guest'], function(){
        Route::get('/signup', [
            'uses' => 'UserController@getSignup',
            'as' => 'user.signup'
        ]);

        Route::post('/signup', [
            'uses' => 'UserController@postSignup',
            'as' => 'user.signup'
        ]);

        Route::get('/signin', [
            'uses' => 'UserController@getSignin',
            'as' => 'user.signin'
        ]);

        Route::post('/signin', [
            'uses' => 'UserController@postSignin',
            'as' => 'user.signin'
        ]);
    });

    Route::group(['middleware' => 'auth'], function(){
        Route::get('/profile', [
            'uses' => 'UserController@getProfile',
            'as' => 'user.profile'
        ]);

        Route::post('/user/update_details', [
            'uses' => 'UserController@postUpdateDetails',
            'as' => 'user.update_details'
        ]);

        Route::post('/user/update_password', [
            'uses' => 'UserController@postUpdatePassword',
            'as' => 'user.update_password'
        ]);

        Route::get('/logout', [
            'uses' => 'UserController@getLogout',
            'as' => 'user.logout'
        ]);
    });
});

