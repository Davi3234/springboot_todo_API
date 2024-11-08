<?php

namespace Core\Middleware;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Core\Http\Response;
use Core\Enums\HttpStatus;

class AuthMiddleware
{
  public function handle(): bool
  {
    $headers = apache_request_headers();
    $authHeader = $headers['Authorization'] ?? '';

    if (str_starts_with($authHeader, 'Bearer ')) {
      $jwt = substr($authHeader, 7);
      try {
        JWT::decode($jwt, new Key('your_secret_key', 'HS256'));
        return true;
      } catch (\Exception $e) {
        (new Response())->status(HttpStatus::UNAUTHORIZED)->json(['error' => 'Unauthorized']);
        return false;
      }
    }

    (new Response())->status(HttpStatus::UNAUTHORIZED)->json(['error' => 'Authorization header missing or invalid']);
    return false;
  }
}
