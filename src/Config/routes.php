<?php
return [
    '~^hello/(.*)$~' => [\Src\Controllers\MainController::class, 'sayHello'],
    '~^$~' => [\Src\Controllers\MainController::class, 'main'],
    '~^echo/(.*)$~' => [\Src\Controllers\MainController::class, 'echoAddress'],

    '~^product/(\d+)$~' => [\Src\Controllers\ProductController::class, 'show'],
    '~^products/all$~' => [\Src\Controllers\ProductController::class, 'all'],

    '~^categories/all$~' => [\Src\Controllers\CategoryController::class, 'all'],
    '~^categories/(\d+)$~' => [\Src\Controllers\CategoryController::class, 'view'],
    '~^search$~' => [\Src\Controllers\CategoryController::class, 'search'],

    '~^cart$~' => [\Src\Controllers\CartController::class, 'view'],
    '~^cart/add/(\d+)$~' => [\Src\Controllers\CartController::class, 'add'],
    '~^cart/del/(\d+)$~' => [\Src\Controllers\CartController::class, 'delItem'],
    '~^cart/del/(\d+)/all$~' => [\Src\Controllers\CartController::class, 'delAllItem'],
    '~^cart/clear$~' => [\Src\Controllers\CartController::class, 'clear'],
    '~^cart/order$~' => [\Src\Controllers\CartController::class, 'order'],

    '~^articles$~' =>  [\Src\Controllers\ArticlesController::class, 'all'],
    '~^articles/page/(\d+)$~' =>  [\Src\Controllers\ArticlesController::class, 'page'],

    '~^articles/(\d+)$~' => [\Src\Controllers\ArticlesController::class, 'view'],
    '~^articles/(\d+)/edit$~' => [\Src\Controllers\ArticlesController::class, 'edit'],
    '~^articles/add$~' => [\Src\Controllers\ArticlesController::class, 'add'],
    '~^articles/(\d+)/delete$~' => [\Src\Controllers\ArticlesController::class, 'delete'],

    '~^users/all$~' =>  [\Src\Controllers\UsersController::class, 'all'],
    '~^users/(\d+)$~' => [\Src\Controllers\UsersController::class, 'view'],
    '~^users/register$~' => [\Src\Controllers\UsersController::class, 'signUp'],  
    '~^users/login$~' => [\Src\Controllers\UsersController::class, 'login'], 
    '~^users/logout$~' => [\Src\Controllers\UsersController::class, 'logout'], 

    '~^admin$~' => [\Src\Controllers\Admin\MainAdminController::class, 'index'], 
    '~^admin/category/all$~' => [\Src\Controllers\Admin\CategoryAdminController::class, 'all'],
    '~^admin/category/add$~' => [\Src\Controllers\Admin\CategoryAdminController::class, 'add'], 
    '~^admin/category/(\d+)/edit$~' => [\Src\Controllers\Admin\CategoryAdminController::class, 'edit'],
    '~^admin/category/(\d+)$~' => [\Src\Controllers\Admin\CategoryAdminController::class, 'view'],
    '~^admin/category/(\d+)/delete$~' => [\Src\Controllers\Admin\CategoryAdminController::class, 'delete'],

    '~^admin/product/all$~' => [\Src\Controllers\Admin\ProductAdminController::class, 'all'], 
    '~^admin/product/add$~' => [\Src\Controllers\Admin\ProductAdminController::class, 'add'], 
    '~^admin/product/(\d+)$~' => [\Src\Controllers\Admin\ProductAdminController::class, 'view'], 
    '~^admin/product/(\d+)/edit$~' => [\Src\Controllers\Admin\ProductAdminController::class, 'edit'], 
    '~^admin/product/(\d+)/delete$~' => [\Src\Controllers\Admin\ProductAdminController::class, 'delete'],

    '~^admin/order/all$~' => [\Src\Controllers\Admin\OrderAdminController::class, 'all'], 
    '~^admin/order/(\d+)$~' => [\Src\Controllers\Admin\OrderAdminController::class, 'view'], 
    '~^admin/order/(\d+)/edit$~' => [\Src\Controllers\Admin\OrderAdminController::class, 'edit'], 
    '~^admin/order/(\d+)/delete$~' => [\Src\Controllers\Admin\OrderAdminController::class, 'delete'], 

    '~^personal$~' => [\Src\Controllers\PersonalController::class, 'profile'], 
    '~^personal/orders$~' => [\Src\Controllers\PersonalController::class, 'orders'], 
    '~^personal/orders/(\d+)$~' => [\Src\Controllers\PersonalController::class, 'orderView'], 
    '~^personal/orders/(\d+)/delete$~' => [\Src\Controllers\PersonalController::class, 'delete'], 















];

?>