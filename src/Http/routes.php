<?php

$router->group([
    'namespace' => 'Api',
    'prefix' => 'api/v1',
    'middleware' => ['api', 'auth:web,api'],
], function ($router) {
    $router->group([
        'namespace' => 'Videos',
        'prefix' => 'videos',
    ], function ($router) {
        $router->get('{id}/detection-window', [
            'uses' => 'DetectionWindowController@show',
        ]);
    });
});

$router->group([
    'namespace' => 'Views',
    'middleware' => 'auth',
], function ($router) {
    $router->get('videos/{id}/detection-window', [
        'uses' => 'DetectionWindowController@show',
        'as' => 'video-detection-window',
    ]);
});
