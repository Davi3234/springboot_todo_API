<?php
// src/Controllers/UserController.php
namespace App\Controllers;

use Core\Attributes\Controller;
use Core\Attributes\Get;
use Core\Attributes\Middleware;
use Core\Enums\HttpStatus;
use Core\Http\Response;
use Core\Middleware\AuthMiddleware;
use App\Services\UserService;

#[Controller('/users')]
class UserController {
    private UserService $userService;

    public function __construct() {
        $this->userService = new UserService();
    }

    #[Get('/')]
    #[Middleware(AuthMiddleware::class)]
    public function getAll() {
        return (new Response())->status(HttpStatus::OK)->json($this->userService->getAllUsers());
    }
}
