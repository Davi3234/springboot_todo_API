<?php
namespace Core\Managers;

class CacheManager {
    private const CACHE_FILE = __DIR__ . '/../../cache/routes.php';

    public static function load(): ?array {
        if (file_exists(self::CACHE_FILE)) {
            return include self::CACHE_FILE;
        }
        return null;
    }

    public static function save(array $routes): void {
        $data = "<?php\nreturn " . var_export($routes, true) . ";";
        file_put_contents(self::CACHE_FILE, $data);
    }
}
