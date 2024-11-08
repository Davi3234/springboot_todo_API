<?php
return array (
  'GET' => 
  array (
    '/auth/login' => 
    array (
      0 => 
      array (
        0 => 'App\\Controllers\\AuthController',
        1 => 'getAll',
      ),
    ),
    '/users' => 
    array (
      0 => 
      array (
        0 => 'App\\Controllers\\UserController',
        1 => 'getAll',
      ),
    ),
  ),
  'PUT' => 
  array (
    '/users/:id' => 
    array (
      0 => 
      array (
        0 => 'App\\Controllers\\UserController',
        1 => 'updateUser',
      ),
    ),
  ),
);