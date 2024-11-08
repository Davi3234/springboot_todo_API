<?php
namespace Core\Http;

use Core\Enums\HttpStatus;

use Core\Exceptions\ApiException;

class Response {
    private HttpStatus $status;
    private array $headers = [];
    private mixed $body;

    public function status(HttpStatus $status): self {
        $this->status = $status;
        return $this;
    }

    public function header(string $key, string $value): self {
        $this->headers[$key] = $value;
        return $this;
    }

    public function json(array $data): void {
        $this->header('Content-Type', 'application/json');
        $this->body = json_encode($data);
        $this->send();
    }

    private function send(): void {
        http_response_code($this->status->value);
        foreach ($this->headers as $key => $value) {
            header("{$key}: {$value}");
        }
        echo $this->body;
        exit;
    }

    public static function error(HttpStatus $status, string $message): void {
        throw new ApiException($status, $message);
    }
}
