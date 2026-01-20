<?php

const ROUTES = [
	'/' => [
		'controller' => App\Controller\HomeController::class,
		'method' => 'index'
	],
	'/api/posts'=> [
		'controller' => App\Controller\Api\PostController::class,
		'method' => 'findMany'
	],
    '/api/users' => [
        'controller' => App\Controller\Api\UserController::class,
        'method' => 'index'
    ],
    '/api/login' => [
        'controller' => App\Controller\Api\AuthController::class,
        'method' => 'login'
    ]
];