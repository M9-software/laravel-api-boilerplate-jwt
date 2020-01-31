<?php

use Dingo\Api\Routing\Router;

/** @var Router $api */
$api = app(Router::class);

$api->version('v1', function (Router $api) {
    $api->group(['prefix' => 'auth'], function(Router $api) {
        // $api->post('signup', 'App\\Api\\V1\\Controllers\\SignUpController@signUp');
        $api->post('login', 'App\\Api\\V1\\Controllers\\LoginController@login');

        // $api->post('recovery', 'App\\Api\\V1\\Controllers\\ForgotPasswordController@sendResetEmail');
        // $api->post('reset', 'App\\Api\\V1\\Controllers\\ResetPasswordController@resetPassword');

        $api->post('logout', 'App\\Api\\V1\\Controllers\\LogoutController@logout');
        $api->post('refresh', 'App\\Api\\V1\\Controllers\\RefreshController@refresh');
        $api->get('me', 'App\\Api\\V1\\Controllers\\UserController@me');

        /*
        // 商圈 Areas
        $api->get('areas', 'App\\Api\\V1\\Controllers\\AreasController@show');
        $api->post('addarea', 'App\\Api\\V1\\Controllers\\AreasController@add');
        $api->post('updatearea', 'App\\Api\\V1\\Controllers\\AreasController@update');

        // 商户 Consumers
        $api->get('consumers', 'App\\Api\\V1\\Controllers\\ConsumersController@show');
        $api->post('addconsumer', 'App\\Api\\V1\\Controllers\\ConsumersController@add');
        $api->post('updateconsumer', 'App\\Api\\V1\\Controllers\\ConsumersController@update');

        // 活动 Activities
        $api->get('activities', 'App\\Api\\V1\\Controllers\\ActivitiesController@show');
        $api->post('addactivity', 'App\\Api\\V1\\Controllers\\ActivitiesController@add');
        $api->post('updateactivity', 'App\\Api\\V1\\Controllers\\ActivitiesController@update');

        // 联系人-客户 Contacts
        $api->get('contacts', 'App\\Api\\V1\\Controllers\\ContactsController@show');
        $api->post('addcontact', 'App\\Api\\V1\\Controllers\\ContactsController@add');

        // 预约 Books
        $api->get('books', 'App\\Api\\V1\\Controllers\\BooksController@show');
        $api->post('addbook', 'App\\Api\\V1\\Controllers\\BooksController@add');

        // 联系人-客户 地址 Contactaddrs
        $api->get('contactaddrs', 'App\\Api\\V1\\Controllers\\ContactaddrsController@show');
        $api->post('addcontactaddr', 'App\\Api\\V1\\Controllers\\ContactaddrsController@add');
        $api->post('updatecontactaddr', 'App\\Api\\V1\\Controllers\\ContactaddrsController@update');

        // 联系人-客户 信息 Contactinfos
        $api->get('contactinfos', 'App\\Api\\V1\\Controllers\\ContactinfosController@show');
        $api->post('addcontactinfo', 'App\\Api\\V1\\Controllers\\ContactinfosController@add');
        $api->post('updatecontactinfo', 'App\\Api\\V1\\Controllers\\ContactinfosController@update');
        */
    });

    $api->group(['middleware' => 'jwt.auth'], function(Router $api) {
        $api->get('protected', function() {
            return response()->json([
                'message' => 'Access to protected resources granted! You are seeing this text as you provided the token correctly.'
            ]);
        });

        $api->get('refresh', [
            'middleware' => 'jwt.refresh',
            function() {
                return response()->json([
                    'message' => 'By accessing this endpoint, you can refresh your access token at each request. Check out this response headers!'
                ]);
            }
        ]);
    });

    $api->get('hello', function() {
        return response()->json([
            'message' => 'This is a simple example of item returned by your APIs. Everyone can see it.'
        ]);
    });

});
