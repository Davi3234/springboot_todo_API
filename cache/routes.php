<?php
return array (
  'GET' => 
  array (
    '/users/' => 
    array (
      0 => 'App\\Controllers\\AuthController',
      1 => 'getAll',
    ),
    '/users' => 
    array (
      0 => 'App\\Controllers\\UserController',
      1 => 'getAll',
    ),
    '/users/:id' => 
    array (
      0 => 'App\\Controllers\\UserController',
      1 => 'updateUser',
    ),
  ),
);