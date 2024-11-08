<?php
namespace Core\Http;

class Request {
    private array $queryParams;
    private array $body;
    private array $headers;

    public function __construct() {
        $this->queryParams = $_GET;
        $this->body = json_decode(file_get_contents('php://input'), true) ?? [];
        $this->headers = apache_request_headers();
    }

    public function getMethod(): string {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function getPath(): string {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public function getHeaders(): array {
        return $this->headers;
    }

    public function getBody(): array {
        return $this->body;
    }

    public function getParam(string $key, $default = null) {
        return $this->queryParams[$key] ?? $default;
    }

    public function getHeader(string $key): ?string {
        return $this->headers[$key] ?? null;
    }
}
