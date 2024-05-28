<?php
use App\routing\route;
    // ROUTE HOME
    Route::add('/', 'c_home@index');
    Route::add('/index', 'c_home@index');
    // ROUTE CATAGORY
    Route::add('/catagory/product', 'c_catagory@category');
    Route::add('/catagory/product/(\d+)', 'c_catagory@category');

    // ROUTE PRODUCT
    Route::add('/product/detail/(\d+)', 'c_product@DetailProduct');
    Route::add('/product/cart', 'c_product@Product_Cart');
    Route::add('/cart/soLuongId/(\d+)/(\w+)', 'c_product@update_soluong');
    Route::add('/cart/deleteId/(\d+)', 'c_product@Delete_CartId');
    Route::add('/product/comment', 'c_product@comment');
    //Route::add('/cart/soLuongId/(\d+)/(\w+)', 'c_product@update_soluong');
    Route::add('/product/checkout', 'c_product@checkout');
    Route::add('/order/vieworder', 'c_product@vieworder');

    // ROUTE USER
    Route::add('/user/login', 'c_user@login');
    Route::add('/user/logout', 'c_user@logout');
    Route::add('/user/register', 'c_user@register');

    // ROUTE BLOG
    Route::add('/home/blog/(\d+)', 'c_home@blogDetail');

    // ROUTE LOVE
    Route::add('/product/love', 'c_product@love');

    // MYACCOUNT
    Route::add('/user/myaccount', 'c_myaccount@myaccount');
    Route::add('/user/myaccountUpdate', 'c_myaccount@myaccountUpdate');
    Route::add('/user/myaccountPassword', 'c_myaccount@myaccountPassword');
    Route::add('/user/myaccountOrder', 'c_myaccount@myaccountOrder');
    Route::add('/user/orderDetail/(\d+)', 'c_myaccount@orderDetail');
    Route::add('/user/callUnset/(\d+)', 'c_myaccount@callUnset');
    Route::add('/user/orderUnset', 'c_myaccount@orderUnset');
    Route::add('/user/orderUnsetDetail/(\d+)', 'c_myaccount@orderUnsetDetail');
    Route::add('/user/orderSuccess', 'c_myaccount@orderSuccess');
    Route::add('/user/orderSuccessDetail/(\d+)', 'c_myaccount@orderSuccessDetail');

    // ROUTE ADMIN
    Route::add('/admin/adminLogin', 'c_admin@adminLogin');
    Route::add('/admin/dashboard', 'c_admin@dashboard');
    Route::add('/admin/catagory', 'c_admin@catagory');
    Route::add('/admin/product', 'c_admin@product');
    Route::add('/admin/blog', 'c_admin@blog');
    Route::add('/admin/user', 'c_admin@user');
    Route::add('/admin/order', 'c_admin@order');
    Route::add('/admin/love', 'c_admin@love');
    Route::add('/admin/comment', 'c_admin@comment');
    
    // ROUTE ADMIN (thêm sửa xóa)
    Route::add('/admin/productAdd', 'c_admin@productAdd');
    Route::add('/admin/productEdit/(\d+)', 'c_admin@productEdit');

    Route::add('/admin/catagoryAdd', 'c_admin@catagoryAdd');
    Route::add('/admin/catagoryEdit/(\d+)', 'c_admin@catagoryEdit');

    Route::add('/admin/orderEdit/(\d+)', 'c_admin@orderEdit');
    Route::add('/admin/orderDetail/(\d+)', 'c_admin@orderDetail');

    Route::add('/admin/userAdd', 'c_admin@userAdd');
    Route::add('/admin/userEdit/(\d+)', 'c_admin@userEdit');

    Route::add('/admin/blogAdd', 'c_admin@blogAdd');
    Route::add('/admin/blogEdit/(\d+)', 'c_admin@blogEdit');
    Route::add('/admin/blogDelete/(\d+)', 'c_admin@blogDelete');

    Route::add('/admin/deletecomment/(\d+)', 'c_admin@deletecomment');

    $uri = isset($_GET['url']) ? "/".rtrim($_GET['url'], '/') : '/index';

    Route::dispatch($uri);
?>