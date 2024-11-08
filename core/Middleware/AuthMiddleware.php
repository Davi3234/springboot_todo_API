<?php
namespace Core\Middleware;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthMiddleware {
    public function handle(): void {
        $headers = apache_request_headers();
        $authHeader = $headers['Authorization'] ?? '';

        if (str_starts_with($authHeader, 'Bearer ')) {
            $jwt = substr($authHeader, 7);
            try {
                JWT::decode($jwt, new Key('your_secret_key', 'HS256'));
                return;
            } catch (\Exception $e) {
                http_response_code(401);
                echo json_encode(['error' => 'Unauthorized']);
                exit;
            }
        }

        http_response_code(401);
        echo json_encode(['error' => 'Authorization header missing or invalid']);
        exit;
    }
}
