<?php
namespace App\Controllers;

use Core\Attributes\Controller;
use Core\Attributes\Get;
use Core\Attributes\Middleware;
use Core\Enums\HttpStatus;
use Core\Http\Response;
use Core\Middleware\AuthMiddleware;
use App\Services\UserService;

#[Controller('/users')]
class AuthController {

    public function __construct() {
    }

    #[Get('/')]
    #[Middleware(AuthMiddleware::class)]
    public function getAll() {
      return [];
    }
}
