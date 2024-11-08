<?php
namespace App\Controllers;

use Core\Attributes\Controller;
use Core\Attributes\Get;
use App\Services\UserService;

#[Controller('/users')]
class UserController {
    private UserService $userService;

    public function __construct() {
        $this->userService = new UserService();
    }

    #[Get('/')]
    public function createUser() {
        return json_encode($this->userService->createUser());
    }
}
